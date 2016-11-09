<html>
<head>
<?php require("functions/validation.php"); ?>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Furniture Bazaar-Registration</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet-skin2.css" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Droid+Sans' type='text/css'>
<!-- CSS Part End-->
</head>
<body>
<?php include "header.php"; ?>
 <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">Account</a></li>
        <li><a href="register.html">Register</a></li>
      </ul>
      <!-- Breadcrumb End-->
      
      <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">Register Account</h1>
          <p>If you already have an account with us, please login at the <a href="login.html">Login Page</a>.</p>
          <form class="form-horizontal" method="POST" action="">
            <fieldset id="account">
              <legend>Your Personal Details</legend>
              <div style="display: none;" class="form-group required">
                <label class="col-sm-2 control-label">Customer Group</label>
                <div class="col-sm-10">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="1" name="customer_group_id">
                      Default</label>
                  </div>
                </div>
              </div>
              <!-- PHP to check if fields are empty or not -->
              <?php 
                $fnameerr = $lnameerr = $emailerr = $telerr = $add1err = $add2err = $cityerr = $state_err = $pinerr = "";
                $fname = $lname = $email = $telephone=$address_2=$address_1=$city=$state=$pin = "";

                if(isset($_POST['submit']))
                {
                  $fname = $_POST['fname'];$lname = $_POST["lname"]; $lname = $_POST["lname"];$telephone =$_POST["telephone"];$address_1 = $_POST["address_1"];
                  $address_2 = $_POST["address_2"]; $city = $_POST["city"];$state =$_POST["state"];$pin = $_POST["pin"];
                  
                  if (empty($_POST["fname"])) { $fnameerr = "First Name cannot be empty!";}
                  else if(validate_name($_POST['fname'])==true){ $fnameerr = error1();}
                  else{$fname=test_input($_POST['fname']);}
                  

                  if(empty($_POST["lname"])){ $lnameerr="Last Name cannot be empty";}
                  else if(validate_name($_POST['lname'])==true){ $lnameerr = error1();}
                  else{$lname=test_input($_POST['lname']);}
                  
                  if(empty($_POST["email"])){ $emailerr="Email cannot be empty" ;}else{$email=test_input($_POST['email']);}

                  if(empty($_POST["telephone"])){ $telerr="Contact Number canoot be empty" ;}
                  else if(validate_name($telephone)==false){$telerr="Only numbers are acceptable";}
                  else if(validate_num($_POST['telephone'])==true){$telerr="Contact Number Should be 10 Digits";}
                  else{$telephone = test_input($_POST['telephone']);}

                  if(empty($_POST["address_1"])){ $add1err="Address cannot be empty" ;}else{$address_1=test_input($_POST['address_1']);}

                  if(empty($_POST["address_2"])){ $add2err="Address cannot be empty" ;}else{$address_2=test_input($_POST['address_2']);}

                  if(empty($_POST["city"])){ $cityerr="City cannot be empty" ;}
                  else if(validate_name($_POST['city'])==true){ $cityerr = error1();}
                  else{$city=test_input($_POST['city']);}

                  if(empty($_POST["state"])){ $state_err="State cannot be empty" ;}
                  else if(validate_name($_POST['state'])==true){ $state_err = error1();}
                  else{$state=test_input($_POST['state']);}

                  if(empty($_POST["pin"])){ $pinerr="Pin cannot be empty" ;}
                  else if(validate_name($pin)==false){$pinerr="Only numbers are acceptable";}
                  else if(validate_num1($_POST['pin'])==true){ $pinerr = "PIN should be 6 Digits";}
                  else{$pin=test_input($_POST['pin']);} 
                }
                  function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;}
              ?>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="12" id="input-firstname" placeholder="First Name" name="fname" value="<?php print($fname); ?>" >
                  <span class="error-validation">* <?php echo $fnameerr; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="<?php print $lname; ?>" name="lname">
                  <span class="error-validation">* <?php echo $lnameerr; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="<?php print $email; ?>" name="email">
                  <span class="error-validation">* <?php echo $emailerr; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">Contact No</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="<?php print $telephone; ?>" name="telephone">
                  <span class="error-validation">* <?php echo $telerr; ?></span>
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>Your Address</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Address 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="<?php print $address_1; ?>" name="address_1">
                  <span class="error-validation">* <?php echo $add1err; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Address 2</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-2" placeholder="Address 2" value="<?php print $address_2; ?>" name="address_2">
                  <span class="error-validation">* <?php echo $add2err; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-city" placeholder="City" value="<?php print $city; ?>" name="city">
                  <span class="error-validation">* <?php echo $cityerr; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">State</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-state" placeholder="state" value="<?php print $state; ?>" name="state">
                  <span class="error-validation">* <?php echo $state_err; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="<?php print $pin; ?>" name="pin">
                  <span class="error-validation">* <?php echo $pinerr; ?></span>
                </div>
              </div>
              
            </fieldset>
            <fieldset>
              <legend>Your Password</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Password" value="" name="password">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="confirm">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Continue" name="submit">
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Account</h3>
          <div class="list-group">
            <ul class="list-item">
              <li><a href="login.html">Login</a></li>
              <li><a href="register.html">Register</a></li>
              <li><a href="#">Forgotten Password</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Address Books</a></li>
              <li><a href="wishlist.html">Wish List</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">Reward Points</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Transactions</a></li>
              <li><a href="#">Newsletter</a></li>
              <li><a href="#">Recurring payments</a></li>
            </ul>
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
<?php include "footer.php"; ?>
 <?php
                
                
                
                    
          ?>
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
</body></html>