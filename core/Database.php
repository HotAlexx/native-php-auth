<?php
require_once('db_config.php');

class Database
{
    public $pdo;
    private static $_instance = null;

	private function __construct () {

        $this->pdo = new PDO(
            DB_DSN,
            DB_USER,
            DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );

    }

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}