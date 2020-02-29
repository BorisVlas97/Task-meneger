<?php

class Admin{

	public static function updateData($arrayPost, $page, $sort){

		$db = Db::getConnection();
		$page = ($page - 1) * 3;
		$result = mysqli_query($db, "SELECT *
									FROM `task`
									ORDER BY `$sort`
									LIMIT 3
									OFFSET $page"
									);
		while($row = mysqli_fetch_assoc($result)){
			$listId[] = ['id' => $row['id']];
		}
		echo '<pre>';
		print_r($listId);
		echo '</pre>';
		echo '<pre>';
		print_r($arrayPost);
		echo '</pre>';
		foreach ($listId as $id) {
			$check = false;
			foreach ($arrayPost as $key => $value) {
				if ($key == $id['id']){
					$check = true;
					break;
				}
			}
			if ($check){
				mysqli_query($db, "UPDATE `task` SET `status` = '1' WHERE `task`.`id` =" . $id['id']);
				echo $id['id'] . 'status = 1<br>';
			}
			else{
				mysqli_query($db, "UPDATE `task` SET `status` = '0' WHERE `task`.`id` =" . $id['id']);
				echo $id['id'] . 'sattus = 0<br>';
			}
		}
	}
}