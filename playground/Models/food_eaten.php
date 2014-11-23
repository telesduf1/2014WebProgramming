<?php

include_once __DIR__ . '/../inc/_all.php';

class Food_Eaten {

	public static function Blank() {
		return array('Id' => null, 'Date' => date('Y-m-d'), 'Time' => date('h:m'), 'Food_id' => null, 'Users_id' => null, 'Meal_Type_id' => null);
	}

	public static function Get($id = null) {
		$sql = "SELECT id as Id, created_at as Created, updated_at as Updated, date as Date, time as Time, Food_id, Users_id, Meal_Type_id  
				FROM Food_Eaten ";

		if ($id) {
			$sql .= "WHERE id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		} else {
			return FetchAll($sql);
		}
	}

	static public function Save(&$row) {
		$conn = GetConnection();
		$row2 = escape_all($row, $conn);
		$row2['Time'] = date('Y-m-d H:i:s', strtotime($row2['Time']));
		if (!empty($row['id'])) {
			/*
			$sql = "Update Food_Eaten
							Set Name='$row2[Name]', Type_id='$row2[Type_id]', Calories='$row2[Calories]',
								Fat='$row2[Fat]', Carbs='$row2[Carbs]', Fiber='$row2[Fiber]', Time='$row2[Time]'
						WHERE id = $row2[id]
						";*/
		} else {
			//If food was not found	
			if (empty($row2['Food_Id'])) {
				//Save Food First			
				$sql = "INSERT INTO Food
					(name, Food_Category_id, calories, fat, carbs, protein, created_at)
					VALUES ('$row2[Food_Name]', '$row2[Food_Type]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Protein]', Now())";
				
				$conn -> query($sql);
					
				$sql = "INSERT INTO Food_Eaten
						(Date, Time, created_at, Food_id, Users_id, Meal_Type_id)
						VALUES ('$row2[Date]', '$row2[Time]', Now(),  LAST_INSERT_ID(), 1, '$row2[Meal_Type]') ";
			} else {
				
				$sql = "INSERT INTO Food_Eaten
						(Date, Time, created_at, Food_id, Users_id, Meal_Type_id)
						VALUES ('$row2[Date]', '$row2[Time]', Now(),  '$row2[Food_Id]', 1, '$row2[Meal_Type]') ";
			}			
		}
		
		?> <script> alert("<?$sql?>"); </script> <?
		
		my_print( $sql );
		
		$results = $conn -> query($sql);
		
		$error = $conn -> error;

		if (!$error && empty($row['id'])) {
			$row['id'] = $conn -> insert_id;
		}

		$conn -> close();

		return $error ? array('sql error' => $error) : false;
	}

	static public function Delete($id) {
		$conn = GetConnection();
		$sql = "DELETE FROM Food_Eaten WHERE id = $id";
		$results = $conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();

		return $error ? array('sql error' => $error) : false;
	}

}
