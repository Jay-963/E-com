<?php 
	include '../admin/config/conn.php';
		
	$Total = $_POST["c_price"];
	$prodquan = $_POST["c_prodquan"];
	
	// echo $userid;
	
	$date = date('y-m-d-H-i-s');
	
	$sql = "INSERT INTO `booking_table`(`book_id`, `User_id`, `event_id`, `seats_name`, `no_of_seats`, `total_price`, `status`, `createdDate`) VALUES ('', '', '', '', '".$prodquan."', '".$Total."', '1', '".$date."')";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	// $bid = mysqli_insert_id($conn);
	
?>