
<?php require("functions/function.php"); ?>
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
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
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
            <div id="logo"><a href="index.php"><img class="img-responsive" src="images/logo.png" title="furniturebazaar" alt="furniturebazaar" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
              <span class="cart-icon pull-left flip"></span>
              <span id="cart-total">SHOW CART DETAILS HERE</span></button>
              <ul class="dropdown-menu">
                <li>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-left"><a href="product.html">get cartitemname()</a></td>
                        <td class="text-right">x prodquantity</td>
                        <td class="text-right">Price</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <tr>
                        <td class="text-left"><a href="product.html">get cartitemname()</a></td>
                        <td class="text-right">x prodquantity</td>
                        <td class="text-right">Price</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="" type="button"><i class="fa fa-times"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right">get cartprice()</td>
                        </tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">get cartprice()/td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="checkout"><a href="cart.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp;<a href="checkout.html" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a></p>
                  </div>
                </li>
              </ul>-->
            </div>
          </div>
          <!-- Mini Cart End-->
          <!-- Search Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" />
              <button type="button" class="button-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
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