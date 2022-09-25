<?php

namespace SimpleCatalogBundle\Service\Builder;

use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Model\Contained;

interface Builder
{
    public function buildContainer(DataObject $object) : void;

    public function setItems(DataObject $object);

    public function setConfiguration(DataObject $object);

    public function getContainer() : Contained;
}
