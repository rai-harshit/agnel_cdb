<?php
session_start();

if(isset($_SESSION['eid']))
{
	$eid = $_SESSION['eid'];
	if(isset($_POST['submit_stage2-1']))
	{
		$faculty_type = $_POST['faculty_type'];
		$appointment_type = $_POST['appointment_type'];
		$Dept_name = $_POST['Dept_name'];
		$Library_card_no = $_POST['Library_card_no'];
		$college_emp_id = $_POST['college_emp_id'];
		if(!empty($_POST['designation']))
		{
			$designation = [];
			foreach ($_POST['designation'] as $key => $value) 
			{
				array_push($designation, $value);
			}
			// print_r($designation);
		}
		if(!empty($_POST['other_designation']))
		{
			$other_designation = explode(',',$_POST['other_designation']);
			$designation = array_merge($designation,$other_designation);
			print_r($designation);
		}
		if(!empty($_POST['highest_qualif']))
		{
			$highest_qualif = $_POST['highest_qualif'];
		}
		if(!empty($_POST['other_specialization']))
		{
			$other_specialization = explode(',',$_POST['other_specialization']);
		}
		$conn = mysqli_connect("localhost" , "root" ,"");

		if(!$conn)
		{
			$code = 500;
			header("Location: alert.php?code=$code");
		}
		else
		{

			mysqli_select_db($conn,"college");
				
				//insert into staff_emp_details
			$sql = "insert into staff_emp_details (emp_id,faculty_type,appointment_type,Library_card_no,college_emp_id,Dept_name,highest_qualif) values('$eid','$faculty_type','$appointment_type','$Library_card_no','$college_emp_id','$Dept_name','$highest_qualif')";

			if(!mysqli_query($conn,$sql))
			{
					//throw error
				$result = mysqli_error($conn);
				print($result);
			}
			
				//insert into designation
			foreach ($designation as $key => $desig) {
				$sql = "insert into designation (emp_id,designation) values('$eid','$desig')";
				if(!mysqli_query($conn,$sql))
				{
					//error handling
					$result = mysqli_error($conn);
					print($result);
				}
			}

		}
	}

}
else
{
	$code = 403;
	header("Location: alert.php?code=$code");
}

?>

<html>
<head>
<title>Staff Employment Details</title>
<style>
	body{
		color:black !important;
	}
	input{
		width:100%;
	}
	#myProgress {
		width: 100%;
		background-color: #ddd;
	}
	#myBar {
		width: 16.66%;
		height: 30px;
		background-color: #4CAF50;
	}
	select{
		width : 100%;
	}
</style>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language='javascript'>


  var id=599;                                                          //id for table1
  var rid=1399;                                                       //id for table2
  //var t21id=1999;
  var t3id=2299;
  var t4id=2599;
  var t5id=2999;
  var t6id=3499;
  var t7id=3999;
  var t8id=4499;
  var t9id = 5599;
  var t10id = 6699;
  
  
  // function to validate table1 -- QUALIFICATION DETAILS
  function check(field){
	  //id value for element
    var i1 = Number(field.id)+1;           
	var i2 = i1+1;                          
	var i3 = i1+2;
	var i4 = i1+3;
	var i5 = i1+4;
	var i6 = i1+5;
	var i7 = i1+6;
	var i8 = i1+7;
	//retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	var s5=document.getElementById(i5);
	var s6=document.getElementById(i6);
	var s7=document.getElementById(i7);
	var s8=document.getElementById(i8);
	//disabling fields if value of paper title is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s5.value = "";
	s6.value = "";
	s7.value = "";
	s8.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
	s5.disabled = true;
	s6.disabled = true;
	s7.disabled = true;
	s8.disabled = true;
    return 0;	
	}
	//enabling fields if value of paper title is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	s5.disabled = false;
	s6.disabled = false;
	s7.disabled = false;
	s8.disabled = false;
    return 0;		
	}
  }
 //jaya gupta
 // function for Experience Details
 function check1(field){
	  // id for element
    var i1 = Number(field.id)+1;
	var i2 = i1+1;
	var i3 = i1+2
	var i4 = i1+3;
	
	
	// retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	
	//disabling fields if value of name of book is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";
	s4.value = "";	
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
  	return 0;	
	}
	//enabling fields if value of name of book is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	return 0;		
	}
  }
  
  
    // function to validate table21 -- approval details
  function check9(field){
	  //id value for element
    var i1 = Number(field.id)+1;           
	var i2 = i1+1;                          
	var i3 = i1+2;
	var i4 = i1+3;
	var i5 = i1+4;
	//retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	var s5=document.getElementById(i5);
	//disabling fields if value of paper title is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s5.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
	s5.disabled = true;
	 return 0;	
	}
	//enabling fields if value of paper title is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	s5.disabled = false;
	return 0;		
	}
  }
  
  // function to check overall experience dedtails
  function check10(field){
	  //id value for element
    var i1 = Number(field.id)+1;           
	var i2 = i1+1;                          
	var i3 = i1+2;
	var i4 = i1+3;
	var i5 = i1+4;
	//retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	var s5=document.getElementById(i5);
	//disabling fields if value of paper title is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s5.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
	s5.disabled = true;
	 return 0;	
	}
	//enabling fields if value of paper title is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	s5.disabled = false;
	return 0;		
	}
  }
//jaya gupta	
	//function for SUBJECTS TAUGHT
	  function check2(field){
	  // id for element -- subs_taught
    var i1 = Number(field.id)+1;
	var i2 = i1+1;
	var i3 = i1+2;
	var i4 = i1+3;
	// retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	//disabling fields if value of name of book is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
	return 0;	
	}
	//enabling fields if value of name of book is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	return 0;		
	}
  }
  
  
  // function for PROFESSIONAL MEMBERSHIP DETAILS
  function check3(field){
	var i1 = Number(field.id)+1;
	var i2 = i1+1;
	// retrieving element by ids -- PROFESSIONAL MEMBERSHIP DETAILS
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	//disabling fields if value of name of book is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	return 0;	
	}
	//enabling fields if value of name of book is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	return 0;		
	}  
  }
  
  // function for INTERACTION WITH OUTSIDE WORLD
  function check4(field){
	  //id value for element -- INTERACTION WITH OUTSIDE WORLD
    var i1 = Number(field.id)+1;           
	var i2 = i1+1;                          
	//var i3 = i1+2;
	//var i4 = i1+3;
	//var i5 = i1+4;
	//retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	//var s3=document.getElementById(i3);
	//var s4=document.getElementById(i4);
	//var s5=document.getElementById(i5);
	//disabling fields if value of paper title is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	//s3.value = "";	
	//s4.value = "";
	//s5.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	//s3.disabled = true;
	//s4.disabled = true;
	//s5.disabled = true;
	return 0;	
	}
	//enabling fields if value of paper title is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	//s3.disabled = false;
	//s4.disabled = false;
	//s5.disabled = false;
    return 0;		
	}
  }
  

  //function for TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ATTENDED
 function check5(field){
	  //id value for element
    var i1 = Number(field.id)+1;           
	var i2 = i1+1;                          
	var i3 = i1+2;
	var i4 = i1+3;
	var i5 = i1+4;
	//var i6 = i1+5;//jaya
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	var s5=document.getElementById(i5);
	//var s6=document.getElementById(i6);//jaya
	//disabling fields if value of paper title is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s5.value = "";
	//s6.value = "";//jaya
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
	s5.disabled = true;	
	//s6.disabled = true;//jaya
	return 0;	
	}
	//enabling fields if value of paper title is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	s5.disabled = false;
    return 0;		
	}
  }
  
  //smita 
   //function for PROJECT GUIDED
 function check5(field){
	  //id value for element
    var i1 = Number(field.id)+1;           
	var i2 = i1+1;                          
	var i3 = i1+2;
	var i4 = i1+3;
	var i5 = i1+4;
	var i6 = i1+5;//jaya
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	var s4=document.getElementById(i4);
	var s5=document.getElementById(i5);
	var s6=document.getElementById(i6);
	//disabling fields if value of paper title is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s5.value = "";
	s6.value = "";
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	s4.disabled = true;
	s5.disabled = true;	
	s6.disabled = true;
	return 0;	
	}
	//enabling fields if value of paper title is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	s4.disabled = false;
	s5.disabled = false;
	s6.disabled = false;
    return 0;		
	}
  }

  function addrow(tableID) {
          
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'qualific_details_'+rowCount+'[]';
			element0.id =id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			element1.id = id+2;
			cell1.style.cssText = "text-align:center";
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for paper title
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=id+3;
			element2.name='qualific_details_'+rowCount+'[]';
			element2.placeholder='Qualification';
			element2.setAttribute("onchange",'javascript:check(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);                              //select element for category
			var element3 = document.createElement('input');
			element3.type = 'text';
			element3.id=id+4;
			element3.name='qualific_details_'+rowCount+'[]';
			element3.placeholder='Branch';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			
			var cell4 = row.insertCell(4);          
			var element4 = document.createElement('input');               //date
			element4.type = 'text';
			element4.id=id+5;
			element4.name='qualific_details_'+rowCount+'[]';
			element4.placeholder='Specialization';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');               
			element5.type = 'text';
			element5.id=id+6;
			element5.name='qualific_details_'+rowCount+'[]';
			element5.placeholder='University/Board';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
			var cell6 = row.insertCell(6);          
			var element6 = document.createElement('input');               //date
			element6.type = 'text';
			element6.id=id+7;
			element6.name='qualific_details_'+rowCount+'[]';
			element6.placeholder='Percentage';
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			
			var cell7 = row.insertCell(7);          
			var element7 = document.createElement('input');               //date
			element7.type = 'text';
			element7.id=id+8;
			element7.name='qualific_details_'+rowCount+'[]';
			element7.placeholder='CGPA';
			element7.required=true;
			element7.disabled=true;
			cell7.appendChild(element7);
			
			var cell8 = row.insertCell(8);
			var element8 = document.createElement('input');               //text field for impact
			element8.type = 'text';
			element8.id=id+9;
			element8.name='qualific_details_'+rowCount+'[]';
			element8.placeholder='Class Obtained';
			element8.required=true;
			element8.disabled=true;
			cell8.appendChild(element8);
			
			var cell9 = row.insertCell(9);
			var element9 = document.createElement('input');               
			element9.type = 'text';
			element9.id=id+10;
			element9.name='qualific_details_'+rowCount+'[]';
			element9.placeholder='Passing Year';
			element9.required=true;
			element9.disabled=true;
			cell9.appendChild(element9);
			
			var cell10 = row.insertCell(10);
			var element10 = document.createElement('input');//field for url
			element10.type = 'file';
			element10.accept = 'image/*';
			element10.id=id+11;
			element10.name='qualific_details_'+rowCount+'[]';
			element10.placeholder='Proof';
			element10.required=true;
			element10.disabled=true;
			cell10.appendChild(element10);
			
					

        id=id+11;   
		}
	//function to add rows in Experience Details	
	function addrow1(tableID) {
          
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'experience_details_'+rowCount+'[]';
			element0.id =rid+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			element1.id = rid+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for name       
			element2.type = 'text';
			element2.id=rid+3;
			element2.name='experience_details_'+rowCount+'[]';
			element2.placeholder='Organization Name';
			element2.setAttribute("onchange",'javascript:check1(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input');                  //text field for aurthor
			element3.type='text';
			element3.id=rid+4;
			element3.name='experience_details_'+rowCount+'[]';
			element3.placeholder='Desgination';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('input');                 //text field for publisher  
			element4.type = 'Date';
			element4.id=rid+5;
			element4.name='experience_details_'+rowCount+'[]';
			element4.placeholder='dd/mm/yyyy';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');                 //text field for year
			element5.type = 'Date';
			element5.id=rid+6;
			element5.name='experience_details_'+rowCount+'[]';
			element5.placeholder='dd/mm/yyyy';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);

			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');                 //text field for year
			element6.type = 'file';
			element6.accept = 'image/*';
			element6.id=rid+7;
			element6.name='experience_details_'+rowCount+'[]';
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			

		rid=rid+7;
		}	
		
		
		//function to add rows in Approval details	
	function addrow8(tableID) {
          var table = document.getElementById(tableID);
		  var rowCount = table.rows.length;
		  var row = table.insertRow(rowCount);
		  
		  var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'appointment_details_'+rowCount+'[]';
			element0.id =t9id+1;
			element0.style.cssText = "text-align:center";
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			cell1.style.cssText = "text-align:center";
			element1.id = t9id+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for Project Title       
			element2.type = 'text';
			element2.id=t9id+3;
			element2.name='appointment_details_'+rowCount+'[]';
			element2.placeholder='Current Pay Scale';
			element2.style.cssText="width:100%";
			element2.setAttribute("onchange",'javascript:check9(this)');
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input');                  //text field for Principal
			element3.id=t9id+4;
			element3.name='appointment_details_'+rowCount+'[]';
			element3.placeholder='Grade Pay';
			element3.required=true;
			element3.disabled=true;
			element3.style.cssText="width:100%";
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('select');                 //text field for year
			element4.id=t9id+5;
			element4.name='appointment_details_'+rowCount+'[]';
			element4.placeholder='appointment';
			element4.required=true;
			element4.disabled=true;
			
			var option1 = document.createElement("option");              //option none  
			option1.innerHTML = "None";
			option1.value = "";
			option1.disabled=true;
	        option1.selected=true;
		    element4.appendChild(option1);
			
			var option2 = document.createElement("option");              //option none  
			option2.innerHTML = "USSC Approved";
			option2.value = "USSC Approved";
		    element4.appendChild(option2);
			
			var option3 = document.createElement("option");              //option none  
			option3.innerHTML = "Regular";
			option3.value = "Regular";
		    element4.appendChild(option3);
			
			var option4 = document.createElement("option");              //option none  
			option4.innerHTML = "Adhoc";
			option4.value = "Adhoc";
		    element4.appendChild(option4);
			
			var option5 = document.createElement("option");              //option none  
			option5.innerHTML = "Visiting";
			option5.value = "Visiting";
		    element4.appendChild(option5);
			
			var option6 = document.createElement("option");              //option none  
			option6.innerHTML = "Probation";
			option6.value = "Probation";
		    element4.appendChild(option6);
			
			
			element4.style.cssText="width:100%";
			element4.appendChild(option1);
			element4.appendChild(option2);
			element4.appendChild(option3);
			element4.appendChild(option4);
			element4.appendChild(option5);
			element4.appendChild(option6);
			
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');                 //text field for year
			element5.type = 'date';
			element5.id=t9id+6;
			element5.name='appointment_details_'+rowCount+'[]';
			element5.placeholder='Approval Date';
			element5.style.cssText="width:100%";
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');                 //text field for year
			element6.type = 'text';
			element6.id=t9id+7;
			element6.name='appointment_details_'+rowCount+'[]';
			element6.placeholder='Approval no';
			element6.required=true;
			element6.disabled=true;
			element6.style.cssText="width:100%";
			cell6.appendChild(element6);
			
			var cell7 = row.insertCell(7);
			var element7 = document.createElement('input');               //text field for impact
			element7.type ='file';
			element7.accept = 'image/*';
			element7.name = 'fileToUpload[]';
			element7.id=t9id+8;
			element7.name='appointment_details_'+rowCount+'[]';
			element7.required=true;
			element7.disabled=true;
			cell7.appendChild(element7);
			
			t9id=t9id+8;					
			
		}	
		
		//function to add rows in overall experience details
		
		function addrow9(tableID) {
          var table = document.getElementById(tableID);
		  var rowCount = table.rows.length;
		  var row = table.insertRow(rowCount);
		  
		  var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'overall_exp_details_'+rowCount+'[]';
			element0.id =t10id+1;
			element0.style.cssText = "text-align:center";
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			cell1.style.cssText = "text-align:center";
			element1.id = t10id+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for Project Title       
			element2.type = 'text';
			element2.id=t10id+3;
			element2.name='overall_exp_details_'+rowCount+'[]';
			element2.placeholder='Teaching Experience in Years';
			element2.style.cssText="width:100%";
			element2.setAttribute("onchange",'javascript:check10(this)');
			cell2.appendChild(element2);
			
			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input');               //text field for impact
			element3.type ='file';
			element3.name = 'fileToUpload[]';
			element3.accept = 'image/*';
			element3.id=t10id+4;
			element3.name='overall_exp_details_'+rowCount+'[]';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('input');                  //text field for Principal
			element4.id=t10id+5;
			element4.name='overall_exp_details_'+rowCount+'[]';
			element4.placeholder='Industrial Experience in Years';
			element4.required=true;
			element4.disabled=true;
			element4.style.cssText="width:100%";
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');               //text field for impact
			element5.type ='file';
			element5.name = 'fileToUpload[]';
			element5.accept = 'image/*';
			element5.id=t10id+6;
			element5.name='overall_exp_details_'+rowCount+'[]';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');                  //text field for Principal
			element6.id=t10id+7;
			element6.name='overall_exp_details_'+rowCount+'[]';
			element6.placeholder='Research Experience in Years';
			element6.required=true;
			element6.disabled=true;
			element6.style.cssText="width:100%";
			cell6.appendChild(element6);
			
			var cell7 = row.insertCell(7);
			var element7 = document.createElement('input');               //text field for impact
			element7.type ='file';
			element7.name = 'fileToUpload[]';
			element7.accept = 'image/*';
			element7.id=t10id+8;
			element7.name='overall_exp_details_'+rowCount+'[]';
			element7.required=true;
			element7.disabled=true;
			cell7.appendChild(element7);
			
			t10id=t10id+8;	
			
		}
		
		
		//Function to add rows in table - SUBJECT TAUGHT
	function addrow2(tableID) {
          
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'subs_taught_'+rowCount+'[]';
			element0.id =t3id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			element1.id = t3id+2;
			cell1.innerHTML = rowCount;
			cell1.style.cssText = "text-align:center";
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for name       
			element2.type = 'text';
			element2.id=t3id+3;
			element2.name='subs_taught_'+rowCount+'[]';
			element2.placeholder='Type of Graduation';
			element2.setAttribute("onchange",'javascript:check2(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input'); //text field for aurthor
			element3.id=t3id+4;
			element3.name='subs_taught_'+rowCount+'[]';
			element3.placeholder='Subject Taught';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('input');                 //text field for publisher  
			element4.type = 'text';
			element4.id=t3id+5;
			element4.name='subs_taught_'+rowCount+'[]';
			element4.placeholder='FH17/SH17';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');                 //text field for publisher  
			element5.type = 'text';
			element5.id=t3id+6;
			element5.name='subs_taught_'+rowCount+'[]';
			element5.placeholder='Subject Experience';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
						
			var cell6 = row.insertCell(6);
			var element6 = document.createElement('select');                 //text field for publisher  
			element6.id=t3id+7;
			element6.name='subs_taught_'+rowCount+'[]';
			element6.style.cssText = "width:100%";
			element6.required=true;
			element6.disabled=true;
			
			 var option0 = document.createElement("option");              //option none  
			option0.innerHTML = "None";
			option0.value = "";
			option0.disabled=true;
	        option0.selected=true;
		    element6.appendChild(option0);
			
			var option1 = document.createElement("option");
			option1.innerHTML="Old";
			option1.value="Old";
			element6.appendChild(option1);

			var option2 = document.createElement("option");
			option2.innerHTML="Revised";
			option2.value="Revised";
			element6.appendChild(option2);
			cell6.appendChild(element6);
			
			
			
			
		t3id=t3id+7;
		}	
	
//Function to add rows in table - PROFESSIONAL MEMBERSHIP DETAILS	
		function addrow3(tableID) {
          
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'prof_memship_'+rowCount+'[]';
			element0.id =t4id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			element1.id = t4id+2;
			cell1.style.cssText = "text-align:center";
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for name       
			element2.type = 'text';
			element2.id=t4id+3;
			element2.name='prof_memship_'+rowCount+'[]';
			element2.placeholder='Membership Category';
			element2.setAttribute("onchange",'javascript:check3(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input'); //text field for aurthor
			element3.id=t4id+4;
			element3.name='prof_memship_'+rowCount+'[]';
			element3.placeholder='Membership Number';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('input');                 //text field for publisher  
			element4.type = 'text';
			element4.id=t4id+5;
			element4.name='prof_memship_'+rowCount+'[]';
			element4.placeholder='Body Of organization';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
		t4id=t4id+5;
		}	
//Function to add rows in table - INTERACTION WITH OUTSIDE WORLD
		function addrow4(tableID) {
          
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'interact_outside_'+rowCount+'[]';
			element0.id =t5id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			cell1.style.cssText = "text-align:center";
			element1.id = t5id+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for paper title
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=t5id+3;
			element2.name='interact_outside_'+rowCount+'[]';
			element2.placeholder='Interaction Type';
			element2.setAttribute("onchange",'javascript:check3(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);                              //text field for paper title
			var element3 = document.createElement('input');
			element3.type = 'text';
			element3.id=t5id+4;
			element3.name='interact_outside_'+rowCount+'[]';
			element3.required="true";
			element3.disabled="true";
			element3.placeholder='Organization';
			cell3.appendChild(element3);

			
			var cell4 = row.insertCell(4);          
			var element4 = document.createElement('input');               //date
			element4.type = 'date';
			element4.name='interact_outside_'+rowCount+'[]';
			element4.id=t5id+5;
			element4.placeholder='dd/mm/yyyy';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
		t5id=t5id+5;   
		}
//Function to add rows in table - TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ATTENDED		
function addrow5(tableID) {
          
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'train_conf_'+rowCount+'[]';
			element0.id =t6id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			element1.id = t6id+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for paper title
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=t6id+3;
			element2.name= 'train_conf_'+rowCount+'[]';
			element2.placeholder='Course Name';
			element2.setAttribute("onchange",'javascript:check5(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);        
			var element3=document.createElement('input');
			element3.type='text';
			element3.name =  'train_conf_'+rowCount+'[]';
			element3.id=t6id+4;
			element3.placeholder='Name of Organizing Institute';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);          
			var element4 = document.createElement('input');               //date
			element4.type = 'date';
			element4.name =  'train_conf_'+rowCount+'[]';
			element4.id=t6id+5;
			element4.placeholder='dd/mm/yyyy';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
		
			var cell5 = row.insertCell(5);          	
			var element5 = document.createElement('input'); //date
			element5.type = 'date';
			element5.name = 'train_conf_'+rowCount+'[]';
			element5.id=t6id+6;
			element5.placeholder='dd/mm/yyyy';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);	

			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');               //text field for impact
			element6.type = 'text';
			element6.id=t6id+7;
			element6.name= 'train_conf_'+rowCount+'[]';
			element6.placeholder='Total Days';
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			

			var cell7 = row.insertCell(7);
			var element7 = document.createElement('input');               //text field for impact
			element7.type ='file';
			element7.name ='fileToUpload[]';
			element7.accept = 'image/*';
			element7.id=t6id+8;
			element7.name= 'train_conf_'+rowCount+'[]';
			element7.required=true;
			element7.disabled=true;
			cell7.appendChild(element7);
		  t6id=t6id+8;   

		}

//Function to add rows in table - TRAINING COURSES/ SEMINAR/ WORKSHOP/ CONFERENCE ORGANIZED	
	  function addrow6(tableID) {
          
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'organization_'+rowCount+'[]';
			element0.id =t7id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			cell1.style.cssText = "text-align:center";
			element1.id = t7id+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for paper title
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=t7id+3;
			element2.name='organization_'+rowCount+'[]';
			element2.placeholder='Course Name';
			element2.setAttribute("onchange",'javascript:check2(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);        
			var element3=document.createElement('input');
			element3.type = 'resp_handled';
			element3.name = 'organization_'+rowCount+'[]';
			element3.id=t7id+4;
			element3.placeholder='Responsibility Handled';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);          
			var element4 = document.createElement('input');               //date
			element4.type = 'date';
			element4.name = 'organization_'+rowCount+'[]';
			element4.id=t7id+5;
			element4.placeholder='dd/mm/yyyy';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);


			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');               //text field for impact
			element5.type ='file';
			element5.name = 'fileToUpload[]';
			element5.accept = 'image/*';
			element5.id=t7id+6;
			element5.name='organization_'+rowCount+'[]';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
		 
		  t7id=t7id+6;   
		}
		

  function addrow7(tableID) {
          
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'projects_guided_'+rowCount+'[]';
			element0.id =t8id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			element1.id =t8id+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for paper title
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=t8id+3;
			element2.name= 'projects_guided_'+rowCount+'[]';
			element2.placeholder='Project Title';
			element2.setAttribute("onchange",'javascript:check5(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);        
			var element3=document.createElement('input');
			element3.type = 'text';
			element3.id=t8id+4;
			element3.name= 'projects_guided_'+rowCount+'[]';
			element3.placeholder='Guide Name';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);          
			var element4 = document.createElement('input');               //date
			element4.type='text';
			element4.name = 'projects_guided_'+rowCount+'[]';
			element4.id=t8id+5;
			element4.placeholder='Members';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
		
			var cell5 = row.insertCell(5);          	
			var element5 = document.createElement('input'); //date
			element5.type = 'text';
			element5.id=t8id+6;
			element5.name= 'projects_guided_'+rowCount+'[]';
			element5.placeholder='Department';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);	

			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');               //text field for impact
			element6.type = 'date';
			element6.id=t8id+7;
			element6.name= 'projects_guided_'+rowCount+'[]';
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			

			var cell7 = row.insertCell(7);
			var element7 = document.createElement('select');               //text field for impact
			element7.name = 'projects_guided_'+rowCount+'[]';
			element7.id=t8id+8;
			element7.required=true;
			element7.disabled=true;
					
			var option1 = document.createElement("option");              //option none  
			option1.innerHTML = "None";
			option1.value = "";
			option1.disabled=true;
	        option1.selected=true;
			
			var option2 = document.createElement("option");              //option none  
			option2.innerHTML = "U.G.";
			option2.value = "U.G.";
			
			var option3 = document.createElement("option");              //option none  
			option3.innerHTML = "P.G.";
			option3.value = "P.G.";
			
			var option4 = document.createElement("option");              //option none  
			option4.innerHTML = "Ph.D";
			option4.value = "Ph.D";
			
			
			element7.appendChild(option1);
			element7.appendChild(option2);
			element7.appendChild(option3);
			element7.appendChild(option4);
			
			cell7.appendChild(element7);
			
			var cell8 = row.insertCell(8);          	
			var element8 = document.createElement('input'); //date
			element8.type = 'text';
			element8.id=t8id+9;
			element8.name= 'projects_guided_'+rowCount+'[]';
			element8.placeholder='Remark';
			element8.required=true;
			element8.disabled=true;
			cell8.appendChild(element8);	

			
		  t8id=t8id+9;   

		}
		
		//function to delete row when checkbox is checked 
		function delrow(tableID) {
			try {
			var table = document.getElementById(tableID);//retrieving table from id
			var rowCount = table.rows.length;//no rows in table
			var rowc = rowCount;//for comparison
			var count = 0;//counter to check
			for(var i=1; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				//condition to delete row if checked
				if(null != chkbox && true == chkbox.checked) {
					table.deleteRow(i);
					rowCount--;
					i--;
				}
				else{
					//increment counter if checkbox not checked
					count+=1;
				}
			}
			//if counter is equal to no. of rows-1 then display msg
			if(count == rowc-1){
				alert("Select row to delete");
			}
			//else rearrange the numbering in table
			else{
			rearrange(tableID);
			}
			}catch(e) {
				alert(e);
			}
		}
		//function to rearrange numbering in table if row is deleted
		function rearrange(tableID) {
			alert("Selected row has been deleted");
			var table = document.getElementById(tableID);
			for (var i = 1; i < table.rows.length; i++) {
				var row = table.rows[i];
				row.cells[1].innerHTML=i;
			}
		}
		
		/*function check_faculty_type(){
			var faculty_type = '<?php echo($_SESSION['faculty_type']); ?>'
			var t = document.getElementById("tab1");
			var t1 = document.getElementById("tab2");
			if(faculty_type == "nonteaching"){
				t.style.cssText='display:none';
				t1.style.cssText='display:none';
			}
			else{
				t.style.cssText='display:visible';
				t1.style.cssText='display:visible';
				}
		}*/
</script>
<link href="ab.css" rel="stylesheet">
</head>
<body onload="check_faculty_type()">
<div class="wrapper row1" align="center">
  <header id="header" class="hoc clear"> 
    <div >
      <p align="center" style="font-size:30px;font-family:sans-serif ; color:white; "><img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a></p>
    </div>
   </header>
   </div>


<br>
<center>

<form id="form2-2" action="stage3.php" method="POST" enctype="multipart/form-data">	
<div id="tab0">
<h2 style="text-align: center">Qualification Details</h2>
<table align='center' border='1' id='table2-1' name="qualific_details" style="table-layout: fixed; width:99%">
<tr>
 <th style="width:4%"></th>
 <th style="width:6%">Sr.No.</th>
 <th>Qualification</th>
 <th>Branch</th>
 <th>Specialization</th>
 <th>University</th>
 <th>Percentage</th>
 <th>CGPA</th>
 <th>Class Obtained</th>
 <th>Passing Year</th>
 <th>Proof</th>
 </tr>
</table>
<p class="inline" style="text-align: center">
<input id='b1' style='height:25px; width:100px' type='button' value="Add" onclick='addrow("table2-1")' />
<input id='b3' style='height:25px; width:100px' type='button' value="Delete" onclick='delrow("table2-1")' />
<br/><br/><br/>
</p>
</div>
<!--jaya-->
<!--<p align='center' ><b>Experience Details</b></p>
<table align='center' border='1' id='table2-2' >
<tr>
 <th></th>
 <th>Sr.No.</th>
 <th>Organzation Name</th>
 <th >Designation</th>
 <th >Date of Joining</th>
 <th>Last Date of working</th>
 <th >Proof</th>
 <th >Current Pay Scale</th>
<th >Grade Pay</th>
<th>Nature Of Appointment</th>
<th >USSC Approved Date</th>
<th >USSC Approved Reference Number</th>
<th>Attach Proof</th>
<th>Teaching Experience in Years</th>
<th>Industrial Experience in Years</th>
<th\>Research Experience in Years</th>
<th>Attach Proof For Experience</th>
</tr>
</table>
<p align='center' >
<input id='b2' style='height:25px;width:60px' type='button' value="Add" onclick='addrow1("table2-2")' />
<input id='b4' style='height:25px;width:60px' type='button' value="Delete" onclick='delrow("table2-2")' />
<br /><br />
</p>

<center>
<label>Area of Interest:</label>
<input tyoe='text' name='aoi'  required />
</center>-->
<div id="">
<h2 style="text-align: center;">Experience Details</h2>
<table align='center' border='1' id='table2-2' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:4%"></th>
 <th style="width:6%">Sr.No.</th>
 <th>Organzation Name</th>
 <th >Designation</th>
 <th >Date of Joining</th>
 <th>Last Date of working</th>
 <th >Proof</th>
 
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow1("table2-2")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-2")' />
<br /><br />
</p>
</div>
<!--<center>
<label>Area of Interest:</label>
<input type='text' name='aoi'  required />
</center>-->





<div id="tab3">
<h2 style="text-align: center;">Appointment Approval Details </h2>
<table align='center' border='1' id='table2-9' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th >Current Pay Scale</th>
<th >Grade Pay</th>
<th>Nature Of Appointment</th>
<th >USSC Approved Date</th>
<th >USSC Approved Reference Number</th>
<th>Proof</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b1' style='height:25px;width:100px' type='button' value="Add" onclick='addrow8("table2-9")' />
<input id='b3' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-9")' />
<br/><br/><br/>
</p>
</div>


<div id="tab3">
<h2 style="text-align: center;">Overall Experience Details </h2>
<table align='center' border='1' id='table2-10' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
<th>Teaching Experience in Years</th>
<th>Attach Proof</th>
<th>Industrial Experience in Years</th>
<th>Attach Proof</th>
<th>Research Experience in Years</th>
<th>Proof</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b1' style='height:25px;width:100px' type='button' value="Add" onclick='addrow9("table2-10")' />
<input id='b3' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-10")' />
<br/><br/><br/>
</p>
</div>







<!--jaya-->
<div id="tab1">
<h2 style="text-align: center;">Subjects Taught</h2>
<table align='center' border='1' id='table2-3' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th>Type Of Graduation</th>
 <th>Subject Taught</th>
 <th>Period / Year</th>
 <th>Subject Experience</th>
 <th>Syllabus Revised / Old</th>
 
</tr>
</table>

<p class="inline" style="text-align: center">
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow2("table2-3")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-3")' />
<br/><br/><br>
</p>
</div>

<div id="tab2">
<h2 style="text-align: center">Professional Membership Details</h2>
<table align='center' border='1' id='table2-4' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th>Membership Category</th>
 <th>Membership Number</th>
 <th>Body Of Organization</th>
</tr>
</table>

<p class="inline" style="text-align: center">
<input id='b1' style='height:25px;width:100px' type='button' value="Add" onclick='addrow3("table2-4")' />
<input id='b3' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-4")' />
<br/><br/><br/>
</p>
</div>
<!--<center>
<label>Patent Recievd:</label>
<input type='text' name='patent' required />
</center>
-->
<div id="tab3">
<h2 style="text-align: center;">Interaction With Outside World </h2>
<table align='center' border='1' id='table2-5' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th>Interaction Type</th>
 <th>organization_</th>
 <th>Date</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b1' style='height:25px;width:100px' type='button' value="Add" onclick='addrow4("table2-5")' />
<input id='b3' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-5")' />
<br/><br/><br/>
</p>
</div>

<div id="tab4">
<h2 style="text-align: center;">Training Courses/ Seminar/ Workshop/ Conference<br/>ATTENDED</h2>
<table align='center' border='1' id='table2-6' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th style="width:20%">Course Name: </th>
 <th style="width:18%">Name Of the Organizing Institute</th>
 <th style="width:11%">Start Date</th>
 <th style="width:11%">End Date</th>
 <th style="width:11%">Total Number of Days</th>
 <th>Proof/ Certificate</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow5("table2-6")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-6")' />
<br/><br/><br/>
</p>

<div id="tab5">
	<h2 style="text-align: center;">Training Courses/ Seminar/ Workshop/ Conference<br/>organized</h2>
<table align='center' border='1' id='table2-7' style="table-layout: fixed; width:99%">
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th>Course Name: </th>
 <th>Responsibility Handled</th>
 <th>Course Duration</th>
 <th>Proof/ Certificate</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow6("table2-7")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-7")' />
<br/><br/><br/>
</p>
</div>

<div id="tab6">
<table align='center' border='1' id='table2-8' style="table-layout: fixed; width:99%">
<h2 style="text-align: center;">Project Guided</h2>
<tr>
 <th style="width:6%"></th>
 <th style="width:8%">Sr.No.</th>
 <th>Project Title</th>
 <th>Guide Name</th>
 <th>Group Members</th>
 <th>Department</th>
 <th>Year</th>
 <th>Student Category</th>
 <th>Remark</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow7("table2-8")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2-8")' />
<br/><br/><br/>
</p>
</div>

<div align="center">
<input type="submit" name="submit" value="SUBMIT" style="width: 230px;margin-top: 15px;margin-bottom: 8px; height:40px;" >
</div>
</br></br>
</form>


<script>
	for(var i=0;i<3;i++) {
		//diplaying rows of table 1 & 2
		addrow("table2-1");
		addrow1("table2-2");
		//addrow21("table2-21");
		addrow2("table2-3");
		addrow3("table2-4");
		addrow4("table2-5");
		addrow5("table2-6");
		addrow6("table2-7");
		addrow7("table2-8");
		addrow8("table2-9");
		addrow9("table2-10");
	}
</script>




</html>