<?php
session_start();

if(isset($_SESSION['User']))
	session_destroy();
?>

<html>
<head>	
	<link rel="stylesheet" type="text/css" href="css_style.css">
</head>

<body bgcolor="#223b5f" text="e8e8ee">
<table width="755" align="center" > <!-- Logo Table -->
			<tr align="center" >
			<td><img src="logo.jpg" alt="Image" width="180" height="120" ></td>
			<td><h1><b>IT Sollution For Schools</b></h1></td>
			</tr>
	</table>
	<br><br><br><br>
<form action="verify_login.php" method="post">


		
	
	<table width="355" height="60%"  align="center" frame="box" rules="none" bgcolor="#152c4f"> <!-- Login Table -->
		<tr align="center">
		<td><b>User Name</b></td>
		<td><input type="text" name="name"></td>

		</tr>
		<tr align="center">
		<td><b>Password</b></td>
		<td><input type="password" name="pass"></td>

		</tr>
		
		<tr align="center">
		<td colspan="2" align="center">
		<input type="submit" name="send" value="login">
		</td>
		</tr>
	</table>
	
	<p align="right"><small><i>&copy 2017 Halimuzzaman</i></small></p></p>
	</form>
</body>
</html>
