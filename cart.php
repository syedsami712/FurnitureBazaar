<?php session_start(); 
  include 'GlobalVariables.php';
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
<?php 

// echo '<PRE>';
// print_r($masterArray);
// // echo "<br>".DEFAULT_WEB_PATH."products/".$masterArray[$i][4];
// echo '</PRE>';

?>
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

                  <?php 
                  $totalPrice = 0;
                  for($i = 0; $i < count($masterArray); $i++){ 

                  $totalPrice += $masterArray[$i][3]*$masterArray[$i][1];
                  ?>
                  <tr>
                    <td class="text-center"><a href="product.php"><img src='<?php echo DEFAULT_IMAGE_PATH."products/".$masterArray[$i][4]; ?>' alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" height="150" width="150" /></a></td>
                    <td class="text-left"><a href="product.php"><?php echo $masterArray[$i][2]; ?></a><br />
                      <!-- <small>Material : php getmaterial()</small> -->
                      <!-- <div itemprop="description" id="tab-description" class="tab-pane active">
                          <div>
                            <?php 
                              echo $masterArray[$i][6];
                            ?>
                          </div>
                       </div> -->

                      </td>
                    <td class="text-left"><?php echo $masterArray[$i][5]; ?></td>
                    <td class="text-left"><div class="input-group btn-block quantity">
                    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                    <input type="hidden" name="id" value="<?php echo $masterArray[$i][0]; ?>">
                        <input type="text" name="quants" value="<?php echo $masterArray[$i][1]; ?>" size="3" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" name="updateCart" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                        <button type="submit" data-toggle="tooltip" name="deleteFromCart" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div>
                        </form>
                        </td>
                    <td class="text-right"><?php echo $masterArray[$i][3]; ?></td>
                    <td class="text-right"><?php echo $masterArray[$i][3]*$masterArray[$i][1]; ?></td>
                  </tr>


                <?php } ?>
                </tbody>
              </table>
            </div>
          
          <!-- <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p> -->
          <div class="row">
            <!-- <div class="col-sm-6">
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
            </div> -->
            <div class="col-sm-6" style="float: right;">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Amount Summary</h4>
                </div>
                <div id="collapse-voucher" class="panel-collapse collapse in">
                  <table class="table table-bordered">
                <tr>
                  <td class="text-right"><strong>Sub-Total:</strong></td>
                  <td class="text-right"><?php echo "Rs.".(float)$totalPrice; ?></td>
                </tr>
                <tr>
                  <td class="text-right"><strong>VAT (12%):</strong></td>
                  <td class="text-right"><?php 
                      $VAT = (12/100)*$totalPrice;
                      echo "Rs.".$VAT;
                  ?></td>
                </tr>
                <tr>
                  <td class="text-right"><strong>Total:</strong></td>
                  <td class="text-right"><?php $grandTotal = $totalPrice + $VAT;
                  echo "Rs.". $grandTotal;
                   ?></td>
                </tr>
              </table>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.php" class="btn btn-default">Continue Shopping</a></div>
            <?php if(isset($_SESSION['userid']) && $_SESSION['username'] != ""){ ?>
            <div class="pull-right"><a href="checkout.php" class="btn btn-primary">Checkout</a></div>
            <?php } else { ?>
            <div class="pull-right"><a href="login.php" class="btn btn-primary">Checkout</a></div>
            <?php } ?>
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