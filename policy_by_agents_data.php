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
		<th>Scheme Name</th>
		<th>Number of Policies</th>
	</tr>
	
	<?php
	include 'database_connection.php';
	 
	$sql_join_query=mysqli_query($conn, "SELECT agent_master.Agent_Name AS Agent, Policy_Details.Scheme_Name as Scheme,COUNT(Policy_No) AS Number_Of_Policies
from agent_master
RIGHT JOIN policy_details ON (agent_master.Agent_No=Policy_details.Agent_No)
GROUP BY Agent_Name,Scheme_Name");
	 if($sql_join_query->num_rows>0){
	 while($row=$sql_join_query->fetch_assoc()){
		 ?>
		 
	<tr>
		  
		 <td><?php echo $row["Agent"]; ?></td>
		 <td><?php echo $row["Scheme"]; ?></td>
		 <td><?php echo $row["Number_Of_Policies"]; ?></td>
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