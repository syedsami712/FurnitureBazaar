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
<?php
  //php section for retrieving product details.
                $url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_USER_DETAILS_WITH_RESPECT_TO_ORDERID;
                $url1 = DEFAULT_WEB_PATH.API_PAGE.RETREIVE_ORDERITEMS_WITH_RESPECT_TO_ORDERID;
                $orderID = $_GET['orderID'];
                $postfields = array('orderID' => $orderID);
                $postfields1 = array('orderID'=> $orderID);
                $ch = curl_init();
                $ch1 = curl_init();
                $options = array (
                  CURLOPT_URL => $url,
                  CURLOPT_POST => 1,
                  CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_RETURNTRANSFER => true
                );
                $options1 = array (
                  CURLOPT_URL => $url1,
                  CURLOPT_POST => 1,
                  CURLOPT_POSTFIELDS => $postfields1,
                  CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($ch, $options);
                curl_setopt_array($ch1, $options1);
                $result = curl_exec($ch);
                $result1 = curl_exec($ch1);
                curl_close($ch);
                curl_close($ch1);
                $array_assoc = json_decode($result, true);
                $array_assoc1 = json_decode($result1,true);
                // echo "<pre>";
                // print_r($array_assoc);
                // print_r($array_assoc1);
                // echo "</pre>";
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
</div>    

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
                              <td class="text-center"><?php if($array_assoc[0]['delivery_method'] == "0"){
                                echo "Self Pickup And Installation"; 
                              } else if($array_assoc[0]['delivery_method'] == "300") {
                                echo "Installation only";
                              }
                                else if($array_assoc[0]['delivery_method'] == "700"){
                                  echo "Delivery and Installation";
                                }?></td>
                              
                              <td class="text-center"><?php echo $array_assoc[0]['payment_type']; ?></td>
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
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Booked Items</h4>
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
                                <?php 
                                $subtotal = 0;


                                // populatecart($array_assoc1);

                      $count = count($array_assoc1);
                      for($x=0;$x<$count;$x++)
                      {
                        echo "<tr>";
                        echo '<td class="text-center"><img src="'.DEFAULT_IMAGE_PATH.'products/'.$array_assoc1[$x]['productimg'].'" width="150" height="150" alt="'.$array_assoc1[$x]['productname'].'" title="'.$array_assoc1[$x]['productname'].'" class="img-thumbnail"></td>';
                        echo '<td class="text-left">'.$array_assoc1[$x]['productname'].'</a></td>';
                        echo '<td class="text-left">'.$array_assoc1[$x]['quantity'].'</td>';
                        echo '<td class="text-right">'.$array_assoc1[$x]['cost'].'</td>';
                        $subtotal += $array_assoc1[$x]['cost']*$array_assoc1[$x]['quantity'];
                        echo '<td class="text-right">'.$subtotal.'</td>';
                        echo "</tr>"; 
                      }



                                 ?> 
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                                <td class="text-right"><?php echo "Rs. ".$subtotal; ?></td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Shipping Charges</strong></td>
                                <td class="text-right"><?php echo "Rs. ".$array_assoc[0]['delivery_method']; ?></td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>VAT (12%):</strong></td>
                                <td class="text-right"><?php echo "Rs. ".$VAT = (12/100)*$subtotal;

                                $grandTotal = $VAT + $subtotal; ?></td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                <td class="text-right"><?php echo "Rs. ".$grandTotal; ?></td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                  <?php 
                    function populatecart($array_assoc1){

                     
                    }
                  ?>
                  <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-pencil"></i> User Comment</h4>
                    </div>
                      <div class="panel-body">
                        <textarea rows="4" class="form-control" id="confirm_comment" name="comments" readonly><?php echo $array_assoc[0]['comments']; ?></textarea>
                        </div>
                      </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!--Final php check to plsce order -->
            
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