<?php 

$productDetails = array(array("productId" => 1, "productName" => "sofa"), 
	array("productId" => 1, "productName" => "sofa"),
	array("productId" => 1, "productName" => "sofa"),
	array("productId" => 1, "productName" => "sofa"),
	array("productId" => 1, "productName" => "sofa"));

$cartArray = array("Cart" => $productDetails);


echo '<PRE>';
echo json_encode($cartArray);
echo '</PRE>';
?>