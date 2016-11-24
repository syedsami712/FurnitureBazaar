<?php session_start(); ?>
<html>
<head>
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
              <!-- PHP to check if fields are empty or not -->
              <?php 
                $fname = $lname = $email = $telephone=$address_2=$address_1=$city=$state=$pin = "";
                if(isset($_POST['submit']))
                {
                  //if(emailavailable(_POST['email']))
                    //{
                    test_input($fname = $_POST['fname']);
                    test_input($lname = $_POST["lname"]);
                    test_input($lname = $_POST["lname"]);
                    test_input($email = $_POST["email"]);
                    test_input($telephone =$_POST["telephone"]);
                    test_input($address_1 = $_POST["address_1"]);
                    test_input($address_2 = $_POST["address_2"]);
                    test_input($city = $_POST["city"]);
                    test_input($state =$_POST["state"]);
                    test_input($pin = $_POST["pin"]);
                    $password = $_POST['password'];
                   // }
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
                  <input type="text" class="form-control" width="12" id="input-firstname" placeholder="First Name" name="fname" pattern="[A-Za-z]+" value="<?php print($fname); ?>" required >
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="<?php print $lname; ?>" pattern="[A-Za-z]+" name="lname" required>
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="<?php print $email ?>" name="email" required>
                  <span class="error-validation"> <?php $emailerr="" ; echo "$emailerr" ; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">Mobile No. (+91)</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" pattern="\d*" minlength="10" maxlength="10" value="<?php print $telephone; ?>" name="telephone" required>
                  
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>Your Address</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Address 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="<?php print $address_1; ?>" name="address_1" required>
                  
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Address 2</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-2" placeholder="Address 2" value="<?php print $address_2; ?>" name="address_2" required>
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-city" placeholder="City" value="<?php print $city; ?>"  pattern="[A-Za-z]+" name="city" required>
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">State</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-state" placeholder="state" value="<?php print $state; ?>" pattern="[A-Za-z]+" name="state" required>
                  
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="<?php print $pin; ?>" pattern="\d*" minlength="6" maxlength="6" name="pin" required>
                  
                </div>
              </div>
                <!--Password Validation Start -->
              <?php 
                  $pwderr = $conpasserr = "";
                  $password = "";
                  if(isset($_POST['submit']))
                  {
                    $password = $_POST['password'];
                    if(empty($_POST['password']))
                    {
                      $pwderr =  "Password cannot be empty.";
                    }
                    else if(empty($_POST['confirm_password']))
                    {
                      $conpasserr = "Password cannot be empty";
                    }
                    function validpswd()
                    {
                      $flag = false ;
                      if ($_POST['password'] == $_POST['confirm_password'])
                      {
                      $flag = true ;
                      }
                      else 
                      {
                        $conpasserr = "Passwords do not Match" ;
                        $flag = false ;
                      }
                      return $flag ;
                    }
                  }
              ?>
              <!--Password validation end -->
            </fieldset>
            <fieldset>
              <legend>Your Password</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Password" value="<?php print $password ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password">
              </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="confirm_password">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Continue" name="submit">
              </div>
            </div>
          </form>
          <!--Final Call to write the data in database -->
          <?php 
              require('functions/dbconfig.php');
              //require_once('functions/function1.php');
              $uid = generateuid();
              if(isset($_POST['submit']))
              {
                if(validpswd()==true)
                {
                  $pass = $_POST['password'] ;
                  $query = "INSERT INTO `customers` (`uid`,`FName`, `LName`, `email`, `contact_no`, `address1`, `address2`, `city`,`state`,`pin`,`password`) VALUES ('$uid','$fname', '$lname', '$email', '$telephone','$address_1', '$address_2', '$city','$state','$pin','$pass' )";
                   $result=mysqli_query($conn,$query);
                  
                   if(!$result)
                   {
                   print('<script>
                          function myFunction() {
                          alert("Email Already Exist");
                          }
                          myFunction();
                          </script>');
                   }
                  else
                  {
                    print('<script>
                          function myFunction() {
                          alert("Registration Succesful");
                          window.location.href = "http://localhost:8012/FurnitureBazaar/login.php";
                          }
                          myFunction();
                          </script>');
                  }
                }
                else
              {
                print('<script>
                          function myFunction() {
                          alert("Password do not match");
                          }
                          myFunction();
                          </script>');
              }
              }        
          ?>
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
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
</body></html>