<?php

namespace MyApp\models;

abstract class Product
{
    private $sku;
    private $name;
    private $price;

    public function __construct($sku = "", $name = "", $price = "")
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }
}
