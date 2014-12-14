<?
	ini_set('display_errors', 1);
	include_once __DIR__ . '/../inc/_all.php';
	
	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null ;
	$method = $_SERVER['REQUEST_METHOD'];
	$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
	$view = null;