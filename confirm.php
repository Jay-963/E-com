<?php 	
	include 'admin/config/connection.php';
	
	$userid = $_GET['uid'];
	$orderid = $_GET['oid'];
	
	$sql = "UPDATE `ordertable` SET `confirm`='1' WHERE order_id = $orderid";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>