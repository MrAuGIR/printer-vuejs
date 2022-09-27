<?php

namespace SimpleCatalogBundle\Model\FieldType;

class FieldCollectionType implements TypeSerializable
{
    public string $type = 'FIELDCOLLECTION';

    public function __construct(
        public string $id,
        public int $parentId,
        public string|array $value
    ){}

    public function serialize(): array
    {
        return [
            'id' => $this->id,
            'parentId' => $this->parentId,
            'type' => $this->type,
            'value' => $this->value
        ];
    }
}
