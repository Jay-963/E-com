<?php 
	include '../config/conn.php';
	
	$name = $_POST['t_name'];
	$image = $_FILES['t_image'];
	
	$temp = $image['tmp_name'];
	
	$date = date('y-m-d-H-i-s');
	
	$filename = $date."photo.png";
	
	move_uploaded_file($temp, '../img/catimg/'.$filename);
	
	$sql = "INSERT INTO `cat_table`(`cat_id`, `cat_name`, `cat_image`, `status`, `create_date`) VALUES ('', '".$name."', '".$filename."', '1', '".$date."' )";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
