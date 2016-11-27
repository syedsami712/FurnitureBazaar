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
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
        	<br>
          <h1 class="title">Shopping Cart</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Image</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Material</td>
                    <td class="text-left">Quantity</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Total</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center"><a href="product.php"><img src="images/logo.png" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="product.php">php cartproduct()</a><br />
                      <small>Material : php getmaterial()</small></td>
                    <td class="text-left">php getproductID</td>
                    <td class="text-left"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="1" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
                    <td class="text-right">php getpriceofproduct()</td>
                    <td class="text-right">calculated price = quantity * price</td>
                  </tr>
                  <tr>
                    <td class="text-center"><a href="product.php"><img src="images/logo.png" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="product.php">php cartproduct()</a><br />
                      <small>Material : php getmaterial()</small></td>
                    <td class="text-left">php getproductID</td>
                    <td class="text-left"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="1" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
                    <td class="text-right">php getpriceofproduct()</td>
                    <td class="text-right">calculated price = quantity * price</td>
                  </tr>
                </tbody>
              </table>
            </div>
          <h2 class="subtitle">What would you like to do next?</h2>
          <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Use Coupon Code</h4>
                </div>
                <div id="collapse-coupon" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <label class="col-sm-4 control-label" for="input-coupon">Enter your coupon here</label>
                    <div class="input-group">
                      <input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control" />
                      <span class="input-group-btn">
                      <input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..."  class="btn btn-primary" />
                      </span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Amount Summary</h4>
                </div>
                <div id="collapse-voucher" class="panel-collapse collapse in">
                  <table class="table table-bordered">
                <tr>
                  <td class="text-right"><strong>Sub-Total:</strong></td>
                  <td class="text-right">$940.00</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>Eco Tax (-2.00):</strong></td>
                  <td class="text-right">$4.00</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>VAT (20%):</strong></td>
                  <td class="text-right">$188.00</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>Total:</strong></td>
                  <td class="text-right">$1,132.00</td>
                </tr>
              </table>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.php" class="btn btn-default">Continue Shopping</a></div>
            <div class="pull-right"><a href="checkout.php" class="btn btn-primary">Checkout</a></div>
          </div>
        </div>
        <!--Middle Part End -->
        </div>
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