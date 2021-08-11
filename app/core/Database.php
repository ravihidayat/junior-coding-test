<?php

namespace MyApp\core;

use PDO;
use PDOException;

class Database
{
    private $hostname = DB_HOST;
    private $dbname = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function __construct()
    {
        $dsn = "mysql:host=$this->hostname;dbname=$this->dbname";
        try {
            $pdo = new PDO($dsn, $this->username, $this->password, $this->options);
            return $pdo;
        } catch (PDOException $error) {
            throw new PDOException($error->getMessage(), (int)$error->getCode());
        }
    }
}
