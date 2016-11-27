<?php session_start();
  include 'functions/dbconfig.php';
  if(isset($_GET['status'])){
    if($_GET['status'] === "loggedout") {
      $_SESSION['username'] ="";
    }
  }
  
 ?>
<html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Furniture Bazaar - Login</title>
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
        <li><a href="register.html">Forgot Password</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">Password Recovery</h1>
          <p>If you already have an account with us, please login at the <a href="login.php">Login Page</a>.</p>
          <form class="form-horizontal" method="POST" action="">
            <fieldset id="account">
              <legend>Your Email ID</legend>
              <!-- PHP to check if fields are empty or not -->
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">Email ID</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="E-Mail"" name="email">
                </div>
                 <div class="buttons">
                  <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Retreive Password" name="retreivepassword">
                </div>
                  </div>
                </div>
                </fieldset>
                </form>
           </div>
          </div>
        </div>
    </div>
<?php 
    function emailexist($conn,$email)
    {
      $flag = true ;
      $result = $conn->prepare("Select count(*) as row_count from customers where email=?");
      $result->bind_param("s", $email);
      $result->execute();
      $result->store_result();
      $result->bind_result($row_count);
      $result->fetch();
      if($row_count<1)
        print('<script>alert("This Email is not registered.");</script>');
      else
      {
    $Subject = "Subject here";
$ToEmail = 'ka.boom.tm@gmail.com';
$donotreply = 'winwarems@gmail.com ';
$body = 'hello world';

$Headers  = "MIME-Version: 1.0\n";
$Headers .= "Content-type: text/html; charset=iso-8859-1\n";
$Headers .= "From:  <".$donotreply.">\n";
$Headers .= "Reply-To: ".$donotreply."\n";
$Headers .= "X-Sender: <".$donotreply.">\n";
$Headers .= "X-Mailer: PHP\n"; 
$Headers .= "X-Priority: 1\n"; 
$Headers .= "Return-Path: <".$donotreply.">\n";   
$mail = mail($ToEmail, $Subject, $body, $Headers);
        print('<script>alert("Email has been sent.");</script>');
      }
    }


    if(isset($_POST['retreivepassword']))
    {
      $email = $_POST['email'];
      emailexist($conn,$email);
    }
?>
<?php include "footer.php" ?>
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>