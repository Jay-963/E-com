<?php 
	include '../admin/config/conn.php';
	
	$Name = $_POST['t_name'];
	$Email = $_POST['t_Email'];
	$Mobile = $_POST['t_Mobile'];
	$Image = $_FILES['t_image'];
	$Password = $_POST['t_Password'];
	
	$temp = $Image['tmp_name'];
	
	$date = date('y-m-d-H-i-s');
	
	$filename = $date."photo.png";
	
	move_uploaded_file($temp, '../admin/img/limg/'.$filename);
	
	$sql = "INSERT INTO `user_table`(`user_id`, `name`, `email`, `mobile`, `address`, `image`, `password`, `status`, `createdDate`) VALUES  ('', '".$Name."', '".$Email."', '".$Mobile."', '', '".$filename."', '".MD5($Password)."', '1', '".$date."')";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
