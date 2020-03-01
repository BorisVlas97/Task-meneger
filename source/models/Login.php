<?php

class Login{

	public static function checkLogin($login, $password){
		$db = Db::getConnection();
		$result = mysqli_query($db, "SELECT * FROM `user`");
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $value) {
			if ($row['name'] == $login and $row['password'] == $password)
				return $row['id'];
		}
		return false;
	}

	public static function auth($userId){
		session_start();
		$_SESSION['user'] = $userId;
	}

	public static function checkLogged(){
		session_start();
		if (isset($_SESSION['user']))
			return true;

		header("Location: /login");
	}
}