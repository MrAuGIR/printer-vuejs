<?php

namespace SimpleCatalogBundle\Event;

use SimpleCatalogBundle\Model\FieldType\TypeSerializable;

class PostCreateTypeField extends \Symfony\Contracts\EventDispatcher\Event
{
    public const NAME = 'typeField.postCreate';

    public function __construct(
        private TypeSerializable $_field
    ){}

    public function getField() : TypeSerializable {
        return $this->_field;
    }
}
