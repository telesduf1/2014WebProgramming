<?php

include_once __DIR__ . '/../inc/_all.php';

class Logout{

	static public function Out() {
		session_start();
		session_destroy();
				
		header("Location: ../login_index.html");
	}
		
}
