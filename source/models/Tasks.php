<?php

class Tasks{

	public static function getTasksList($page, $sort){

		$db = Db::getConnection();

		$taskList = [];
		$page = ($page - 1) * 3;
		$result = mysqli_query($db, "SELECT *
									FROM `task`
									ORDER BY `$sort`
									LIMIT 3
									OFFSET $page"
									);
		while($row = mysqli_fetch_assoc($result)){
			$taskList[] = ['id' => $row['id'],
						'name' => $row['name'],
						'email' => $row['email'],
						'text' => $row['text'],
						'status' => $row['status'],
						'sort' => $sort,
						'edid' => $row['edid']];
		}
		return $taskList;
	}

	public static function getTotal(){
		$db = Db::getConnection();

		$result = mysqli_query($db, "SELECT count(id) AS count FROM `task`");
		$row = mysqli_fetch_assoc($result);
		return $row['count'];
	}

	public static function createTask($name, $email, $text){
		$result = false;
		$db = Db::getConnection();
		$result = mysqli_query($db, "INSERT INTO `task` (`name`, `email`, `text`) VALUES ('$name', '$email', '$text')");
		if ($result)
			return true;
		return false;
	}

	public static function checkEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
			return true;
		return false;
	}

	public static function saveSort($sort){
		session_start();
		$_SESSION['sort'] = $sort;
	}

	public static function checkSort(){
		session_start();
		if (isset($_SESSION['sort']))
			return $_SESSION['sort'];
		return false;
	}

}