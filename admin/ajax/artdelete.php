<?php
	include '../config/conn.php';
	
	$id = $_POST['art_id'];
	
	$sql = "DELETE FROM `artists` WHERE art_id = '".$id."'";
	
	$query = mysqli_query($conn, $sql);
	
	echo $query;
?>