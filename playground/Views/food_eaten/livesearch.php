<?php

include_once __DIR__ . '/../../inc/_all.php';

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {

	$sql = "SELECT *  
			FROM Food ";

		if ($q) {
			$sql .= "WHERE name like '$q%' ";
			$result = FetchAll($sql);
		} else {
			$result = FetchAll($sql);
		}

	$hint=" ";
				
  	foreach($result as $value) {
	
	if ($hint=="") {
          $hint ="<span onclick='updateForm(". $value['id'] .")' >" .$value['name'] . " </span>";
        } else {
          $hint=$hint . "<br /><span onclick='updateForm(". $value['id'] .")' >" . $value['name'] . " </span>";
        }
  }
  
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint == " ") {
  $response = "no food found";
} else {
  $response = $hint;
}

//output the response
echo $response;