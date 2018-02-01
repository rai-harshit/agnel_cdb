<?php

session_start();
print_r($_SESSION['eid']);
$emp_id = $_SESSION['eid'];
//print_r($_POST);
error_reporting(E_ERROR | E_PARSE);

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

/*
print_r($final);
echo "<br>";
print_r($non_empty);
*/

$internal_proj = [];
$external_proj = [];


foreach ($non_empty as $key => $value) 
{
	if(strpos($value,'internal_proj_') !== false)
	{
		array_push($internal_proj,$final[$key]);
	}


	if(strpos($value,'external_proj_') !== false)
	{
		array_push($external_proj,$final[$key]);
	}

}

/*
echo "<br>";
print_r($internal_proj);
echo "<br>";
print_r($external_proj);
*/

$ip_itr = 7;
$ep_itr = 11;

$ip_rcount = floor(count($internal_proj)/$ip_itr);
$ep_rcount = floor(count($external_proj)/$ep_itr);

//print($ip_rcount);
//print($ep_rcount);
$conn = mysqli_connect("localhost" , "root" ,"");

	if(!$conn)
	{echo "error in connection";}
	else
	{echo " connection established";} 

	mysqli_select_db($conn,"college");

if($ip_rcount > 0)
{
	for($curr_row = 1; $curr_row <= $ip_rcount; $curr_row++)
	{	
		${"internal_proj_$curr_row"} = [];
		for($i = ($ip_itr*($curr_row-1)); $i< ($ip_itr*($curr_row)) ; $i++)
		{
			array_push(${"internal_proj_$curr_row"}, $internal_proj[$i]);
		}
	}

	for($i=1;$i<=$ip_rcount;$i++)
	{

		//print_r(${"internal_proj_$i"});
		//echo "<br>";
		$_SESSION["internal_proj_$i"] = ${"internal_proj_$i"};
		$ip["$i"] = $_SESSION["internal_proj_$i"];
	}
	
	for($i=1;$i<=$ip_rcount;$i++){
			$query = "insert into internal_fundedproject(emp_id,Project_title,staff_name,student_name,department,year,project_cost,project_utility) values ('$emp_id','".$ip["$i"][0]."','".$ip["$i"][1]."','".$ip["$i"][2]."','".$ip["$i"][3]."','".$ip["$i"][4]."','".$ip["$i"][5]."','".$ip["$i"][6]."')";
			//echo($query);
			//echo("<br>");

			if(mysqli_query($conn,$query))
			{
				echo "row in internal_fundedproject inserted";
			}
			else
			{
				echo "error in internal_fundedproject insertion";
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
}




if($ep_rcount > 0)
{
	for($curr_row = 1; $curr_row <= $ep_rcount; $curr_row++)
	{	
		${"external_proj_$curr_row"} = [];
		for($i = ($ep_itr*($curr_row-1)); $i< ($ep_itr*($curr_row)) ; $i++)
		{
			array_push(${"external_proj_$curr_row"}, $external_proj[$i]);
		}
	}

	for($i=1;$i<=$ep_rcount;$i++)
	{
		//print_r(${"internal_proj_$i"});
		//echo "<br>";
		$_SESSION["external_proj_$i"] = ${"external_proj_$i"};
		$ep["$i"] = $_SESSION["external_proj_$i"];
	}
	
	for($i=1;$i<=$ep_rcount;$i++){
			$query = "insert into external_fundedproject(emp_id,Project_title,principal,co_invest,duration_from,duration_to,project_cost,amount,grant_type,funding,patents_publication,approval_details) values ('$emp_id','".$ep["$i"][0]."','".$ep["$i"][1]."','".$ep["$i"][2]."','".$ep["$i"][3]."','".$ep["$i"][4]."','".$ep["$i"][5]."','".$ep["$i"][6]."','".$ep["$i"][7]."','".$ep["$i"][8]."','".$ep["$i"][9]."','".$ep["$i"][10]."')";
			//echo($query);
			//echo("<br>");

			if(mysqli_query($conn,$query))
			{
				echo "row in external_fundedproject inserted";
			}
			else
			{
				echo "error in external_fundedproject insertion";
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
}

//echo("<br><br>");
print_r($_SESSION);


?>



<!doctype html>
<html>
<head>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<title>Paper & Book Publication Details</title>
<style type="text/css">
	body{
		color:black !important;
	}
</style>
<script language='javascript'>
  var id=0;                                                          //id for table1
  var rid=999;                                                       //id for table2
  // function to validate table1
  function check(field){
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
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s4.value = "";
	s5.value = "";
	s6.value = "";
	//s1.style.cssText = 'display:visible;';   //making select element visible
	s1.disabled = true;
	//s2.style.cssText = 'display:none;';      //changing visibility of input element to none 
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
  function check1(field){
	  // id for element
    var i1 = Number(field.id)+1;
	var i2 = i1+1;
	var i3 = i1+2;
	// retrieving element by ids
	var s1=document.getElementById(i1);
	var s2=document.getElementById(i2);
	var s3=document.getElementById(i3);
	//disabling fields if value of name of book is null
	if(field.value==""){
	s1.value = "";	
	s2.value = "";
	s3.value = "";	
	s1.disabled = true;
	s2.disabled = true;
  	s3.disabled = true;
	return 0;	
	}
	//enabling fields if value of name of book is not null
	else{
	s1.disabled = false;
	s2.disabled = false;
  	s3.disabled = false;
	return 0;		
	}
  }
  //function to add rows in table 1
  function addrow(tableID) {
          
			var table = document.getElementById(tableID);   
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0);                              //checkbox
			var element0 = document.createElement('input');
			element0.type = 'checkbox';
			element0.name = 'paper_publication_'+rowCount+'[]';
			element0.id =id+1;
			cell0.style.cssText = 'width : 100%';
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)                                 //label for numbering  
			var element1 = document.createElement('label');
			element1.id = id+2;
			cell1.innerHTML = rowCount;
			cell1.style.cssText = 'width : 100%; text-align:center';
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);                              //text field for author name
			var element2 = document.createElement('input');
			element2.type = 'text';
			element2.id=id+3;
			element2.name= 'paper_publication_'+rowCount+'[]';
			element2.placeholder='Aurthor-Name';
			element2.style.cssText='width:100%';
			element2.setAttribute("onchange",'javascript:check(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);                              //text field for paper title
			var element3 = document.createElement('input');
			element3.type = 'text';
			element3.id=id+4;
			element3.name= 'paper_publication_'+rowCount+'[]';
			element3.placeholder='Paper Title';
			element3.style.cssText='width:100%';
			//element3.setAttribute("onchange",'javascript:check(this)');
			element3.required=true;
			element3.disabled=true;

			cell3.appendChild(element3);
			
			
			
			var cell4 = row.insertCell(4);                              //text field for name of journal
			var element4 = document.createElement('input');
			element4.type = 'text';
			element4.id=id+5;
			element4.name= 'paper_publication_'+rowCount+'[]';
			element4.placeholder='Name of Journal with volume no., issue date,page no.';
			element4.style.cssText='width:100%';
			//element4.setAttribute("onchange",'javascript:check(this)');
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);          
			var element5 = document.createElement('input');               //year
			element5.type = 'text';
			element5.id=id+6;
			element5.name= 'paper_publication_'+rowCount+'[]';
			element5.style.cssText='width:100%';
			element5.placeholder='year ';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
			
			var cell6 = row.insertCell(6);
			var element6 = document.createElement('input');               //field for url
			element6.type = 'url';
			element6.id=id+7;
			element6.name= 'paper_publication_'+rowCount+'[]';
			element6.placeholder='http://example';
			element6.style.cssText='width:100%';
			element6.required=true;
			element6.disabled=true;
			cell6.appendChild(element6);
			

        id=id+7;   
		}
	//function to add rows in table2 	
	function addrow1(tableID) {
          
			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var cell0 = row.insertCell(0); 
			var element0 = document.createElement('input');                //checkbox
			element0.type = 'checkbox';
			element0.name = 'book_publication_'+rowCount+'[]';
			cell0.style.cssText = 'width : 100%';
			element0.id =rid+1;
			cell0.appendChild(element0);
			
			var cell1 =row.insertCell(1)
			var element1 = document.createElement('label');                 // label for numbering
			cell1.style.cssText = 'width : 100% ; text-align:center';
			element1.id = rid+2;
			cell1.innerHTML = rowCount;
			cell1.appendChild(element1);
			
			var cell2 = row.insertCell(2);
			var element2 = document.createElement('input');                 //text field for name       
			element2.type = 'text';
			element2.id=rid+3;
			element2.name= 'book_publication_'+rowCount+'[]';
			element2.placeholder='Name';
			element2.style.cssText='width:100%';
			element2.setAttribute("onchange",'javascript:check1(this)');
			cell2.appendChild(element2);

			var cell3 = row.insertCell(3);
			var element3 = document.createElement('input');                  //text field for aurthor
			element3.id=rid+4;
			element3.name= 'book_publication_'+rowCount+'[]';
			element3.placeholder='Aurthor-Name';
			element3.style.cssText='width:100%';
			element3.required=true;
			element3.disabled=true;
			cell3.appendChild(element3);
			
			var cell4 = row.insertCell(4);
			var element4 = document.createElement('input');                 //text field for publisher  
			element4.type = 'text';
			element4.id=rid+5;
			element4.name= 'book_publication_'+rowCount+'[]';
			element4.placeholder='Publisher-Name';
			element4.style.cssText='width:100%';
			element4.required=true;
			element4.disabled=true;
			cell4.appendChild(element4);
			
			var cell5 = row.insertCell(5);
			var element5 = document.createElement('input');                 //text field for year
			element5.type = 'year';
			element5.id=rid+6;
			element5.name= 'book_publication_'+rowCount+'[]';
			element5.placeholder='Year';
			element5.style.cssText='width:100%';
			element5.required=true;
			element5.disabled=true;
			cell5.appendChild(element5);
			
		rid=rid+6;
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
			reasign(tableID);
		}
		
		function reasign(tableID){
			var count;
			if(tableID == "table1")
				count=0;
			else
				count=999;
			var table = document.getElementById(tableID);
			for (var i = 1; i < table.rows.length; i++) {
				var row = table.rows[i];
				for (var j = 0; j < row.cells.length; j++) {
					count++;
					row.cells[j].childNodes[0].id=count;
					if(j == 3 && tableID== "table1"){
						count++;
						row.cells[j].childNodes[1].id=count;
					}
				}
			}
		}
		//function change visibility of select element& input element when value is others
		function vis(field){
			if(field.value == "Others"){
			 var a=Number(field.id);
			 var b=a+1;
			 var e1=document.getElementById(a);
			 e1.style.cssText='display:none;';
		     var e2=document.getElementById(b);
			 e2.style.cssText='display:visible;';
			 e2.disabled=false;
		    }
		}
		
</script>

<link href="ab.css" rel="stylesheet">
</head>
<div class="wrapper row1" align="center">
  <header id="header" class="hoc clear"> 
    <div >
      <p align="center" style="font-size:30px;font-family:sans-serif ; color:white; "><img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a></p>
    </div>
   </header>
   </div>
<div class="main_body" style="margin-top: 50px">  
<form id='form5' action='stage6.php' class='form5' method="POST" > 
<h2 style="text-align: center">Paper Publication/Presentation</h2>
<table align='center' border='1' id='table2-1' name="qualific_details" style="table-layout: fixed; width:99%" >
<tr>
 <th style="width: 6%"></th>
 <th style="width: 8%">Sr.No.</th>
 <th>Author's Name</th>
 <th>Paper Title</th>
 <th>Name of Journal with volumn No., Isuue No. , Page No./Conference</th>
 <th>Year of Publication</th>
  <th>Link</th>
 
</tr>
</table>
<p class="inline" align="center">
<input id='b1' style='height:25px;width:100px' type='button' value="Add" onclick='addrow("table1")' />
<input id='b3' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table1")' />
<br /><br />
</p>
<h2 style="text-align: center">Book Publication Details</h2>
<table align='center' border='1' id='table2'  style="table-layout: fixed; width:98%" >
<tr>
<th style="width: 6%"></th>
 <th style="width: 8%">Sr.No.</th>
 <th>Name of the Book</th>
 <th>Authors Name</th>
 <th>Publisher Name</th>
 <th style="width: 12%">Year Of Publication</th>
</tr>
</table>
<p class="inline" align='center' >
<input id='b2' style='height:25px;width:100px' type='button' value="Add" onclick='addrow1("table2")' />
<input id='b4' style='height:25px;width:100px' type='button' value="Delete" onclick='delrow("table2")' />
<br/><br/>
<input type="submit" name="submit" value="SUBMIT" style="width: 230px;margin-top: 15px;margin-bottom: 8px; height:40px;">
</p>
</form>
<script>
	for(var i=0;i<3;i++) {
		//diplaying rows of table 1 & 2
		addrow("table1");
		addrow1("table2");
	}
	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</div>
</html>