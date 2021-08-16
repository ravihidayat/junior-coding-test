<?php

class Book extends Product
{
    private $weight;

    public function __construct($sku = "", $name = "", $price = "", $attribute = [])
    {
        parent::__construct($sku, $name, $price);
        $this->weight = $this->setAttribute($attribute);
    }

    public function setAttribute($attribute)
    {
        $this->weight = "{$attribute['weight']}";
    }

    public function getAttribute()
    {
        return $this->weight;
    }
}
