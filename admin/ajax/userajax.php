<?php 
	include '../config/connection.php';
	
	$Name = $_POST['c_Name'];
	$Email = $_POST['c_Email'];

	$Mobile = $_POST['c_Mobile'];
	$Address = $_POST['c_Address'];
	$Password = $_POST['c_Password'];
	
	
	
	$sql = "INSERT INTO `usertable`(`id`, `name`, `email`, `mobile`, `address`, `password`, `status`, `createdDate`) VALUES  ('', '".$Name."', '".$Email."', '".$Mobile."', '".$Address."', '".MD5($Password)."', '', '')";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
