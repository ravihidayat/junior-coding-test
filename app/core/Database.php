<?php

namespace MyApp\core;

use PDO;
use PDOException;
use MyApp\config\Constants as Config;


class Database
{
    private $hostname = Config::DB_HOST;
    private $dbname = Config::DB_NAME;
    private $username = Config::DB_USERNAME;
    private $password = Config::DB_PASSWORD;
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

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $value = filter_var(rtrim($value), FILTER_SANITIZE_NUMBER_INT);
                    $type = PDO::PARAM_INT;
                    break;

                case is_double($value):
                    $value = filter_var(rtrim($value), FILTER_SANITIZE_NUMBER_FLOAT);
                    $value = strval($value);
                    $type = PDO::PARAM_STR;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $value = filter_var(rtrim($value), FILTER_SANITIZE_STRING);
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function getResultSet()
    {
        $this->stmt->execute();
        self::$dbh = null;
        return $this->stmt->fetchAll();
    }

    public function countRows()
    {
        return $this->stmt->rowCount();
    }
}
