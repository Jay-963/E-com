<?php  
	include '../config/connection.php';

	$uid = $_POST['c_uid'];
	$Name = $_POST['c_Name'];
	
	
	
		
	$sql = "update catable set name='".$Name."' where id = '".$uid."' ";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	
?>