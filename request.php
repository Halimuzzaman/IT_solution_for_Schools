<?php
//print_r($GLOBALS);
session_start();
//print_r(($_POST));
include_once("config.php");
unset($_SESSION["success_sendreq"]);
if(isset($_POST['rid']) && isset($_POST['feed']))
{
	$req_id=$_POST['rid'];
	$feed=$_POST['feed'];
	$mysqli->query("UPDATE `requests` SET `Feedback`='$feed' WHERE request_id='$req_id';");
	header('location:user.php');
}
else{
$r_id=time(); 
$i_id=$_POST['institute_id']; 
$p_type=$_POST['pt'];        
$p_dtl=$_POST['pdtl'];
$q=$_POST['qnt'];
if ( empty($p_type) ||empty($p_dtl) ||empty($q))
{
	$_SESSION["success_sendreq"]="All Information Must be Provided";
	header('location:user.php');
	
}
	else{						

$mysqli->query("INSERT INTO requests (request_id, institute_id, Problem_type, Problem_Detail,quantity,Sollution,Feedback) VALUES ('$r_id','$i_id','$p_type','$p_dtl','$q','Not Available','Not Received')");
//echo "INSERT INTO requests (request_id, institute_id, Problem_type, Problem_Detail,quantity,Sollution,Feedback) VALUES ('$r_id','$i_id','$p_type','$p_dtl','$q','Not Available','Not Received')";
$_SESSION["success_sendreq"]="Request Successfully Sent";
header('location:user.php');
	}
}
?>