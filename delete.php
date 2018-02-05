<?php
session_start();
include("config.php");

	$id = $_GET['id'];
		
	
		$mysqli->query("DELETE FROM `queue` WHERE `request_id`='$id';");
		header('location:admin.php');
		

?>


