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
	$aid = $_POST['c_aid'];
	$img2 = $_POST['c_img2'];
	
	
	
	
	
	$temp = $List_Image['tmp_name'];
	
	move_uploaded_file($temp, '../img/artimg/'.$img2);
	
	
	$sql = "UPDATE `artists` SET `image`='".$img2."',`name`='".$Name."',`nick_name`='".$nick."',`profile`='".$profile."',`born`='".$dob."',`address`='".$address."',`about`='".$about."',`career`='".$career."' WHERE art_id = '".$aid."'";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
