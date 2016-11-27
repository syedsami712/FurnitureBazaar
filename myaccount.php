<?php session_start(); 
      include "GlobalVariables.php" ;
       ?>
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
        <li><a href="register.html">Account Settings</a></li>
      </ul>
      <!-- Breadcrumb End-->
      
      <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">My Account Settings</h1>
          <form class="form-horizontal" method="POST" action="">
            <fieldset id="account">
              <legend>Your Personal Details</legend>
            <!--php get data through api -->
            <?php
  //php section for retrieving product details.
$url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_USER_DETAILS;
$userid = $_SESSION['userid'];
$postfields = array('uid' => $userid);
$ch = curl_init();
        $options = array (
                  CURLOPT_URL => $url,
                  CURLOPT_POST => 1,
                  CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_RETURNTRANSFER => true
          );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);
        $array_assoc = json_decode($result, true);
        echo '<pre>';
        echo "Make the changes and Click Update";
        echo '</pre>';
        ?>
              <!-- PHP to test the input -->
              <?php 
                $fname = $lname = $email = $telephone=$address_2=$address_1=$city=$state=$pin = "";
                if(isset($_POST['accountinfo']))
                {
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
                }
                if(isset($_POST['accountcredentials']))
                {
                  $password = $_POST['password'];
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
                  <input type="text" class="form-control" width="12" id="input-firstname" placeholder="First Name" name="fname" pattern="[A-Za-z]+" value="<?php echo $array_assoc[0]['Fname']; ?>" required >
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" value="<?php echo $array_assoc[0]['Lname'] ?>" pattern="[A-Za-z]+" name="lname" required>
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="<?php echo $array_assoc[0]['email'] ?>" name="email" readonly>
                  <span class="error-validation"> <?php $emailerr="" ; echo "$emailerr" ; ?></span>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">Mobile No. (+91)</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" pattern="\d*" minlength="10" maxlength="10" value="<?php echo $array_assoc[0]['contact_no'] ?>" name="telephone" required>
                  
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>Your Address</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Address 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="<?php echo $array_assoc[0]['address1']; ?>" name="address_1" required>
                  
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Address 2</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-2" placeholder="Address 2" value="<?php echo $array_assoc[0]['address2'] ?>" name="address_2" required>
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-city" placeholder="City" value="<?php echo $array_assoc[0]['city']; ?>"  pattern="[A-Za-z]+" name="city" required>
                 
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">State</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-state" placeholder="state" value="<?php echo $array_assoc[0]['state'] ?>" pattern="[A-Za-z]+" name="state" required>
                  
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="<?php echo $array_assoc[0]['pin']; ?>" pattern="\d*" minlength="6" maxlength="6" name="pin" required>
                </div>
              </div>
              <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Save Changes" name="accountinfo">
              </div>
            </div>
            <?php 
              require('functions/dbconfig.php');
                if(isset($_POST['accountinfo']))
                {
                    $query = "UPDATE customers SET Fname='$fname',Lname='$lname',contact_no='$telephone',address1='$address_1',address2='$address_2',city='$city',state='$state',pin='$pin' WHERE uid  = $userid";
                    $result=mysqli_query($conn,$query);
                    if(!$result)
                    {
                      print('<script>
                          function myFunction() {
                          alert("Error Occured");
                          }
                          myFunction();
                          </script>');
                    }
                    else
                    {
                      print('<script>
                          function myFunction() {
                          alert("Changes Saved");
                          }
                          myFunction();
                          </script>');
                    }
                }
            ?>
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
              ?>
              <!--Password validation end -->
            </fieldset>
            <fieldset>
              <legend>Change Password</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Password" value="<?php print $password ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password">
              </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Confirm New Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" value="" name="confirm_password">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Save Password" name="accountcredentials">
              </div>
            </div>
          </form>
          <!--Final Call to write the data in database -->
          <?php 
              require('functions/dbconfig.php');
              if(isset($_POST['accountcredentials']))
              {
                if(validpswd()==true)
                {
                  $pass = $_POST['password'];
                  $enpass = md5($pass);
                  $query = "UPDATE customers SET password='$enpass' WHERE uid  = $userid";
                  $result=mysqli_query($conn,$query);
                  echo $query;
                   if(!$result)
                   {
                   print('<script>
                          function myFunction() {
                          alert("Error Occured");
                          }
                          myFunction();
                          </script>');
                   }
                  else
                  {
                    print('<script>
                          function myFunction() {
                          alert("Password changed Sucessfully");
                          }
                          myFunction();
                          </script>');
                    echo "<script>setTimeout(\"location.href = 'myaccount.php';\",1500);</script>";
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