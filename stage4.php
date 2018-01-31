<?php

session_start();
print_r($_SESSION['eid']);
$emp_id = $_SESSION['eid'];

if(!empty($_POST['responsibilities']))
{
	$_SESSION['responsibilities'] = [];

	foreach ($_POST['responsibilities'] as $key => $value) 
	{
		array_push($_POST['responsibilities'],$value);
	}
}

if(!empty($_POST['other_resp']))
{
	array_push($_POST['responsibilities'],$_POST['other_resp']);
}

$responsibility = implode(',', $_POST['responsibilities']);

//print_r($_SESSION);


$conn = mysqli_connect("localhost" , "root" ,"");

if(!$conn)
{
	echo "error in connection";
}
else
{
	echo " connection established";
}

mysqli_select_db($conn,"college");
//insert into other_responsibility
$sql1 = "insert into other_responsibility (emp_id,responsibilities) values('$emp_id','". $responsibility ."') ";

//echo $sql1;
echo "<br><br>";

$insert_result1 = mysqli_query($conn,$sql1);

echo($insert_result1);

if($insert_result1)
{
	echo "row inserted in other_responsibility";
	echo "<br>";
}
else
{
	echo "error in insertion";
	echo "<br><br>";
	echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

?>




<!doctype html>
<html>
<head>
	<title>R&D Details</title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<style type="text/css">
		body{
			color:black;
		}
	</style>

<script language='javascript'>
	var id=199;
	var rid=399;
	// function to validate table1
  	function check(field)
  	{
	  	//id value for element
    	var i1 = Number(field.id)+1;           
		var i2 = i1+1;                          
		var i3 = i1+2;
		var i4 = i1+3;
		var i5 = i1+4;
		var i6 = i1+5;
		
		//retrieving element by ids
		var s1=document.getElementById(i1);
		var s2=document.getElementById(i2);
		var s3=document.getElementById(i3);
		var s4=document.getElementById(i4);
		var s5=document.getElementById(i5);
		var s6=document.getElementById(i6);
		
		//disabling fields if value of paper title is null
		if(field.value=="")
		{
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
    //funtion to validate table 1
  	function check1(field)
  	{
	 // id for element
    	var i1 = Number(field.id)+1;
		var i2 = i1+1;
		var i3 = i1+2;
		var i4 = i1+3;
		var i5 = i1+4;
		var i6 = i1+5;
		var i7 = i1+6;
		var i8= i1+7;
		var i9 = i1+8;
		var i10 = i1+9;
		var i11 = i1+10;
	// retrieving element by ids
		var s1=document.getElementById(i1);
		var s2=document.getElementById(i2);
		var s3=document.getElementById(i3);
		var s4=document.getElementById(i4);
		var s5=document.getElementById(i5);
		var s6=document.getElementById(i6);
		var s7=document.getElementById(i7);
		var s8=document.getElementById(i8);
		var s9=document.getElementById(i9);
		var s10=document.getElementById(i10);
		var s11=document.getElementById(i11);
	//disabling fields if value of name of book is null
		if(field.value=="")
		{
			s1.value = "";	
			s2.value = "";
			s3.value = "";	
			s4.value = "";	
			s5.value = "";
			s6.value = "";	
			s7.value = "";
			s8.value = "";
			s9.value = "";
			s10.value = "";
			s11.value = "";
			s1.disabled = true;
			s2.disabled = true;
  			s3.disabled = true;
			s4.disabled = true;
			s5.disabled = true;
			s6.disabled = true;
			s7.disabled = true;
			s8.disabled = true;
			s9.disabled = true;
			s10.disabled = true;
			s11.disabled = true;
		return 0;	
		}
	//enabling fields if value of name of book is not null
		else
		{
			s1.disabled = false;
			s2.disabled = false;
  			s3.disabled = false;
			s4.disabled = false;
			s5.disabled = false;
  			s6.disabled = false;
			s7.disabled = false;
			s8.disabled = false;
			s9.disabled = false;
			s10.disabled = false;
			s11.disabled = false;
			return 0;		
		}
  	}
  //function to add rows in table 1
  	function addrow(tableID) 
  	{  
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			
			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'internal_proj_'+rowCount+'[]';
			cell0.style.cssText = "width:100%"
			element0.style.cssText = "text-align:center";
			element0.id =id+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			element1.id = id+2;
			cell1.innerHTML = rowCount-1;
			cell1.style.cssText = "width:100%; text-align:center"
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for paper title
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=id+3;
			element2.name='internal_proj_'+rowCount+'[]';
			element2.placeholder='Project Title';
			element2.style.cssText = "width:100%";
			element2.setAttribute("onchange",'javascript:check(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);                              //select element for category
			var element3 = document.createElement('input');
			element3.id=id+4;
			element3.type = 'text';
			element3.name='internal_proj_'+rowCount+'[]';
			element3.placeholder='Staff Name';
			element3.style.cssText = "width:100%";
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);          
			var element4 = document.createElement('input');               //date
			element4.type = 'text';
			element4.id=id+5;
			element4.name='internal_proj_'+rowCount+'[]';
			element4.placeholder='Student Name';
			element4.style.cssText = "width:100%";
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');               //text field for impact
			element5.type = 'text';
			element5.id=id+6;
			element5.name='internal_proj_'+rowCount+'[]';
			element5.placeholder='Department';
			element5.style.cssText = "width:100%";
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');               //field for url
			element6.type = 'text';
			element6.id=id+7;
			element6.name='internal_proj_'+rowCount+'[]';
			element6.placeholder='2000';
			element6.style.cssText = "width:100%";
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			
			var cell7 = row.insertCell(7);
			var element7 = document.createElement('input');              //text field for citaiton
			element7.type = 'text';
			element7.id=id+8;
			element7.name='internal_proj_'+rowCount+'[]';
			element7.placeholder='Project Cost';
			element7.style.cssText = "width:100%";
			element7.required=true;
			element7.disabled=true;
			cell7.appendChild(element7);
			
			var cell8 = row.insertCell(8);
			var element8 = document.createElement('input');              //text field for citaiton
			element8.type = 'text';
			element8.id=id+9;
			element8.name='internal_proj_'+rowCount+'[]';
			element8.placeholder='Project Utility';
			element8.style.cssText = "width:100%";
			element8.required=true;
			element8.disabled=true;
			cell8.appendChild(element8);
			

        id=id+9;   
	}
	function addrow1(tableID) {
          
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'external_proj_'+rowCount+'[]';
			element0.id =rid+1;
			element0.style.cssText = "text-align:center";
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			cell1.style.cssText = "text-align:center";
			element1.id = rid+2;
			cell1.innerHTML = rowCount-1;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for Project Title       
			element2.type = 'text';
			element2.id=rid+3;
			element2.name='external_proj_'+rowCount+'[]';
			element2.placeholder='Project Title';
			element2.style.cssText="width:100%";
			element2.setAttribute("onchange",'javascript:check1(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input');                  //text field for Principal
			element3.id=rid+4;
			element3.name='external_proj_'+rowCount+'[]';
			element3.placeholder='Principal';
			element3.required=true;
			element3.disabled=true;
			element3.style.cssText="width:100%";
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('input');                 //text field for co-Investigator  
			element4.type = 'text';
			element4.id=rid+5;
			element4.name='external_proj_'+rowCount+'[]';
			element4.placeholder='Co-Investigator';
			element4.style.cssText="width:100%";
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');                 //text field for year
			element5.type = 'date';
			element5.id=rid+6;
			element5.name='external_proj_'+rowCount+'[]';
			element5.placeholder='From';
			element5.style.cssText="width:100%";
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');                 //text field for year
			element6.type = 'date';
			element6.id=rid+7;
			element6.name='external_proj_'+rowCount+'[]';
			element6.placeholder='To';
			element6.style.cssText="width:100%";
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			
			
			
			var cell7 = row.insertCell(7);
			var element7 = document.createElement('input');                 //text field for year
			element7.type = 'text';
			element7.id=rid+8;
			element7.name='external_proj_'+rowCount+'[]';
			element7.placeholder='Cost';
			element7.required=true;
			element7.disabled=true;
			element7.style.cssText="width:100%";
			cell7.appendChild(element7);

			var cell8 = row.insertCell(8);
			var element8 = document.createElement('input');                 //text field for year
			element8.type = 'text';
			element8.id=rid+9;
			element8.name='external_proj_'+rowCount+'[]';
			element8.placeholder='Amount recieved';
			element8.required=true;
			element8.disabled=true;
			element8.style.cssText="width:100%";
			cell8.appendChild(element8);
			
			var cell9 = row.insertCell(9);
			var element9 = document.createElement('select');                 //text field for year
			element9.id=rid+10;
			element9.name='external_proj_'+rowCount+'[]';
			element9.placeholder='1,00,000';
			element9.required=true;
			element9.disabled=true;
			
			var option1 = document.createElement("option");              //option none  
			option1.innerHTML = "None";
			option1.value = "";
			option1.disabled=true;
	        option1.selected=true;
		    element9.appendChild(option1);
			
			var option2 = document.createElement("option");              //option none  
			option2.innerHTML = "Major(C>1,00,000)";
			option2.value = "Major";
		    element9.appendChild(option2);
			
			var option3 = document.createElement("option");              //option none  
			option3.innerHTML = "Minor(C<1,00,000)";
			option3.value = "Minor";
		    element9.appendChild(option3);
			element9.style.cssText="width:100%";
			element9.appendChild(option1);
			element9.appendChild(option2);
			element9.appendChild(option3);
			
			cell9.appendChild(element9);
			
			var cell10 = row.insertCell(10);
			var element10 = document.createElement('input');                 //text field for co-Investigator  
			element10.type = 'text';
			element10.id=rid+11;
			element10.name='external_proj_'+rowCount+'[]';
			element10.placeholder='Funding Body';
			element10.style.cssText="width:100%";
			element10.required=true;
			element10.disabled=true;
			cell10.appendChild(element10);
			
			var cell11 = row.insertCell(11);
			var element11 = document.createElement('input');                 //text field for co-Investigator  
			element11.type = 'text';
			element11.id=rid+12;
			element11.name='external_proj_'+rowCount+'[]';
			element11.placeholder='Patent/Publication';
			element11.style.cssText="width:100%";
			element11.required=true;
			element11.disabled=true;
			cell11.appendChild(element11);
			
			var cell12 = row.insertCell(12);
			var element12 = document.createElement('input');               //text field for impact
			element12.type ='file';
			element12.name = 'fileToUpload[]';
			element12.accept = '.png';
			element12.id=rid+13;
			element12.name='external_proj_'+rowCount+'[]';
			element12.required=true;
			element12.disabled=true;
			cell12.appendChild(element12);
			
		rid=rid+13;
		}	
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
			for (var i = 2; i < table.rows.length; i++) {
				var row = table.rows[i];
				row.cells[1].innerHTML=i-1;
			}
					reasign(tableID);
		}
		
		function reasign(tableID){
			var count;
			if(tableID == "table4-1")
				count=199;
			else
				count=399;
			var table = document.getElementById(tableID);
			for (var i = 2; i < table.rows.length; i++) {
				var row = table.rows[i];
				for (var j = 0; j < row.cells.length; j++) {
					count++;
					row.cells[j].childNodes[0].id=count;
				}
			}
		}
</script>
<link href="ab.css" rel="stylesheet">
</head>
<div class="wrapper row1" align="center" >
  <header id="header" class="hoc clear"> 
    <div>
      <p align="center" style="font-size:30px;font-family:sans-serif ; color:white; "><img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a></p>
    </div>
   </header>
   </div>
<div class="main_body" style="margin-top: 50px">  
<div id="upleft"> 
<div>
<div style="padding-left:20px; margin-left:20px;border : thin solid black;border-size:1.5px;"></br>
LINKS
</br></br>	
	<a href="stage1.php">Staff Details</B></a></br>
    </br><a href="stage2.php">Staff Employment Details</a></br>
	</br><a href="stage3.php">Responsibilities Handled</a></br>
	</br><a href="stage4.php"><b>Research And Development</b></a></br>
	</br><a href="stage5.php">Publication Details</a></br></br>
</div>
	<br>
</div>
</div>
<form id='form4' action="stage5.php" method="POST" style="padding-left:350px;" class='form4' > 
<h2 style="text-align: center"> Internal Projects</h2>
<table border='1' id='table4-1' style="table-layout: fixed; width:98%" >
<tr>
 <th rowspan='2' style="width: 6%"></th>
 <th rowspan='2' style="width: 8%">Sr.No.</th>
 <th rowspan='2'>Project Title</th>
 <th colspan='2'>Investigator</th>
 <th rowspan='2'>Department</th>
 <th rowspan='2' style="width: 10%">Year</th>
 <th rowspan='2'>Project Cost</th>
 <th rowspan='2'>Project Utility</th>
</tr>
<tr>
 <th>Staff Name</th>
 <th>Student Name</th>
</tr>
</table>
<p class="inline" style="text-align: center">
<input id='b1' style='height:25px;width:100px' type='button' value="Add" onclick='addrow("table4-1")' />
<input id='b3' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table4-1")' />
<br/><br/><br/>
</p>

<h2 style="text-align: center">External Projects</h2>

<table border='1' id='table4-2' style="table-layout: fixed; width:98%;margin-left: 1%">
<tr>
 <th rowspan='2' style="width: 6%"></th>
 <th rowspan='2' style="width: 8%">Sr.No.</th>
 <th rowspan='2'>Project Title</th>
 <th colspan='2'>Investigator</th>
 <th colspan='2'>Duration</th>
 <th rowspan='2'>Project Cost</th>
 <th rowspan='2'>Amount Recieved</th>
 <th rowspan='2'>Grant Type</th>
 <th rowspan='2'>Funding Body</th>
 <!--<th rowspan='2'>Year</th> -->
 <th rowspan='2'>Patent/ Publication</th>
 <th rowspan='2'>Approval Details</th>
</tr>
<tr>
 <th>Principal</th>
 <th>Co-Investigator</th>
 <th>From</th>
 <th>To</th>
</tr>

</table>
</div>
<p class="inline" style="text-align: center">
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow1("table4-2")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table4-2")' />
<br/><br/>
<input type="submit" name="submit" value="SUBMIT" style="width: 230px;margin-top: 15px;margin-bottom: 8px; height:40px;">
</p>
</form>
</div>
<script>
	for(var i=0;i<3;i++) {
		//diplaying rows of table 1 & 2
		addrow("table4-1");
		addrow1("table4-2");
	}
</script>

</html>