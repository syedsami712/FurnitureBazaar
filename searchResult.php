<?php session_start();

//includes 
include 'GlobalVariables.php';
include 'functions/dbconfig.php';

 ?>


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


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


  

</head>

<body>
<!--php get header-->
<?php include "header.php"; ?>
<?php 
//php part of the code


?>

<!--Category page conatainer -->
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->

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
          <h1 class="title"> </h1>
          <br />
          <div class="row products-category product-filter" id="grid-view">
           <?php if(isset($array_assoc)) { ?>
           <?php for($i = 0; $i < count($array_assoc['products']); $i++) { ?>
            <div class="product-layout product-list col-md-4 col-xs-12">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
              <div class="product-thumb">
               <?php  $returnedImagePath =  DEFAULT_IMAGE_PATH.'products/'.$array_assoc['products'][$i]['productimg'];
                      $defaultImagePath =   DEFAULT_IMAGE_PATH.'products/logo.png';
                      $image = $returnedImagePath;
                      //echo '<PRE>'. $_SERVER[$returnedImagePath] . '</PRE>';
               ?>
                <div class="image"><a href="product.php?productid=<?php echo $array_assoc['products'][$i]['productid']; ?>"><img src='<?php echo $image; ?>' alt="No Image" title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.php?productid=<?php echo $array_assoc['products'][$i]['productid']; ?>"> <?php echo $array_assoc['products'][$i]['productname']; ?></a></h4>
                    
                    <p class="price"> <span class="price-new">Rs.<?php echo $array_assoc['products'][$i]['cost']; ?></span>&nbsp; &nbsp; &nbsp;  <span class="price-old">Rs.<?php echo $array_assoc['products'][$i]['mrp']; ?></span></p>
                    <p><?php 

                        $stockVal = $array_assoc['products'][$i]['availablestock'];
                        $isInStock = $stockVal > 0 ? "<span style='font-size:12px; color:#008000;'>In Stock</b>" : "<span style='font-size:12px; color:#b30000;'>Out Of Stock</b>";
                        echo $isInStock;
                    ?></p>
                  </div>
                  <div class="button-group">
                   <input type = "hidden" name="productId" id="productId" class="ProductId" value="<?php echo $array_assoc['products'][$i]['productid']; ?>" />
                   <?php $productid = $array_assoc['products'][$i]['productid']; ?>
                    <a href="product.php?productid=<?php echo $array_assoc['products'][$i]['productid']; ?>"><button type="button" class="btn-primary"   value="Add to Cart" >View Product</button></a>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <?php } ?>
            <?php } 
            else { ?>
              <div class=" col-md-12 col-xs-12">
            
              
              
               
                
                  
                  <?php echo "please enter proper search query"; ?>
               
          
            </div>
            <?php }
            ?>
          </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>

<?php include "footer.php"; ?>


  <!--  -->
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