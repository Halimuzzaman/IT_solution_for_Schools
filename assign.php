<?php
session_start();
include("config.php");
unset($_SESSION["success_sendreq"]);
	$tec_id=$_POST['tech_id'];	
	$req_id = $_POST['request_id'];
	
	
	// checking empty fields
	if(empty($tec_id) || empty($req_id)) {
				
		$_SESSION["success_sendreq"]="All Information Must be Provided";
		header('location:admin.php');
	} 
	
	else { 
	
		$result=$mysqli->query("SELECT Problem_type FROM requests WHERE request_id =$req_id;");
		while($res =$result->fetch_object()) 
			{ 
				$req_type =$res->Problem_type;
			}
		
		$mysqli->query("INSERT INTO `queue`(`type`, `request_id`, `technician_id`, `status`) VALUES ('$req_type','$req_id','$tec_id','queue');");
		$mysqli->query("UPDATE `requests` SET `Sollution`='Processing' WHERE request_id='$req_id';");
		$_SESSION["success_sendreq"]="Request Successfully Sent";
		header('location:admin.php');
	}

?>
