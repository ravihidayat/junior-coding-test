<?php

namespace MyApp\models;

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct($sku = "", $name = "", $price = "", $height = "", $width = "", $length = "")
    {
        parent::__construct($sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
}
