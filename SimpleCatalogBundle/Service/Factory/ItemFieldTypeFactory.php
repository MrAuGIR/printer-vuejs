<?php

namespace SimpleCatalogBundle\Service\Factory;

use SimpleCatalogBundle\Model\FieldType\BooleanType;
use SimpleCatalogBundle\Model\FieldType\FieldCollectionType;
use SimpleCatalogBundle\Model\FieldType\LinkType;
use SimpleCatalogBundle\Model\FieldType\PictureType;
use SimpleCatalogBundle\Model\FieldType\TextType;
use SimpleCatalogBundle\Model\FieldType\TypeSerializable;

class ItemFieldTypeFactory implements FieldFactory
{

    public function createTextType(int $id,int $parentId, string $value): TypeSerializable
    {
        return new TextType($id,$parentId,$value);
    }

    public function createPictureType(int $id,int $parentId, string $value): TypeSerializable
    {
        return new PictureType($id,$parentId,$value);
    }

    public function createLinkType(int $id,int $parentId, string $value): TypeSerializable
    {
        return new LinkType($id,$parentId,$value);
    }

    public function createBooleanType(int $id,int $parentId, string $value): TypeSerializable
    {
        return new BooleanType($id,$parentId,$value);
    }

    public function createFieldCollectionsType(int $id,int $parentId, string $value): TypeSerializable
    {
        return new FieldCollectionType($id,$parentId,$value);
    }
}
