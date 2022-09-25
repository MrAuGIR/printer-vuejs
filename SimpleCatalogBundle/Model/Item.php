<?php

namespace SimpleCatalogBundle\Model;

use Pimcore\Model\DataObject;

class Item
{
    private int $_id;

    private DataObject $object;

    private ?string $indexPage;


    public function render(array $data = []) : string {

        return '';
    }
}
