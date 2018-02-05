<?php

session_start();
//print_r(($_POST));
include_once("config.php");
unset($_SESSION["success_sendreq"]);
$soln_id=time(); 
$req_id=$_POST['request_id']; 
$tec_id=$_POST['tec_id'];        
$description=$_POST['des'];
$soln=$_POST['soln'];
if ( empty($req_id) ||empty($description) ||empty($soln))
{
	$_SESSION["success_sendreq"]="All Information Must be Provided";
header('location:tech.php');
	
}
	else{						

		$result=$mysqli->query("SELECT Problem_type FROM requests WHERE request_id ='$req_id';");
		while($res =$result->fetch_object()) 
			{ 
				$req_type =$res->Problem_type;
			}
$mysqli->query("INSERT INTO `solutions` (`solution_id`, `type`, `description`, `solv`, `technisian_id`) VALUES ('$soln_id','$req_type','$description','$soln','$tec_id');");
$mysqli->query("UPDATE `queue` SET `status`='$soln_id' WHERE request_id='$req_id';");			
$mysqli->query("UPDATE `requests` SET `Sollution`='$soln_id' WHERE request_id='$req_id';");


$_SESSION["success_sendreq"]="Request Successfully Sent";

header('location:tech.php');
	}
?>