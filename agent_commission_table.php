<style>
table, th,td  {
	border:1px solid black;
}
</style>
</head>
<body>
<table style="width:100%">
	<tr>
		<th>Agent Name</th>
		<th>Total Commission</th>
	</tr>
	
	<?php
	include 'database_connection.php';
	 
	$sql_join_query=mysqli_query($conn, "SELECT agent_master.Agent_Name AS Agent_Name, SUM(commission) as Commission
from agent_master
INNER JOIN policy_details ON agent_master.Agent_No=policy_details.Agent_No
GROUP BY Agent_Name");
	 if($sql_join_query->num_rows>0){
	 while($row=$sql_join_query->fetch_assoc()){
		 ?>
		 
	<tr>
		  
		 <td><?php echo $row["Agent_Name"]; ?></td>
		 <td><?php echo $row["Commission"]; ?></td>
	</tr>
	<?php	 
	 }
	 echo "</table>";
	 }
	 else{
		 echo"0 result";
	 }
	 $conn->close();
	?>
</table>
</body>
</html>