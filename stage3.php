<?php
session_start();
// print_r($_POST);
// echo("<br>");
// print_r($_FILES);
if(isset($_SESSION['eid']))
{
	$emp_id = $_SESSION['eid'];
	if(isset($_POST['submit']))
	{
		error_reporting(E_ERROR | E_PARSE);
		//print_r($_FILES);
		/* FILE UPLOADING BEGINS HERE */
		$file_count = count($_FILES);
		//print($file_count);;
		//pc = proof_count
		$qualification_pc = 0;
		$qualif_data = [];
		$teacher_exp_pc = 0;
		$research_exp_pc = 0;
		$industry_exp_pc = 0;
		//tswc = training, seminar, workshop, conference
		$tswc_attended_pc = 0;
		$tswc_organized_pc =0;

		foreach ($_FILES as $key => $value) 
		{	
			if(strpos($key,'qualific_details_') !== false)
			{
				$qualification_pc++;
			}

			if(strpos($key,'teacher_exp_details_') !== false)
			{
				$teacher_exp_pc++;
			}	
			if(strpos($key,'research_exp_details_') !== false)
			{
				$research_exp_pc++;;
			}
			if(strpos($key,'industry_exp_details_') !== false)
			{
				$industry_exp_pc++;
			}
			if(strpos($key,'train_conf_') !== false)
			{
				$tswc_attended_pc++;
			}
			if(strpos($key,'organization_') !== false)
			{
				$tswc_organized_pc++;
			}
		}

		$img_arr = [];
		$type_identify = [];

		//print_r($_FILES);
		if($qualification_pc>0)
		{
			for($itr=0; $itr<$qualification_pc; $itr++)
			{
				array_push($img_arr, 'qualific_proof_'.($itr+1));
				array_push($type_identify, 'qualific_details_'.($itr+1));
			}

		}
		
		if($teacher_exp_pc>0)
		{
			for($itr=0; $itr<$teacher_exp_pc; $itr++)
			{
				array_push($img_arr, 'teacher_exp_proof_'.($itr+1));
				array_push($type_identify, 'teacher_exp_details_'.($itr+1));
			}

		}
		
		if($research_exp_pc>0)
		{
			for($itr=0; $itr<$research_exp_pc; $itr++)
			{
				array_push($img_arr, 'reseach_exp_proof_'.($itr+1));
				array_push($type_identify, 'research_exp_details_'.($itr+1));
			}

		}
		
		if($industry_exp_pc>0)
		{
			for($itr=0; $itr<$industry_exp_pc; $itr++)
			{
				array_push($img_arr, 'industry_exp_proof_'.($itr+1));
				array_push($type_identify, 'industry_exp_details_'.($itr+1));
			}
		}
		
		if($tswc_attended_pc>0)
		{
			for($itr=0; $itr<$tswc_attended_pc; $itr++)
			{
				array_push($img_arr, 'tswcAttend_proof_'.($itr+1));
				array_push($type_identify, 'train_conf_'.($itr+1));
			}

		}
		
		if($tswc_organized_pc>0)
		{
			for($itr=0; $itr<$tswc_organized_pc; $itr++)
			{
				array_push($img_arr, 'tswcOrg_proof_'.($itr+1));
				array_push($type_identify, 'organization_'.($itr+1));
			}

		}

		for($i = 0; $i<$file_count; $i++) 
		{
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES[$type_identify[$i]]["name"][0]);
			$path_parts = pathinfo($target_file);
			$file_extension = $path_parts['extension'];
			$saved_name = $target_dir.$img_arr[$i].'_'.$emp_id.'.'.$file_extension;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
	    	$check = getimagesize($_FILES[$type_identify[$i]]["tmp_name"][0]);
	    	if($check !== false) 
	    	{
	        	//echo "File is an image - " . $check["mime"] . ".<br>";
	        	$uploadOk = 1;
	    	} 
	    	else 
	    	{
	    		//handle error
	        	//echo "File is not an image.<br>";
	        	$uploadOk = 0;
	    	}
				// Check if file already exists
			if (file_exists($saved_name)) 
			{
				//handle error
	    		echo "Sorry, file already exists.<br>";
	    		$uploadOk = 0;
			}
				// Check file size
			if ($_FILES["fileToUpload"]["size"][$i] > 1000000) 
			{
				//handle error
	    		echo "Sorry, your file is too large.<br>";
	    		$uploadOk = 0;
			}
				// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{
				//handle error
	    		//echo "Sorry, your file was not uploaded.<br>";
			}
			else 
			{
	    		if (move_uploaded_file($_FILES[$type_identify[$i]]["tmp_name"][0],$saved_name)) 
	    		{
	    			//successful
	    			//echo("Successful");

	    		} 
	    		else 
	    		{
	        		$code = 500;
					header("Location: alert.php?code=$code");
	    		}
			}
		}


		/* FILE UPLOADING FINISHES HERE */

		$non_empty = [];
		$final = [];

		foreach ($_POST as $key => $value) 
		{
			//echo($key);
			foreach ($value as $inner_key => $inner_value) 
			{
				if(!empty($inner_value))
				{	
					array_push($non_empty,$key);
					//print($inner_value);
					//print("&nbsp;");
					array_push($final, $inner_value);

				}
			}
			//echo("<br>");
		}

		$qualific_details = [];
		//$exp_details = [];
		$teacher_exp_details = [];
		//$apppoint_details = [];
		$research_exp_details = [];
		//$ooverall_exp = [];
		$industry_exp_details = [];
		$subs_taught = [];
		$prof_memship = [];
		$interact_outside = [];
		$train_conf = [];
		$organization = [];
		$projects_guided = [];
		foreach ($non_empty as $key => $value) 
		{
			if(strpos($value,'qualific_details_') !== false)
			{
				array_push($qualific_details,$final[$key]);
			}
			
			if(strpos($value,'teacher_exp_details_') !== false)
			{
				array_push($teacher_exp_details,$final[$key]);
			}

			if(strpos($value,'research_exp_details_') !== false)
			{
				array_push($research_exp_details,$final[$key]);
			}

			if(strpos($value,'industry_exp_details_') !== false)
			{
				array_push($industry_exp_details,$final[$key]);
			}

			if(strpos($value,'subs_taught_') !== false)
			{
				array_push($subs_taught,$final[$key]);
			}

			if(strpos($value,'prof_memship_') !== false)
			{
				array_push($prof_memship,$final[$key]);
			}

			if(strpos($value,'interact_outside_') !== false)
			{
				array_push($interact_outside,$final[$key]);
			}

			if(strpos($value,'train_conf_') !== false)
			{
				array_push($train_conf,$final[$key]);
			}

			if(strpos($value,'organization_') !== false)
			{
				array_push($organization,$final[$key]);
			}

			if(strpos($value,'projects_guided_') !== false)
			{
				array_push($projects_guided,$final[$key]);
			}
		}

		// print_r($teacher_exp_details);
		// echo("<br>");
		// print_r($research_exp_details);
		// echo("<br>");
		// print_r($industry_exp_details);
		// echo("<br>");

		$qd_itr = 8;
		$ted_itr = 10;
		$red_itr = 5;
		$ied_itr = 5;
		$st_itr = 4;
		$pm_itr = 3;
		$io_itr = 3;
		$tc_itr = 5;
		$org_itr = 3;
		$pg_itr = 7;

		$qd_rcount = count($qualific_details)/$qd_itr;
		// print($qd_rcount);
		$ted_rcount = count($teacher_exp_details)/$ted_itr;
		// print($ted_rcount);
		$red_rcount = count($research_exp_details)/$red_itr;
		// print($red_rcount);
		$ied_rcount = count($industry_exp_details)/$ied_itr;
		// print($ied_rcount);
		$st_rcount = count($subs_taught)/$st_itr;
		// print($st_rcount);
		$pm_rcount = count($prof_memship)/$pm_itr;
		// print($pm_rcount);
		$io_rcount = count($interact_outside)/$io_itr;
		// print($io_rcount);
		$tc_rcount = count($train_conf)/$tc_itr;
		// print($tc_rcount);
		$org_rcount = count($organization)/$org_itr;
		// print($org_rcount);
		$pg_rcount = count($projects_guided)/$pg_itr;
		// print($pg_rcount);
		$conn = mysqli_connect("localhost" , "root" ,"");
		mysqli_select_db($conn,"college");
		
		// insert into qualification details STARTS HERE -- working
		if($qd_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $qd_rcount; $curr_row++)
			{	
				${"qualific_details_$curr_row"} = [];
				for($i = ($qd_itr*($curr_row-1)); $i< ($qd_itr*($curr_row)) ; $i++)
				{
					array_push(${"qualific_details_$curr_row"}, $qualific_details[$i]);
				}
			}

			for($i=1;$i<=$qd_rcount;$i++)
			{
				$_SESSION["qd_$i"] = ${"qualific_details_$i"};
				$qd["$i"] = $_SESSION["qd_$i"]; 
			}

			for($i=1;$i<=$qd_rcount;$i++){
				$query = "insert into qualification_details(emp_id,qualification, branch, specialization, university, percentage, cgpa, class_obtained, passing_year, proof) values ('$emp_id','".$qd["$i"][0]."','".$qd["$i"][1]."','".$qd["$i"][2]."','".$qd["$i"][3]."','".$qd["$i"][4]."','".$qd["$i"][5]."','".$qd["$i"][6]."','".$qd["$i"][7]."','".$qd["$i"][8]."')";
				// echo($query);
				// echo("<br>");

				if(mysqli_query($conn,$query))
				{
					//echo "row in qualification_details inserted";
				}
				else
				{
					echo "error in qualification_details insertion";
					//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
	// insert into qualification details ENDS HERE

	// insert into teacher experience details STARTS HERE

		if($ted_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $ted_rcount; $curr_row++)
			{	
				${"teacher_exp_details_$curr_row"} = [];
				for($i = ($ted_itr*($curr_row-1)); $i< ($ted_itr*($curr_row)) ; $i++)
				{
					array_push(${"teacher_exp_details_$curr_row"}, $teacher_exp_details[$i]);
				}
			}

			for($i=1;$i<=$ted_rcount;$i++)
			{
				//print_r(${"qualific_details_$i"});
				//echo "<br>";
				$ted["$i"] = ${"teacher_exp_details_$i"};
			}

			for($i=1;$i<=$ted_rcount;$i++){
				$query = "insert into teacher_experience_details(emp_id,organization_name, designation, date_of_joining, last_date_of_working, current_pay_scale, grade_pay, nature_of_appointment, ussc_app_date, ussc_ref_no, teaching_exp_years) values ('$emp_id','".$ted["$i"][0]."','".$ted["$i"][1]."','".$ted["$i"][2]."','".$ted["$i"][3]."','".$ted["$i"][4]."','".$ted["$i"][5]."','".$ted["$i"][6]."','".$ted["$i"][7]."','".$ted["$i"][8]."','".$ted["$i"][9]."')";
				//echo($query);
				//echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in exp_details inserted";
				}
				else
				{
					echo "error in exp_details insertion";
					//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		
	// insert into teacher experience details ENDS

	// insert into research experience details BEGINS
		if($red_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $red_rcount; $curr_row++)
			{	
				${"research_exp_details_$curr_row"} = [];
				for($i = ($red_itr*($curr_row-1)); $i< ($red_itr*($curr_row)) ; $i++)
				{
					array_push(${"research_exp_details_$curr_row"}, $research_exp_details[$i]);
				}
			}

			for($i=1;$i<=$red_rcount;$i++)
			{
				//print_r(${"qualific_details_$i"});
				//echo "<br>";
				$red["$i"] = ${"research_exp_details_$i"};
			}

			for($i=1;$i<=$red_rcount;$i++){
				$query = "insert into research_experience_details(emp_id,organization_name, designation, date_of_joining, last_date_of_working, research_exp_years) values ('$emp_id','".$red["$i"][0]."','".$red["$i"][1]."','".$red["$i"][2]."','".$red["$i"][3]."','".$red["$i"][4]."')";
				//echo($query);
				//echo("<br>");

				if(mysqli_query($conn,$query))
				{
					//echo "row in exp_details inserted";
				}
				else
				{
					echo "error in exp_details insertion";
					//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}

	// insert into research experience details ENDS

	// insert into industry experience details BEGINS
		if($ied_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $ied_rcount; $curr_row++)
			{	
				${"industry_exp_details_$curr_row"} = [];
				for($i = ($ied_itr*($curr_row-1)); $i< ($ied_itr*($curr_row)) ; $i++)
				{
					array_push(${"industry_exp_details_$curr_row"}, $industry_exp_details[$i]);
				}
			}

			for($i=1;$i<=$ied_rcount;$i++)
			{
				//print_r(${"qualific_details_$i"});
				//echo "<br>";
				$ied["$i"] = ${"industry_exp_details_$i"};
			}

			for($i=1;$i<=$ied_rcount;$i++){
				$query = "insert into industry_experience_details(emp_id,organization_name, designation, date_of_joining, last_date_of_working, industry_exp_years) values ('$emp_id','".$ied["$i"][0]."','".$ied["$i"][1]."','".$ied["$i"][2]."','".$ied["$i"][3]."','".$ied["$i"][4]."')";
				// echo($query);
				// echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in exp_details inserted";
				}
				else
				{
					echo "error in exp_details insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}


	// insert into industry experience details ENDS

	// insert into subject taught
		if($st_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $st_rcount; $curr_row++)
			{	
				${"subs_taught_$curr_row"} = [];
				for($i = ($st_itr*($curr_row-1)); $i< ($st_itr*($curr_row)) ; $i++)
				{
					array_push(${"subs_taught_$curr_row"}, $subs_taught[$i]);
				}
				//print_r(${"subs_taught_$curr_row"});
				//echo "<br>";
			}

			for($i=1;$i<=$st_rcount;$i++)
			{
				//print_r(${"subs_taught_$i"});
				//echo "<br>";
				$_SESSION["subs_taught_$i"] = ${"subs_taught_$i"};
				$st["$i"] = $_SESSION["subs_taught_$i"]; 
			}
			
			for($i=1;$i<=$st_rcount;$i++){
				$query = "insert into subject_taught(emp_id,Type_of_graduation,Subject_taught,Peroid_Year,sub_exp,Syllabus) values ('$emp_id','".$st["$i"][0]."','".$st["$i"][1]."','".$st["$i"][2]."','".$st["$i"][3]."','".$st["$i"][4]."')";
				//echo($query);
				echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in subject_taught inserted";
				}
				else
				{
					echo "error in subject_taught insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
	// insert into subject taught ENDS


	// insert into PROFESSIONAL MEMBERSHIP DETAILS
		if($pm_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $pm_rcount; $curr_row++)
			{	
				${"prof_memship_$curr_row"} = [];
				for($i = ($pm_itr*($curr_row-1)); $i< ($pm_itr*($curr_row)) ; $i++)
				{
					array_push(${"prof_memship_$curr_row"}, $prof_memship[$i]);
				}
				//print_r(${"prof_memship_$curr_row"});
				//echo "<br>";
			}

			for($i=1;$i<=$pm_rcount;$i++)
			{
				//print_r(${"prof_memship_$i"});
				//echo "<br>";
				$_SESSION["prof_memship_$i"] = ${"prof_memship_$i"};
				$pm["$i"] = $_SESSION["prof_memship_$i"];
			}
			
			for($i=1;$i<=$pm_rcount;$i++){
				$query = "insert into professional_membership(emp_id,Membership_category,Membership_no,Body_of_organization) values ('$emp_id','".$pm["$i"][0]."','".$pm["$i"][1]."','".$pm["$i"][2]."')";
				//echo($query);
				// echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in professional_membership inserted";
				}
				else
				{
					echo "error in professional_membership insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}

	// insert into PROFESSIONAL MEMBERSHIP DETAILS ends

	// insert into interaction_with_outside_world
		if($io_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $io_rcount; $curr_row++)
			{	
				${"interact_outside_$curr_row"} = [];
				for($i = ($io_itr*($curr_row-1)); $i< ($io_itr*($curr_row)) ; $i++)
				{
					array_push(${"interact_outside_$curr_row"}, $interact_outside[$i]);
				}
				//print_r(${"interact_outside_$curr_row"});
				//echo "<br>";
			}

			for($i=1;$i<=$io_rcount;$i++)
			{
				//print_r(${"interact_outside_$i"});
				//echo "<br>";
				$_SESSION["interact_outside_$i"] = ${"interact_outside_$i"};
				$io["$i"] = $_SESSION["interact_outside_$i"];
			}
			
			for($i=1;$i<=$io_rcount;$i++){
				$query = "insert into interaction_with_outside_world(emp_id,Interaction_Type,Organization,Date) values ('$emp_id','".$io["$i"][0]."','".$io["$i"][1]."','".$io["$i"][2]."')";
				//echo($query);
				echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in interaction_with_outside_world inserted";
				}
				else
				{
					echo "error in interaction_with_outside_world insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
	// insert into interaction_with_outside_world end

	// insert into TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ATTENDED

		if($tc_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $tc_rcount; $curr_row++)
			{	
				${"train_conf_$curr_row"} = [];
				for($i = ($tc_itr*($curr_row-1)); $i< ($tc_itr*($curr_row)) ; $i++)
				{
					array_push(${"train_conf_$curr_row"}, $train_conf[$i]);
				}
				//print_r(${"train_conf_$curr_row"});
				//echo "<br>";
			}

			for($i=1;$i<=$tc_rcount;$i++)
			{
				//print_r(${"train_conf_$i"});
				//echo "<br>";
				$_SESSION["train_conf_$i"] = ${"train_conf_$i"};
				$tc["$i"] = $_SESSION["train_conf_$i"];
			}
			
			for($i=1;$i<=$tc_rcount;$i++){
				$query = "insert into training_courses_attended(emp_id,course_name,organization_name,start_date,end_date,proof) values ('$emp_id','".$tc["$i"][0]."','".$tc["$i"][1]."','".$tc["$i"][2]."','".$tc["$i"][3]."','".$tc["$i"][4]."')";
				//echo($query);
				// echo("<br>");

				if(mysqli_query($conn,$query))
				{
					//successfull
				}
				else
				{
					//handle the error
					echo "error in training_courses_attended insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}

	// insert into TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ATTENDED end 

	// insert into TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ORGANIZED

		if($org_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $org_rcount; $curr_row++)
			{	
				${"organization_$curr_row"} = [];
				for($i = ($org_itr*($curr_row-1)); $i< ($org_itr*($curr_row)) ; $i++)
				{
					array_push(${"organization_$curr_row"}, $organization[$i]);
				}
				//print_r(${"organization_$curr_row"});
				//echo "<br>";
			}

			for($i=1;$i<=$org_rcount;$i++)
			{
				//print_r(${"organization_$i"});
				//echo "<br>";
				$_SESSION["organization_$i"] = ${"organization_$i"};
				$org["$i"] = $_SESSION["organization_$i"];
			}
			
			for($i=1;$i<=$org_rcount;$i++){
				$query = "insert into training_courses_organize(emp_id,course_name,responsibility,course_duration,proof) values ('$emp_id','".$org["$i"][0]."','".$org["$i"][1]."','".$org["$i"][2]."','".$org["$i"][3]."')";
				//echo($query);
				// echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in training_courses_organize inserted";
				}
				else
				{
					echo "error in training_courses_organize insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
	// insert into TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ORGANIZED  end


	// insert into PROJECT GUIDED


		if($pg_rcount > 0)
		{
			for($curr_row = 1; $curr_row <= $pg_rcount; $curr_row++)
			{	
				${"projects_guided_$curr_row"} = [];
				for($i = ($pg_itr*($curr_row-1)); $i< ($pg_itr*($curr_row)) ; $i++)
				{
					array_push(${"projects_guided_$curr_row"}, $projects_guided[$i]);
				}
				//print_r(${"projects_guided_$curr_row"});
				//echo "<br>";
			}

			for($i=1;$i<=$pg_rcount;$i++)
			{
				//print_r(${"projects_guided_$i"});
				//echo "<br>";
				$_SESSION["projects_guided_$i"] = ${"projects_guided_$i"};
				$pg["$i"] = $_SESSION["projects_guided_$i"];
			}
			
			for($i=1;$i<=$pg_rcount;$i++){
				$query = "insert into project_guided(emp_id,project_title,guide_name,group_members,dept,year,student_cat,remark) values ('$emp_id','".$pg["$i"][0]."','".$pg["$i"][1]."','".$pg["$i"][2]."','".$pg["$i"][3]."','".$pg["$i"][4]."','".$pg["$i"][5]."','".$pg["$i"][6]."')";
				//echo($query);
				echo("<br>");

				if(mysqli_query($conn,$query))
				{
					// echo "row in project_guided inserted";
				}
				else
				{
					echo "error in project_guided insertion";
					// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
	// insert into PROJECT GUIDED end	
	}
}
else
{
	$result = 403;
	header("Location: alert.php?res=$result");
}



//echo "<br>Printing session variable now<br>";
//print_r($_SESSION);


?>



<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="ab.css" rel="stylesheet">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<title>Responsibilities Handled</title>
<style>
	body{
		color :black !important;
	}
	label {
    /* Other styling.. */

    clear: both;
    float:left;
}

</style>
</head>
<body>
<div class="wrapper row1" align="center">
  <header id="header" class="hoc clear"> 
    <div >
      <p align="center" style="font-size:30px;font-family:sans-serif ; color:white; "><img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a></p>
    </div>
   </header>
   </div>
   <br><br><br>

<form action="stage4.php" method="POST">
 <table align='center' border='1' name="qualific_details" style="table-layout: fixed; width:99%">
 <caption><h2>Responsibilites Handled by Faculty</h2></caption>

	<tr>
		<td  align="center" style="width:5%">
			<input type="checkbox" name="responsibilities[]" value="dept_seminar_work_inch" id="responsibilities"/>
		</td>
		<td>
			<label>Incharge of Departmental Seminar / Workshop</label>
		</td>
	<!--<td></td> -->
		<td  align="center" style="width:5%">
			<input type="checkbox" name="responsibilities[]" value="store_incharge" id="responsibilities"/>
		</td>
		<td>
			<label>Store Incharge</label>
		</td>
	</tr>
	
	<tr>
		<td align="center">
			<input type="checkbox" name="responsibilities[]" value="etamax_coordinator" id="responsibilities" />
		</td>
		<td>
			<label>Etamax Coordinator</label>
		</td>		
	<!--<td></td> -->
		<td align="center">
			<input type="checkbox" name="responsibilities[]" value="dept_lib_incharge" id="responsibilities" />
		</td>
		<td>
			<label>Department Library Incharge</label>
		</td>
		</tr>
	
		<tr>
			<td align="center">
				<input type="checkbox" name="responsibilities[]" value="faces_coordinator" id="responsibilities" />
			</td>
			<td>
				<label>Faces Coordinator</label>
			</td>
	<!--<td></td> -->
			<td align="center">
				<input type="checkbox" name="responsibilities[]" value="fe_admission" id="responsibilities" />
			</td>
			<td>
				<label>First Year Admission</label>
			</td>
		</tr>

	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="exam_conduction" id="responsibilities" /></td>
	<td><label>Exam Conduction</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="lpp_incharge" id="responsibilities" /></td>
	<td><label>LCD Projector / Printer Incharge </label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="ut_conduction" id="responsibilities" /></td>
	<td><label>UT Conduction</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="trekking" id="responsibilities" /></td>
	<td><label>Trekking</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="felic_overall_coord" id="responsibilities" /></td>
	<td><label>Felicitation Coordinator (Dept. / Overall Coordinator)</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="indust_visit" id="responsibilities" /></td>
	<td><label>Industrial Visit</label></td>
	</tr>
	<tr>
	<td  align="center"><input type="checkbox" name="responsibilities[]" value="convocation_coord" id="responsibilities" /></td>
	<td><label>Convocation Coordinator (Dept. / Overall Coorodinator)</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="accrediation_inch" id="responsibilities" /></td>
	<td><label>Accrediation(NBA) Incharge / Department Coordinator</label></td>
	</tr>

	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="icnte_member" id="responsibilities" /></td>
	<td><label>ICNTE Convener/Co-convener / Committee Member</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="rnd_dept_coord" id="responsibilities" /></td>
	<td><label>Dean R&D / Department Coordiantor</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="felic_centre_coord" id="responsibilities" /></td>
	<td><label>Felicitaion Centre Coordinator</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="dean_stud_affairs" id="responsibilities" /></td>
	<td><label>Dean Student Affairs</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="pti_inch" id="responsibilities" /></td>
	<td><label>PTI Incharge </label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="exam_cell_coord" id="responsibilities" /></td>
	<td><label>Exam Cell Coordinator</label></td>
	</tr>


	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="class_teacher" id="responsibilities" /></td>
	<td><label>Class Teacher / Co-class Teacher</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="dpt_magaz_inch" id="responsibilities" /></td>
	<td><label>Department Magzine Incharge</label></td>
	</tr>


	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="sum_win_course_inch" id="responsibilities" /></td>
	<td><label>Summer / Winter Course Incharge</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="aicte_inch" id="responsibilities" /></td>
	<td><label>AICTE Incharge</label></td>
	</tr>


	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="lic_comm_inch" id="responsibilities" /></td>
	<td><label>LIC Committee Incharge / Department Coordinator</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="proj_coord" id="responsibilities" /></td>
	<td><label>Project Coordinator</label></td>
	</tr>

	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="tt_inch" id="responsibilities" /></td>
	<td><label>Time Table Incharge</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="placement_inch" id="responsibilities" /></td>
	<td><label>Placement Incharge / Department Coordinator</label></td>
	</tr>

	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="alumina_inch" id="responsibilities" /></td>
	<td><label>Alumina Incharge</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="lab_inch" id="responsibilities" /></td>
	<td><label>Lab Incharge</label></td>
	<tr>

	<td align="center"><input type="checkbox" name="responsibilities[]" value="fe_engg_adm" id="responsibilities" /></td>
	<td><label>First Year Engineering Admission</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="dean_academ" id="responsibilities" /></td>
	<td><label>Dean Academics</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="st_cncl_inch" id="responsibilities" /></td>
	<td><label>Student Council Incharge</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="dean_pg" id="responsibilities" /></td>
	<td><label>Dean P.G (Higher Studies)</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="cheif_cond_exam" id="responsibilities"></td>
    <td><label>Chief Conductor of Examination</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="ss_samitee" id="responsibilities" /></td>
	<td><label>Shikshan Shulk Samitee</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="sen_sup" id="responsibilities" /></td>
	<td><label>Senior Supervisor</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="univ_affil_inch" id="responsibilities" /></td>
	<td><label>University Affilitions Incharge / Departmental Coordinator</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="exam_cell_inch" id="responsibilities" /></td>
	<td><label>Exam Cell Incharge</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="me_coord" id="responsibilities" /></td>
	<td><label>M.E Coordinator</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="clg_magaz_inch" id="responsibilities" /></td>
	<td><label>College Magzine Incharge</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="phd_coord" id="responsibilities" /></td>
	<td><label>Ph.D Coordinator</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="hod" id="responsibilities" /></td>
	<td><label>HOD</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="prof_soc_inch" id="responsibilities" /></td>
	<td><label>Professional Society Incharge</label></td>
	</tr>
	<tr>
	<td align="center"><input type="checkbox" name="responsibilities[]" value="coordinator" id="responsibilities" /></td>
	<td><label>Coordinator</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="contrlr_exam" id="responsibilities" /></td>
	<td><label>Controller of Examination</label></td>
	
	</tr>

	<tr>
    <td align="center"><input type="checkbox" name="responsibilities[]" value="d_contrlr_inch" id="responsibilities" /></td>
	<td><label>Deputy Controller of Examination</label></td>
	<!--<td></td> -->
	<td align="center"><input type="checkbox" name="responsibilities[]" value="felic_cent_coord" id="responsibilities" /></td>
	<td><label>Felicitaion Centre Coordinator</label></td>
	
	</tr>

<tr>

	<td></td>
 	<td align="center">
		<label style="padding-top:8px">Any Other : </label>
		<input type="textbox" name="other_resp" id="other_resp" style="width:300px;" align='left'>
	</td>
	<td></td>
	<td></td>
 	
</tr>
 </table>

	<br>
	<center>
		<input type="submit" name='submit' value="SUBMIT" style="width: 230px;margin-top: 15px;margin-bottom: 20%; height:40px;" >
</center>
</form>



<!--

<div align="center">
<form action="dc3.php" method="post">
<label> CheckBox 1 </label>
<input type="checkbox" name="check_list[]" value="value 1">
<label> CheckBox 2 </label>
<input type="checkbox" name="check_list[]" value="value 2">
<label> CheckBox 3 </label>
<input type="checkbox" name="check_list[]" value="value 3">
<label> CheckBox 4 </label>
<input type="checkbox" name="check_list[]" value="value 4">
<label> CheckBox 5 </label>
<input type="checkbox" name="check_list[]" value="value 5">
<input type="submit" />
</form>

-->
</div>
</body>
</html>
