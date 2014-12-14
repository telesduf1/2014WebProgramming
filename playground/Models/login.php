<?php

include_once __DIR__ . '/../inc/_all.php';

class Login{

	static public function Validate(&$row) {
		$conn = GetConnection();
		
		$row2 = escape_all($row, $conn);
		
		//CHECA login(codigo da unidade) //e senha na tabela unidade
		$sql = "SELECT Users_id FROM Login 
				WHERE email_address = '$row2[Email]' AND "; //senha = md5($var_senha)
		
		if(!empty($row['Social_id'])){
			$sql .= " social_id = '$row2[Social_id]'"; 
		}else{
			$sql .= " password = $row2[Password])";
		}		
		
		$ret = FetchAll($sql);
		$result = $ret[0];
		
		session_start();
		
		$_SESSION['USER_ID'] = $result['Users_id'];
		$_SESSION['USER_EMAIL']   = $row2['Email'];
		
		header("Location: ../Controllers/food_eaten");
	}
}
