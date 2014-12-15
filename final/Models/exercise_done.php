<?php

include_once __DIR__ . '/../inc/_all.php';

class Exercise_Done{

	public static function Blank() {
		return array('Id' => null,  'Exercise_Id' => null, 'Exercise_Name' => null, 'Date' => date('Y-m-d'), 'Time' => 1, 'Start_Time' => date('h:i'), 'End_Time' => null, 'Friend_Name' => null );
	}

	public static function Get($id = null) {
		$user_id = $_SESSION['USER_ID'];
		
		$sql = "SELECT ed.id as Id, e.name as Exercise_Name, e.calories as Calories, e.time as Time, 
       				   ed.date as Date, e.id as Exercise_Id, ed.start_time as Start_Time, 
       				   ed.end_time as End_Time, ed.friend as Friend_Name 
				FROM Exercise_Done ed, Exercise e
				WHERE ed.Exercise_id = e.id  AND ed.Users_id = $user_id ";

		if ($id) {
			$sql .= "AND ed.id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		} else {
			return FetchAll($sql);
		}
	}

	static public function Save(&$row) {
		$conn = GetConnection();
		$row2 = escape_all($row, $conn);
		$row2['Start_Time'] = date('H:i', strtotime($row2['Start_Time']));
		
		$user_id = $_SESSION['USER_ID'];
		
		if (!empty($row2['id'])) {
			if (empty($row2['Exercise_Id'])) {					
				//Save Exercise First			
				$sql = "INSERT INTO Exercise
					(name, calories, time, created_at)
					VALUES ('$row2[Exercise_Name]', '$row2[Calories]', $row2[Time], Now())";

				$conn -> query($sql);
												
				$sql = "Update Exercise_Done
						Set Date='$row2[Date]', Start_Time='$row2[Start_Time]', Exercise_id=LAST_INSERT_ID(), friend='$row2[Friend_Name]' 
						WHERE id = $row2[id] AND Users_id = $user_id
					";				
			} else {
				
			//Update Exercise First				
			$sql = "Update Exercise
					Set name='$row2[Exercise_Name]', calories='$row2[Calories]', time='$row2[Time]'
					WHERE id = $row2[Exercise_Id]";
				
			$conn -> query($sql);

			$sql = "Update Exercise_Done
					Set Date='$row2[Date]', Start_Time='$row2[Start_Time]', Exercise_id=$row2[Exercise_Id], friend='$row2[Friend_Name]'
					WHERE id = $row2[id] AND Users_id = $user_id
				";
			}
		} else {
			//If exercise was not found	
			if (empty($row2['Exercise_Id'])) {
				//Save Exercise First			
				$sql = "INSERT INTO Exercise
					(name, calories, time, created_at)
					VALUES ('$row2[Exercise_Name]', '$row2[Calories]', $row2[Time], Now())";
								
				$conn -> query($sql);
				
				$sql = "INSERT INTO Exercise_Done
						(Date, Start_Time, created_at, Exercise_id, Users_id, friend)
						VALUES ('$row2[Date]', '$row2[Start_Time]', Now(),  LAST_INSERT_ID(), $user_id, '$row2[Friend_Name]') ";
			} else {
				//Update Exercise First				
				$sql = "Update Exercise
						Set name='$row2[Exercise_Name]', calories='$row2[Calories]', time='$row2[Time]'
						WHERE id = $row2[Exercise_Id]";			
							
				$conn -> query($sql);
								
				$sql = "INSERT INTO Exercise_Done
						(Date, Start_Time, created_at, Exercise_id, Users_id, friend)
						VALUES ('$row2[Date]', '$row2[Start_Time]', Now(), '$row2[Exercise_Id]' , $user_id, '$row2[Friend_Name]')";
			}			
		}
					
		my_print($sql);
		my_print($row2['id']);
		my_print($row2['Exercise_Id']);					
		
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
		$sql = "DELETE FROM Exercise_Done WHERE id = $id";
		$results = $conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();
		
		return $error ? array('sql error' => $error) : false;
	}

	static public function Validate($row)
	{
	}
}
