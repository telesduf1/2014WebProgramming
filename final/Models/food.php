<?php

/**
 * 
 */
class Food {
	
	public static function Get($id=null)
	{
		$conn = GetConnection();
		$sql = "SELECT * FROM 2014Fall_Food_Eaten";
		$results = $conn->query($sql);
		
		$arr = array();
		
		while ($rs = $results->fetch_assoc()) {
			$arr[] = $rs;
		}
		
		$conn->close();
		return $arr;
	}
	
}
