<?php

namespace SimpleCatalogBundle\Model;

use Pimcore\Model\Asset;

class Configuration
{
    private string $_size;

    private int $_width;

    private int $_height;

    private int $_marginTop;

    private int $_marginBottom;

    private int $_marginLeft;

    private int $_marginRight;

    private int $_posDecimal;

    private ?Asset $_backgroundEven;

    private ?Asset $_backgroundOdd;

    private ?string $_backgroundColor;

    public function getSize() : string {
        return $this->_size;
    }

    public function getMarginWidth() : int {
        return $this->_width;
    }

    public function getMarginHeight() : int {
        return $this->_height;
    }

    public function getMarginTop() : int {
        return $this->_marginTop;
    }

    public function getMarginBottom() : int {
        return $this->_marginBottom;
    }

    public function getMarginLeft() : int {
        return $this->_marginLeft;
    }

    public function getMarginRight() : int {
        return $this->_marginRight;
    }

    public function getPosDecimal() : int {
        return $this->_posDecimal;
    }

    public function getBackgroundOdd() : ?Asset {
        return $this->_backgroundOdd;
    }

    public function getBackgroundEven() : ?Asset {
        return $this->_backgroundEven;
    }

    public function getBackgroundColor() : ?string {
        return $this->_backgroundColor;
    }

    public function setSize(string $size) : self {
        $this->_size = $size;
        return $this;
    }

    public function setWidth(int $width) : self {
        $this->_width = $width;
        return $this;
    }

    public function setHeight(int $height) : self {
        $this->_height = $height;
        return $this;
    }

    public function setMarginTop(int $margin) : self {
        $this->_marginTop = $margin;
        return $this;
    }

    public function setMarginBottom(int $margin) : self {
        $this->_marginBottom = $margin;
        return $this;
    }

    public function setMarginLeft(int $margin) : self {
        $this->_marginLeft = $margin;
        return $this;
    }

    public function setMarginRight(int $margin) : self {
        $this->_marginRight = $margin;
        return $this;
    }

    public function setPosDecimal(int $pos) : self {
        $this->_posDecimal = $pos;
        return $this;
    }

    public function setBackgroundOdd(?Asset $asset) : self {
        $this->_backgroundOdd = $asset;
        return $this;
    }

    public function setBackgroundEven(?Asset $asset) : self {
        $this->_backgroundEven = $asset;
        return $this;
    }

    public function setBackgroundColor(?string $color) : self {
        $this->_backgroundColor = $color;
        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function hydrate(array $data) : self {

        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this,$method)) {

                try{
                    $this->$method($value);
                }catch (\Exception $e) {

                }
            }
        }
        return $this;
    }
}
