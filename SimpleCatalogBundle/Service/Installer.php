<?php

namespace SimpleCatalogBundle\Service;

use Pimcore;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\User\Permission\Definition;
use SimpleCatalogBundle\SimpleCatalogBundle as ThisBundle;
use SimpleCatalogBundle\Tool\BundleTool;

class Installer extends \Pimcore\Extension\Bundle\Installer\AbstractInstaller
{
    CONST INSTALL_CLASSES_DIR = 'Resources/install/classes/';

    public function __construct(
        private BundleTool $tools,
        private FolderManager $manager
    )
    {
        parent::__construct();
    }

    public function needsReloadAfterInstall(): bool
    {
        return true;
    }

    /**
     * @return bool
     * @throws \Doctrine\DBAL\Exception
     */
    public function canBeInstalled(): bool
    {
        return !$this->isInstalled();
    }

    /**
     * @return bool
     * @throws \Doctrine\DBAL\Exception
     */
    public function isInstalled(): bool
    {
        $db = Pimcore\Db::get();
        $check = $db->fetchOne('SELECT `key` FROM users_permission_definitions where `key` = ?', [ThisBundle::CATALOG_GENERATE_PERMISSION]);

        return (bool)$check;
    }

    /**
     * Install bundle
     * @throws \Exception
     */
    public function install(): bool
    {
        try{
            $this->createFolders();
            $this->installClasses();
            Definition::create(ThisBundle::CATALOG_GENERATE_PERMISSION );

        }catch(\Exception $e){
            throw new \Exception("Exception while installed bundle : ".$e->getMessage());
        }
        return true;
    }

    /**
     * @throws \Exception
     */
    private function installClasses() : void
    {
        if (file_exists($this->tools->getBundlePath() . self::INSTALL_CLASSES_DIR)) {
            $scanDir = rscandir($this->tools->getBundlePath() . self::INSTALL_CLASSES_DIR);
            if (!empty($scanDir)) {
                foreach ($scanDir as $path) {
                    $filename = basename($path);
                    $content = file_get_contents($path);

                    $parts = [];
                    if (1 === preg_match('/^class_(.*)_export\.json$/', $filename, $parts)) {
                        $name = $parts[1];
                        $definition = ClassDefinition::getByName($name);

                        if (!$definition) {
                            $definition = new ClassDefinition();
                            $definition->setName($name);
                        }

                        ClassDefinition\Service::importClassDefinitionFromJson($definition, $content, true);
                    }
                }
            }
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function createFolders() : void {

        $this->manager->getOrCreateObjectFolders([ThisBundle::BUNDLE_NAME]);
        $this->manager->getOrCreateObjectFolders([ThisBundle::BUNDLE_NAME,"Catalogs"]);

        $this->manager->getOrCreateAssetFolders([ThisBundle::BUNDLE_NAME]);
        $this->manager->getOrCreateAssetFolders([ThisBundle::BUNDLE_NAME,"Images"]);
        $this->manager->getOrCreateAssetFolders([ThisBundle::BUNDLE_NAME,"Covers"]);

    }
}
