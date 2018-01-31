<html>
<?php
$database="testconnect";
$count=399;
$var=199;
$con = mysqli_connect("localhost","root" ,"",$database);
if (!$con)
    {
    die('Could not connect: ' . mysqli_error($con));
    }
//mysqli_select_db("$database", $con);
if(!empty($_POST["chk"]) && is_array($_POST["chk"])){
	foreach($_POST["chk"] as $chk){
		$title="projecttitle".$var;
		$staff="staff".$var;
		$student="student".$var;
		$dept="dept".$var;
		$year="year".$var;
		$projectutility="projectutility".$var;
		if(!empty($_POST[$title]) && !empty($_POST[$staff]) && !empty($_POST[$student]) && !empty($_POST[$dept]) && !empty($_POST[$year]) && !empty($_POST[$projectutility])){
		  $Title=$_POST[$title];
	      $Staff=$_POST[$staff];
		  $Student=$_POST[$student];
          $Dept=$_POST[$dept];	 
          $Year=$_POST[$year];
		  $Projectutility=$_POST[$projectutility];
		  $q="INSERT INTO internal_projects(project_title,staff_name,student_name,dept,year,project_utility) VALUES('" .$Title. "','" . $Staff. "','" . $Student. "','" .$Dept. "','" . $Year. "','" . $Projectutility. "')";
	      echo $q;
		  mysqli_query($con,$q);
		}			
	$var=$var+8;
	}
}

    if(!empty($_POST["checkbox"]) && is_array($_POST["checkbox"])){
		foreach($_POST["checkbox"] as $checkbox){
			//print_r($_POST);
			$ptitle="ptitle".$count;
			$principal="principal".$count;
			$cinvestigator="cinvestigator".$count;
			$amount="amount".$count;
			$grant="grant".$count;
			$fundingbody="fundingbody".$count;
			$year="Year".$count;
			//echo $count;
			echo $ptitle ." ". $principal ." ". $cinvestigator ." ". $amount ." ". $grant ." ". $fundingbody ." ". $year;
	        if(!empty($_POST[$ptitle]) && !empty($_POST[$principal]) && !empty($_POST[$cinvestigator]) && !empty($_POST[$amount]) && !empty($_POST[$grant]) && !empty($_POST[$fundingbody]) && !empty($_POST[$year]))
	        {
		      $Ptitle=$_POST[$ptitle];
	          $Principal=$_POST[$principal];
              $Cinvestigator=$_POST[$cinvestigator];
			  $Amount=$_POST[$amount];
	          $Grant=$_POST[$grant];
              $Fundingbody=$_POST[$fundingbody];
              $Year=$_POST[$year];
	          $sql="INSERT INTO external_projects(project_title,principal,co_investigator,amount_recieved,grant_type,funding_body,year) VALUES('" .$Ptitle. "','" . $Principal. "','" . $Cinvestigator. "','" .$Amount. "','" . $Grant. "','" . $Fundingbody. "','" .$Year. "')";
	          mysqli_query($con,$sql);
			}
	        $count=$count+9;
		}
		
	}
	
	echo "<script>window.location.href='stage5.php';</script>";
?>
</html>