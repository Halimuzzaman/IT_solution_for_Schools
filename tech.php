<?php
	session_start();
	include_once("config.php");
		if(!isset($_SESSION['match']))
		header('Location:index.php');
	$tec_id=$_SESSION['match'];

	$result_solv= $mysqli->query("SELECT * FROM `solutions`;");
	$result=$mysqli->query("SELECT * FROM queue WHERE technician_id='$tec_id';");
?>

<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="css_style.css">
		
	</head>

<body bgcolor="#223b5f" text="e8e8ee">

<form name="solver" method="post" action="submit_soln.php">

 <table width="100%"  align="center"> <!-- main Table -->
	
 <tr>
	<td>
		<table width="100%"  height="5%" align="center"> <!-- Logo Table -->
			<tr align='center'>
			<td ><img src="logo.jpg" alt="Image" width="120" height="102" ></td>
			<td><h1><b>IT Sollution For Schools</b></h1></td>
			</tr>
			
		</table>
		<br>
		
		<table width="100%"  height="3%" align="center"> <!-- Menu Table -->
			<tr align='center'>
				<td><a href="tech.php" class="button" ><b>Home</b></a><br></td>
				<td><a href="logout.php" class="button"><b>LOGOUT</b></a><br></td>
			
			</tr>
		</table>
 
  <br>
		<table bgcolor="#152c4f" width="100%" height="5%"> <!-- submit Table -->
			<tr>
			<td><?php
			if(isset($_SESSION['success_sendreq'])){
				$msg=$_SESSION["success_sendreq"];
			echo"<tr>";
			echo "<td>"."<font color='red'>*".$msg."</font></td>";
			echo "</tr>";}
		
		?></td>
			</tr>
		
			<tr>
			<th>Request Id</th>
			<th>Description</th>
			<th>Solution</th>
			<th></th>
			<th></th>
			</tr>
			<tr align='center'>
			<td><input type="text" name="request_id"></td>
			<td><input type="text" name="des"></td>
			<td><input type="text" name="soln"></td>
			<td><input type="hidden" name="tec_id" value="<?php echo $tec_id ?>"></td>
			<td><input type="submit" ></td>
			</tr>
		</table>
		<br>
		<table  style="width:100%;" height="85%" border="1" align='center' > <!-- Main Inner Display Table -->
		<tr>
			<td>
				<table style="width:40%;" border="1" align='center' bgcolor="#152c4f">
					<caption><h1><b>Solutions</b></h1><caption>
						<tr>
							<th>solution id</th>
							<th>Type</th>
							<th>Description</th>
							<th>Solution</th>
							<th>Tehnician ID</th>
					
						</tr>
					<?php
						while($res =$result_solv->fetch_object()) 
						{
							$sol_id=$res->solution_id;
							$sol_type=$res->type;
							$sol_des=$res->description;
							$sol_link=$res->solv;
							$sol_tecid=$res->technisian_id;
				
							echo"<tr>";
							echo"<td>".$sol_id."</td>";
							echo"<td>".$sol_type."</td>";
							echo"<td>".$sol_des."</td>";
							echo"<td><a href=\"$sol_link\" target=\"_blank\">Download</a></td>";
							echo"<td>".$sol_tecid."</td>";
							echo"</tr>";		
								
						}
			
					?>
				</table>
		
			</td>
			<td>
	
				<table  style="width:50%;" border="1" align='center' bgcolor="#152c4f">
					<caption><h1><b>Request History</b></h1></caption>
	
						<tr>
							<th>Problem Id</th>
							<th>Problem Type</th>
							<th>Request Id</th>
							<th>Problem Description</th>
							<th>Quantity</th>
							<th>Request Date</th>
							<th>Institute Name</th>
							<th>Address</th>
							<th>Status</th>
							<th>Feedback</th>
			
						</tr>
			
					<?php 
	
						while($res1 =$result->fetch_object()) 
						{ 		
					
								
							$prob_id=$res1->problem_id;
							$prob_type=$res1->type;
							$req_id=$res1->request_id;
								
				
							$result_user=$mysqli->query("SELECT * FROM requests WHERE request_id='$req_id';");
			
							while($res2 =$result_user->fetch_object()) 
								{       
									$usrprob_detail=$res2->Problem_Detail;
									$usrprob_quntty=$res2->quantity;
									$usrprob_reqdte=$res2->posted_date;
									$usrprob_status=$res2->Sollution;
									$usrprob_fdbck=$res2->Feedback;
									$usrprob_iid=$res2->institute_id;
									
								}
							$result_user3=$mysqli->query("SELECT `division`,`district`,`institute_name`,`institute_add` FROM users WHERE institute_id='$usrprob_iid';");
							while($res3 =$result_user3->fetch_object()) 
								{
									$name=$res3->institute_name;
									$add=$res3->institute_add;
									$dst=$res3->district;
									$div=$res3->division;
								}
									
							echo"<tr>";
							echo"<td>".$prob_id."</td>";
							echo"<td>".$prob_type."</td>";
							echo"<td>".$req_id."</td>";
							echo"<td>".$usrprob_detail."</td>";
							echo"<td>".$usrprob_quntty."</td>";
							echo"<td>".$usrprob_reqdte."</td>";
							echo"<td>".$name."</td>";
							echo"<td>".$add.",".$dst.",".$div."</td>";
							echo"<td>".$usrprob_status."</td>";
							echo"<td>".$usrprob_fdbck."</td>";
							
							echo"</tr>";
						}
					?>
		
				</table>
	
			</td>
	
		</tr>
		</table>
	</td>
 </tr>
	<tr><td align="right"><p><small><i>&copy 2017 Halimuzzaman</i></small></p></td></tr>
 </table>
</form>

</body>
</html>
