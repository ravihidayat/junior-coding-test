<?php

use MyApp\models\Product;

class Book extends Product
{
    private $weight;

    public function __construct()
    {
        parent::__construct();
        $this->setType(3);
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
