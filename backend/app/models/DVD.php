<?php

use MyApp\models\Product;

class DVD extends Product
{
    private $size;

    public function __construct()
    {
        parent::__construct();
        $this->setType(1);
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
