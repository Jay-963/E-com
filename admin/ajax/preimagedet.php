<?php 
	
	
	$file = $_FILES["c_file"];
	$filename = $_POST["c_filename"];
	
	if($filename != null){
		unlink('../images/dimg/'.$filename);
	}
	
	$temp = $file['tmp_name'];
	
	$date = date('y-m-d-H-i-s');
	$filename = $date."photo.jpg";
	
	move_uploaded_file($temp, '../images/dimg/'.$filename);
	
	echo $filename;
?>