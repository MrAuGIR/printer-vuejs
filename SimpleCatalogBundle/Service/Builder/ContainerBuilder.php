<?php

namespace SimpleCatalogBundle\Service\Builder;

use Doctrine\Common\Collections\ArrayCollection;
use Pimcore\Model\DataObject;
use SimpleCatalogBundle\Model\Configuration;
use SimpleCatalogBundle\Model\Contained;
use SimpleCatalogBundle\Model\Container;
use SimpleCatalogBundle\Model\Item\Item;

class ContainerBuilder implements Builder
{
    private Container $_container;

    public function __construct(){
        $this->reset();
    }

    public function reset(): void {
        $this->_container = new Container();
    }

    /**
     * @param DataObject $object
     * @return void
     */
    public function buildContainer(DataObject $object) : void {
        $this->_container->setTitle($object->getTitle());
        $this->_container->setKey($object->getKey()?? '');
    }

    /**
     * @return Contained
     */
    public function getContainer(): Contained {
        return $this->_container;
    }

    public function setItems(DataObject $object)
    {
        $collection = new ArrayCollection();
        if (method_exists($object,"getItems")) {

            foreach ($object->getItems() as $item) {
                $collection->add(new Item($item));
            }
        }
        $this->_container->setItems($collection);
    }

    public function setConfiguration(DataObject $object)
    {
        /** @var DataObject\SContainer $object*/
        $configuration = new Configuration();
        $conf = [
            'size' => $object->getSize(),
            'marginTop' => $object->getMarginTop(),
            'marginBottom' => $object->getMarginBottom(),
            'marginLeft' => $object->getMarginLeft(),
            'marginRight' => $object->getMarginRight(),
            'backgroundOdd' => $object->getBackgroundOdd(),
            'backgroundEven' => $object->getBackgroundEven()
        ];
        $configuration = $configuration->hydrate($conf);

        $this->_container->setConfiguration($configuration);
    }

    public function addChild(Contained $container) : void {
        $this->_container->add($container);
    }
}
