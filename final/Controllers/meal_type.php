<?
ini_set('display_errors', 1);

include_once __DIR__ . '/../inc/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null ;
$method = isset($_POST['submit']) ? 'POST' : 'GET';
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view = null;

switch ($action. '_' . $method) {
	case 'create_GET':
		$model = Meal_Type::Blank();
		$view = 'meal_type/edit.php';
		break;
	
	case 'save_POST':
		// Validate
		if($_REQUEST['id'])
		{
			//update
			//Food::Save($_REQUEST);
		}else{
			//create
			//Food::Save($_REQUEST);
		}
		// if error
		//		display error message
		//		re display form
		// else
		//		congratulate user
		//		display list including edited/new frow
		break;
	case 'edit_GET':
		$model = Meal_Type::Get($_REQUEST['id']);
		$view = "meal_type/edit.php";		
		break;
	case 'delete_GET':
		$model = Meal_type::Get($_REQUEST['id']);
		$view = "meal_type/delete.php";		
		break;
	case 'delete_POST':
		$errors = Meal_Type::Delete($_REQUEST['id']);
		if($errors){
				$model = Meal_Type::Get($_REQUEST['id']);
				$view = "meal_type/delete.php";
		}else{
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				die();			
		}
		break;
	case 'index_GET':
	default:
		$model = Meal_Type::Get();
		$view = 'meal_type/index.php';		
		break;
}

switch ($format) {
	case 'plain':
		include __DIR__ . '/../Views/' . $view;
		break;
	
	case 'json':
		echo json_encode(model);
		break;

	case 'web':
		
	default:
		include __DIR__ . '/../Views/shared/_Template.php';	
		break;
}
	
