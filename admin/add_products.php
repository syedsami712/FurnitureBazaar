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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- CSS Part End-->
</head>
<body>
<!-- Header Start -->
<?php
  //php section for retrieving product details.
                $url = DEFAULT_WEB_PATH.API_PAGE.RETREIVE_CATEGORIES;
                $url1 = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_SUBCATEGORY_WITH_RESPECT_TO_CATEGORY_ID;
                $postfields = array('catID'=> $categoryID);
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
       			print_r($array_assoc);
       			echo $array_assoc[1]['ID'];
        		echo '</pre>';
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






<!-- Mail Start -->
<div id="container">
    <div class="container">
      <div class="row">
          <div id="content" class="col-sm-9">
          <br>
			<h1 class="title text-uppercase">&nbsp&nbsp&nbsp&nbspAdd Products Customers</h1>
				<form class="form-horizontal">
					<div class="form-group required">

                <label for="input-country" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-4">
                  <select class="form-control" name="category" id="category">
                  	<?php
                  		$count = count($array_assoc);
                  		for($x=0;$x<$count;$x++)
                  		{
                  			echo '<option value="'.$array_assoc[$x]['ID'].'">'.$array_assoc[$x]['Category_Name'].'</option>';
                  		}
                  	?>
                  </select>
                </div>
                <script>
                	$(function() {
    					$('#category').change(function() {
    						var x = $('#category').val();
    	 				   document.location = 'http://localhost:8012/FurnitureBazaar/admin/add_products.php?catid='+ x;
   							 });
						});
                </script>
			</div>
			<div class="form-group required">
                <label for="input-country" class="col-sm-2 control-label">Sub-Category</label>
                <div class="col-sm-4">
                  <select class="form-control" name="sub_category">
                  		<option value="1"></option>
                  </select>
                </div>
			</div>
			<div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="12" id="input-name" placeholder="Product Name" name="prodname" required >
                </div>
              </div>
              <div class="form-group required">
              		 <label for="input-country" class="col-sm-2 control-label">Product Description</label>
                    <div class="col-sm-10">
                  		<textarea class="form-control" id="confirm_comment" name="product_desc" style="resize: none" rows="6" cols="60">Please Enter Product Description.
                      </textarea>
                  	</div>
                  </div>
               <div class="form-group required">
                <label class="col-sm-2 control-label">Product Image File</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="prodimg_file" required >
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">Product Material</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="12" id="input-name" placeholder="Product Material" name="prodmaterial" required >
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">Product MRP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="6" id="input-name" placeholder="Product MRP" pattern="\d*" name="prodmrp" required >
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">Product Cost</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="6" id="input-name" placeholder="Product Cost" pattern="\d*" name="prodmrp" required >
                </div>
              </div>
               <div class="form-group required">
                <label class="col-sm-2 control-label">Product Tags</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" width="6" id="input-name" placeholder="Tags for search" pattern="\d*" name="prodmrp" required >
                </div>
              </div>
              <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Save Product" name="save_product">
              </div>
            </div>
			</form>
		</div>
	   </div>
    </div>
</div>
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