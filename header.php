
<?php require("functions/function.php");
      include 'functions/dbconfig.php';
   ?>
<?php 
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
        // echo '<PRE> delete';
        //  echo $result1;
        // echo '</PRE>';
        setcookie("cart", $result1, time()+60*60*24*30);
        $urlRefresh = $_SERVER['REQUEST_URI'];
        echo "<script> setTimeout(\"location.href = '$urlRefresh' \", 150); </script>";
      }


         //updateCart
      if(isset($_POST['updateCart'])){
        $quants = $_POST['quants'];
        $prodId = $_POST['id'];

        $url = DEFAULT_WEB_PATH.API_PAGE.UPDATE_CART;

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
        echo '<PRE> update';
         echo $result1;
        echo '</PRE>';
        setcookie("cart", $result1, time()+60*60*24*30);
        $urlRefresh = $_SERVER['REQUEST_URI'];
        echo "<script> setTimeout(\"location.href = '$urlRefresh' \", 150); </script>";
  
          
      }

      //add to the cart
    if(isset($_POST['addToCart'])) {

      $url = DEFAULT_WEB_PATH.API_PAGE.ADD_TO_CART;
      $productid = $_GET['productid'];
      $productQuantity = $_POST['quantity'];
      //check first whether cart is details is present or not!.
      // echo '<PRE>';
      // echo $productid." ".$productQuantity;
      // echo '</PRE>';
      if(isset($_COOKIE['cart'])){
        // echo '<PRE>';
        // print_r($_COOKIE);
        // echo '</PRE>';
        $cartDetails = $_COOKIE['cart'];
        // // echo $cartDetails;
        
        $postfields = array('productid' => $productid, 'productQuantity' => $productQuantity, 'cartDetails' => $cartDetails );
      }
      else {
        // echo '<script> alert("cart is not there"); </script>';
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
        // echo '<PRE>';
        // print_r($result1);
        // echo '</PRE>';
        //setting the cookie here.
        setcookie("cart", $result1, time()+60*60*24*30);
        $urlRefresh = $_SERVER['REQUEST_URI'];
        echo "<script> setTimeout(\"location.href = '$urlRefresh' \", 150); </script>";
      
    }
   

      if(isset($_POST['search'])){
$url = DEFAULT_WEB_PATH.API_PAGE.RETRIEVE_SEARCH_RESULTSET;
$searchString = $_POST['searchString'];
$postfields = array('searchString' => $searchString);
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
        // echo '<PRE>';
        // echo $url."<br>";
        // echo $result;
        // echo '</PRE>';
        $array_assoc = json_decode($result, true);
        
          // echo '<PRE>';  
          
          // print_r($array_assoc);
          // echo "<br>".count($array_assoc);
          // echo '</PRE>';
      }

?>
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
            <?php 
              if($_SESSION["username"] === "") {
            ?>

              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>


              <?php } else { ?>

              <li style="padding-left: 4px; padding-right: 4px; font-style: bold;"><?php echo "Welcome ". "&nbsp;". $_SESSION["username"]; ?></li>
                 <li><a href="login.php?status=loggedout">Logout</a></li>
              
               <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>  
    <?php 
    $testArr = array();
    
    if(isset($_GET['clearCookie'])){
    if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000, '/');
    }
}
}
    $masterArray = array(); 
    
      if(isset($_COOKIE['cart'])){
        $testArray = array();
        $testArray = json_decode($_COOKIE['cart'], true);
        // echo '<PRE>';
        // print_r($testArray);
        // // echo "<br>". DEFAULT_WEB_PATH.API_PAGE."deleteFromCart&".$_SERVER['QUERY_STRING'];
        // echo '</PRE>'; 
        for($i = 0; $i < count($testArray); $i++) {
          $productId = $testArray[$i][0]['productId'];
          $result = $conn->query("Select * from products where productid = $productId");
          $uniqueProductDetailArray = array();
          $row = $result->fetch_assoc();
          array_push($uniqueProductDetailArray, $productId);
          array_push($uniqueProductDetailArray, $testArray[$i][0]['productQuantity']);
          array_push($uniqueProductDetailArray, $row['productname']);
          array_push($uniqueProductDetailArray, $row['cost']);
          array_push($uniqueProductDetailArray, $row['productimg']);
          array_push($uniqueProductDetailArray, $row['prodmaterial']);
          array_push($masterArray, $uniqueProductDetailArray);
        }
        // echo '<PRE>';
        // print_r($masterArray);
        // echo '</PRE>';
      }
      
    ?>
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="index.php"><img class="img-responsive" src="images/logo.png" title="furniturebazaar" alt="furniturebazaar" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <br><br><br>
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">

            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
              <span class="cart-icon pull-left flip"></span>
              <span id="cart-total"><?php echo  isset($testArray) ? count($testArray) : 0; ?>&nbsp; Item(s) - </span></button>
              <ul class="dropdown-menu">
                <li>
                  <table class="table">
                    <tbody>

                    <?php 
                      if(!isset($testArray)){ ?>
                        
                        <tr>
                        <td > Your Cart is Empty.</td>

                      </tr>


                     <?php 
                      }
                      else { 
                        //sum of the products.
                        $totalAmount = 0;
                    ?>
                      <?php for($i = 0; $i < count($masterArray); $i++){ ?>
                     <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                      <tr>

                        <td class="text-left"><a href='<?php echo DEFAULT_WEB_PATH."product.php?productid=".$masterArray[$i][0]; ?>' ><?php echo $masterArray[$i][2]; ?></a></td>
                        <input type="hidden" name="quants" value="<?php echo $masterArray[$i][1]; ?>" />
                          <input type="hidden" name="id" value="<?php echo $masterArray[$i][0]; ?>" />
                        <td class="text-right">x <?php echo $masterArray[$i][1]; ?></td>
                        <td class="text-right"><?php 
                        $totalAmount += $masterArray[$i][3]*$masterArray[$i][1];  
                        echo $masterArray[$i][3]*$masterArray[$i][1]; ?></td>
                        <td class="text-center">

                        <!--<a href="#"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></a>-->

                        
                        <button class="btn btn-danger btn-xs remove" title="Remove" onClick="" name="deleteFromCart" type="submit"><i class="fa fa-times"></i></button>
                        <!--<input type="submit" class="btn btn-danger btn-xs remove" name="deleteFromCart" value="x" ></input>-->
                       
                        </td>
                      </tr>
                      </form>
                      <?php } 
                      } ?>

                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right"><?php echo isset($totalAmount) ? $totalAmount : 0; ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="cart.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="<?php 

                    if(isset($_SESSION['username']) && $_SESSION['username'] != '') {
                      echo 'checkout.php';
                    }
                    else {
                      echo "login.php";
                    }

                    ?>" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                  </div>
                </li>
              </ul>
            </div>
       
          </div>
          <!-- Mini Cart End-->
          <!-- Search Start-->
          <form method="POST" action="<?php echo DEFAULT_WEB_PATH."searchResult.php"; ?>">
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="searchString" value="" placeholder="Search" class="form-control input-lg" style="color:#000000;" />
              <button type="submit" name="search" class="button-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
          <!-- Search End-->
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
            <?php  getcats(); ?>
            </li>
            <li class="custom-link-right"><a href="#" target="_blank"> Buy Now!</a></li>
          </ul>
        </div>
        </div>
      </nav> 
    <!-- Main Menu End-->
  </div>
