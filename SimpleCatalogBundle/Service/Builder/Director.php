<?php

namespace SimpleCatalogBundle\Service\Builder;

use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Model\Contained;

class Director
{

    private Builder $_builder;

    /**
     * @param Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder) : self {
        $this->_builder = $builder;
        return $this;
    }

    /**
     * @param DataObject $object
     * @return Contained
     */
    public function buildContainer(DataObject $object) : Contained {
        $this->_builder->buildContainer($object);
        $this->_builder->setItems($object);
        $this->_builder->setConfiguration($object);

        if (!empty($object->getChildren())) {

            foreach ($object->getChildren() as $child) {
                $director = (new Director())->setBuilder(new ContainerBuilder());
                $container = $director->buildContainer($child);
                $this->_builder->addChild($container);
            }
        }
        return $this->_builder->getContainer();
    }

}
