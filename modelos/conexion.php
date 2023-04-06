<?php

define("USER", "root");
define("SERVER", "localhost");
define("BD", "pos");
define("PASS", "");

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=".SERVER.";dbname=".BD, USER, PASS);

		$link->exec("set names utf8");

		return $link;
	}
}