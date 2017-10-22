<?php
/**
* Data class for making set and get requests
*/
namespace Classes;
use PDO;
class Data
{
	static $connection;

	public static function set($query)
	{
		self::connect()->query($query);
	}

	public static function get($query)
	{
		$result = self::connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	private static function connect()
	{
		self::$connection = new PDO('mysql:dbname=curran_test;host.127.0.0.1', 'root', 'root');
		return self::$connection;
	}
}