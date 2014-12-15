<?php

include_once __DIR__ . '/../../inc/_all.php';
ini_set('display_errors', 1);

//get the q parameter from URL
$q = $_GET["q"];

session_start();
$user_id = $_SESSION['USER_ID'];

$exerciseTotal = 0;

	$sql = "SELECT e.calories as Calories
			FROM Exercise_Done ed, Exercise e
			WHERE ed.Exercise_id = e.id AND ed.date = '$q'  AND ed.Users_id = $user_id  ";

	
	$result = FetchAll($sql);
				
  	foreach($result as $value) {
		$exerciseTotal += $value['Calories'];
  	}
  

//output the response
echo $exerciseTotal;
