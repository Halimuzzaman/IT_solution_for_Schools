<?php
session_start();
include_once("config.php");
if(!isset($_SESSION['match']))
		header('Location:index.php');
	
	$uid=$_POST["uid"];
	$unm=$_POST["uname"];
	$upass=$_POST["upass"];
	$utyp=$_POST["utype"];
	if(empty($uid) || empty($unm) || empty($upass) || empty($utyp))
		header('Location:add_del.php');
	else
	{$mysqli->query("INSERT INTO `login`(`user_name`, `password`, `type`, `un_id`) VALUES ('$unm','$upass','$utyp','$uid');");
		header('Location:add_del.php');
		
	}

?>