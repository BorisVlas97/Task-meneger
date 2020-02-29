<?php

class Router{

	private $routes; //массив маршрутов

	public function __construct(){
		$routesPath = ROOT . '/source/config/routes.php';
		$this->routes = include($routesPath);
	}

	private function getURI(){
		if (!empty($_SERVER['REQUEST_URI']))
			return trim($_SERVER['REQUEST_URI'], '/');
	}

	public function run(){ 
		// Получить строку запроса

		$uri = $this->getURI();

		// Проверить наличие такого запроса в файле routes.php

		foreach ($this->routes as $uriPattern => $path) {
			if (preg_match("~$uriPattern~", $uri)){

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);


				$segments = explode('/', $internalRoute);

				//echo '<pre>';
				//print_r($segments);
				//print_r($_POST);
				//echo '</pre>';
				$controllerName = array_shift($segments) . 'Controller';
				$controllerName = ucfirst($controllerName);
				$actionName = 'action' . ucfirst(array_shift($segments));
				$parameters = $segments;

				$controllerFile = ROOT . '/source/controllers/' . $controllerName . '.php';

				if (file_exists($controllerFile))
					include_once($controllerFile);

				$controllerObject = new $controllerName;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if ($result != null){
					break;
				}
			}
		}
		// Если есть совпадение, определить какой контроллер и action обрабатывают запрос

		// Подключить файл класса-контроллера

		// создать объект, вызвать метод (т. е. action)
	}

	public static function redirect($name){
		header("Location: $name");
	}
}