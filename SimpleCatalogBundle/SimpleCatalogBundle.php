<?php

namespace SimpleCatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

/**
 * 
 */
class SimpleCatalogBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/simplecatalog/js/pimcore/startup.js'
        ];
    }
}