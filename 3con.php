<?php
$database="testconnect";
$con = mysqli_connect("localhost","root" ,"",$database);
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

//print_r($_POST);
if(!empty($_POST['res'])){
	$res=$_POST['res'];
	$res1=implode(",",$res);
	//echo $res1;
	$q="INSERT INTO other_responsibility(Sr_no,responsibility) VALUES(null,'" . $res1. "')";
	mysqli_query($con,$q);
}
if(!empty($_POST['other'])){
	$res=$_POST['other'];
	$q1="INSERT INTO other_responsibility(Sr_no,responsibility) VALUES(null,'" . $res. "')";
	mysqli_query($con,$q1);
}
	echo"<script>window.location.href='stage4.php';</script>";
?>