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
    private $charset = Config::CHARSET;
    private static $dbh;
    private $stmt;
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    public function __construct()
    {
        // Making the dbh or the handler static is I think could avoid having multiple connections.
        // Setting up charset to utf8mb4 could really help on mitigating SQL injections.
        $dsn = "mysql:host=$this->hostname;dbname=$this->dbname;charset=$this->charset;";
        try {
            self::$dbh = new PDO($dsn, $this->username, $this->password, $this->options);
        } catch (PDOException $error) {
            throw new PDOException($error->getMessage(), (int)$error->getCode());
        }
    }

    public function query($query)
    {
        // This avoids all models having their own statement, which basically isolates most of the operations,
        // and leaving the query methods only to the models.
        $this->stmt = self::$dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        // Perhaps could be called as a helper method, which makes binding easier, as it sanitizes input, and
        // setting the right type based on the value passed.
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $value = filter_var(trim($value), FILTER_SANITIZE_NUMBER_INT);
                    $type = PDO::PARAM_INT;
                    break;

                case is_double($value):
                    $value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $value = strval($value);
                    $type = PDO::PARAM_STR;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $value = filter_var(trim($value), FILTER_SANITIZE_STRING);
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        // Basically works like query() method, to make queries execution strictly belong to
        // the database class.
        $this->stmt->execute();
    }

    public function getResultSet()
    {
        // Gets all values from a table, which is what getAllProducts() is using.
        $this->stmt->execute();
        self::$dbh = null;
        return $this->stmt->fetchAll();
    }

    public function countRows()
    {
        // Returns the number of rows being modified, to signal whether the operation is indeed successful.
        return $this->stmt->rowCount();
    }
}
