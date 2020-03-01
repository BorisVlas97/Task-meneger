<?php

class AdminController{

	public function actionIndex($page = 1){

		$userId = Login::checkLogged();
		$sort = 'name';
		if (isset($_POST['submitSort'])){
			Tasks::saveSort($_POST['sort']);
			header("Location: " . $_SERVER['REQUEST_URI']);
		}
		if (($newsort = Tasks::checkSort()))
			$sort = $newsort;
		if (isset($_POST['submitUpdate']) and $userId)
			Admin::updateData($_POST, $page, $sort);
		$tasksList = [];
		$tasksList = Tasks::getTasksList($page, $sort);
		$total = Tasks::getTotal();

		$pagination = new Pagination($total, $page, 3, 'page-');
		require_once (ROOT . '/source/views/admin.php');
		return true;
	}
}
