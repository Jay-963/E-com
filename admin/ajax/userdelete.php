<?php
	include '../config/conn.php';
	
	$id = $_POST['user_id'];
	
	$sql = "DELETE FROM `user_table` WHERE user_id = '".$id."'";
	
	$query = mysqli_query($conn, $sql);
	
	echo $query;
?>