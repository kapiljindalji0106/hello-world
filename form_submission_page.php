<html>
<head>
<title>page after form submit</title>
</head>
<body>
	<?php
		$Policy_Amount=$_POST["policy_amount"];
		$Scheme_Name=$_POST["scheme_name"];
		$commission_cal=$_POST["commission"];
		if($Scheme_Name=='A'){
			$commission_cal=($Policy_Amount/100)*2;
			settype($commission_cal,"double");
		}
		elseif($Scheme_Name=='B'){
		 $commission_cal=($Policy_Amount/100)*2.7;
		 settype($commission_cal,"double");
		}
		else{
			 $commission_cal=($Policy_Amount/100)*3.3;
			settype($commission_cal,"double");
		}
		include 'database_connection.php';
		$sql_query="INSERT INTO policy_details(Policy_No,Date1,Scheme_Name,Agent_No,CustomerName,PolicyAmount,Commission)
VALUES('".$_POST["policy_number"]."','".$_POST["policy_date"]."','$Scheme_Name','".$_POST["agent_number"]."','".$_POST["customer_name"]."','$Policy_Amount','$commission_cal')";
	
	if ($conn->query($sql_query) === TRUE){
		echo "Data submitted successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;}
$conn->close();
	?>
</body>
</html>
