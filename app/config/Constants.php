<?php

namespace MyApp\config;

class Constants
{
    const ASSETS = 'http://localhost/junior_coding_test/app/assets';
    const PUSH = 'add-product';
    const POP = './';
    const DB_HOST = 'localhost';
    const DB_NAME = 'phpmvc';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';

    public static function getSelf()
    {
        return new Constants;
    }

    public static function getAssets()
    {
        return self::ASSETS;
    }

    public static function getPop()
    {
        return self::POP;
    }
}
