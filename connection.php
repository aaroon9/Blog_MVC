<?php
	 class Db {
	 private static $instance = NULL;
	 private function __construct() {}
	 private function __clone() {}

	 public static function getInstance() {
	 	//Si no hay una conecxion creada se crea una en el caso de que ya exista solamente devuelve la conexion.
	 if (!isset(self::$instance)) {

		 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		 self::$instance = new PDO('mysql:host=localhost;dbname=bloc_php_mvc', 'root', '',
		 $pdo_options);
	 }
	 return self::$instance;
 	}
 }
?>