<?php session_start();

//inlcudes
include 'GlobalVariables.php';
include 'functions/dbconfig.php';

    //add to the cart
    if(isset($_POST['addToCart'])) {
      $url = DEFAULT_WEB_PATH.API_PAGE.ADD_TO_CART;
      $productid = $_GET['productid'];
      $productQuantity = $_POST['quantity'];

      //check first whether cart is details is present or not!.
      if(isset($_COOKIE['cart'])){
        $cartDetails = $_COOKIE['cart'];
        // echo $cartDetails;
        
        $postfields = array('productid' => $productid, 'productQuantity' => $productQuantity, 'cartDetails' => $cartDetails );
      }
      else {
      $postfields = array('productid' => $productid, 'productQuantity' => $productQuantity);
    }
      $ch = curl_init();
        $options = array (
                  CURLOPT_URL => $url,
                  CURLOPT_POST => 1,
                  CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_RETURNTRANSFER => true
          );
        curl_setopt_array($ch, $options);
        $result1 = curl_exec($ch);
        curl_close($ch);
        //setting the cookie here.
        setcookie("cart", $result1, time()+60*60*24*30);
        $urlRefresh = $_SERVER['REQUEST_URI'];
        echo "<script> setTimeout(\"location.href = '$urlRefresh' \", 150); </script>";
      
    }


    //delete from the cart.
    if(isset($_POST['deleteFromCart'])){

        $quants = $_POST['quants'];
        $prodId = $_POST['id'];

        $url = DEFAULT_WEB_PATH.API_PAGE.DELETE_FROM_CART;

      //check first whether cart is details is present or not!.
      if(isset($_COOKIE['cart'])){
        $cartDetails = $_COOKIE['cart'];
        // echo $cartDetails;
        
        $postfields = array('productid' => $prodId, 'productQuantity' => $quants, 'cartDetails' => $cartDetails );
      }
      else {
      //something went wrong
    }
      $ch = curl_init();
        $options = array (
                  CURLOPT_URL => $url,
                  CURLOPT_POST => 1,
                  CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_RETURNTRANSFER => true
          );
        curl_setopt_array($ch, $options);
        $result1 = curl_exec($ch);
        curl_close($ch);
        // echo '<PRE>';
        //  echo $result1;
        // echo '</PRE>';
        setcookie("cart", $result1, time()+60*60*24*30);
        $urlRefresh = $_SERVER['REQUEST_URI'];
        echo "<script> setTimeout(\"location.href = '$urlRefresh' \", 150); </script>";
      }

  ?>

<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Furniture Bazaar-Registration</title>
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
<?php 
  // echo '<PRE>'; 
  // print_r($_COOKIE);
  // echo '</PRE>';
  //php section for retrieving product details.
$url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_PRODUCTS_DETAILS;
$productid = $_GET['productid'];
$postfields = array('productid' => $productid);
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
<body>
<?php include "header.php"; ?>
<div id="container">
    <div class="container">
    	<br/>
        <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/Product">
            <h1 class="title" itemprop="name"><?php echo  $array_assoc[0]['productname']; ?></h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="<?php echo  DEFAULT_IMAGE_PATH."products/".$array_assoc[0]['productimg']; ?>" title="Laptop Silver black" alt="Laptop Silver black" data-zoom-image="" /> </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>Material:</b> <a href="#"><span itemprop="brand"><?php echo $array_assoc[0]['prodmaterial']; ?></span></a></li>
                  <li><b>Product Code:</b> <span itemprop="mpn"><?php echo $array_assoc[0]['productid']; ?></span></li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="price-old"><?php echo $array_assoc[0]['mrp']; ?></span> <span itemprop="price"><?php echo $array_assoc[0]['cost']; ?><span itemprop="availability" content="In Stock"></span></span></li>
                  <li></li>
                </ul>
                <div id="product">
                  <div class="cart">
                    <div>   
                    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                      <div class="qty">
                        <label class="control-label" for="input-quantity">Qty</label>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>

                      <input type="submit" name="addToCart" id="button-cart" class="btn btn-primary btn-lg" value="Add To Cart" />
                      </form>
                    </div>
              </div>
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <?php 
                    echo $array_assoc[0]['productdesc'];
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
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