<?php
	include '../config/connection.php';
	
	$id = $_POST['id'];
	
	$sql = "delete from flipkart where id = '".$id."'";
	
	$query = mysqli_query($conn, $sql);
	
	echo $query;
?>