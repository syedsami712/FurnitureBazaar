<?php session_start(); ?>
<html>
<head>
<?php require("functions/cats.php"); ?>
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
<!--php get header-->
<?php include "header.php"; ?>

<!--Category page conatainer -->
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">Electronics</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Categories</h3>
          <div class="box-category">
           <ul id="cat_accordion">
              <?php getcats_category(); ?>
              </ul>
              </div>
          </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">php categoryname()</h1>
          <br />
          <div class="row products-category product-filter" id="grid-view">
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-220x330.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html"> Strategies for Acquiring Your Own Laptop </a></h4>
                    <p class="description"> Latest Intel mobile architecture
                      
                      Powered by the most advanced mobile processors from Intel, t..</p>
                    <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span></p>
                    <p>php stockStatus()</p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
<?php include "footer.php"; ?>

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