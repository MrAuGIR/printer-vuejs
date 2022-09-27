<?php

namespace SimpleCatalogBundle\Event;

use Pimcore\Model\DataObject;

class PreCreateTypeField extends \Symfony\Contracts\EventDispatcher\Event
{
    public const NAME = 'typeField.preCreate';

    public function __construct(
        private string $_type,
        private DataObject $_object,
        private mixed $_value,
        private string $_className
    ){}

    public function getType() : string {
        return $this->_type;
    }

    public function getObject() : DataObject {
        return $this->_object;
    }

    public function getValue() : mixed {
        return $this->_value;
    }

    public function getClassName() : string {
        return $this->_className;
    }
}
