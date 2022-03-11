<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', '', 'base_prueba');
		
		return $db;
	}
}
