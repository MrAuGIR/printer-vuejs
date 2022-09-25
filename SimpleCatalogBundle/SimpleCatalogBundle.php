<?php

namespace SimpleCatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use SimpleCatalogBundle\Service\Installer;

class SimpleCatalogBundle extends AbstractPimcoreBundle
{
    const BUNDLE_ID              = "SimpleCatalogBundle";
    const BUNDLE_NAME            = "SimpleCatalogBundle";
    const BUNDLE_DESCRIPTION     = "Dev for learning - simple tool for create catalog";
    const BUNDLE_VERSION         = "1.0.0";
    const BUNDLE_REVISION        = 1;
    const PIMCORE_MIN_VERSION    = "10.0.0";
    const CATALOG_GENERATE_PERMISSION  = "simple_catalog_generate_permission";


    public function getJsPaths()
    {
        return [
            '/bundles/simplecatalog/js/pimcore/startup.js'
        ];
    }

    /**
     * @return string
     */
    public function getNiceName() : string
    {
        return self::BUNDLE_NAME;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return self::BUNDLE_DESCRIPTION;
    }

    /**
     * @return string
     */
    public function getVersion() : string
    {
        return self::BUNDLE_VERSION;
    }

    /**
     * {@inheritdoc}
     */
    public function getInstaller() : null|Object
    {
        return $this->container->get(Installer::class);
    }

}
