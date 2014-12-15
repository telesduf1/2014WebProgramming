<?php

include_once __DIR__ . '/../../inc/_all.php';
ini_set('display_errors', 1);
//get the q parameter from URL
$q=$_GET["q"];
$foodId = 0;

if (strlen($q)>0) {

	$sql = "SELECT *  
			FROM Food ";

		if ($q) {
			$sql .= "WHERE name like '$q%' ";
			$result = FetchAll($sql);
		} else {
			$result = FetchAll($sql);
		}

	$hint = " ";
	$foodId = " ";
				
  	foreach($result as $value) {
	
	if ($hint=="") {
		  $foodId = $value['id'];	
          $hint ="<div style='margin: 0px -15px; padding: 5px' onmouseover='mouseOver(this)' onmouseout='mouseOut(this)' onclick='updateForm(". $foodId .")' >" .$value['name'] . "  </div> ";
        } else {
          $foodId = $value['id'];	
          $hint=$hint . "<div style='margin: 0px -15px; padding: 5px' onmouseover='mouseOver(this)' onmouseout='mouseOut(this)' onclick='updateForm(". $foodId .")' >" . $value['name'] . " </div> ";
        }
  }
  
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint == " ") {
  $response = "";//"no food found";
} else {
  $response = $hint;
}

//output the response
echo $response;