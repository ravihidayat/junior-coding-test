<?php

namespace MyApp\core;

use PDO;
use PDOException;
use MyApp\config\Constants;


class Database
{
    private $hostname = Constants::DB_HOST;
    private $dbname = Constants::DB_NAME;
    private $username = Constants::DB_USERNAME;
    private $password = Constants::DB_PASSWORD;
    private static $dbh;
    private $stmt;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    public function __construct()
    {
        $dsn = "mysql:host=$this->hostname;dbname=$this->dbname";
        try {
            self::$dbh = new PDO($dsn, $this->username, $this->password, $this->options);
        } catch (PDOException $error) {
            throw new PDOException($error->getMessage(), (int)$error->getCode());
        }
    }

    public function query($query)
    {
        $this->stmt = self::$dbh->prepare($query);
    }

    public function getResultSet()
    {
        $this->stmt->execute();
        self::$dbh = null;
        return $this->stmt->fetchAll();
    }
}
