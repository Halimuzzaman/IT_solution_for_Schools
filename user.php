<?php
session_start();
include_once("config.php");
if(!isset($_SESSION['match']))
		header('Location:index.php');
$mt=$_SESSION['match'];

$i_id = "0";
$tm = time();
$result= $mysqli->query("SELECT * FROM users WHERE access_id=$mt");

?>

<html>
	<head>	
		<link rel="stylesheet" type="text/css" href="css_style.css">
		<script>
			setInterval(function() {
					document.getElementById('datetime').innerHTML= Date();
			}, 1000);
			
			function showUser(str,iid) {
					if (str == "") {
						document.getElementById("txtHint").innerHTML = "";
						return;
					} else {
						if (window.XMLHttpRequest) {
							// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp = new XMLHttpRequest();
						} else {
							// code for IE6, IE5
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("txtHint").innerHTML = this.responseText;
								//document.getElementByName("hname").value= this.responseText;
								
							}
						};
						var s="sln";
						var h="hstry";
						if(h.localeCompare(str)==0){
						xmlhttp.open("GET","history.php?q="+iid,true);
						xmlhttp.send();}
						else if(s.localeCompare(str)==0){
						xmlhttp.open("GET","soln.php?q="+iid,true);
						xmlhttp.send();}
					}
			}


		</script>
	</head>

<body bgcolor="#223b5f" text="e8e8ee">
	
 <table width="100%" align="center">
 <tr>
  <td>
	
	<table width="755"  height="5%" align="center"> <!-- Logo Table -->
			<tr align="center">
			<td><img src="logo.jpg" alt="Image" width="120" height="102" ></td>
			<td><h1><b>IT Sollution For Schools</b></h1></td>
			</tr>
			
		</table>
		
	<table width="755" align='center' >
	
		<?php 
			while($res = $result->fetch_object()) 
			{ 		
		
					echo "<tr>";
					echo"<td > </td>";
					echo "<td colspan='2'><h2>".$res->institute_name."(".$res->institute_id.")"."<br><h4>".$res->institute_add.",".$res->district.",".$res->division."</h4><br><small id='datetime' style='font-size: 14px;line-height: 20px;'></small></h2>"."</td>";
					echo "</tr>";
					$i_id=$res->institute_id;
					
		
					
			}
		?>
		<tr align="center" >
			<td><br><a href="user.php" class="button" ><b>Home</b></a><br></td>
			<td><br><a href="#" id="sln" class="button" name="<?php echo $i_id ?>" onclick ="showUser(this.id,this.name);">Solutions</a></td>
			<td><br><a href="#" id="hstry" class="button" name="<?php echo $i_id ?>" onclick ="showUser(this.id,this.name);">History</a></td>
			<td><br><a href="logout.php" class="button"><b>LOGOUT</b></a><br></td>
		</tr>
		<?php
			if(isset($_SESSION['success_sendreq'])){
				$msg=$_SESSION["success_sendreq"];
			echo"<tr>";
			echo "<td colspan='4'>"."<font color='red'>*".$msg."</font></td>";
			echo "</tr>";}
		
		?>
	</table>
	
	<div id="txtHint"> 
		<form action='request.php' method='post'>
			<table align='center'frame="box" rules="none">
			 <caption><h3><b>Problem Submission Form</b></h3></caption>
	
	
					<tr align="center">
						<td colspan="2" align="center"><br><br>Problem Type</td>
						<td colspan="2" align="center"><br><br><select name="pt">
							
							<option value="software">Software Problem</option>
							<option value="hardware">Hardware Problem</option>
							</select></td>
					</tr>
					<tr align="center">
						<td colspan="2" align="center"><br><br>Problem Details</td>
						<td colspan="2" align="center"><br><br><input type="text" name="pdtl" ></td>
					</tr>
					<tr align="center">
						<td colspan="2" align="center"><br><br>Quantity</td>
						<td colspan="2" align="center"><br><br><input type="text" name="qnt" ></td>
					</tr>
					 	
					 <tr align="center">
						<input type="hidden" name="institute_id" value="<?php echo $i_id; ?>" />
						<td colspan="4"><br> <input type="hidden" name="request_id" value="<?php echo $tm; ?>"></td>
					</tr>

					<tr>
						
						<td colspan="4" align="center"><br><input type="submit" value="Ok" ></td>
					</tr>
			</table>
	
		</form>
	</div>
   </td>
  </tr>
  <tr><td align="right"><p><small><i>&copy 2017 Halimuzzaman</i></small></p></td></tr>
 </table>


</body>
</html>
