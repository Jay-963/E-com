<?php  
	include '../config/connection.php';

	$uid = $_POST['c_uid'];
	$Name = $_POST['c_Name'];
	$Email = $_POST['c_Email'];
	$Mobile = $_POST['c_Mobile'];
	$Address = $_POST['c_Address'];
	$Password = $_POST['c_Password'];
	
	
		
	$sql = "update usertable set name='".$Name."', email='".$Email."', mobile='".$Mobile."', address='".$Address."', password='".$Password."' where id = '".$uid."' ";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	
?>