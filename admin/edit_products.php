<?php session_start(); 
    include "../GlobalVariables.php" ;
    if($_SESSION['username']=="")
    {
      echo "<script>alert('Plese Login to Continue.');window.location.href='admin_home.php';</script>";
    }
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- CSS Part End-->
</head>
<body>
<!-- Header Start -->
<?php
  //php section for retrieving product details.
                $url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_PRODUCTS_DETAILS_AND_STOCK;
                $prodID = $_GET['prodId'] - 1 ;
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
              <li style="padding-left: 4px; padding-right: 4px; font-style: bold;">Welcome <?php echo $_SESSION['username']; ?></li>
              <li><a href="admin_home.php?status=loggedout">Logout</a></li>
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
              <li><a href='admin_stockmgmt.php' >Products and Stock</a>
              <li><a href='admin_customers.php' >Customers</a>
              <li><a href='admin_orderlist.php' >Orders</a>
            </li>
          </ul>
        </div>
        </div>
      </nav> 
    <!-- Main Menu End-->
  </div>
<!-- Header End  -->

<!-- Mail Start -->
<div id="container">
    <div class="container">
      <div class="row">
          <div id="content" class="col-sm-9">
          <br>
			<h1 class="title text-uppercase">&nbsp&nbsp&nbsp&nbspEdit Products</h1>
				<form class="form-horizontal" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">Product ID</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="12" id="input-name" value="<?php echo $array_assoc[$prodID]['productid'] ; ?>" placeholder="Product Name" name="prodname" readonly >
                </div>
              </div>
			<div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="12" id="input-name" value="<?php echo $array_assoc[$prodID]['productname'] ; ?>" placeholder="Product Name" name="prodname" readonly >
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">Product MRP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="6" id="input-name" value="<?php echo $array_assoc[$prodID]['mrp'] ; ?>" placeholder="Product MRP" pattern="\d*" name="prodmrp" required >
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">Product Cost</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="6" id="input-name" value="<?php echo $array_assoc[$prodID]['cost'] ; ?>" placeholder="Product Cost" pattern="\d*" name="prodcost" required >
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">Stock Available</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="6" placeholder="Available Stock" value="<?php echo $array_assoc[$prodID]['availablestock'] ; ?>" pattern="\d*" name="availablestock" required >
                </div>
              </div>
              <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Update Product" name="update_product">
              </div>
            </div>
			</form>
		</div>
	   </div>
    </div>
</div>
<?php 
    require('../functions/dbconfig.php');
    if(isset($_POST['update_product']))
    {
      $query = "UPDATE products SET mrp=".$_POST['prodmrp'].",cost=".$_POST['prodcost']." WHERE productid=".$array_assoc[$prodID]['productid']." " ;
      $query1 = "UPDATE productstock SET availablestock=".$_POST['availablestock']." WHERE productid=".$array_assoc[$prodID]['productid']." " ;
      $result=mysqli_query($conn,$query);
      if($result)
      {
        $result1 = mysqli_query($conn,$query1);
        if($result1)
        {
          echo "<script>alert('All Details Updated Succesfully');
            window.location.href = 'http://localhost:8012/FurnitureBazaar/admin/admin_stockmgmt.php';
           </script>";

        }
        else
        {
          echo "<script>alert('Stock Table Error');</script>";
        }
      }
      else
      {
        echo "<script>alert('Product Table error');</script>";
      }
    }
?>
<!-- Main ENd --> 
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