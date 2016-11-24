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

	switch ($functionName) {
		case 'retrieveProductDetails':
			if(isset($_POST['productid'])){
			echo retrieveProductDetails($conn, $_POST['productid']);
		}
		else {
			echo json_encode(array('Result' => 'Failed'));
			break;
		}
		
		default:
			# code...
			break;
	}

?>
