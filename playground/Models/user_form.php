<?php

include_once __DIR__ . '/../inc/_all.php';

class User_form {

	public static function Get($id = null) {
	}

	static public function Save(&$row) {
		$conn = GetConnection();
		
		$row2 = escape_all($row, $conn);
		
		//If there is a Social_id
		if (!empty($row['Social_id'])) { 					
			//Save User First			
			$sql = "INSERT INTO Users
				(first_name, last_name, gender, height, birthday, created_at)
				VALUES ('$row2[First_Name]', '$row2[Last_Name]', '$row2[Gender]', '$row2[Height]', '$row2[Birthday]', Now())";
			
			$conn -> query($sql);
			
			$user_id = $conn->insert_id;
			$conn = GetConnection();
			
			//Save its Current Wheight
			$sql = "INSERT INTO User_Wheight
				(wheight, Users_id, created_at)
				VALUES ('$row2[Current_Weight]', '$user_id', Now())";
			//my_print( $sql );
			$conn -> query($sql);
			
			//Save its Current Goal
			$sql = "INSERT INTO User_Goal
				(wheight, Goal_Catgory_id, Users_id, created_at)
				VALUES ('$row2[Goal_Weight]', '$row2[Goal_Type_id]', '$user_id', Now())";
			//my_print( $sql );
			$conn -> query($sql);
			
			//Save Login											
			$sql = "INSERT INTO Login
				(email_address, social_id, password, Users_id, created_at)
				VALUES ('$row2[Email]', '$row2[Social_id]', '$row2[Password]', '$user_id', Now())";
			
		} else {
		}
		
		$results = $conn -> query($sql);
		
		$error = $conn -> error;

		$conn -> close();

		return $error ? array('sql error' => $error) : false;
		
	}

	static public function Delete($id) {
	}

	static public function Validate($row)
	{
	}
}
