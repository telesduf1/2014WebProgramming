<?php

include_once __DIR__ . '/../inc/_all.php';
	
class Food {

	public static function Blank() {
		return array('Id' => null, 'Name' => null, 'Calories' => null, 'Fat' => null, 'Carbs' => null, 'Protein' => null, 'Food_Category_id' => null);
	}

	public static function Get($id = null) {
		$sql = "SELECT * FROM Food";

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
			/*
			$sql = "Update Food
							Set Name='$row2[Name]', Type_id='$row2[Type_id]', Calories='$row2[Calories]',
								Fat='$row2[Fat]', Carbs='$row2[Carbs]', Fiber='$row2[Fiber]', Time='$row2[Time]'
						WHERE id = $row2[id]
						";*/
		} else {
			$sql = "INSERT INTO Food
						(name, Food_Category_id, calories, fat, carbs, protein, created_at)
						VALUES ('$row2[Food_Name]', '$row2[Food_Type]', '$row2[Calories]', '$row2[Fat]', '$row2[Carbs]', '$row2[Protein]', Now()) ";
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
		$sql = "DELETE FROM Food WHERE id = $id";
		$results = $conn -> query($sql);
		$error = $conn -> error;
		$conn -> close();

		return $error ? array('sql error' => $error) : false;
	}

}
