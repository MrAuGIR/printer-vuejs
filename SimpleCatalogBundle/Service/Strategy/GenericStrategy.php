<?php

namespace SimpleCatalogBundle\Service\Strategy;

use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Service\Factory\Factory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GenericStrategy
{
    const TYPE_FIELD_SERIALIZE = [
        'input',
        'textarea',
        'wysiwyg',
        'externalImage',
        'localizedfields',
        'select',
        'link',
        'booleanSelect'
    ];

    const LOCAL = "en";

    private Factory $_factory;

    public function __construct(
      private EventDispatcherInterface $dispatcher
    ){
        $this->_factory = new Factory();
    }

    /**
     * @param DataObject $object
     * @return array
     */
    public function serialize(DataObject $object) : array {
        $return = [
            'id' => $object->getId(),
            'key' => $object->getKey(),
            'type' => 'item',
            'fields' => []
        ];

        foreach ($this->fieldGenerator($object) as $field => $data) {

            list($data,$value) = $data;
            if (!empty($type = $this->_factory->create($object,$data,$value))) {
                $return['fields'][] = $type->serialize();
            }
        }
        return $return;
    }

    /**
     * @param DataObject $object
     * @return \Generator
     */
    private function fieldGenerator(DataObject $object) : \Generator {
        $fields = $this->getAllowedFieldOnObjectClass($object->getClass()->getFieldDefinitions());

        foreach ($fields as $field => $data) {
            yield [$data, $this->getValue($object,$data->name)];
        }
    }

    /**
     * @param $fieldDefinition
     * @return array
     */
    private function getAllowedFieldOnObjectClass($fieldDefinition) : array {
        $return = [];
        foreach ($fieldDefinition as $field) {
            if (!in_array($field->fieldtype, self::TYPE_FIELD_SERIALIZE)) {
                continue;
            }
            if ($field instanceof DataObject\ClassDefinition\Data\Localizedfields) {
                foreach ($field->getChildren() as $child) {
                    $return = [...$return, ...[$child]];
                }
                continue;
            }
            $return = [...$return, ...[$field]];
        }
        return $return;
    }

    /**
     * @param DataObject $object
     * @param $field
     * @return string
     */
    private function getValue(DataObject $object,$field) : string {
        $method = 'get'.ucfirst($field);

        if (method_exists($object,$method)) {
            return $object->$method(self::LOCAL) ?? '';
        }
        return '';
    }
}
