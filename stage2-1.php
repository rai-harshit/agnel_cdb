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
</style>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language='javascript'>

		function vis2(field){
			var t2=document.getElementById("desg_table");
			var t3=document.getElementById("desg_nonteaching");
			if(field.value == "nonteaching"){
				t2.style.cssText='display:none';	
				t3.style.cssText='display:visible';
			}
			else{
				t2.style.cssText='display:visible';
				t3.style.cssText='display:none';
				}
		}
</script>
<link href="ab.css" rel="stylesheet">
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
<div id="upleft"> 
<div>
</br>
</br>
<div style="  padding-left:20px; margin-left:20px;
   border : thin solid black;border-size:1.5px;"></br>
LINKS
</br></br>	
	<a href="stage1.php">Staff Details</a></br>
    </br><a href="stage2.php"><b>Staff Employment Details</b></a></br>
	</br><a href="stage3.php">Responsibilities Handled</a></br>
	</br><a href="stage4.php">Research And Development</a></br>
	</br><a href="stage5.php">Publication Details</a></br></br>
</div>
	<br>
</div>
</div>
<center>






<form id="form2-1" action="stage2-2.php" method="POST" autocomplete="on" style="padding-left:350px;">
<div style="margin-right:5%"><div ><center>

	<div id="myProgress" align="left">
  <div id="myBar">stage1</div>
</div>
<br>
<h2 class="fs-title">STAFF  EMPLOYMENT  DETAILS</h2>
<table id="emp_type">
<tr>
	<td align="right" style="padding-top: 10px">Faculty Type :</td>
	<td align="left">
		<select name="faculty_type" style="width:65%;margin-right: 28px;" onchange="vis2(this)" required>
			<option value="" selected="selected" disabled>----- Select Faculty Type -----</option>
			<option value="teaching">Teaching Staff</option>
			<option value="nonteaching">Non Teaching Staff</option>
			<option value="admin">Administration</option>		
		</select>
	</td>
</tr>
<tr> 
	<td align="right" style="padding-top: 10px">Appointment Type :</td>
	<td align="left">
		<select name="appointment_type" style="width:65%; margin-right: 28px;" required>
			<option value="" selected="selected" disabled>--- Select Appointment Type ---</option>
			<option value="ussg">USSG Approved</option>
			<option value="reg">Regular</option>
			<option value="adhoc">Adhoc</option>		
		</select>
	</td>
</tr>
<tr>
<td align="right" style="padding-top: 10px"> Department :</td>
<td align="left">
	<select name="Dept_name" style="width:65%;margin-right: 28px;" required>
		<option selected="selected" disabled value="">--- Select Your Department ---</option>
		<option value="comp">Computer Science</option>
		<option value="it">Information Technology</option>
		<option value="extc">Electronics And Telecommunication </option>		
		<option value="elec">Electrical </option>
		<option value="mech">Mechanical</option>
		<option value="hum">Humanities </option>
	</select>
</td>
</tr>
<tr></tr>		
<tr> <td align="right" style="padding-top: 10px"><label>Employee ID :</label></td>
	<td><input type="text" name="Emp_id" id="emid" style="width: 65%;margin-right: 28px;" required></td>
	</tr>
	<tr><td align="right" style="padding-top: 10px"><label>Library Card Number :</label></td>
	<td><input type="text" name="Library_card_no" id="libno"  style="width:65%;margin-right: 28px;" required></td>
	</tr>
	

</table>
<br>
<table id="desg_nonteaching" style="display: none;">
 <caption><h2>Designation</h2></caption>
   <tr>
   <td  align="right"><input type="checkbox" name="designation[]" value="lab_assistant" id="nts" /></td>
   <td><label>Lab Assistant</label></td>
	</tr>
	
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="lab_attendent" id="nts" />
	</td>
	<td><label>Lab Attendent</label></td>
	</tr>
</table>

 <table id="desg_table">
 <caption><h2>Designation</h2></caption>
   <tr>
   <td  align="right"><input type="checkbox" name="designation[]" value="principal" id="ts"/></td>
   <td><label>Principal</label></td>
	</tr>
	
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="prof_hod" id="ts" /></td>
	<td><label>Professor and Head Of Department(HOD)</label></td>
	<!--ss=Senior Supervisior-->
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="prof_dean" id="ts" /></td>
	<td><label>Professor and Dean</label></td>
	<!--ei=Exam Cell Incharge-->
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="prof" id="ts" /></td>
	<td><label>Professor</label></td>
	<!--cmi=College Magzine Incharge--> 
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="assoc_prof_hod" id="ts" /></td>
	<td><label>Associate Professor and Head Of Department</label></td>
	<!--hod=Head Of Department--> 
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="assoc_prof_dean" id="ts" /></td>
	<td><label>Associate Professor and Dean</label></td>
	<!--c=Co-ordinator--> 
	</tr>
	<tr>
	<td  align="right"><input type="checkbox" name="designation[]" value="assoc_prof" id="ts" /></td>
	<td><label>Associate Professor</label></td>
	<!--coe=Controller of Examination--> 
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="ass_prof" id="ts" /></td>
	<td><label>Assistant Professor</label></td>
	<!--dcoe=Deputy Controller of Examination--> 
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="falicit_cnt_coord" id="ts" /></td>
	<td><label>Falicitaion Centre Co-ordinator</label></td>
	<!--fcc=Falicitaion Centre Co-ordinator--> 
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="fe_engg_adm" id="ts" /></td>
	<td><label>First Year Engineering Admission</label></td>
	<!--fcc=First Year Engineering Admission--> 
	</tr>
	<tr>
	<td align="right"><input type="checkbox" name="designation[]" value="stud_cncl_inch" id="ts" /></td>
	<td><label>Student Council Incharge</label></td>
	<!--sci=Student Council Incharge--> 
	</tr>
	<tr>
	<td align="right" style="padding-top: 15px;"><label>Any Other Designation</label></td>
	<td align="left"><input style="width:65%" type="text" name="designation[]" id="other" /></td>
		</tr>
  </table>
<br><br>
<h2>Highest Qualification</h2>*(Attach Proof)<br><br>
 <table style="margin-right:18%" >
    <tr>
   <td  align="right"><input type="radio" name="high_qualif" value="post_phd" id="phd"/></td>
   <td><label> Post Ph.D (Specialization)</label></td>
	</tr>
	
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="phd" id="phd"/></td>
   <td><label> Ph.D (Specialization)</label></td>
	</tr>
	
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="mphil" id="mphil"/></td>
	<td><label>M.Phil (Specialization)</label></td>
	
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="me" id="me"/></td>
	<td><label>M.E (Specialization)</label></td>
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="ms" id="ms"/></td>
	<td><label>M.S (Specialization)</label></td>
	<!--cmi=College Magzine Incharge--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="mtech" id="mtech"/></td>
	<td><label>M.Tech (Specialization)</label></td>
	<!--hod=Head Of Department--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="msc" id="msc"/></td>
	<td><label>M.Sc (Specialization)</label></td>
	<!--c=Co-ordinator--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="ma" id="ma"/></td>
	<td><label>M.A (Specialization)</label></td>
	<!--coe=Controller of Examination--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="be" id="be"/></td>
	<td><label>B.E (Specialization)</label></td>
	<!--dcoe=Deputy Controller of Examination--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="bs" id="bs"/></td>
	<td><label>B.S (Specialization)</label></td>
	<!--fcc=Falicitaion Centre Co-ordinator--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="btech" id="btech"/></td>
	<td><label>B.Tech (Specialization)</label></td>
	<!--fcc=First Year Engineering Admission--> 
	</tr>
	<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="diploma" id="diploma"/></td>
	<td><label>Diploma (Specialization)</label></td>
	<!--sci=Student Council Incharge--> 
	</tr>
		<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="bsc" id="bsc"/></td>
	<td><label>B.Sc (Specialization)</label></td>
	<!--sci=Student Council Incharge--> 
	</tr>
		<tr>
   <td  align="right"><input type="radio" name="high_qualif" value="ba" id="ba"/></td>
	<td><label>B.A (Specialization)</label></td>
	<!--sci=Student Council Incharge--> 
	</tr>
	<tr>
	<td align="right" style="padding-top: 15px"><label>Any Other Specialization</label></td>
	<td align="left"><input style="width:65%" type="text" name="other_high_qualif" id="other"/></td>
		</tr>
  </table>

<!--
Upoad Proof Document:<input type="file" name="fileToUpload" id="high_qualif" value="high_qualif">
	<input type="submit" value="Attach Proof"  style="width: 150px;margin-top: 15px;margin-bottom: 8px; height:30px;" name="submit">
	</br>
Date of Joining Institute:<input type="date" value="doj" id="doj" required> </br></br>

 <label>Date of Joining Designation:</label><input type="date" value="dod" id="dod" required> </br></br>-->

 </div>

<br>
<br>


<div align="center">
<input type="submit" name="submit" value="SUBMIT DETAILS" style="width: 230px;margin-top: 15px;margin-bottom: 8px; height:40px;" onclick="submitForms()">
</div>
</br></br>
</form>
</center>
</body>
</html>