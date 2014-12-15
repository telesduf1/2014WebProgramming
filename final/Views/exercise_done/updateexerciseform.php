<?php

include_once __DIR__ . '/../../inc/_all.php';

ini_set('display_errors', 1);

header("Content-type: text/javascript");

//get the q parameter from URL
$q = $_GET["q"];

$exerciseId = $q;

if(empty($exerciseId)){
	$exerciseFound = Exercise::Blank();
}
else{
	$exerciseFound = Exercise::Get( $exerciseId );	
}

$response = array(

				array(
                	"id" => 'exerciseId',
                	"value" => "".$exerciseFound['id'].""
        		),
        		
				array(
                	"id" => 'exerciseName',
                	"value" => "".$exerciseFound['name'].""
        		),
        		        		
				array(
                	"id" => 'calories',
                	"value" => "".$exerciseFound['calories'].""
        		),
        		
				array(
                	"id" => 'time',
                	"value" => "".$exerciseFound['time'].""
        		)
);

echo json_encode($response);