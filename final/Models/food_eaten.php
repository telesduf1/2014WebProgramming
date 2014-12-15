<?php

include_once __DIR__ . '/../inc/_all.php';

class Food_Eaten {

	public static function Blank() {
		return array('Id' => null, 'Date' => date('Y-m-d'), 'Time' => date('h:i'), 'Food_id' => null, 'Users_id' => null, 'Meal_Type_id' => null, 'Food_Name' => null, 'Calories' => null,
					 'Fat' => null, 'Carbs' => null, 'Protein' => null, 'Friend_Name' => null );
	}

	public static function Get($id = null) {
		$user_id = $_SESSION['USER_ID'];
		
		$sql = "SELECT fe.id as Id, fe.created_at as Created, fe.updated_at as Updated, fe.date as Date, fe.time as Time, fe.Food_id as Food_id, 
					   fe.Users_id as User_id, fe.Meal_Type_id as Meal_Type_id, mt.name as Meal_Type, f.name as Food_Name, f.calories as Calories, 
					   f.carbs as Carbs, f.fat as Fat, f.protein as Protein, ft.name as Food_Type, f.Food_Category_id as Food_Category_id, fe.friend as Friend_Name 
				FROM Food_Eaten fe, Food f, Meal_Type mt, Food_Category ft
				WHERE fe.Meal_Type_id = mt.id
				AND   fe.Food_id = f.id
				AND   f.Food_Category_id = ft.id 
				AND   fe.Users_id = $user_id ";

		if ($id) {
			$sql .= "AND fe.id=$id ";
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
		
		$user_id = $_SESSION['USER_ID'];
		
		if (!empty($row['id'])) {
			if (empty($row['Food_Id'])) {					
				//Save Food First			
				$sql = "INSERT INTO Food
					(name, Food_Category_id, calories, fat, carbs, protein, created_at)
					VALUES ('$row2[Food_Name]', '$row2[Food_Type]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Protein]', Now())";
				
				$conn -> query($sql);
												
				$sql = "Update Food_Eaten
						Set Date='$row2[Date]', Time='$row2[Time]', Food_id=LAST_INSERT_ID(), Meal_Type_id='$row2[Meal_Type]', friend='$row2[Friend_Name]'
						WHERE id = $row2[id]
					";				
			} else {
				
			//Update Food First				
			$sql = "Update Food
						
					Set name='$row2[Food_Name]', calories='$row2[Calories]', fat='$row2[Fat]', 
					carbs='$row2[Carbs]', protein='$row2[Protein]', Food_Category_id='$row2[Food_Type]'
					WHERE id = $row2[Food_Id]";
				
			$conn -> query($sql);

				$sql = "Update Food_Eaten
						Set Date='$row2[Date]', Time='$row2[Time]', Food_id='$row2[Food_Id]', Meal_Type_id='$row2[Meal_Type]', friend='$row2[Friend_Name]'
						WHERE id = $row2[id]
					";
			}
		} else {
			//If food was not found	
			if (empty($row2['Food_Id'])) {
					
				//Save Food First			
				$sql = "INSERT INTO Food
					(name, Food_Category_id, calories, fat, carbs, protein, created_at)
					VALUES ('$row2[Food_Name]', '$row2[Food_Type]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Protein]', Now())";
				
				$conn -> query($sql);
					
				$sql = "INSERT INTO Food_Eaten
						(Date, Time, created_at, Food_id, Users_id, Meal_Type_id, friend)
						VALUES ('$row2[Date]', '$row2[Time]', Now(),  LAST_INSERT_ID(), $user_id, '$row2[Meal_Type]', '$row2[Friend_Name]') ";
			} else {
				//Update Food First			
			$sql = "Update Food
					Set name='$row2[Food_Name]', calories='$row2[Calories]', fat='$row2[Fat]', 
					carbs='$row2[Carbs]', protein='$row2[Protein]', Food_Category_id='$row2[Food_Type]'
					WHERE id = $row2[Food_Id]";
				
				$conn -> query($sql);
								
				$sql = "INSERT INTO Food_Eaten
						(Date, Time, created_at, Food_id, Users_id, Meal_Type_id, friend)
						VALUES ('$row2[Date]', '$row2[Time]', Now(),  '$row2[Food_Id]', $user_id, '$row2[Meal_Type]', '$row2[Friend_Name]') ";
			}			
		}
				
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

	static public function Validate($row)
	{
	}
}
