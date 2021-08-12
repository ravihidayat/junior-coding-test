<?php

namespace MyApp\models;

class Book extends Product
{
    private $weight;

    public function __construct($sku = "", $name = "", $price = "", $weight = "")
    {
        parent::__construct($sku, $name, $price);
        $this->weight = $weight;
    }
}
