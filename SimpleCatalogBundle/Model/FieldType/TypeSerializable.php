<?php

namespace SimpleCatalogBundle\Model\FieldType;

interface TypeSerializable
{
    public function serialize() : array;
}
