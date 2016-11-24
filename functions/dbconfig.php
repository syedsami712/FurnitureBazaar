<?php
	$serverName="localhost";
	$username="root";
	$password="";
	$databaseName="furniture_shop";
	
	//step 1: connect to server
	global $conn;
$conn =  new mysqli($serverName, $username, $password, $databaseName);
if ($conn->connect_error) {
    die('Could not connect: ' . mysqli_error());
}
	// echo "Successfully Connected to DB";
?>