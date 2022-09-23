<?php 
	include '../config/connection.php';
	
	$Name = $_POST['c_Name'];
	$Image = $_FILES['c_img'];
	
	$temp = $Image['tmp_name'];
	
	$date = date('y-m-d-H-i-s');
	
	$filename = $date."photo.png";
	
	move_uploaded_file($temp, '../images/catimg/'.$filename);
	
	$sql = "INSERT INTO `catable`(`id`, `name`, `image`, `status`, `createdate`) VALUES ('', '".$Name."', '".$filename."', '1', '')";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
