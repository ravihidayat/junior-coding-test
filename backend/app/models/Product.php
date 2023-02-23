<?php

namespace MyApp\models;

use MyApp\core\Database;

abstract class Product
{
    private $sku;
    private $name;
    private $price;
    private $type;
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProducts()
    {
        $this->db->query("SELECT * FROM ((product
                            INNER JOIN attribute_type ON product.type_id = attribute_type.attribute_type_id)
                            INNER JOIN product_value ON product.sku = product_value.sku)");
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

    public function getType()
    {
        return $this->type;
    }

    public function setSKU($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function insertProduct()
    {
        $query = "INSERT INTO product 
                    VALUES (:sku, :product_name, :price, :type_id)";

        $this->db->query($query);
        $this->db->bind(':sku', $this->getSKU());
        $this->db->bind(':product_name', $this->getName());
        $this->db->bind(':price', $this->getPrice());
        $this->db->bind(':type_id', $this->getType());
        $this->db->execute();

        return $this->db->countRows();
    }

    public function insertProductValue()
    {
        $query = "INSERT INTO product_value 
                    VALUES (:sku, :attribute_type_id, :value)";

        $this->db->query($query);
        $this->db->bind(':sku', $this->getSKU());
        $this->db->bind(':attribute_type_id', $this->getType());
        $this->db->bind(':value', $this->getAttribute());
        $this->db->execute();

        return $this->db->countRows();
    }

    public function deleteProducts($sku)
    {
        $implodedSku = "('" . implode("', '", $sku) . "')";
        $query = "DELETE FROM product WHERE sku IN $implodedSku";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->countRows();
    }

    abstract function getAttribute();
    abstract function setAttribute($attribute);
}
