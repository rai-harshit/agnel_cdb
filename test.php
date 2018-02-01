<?php

// $email = "harshitrai68@gmail.com";
// $first_name = "Harshit";
// $last_name = "Rai";
// $fathers_name = "Ashok";
// $mothers_name = "Sangeeta";
// print(sha1($email.$first_name.$fathers_name.$mothers_name.$last_name));

// $hash1 = sha1("harshitrai68@gmail.com+harshit+ashok+sangeeta+rai");
// $hash_p1 = "id=$hash1";
// $hash2 = sha1("aCtIvAte@cC0uNt");
// $hash_p2 = "tsk=$hash2";
// $act_id = $hash_p1.'&'.$hash_p2;
// $act_url = 'localhost/jaya/activation.php?'.$act_id;
// echo($hash_p1);
// echo("<br>");
// echo($hash_p2);
// echo("<br>");
// echo($act_id);
// echo("<br>");
// echo($act_url);
// echo("<br>");
// echo("<h3><a href=$act_url>CLICK TO ACTIVATE</a></h3>")
// 

// $timeTarget = 0.05; // 50 milliseconds 

// $cost = 8;
// do {
//     $cost++;
//     $start = microtime(true);
//     password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
//     $end = microtime(true);
// } while (($end - $start) < $timeTarget);

// echo "Appropriate Cost Found: " . $cost;

//echo 'Argon2 hash: ' . password_hash('rasmuslerdorf', PASSWORD_ARGON2I);

//aadhar card + alternate email +  last name
// $emp_id = random_int(10000, 99999);
// 	$hash1 = sha1("harshitrai68@gmail.com+harshit+ashok+sangeeta+rai");
// 	$hash_p1 = "aid=$hash1";
// 	$hash2 = sha1("aCtIvAte@cC0uNt");
// 	$hash_p2 = "task=$hash2";
// 	$act_id = $hash_p1.'&'.$hash_p2;
// 	$act_url = "localhost/jaya/activation.php?eid=$emp_id&".$act_id;
// 	echo($act_url);


// print_r($_FILES);
// $email = $_POST['email'];
// $img_arr = ['dp','sign'];
// 	for($i = 0; $i<=1; $i++) {

// 		$target_dir = "uploads/";
// 		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
// 		print($target_file);
// 		echo "<br>";
// 		$path_parts = pathinfo($target_file);
// 		echo "<br>";
// 		$file_extension = $path_parts['extension'];
// 		print_r($file_extension);
// 		$saved_name = $target_dir.$img_arr[$i].'_'.$email.'.'.$file_extension;
// 		$uploadOk = 1;
// 		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// 				// Check if image file is a actual image or fake image
// 	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
// 	    if($check !== false) {
// 	        echo "File is an image - " . $check["mime"] . ".<br>";
// 	        $uploadOk = 1;
// 	    } else {
// 	        echo "File is not an image.<br>";
// 	        $uploadOk = 0;
// 	    }
// 				// Check if file already exists
// 		if (file_exists($saved_name)) {
// 	    	echo "Sorry, file already exists.<br>";
// 	    	$uploadOk = 0;
// 		}
// 				// Check file size
// 		if ($_FILES["fileToUpload"]["size"][$i] > 1000000) {
// 	    	echo "Sorry, your file is too large.<br>";
// 	    	$uploadOk = 0;
// 		}
		
// 				// Allow certain file formats
// 		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// 		&& $imageFileType != "gif" ) {
// 	    	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
// 	    	$uploadOk = 0;
// 		} 

// 		// Check if $uploadOk is set to 0 by an error
// 		if ($uploadOk == 0) {
// 	    	echo "Sorry, your file was not uploaded.<br>";
// 		// if everything is ok, try to upload file
// 		} else {
// 	    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i],$saved_name)) {
// 	        	echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.<br>";
// 	    	} else {
// 	        	echo "Sorry, there was an error uploading your file.<br>";
// 	    	}
// 		}
// 	}

// $error = "Something went wrong";
// if(!$error)
// {
// 	echo("error true");
// }
// else
// {
// 	echo("error false");
// }

// ?>