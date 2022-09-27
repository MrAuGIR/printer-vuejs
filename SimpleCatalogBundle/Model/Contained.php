<?php

namespace SimpleCatalogBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

interface Contained
{
    public function getTitle() : string;

    public function getKey() : string;

    public function getItems(): ArrayCollection;

    public function getConfiguration() : Configuration;

    public function getChildren() : \SplObjectStorage;

    public function add(Contained $container) : void;

}
