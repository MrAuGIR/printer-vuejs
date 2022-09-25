<?php

namespace SimpleCatalogBundle\Model\Item;

use Pimcore\Model\DataObject;

class Item implements Renderer
{
    private ?string $_indexPage;

    public function __construct(
        private DataObject $_object
    ){}

    /**
     * @param array $parameters
     * @return string
     */
    public function render(array $parameters = []) : string {

        return '';
    }

    /**
     * @return DataObject
     */
    public function getObject() : DataObject {
        return $this->_object;
    }

    /**
     * @return string|null
     */
    public function getIndexPage() : ?string {
        return $this->_indexPage;
    }
}
