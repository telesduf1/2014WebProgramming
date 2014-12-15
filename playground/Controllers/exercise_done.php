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
		$model = Exercise_Done::Blank();
		$view = 'exercise_done/edit.php';
		break;
	
	case 'save_POST':
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			$errors = Exercise_Done::Validate($_REQUEST);
			if(!$errors){
				$errors = Exercise_Done::Save($_REQUEST);
			}
			
			if(!$errors){
				//my_print($errors);
				if($format == 'json'){
					?> <script>alert("oi");</script> <?
					header("Location: ?action=edit&format=json&id=$_REQUEST[id]");
				}else{
					header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				}				
				die();
			}else{
				//my_print($errors);
				$model = $_REQUEST;
				$view = "exercise_done/edit.php";		
			}
			break;
	case 'delete':
		$model = Exercise_Done::Get($_REQUEST['id']);
		$view = "exercise_done/edit.php";
		break;
	case 'edit_GET':
		$model = Exercise_Done::Get($_REQUEST['id']);
		$view = "exercise_done/edit.php";		
		break;
	case 'delete_GET':
		$model = Exercise_Done::Get($_REQUEST['id']);
		$view = "exercise_done/delete.php";		
		break;
	case 'delete_POST':
		$errors = Exercise_Done::Delete($_REQUEST['id']);
		if($errors){
				$model = Exercise_Done::Get($_REQUEST['id']);
				$view = "exercise_done/delete.php";
		}else{
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				die();			
		}
		break;
	case 'index_GET':
	default:
		$model = Exercise_Done::Get();
		$view = 'exercise_done/index.php';		
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
	
