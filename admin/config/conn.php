<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "event";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// echo $conn;
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	// echo "Connected successfully";
?>