<?php

include_once __DIR__ . '/../../inc/_all.php';
ini_set('display_errors', 1);
header("Content-type: text/javascript");

//get the q parameter from URL
$q=$_GET["q"];

$foodId = $q;

$foodFound = Food::Get( $foodId );

$foodType = Food_Type::Get( $foodFound['Food_Category_id'] );

$response = array(
				array(
                	"id" => 'foodName',
                	"value" => "".$foodFound['name'].""
        		),
        		
				array(
                	"id" => 'foodType_id',
                	"value" => "".$foodFound['Food_Category_id'].""
        		),
        		
				array(
                	"id" => 'calories',
                	"value" => "".$foodFound['calories'].""
        		),
        		
				array(
                	"id" => 'fat',
                	"value" => "".$foodFound['fat'].""
        		),
        		
				array(
                	"id" => 'carbs',
                	"value" => "".$foodFound['carbs'].""
        		),
        		
				array(
                	"id" => 'protein',
                	"value" => "".$foodFound['protein'].""
        		)
);

echo json_encode($response);