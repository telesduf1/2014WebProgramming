<?php

function GetConnection()
{
	include __DIR__ . '/_password.php';
	$conn = new mysqli('localhost', 'plotkinm', $sql_password, 'plotkinm_db');
	return $conn;
}