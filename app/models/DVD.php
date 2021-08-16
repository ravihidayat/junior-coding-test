<?php

class DVD extends Product
{
    private $size;

    public function __construct($sku = "", $name = "", $price = "", $attribute = [])
    {
        parent::__construct($sku, $name, $price);
        $this->size = $this->setAttribute($attribute);
    }

    public function setAttribute($attribute)
    {
        $this->size = "{$attribute['size']}";
    }

    public function getAttribute()
    {
        return $this->size;
    }
}
