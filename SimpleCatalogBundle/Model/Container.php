<?php

namespace SimpleCatalogBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Container implements Contained
{
    private string $_title;

    private string $_key;

    private ArrayCollection $items;

    private Configuration $_configuration;

    /**
     * @var \SplObjectStorage
     */
    private \SplObjectStorage $_children;

    private Contained $_parent;

    public function __construct(){
        $this->_children = new \SplObjectStorage();
    }


    public function getTitle(): string
    {
        return $this->_title;
    }

    public function getKey(): string
    {
        return $this->_key;
    }

    public function getItems() : ArrayCollection {
        return $this->items;
    }

    public function getConfiguration(): Configuration
    {
        return $this->_configuration;
    }

    /**
     * @return \SplObjectStorage
     */
    public function getChildren() : \SplObjectStorage {
        return $this->_children;
    }

    /**
     * @return Contained|null
     */
    public function getParent() : ?Contained {
        return $this->_parent;
    }

    /**
     * @param Contained $container
     * @return void
     */
    public function add(Contained $container) : void {
        $container->setParent($this);
        $this->_children->attach($container);
    }

    public function remove(Contained $container) : void {
        $this->_children->detach($container);
        $container->setParent(null);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title) : self {
        $this->_title = $title;
        return $this;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey(string $key) : self {
        $this->_key = $key;
        return $this;
    }

    /**
     * @param ArrayCollection $collection
     * @return $this
     */
    public function setItems(ArrayCollection $collection) : self {
        $this->items = $collection;
        return $this;
    }

    /**
     * @param null|Contained $parent
     * @return $this
     */
    public function setParent(?Contained $parent) : self {
        $this->_parent = $parent;
        return $this;
    }

    /**
     * @param Configuration $configuration
     * @return $this
     */
    public function setConfiguration(Configuration $configuration) : self {
        $this->_configuration = $configuration;
        return $this;
    }
}
