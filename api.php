<?php include 'functions/dbconfig.php';	
	
	$functionName = $_GET['functionName'];

	function retrieveProductDetails($conn, $productId){
		$result = $conn->query("Select * from products where productid = $productId");
		$resultSet = array();
		while ($row = $result->fetch_assoc()) {
			array_push($resultSet, $row);
		}

		return json_encode($resultSet);
	}

	function retrieveUserDetailsforUpdate($conn,$userid){
		$result = $conn->query("select * from customers where uid = $userid");
		$resultSet = array();
		while($row = $result->fetch_assoc())
		{
			array_push($resultSet,$row);
		}	
		return json_encode($resultSet);
	}

	function retrieveAllUsersDetails($conn){
		$result = $conn->query("select * from customers ");
		$resultSet = array();
		while($row = $result->fetch_assoc())
		{
			array_push($resultSet,$row);
		}	
		return json_encode($resultSet);
	}

	function retrieveProductsDetailsWithRespectToCategoryId($conn, $categoryId, $subCategoryId = 0){
		//getting category name
		$getCategory = $conn->query("Select Category_Name from category where ID = $categoryId");
		$categoryName = $getCategory->fetch_assoc();
		$subCategoryName = "";

		if($subCategoryId != 0) {
			//getting sub category name
			$getSubCategory = $conn->query("Select sub_category from sub_categories where ID = $subCategoryId AND categoryID = $categoryId");
			$subCategoryArray = $getSubCategory->fetch_assoc();
			$subCategoryName = $subCategoryArray['sub_category'];
			
			$result = $conn->query("Select * from products product, productstock stock where product.categoryid=$categoryId AND product.sub_categoryid=$subCategoryId AND stock.productid = product.productid ");

		}
		else {
			$result = $conn->query("Select * from products product, productstock stock where categoryid=$categoryId AND stock.productid = product.productid ");
		}

		$resultSet = array();
		while($row = $result->fetch_assoc()) {
			array_push($resultSet, $row);
		}

		return json_encode(array("categoryName" => $categoryName['Category_Name'], "subCategoryName" => $subCategoryName, "products"=>$resultSet));

	}



	function retrieveSearchDetails($conn, $searchString) {
		$result = $conn->query("Select * from products where tags LIKE '%$searchString%' ");
		$resultSet = array();
		while($row = $result->fetch_assoc()) {
			array_push($resultSet, $row);
		}
		return json_encode($resultSet);

	}
	function addProductToCart($conn, $productId, $productQuantity, $cartDetails = "") {
		//if cart is not set then set the cart.

		if($cartDetails === "") {
			$product = array(array("productId" => $productId, "productQuantity" => $productQuantity));
			$cartProducts =array($product);
			$cartProductToJsonString = json_encode($cartProducts);
			//setcookie("cart", $cartProductToJsonString,time()+60*60*24*30);
			return $cartProductToJsonString;
			}
		else {
			
			$cartArray = json_decode($cartDetails, true);
			$product = array(array("productId" => $productId, "productQuantity" => $productQuantity));
			array_push($cartArray, $product);
			return json_encode($cartArray);

		}
	}


	switch ($functionName) {
		case 'retrieveProductDetails':
			if(isset($_POST['productid'])){
			echo retrieveProductDetails($conn, $_POST['productid']);
		}
		else {
			echo json_encode(array('Result' => 'Failed'));
			
		}
		break;

		case 'retrieveProductsDetailsWithRespectToCategoryId' :
			if(isset($_POST['categoryId'])){

				if(isset($_POST['subCategoryId']) && $_POST['subCategoryId'] != 0){
				echo retrieveProductsDetailsWithRespectToCategoryId($conn, $_POST['categoryId'], $_POST['subCategoryId']);
				}
				else {
					echo retrieveProductsDetailsWithRespectToCategoryId($conn, $_POST['categoryId']);
				}
			}else {
				echo json_encode(array('Result' => 'Failed'));
			}

		break;

		case 'retrieveUserDetailsforUpdate' :
			if(isset($_POST['uid'])){
				echo retrieveUserDetailsforUpdate($conn,$_POST['uid']);
			}
			break;

		case 'retrieveSearchDetails' :
		if(isset($_POST['searchString'])){
			$searchString = $_POST['searchString'];
			$searchString = preg_replace('/\s+/', ",", $searchString);
			echo retrieveSearchDetails($conn, $searchString);
		}

<<<<<<< HEAD
		case 'addProductToCart' :
				$productid = $_POST['productid'];
				$productQuantity = $_POST['productQuantity'];
				if(!isset($_POST['cartDetails'])){
				echo addProductToCart($conn, $productid, $productQuantity);
				}
				else {
					$jsonString = $_POST['cartDetails'];
					echo addProductToCart($conn, $productid, $productQuantity, $jsonString);
					// echo '<PRE>'; print_r(json_decode($jsonString)); echo '</PRE>';
					// echo $jsonString;



				}
			break;
=======
		case 'retrieveAllUsersDetails' :
			echo retrieveAllUsersDetails($conn);
>>>>>>> 9fe0c24b5c6f26f66d02cc4cdd14a16daa4ac0b4

		default:
			# code...
			break;
	}

?>
