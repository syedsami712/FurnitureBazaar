<?php session_start(); 
	  include "../GlobalVariables.php" ;
	  ?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Furniture Bazaar</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="../js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="../css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="../css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="../css/responsive.css" />
<link rel="stylesheet" type="text/css" href="../css/stylesheet-skin2.css" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Droid+Sans' type='text/css'>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- CSS Part End-->
</head>
<body>
<!-- Header Start -->

<?php require("../functions/function.php"); ?>

<div id="header">
    <!-- Top Bar Start the first strip including only the phone number email info and login and register-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>+91 86928 80768</li>
                <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@furniturebazaar.com</a></li>
              </ul>
            </div>
          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
              <li><a href="login.php">Login</a></li>
              <li style="padding-left: 4px; padding-right: 4px; font-style: bold;">Login/logout</li>
              <li><a href="login.php?status=loggedout">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>  
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="index.php"><img class="img-responsive" src="../images/logo.png" title="furniturebazaar" alt="furniturebazaar" /></a></div>
          </div>
          <!-- Logo End -->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main Menu Start-->
      <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
        <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="Home" href="index.php">Home</a></li>
            <li class="dropdown">
            	<li><a href='#' >Products</a>
            	<li><a href='#' >Stocks</a>
            	<li><a href='#' >Customers</a>
            	<li><a href='#' >Orders</a>
            </li>
          </ul>
        </div>
        </div>
      </nav> 
    <!-- Main Menu End-->
  </div>
<!-- Header End  -->
<?php
  //php section for retrieving product details.
                $url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_ALL_USER_DETAILS;
                $postfields = array();
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
?>
<!-- Mail Start -->
        <br>
          <h1 class="title text-uppercase">&nbsp&nbsp&nbsp&nbspExisting Customers</h1>
            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspList of all Customers Registered</p>  
              <div id="col-sm-9">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <p>
                  <thead>
                    <tr>
                      <th>UserID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Contact No</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Pin</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php populatetable($array_assoc); ?>
                  </tbody>
                </table>
                </p>
              </div>
            </div>
            
<!-- Main ENd --> 
<!--php functions start-->
<?php 
    function populatetable($array_assoc){
      $row = count($array_assoc);
      for($x=0;$x<$row;$x++)
      {?>
          <tr>
          <td><?php echo $array_assoc[$x]['uid']; ?></td>
          <td><?php echo $array_assoc[$x]['Fname']; ?></td>
          <td><?php echo $array_assoc[$x]['Lname']; ?></td>
          <td><?php echo $array_assoc[$x]['email']; ?></td>
          <td><?php echo $array_assoc[$x]['contact_no']; ?></td>
          <td><?php echo $array_assoc[$x]['address1'];echo "<br>" ;echo $array_assoc[$x]['address2']; ?></td>
          <td><?php echo $array_assoc[$x]['city']; ?></td>
          <td><?php echo $array_assoc[$x]['state']; ?></td>
          <td><?php echo $array_assoc[$x]['pin']; ?></td>
          </tr>        
     <?php }
    }
?>
<!--php function end-->
<!--Footer Start-->
<footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h5>About Furniture Bazaar</h5>
            <p>Furniture Bazaaar is a small Project made by Sami and Sunny for partial fullfillment of FYMCA</p>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Information</h5>
            <ul>
              <li><a href="about-us.php">About Us</a></li>
              <li><a href="about-us.php">Delivery Information</a></li>
              <li><a href="about-us.php">Privacy Policy</a></li>
              <li><a href="about-us.php">Terms &amp; Conditions</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Customer Service</h5>
            <ul>
              <li><a href="contact-us.php">Contact Us</a></li>
              <li><a href="#">Returns</a></li>
              </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
<!--Footer End-->





<!-- JS Part Start-->
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="../js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>