<?
ini_set('display_errors', 1);

include_once __DIR__ . '/../inc/_all.php';
include_once __DIR__ . '/../inc/check_login.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null ;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view = null;

switch ($action. '_' . $method) {
	case 'create_GET':
		break;	
	case 'save_POST':
			break;
	case 'delete':
			break;
		break;
	case 'edit_GET':
		break;
	case 'delete_GET':
		break;
	case 'delete_POST':
		break;
	case 'index_GET':
	default:
		$view = 'dashboard/index.php';		
		break;
}

switch ($format) {
	case 'plain':
		include __DIR__ . '/../Views/' . $view;
		break;
	
	case 'json':
		echo json_encode($model);
		break;

	case 'web':
		
	default:
		include __DIR__ . '/../Views/shared/_Template.php';	
		break;
}
	
