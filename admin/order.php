<?php session_start(); 
	  include "../GlobalVariables.php" ;
	  ?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../image/favicon.png" rel="icon" />
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
<!-- CSS Part End-->
</head>
<body>
<!-- Header Start -->
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
<?php
  //php section for retrieving product details.
                $url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_USER_DETAILS_WITH_RESPECT_TO_ORDERID;
                $orderID = $_GET['orderID'];
                $postfields = array('orderID' => $orderID);
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
                echo "<pre>";
                print_r($array_assoc);
                echo "</pre>";
                ?>
<div id="container">
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <br>
        <div id="content" class="col-sm-12">
          <h1 class="title">Order Details</h1>
          <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-user"></i>User Details</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="account">
                          <div class="form-group">
                            <label for="input-payment-firstname" class="control-label">First Name</label>
                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="<?php echo $array_assoc[0]['Fname'] ?>" name="firstname" readonly>
                          </div>
                          <div class="form-group">
                            <label for="input-payment-lastame" class="control-label">Last Name</label>
                            <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="<?php echo $array_assoc[0]['Lname'] ?>" name="lastname" readonly>
                          </div>
                          <div class="form-group">
                            <label for="input-payment-email" class="control-label">E-Mail</label>
                            <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="<?php echo $array_assoc[0]['email'] ?>" name="email" readonly>
                          </div>
                          <div class="form-group">
                            <label for="input-payment-telephone" class="control-label">Telephone</label>
                            <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="<?php echo $array_assoc[0]['contact_no'] ?>" name="telephone" readonly>
                          </div>
                        </fieldset>
                      </div>
              </div> 
              <div class="panel panel-default">
              <div class="panel-heading">
              <h4 class="panel-title">Shipping Address</h4>
            </div>
            <div id="collapse-shipping" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Please Update you profile to make changes in address</p>
                <form class="form-horizontal" method="POST" action="?">
                  <div class="form-group required">
                    <div class="col-sm-10">
                      <textarea class="form-control" id="confirm_comment" name="comments" style="resize: none" rows="6" cols="60" readonly><?php
                       
                            print($array_assoc[0]['address1']);
                            echo "\n"; 
                            print($array_assoc[0]['address2']);
                            echo "\n";
                            print($array_assoc[0]['city']);
                            echo "\n";
                            print($array_assoc[0]['state']);
                            echo "\n";
                            print($array_assoc[0]['pin']);
                      ?> 
                      </textarea>
                    </div>
                  </div>
            </div>
    </div>
</div> <!-- col sm4 -->       
</div> <!-- row -->

<div class="col-sm-8">
              <div class="row">
              <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery and Payment</h4>
                    </div>
                      <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                            <td class="text-center">Delivery Method</td>
                            <td class="text-center">Payment Method</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">delivey Method</td>
                              <td class="text-center">Payment Method</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right">Total</td>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-center"><img src="../image/product/sony_vaio_1-50x75.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail"></td>
                                <td class="text-left">php get product name</a></td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">mrp</td>
                                <td class="text-right">price</td>
                              </tr>
                              <tr>
                                <td class="text-center"><img src="../image/product/sony_vaio_1-50x75.jpg" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail"></a></td>
                                <td class="text-left">php get product name</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">mrp</td>
                                <td class="text-right">price</td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                                <td class="text-right">$750.00</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                                <td class="text-right">add delivery price</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Eco Tax (-2.00):</strong></td>
                                <td class="text-right">$4.00</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>VAT (20%):</strong></td>
                                <td class="text-right">$151.00</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                <td class="text-right">$910.00</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!--Final php check to plsce order -->
            <?php
              if(isset($_POST['submit']))
              {
                   if(isset($_POST['delivery']))
                   {
                       if(isset($_POST['payment']))
                       {
                           if(isset($_POST['confirmagree']))
                           {
                           print('<script>alert("Your order has been confimed");</script>');
                           }
                           else
                           {
                              print('<script>alert("Please Agree the terms and conditions");</script>');
                           }
                       }
                       else
                       {
                         print('<script>alert("Please select a Payment methode. ");</script>');
                       }
                   }
                   else
                   {
                     print('<script>alert("Please select a delivery methode. ");</script>');
                   }
                }
            ?>
</div> <!-- content -->
</div> <!-- row -->
</div> <!-- container -->
</div><!-- container -->
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