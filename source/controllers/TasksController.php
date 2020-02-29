<?php 

class TasksController{

	public function actionIndex($page = 1){
		$sort = 'name';

		if (isset($_POST['submitCreate']))
			Tasks::createTask($_POST['name'], $_POST['email'], $_POST['text']);
		if (isset($_POST['submitSort']))
			Tasks::saveSort($_POST['sort']);
		if (($newsort = Tasks::checkSort()))
			$sort = $newsort;
		$tasksList = [];
		$tasksList = Tasks::getTasksList($page, $sort);

		$total = Tasks::getTotal();

		$pagination = new Pagination($total, $page, 3, 'page-');
		require_once(ROOT . '/source/views/index.php');

		return true;
	}

}