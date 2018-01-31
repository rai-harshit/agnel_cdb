<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Account Activation</title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   	<style type="text/css">
   		body{
   			color: black !important;
   		}
   		.acc_activation{
   			padding: 50px;
   			font-size: 22px;

   		}
   	</style>
</head>
<body>
	<div class = "float">
		<div class="header">
			<header id="header" class="hoc clear"> 
      			<p align="center" style="font-size:30px;font-family:sans-serif ; color:white;">
      				<img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>
      						FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY
      			</p>
   			</header>
   		</div>
   		<center>
   			<div class="acc_activation">

<?php

$conn = mysqli_connect("localhost" , "root" ,"");

if(!$conn)
{
	echo("<h3>Could not connect to the server at the moment. Please try again later.</h3><br>");
}
// else
// {
// 	//echo "Successfully connected to the database.<br>";
// }

mysqli_select_db($conn,"college");

$eid = $_GET['eid'];
//echo($eid);
//echo("<br>");
$aid = $_GET['aid'];
//echo($aid);
//echo("<br>");
$task = $_GET['task'];
//echo($task);
//echo("<br>");
$incoming_act_id = $aid.$task;
//echo($incoming_act_id);
//echo("<br><br>");

$sql1 = "select act_id from user_accounts where emp_id = $eid";

$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1)>0)
{
	$data = mysqli_fetch_array($result1);
	$original_act_id = $data['act_id'];
	if(isset($original_act_id)){
		if($incoming_act_id==$original_act_id)
		{
			$activation_result = 1;
		}
		else
		{
			$activation_result = -1;
		}
	}
	else
	{
		$activation_result = 0;
	}
}
else
{
	echo("Activation Link is Invalid.");
}
if($activation_result == 1)
{
	$sql2 = "update user_accounts set acc_status='activated', acc_act_time=CURRENT_TIMESTAMP, act_id=NULL where emp_id=$eid";
	$result2 = mysqli_query($conn,$sql2);
	if($result2)
	{
		echo("Your account has been verified and activated successfully.");
		echo("<br><br>");
		echo("Redirecting you to the Login Page in 5 seconds...");
	}
	else
	{
		echo("Account could not be activated at the moment.");
	}
}
else if($activation_result == -1)
{
	echo("Activation Link is Invalid");
}
else if($activation_result == 0)
{
	echo("<b>Your Account is already activated.</b>");
	echo("<br><br>");
	echo("<b>Redirecting you to the Login Page in 2 seconds...</b>");
	header( "refresh:2; url=login.php" ); 
}



//use this link to test this page
//http://localhost/jaya/activation.php?eid=91115&aid=79606c7dbab165ab75f68dee6db13e76df03283d&task=0263f22f2a58bc6daf51ce8164c858d4c88548ee

?>


			</div>
		</center>
   	</div>
</body>
</html>




















