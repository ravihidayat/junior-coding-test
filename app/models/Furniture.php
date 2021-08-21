<?php

use MyApp\models\Product;

class Furniture extends Product
{
    private $dimension;

    public function __construct()
    {
        parent::__construct();
        $this->setType(2);
    }

    public function setAttribute($attribute)
    {
        $this->dimension = "{$attribute['height']}x{$attribute['width']}x{$attribute['length']}";
    }

    public function getAttribute()
    {
        return $this->dimension;
    }
}
