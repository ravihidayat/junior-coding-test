<?php

class Furniture extends Product
{
    private $dimension;

    public function __construct($sku = "", $name = "", $price = "", $attribute = [])
    {
        parent::__construct($sku, $name, $price);
        $this->setAttribute($attribute);
    }

    public function setAttribute($attribute)
    {
        $this->dimension = "{$attribute['height']}x{$attribute['width']}x{$attribute['length']}";
    }

    public function getAttribute()
    {
        return $this->dimension;
    }

    // public function insertProduct()
    // {

    // }
}
