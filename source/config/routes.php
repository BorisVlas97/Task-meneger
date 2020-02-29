<?php

return array(
	'admin/page-([0-9]+)' => 'admin/index/$1',
	'page-([0-9]+)' => 'tasks/index/$1',
	'login' => 'login/login',
	'logout' => 'login/logout',
	'admin' => 'admin/index',
	'' => 'tasks/index',
);