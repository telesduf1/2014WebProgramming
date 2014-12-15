<?
	ini_set('display_errors', 1);
	session_start();
	
	if (!isset($_SESSION['USER_ID'])) {
		header("Location: ../login_index.html");
	}