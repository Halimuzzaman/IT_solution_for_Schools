<?php
	session_start();
	include_once("config.php");
	if(!isset($_SESSION['match']))
		header('Location:index.php');
	$ad_id=$_SESSION['match'];

	$result_requestlist= $mysqli->query("SELECT * FROM `requests`  ORDER BY posted_date;");
	$result_tech=$mysqli->query("SELECT * FROM `login` WHERE type='technician';");
?>

<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="css_style.css">
		
	</head>

<body bgcolor="#223b5f" text="e8e8ee">

<form name="admin" method="post" action="assign.php">

 <table width="1000"  align="center" > <!-- main Table -->
	
 <tr>
	<td>
		<table width="100%"  height="5%" align="center"> <!-- Logo Table -->
			<tr align="center">
			<td colspan="2" ><img src="logo.jpg" alt="Image" width="120" height="102" ></td>
			<td colspan="2"><h1><b>IT Sollution For Schools</b></h1></td>
			</tr>
			
		</table>
		<br>
		<table width="100%"  height="3%" align="center" > <!-- Menu Table -->
			<tr align="center">
				<td><a href="admin.php" class="button" ><b>Home</b></a><br></td>
				<td><a href="reg.php" class="button" target="_blank"><b>Institute Registration</b></a><br></td>
				<td><a href="add_del.php" class="button" target="_blank"><b>Add User</b></a><br></td>
				<td><a href="logout.php" class="button"><b>LOGOUT</b></a><br></td>
			
			</tr>
		</table>
		<br>
  
		<table bgcolor="#152c4f" align="center" width="100%" height="5%" frame="box" rules="none"> <!-- Assign Table -->
			<tr>
			<td><?php
			if(isset($_SESSION['success_sendreq'])){
				$msg=$_SESSION["success_sendreq"];
			echo"<tr>";
			echo "<td>"."<font color='red'>*".$msg."</font></td>";
			echo "</tr>";}
		
		?></td>
			</tr>
		
			<tr >
			<th>Technician Id</th>
			<th>Request Id</th>
			<th></th>
			</tr>
			<tr align="center">
			<td><input type="text" name="tech_id"></td>
			<td><input type="text" name="request_id"></td>
			<td><input type="submit" ></td>
			</tr>
		</table>
		<br>
		<table  width="1000"  border="1" align='center'> <!-- Main Inner Display Table -->
		<tr>
			<td>
				<table width="40%" border="1" align='center' bgcolor="#152c4f">
					<caption><h1><b>Technicians</b></h1><caption>
						<tr>
							<th>Name</th>
							<th>ID</th>
							<th>Problem ID</th>
							<th>Problem Type</th>
							<th>Request ID</th>
							<th>Status</th>
							<th>Remove</th>					
						</tr>
					<?php
						while($res3 =$result_tech->fetch_object()) 
						{
							$tec_name=$res3->user_name;
							$tec_id=$res3->un_id;
				
							$result_quelist=$mysqli->query("SELECT * FROM queue WHERE technician_id='$tec_id';");
							while($res4=$result_quelist->fetch_object())
							{
								$qu_prid=$res4->problem_id;
								$qu_prtype=$res4->type; 
								$qu_rid=$res4->request_id;
								$qu_st=$res4->status;
									
								echo"<tr>";
								echo"<td>".$tec_name."</td>";
								echo"<td>".$tec_id."</td>";
								echo"<td>".$qu_prid."</td>";
								echo"<td>".$qu_prtype."</td>";
								echo"<td>".$qu_rid."</td>";
								echo"<td>".$qu_st."</td>";
								echo "<td><a href=\"delete.php?id=$qu_rid\" onClick=\"return confirm('Are you sure you want to Remove?')\">Remove</a></td>";
								echo"</tr>";
							}
			
						}
			
					?>
				</table>
		
			</td>
			<td>
	
				<table  width="60%" border="1" align='center' bgcolor="#152c4f">
					<caption><h1><b>Request History</b></h1></caption>
	
						<tr>
							<th>Request Id</th>
							<th>Institute ID</th>
							<th>Institute Name</th>
							<th>Owner</th>
							<th>District</th>
							<th>Division</th>
							<th>Problem Type</th>
							<th>Problem Details</th>
							<th>Quantity</th>
							<th>Request Date</th>
							<th>Status</th>
							<th>Feedback</th>
							
			
						</tr>
			
					<?php 
	
						while($res =$result_requestlist->fetch_object()) 
						{ 		
					
								
							$req_id=$res->request_id;
							$i_id=$res->institute_id;
							$req_probtype=$res-> Problem_type;
							$req_probdtl=$res->Problem_Detail;
							$req_qunt=$res->quantity;
							$req_date=$res->posted_date;
							$req_sl=$res->Sollution;
							$req_fd=$res->Feedback;
								
				
							$result_schoollist=$mysqli->query("SELECT * FROM users WHERE institute_id='$i_id';");
			
							while($res2 =$result_schoollist->fetch_object()) 
								{       
									$usr_iname=$res2->institute_name;
									$usr_idstr=$res2->district;
									$usr_idiv=$res2->division;
									$user_own=$res2->access_id;
									
								}
							$result_own=$mysqli->query("SELECT user_name FROM login WHERE `un_id`='$user_own';");
							while($ress =$result_own->fetch_object()) 
								{
									$user_ownnme=$ress->user_name;
								}
			
							echo"<tr>";
							echo"<td>".$req_id."</td>";
							echo"<td>".$i_id."</td>";
							echo"<td>".$usr_iname."</td>";
							echo"<td>".$user_ownnme."</td>";
							echo"<td>".$usr_idstr."</td>";
							echo"<td>".$usr_idiv."</td>";
							echo"<td>".$req_probtype."</td>";
							echo"<td>".$req_probdtl."</td>";
							echo"<td>".$req_qunt."</td>";
							echo"<td>".$req_date."</td>";
							echo"<td>".$req_sl."</td>";
							echo"<td>".$req_fd."</td>";
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
