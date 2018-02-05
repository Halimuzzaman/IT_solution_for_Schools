<?php

include_once("config.php");
$q = intval($_GET['q']);
$result =$mysqli->query("SELECT * FROM `requests` WHERE `institute_id` =$q ;");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css_style.css">
	</head>
<body bgcolor="#223b5f" text="e8e8ee">

<br>
<table align='center' border="1" bgcolor="#152c4f">
	 <caption><h1><b>Request History</b></h1></caption>
	<tr>
	<th>Request Id</th>
	<th>Institute Id</th>
	<th>Problem Type</th>
	<th>Problem Details</th>
	<th>Quantity</th>
	<th>Request Date</th>
	<th>Solution Status</th>
	<th>Feedback</th>
	</tr>
	
	
	<?php
	
	while($res = mysqli_fetch_array($result)) 
	{ 		
		 echo "<tr>";
		echo "<td>".$res['request_id']."</td>";
		echo "<td>".$res['institute_id']."</td>";
		echo "<td>".$res['Problem_type']."</td>";
		echo "<td>".$res['Problem_Detail']."</td>";
		echo "<td>".$res['quantity']."</td>";
		echo "<td>".$res['posted_date']."</td>";
		echo "<td>".$res['Sollution']."</td>";
		echo "<td>".$res['Feedback']."</td>";
			
		
		
	}
		
			
	?>
					
	</table>
	<br><br>
</body>
</html>