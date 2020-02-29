<?php

class LoginController{

	public function actionLogin(){
		
		$errors = false;
		if (isset($_POST['submit'])){
			$login = $_POST['login'];
			$password = $_POST['password'];
			$userId = Login::checkLogin($login, $password);
			if ($userId == false)
				$errors[] = 'Invalid username or password';
			else{
				Login::auth($userId);
				header('Location: /admin');
			}
		}
		require_once (ROOT . '/source/views/login.php');
		return true;
	}

	public function actionLogout(){
		session_start();
		unset($_SESSION['user']);
		header("Location: /");
	}
}
