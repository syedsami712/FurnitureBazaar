<?php include 'functions/dbconfig.php';
	
	$functonName = $_GET['functionName'];

	function customerRegistration($conn, $firstName, $lastName, $email, $contact_no, $address1, $address2, $city, $state, $pin) {
		$result = $conn->prepare("insert into customers(Fname, Lname, email, contact_no, address1, address2, city, state, pin) VALUES (?,?,?,?,?,?,?,?)");
		$result->bind_param("ssssssss", $firstName, $lastName, $)
	}

?>
