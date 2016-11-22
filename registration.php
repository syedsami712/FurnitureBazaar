<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/top.css">
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<style type="text/css">
		.btn_tab:hover
		{
			background-color: #a5d68b;
		}
	</style>
</head>
<body>
	<div clasrs="container_top">
		<font class="font1">SILVER GAS AGENCY</font>
	</div>

	<div class="container_tab">
		<a href="home.php"><input type="button" name="home" class="btn_tab" value="HOME"></a>
		<input type="button" name="aboutUs" class="btn_tab" value="ABOUT US">
		<input type="button" name="contactUs" class="btn_tab" value="CONTACT US">

		<div class="dropdown">
  			<button class="btn_tab">SERVICES</button>

  			<div class="dropdown-content">
   				 <a href="registration.php">New Connection</a>
   				 <a href="login.php">Gas Booking</a>
 			</div>
		</div>
		<font class="font2">BookMyGas</font>
	</div>

	<div class="container_reg">
		<center>
			<fieldset>
			<legend><h1>REGISTRATION</h1></legend>
			<br>
			<form method="POST" name="reg_form" id="form1">
				<table cellspacing="5">
					<tr class="tbl_tr">
						<td colspan="6">PERSONAL DETAILS</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><input type="text" name="fname" pattern="[A-Za-z]+" required></td>
						<td>Middle Name</td>
						<td><input type="text" name="mname" pattern="[A-Za-z]+" required></td>
						<td>Last Name</td>
						<td><input type="text" name="lname" pattern="[A-Za-z]+" required></td>
					<tr>
						<td>DOB</td>
						<td><input type="date" name="dob" required></td>
						<td>Contact No</td>
						<td><input type="text" name="contact" pattern="\d*" minlength="10" maxlength="10" required></td>
						<td>Email-Id</td>
						<td><input type="email" name="eid" required></td>
					</tr>	
					<tr>
						<td>Password</td>
						<td><input type="PASSWORD" name="pwd" minlength="6" maxlength="15" onchange="reg_form.cpwd.pattern= this.value;" required</td>
						<td>Confirm Password</td>
						<td><input type="PASSWORD" name="cpwd" minlength="6" maxlength="15" required></td>
					</tr>
					<tr><td></td></tr>
					<tr><td></td></tr>
					<tr class="tbl_tr">
						<td colspan="6">ADDRESS DETAILS</td>
					</tr>
					<tr>
						<td>Flat Name/No</td>
						<td><input type="text" name="flt_no" required></td>
						<td>Floor No</td>
						<td><input type="text" name="flr_no"></td>
						<td>Building Name/No</td>
						<td><input type="text" name="bldg_no" required></td>
					</tr>
					<tr>
						<td>Area</td>
						<td><select name="area">
							<option value="Dadar">Dadar</option>
							<option value="Bandra">Bandra</option>
							<option value="Andheri">Andheri</option>
							<option value="Borivali">Borivali</option>
						</select></td>
						<td>State</td>
						<td><input type="text" name="state" value="Maharashtra" readonly="yes"> </td>
						<td>District</td>
						<td><input type="text" name="district" value="Mumbai" readonly="yes"></td>
					</tr>
					<tr>
						<td>Pin Code</td>
						<td><input type="text" name="pin" required></td>
					</tr>
				</table>
				<br>
				<input type="submit" name="sub_btn" id="button" class="btn" value="PROCEED">
				<input type="reset" name="reset" class="btn" value="RESET">
				</form>
			</fieldset>
		</center>
	</div>

	<?php
		require ('dbconfig.php');
		session_start();

		if (isset($_POST['sub_btn']))
		{
			$fname=$_POST['fname'];
			$mname=$_POST['mname'];
			$lname=$_POST['lname'];
			$dob=$_POST['dob'];
			$contact=$_POST['contact'];
			$eid=$_POST['eid'];
			$pwd=$_POST['pwd'];
			//$encrypt_pwd=md5($pwd);

			$flt_no=$_POST['flt_no'];
			$flr_no=$_POST['flr_no'];
			$bldg_no=$_POST['bldg_no'];
			$area=$_POST['area'];
			$state=$_POST['state'];
			$district=$_POST['district'];
			$pin_code=$_POST['pin'];
			
			$query1="INSERT INTO `personal_details` (`FirstName`, `MiddleName`, `LastName`, `Dob`, `ContactNo`, `EmailId`, `Password`) VALUES ('$fname', '$mname', '$lname', '$dob','$contact', '$eid', '$pwd')";
			$result1=mysql_query($query1, $conn);
							
			if (!$result1)
			{
				echo mysql_error();
			}

			$query2=mysql_query("SELECT UID FROM personal_details WHERE EmailId='$eid'");
			$result2=mysql_fetch_assoc($query2);

			if(!$result2) 
			{
				echo "No such data in personal_details";
				echo mysql_error();
			}
			else
			{
				echo"UID===".$result2['UID']."<br><br>";
			}
			
			$UID=$result2['UID'];
			$_SESSION["uid"]=$UID;
			//echo "UID=".$UID;

			$query3="INSERT INTO `address_details` (`UID`, `FlatNo`, `FloorNo`, `BldgNo`, `Area`, `State`, `District`, `PinCode`) VALUES ('$UID','$flt_no', '$flr_no', '$bldg_no', '$area', '$state', '$district', '$pin_code')";
			$result3=mysql_query($query3, $conn);

			if (!$result3)
			{
				echo "FAILED2".mysql_error();
			} 			

			$query4="INSERT INTO `gas_details`(`UID`, `TotalNo`, `Consumed`, `Available`) VALUES ('$UID', '12', '0', '12')";
			$result4=mysql_query($query4, $conn);

			if(!$result4)
			{
				echo "FAILED3".mysql_error();
			}
			else
			{
				header("Location:pic_upload.php");
			}
		}
	?>
</body>
</html>