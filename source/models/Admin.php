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
			$listId[] = ['id' => $row['id'],
						'text' => $row['text'],
						'edid' => $row['edid']];
		}
		foreach ($listId as $list) {
			$id = $list['id'];
			$status = 0;
			$text = $list['text'];
			$changed = $list['edid'];
			foreach ($arrayPost as $key => $value){
				if ($key == $id){
					$status = 1;
					break;
				}
			}
			foreach ($arrayPost as $key => $value){
				if ($key == ('text' . $id)){
					if ($text != $value){
						$text = $value;
						$changed = 1;
					}
					break;
				}
			}
			mysqli_query($db, "UPDATE `task` SET `status` = '$status', `text` = '$text', `edid` = '$changed' WHERE `task`.`id` = $id");
		}
	}
}