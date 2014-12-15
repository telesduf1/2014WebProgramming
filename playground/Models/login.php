<?php

include_once __DIR__ . '/../inc/_all.php';

class Login{

	static public function Validate(&$row) {
		$conn = GetConnection();
		
		$row2 = escape_all($row, $conn);
		
		$sql = "SELECT Users_id FROM Login 
				WHERE email_address = '$row2[Email]' AND "; //psw = md5($var_psw)
		
		if(!empty($row['Social_id'])){
			$sql .= " social_id = '$row2[Social_id]'"; 
		}else{
			$sql .= " password = $row2[Password])";
		}		
		
		$ret = FetchAll($sql);
		$result = $ret[0];
		
		$error = $conn -> error;
		
		if(!empty($error)){
			header("Location: ../Controllers/user_form");
			return $error;		
		}
		
		$users_id = $result['Users_id'];
		$user_email = $row2['Email'];
		$social_id = $row2['Social_id'];
		
		$sql = "SELECT first_name, last_name, gender, height, birthday FROM Users 
				WHERE id = '$users_id'";		
		
		$ret = FetchAll($sql);
		$result = $ret[0];

		$user_firstName = $result['first_name'];
		$user_lastName = $result['last_name'];
		$user_gender = $result['gender'];		
		$user_height = $result['height'];
		$user_birthday = $result['birthday'];		
		
		$sql = "SELECT g.weight, g.Goal_Category_id, gc.name FROM User_Goal g, Goal_Category gc 
				WHERE Users_id = '$users_id' AND g.Goal_Category_id = gc.id";		
		
		$ret = FetchAll($sql);
		$result = $ret[0];		
		
		$user_weightGoal = $result['weight'];
		$user_goalId = $result['Goal_Category_id'];
		$user_goalLabel = $result['name'];		

		$sql = "SELECT weight FROM User_Weight 
				WHERE Users_id = '$users_id'";		
		
		$ret = FetchAll($sql);
		$result = $ret[0];

		$user_currentWeight = $result['weight'];
		
		$conn -> close();						
		
		$user_currentWeight = $result['weight'];
		
		$user_age = date(date('Y'),date('Y-m-d') ) - date('Y', $user_birthday);
		
		$user_caloriesDay = 0;
		$user_exerciseCaloriesDay = 389; //kcal
		
		if ($user_gender == "Male") {
			$user_caloriesDay = 247 - (2.67*$user_age) + (401.5*($user_height/100)) + (8.6*($user_currentWeight*0.45)); //kcal 
		} else {
			$user_caloriesDay = 293 - (3.8*$user_age) + (456.4*($user_height/100)) + (10.12*($user_currentWeight*0.45)); //kcal
		}
		
		session_start();
		$_SESSION['USER_AGE'] = $users_age;
		$_SESSION['MAX_FOOD'] = $user_caloriesDay;
		$_SESSION['MAX_EXERCISE'] = $user_exerciseCaloriesDay;				
		$_SESSION['USER_ID'] = $users_id;
		$_SESSION['USER_EMAIL']  = $user_email;
		$_SESSION['SOCIAL_ID'] = $social_id;
		$_SESSION['USER_FIRST_NAME'] = $user_firstName;
		$_SESSION['USER_LAST_NAME']  = $user_lastName;
		$_SESSION['USER_NAME'] = $user_firstName . " " . $user_lastName;
		$_SESSION['USER_GENDER'] = $user_gender;
		$_SESSION['USER_HEIGHT']  = $user_height;
		$_SESSION['USER_BIRTHDAY'] = $user_birthday;
		$_SESSION['USER_WEIGHT_GOAL']  = $user_weightGoal;
		$_SESSION['USER_GOAL_ID'] = $user_goalId;
		$_SESSION['USER_GOAL_LABEL'] = $user_goalLabel;
		$_SESSION['USER_CURRENT_WEIGHT']  = $user_currentWeight;
																			
		header("Location: ../Controllers/food_eaten");
	}
	
	static public function Log($id, $email) {
		$conn = GetConnection();
				
		$sql = "SELECT Users_id FROM Login 
				WHERE email_address = '$email' AND "; //psw = md5($var_psw)
		
		$sql .= " social_id = '$id'"; 
		
		$ret = FetchAll($sql);
		$result = $ret[0];
		
		$error = $conn -> error;
		
		my_print( $sql );
	
		if(empty($ret)){
			header("Location: ../Controllers/user_form");
			?> <script>alert("Aqui");</script><?	
			return;
		}		
		
		$users_id = $result['Users_id'];
		$user_email = $email;
		$social_id = $id;
		
		$sql = "SELECT first_name, last_name, gender, height, birthday FROM Users 
				WHERE id = '$users_id'";		
		
		$ret = FetchAll($sql);
		$result = $ret[0];

		$user_firstName = $result['first_name'];
		$user_lastName = $result['last_name'];
		$user_gender = $result['gender'];		
		$user_height = $result['height'];
		$user_birthday = $result['birthday'];		
		
		$sql = "SELECT g.weight, g.Goal_Category_id, gc.name FROM User_Goal g, Goal_Category gc 
				WHERE Users_id = '$users_id' AND g.Goal_Category_id = gc.id";		
		
		$ret = FetchAll($sql);
		$result = $ret[0];		
		
		$user_weightGoal = $result['weight'];
		$user_goalId = $result['Goal_Category_id'];
		$user_goalLabel = $result['name'];		

		$sql = "SELECT weight FROM User_Weight 
				WHERE Users_id = '$users_id'";		
		
		$ret = FetchAll($sql);
		$result = $ret[0];

		$user_currentWeight = $result['weight'];
		
		$conn -> close();						

		
		$user_currentWeight = $result['weight'];
		
		$user_age = date(date('Y'),date('Y-m-d') ) - date('Y', $user_birthday);
		
		$user_caloriesDay = 0;
		$user_exerciseCaloriesDay = 389; //kcal
		
		if ($user_gender == "Male") {
			$user_caloriesDay = 247 - (2.67*$user_age) + (401.5*($user_height/100)) + (8.6*($user_currentWeight*0.45)); //kcal 
		} else {
			$user_caloriesDay = 293 - (3.8*$user_age) + (456.4*($user_height/100)) + (10.12*($user_currentWeight*0.45)); //kcal
		}
		
		
		session_start();
		$_SESSION['USER_AGE'] = $users_age;
		$_SESSION['MAX_FOOD'] = $user_caloriesDay;
		$_SESSION['MAX_EXERCISE'] = $user_exerciseCaloriesDay;								
		$_SESSION['USER_ID'] = $users_id;
		$_SESSION['USER_EMAIL']  = $user_email;
		$_SESSION['SOCIAL_ID'] = $social_id;
		$_SESSION['USER_FIRST_NAME'] = $user_firstName;
		$_SESSION['USER_LAST_NAME']  = $user_lastName;
		$_SESSION['USER_NAME'] = $user_firstName . " " . $user_lastName;
		$_SESSION['USER_GENDER'] = $user_gender;
		$_SESSION['USER_HEIGHT']  = $user_height;
		$_SESSION['USER_BIRTHDAY'] = $user_birthday;
		$_SESSION['USER_WEIGHT_GOAL']  = $user_weightGoal;
		$_SESSION['USER_GOAL_ID'] = $user_goalId;
		$_SESSION['USER_GOAL_LABEL'] = $user_goalLabel;
		$_SESSION['USER_CURRENT_WEIGHT']  = $user_currentWeight;

		header("Location: ../Controllers/food_eaten");
	}	
}
