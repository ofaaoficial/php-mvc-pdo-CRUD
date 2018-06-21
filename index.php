<?php
require_once('core/core.php');
if(!isset($_REQUEST['c'])){
	$controller = 'administrator';
	require_once('controllers/'.$controller.'Controller.php');
	$controller = $controller . 'Controller';
	$controller = new $controller;
	$controller->index();
}else{
	$controller = $_REQUEST['c'];
	if(file_exists('controllers/'.$controller.'Controller.php')){
		require_once('controllers/'.$controller.'Controller.php');
		$controller = $controller.'Controller';
		$controller = new $controller;
		$method = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'index';
			if(method_exists($controller,$method)){
				call_user_func(array($controller,$method));	
			}else{
				echo 'Error - 1';
			}
	}else{
		echo 'Error - 2';
	}
}
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/

