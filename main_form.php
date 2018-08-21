<html>
<head>
	<title>Level_1_text</title>
</head>
<body style="text-align:center">
<h2>My Registration Form</h2>
<form action="form_submission_page.php" target="_self" method="post">
<?php
include 'database_connection.php';
$get_agent_master=mysqli_query($conn,"SELECT * FROM agent_master");
$get_scheme_master=mysqli_query($conn,"SELECT * FROM scheme_master");
$option='';
$option1='';
 if($get_agent_master->num_rows>0){
 while($row=$get_agent_master->fetch_assoc())
	$option .='<option value="'.$row['Agent_No'].'">'.$row['Agent_No'].'</option>';
}
	if($get_scheme_master->num_rows>0){
 while($row=$get_scheme_master->fetch_assoc())
	$option1 .='<option value="'.$row['Scheme_Name'].'">'.$row['Scheme_Name'].'</option>';
}
 ?>
 
<br><br><b>Policy Number</b><input type="number" name="policy_number" required>
<br><br><b>Policy Date</b><input type="date" name="policy_date" required>
<br><br><b>Scheme Name</b><select name="scheme_name"><?php echo $option1; ?></select>
<br><br><b>Agent Number</b><select name="agent_number"><?php echo $option; ?></select>
<br><br><b>Customer Name</b><input type="text" name="customer_name" required>
<br><br><b>Policy Amount</b><input type="number" name="policy_amount" required>
<br><br><b>Commission</b><input type="number" name="commission" readonly></input>(to be calculated automatically)
<br><br><input type="submit" class="button"></input><br><br>
</form>
</body>
</html>
