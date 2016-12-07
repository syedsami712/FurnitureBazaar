<?php session_start(); 
      include "GlobalVariables.php" ;
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

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#SelfPick').on('change', function(){
      $.ajax({
      type: "POST",
      url : "deliveryModeResponse.php",
      data: {deliveryMode:'0'},
      dataType: 'text',
      success:function(data){
       // Test what is returned from the server
         var deliveryMode = data;
         window.location.href = "http://localhost:8012/FurnitureBazaar/checkout.php?deliveryMode=" + data;
      }
    }); 
    });

      $('#InstallOnly').on('change', function(){
      $.ajax({
      type: "POST",
      url : "deliveryModeResponse.php",
      data: {deliveryMode:'300'},
      dataType: 'text',
      success:function(data){
       // Test what is returned from the server
         var deliveryMode = data;
         window.location.href = "http://localhost:8012/FurnitureBazaar/checkout.php?deliveryMode=" + data;
      }
    }); 
    });

      $('#DeliveryAndInstall').on('change', function(){
      $.ajax({
      type: "POST",
      url : "deliveryModeResponse.php",
      data: {deliveryMode:'700'},
      dataType: 'text',
      success:function(data){
       // Test what is returned from the server
         var deliveryMode = data;
         window.location.href = "http://localhost:8012/FurnitureBazaar/checkout.php?deliveryMode=" + data;
      }
    }); 
    });
                    
  // });
   });
</script>
</head>
<body>
<?php include "header.php" ; ?>
<?php 
// echo '<PRE>';
// print_r($masterArray);
// echo '</PRE>';

?>

<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->

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
                ?>
                  <div class="panel-body"
                        <fieldset id="account">
                          <div class="form-group">
                            <label for="input-payment-firstname" class="control-label">First Name</label>

                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="First Name" value="<?php echo $array_assoc[0]['Fname'] ?>" name="firstname" readonly>
                          </div>
                          <div class="form-group">
                            <label for="input-payment-lastname" class="control-label">Last Name</label>
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
          <div class="buttons">
                  <div class="pull-left"><a href="myaccount.php" class="btn btn-primary">Account Settings</a></div>
                
              </div>
            </div>
    </div>
</div> <!-- col sm4 -->       
</div> <!-- row -->
<div class="col-sm-8">
              <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-truck"></i> Delivery Method</h4>
                    </div>
                      <div class="panel-body">
                        <p>Please select the preferred shipping method to use on this order.</p>
                        <form method="POST" id="myForm" name="deliveryTypeForm" action="?">
                        <div class="radio">
                        <?php if(isset($_GET['deliveryMode']) && $_GET['deliveryMode'] == "0") { ?>
                          <label>
                            <input type="radio" id="SelfPick" name="delivery" value="0" checked="true" />
                            Self Pickup and installation - No Charges</label>
                        <?php } else { ?>
                          <label>
                            <input type="radio" id="SelfPick" name="delivery" value="0"  />
                            Self Pickup and installation - No Charges</label>
                        <?php } ?>
                        </div>


                        
                        <div class="radio" />
                        <?php if(isset($_GET['deliveryMode']) && $_GET['deliveryMode'] == "300"){ ?>
                          <label>
                            <input type="radio" id="InstallOnly" name="delivery" value="300" checked="true" />
                            Installation Only - Rs.300</label>
                            <?php } else { ?>

                            <label>
                            <input type="radio" id="InstallOnly" name="delivery" value="300" />
                            Installation Only - Rs.300</label>
                            <?php  } ?>
                        </div>


                        <div class="radio" />
                        <?php if(isset($_GET['deliveryMode']) && $_GET['deliveryMode'] == "300"){ ?>
                          <label>
                            <input type="radio" id="DeliveryAndInstall" name="delivery" value="700" >
                            Delivery and Installaion - Rs.700</label>
                            <?php } else {  ?>

                            <label>
                            <input type="radio" id="DeliveryAndInstall" name="delivery" value="700" >
                            Delivery and Installaion - Rs.700</label>
                            <?php } ?>
                        </div>
                        </form>
                      </div>
                      
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                    </div>
                      <div class="panel-body">
                        <p>Please select the preferred payment method to use on this order.</p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="payment">
                            Cash On Delivery</label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="payment">
                            Card on Delivery</label>
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
                            <?php $subtotal = 0; ?>
                            <?php for($i = 0; $i < count($masterArray); $i++) {

                              ?>
                              <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                              <tr>
                                <td class="text-center"><a href="product.php"><img src="<?php echo DEFAULT_IMAGE_PATH."products/".$masterArray[$i][4]; ?>" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail" height="75" width="75"></a></td>
                                <td class="text-left"><a href="<?php echo DEFAULT_WEB_PATH."product.php?productid=".$masterArray[$i][0]; ?>" ><?php echo $masterArray[$i][2]; ?></a></td>
                                <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="hidden" name="id" value="<?php echo $masterArray[$i][0]; ?>" />
                                    <input type="text" name="quants" value="<?php echo $masterArray[$i][1]; ?>" size="1" class="form-control">
                                    <span class="input-group-btn">
                                    <button type="submit" data-toggle="tooltip" name="updateCart" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                    <button type="submit" data-toggle="tooltip" name="deleteFromCart" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                                    </span></div></td>
                                <td class="text-right"><?php echo $masterArray[$i][3]; ?></td>
                                <td class="text-right"><?php echo $masterArray[$i][3]*$masterArray[$i][1]; ?></td>
                              </tr>
                              </form>
                              <?php $subtotal =+ $masterArray[$i][3] * $masterArray[$i][1]; ?>

                             <?php } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                                <td class="text-right"><?php echo $subtotal; ?></td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                                <td class="text-right"><?php 
                                $mode = 0;
                                echo $mode =  isset($_GET['deliveryMode']) ? $_GET['deliveryMode'] : 0; ?></td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Total:</strong></td>
                                <td class="text-right"><?php echo $mode + $subtotal; ?></td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
                    </div>
                      <div class="panel-body">
                        <textarea rows="4" class="form-control" id="confirm_comment" name="comments"></textarea>
                        <br>
                        <label class="control-label" for="confirm_agree">
                          <input type="checkbox" checked="checked" value="1" class="validate required" id="confirm_agree" name="confirmagree">
                          <span>I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a></span> </label>
                        <div class="buttons">
                          <div class="pull-right">
                            <input type="submit" class="btn btn-primary" value="Confirm Order" name="submit">
                          </div>
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
                         print('<script>alert("Please select a Payment method. ");</script>');
                       }
                   }
                   else
                   {
                     print('<script>alert("Please select a delivery method. ");</script>');
                   }
                }
            ?>
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
