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
	function retriveDataForOrders($conn){
		$result=$conn->query('SELECT orders.orderID, customers.uid,customers.Fname, customers.contact_no,customers.address1,orders.total_mrp,orders.total_cost,orders.payment_type,orders.delivery_method FROM orders INNER JOIN customers ON orders.uid=customers.uid;');
		$resultSet = array();
		while($row=$result->fetch_assoc()){
			array_push($resultSet,$row);
		}
		return json_encode($resultSet);
	}
	function retriveUserDetailsWithRespectToOrderID($conn,$orderID){
		$result=$conn->query("SELECT orders.orderID, customers.Fname,customers.Lname,customers.email,customers.contact_no,customers.address1,customers.city,customers.state,customers.pin,customers.address2,orders.total_mrp,orders.total_cost,orders.payment_type,orders.delivery_method,orders.comments FROM orders INNER JOIN customers ON orders.uid=customers.uid where orderID=$orderID");
		$resultSet = array();
		while($row=$result->fetch_assoc()){
			array_push($resultSet,$row);
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
	function retrievecategories($conn){
		$result = $conn->query("select * from category");
		$resultSet = array();
		while($row=$result->fetch_assoc())
		{
			array_push($resultSet,$row);
		}
		return json_encode($resultSet);
	}
	function retreiveSubCategoriesWithRespectToCategoryID($conn,$categoryid){
		$result = $conn->query("select * from sub_categories where categoryID = $categoryid");
		$resultSet = array();
		while($row=$result->fetch_assoc())
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
		$result = $conn->query("Select * from products product, productstock stock where stock.productid = product.productid and tags LIKE '%$searchString%'  ");
		$resultSet = array();
		while($row = $result->fetch_assoc()) {
			array_push($resultSet, $row);
		}
		return json_encode(array("products" => $resultSet));
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
			$isProductPresent = false;
			$cartArray = json_decode($cartDetails, true);
			for($i = 0; $i < count($cartArray); $i++) {
				if($cartArray[$i][0]['productId'] == $productId){
					$cartArray[$i][0]['productQuantity'] += $productQuantity;
					$isProductPresent = true;
					break;
				}
			}
			if($isProductPresent){
				return json_encode($cartArray);
			}
			else {
				$product = array(array("productId" => $productId, "productQuantity" => $productQuantity));
			array_push($cartArray, $product);
			return  json_encode($cartArray);
			}
			
		}
	}


	function deleteFromCart($conn, $productId, $productQuantity, $cartDetails) {
		$cartArray = json_decode($cartDetails, true);
		$resultToEncode = array();
		
		//make the product into json string.
		$product = array(json_encode(array("productId" => $productId, "productQuantity" => $productQuantity)));
		//convert the value inside each cart to json string.
		for($i =0 ; $i<count($cartArray); $i++){
			$cartArray[$i] = json_encode($cartArray[$i][0]);
		}
		
		//take the difference and store it in result
		$result = array_diff($cartArray, $product);
		
		//re arranging all the key values to 0, 1, 2, ...
			foreach($result as $key => $value){
				array_push($resultToEncode, array(json_decode($result[$key], true)));
			}
		//all this because of the notice on array convert string something.
		return json_encode($resultToEncode);
	}


	function updateCart($conn, $productId, $productQuantity = 0, $cartDetails) {
		$cartArray = json_decode($cartDetails, true);

		for($i = 0; $i < count($cartArray); $i++) {
			if($cartArray[$i][0]['productId'] == $productId) {
				$cartArray[$i][0]['productQuantity'] = $productQuantity;
			}
		}
		return json_encode($cartArray);
	}

	function retreiveOrderItemsWithRespectToOrderItem($conn,$orderID){
		$result=$conn->query("SELECT orderitems.orderID,orderitems.productID,orderitems.quantity,products.productname,products.productimg,products.mrp,products.cost FROM orderitems INNER JOIN products ON orderitems.productID=products.productid WHERE orderID=$orderID");
		$resultSet = array();
		while($row=$result->fetch_assoc()){
			array_push($resultSet,$row);
		}
		return json_encode($resultSet);

	}

	function retreiveProductsDetailsAndStock($conn){
		$result = $conn->query('SELECT products.productid,products.mrp,products.cost,products.productname,productstock.availablestock FROM products INNER JOIN productstock ON products.productid=productstock.productid');
		$resultSet = array();
		while($row=$result->fetch_assoc()){
			array_push($resultSet,$row);
		}
		return json_encode($resultSet);
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
		break;
		case 'addProductToCart' :
				$productid = isset($_POST['productid']) ? $_POST['productid'] : 0;
				$productQuantity = isset($_POST['productQuantity']) ? (int) $_POST['productQuantity'] : 0;
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
		case 'deleteFromCart':
			$productid = $_POST['productid'];
			$productQuantity = (int) $_POST['productQuantity'];
			if(!isset($_POST['cartDetails'])){
				//something went wrong.
				}
				else {
					$jsonString = $_POST['cartDetails'];
					echo deleteFromCart($conn, $productid, $productQuantity, $jsonString);
					
				}
			
			break;

		case 'updateCart' :
			$productid = $_POST['productid'];
			$productQuantity = (int) $_POST['productQuantity'];
			if(!isset($_POST['cartDetails'])){
				//something went wrong.
				}
				else {
					$jsonString = $_POST['cartDetails'];
					print_r(updateCart($conn, $productid, $productQuantity, $jsonString));
					
				}
			break;


		case 'retrieveAllUsersDetails' :
				echo retrieveAllUsersDetails($conn);
			break;
		case 'retrievecategories' :
				echo retrievecategories($conn);
			break;
		case 'retreiveSubCategoriesWithRespectToCategoryID' :
				$categoryId = isset($_POST['catid']) ? $_POST['catid'] : 0;
				echo retreiveSubCategoriesWithRespectToCategoryID($conn,$categoryId);
			break;
		case 'retriveDataForOrders':
				echo retriveDataForOrders($conn);
			break;
		case 'retriveUserDetailsWithRespectToOrderID':
				$orderID = $_POST['orderID'];
				echo retriveUserDetailsWithRespectToOrderID($conn,$orderID);
			break;


		case 'retreiveOrderItemsWithRespectToOrderItem':
				$orderID = $_POST['orderID'];
				echo retreiveOrderItemsWithRespectToOrderItem($conn,$orderID);
			break;

		case 'retreiveProductsDetailsAndStock' :
				echo retreiveProductsDetailsAndStock($conn);
			break;	


		default:
			# code...
			break;
	}
?>
