<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

#DATA HANDLING CODE FOR STAGE 1 STARTS HERE

session_start();

if(isset($_POST['submit']))
{
	$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$fathers_name = $_POST['fathers_name'];
$mothers_name = $_POST['mothers_name'];
$Gender = $_POST['Gender'];
$marital_status = $_POST['marital_status'];
if($marital_status == "Married")
{
	$spouse_name = $_POST['spouse_name'];	
}


$DOB = $_POST['DOB'];
$age = 00;
$residential_no = $_POST['residential_no'];
$mobile_no = $_POST['mobile_no'];
$email = $_POST['email'];
$alt_email = $_POST['alt_email'];
$current_address = $_POST['current_address'];
$permanent_address = $_POST['permanent_address'];


$aadhar = $_POST['aadhar'];
$pf_no = $_POST['pf_no'];
$pan_no = $_POST['pan_no'];
$passport_no = $_POST['passport_no'];


$nationality = $_POST['nationality'];
if($nationality == "others")
{
	$nationality = $_POST['other_nationality'];
}

$religion = $_POST['religion'];
if($religion == "others")
{
	$religion = $_POST['other_religion'];
}

$category = $_POST['category'];
if($category == "others")
{
	$category = $_POST['other_category'];
}

$caste = $_POST['caste'];
$bank_name = $_POST['bank_name'];
$acc_no = $_POST['acc_no'];
$re_account_no = $_POST['re_account_no'];
$bank_acc_holder_name = $_POST['bank_acc_holder_name'];
$IFSC_code = $_POST['IFSC_code'];
$branch = $_POST['branch'];
$form_16 = $_POST['form_16'];

	$password_plainT = $_POST['password'];

	//print_r($_SESSION);
}


$emp_id = $first_name.random_int(1000, 9999);

$conn = mysqli_connect("localhost" , "root" ,"");

if(!$conn)
{
	echo "error in connection";
}
else
{
	echo " connection established";
}

echo($password_plainT);
//password hashing begins here

$options = [
    'cost' => 10,
];
$hashed_pass = password_hash($password_plainT, PASSWORD_BCRYPT, $options);	
//hashed password here

//password hashing ends here


//account activation id creation starts here

$hash1 = sha1($aadhar.$fathers_name.$email);
$hash2 = sha1("aCtIvAte@cC0uNt");
$acc_act_hash = $hash1.$hash2;	//account activation hash here

//account activation id creation ends here


//DATABASE QUERIES START HERE

mysqli_select_db($conn,"college");
//insert into faculty_personal_details
$sql1 = "insert into faculty_personal_details (emp_id,last_name,middle_name,first_name,spouse_name,dob,age,Gender,marital_status,mobile_no,residential_no,email,alt_email,pan_no,pf_no,aadhar,permanent_address,current_address,mothers_name,fathers_name,religion,category,caste,nationality,passport_no,form_16) values('$emp_id','$last_name','$middle_name','$first_name','$spouse_name','$DOB','$age','$Gender','$marital_status','$mobile_no','$residential_no','$email','$alt_email','$pan_no','$pf_no','$aadhar','$permanent_address','$current_address','$mothers_name','$fathers_name','$religion','$category','$caste','$nationality','$passport_no','$form_16') ";

//echo $sql1;
echo "<br><br>";

$insert_result1 = mysqli_query($conn,$sql1);

echo($insert_result1);

if($insert_result1)
{
	echo "row inserted in faculty_personal_details";
	echo "<br>";
}
else
{
	echo "error in insertion";
	echo "<br><br>";
	echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
}

//insert into bank_account_details
$sql2 = "insert into bank_account_details (emp_id,bank_name,acc_no,IFSC_code,branch,bank_acc_holder_name) values('$emp_id','$bank_name','$acc_no','$IFSC_code','$branch','$bank_acc_holder_name')";

//echo $sql2;
echo "<br><br>";

$insert_result2 = mysqli_query($conn,$sql2);

if($insert_result2)
{
echo "row inserted";
}
else
{
echo "error in insertion";
echo "<br><br>";
echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

echo($insert_result2);

//insert into user_accounts
$sql3 = "insert into user_accounts (email_id,password,emp_id,act_id) values ('$email','$hashed_pass','$emp_id','$acc_act_hash')";

//echo $sql3;
echo "<br><br>";
$insert_result3 = mysqli_query($conn,$sql3);

if($insert_result3)
{
echo "row inserted";
}
else
{
echo "error in insertion";
echo "<br><br>";
echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}

echo($insert_result3);

// DATABASE QUERIES END HERE





if($insert_result1 && $insert_result2 && $insert_result3 && $f_upload_result)
{

	$hash1 = sha1($aadhar.$fathers_name.$email);
	$hash_p1 = "aid=$hash1";
	$hash2 = sha1("aCtIvAte@cC0uNt");
	$hash_p2 = "task=$hash2";
	$act_id = $hash_p1.'&'.$hash_p2;
	$act_url = "activation.php?eid=$emp_id&".$act_id;

	$mail = new PHPMailer(true);

	$mail->isSMTP();                            // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;  
	//$mail->SMTPDebug = 2;	// Enable SMTP authentication
	$mail->Username = 'fcritfacultyinfo@gmail.com';          // SMTP username
	$mail->Password = 'fcrit123'; // SMTP password
	$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                          // TCP port to connect to

	$mail->setFrom('fcritfacultyinfo@gmail.com', 'FCRIT, Vashi');
	$mail->addReplyTo('fcritfacultyinfo@gmail.com', 'FCRIT, Vashi');
	$mail->addAddress($email);   // Add a recipient
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$mail->isHTML(true);  // Set email format to HTML

	$bodyContent = "Dear <b>$first_name</b>, Please click on the link below to activate your account:<br><br><b><a href=$act_url>CLICK TO ACTIVATE</a><b>";             //message content using html

	echo($bodyContent);

	$mail->Subject = "Activate Your Account : FCRIT";
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
		header( "refresh:5; url=login.php" ); 
	}

}
else{
	echo("There is some error in your queries. Please debug the code.");
}
?>



















