 <?php

include_once("config.php");
$q = intval($_GET['q']);
$result =$mysqli->query("SELECT * FROM requests WHERE `institute_id` =$q AND !(`Sollution`='Not Available');");
?>
<html>
<body bgcolor="#223b5f" text="e8e8ee">
	<form name="user" action="request.php" method="post">
	<br>
		<table width="755" align='center' frame="box" rules="none" >
			<tr>
				<th>Request ID</th>
				<th>Feedback</th>
				<th></th>
			</tr>
			<tr align='center'>
				<td><input type="text" name="rid"></td>
				<td><input type="text" name="feed"></td>
				<td><input type="submit"></td>
			</tr>
		</table>
	</form>
<br>
<table width="755" align='center' border="1" bgcolor="#152c4f">
	 <caption><h2><b>Request History</b></h2></caption>
	<tr >
	<th>Request Id</th>
	<th>Problem Type</th>
	<th>Problem Details</th>
	<th>Quantity</th>
	<th>Request Date</th>
	<th>Solution</th>
	<th>Feedback</th>
	</tr>
	
	
	<?php
		$flag=0;
	
	while($res = mysqli_fetch_array($result)) 
	{ 		
		 echo "<tr>";
		echo "<td>".$res['request_id']."</td>";
		echo "<td>".$res['Problem_type']."</td>";
		echo "<td>".$res['Problem_Detail']."</td>";
		echo "<td>".$res['quantity']."</td>";
		echo "<td>".$res['posted_date']."</td>";
		
		$soln=$res['Sollution'];
		$result2 =$mysqli->query("SELECT `solv` FROM `solutions` WHERE `solution_id` ='$soln';");
		while($res2 = mysqli_fetch_array($result2))
		{
			$sol_link=$res2['solv'];
			echo"<td><a href=\"$sol_link\" target=\"_blank\">Download</a></td>";
		}
		
		echo "<td>".$res['Feedback']."</td>";
		
		
	}	
			
	?>
	
					
	</table>
	
	<br><br>
</body>
</html>