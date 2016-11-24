<?php
	$dbhost="localhost";
	$username="root";
	$pwd="";
	$mydb="furniture_shop";
	$error_msg="Error in Connection";
	//step 1: connect to server
	global $conn;
	$conn=@mysql_connect($dbhost, $username, $pwd) or die($error_msg);
	// echo "Successfully Connected to Server<br>";
	//step 2: connect to database
	@mysql_select_db($mydb, $conn) or die($error_msg);
	// echo "Successfully Connected to DB";
?>