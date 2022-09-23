<?php
	include '../config/conn.php';
	
	$id = $_POST['event_id'];
	
	$sql = "DELETE FROM `event_table` WHERE event_id = '".$id."'";
	
	$query = mysqli_query($conn, $sql);
	
	echo $query;
?>