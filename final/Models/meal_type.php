<?php

include_once __DIR__ . '/../inc/_all.php';

class Meal_Type {
	public static function Blank() {
		return array('id' => null, 'Name' => null);
	}

	public static function Get($id = null) {
		$sql = "SELECT * FROM Meal_Type";
		
		if ($id) {
			$sql .= " WHERE id=$id ";
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
			$sql = "Update Meal_Type
							Set Name='$row2[Name]', Type_id='$row2[Type_id]', Calories='$row2[Calories]',
								Fat='$row2[Fat]', Carbs='$row2[Carbs]', Fiber='$row2[Fiber]', Time='$row2[Time]'
						WHERE id = $row2[id]
						";
		} else {
			$sql = "INSERT INTO Meal_Type
						(Name, Type_id, Calories, Fat, Carbs, Fiber, Time, created_at, UserId)
						VALUES ('$row2[Name]', '$row2[Type_id]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Fiber]', '$row2[Time]', Now(), 3 ) ";
		}

		//my_print( $sql );

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
		$sql = "DELETE FROM Meal_Type WHERE id = $id";
		$results = $conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();

		return $error ? array('sql error' => $error) : false;
	}

}
