<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Staff Details</title>
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<style type="text/css">
		body{
			color : black !important;
			}
		.formBody{
			margin : 5%;
			margin-top: 2%;
			padding : 2%;
			}
		table{
			width : 100%;
			margin: 1%;
		}
		td{
			width: 50%;
			padding-left: 10%;
			padding-right: 10%;
		}
		input,textarea,select{
			width:100%;
			padding:1% 1%;
		}
		#attr{
			padding-top:1%;
			text-align: right;
		}
		label{
			padding-top: 3%;
			padding-left: 3%;
		}
	</style>
</head>
<body>
      <script>


         function validateForm() {
            var last_name = document.forms["myform"]["last_name"].value.trim();
            var first_name = document.forms["myform"]["first_name"].value.trim();
            var middle_name = document.forms["myform"]["middle_name"].value.trim();
            var fathers_name = document.forms["myform"]["fathers_name"].value.trim();
            var mothers_name = document.forms["myform"]["mothers_name"].value.trim();
            var sp_name = document.forms["myform"]["sp_name"].value.trim();
            var residential_no = document.forms["myform"]["residential_no"].value.trim();
            var mobile_no = document.forms["myform"]["mobile_no"].value.trim();
            var email = document.forms["myform"]["email"].value.trim();
            var alt_email = document.forms["myform"]["alt_email"].value.trim();
            var current_address = document.forms["myform"]["current_address"].value.trim();
            var permanent_address = document.forms["myform"]["permanent_address"].value.trim();
            var aadhar = document.forms["myform"]["aadhar"].value.trim();
            var pf_no = document.forms["myform"]["pf_no"].value.trim();
            var pan_no = document.forms["myform"]["pan_no"].value.trim();
            var passport_no = document.forms["myform"]["passport_no"].value.trim();
            var caste = document.forms["myform"]["caste"].value.trim();
            var bank_name = document.forms["myform"]["bank_name"].value.trim();
            var acc_no = document.forms["myform"]["acc_no"].value.trim();
            var re_account_no = document.forms["myform"]["re_account_no"].value.trim();
            var bank_acc_holder_name = document.forms["myform"]["bank_acc_holder_name"].value.trim();
            var IFSC_code = document.forms["myform"]["IFSC_code"].value.trim();
            var branch = document.forms["myform"]["branch"].value.trim();
            var password = document.forms["myform"]["password"].value.trim();
            var re_password = document.forms["myform"]["re_password"].value.trim();
            var dob = document.forms["myform"]["DOB"].value.trim();
            var date = new Date();
            var curYear = date.getFullYear();

            var numbers = /^[0-9]+$/;

            // Validating Personal Details Section
            if( last_name.length == 0 || first_name.length == 0 || middle_name.length == 0 || fathers_name.length == 0 || mothers_name.length == 0)
            {
               alert("Blank Inputs Provided in 'PERSONAL DETAILS' Section. Please Try Again.");
               return(false);
            }

            // Validating Contact Details Section
            if( residential_no.length == 0 || mobile_no.length == 0 || email.length == 0 || alt_email.length == 0 || current_address.length == 0 || permanent_address.length == 0 )
            {
               alert("Blank inputs provided in 'CONTACT DETAILS' section. Please try again.");
               return(false);
            }

            if(residential_no.match(numbers) == null || mobile_no.match(numbers) == null)
            {
               alert("Invalid Contact Details provided! Please try again.");
               return(false);
            }
            if(mobile_no<=7000000000)
            {
               alert("Invalid Mobile Number. Please try again !");
               return(false);
            }
            if(email.indexOf("@fcrit.ac.in") < 0){
               alert("Please enter a valid college Email ID");
               return(false);
            }
            if(email == alt_email)
            {
               alert("Email ID and Alternate Email ID cannot be same. Please try again !");
               return(false);
            }
            if(permanent_address.length < 20 || current_address.length < 20)
            {
               alert("Address too small.Please try again !");
                return(false);
            }

            // Validating Document Details Section
            if( aadhar.length == 0 || pf_no.length == 0 || pan_no.length == 0 || passport_no.length == 0 || caste.length == 0)
            {
               alert("Blank Inputs Provided in 'DOCUMENT DETAILS' Section. Please Try Again.!");
               return(false);
            }
            if (!(aadhar.match(numbers)))
            {
               alert("Invalid Aadhar Number provided. Please try again !")
               return(false);
            }

            // Validating Bank Details Section
            if( bank_name.length == 0 || acc_no.length == 0 || re_account_no.length == 0 || bank_acc_holder_name.length == 0 || IFSC_code.length == 0 || branch.length == 0 )
            {
               alert("Blank inputs provided in 'BANK DETAILS' section. Please try again.");
               return(false);
            }
            if(acc_no.match(numbers) == null || re_account_no.match(numbers) == null)
            {
               alert("Invalid Account Number provided. Please try again.");
               return(false);
            }
            if(acc_no !== re_account_no)
            {
               alert("Account Numbers do not match. Please try again !");
               return(false);
            }

            //Validating Account Security Section
            if(password.length == 0 || re_password.length == 0)
            {
               alert("Blank input provided in 'Account Security' section. Please try again.");
               return(false);
            }
            if(password!=re_password){
               alert("Passwords do not match. Please try again.");
               return(false);
            }

            var names_validator = /^[a-zA-Z-' ]*$/;
            var pan_validator = /^[a-zA-Z0-9 ]*$/;
            var pass_pf_validator = /^[a-zA-Z0-9/# ]*$/;

            if(last_name.match(names_validator) == null || first_name.match(names_validator) == null || middle_name.match(names_validator) == null || fathers_name.match(names_validator) == null || mothers_name.match(names_validator) ==null || sp_name.match(names_validator) == null)
            {
               alert('Special characters are not allowed. Please try again.');
               return false
            }

            if(pf_no.match(pass_pf_validator) == null || passport_no.match(pass_pf_validator) == null )
            {
               alert("Invalid characters provided in 'Document Section'. Please try again !");
               return(false);
            }

            if(pan_no.match(pan_validator)==null)
            {
               alert("Invalid Pan Number. Please try again !");
               return(false);
            }

         }





      </script>
	<div class = "float">
		<div class="header">
			<header id="header" class="hoc clear"> 
      			<p align="center" style="font-size:30px;font-family:sans-serif ; color:white;">
      				<img src="images/demo/fcritlogo.png" style="width:150px; height:150px; background:none !important;border: none !important;"/>
      						FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY
      			</p>
   		</header>
   	</div>
   		<div class="formBody">
   			<form name="myform"  id="myform" action="mailer.php" method="POST" onsubmit="return validateForm();" enctype="multipart/form-data">
               <!-- <form name="myform"  id="myform" action="test.php" method="POST" enctype="multipart/form-data"> -->
   				
   				<div style="margin-bottom: 2%">
   				<h2 align="center">
   					<b>STAFF  PERSONAL  DETAILS</b>
   				</h2>
   				</div>

   				<div class="part1" style="margin-bottom: 2%">
                  <center>
                     <b>PERSONAL DETAILS</b>
                  </center>      
   					<table class="personal_details">
   						<tr>
   							<td id="attr">Last Name : </td>
   							<td>
   								<input type="text" name="last_name" required>
   							</td>
   						</tr>
   						<tr>
   							<td id="attr">First Name : </td>
   							<td>
   								<input type="text" name="first_name" required>
   							</td>
   						</tr>
						<tr>
   							<td id="attr">Middle Name : </td>
   							<td>
   								<input type="text" name="middle_name" >
   							</td>
   						</tr>
   						<tr>
   							<td id="attr">Father's Name : </td>
   							<td>
   								<input type="text" name="fathers_name" required>
   							</td>
   						</tr>
   						<tr>
   							<td id="attr">Mother's Name : </td>
   							<td>
   								<input type="text" name="mothers_name" required>
   							</td>
   						</tr>
   						<tr>
   							<td style="padding: 2.5% 10%; text-align: right">Gender : </td>
   							<td>
   								<div class="inline">
   									<input type="radio" name="Gender" value="male" style="width: auto" checked="checked">
   									<label>Male</label>
   								</div>
   								<div class="inline">
   									<input type="radio" name="Gender" value="female" style="width: auto">
   									<label>Female</label>
   								</div>
   							</td>
   						</tr>
   						<tr>
   							<td style="padding: 2.5% 10%; text-align: right">Marital Status : </td>
   							<td>
   								<div class="inline">
									<input type="radio" id="mar_stat" name="marital_status"  value="Married" style="width: auto"  checked="checked" />
									<label>Married</label>
								</div>
								<div class="inline">
    								<input type="radio" id="mar_stat" name="marital_status" value="Unmarried" style="width: auto"/>
    								<label>Unmarried</label>
   							</td>   					
   						</tr>
   						<tr>
   							<td id="attr">Spouse Name : </td>
   							<td>
   								<input type="text" id="sp_name" name="spouse_name"  required>
   							</td>
   						</tr>
   						<tr>
   							<td id="attr">Date of Birth : </td>
   							<td>
   								<input type="date" name="DOB" id="dob"  required>
   							</td>
   						</tr>
                     <tr>
                      <td id="label" align="right">Upload Profile Picture :</td>
                     <td id="input">
                        <input type="file" accept="image/*" name="fileToUpload[0]" id="fileToUpload[0]" required>
                     </td>
                  </tr>
                  <tr>
                     <td id="label" align="right">Upload Signature :</td>
                     <td id="input">
                        <input type="file" accept="image/*" name="fileToUpload[1]" id="fileToUpload[1]" required>
                     </td>
                  </tr>
   					</table>
   				</div>
               <br>

               <div class="part2" style="margin-bottom: 2%">
                  <center>
                     <b>CONTACT DETAILS</b>
                  </center>      
                  <table class="contact_details">
                     <tr>
                        <td id="attr">Residential Phone Number : </td>
                        <td>
                          <input type="text" name="residential_no" id="res_phone" minlength="10" maxlength="10">
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Personal Mobile Number : </td>
                        <td>
                           <input type="tel" name="mobile_no" id="personal_phone" minlength="10" maxlength="10" required>
                        </td>
                     </tr>   
                     <tr>
                        <td id="attr">Email ID : </td>
                        <td><input type="email" name="email" id="email" required>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Alternate Email ID :</td>
                        <td><input type="email" name="alt_email"  id="alt_email" required></td>
                     </tr>   
                     <tr>
                        <td id="attr">Current Address :</td>
                        <td>
                           <textarea name="current_address" id="curr_addr" required></textarea>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Permanent Address :</td>
                        <td>
                           <textarea name="permanent_address" id="permanent_address" required></textarea>
                        </td>
                     </tr>               
                  </table>
               </div>
               <br>

<script type="text/javascript">

   function check_category(val)
   {
      if(val==="others")
            document.getElementById('other_category').removeAttribute('disabled');
         else
            document.getElementById('other_category').setAttribute('disabled','true'); 
   }

   function check_religion(val)
   {
      if(val==="others")
            document.getElementById('other_religion').removeAttribute('disabled');
         else
            document.getElementById('other_religion').setAttribute('disabled','true'); 
   }
     
   function check_nationality(val)
   {
      if(val==="others")
            document.getElementById('other_nationality').removeAttribute('disabled');
      else
            document.getElementById('other_nationality').setAttribute('disabled','true');

   }
</script>

               <div class="part3" style="margin-bottom: 2%">
                  <center>
                     <b>DOCUMENTS DETAILS</b>
                  </center>      
                  <table class="document_details">
                     <tr>
                        <td id="attr">Aadhar Card Number :</td>
                        <td>
                           <input type="text" name="aadhar" id="adhar" required='true' minlength="12" maxlength="12">
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">PF Number :</td>
                        <td>
                           <input type="text" name="pf_no" id="pf_no" required='true' minlength="10" maxlength="14">
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">PAN Card Number :</td>
                        <td>
                           <input type="text" name="pan_no" id="pan_no" required='true' minlength="10" maxlength="10">
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Passport Number :</td>
                        <td>
                           <input type="text" name="passport_no" id="passport_no" minlength="8" maxlength="9">
                        </td>
                     </tr>
                     <tr>
                        <td style="text-align: right; padding-top: 30px">Nationality :</td>
                        <td>
                           <select name="nationality" id="nationality" onchange='check_nationality(this.value)' required>
                              <option value="" selected="selected" disabled >Select Appropriate Option</option>
                              <option value="indian">Indian</option>
                              <option value="others">Others</option>
                           </select>
                           <input type="text" id="other_nationality" name="other_nationality" style="margin-top: 10px;" placeholder="Nationality"  required="true" disabled="true">
                        </td>
                     </tr>
                     <tr>
                        <td style="text-align: right; padding-top: 30px">Religion :</td>
                        <td>
                           <select name="religion" id="religion" onchange='check_religion(this.value)' required>
                              <option value="" selected="selected" disabled required>Select Appropriate Option</option>
                              <option value="Hinduism">Hinduism</option>
                              <option value="Islam">Islam</option>
                              <option value="Christianity">Christianity</option>
                              <option value="Buddhism ">Sikhism </option>
                              <option value="Jainism">Bhuddhism</option>
                              <option value="Parsi">Parsi</option>
                              <option value="others">Others</option>
                           </select>
                           <input type="text" name="other_religion" id="other_religion" placeholder="Religion" style='margin-top:10px;' disabled="true" required>
                        </td>
                     </tr>
                     <tr>
                        <td style="text-align: right; padding-top: 30px">Category :</td>
                        <td>
                           <select required name="category" id="category" onchange='check_category(this.value)' > 
                              <option value="" selected disabled>Select Appropriate Option</option>  
                              <option value="open">Open</option>
                              <option value="obc">OBC</option>
                              <option value="sbc">SBC</option>
                              <option value="sc">SC</option>
                              <option value="nt">NT</option>
                              <option value="ntdt">NT</option>
                              <option value="vj">VJ</option>
                              <option value="others">Others</option>
                           </select> 
                           <input type="text" name="other_category" id="other_category" placeholder="Category" style='margin-top:10px ;' disabled="true" required="true">
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Caste :</td>
                        <td>
                           <input type="text" name="caste" id="caste" required>
                        </td>
                     </tr>
                  </table>
               </div>

               <div class="part4" style="margin-bottom: 2%">
                  <center>
                     <b>BANK DETAILS</b>
                  </center>      
                  <table class="bank_details">
                     <tr> 
                        <td id="attr">Bank Name :</td>
                        <td>
                           <input type="text" name="bank_name" id="bank_name" required>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Account Number :</td>
                        <td>
                           <input type="text" name="acc_no" id="account_no" maxlength="17" required='true'>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Re-enter Account Number : </td>
                        <td>
                           <input type="text" name="re_account_no" id="re_account_no" maxlength="17" required='true'>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Account Holder's Name :</td>
                        <td>
                           <input type="text" name="bank_acc_holder_name" id="acc_holder_name" required>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Enter IFS Code :</td>
                        <td>
                           <input type="text" name="IFSC_code" id="ifsc" maxlength="11" minlength="11" required='true'>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Branch Name : </td>
                        <td>
                           <input type="text" name="branch" id="bank_branch" required>
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="part5" style="margin-bottom: 2%">
                  <center>
                     <b>INCOME TAX DETAILS</b>
                  </center>      
                  <table class="income_tax_details">
                     <tr>
                        <td id="attr">Form 16 : </td>
                        <td>
                           <select name="form_16" id="form16" required>
                              <option value="" disabled selected>Select Appropriate Option</option>
                              <option value="AnS">Applicable and Submitted</option>
                              <option value="AnNS">Applicable and Not Submitted</option>
                              <option value="nA"> Not Applicable</option>     
                           </select>
                        </td>
                     </tr>
                  </table>
               </div>

               <div class="part6" style="margin-bottom: 2%">
                  <center>
                     <b>ACCOUNT SECURITY</b>
                  </center>      
                  <table class="account_security">
                        <td id="attr">Password</td>
                        <td>
                           <input type="Password" name="password" id="password" required>
                        </td>
                     </tr>
                     <tr>
                        <td id="attr">Re-enter Password</td>
                        <td>
                           <input type="Password" name="re_password" id="re_password" required>
                        </td>
                     </tr>
                  </table>
               </div>


               <div class="part7" style="margin-bottom: 2%">
                  <table class="form_submit" style="border: none; background-color: white !important">
                     <tr>
                        <td style="width: 100%;border: none; background-color:white !important;">
                           <center>
                           <input type="submit" name="submit" id="submit" value="SUBMIT DETAILS" style="width:50%">
                           </center>
                        </td>
                     </tr>
                  </table>
               </div>
   			</form>
   		</div>
      <script type="text/javascript">
         var form = document.forms['myform'];
         form.mar_stat[0].onfocus = function () {
         form.sp_name.disabled = false;
         }
         form.mar_stat[1].onfocus = function () {
         form.sp_name.disabled = true;
         }
      </script>
	</div>
</body>
</html>