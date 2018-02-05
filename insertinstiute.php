<?php
session_start();
include_once("config.php");
if(!isset($_SESSION['match']))
		header('Location:index.php');
	$iid=$_POST["iid"];
	$inm=$_POST["inm"];
	$iadd=$_POST["iadd"];
	$ids=$_POST["ids"];
	$idv=$_POST["idv"];
	$acid=$_POST["acid"];
	if(empty($iid) || empty($inm) || empty($iadd) || empty($ids) || empty($idv) || empty($acid))
	{
		$_SESSION["success_sendreq"]="All Information Must be Provided By Admin";
		header('Location:admin.php');
	}
	else
	{$mysqli->query("INSERT INTO `users`(`division`, `district`, `institute_id`, `institute_name`, `access_id`, `institute_add`) VALUES ('$idv','$ids','$iid','$inm','$acid','$iadd');");
		$_SESSION['success_sendreq']="Request Successfully Sent By Admin";
		header('Location:admin.php');
		
	}

?>