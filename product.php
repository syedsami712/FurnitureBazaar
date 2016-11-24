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
<body>
<?php include "header.php"; ?>
<div id="container">
    <div class="container">
    	<br/>
        <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/Product">
            <h1 class="title" itemprop="name">php get productname()</h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="image/product/macbook_air_1-350x525.jpg" title="Laptop Silver black" alt="Laptop Silver black" data-zoom-image="image/product/macbook_air_1-600x900.jpg" /> </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>Material:</b> <a href="#"><span itemprop="brand">php getmaterial()</span></a></li>
                  <li><b>Product Code:</b> <span itemprop="mpn">php getproductcode()</span></li>
                </ul>
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="price-old">php mrp()</span> <span itemprop="price">php cost()<span itemprop="availability" content="In Stock"></span></span></li>
                  <li></li>
                </ul>
                <div id="product">
                  <div class="cart">
                    <div>
                      <div class="qty">
                        <label class="control-label" for="input-quantity">Qty</label>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>
                      <button type="button" id="button-cart" class="btn btn-primary btn-lg">Add to Cart</button>
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
                  <p><b>Get bold legend</b></p>
                  <p>Description data to get from the Database</p>
                  <p><b>Get bold legend</b></p>
                  <p>Description data to get from the Database</p></p>
                  <p><b>Get bold legend</b></p>
                  <p>Description data to get from the Database</p>
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