<?php

include_once __DIR__ . '/../inc/_all.php';
	
class Exercise {

	public static function Blank() {
		return array('Id' => null, 'Name' => null, 'Calories' => null, 'Time' => null);
	}

	public static function Get($id = null) {
		$sql = "SELECT * FROM Exercise";

		if ($id) {
			$sql .= " WHERE id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		} else {
			return FetchAll($sql);
		}
	}

	static public function Save(&$row) {
	}

	static public function Delete($id) {
	}

}
