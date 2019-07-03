<?php

require_once (dirname(__FILE__) . '/config.inc.php');
require_once (dirname(__FILE__) . '/class/MySQL.php');
require_once (dirname(__FILE__) . '/class/Model.php');
require_once (dirname(__FILE__) . '/class/Ad.php');

$path = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1);

if ($path == '') {
	$path = 'Index-Show';
}

//explode ('characterOrSymbolFromWhicToCut', $stringToAnalyse)
$controllerTmp 		= explode('-', $path);
//var_dump($path); //(when url empty) returns 'Index-Show' 
//var_dump($controllerTmp); //returns array [0]=>Index; [1]=>Show.


if (!isset($controllerTmp[1])) {
	$controllerTmp[1] = 'Show';
}

//Aded for the forms and the format ceciestuneurl?=blabla.
//strpos = true OR false
if (($pos = strpos($controllerTmp[1], '?')) !== false) {
	
	//$return = substr("abcdef", -3, 1); // returns "d"
	$params = substr($controllerTmp[1], $pos + 1);
	$controllerTmp[1] = substr($controllerTmp[1], 0, $pos);

	$params = explode('&', $params);
	foreach($params as $key => $value) {
		$_GET[$key] = $value;
	}
}
//Added for the forms till here.
//Index-Show--> $controllerAction= showaction;
//			--> $controllerClass = indexController;
$controllerAction 	= strtolower($controllerTmp[1]) . 'Action';
$controllerClass 	= $controllerTmp[0] . 'Controller';

//TEST IF CONTROLLER FILE EXIST
if (file_exists(dirname(__FILE__) . '/controllers/' . $controllerClass . '.php')) {

	//INCLUDE CONTROLLER FILE
	require_once(dirname(__FILE__) . '/controllers/' . $controllerClass . '.php');

	//TEST IF CONTROLLER CLASS EXIST
	if (!class_exists($controllerClass)) {
		$controllerClass = 'IndexController';
	}

	//INSTANCIATE CONTROLLER
	$controller = new $controllerClass();
	//create new IndexControler object if Index-Show

	//TEST IF METHOD EXIST
	if (!method_exists($controller, $controllerAction)) {
		$controllerAction = 'Show';
	}

	// Index-Show => call action showAction on IndexController, so
	// IndexController->showAction();
	$controller->$controllerAction();
} else {
	die('FILE NOT FOUND');
}