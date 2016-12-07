<?php 
$deliveryMode = "";
if(isset($_POST['deliveryMode'])){
	$deliveryMode = $_POST['deliveryMode'];
	echo $deliveryMode;
}