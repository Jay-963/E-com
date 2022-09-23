<?php 
	include '../config/conn.php';
	
	$Name = $_POST['c_Name'];
	$nick = $_POST['c_nick'];
	$profile = $_POST['c_profile'];
	$dob = $_POST['c_dob'];
	$address = $_POST['c_address'];
	$about = $_POST['c_about'];
	$career = $_POST['c_career'];
	$List_Image = $_FILES['c_List_Image'];
	
	$temp = $List_Image['tmp_name'];
	
	$date = date('y-m-d-H-i-s');
	
	$filename = $date."photo.png";
	
	
	move_uploaded_file($temp, '../img/artimg/'.$filename);
	
	
	$sql = "INSERT INTO `artists`(`art_id`, `image`, `name`, `nick_name`, `profile`, `born`, `address`, `about`, `career`, `status`, `datetime`) VALUES ('', '".$filename."', '".$Name."', '".$nick."', '".$profile."', '".$dob ."', '".$address ."', '".$about."', '".$career ."', '1', '".$date."')";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
