<?php

namespace SimpleCatalogBundle\Service\Factory;

use SimpleCatalogBundle\Model\FieldType\TypeSerializable;

interface FieldFactory
{
    public function createTextType(int $id,int $parentId, string $value) : TypeSerializable;

    public function createPictureType(int $id,int $parentId, string $value) : TypeSerializable;

    public function createLinkType(int $id,int $parentId, string $value) : TypeSerializable;

    public function createBooleanType(int $id,int $parentId, string $value) : TypeSerializable;

    public function createFieldCollectionsType(int $id,int $parentId, string $value) : TypeSerializable;

}
