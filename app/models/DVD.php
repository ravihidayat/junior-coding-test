<?php

namespace MyApp\models;

class DVD extends Product
{
    private $size;

    public function __construct($sku = "", $name = "", $price = "", $size = "")
    {
        parent::__construct($sku, $name, $price);
        $this->size = $size;
    }
}
