<html>
<?php
$database="testconnect";
$count=999;
$var=0;
$con = mysqli_connect("localhost","root" ,"",$database);
if (!$con)
    {
    die('Could not connect: ' . mysqli_error($con));
    }
//mysqli_select_db("$database", $con);
if(!empty($_POST["chk"]) && is_array($_POST["chk"])){
	foreach($_POST["chk"] as $chk){
		$title="title".$var;
		$select="select".$var;
		$category="category".$var;
		$date="date".$var;
		$impact="impact".$var;
		$link="Link".$var;
		$citation="Citation".$var;
		if(!empty($_POST[$select]) && !!empty($_POST[$category])){
			if(!empty($_POST[$title]) && !empty($_POST[$date]) && !empty($_POST[$impact]) && !empty($_POST[$link]) && !empty($_POST[$citation])){
			  $Title=$_POST[$title];
	          $Select=$_POST[$select];
              $Date=$_POST[$date];	 
              $Impact=$_POST[$impact];
			  $Link=$_POST[$link];
			  $Citation=$_POST[$citation];
	          $q="INSERT INTO paper(Title,Category,Date,Impact,Link,Citation) VALUES('" .$Title. "','" . $Select. "','" .$Date. "','" . $Impact. "','" . $Link. "','" . $Citation. "')";
	          mysqli_query($con,$q);
			}
		}
		else{
			if(!empty($_POST[$title]) && !empty($_POST[$date]) && !empty($_POST[$impact]) && !empty($_POST[$link]) && !empty($_POST[$citation])){
			  $Title=$_POST[$title];
	          $Category=$_POST[$category];
              $Date=$_POST[$date];	 
              $Impact=$_POST[$impact];
			  $Link=$_POST[$link];
			  $Citation=$_POST[$citation];
	          $q="INSERT INTO paper(Title,Category,Date,Impact,Link,Citation) VALUES('" .$Title. "','" . $Category. "','" .$Date. "','" . $Impact. "','" . $Link. "','" . $Citation. "')";
	          mysqli_query($con,$q);
			}
	}
	$var=$var+9;
}
}
    if(!empty($_POST["checkbox"]) && is_array($_POST["checkbox"])){
		foreach($_POST["checkbox"] as $checkbox){
			$name="Name".$count;
			$aurthor="Aurthor".$count;
			$publish="Publish".$count;
			$year="year".$count;
			//echo $count;
			//echo $name;
	        if(!empty($_POST[$name]) && !empty($_POST[$aurthor]) && !empty($_POST[$publish])&& !empty($_POST[$year]))
	        {
		      $Name=$_POST[$name];
	          $Aurthor=$_POST[$aurthor];
              $Publish=$_POST[$publish];	 
              $year=$_POST[$year];
	          $sql="INSERT INTO book(name,author,publish,year) VALUES('" .$Name. "','" . $Aurthor. "','" .$Publish. "','" . $year. "')";
	          mysqli_query($con,$sql);
		    }
	        $count=$count+6;
		}
		//echo "enterd";
	}
	
	echo "<script>alert('successfully Signed up');window.location.href='home.php';</script>";
?>
</html>