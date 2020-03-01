<?php 

class TasksController{

	public function actionIndex($page = 1){
		$sort = 'name';
		$feedBack = false;
		if (isset($_POST['submitCreate'])){
			if (Tasks::createTask($_POST['name'], $_POST['email'], $_POST['text']))
				$feedBack = 'Task successfully added';
			else
				$feedBack = 'Your task cannot be added';
		}
		if (isset($_POST['submitSort'])){
			Tasks::saveSort($_POST['sort']);
			header("Location: " . $_SERVER['REQUEST_URI']);
		}
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