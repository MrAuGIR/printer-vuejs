<?php

namespace SimpleCatalogBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class AbstractContainer
{
    private string $_title;

    private string $_key;

    private ArrayCollection $items;

    public function getItems() : ArrayCollection {
        return $this->items;
    }

    public function setItems(ArrayCollection $collection) : self {
        $this->items = $collection;
        return $this;
    }
}
