<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'college';


//connect with database here

print_r($_POST);
//print_r($_SESSION);
//echo "<br><br><br>";

	$email = $_SESSION['email'];
	$pass = $_POST['pass'];

	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$fa_name = $_SESSION['fa_name'];
	$mname = $_SESSION['mname'];
	$gender = $_SESSION['gender'];
	$mar_status = $_SESSION['mar_stat'];
	
	if ($mar_status == "Married")
	{
		$spouse_name = $_SESSION['sp_name'];
	}

	$dob = $_SESSION['dob'];

	if(!empty($_SESSION['res_phone']))
	{
		$res_phone = $_SESSION['res_phone'];
	}

	$personal_phone = $_SESSION['personal_phone'];
	$alt_email = $_SESSION['alt_email'];
	$curr_addr = $_SESSION['curr_addr'];
	$perm_addr = $_SESSION['perm_addr'];
	$adhar = $_SESSION['adhar'];
	$pf_no = $_SESSION['pf_no'];
	$pan_no = $_SESSION['pan_no'];
	$passport_no = $_SESSION['passport_no'];
	$nationality = $_SESSION['nationality'];
	$religion = $_SESSION['religion'];
	$category = $_SESSION['category'];
	$caste = $_SESSION['caste'];
	$bank_name = $_SESSION['bank_name'];
	$account_no = $_SESSION['account_no'];
	$acc_holder_name = $_SESSION['acc_holder_name'];
	$ifsc = $_SESSION['ifsc'];
	$bank_branch = $_SESSION['bank_branch'];
	$form16 = $_SESSION['form16'];
	$faculty_type = $_SESSION['faculty_type'];
	$appointment_type = $_SESSION['appointment_type'];
	$dept_name = $_SESSION['department_name'];
	$emp_id = $_SESSION['emp_id'];
	$library_card_no = $_SESSION['library_card_no'];
	$higher_qualific = $_SESSION['high_qualif'];

	if(!empty($_SESSION['other_high_qualif']))
	{
		$other_high_qualific = $_SESSION['other_high_qualif'];
	}
/*
	if(!empty($_SESSION['other_designation']))
	{
		$other_designation = $_SESSION['other_designation'];
	}
*/
	if(!empty($_SESSION['designation']))
	{
		$designation = [];
		foreach ($_SESSION['designation'] as $key => $value) 
		{
			array_push($designation, $value);
		}
	}

	/*TABLE DATA COLLECTION BEGINS HERE */

	# 11 Required tables:
	$qualification_details = [];
	$subjects_taught = [];
	$professional_mem_details = [];
	$interaction_outside_world = [];
	$train_conf = [];
	$organization = [];
	$project_guided = [];
	$internal_projects = [];
	$external_projects = [];
	$paper_publication = [];
	$book_publication = [];
	$responsibilities = [];
	
	array_push($responsibilities,$_SESSION['responsibilities']);

	foreach ($_SESSION as $key => $value) 
	{	

		if(strpos($key, 'qualific_details_') !== false)
		{	
			array_push($qualification_details, $value);
		}

		if(strpos($key, 'subs_taught_') !== false)
		{	
			array_push($subjects_taught, $value);
		}

		if(strpos($key, 'prof_memship_') !== false)
		{	
			array_push($professional_mem_details, $value);
		}		

		if(strpos($key, 'interact_outside_') !== false)
		{	
			array_push($interaction_outside_world, $value);
		}	

		if(strpos($key, 'train_conf_') !== false)
		{	
			array_push($train_conf, $value);
		}		

		if(strpos($key, 'organization_') !== false)
		{	
			array_push($organization, $value);
		}		

		if(strpos($key, 'projects_guided_') !== false)
		{	
			array_push($project_guided, $value);
		}		

		if(strpos($key, 'internal_proj_') !== false)
		{	
			array_push($internal_projects, $value);
		}		

		if(strpos($key, 'external_proj_') !== false)
		{	
			array_push($external_projects, $value);
		}

		if(strpos($key, 'paper_publication_') !== false)
		{	
			array_push($paper_publication, $value);
		}		

		if(strpos($key, 'book_publication_') !== false)
		{	
			array_push($book_publication, $value);
		}
	}

	/* IT'S QUERY TIME NOW */

	//Entering Qualification Data
	foreach ($qualification_details as $key => $value) 
	{
		$sql1 = "insert into qualification(Qualification,Branch,Percentage,Class_Obtained,University) values ('$value[0]','$value[1]','$value[2]','$value[3]','$value[4]')";
		echo("<br>$sql1");

		#ENTER MYSQLI COMMANDS HERE
	} 

	//Entering Subjects_Taught Data
	foreach ($subjects_taught as $key => $value) 
	{
		$sql2 = "insert into <table name>(<attributes>) values ('$value[0]','$value[1]','$value[2]','$value[3]')";
		echo("<br>$sql2");

		#ENTER MYSQLI COMMANDS HERE
	}


	foreach ($subjects_taught as $key => $value) 
	{
		$sql2 = "insert into <table name>(<attributes>) values ('$value[0]','$value[1]','$value[2]','$value[3]')";
		echo("<br>$sql2");
		
		#ENTER MYSQLI COMMANDS HERE
	}

	//CONTINUE CREATING THE QUERIES HERE
	

	/* QUERY TIME OVER */


	/* TABLE DATA COLLECTION ENDS HERE */


	
	//IMAGE UPLOADING BEGINS HERE


	$email = $_POST['email'];
	$img_arr = ['dp','sign'];
	if(isset($_POST['submit']))
	{

	for($i = 0; $i<=1; $i++) {

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
		print($target_file);
		echo "<br>";
		$path_parts = pathinfo($target_file);
		echo "<br>";
		$file_extension = $path_parts['extension'];
		print_r($file_extension);
		$saved_name = $target_dir.$img_arr[$i].'_'.$email.'.'.$file_extension;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".<br>";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.<br>";
	        $uploadOk = 0;
	    }
				// Check if file already exists
		if (file_exists($saved_name)) {
	    	echo "Sorry, file already exists.<br>";
	    	$uploadOk = 0;
		}
				// Check file size
		if ($_FILES["fileToUpload"]["size"][$i] > 1000000) {
	    	echo "Sorry, your file is too large.<br>";
	    	$uploadOk = 0;
		}
		
				// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
	    	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    	$uploadOk = 0;
		} 

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
	    	echo "Sorry, your file was not uploaded.<br>";
		// if everything is ok, try to upload file
		} else {
	    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i],$saved_name)) {
	        	echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.<br>";
	    	} else {
	        	echo "Sorry, there was an error uploading your file.<br>";
	    	}
		}
	}
	}


	// IMAGE UPLOADING ENDS HERE

	//session_destroy(); #dont uncomment while testing


?>