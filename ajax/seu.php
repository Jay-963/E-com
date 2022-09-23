<?php 
	include '../admin/config/conn.php';
		
	
	$selectVal = $_POST["selectVal"];
	$evid = $_POST["evid"];
	$usid = $_POST["usid"];
	$totprice = $_POST["totprice"];
	$prodquan = $_POST["prodquan"];
	
	// echo $userid;
	
	$date = date('y-m-d-H-i-s');
	
	$sql = "INSERT INTO `booking_table`(`book_id`, `User_id`, `event_id`, `seats_name`, `no_of_seats`, `total_price`, `status`, `createdDate`) VALUES ('', '".$usid."', '".$evid."', '".$selectVal."', '".$prodquan."', '".$totprice."', '1', '".$date."')";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	// $bid = mysqli_insert_id($conn);
	
?>