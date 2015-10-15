<?php    
 
 	define('URL', '/IF3110-2015-T1/');
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', dirname(dirname(__FILE__)));
	 
	require_once (ROOT . DS . 'library' . DS . 'class.connection.php');

	if (isset($_GET['controller']) && isset($_GET['action'])) {
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	}
	else if (strcmp($_SERVER['REQUEST_URI'], URL) == 0 || strcmp($_SERVER['REQUEST_URI'], URL . 'index.php') == 0){ // default 
		$controller = 'thread';
		$action = 'home';
	}
	else {
		$controller = 'thread';
		$action = 'error';
	}

	if (isset($_GET['query'])) {
		$queryString = $_GET['query'];
	}
	else {
		$queryString = '';
	}

	require_once(ROOT . DS . 'application' . DS . 'view' . DS . 'layout.php');

?>
