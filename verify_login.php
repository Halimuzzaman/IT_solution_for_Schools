<?php
session_start();
// including the database connection file
include_once("config.php");
if(isset($_SESSION['User']))
	session_destroy();

	

	
	
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	
	
	

			
			
		$result=$mysqli->query("SELECT * FROM login WHERE user_name='$name' AND password='$pass';");
		if($result-> num_rows==1)
		{	
		$res = $result->fetch_object();
			
		$_SESSION['match']=$res->un_id;}
	
		if($result-> num_rows==1)
		$_SESSION['User']=$name;
			
		if($result-> num_rows==1)
		{
			if(($res->type)=="technician")header('Location:tech.php');
			else if(($res->type)=="admin")header('Location:admin.php');
			else
				header('Location:user.php');
			
		}
			else
			header('Location:index.php');
	

?>