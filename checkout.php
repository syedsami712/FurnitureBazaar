<?php session_start(); ?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Furniture Bazaar</title>
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
<?php include "header.php" ?>
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">Shopping Cart</a></li>
        <li><a href="checkout.html">Checkout</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">Checkout</h1>
          <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="account">
                          <div class="form-group required">
                            <label for="input-payment-firstname" class="control-label">First Name</label>
                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="" name="firstname">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-lastname" class="control-label">Last Name</label>
                            <input type="text" class="form-control" id="input-payment-lastname" placeholder="Last Name" value="" name="lastname">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-email" class="control-label">E-Mail</label>
                            <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="" name="email">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-telephone" class="control-label">Telephone</label>
                            <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="" name="telephone">
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
                <form class="form-horizontal">
                  <div class="form-group required">
                    <div class="col-sm-10">
                  		<textarea class="form-control" style="resize: none" rows="6" cols="50" readonly>php populate the address from databases</textarea>
                  	</div>
                  </div>
					<div class="buttons">
            			<div class="pull-left"><a href="index.php" class="btn btn-primary">Account Settings</a></div>
                </form>
              </div>
            </div>
		</div>
</div> <!-- col sm4 -->
				
</div> <!-- row -->
</div> <!-- content -->
</div> <!-- row -->
</div> <!-- container -->
</div><!-- container -->
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