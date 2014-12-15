<?php

include_once __DIR__ . '/../../inc/_all.php';
ini_set('display_errors', 1);

//get the q parameter from URL
$q = $_GET["q"];

session_start();
$user_id = $_SESSION['USER_ID'];

$foodTotal = 0;

	$sql = "SELECT f.calories as Calories 
			FROM Food_Eaten fe, Food f
			WHERE fe.Food_id = f.id
			AND   fe.date = '$q' 
			AND   fe.Users_id = $user_id   ";


	$result = FetchAll($sql);
				
  	foreach($result as $value) {
		$foodTotal += $value['Calories'];
  }
  

//output the response
echo $foodTotal;