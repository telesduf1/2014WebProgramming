<?
ini_set('display_errors', 1);

include_once __DIR__ . '/../inc/_all.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null ;
$method = $_SERVER['REQUEST_METHOD'];
$format = isset($_REQUEST['format']) ? $_REQUEST['format'] : 'web';
$view = null;

switch ($action. '_' . $method) {
	case 'create_GET':
		$model = Food_Eaten::Blank();
		$view = 'food_eaten/edit.php';
		break;
	
	case 'save_POST':
			$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
			$errors = 0;//Food::Validate($_REQUEST);
			if(!$errors){
				$errors = Food_Eaten::Save($_REQUEST);
			}
			
			if(!$errors){
				my_print($errors);
				//header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
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
				$view = "food_eaten/edit.php";		
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
		$model = Food_Eaten::Get($_REQUEST['id']);
		$view = "food_eaten/edit.php";		
		break;
	case 'delete_GET':
		$model = Food_Eaten::Get($_REQUEST['id']);
		$view = "food_eaten/delete.php";		
		break;
	case 'delete_POST':
		$errors = Food_Eaten::Delete($_REQUEST['id']);
		if($errors){
				$model = Food_Eaten::Get($_REQUEST['id']);
				$view = "food_eaten/delete.php";
		}else{
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
				die();			
		}
		break;
	case 'index_GET':
	default:
		$model = Food_Eaten::Get();
		$view = 'food_eaten/index.php';		
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
	
