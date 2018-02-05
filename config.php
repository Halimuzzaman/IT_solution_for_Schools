<?php

// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'ssit';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors 
mysqli_report(MYSQLI_REPORT_ERROR);		
	
?>

