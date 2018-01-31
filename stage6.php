<?php

session_start();
print_r($_SESSION['eid']);
$emp_id = $_SESSION['eid'];
//print_r($_POST);
//echo "<br><br>";

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

$paper_publication = [];
$book_publication = [];


foreach ($non_empty as $key => $value) 
{
	if(strpos($value,'paper_publication_') !== false)
	{
		array_push($paper_publication,$final[$key]);
	}


	if(strpos($value,'book_publication_') !== false)
	{
		array_push($book_publication,$final[$key]);
	}

}


/*echo "Printing";
echo "<br>";
print_r($paper_publication);
echo "<br>";
print_r($book_publication);*/


$pp_itr = 5;
$bp_itr = 4;

$pp_rcount = round(count($paper_publication)/$pp_itr);
$bp_rcount = count($book_publication)/$bp_itr;

//echo "<br>";
//print($pp_rcount);
//print($bp_rcount);

$conn = mysqli_connect("localhost" , "root" ,"");

	if(!$conn)
	{echo "error in connection";}
	else
	{echo " connection established";} 

	mysqli_select_db($conn,"college");
if($pp_rcount > 0)
{
	for($curr_row = 1; $curr_row <= $pp_rcount; $curr_row++)
	{	
		${"paper_publication_$curr_row"} = [];
		for($i = ($pp_itr*($curr_row-1)); $i< ($pp_itr*($curr_row)) ; $i++)
		{
			
			array_push(${"paper_publication_$curr_row"}, $paper_publication[$i]);
		}
	}
			//echo("<br>");

	for($i=1;$i<=$pp_rcount;$i++)
	{
		print_r(${"paper_publication_$i"});
		echo "<br>";
		$_SESSION["paper_publication_$i"] = ${"paper_publication_$i"};
		$pp["$i"] = $_SESSION["paper_publication_$i"];
	}
	for($i=1;$i<=$pp_rcount;$i++){
			$query = "insert into paper_publication(emp_id,author_name,paper_title,journal_name,year_publication,link) values ('$emp_id','".$pp["$i"][0]."','".$pp["$i"][1]."','".$pp["$i"][2]."','".$pp["$i"][3]."','".$pp["$i"][4]."')";
			echo($query);
			//echo("<br>");

			if(mysqli_query($conn,$query))
			{
				echo "row in paper_publication inserted";
			}
			else
			{
				echo "error in paper_publication insertion";
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
}




if($bp_rcount > 0)
{
	for($curr_row = 1; $curr_row <= $bp_rcount; $curr_row++)
	{	
		${"book_publication_$curr_row"} = [];
		for($i = ($bp_itr*($curr_row-1)); $i< ($bp_itr*($curr_row)) ; $i++)
		{
			array_push(${"book_publication_$curr_row"}, $book_publication[$i]);
		}
	}
	echo("<br>");
	for($i=1;$i<=$bp_rcount;$i++)
	{
		//print_r(${"book_publication_$i"});
		//echo "<br>";
		$_SESSION["book_publication_$i"] = ${"book_publication_$i"};
		$bp["$i"] = $_SESSION["book_publication_$i"];
	}
	
	for($i=1;$i<=$bp_rcount;$i++){
			$query = "insert into book_publication(emp_id,book_name,coauthor_name,publisher_name,year_publication) values ('$emp_id','".$bp["$i"][0]."','".$bp["$i"][1]."','".$bp["$i"][2]."','".$bp["$i"][3]."')";
			echo($query);
			//echo("<br>");

			if(mysqli_query($conn,$query))
			{
				echo "row in book_publication inserted";
			}
			else
			{
				echo "error in book_publication insertion";
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
}

//echo("<br><br>");
//print_r($_SESSION);
header( "refresh:1; url=home.php" ); 
?>






<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Staff Details</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
	body{
		color : black !important;
	}
	#label{
		padding-right: 30px;
		width : 50% !important;
	}
	#input{
		padding-left: 30px;
		width : 50% !important;
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
<link href="ab.css" rel="stylesheet">
<br><br><br>
<div id="upleft"> 
<div>
</br>
<div style="  padding-left:20px; margin-left:20px;
   border : thin solid black;border-size:1.5px;"></br>
LINKS
</br></br>	
	<a href="stage1.php"><B>Staff Details</B></a></br>
    </br><a href="stage2.php">Staff Employment Details</a></br>
	</br><a href="stage3.php">Responsibilities Handled</a></br>
	</br><a href="stage4.php">Research And Development</a></br>
	</br><a href="stage5.php">Publication Details</a></br></br>
</div>
	<br>
</div>
</div>

<div id="stage1.5" style="margin-left: 400px;">
<label>
	<b><center>Profile Details</center><b>
</label>
<form action="upload.php" method="post" enctype="multipart/form-data">
<br><table>
<tr>
    <td id="label" align="right">Upload Profile Picture :</td>
	<td id="input">
		<input type="file" accept=".png" name="fileToUpload[0]" id="fileToUpload[0]" required>
	</td>
</tr>
<tr>
	<td id="label" align="right" style="padding-right: 30px">Upload Signature :</td>
	<td id="input">
		<input type="file" accept=".png" name="fileToUpload[1]" id="fileToUpload[1]" required>
	</td>
</tr>
<tr>
<td id="label" align="right" style="padding-right: 30px">Registered Email / Username :</td>
	<td id="input">
		<input type="text" name='email' id="email" value = "<?php echo($email) ?>" disabled>
		<input type="hidden" name='email' id="email" value = "<?php echo($email) ?>">
	</td>
</tr>
<tr>
	<td id="label" align="right" style="padding-right: 30px">Password</td>
	<td id="input">
		<input type="password" name="pass" id="pass" placeholder="Enter Your Password Here" required>
	</td>
</tr>
<tr>
	<td id="label" align="right" style="padding-right: 30px">Re-enter Password</td>
	<td id="input">
		<input type="password" name="repass" id="repass" placeholder="Re-enter Your Password Here" required>
	</td>
</tr>
<tr>
<tr>  	
	<td colspan="2" align="center"><input type="submit" name="submit" id="submit" style="width: 230px;margin-top: 15px;margin-bottom: 8px; height:40px;">
	</td>
</tr>
</form>
</table>
</form>

</div>
</body>
</html>