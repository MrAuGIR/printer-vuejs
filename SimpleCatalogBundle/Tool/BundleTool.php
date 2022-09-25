<?php

namespace SimpleCatalogBundle\Tool;

use Pimcore;
use SimpleCatalogBundle\SimpleCatalogBundle as ThisBundle;

class BundleTool
{
    const DATA_OBJECT_FOLDER_PATH = "/SimpleCatalog";
    const DATA_ASSET_FOLDER_PATH ="/SimpleCatalog";

    public function getBundlePath() {
        return Pimcore::getContainer()->get("kernel")->locateResource("@". ThisBundle::BUNDLE_ID );
    }
}
