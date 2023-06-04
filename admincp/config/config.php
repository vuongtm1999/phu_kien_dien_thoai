<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$csdl = "phu_kien_shop";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $csdl);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	mysqli_select_db($conn, $csdl);
?>