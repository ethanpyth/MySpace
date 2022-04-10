<?php

/**
 * Php Class to get databse instance
 */
class Database {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=myspace', 'root', '', $pdo_options);
        }
        return self::$instance;
    }
}
