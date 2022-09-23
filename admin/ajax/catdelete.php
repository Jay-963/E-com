<?php
	include '../config/conn.php';
	
	$id = $_POST['cat_id'];
	
	$sql = "DELETE FROM `cat_table` WHERE cat_id = '".$id."'";
	
	$query = mysqli_query($conn, $sql);
	
	echo $query;
?>