<?
ini_set('display_errors', 1);

include_once __DIR__ . '/../inc/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null ;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view = null;

switch ($action. '_' . $method) {
	case 'create_GET':
		$model = User_Form::Blank();
		$view = 'user_form/edit.php';
		break;
	
	case 'save_POST':
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			//$errors = User_Form::Validate($_REQUEST);

			$errors = User_Form::Save($_REQUEST);
			
			if(!$errors){
				Login::Validate($_REQUEST);
				die();
			}else{
				my_print($errors);
				$model = $_REQUEST;
				$view = "user_form/index.php";		
			}
			break;
	case 'delete':
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				//Promt
			}else{
				
			}
			break;
		break;
	case 'edit_GET':
		$model = User_Form::Get($_REQUEST['id']);
		$view = "user_form/edit.php";		
		break;
	case 'delete_GET':
		$model = User_Form::Get($_REQUEST['id']);
		$view = "user_form/delete.php";		
		break;
	case 'delete_POST':
		$errors = User_Form::Delete($_REQUEST['id']);
		if($errors){
				$model = User_Form::Get($_REQUEST['id']);
				$view = "user_Form/delete.php";
		}else{
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				die();			
		}
		break;
	case 'index_GET':
	default:
		//$model = User_Form::Get();
		$view = 'user_form/index.php';		
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
		include __DIR__ . '/../Views/user_form/index.php';
		break;
}
	
