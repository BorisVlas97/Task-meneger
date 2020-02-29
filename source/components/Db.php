<?php

class Db{

	public static function getConnection(){

		$paramsPath = ROOT . '/source/config/db_params.php';
		$params = include($paramsPath);

		$db = mysqli_connect($params['host'], $params['user'], $params['password'], $params['dbname']);

		return $db;
	}
}