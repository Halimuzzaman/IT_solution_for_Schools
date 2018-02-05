<?php
session_start();
include_once("config.php");
if(!isset($_SESSION['match']))
		header('Location:index.php');
	
	$result=$mysqli->query("SELECT * FROM login;");

?>
<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="css_style.css">
		
	</head>

<body bgcolor="#223b5f" text="e8e8ee">


 <table width="100%"  align="center" > <!-- main Table -->
	
 <tr>
	<td>
		<table width="100%"  height="5%" align="center" > <!-- Logo Table -->
			<tr align="center">
			<td><img src="logo.jpg" alt="Image" width="120" height="102" ></td>
			<td><h1><b>IT Sollution For Schools</b></h1></td>
			</tr>
			
		</table>
		<br>
		<table width="100%"  height="3%" align="center" > <!-- Menu Table -->
			<tr align="center">
				<td><a href="admin.php" class="button" ><b>Home</b></a><br></td>
				<td><a href="reg.php" class="button" target="_blank"><b>Institute Registration</b></a><br></td>
				<td><a href="add_del.php" class="button" ><b>Add User</b></a><br></td>
				<td><a href="logout.php" class="button"><b>LOGOUT</b></a><br></td>
			
			</tr>
		</table>
	<br>
	<table  style="width:100%;" height="85%" border="1" align='center' bgcolor="#152c4f"> <!-- Main Inner Display Table -->
		<tr>
			<td>
				<form name="add" method="post" action="add.php">
					<table align="center">
						<caption>Add User Page</Caption>
						<tr>
						<td>User Name</td>
						<td><input type="text" name="uname"></td>
						</tr>
						<tr>
						<td>User Id</td>
						<td><input type="text" name="uid"></td>
						</tr>
						<tr>
						<td>Password</td>
						<td><input type="text" name="upass"></td>
						</tr>
						<tr>
						<td>User Type</td>
						<td><input type="text" name="utype"></td>
						</tr>
						<tr>
						
						<td colspan="2" align="center"><input type="submit" Value="Confirm"></td>
						</tr>
						
						
					</table>
				</form>
		
			</td>
			<td>
	
				<table style="width:40%;" border="1" align='center' bgcolor="#152c4f">
					<caption><h1><b>Users Information</b></h1><caption>
						<tr>
							<th>SL NO.</th>
							<th>Name</th>
							<th>User ID</th>
							<th>User Type</th>				
						</tr>
					<?php
						while($res =$result->fetch_object()) 
						{
							$sl=$res->user_id;
							$name=$res->user_name;
							$id=$res->un_id;
							$type=$res->type;
				
							
							
								echo"<tr>";
								echo"<td>".$sl."</td>";
								echo"<td>".$name."</td>";
								echo"<td>".$id."</td>";
								echo"<td>".$type."</td>";
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
</body>
</html>