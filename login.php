<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   	<style type="text/css">
   		body{
   			color: black !important;
   			font-size: 15px;
   		}
   		.login_portal{
   			margin-left:30%;
   			margin-right: 30%;
   			margin-top: 5%;
   			width:40%;
   			padding:1%;
   			position: relative;
   		}
   		.submit{
   			position: relative;
   			float:right;
   			width:50%;
   		}
   		input{
   			float: right;
   			width:90%;
   			padding:5px;
   		}
   		label{
   			padding:5px;
   			font-weight:600;
   		}
   	</style>
</head>
<body>
	<div class = "float">
		<div class="header">
			<header id="header" class="hoc clear"> 
      			<p align="center" style="font-size:30px;font-family:sans-serif ; color:white;">
      				<img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>
      						FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY
      			</p>
   			</header>
   		</div>
   		<div class="login_portal">
   			<form action="#" method="POST" id='login_form'>
   				<table>
   					<tr>
   						<td><label>Email</label></td>
   						<td><input type="email" name="email" required="true"></td>
   					</tr>
   					<tr>
   						<td><label>Password</label></td>
   						<td><input type="password" name="password" required="true"></td>
   					</tr>
   					<tr>
   						<td></td>
   						<td><input type="submit" class="submit" name="submit" value="LOGIN"></td>
   					</tr>
   				</table>
   				
   				
   				
   				
   			</form>
   		</div>
   	</div>
</body>
</html>


<?php



	if(isset($_POST['submit']))
	{
		$conn = mysqli_connect("localhost" , "root" ,"");

		if(!$conn)
		{
			echo("<h3>Could not connect to the server at the moment. Please try again later.</h3><br>");
		}
		else
		{
			//echo("Successfully connected to the Database.<br>");

			mysqli_select_db($conn,"college");
			$email = $_POST['email'];
			$password = $_POST['password'];
			// echo($email);
			// echo("<br>");
			// echo($password);
			$sql1 = "select password, last_login, emp_id from user_accounts where email_id = '$email'";
			//echo($sql);

			$query_result1 = mysqli_query($conn,$sql1);
			if(mysqli_num_rows($query_result1) > 0)
			{
				$result = mysqli_fetch_array($query_result1);
				$password_hash = $result['password'];
				$login = password_verify($password,$password_hash);
				//echo($login);
				if($login == 1)
				{
					$sql2 = "update user_accounts set last_login=CURRENT_TIMESTAMP where email_id='$email'";
					$query_result2 = mysqli_query($conn, $sql2);
					if($query_result2)
					{
						session_start();
						$_SESSION['eid'] = $result['emp_id'];
                  header("Location: home.php");
					}
					else
					{
						echo("Error Occured in updating the login time");
					}
				}
				else
				{
					echo("Wrong Password. Please try again.");
				}
			}
			else
			{
				echo("The Email-ID is not associated with any account. Please try again.");
			}
		}

	}

?>