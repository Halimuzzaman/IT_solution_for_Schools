<?php
session_start();
if(!isset($_SESSION['match']))
		header('Location:index.php');

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
				<td><a href="reg.php" class="button"><b>Institute Registration</b></a><br></td>
				<td><a href="add_del.php" class="button" target="_blank"><b>Add User</b></a><br></td>
				<td><a href="logout.php" class="button"><b>LOGOUT</b></a><br></td>
			
			</tr>
		</table>
 
  <br>
<form name="registration" method="post" action="insertinstiute.php">
<table align="center" bgcolor="#152c4f" frame="box" rules="none" width="30%" height="400">
	<caption><h2><b>Registration Page</b></h2></Caption>
	<tr>
	<td>Institution ID</td>
	<td><input type="text" name="iid"></td>
	</tr>
	<tr>
	<td>Institution Name</td>
	<td><input type="text" name="inm"></td>
	</tr>
	<tr>
	<td>Address</td>
	<td><input type="text" name="iadd"></td>
	</tr>
	<tr>
	<td>District</td>
	<td><input type="text" name="ids"></td>
	</tr>
	<tr>
	<td>Division</td>
	<td><input type="text" name="idv"></td>
	</tr>
	<tr>
	<td>Access ID</td>
	<td><input type="text" name="acid"></td>
	</tr>
	<tr>
	
	<td colspan="2" align="center"><input type="submit" Value="Confirm"></td>
	</tr>
	
	
</table>
</form>

</td></tr><tr><td align="right"><p><small><i>&copy 2017 Halimuzzaman</i></small></p></td></tr></table>
</body>
</html>