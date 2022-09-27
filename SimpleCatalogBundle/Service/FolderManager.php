<?php

namespace SimpleCatalogBundle\Service;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;

class FolderManager
{
    private const ROOT_OBJECT_FOLDER_PATH = "/";
    private const ROOT_ASSET_FOLDER_PATH = "/";

    /**
     * @param array $targetPath
     * @return string
     * @throws \Exception
     */
    public function getOrCreateObjectFolders(array $targetPath) : string{

        $root = DataObject\Folder::getByPath(self::ROOT_OBJECT_FOLDER_PATH);

        foreach ($targetPath as $key){

            $path = $root->getFullPath().'/'.$key;
            $root = $this->getOrCreateDataObjectFolder($root,$path,$key);

        }
        return $root;
    }

    /**
     * @param array $targetPath
     * @return string
     * @throws \Exception
     */
    public function getOrCreateAssetFolders(array $targetPath) : string {

        $root = Asset\Folder::getByPath(self::ROOT_ASSET_FOLDER_PATH);

        foreach ($targetPath as $key){

            $path = $root->getFullPath().'/'.$key;
            $root = $this->getOrCreateAssetFolder($root,$path,$key);

        }
        return $root;
    }

    /**
     * @param DataObject\Folder $root
     * @param string $path
     * @param string $key
     * @return DataObject\Folder
     * @throws \Exception
     */
    public function getOrCreateDataObjectFolder(DataObject\Folder $root,string $path, string $key): DataObject\Folder {
        $folder = DataObject\Folder::getByPath($path);
        if(!$folder){
            $folder = new DataObject\Folder();
            $folder->setParentId($root->getId());
            $folder->setKey($key);
            $folder->save();
        }
        return $folder;
    }

    /**
     * @param Asset\Folder $root
     * @param string $path
     * @param string $key
     * @return Asset\Folder
     * @throws \Exception
     */
    public function getOrCreateAssetFolder(Asset\Folder $root, string $path, string $key): Asset\Folder {
        $folder = Asset\Folder::getByPath($path);
        if(!$folder){
            $folder = new Asset\Folder();
            $folder->setParentId($root->getId());
            $folder->setKey($key);
            $folder->save();
        }
        return $folder;
    }

}
