<?php

/**
 * 
 */
class Food {
	
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null,'Calories'=>null,'Fat'=>null,'Carbs'=>null,'Fiber'=>null,'Time'=>date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = "SELECT fe.id as Id, f.name as Name, f.calories as Calories, fe.date as Date, fe.time as Time FROM Food_Eaten fe, Food f WHERE fe.id=f.id";
		
		if($id){
			$sql .= " AND fe.id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
	}
	
}
