<?php

namespace SimpleCatalogBundle\Service\Factory;

use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Event\PostCreateTypeField;
use SimpleCatalogBundle\Event\PreCreateTypeField;
use SimpleCatalogBundle\Model\FieldType\TypeSerializable;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Factory
{
    const PREFIX_CLASS = "\SimpleCatalogBundle\Model\FieldType\\";

    /**
     * @var FieldFactory
     */
    private FieldFactory $_factory;

    /**
     * @param FieldFactory $factory
     * @return $this
     */
    public function setFactory(FieldFactory $factory) : self {
        $this->_factory = $factory;
        return $this;
    }

    public function create(DataObject $object,DataObject\ClassDefinition\Data $data, string $value) : TypeSerializable {
        /** @var EventDispatcherInterface $dispatcher */
        $dispatcher = \Pimcore::getKernel()->getContainer()->get('event_dispatcher');

        $values = [
            $data->fieldtype,
            sprintf('%s-%s',$data->name,$object->getId()),
            $object->getId(),
            $value
        ];

        $className = $this->getType($data);

        return $this->getInstance($dispatcher,$object,$className,$values);
    }

    /**
     * @param DataObject\ClassDefinition\Data $data
     * @return string
     */
    private function getType(DataObject\ClassDefinition\Data $data) : string {

        $className = 'TextType';

        if(in_array($data->fieldtype,['input','textarea','wysiwyg','select'])){
            $className = static::PREFIX_CLASS.'TextType';
        }

        if($data->fieldtype === 'externalImage'){
            $className = static::PREFIX_CLASS.'PictureType';
        }

        if($data->fieldtype === 'fieldcollections'){
            $className = static::PREFIX_CLASS.'FieldCollectionType';
        }

        if($data->fieldtype === 'link'){
            $className = static::PREFIX_CLASS.'LinkType';
        }

        if($data->fieldtype === 'booleanSelect'){
            $className = static::PREFIX_CLASS.'BooleanType';
        }
        return $className;
    }

    /**
     * @param EventDispatcherInterface $dispatcher
     * @param DataObject $object
     * @param string $className
     * @param array $values
     * @return TypeSerializable
     */
    private function getInstance(EventDispatcherInterface $dispatcher, DataObject $object, string $className, array $values) : TypeSerializable {

        list($type,$id,$parentId,$value) = $values;

        /**
         * Event Pre-create type field
         */
        $event = $dispatcher->dispatch(new PreCreateTypeField($type,$object,$value,$className), PreCreateTypeField::NAME);

        $className = $event->getClassName();
        $value = $event->getValue();

        $field = new $className($id,$parentId,$value);

        /**
         * Event Post-create type field
         */
        $event = $dispatcher->dispatch(new PostCreateTypeField($field), PostCreateTypeField::NAME);

        return $event->getField();
    }
}
