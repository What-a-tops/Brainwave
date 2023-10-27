<?php
	
	class Database 
	{
		// $ip = $_SERVER['REMOTE_ADDR'];
		// echo $ip;
	    // private static $dsn = 'mysql:host=192.168.0.1;dbname=brainwave';
	    private static $dsn = 'mysql:host=localhost;dbname=brainwave';
	    private static $username = 'brainwave';
	    private static $password = '';
	    private static $pdo;

	    private function __construct() {}

	    public static function getDB() {
	        if (!isset(self::$pdo)) {
	            try {
	                self::$pdo = new PDO(self::$dsn, self::$username, self::$password);
	            } catch (PDOException $e) {
	                die($e->getMessage());
	            }
	        }

	        return self::$pdo;
	    }
	}

	
?>