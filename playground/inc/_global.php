<?php

function GetConnection()
{
	include __DIR__ . '/_password.php';
	$conn = new mysqli('localhost', 'telesduf1', $sql_password, 'telesduf1_db');
	return $conn;
}

function FetchAll($sql){
		$ret = array();
		$conn = GetConnection();
		$results = $conn->query($sql);
		
		$error = $conn->error;
		if($error){
			echo $error;
		}else{
			while ($rs = $results->fetch_assoc()) {
				$ret[] = $rs;
			}			
		}
		
		return $ret;	
}
