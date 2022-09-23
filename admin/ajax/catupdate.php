<?php  
	include '../config/conn.php';

	$uid = $_POST['c_uid'];
	$type = $_POST['c_type'];
	$image = $_FILES['c_image'];
	$img = $_POST['c_img'];
	
	$temp = $image['tmp_name'];
	// echo  $type;
	
	move_uploaded_file($temp, "../img/catimg/".$img);
	
		
	$sql = "UPDATE `cat_table` SET `cat_name` = '".$type."', `cat_image` = '".$img."' WHERE cat_id = '".$uid."' ";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	
?>