<?php

use MyApp\core\Database;

abstract class Product
{
    private $sku;
    private $name;
    private $price;
    private $db;

    public function __construct($sku = "", $name = "", $price = "")
    {
        $this->db = new Database;

        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM product");
        return $this->db->getResultSet();
    }

    public function getSKU()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }


    abstract function getAttribute();
    abstract function setAttribute($attribute);
    // abstract function insertProduct();
}
