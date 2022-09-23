<?php  
	include '../config/conn.php';

	$uid = $_POST['t_uid'];
	$Name = $_POST['t_Name'];
	$Email = $_POST['t_Email'];
	$Mobile = $_POST['t_Mobile'];
	$Address = $_POST['t_Address'];
	$Password = $_POST['t_Password'];
	$image = $_FILES['t_image'];
	$img = $_POST['t_img'];
	
	$temp = $image['tmp_name'];
	
	move_uploaded_file($temp, '../img/limg/'.$img);
		
		
	$sql = "update user_table set name='".$Name."', email='".$Email."', mobile='".$Mobile."', address='".$Address."', `image`='".$img."', password='".$Password."' where user_id = '".$uid."' ";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	
?>