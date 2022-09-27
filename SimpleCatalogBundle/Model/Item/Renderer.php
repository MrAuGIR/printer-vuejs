<?php

namespace SimpleCatalogBundle\Model\Item;

use Pimcore\Model\DataObject;

interface Renderer
{
    public function getObject() : DataObject;

    public function render(array $parameters = []) : string;
}
