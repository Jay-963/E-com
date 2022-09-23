<?php 
	include '../config/conn.php';
	
	$Name = $_POST['c_Name'];
	$ticket = $_POST['c_ticket'];
	$Release = $_POST['c_Release'];
	$Open = $_POST['c_Open'];
	$Close = $_POST['c_Close'];
	$seats = $_POST['c_seats'];
	$Description = $_POST['c_Description'];
	$Featurers = $_POST['c_Featurers'];
	$List_Image = $_FILES['c_List_Image'];
	$Detail_Image = $_FILES['c_Detail_Image'];
	$cat_id = $_POST['c_cat_id'];
	$search = $_POST['c_search'];
	
	
	
	$temp = $List_Image['tmp_name'];
	$temp1 = $Detail_Image['tmp_name'];
	
	
	$date = date('y-m-d-H-i-s');
	$date1 = date('y-m-d-H-i-s');
	
	$filename = $date."photo.png";
	$filename1 = $date1."photo.png";
	
	
	move_uploaded_file($temp, '../img/limg/'.$filename);
	move_uploaded_file($temp1, '../img/dimg/'.$filename1);
	
	$sql = "INSERT INTO `event_table`(`event_id`, `event_name`, `ticket`, `date_on`, `tickets_opening`, `tickets_closing`, `seats`, `description`, `features`, `list_image`, `detail_image`, `cat_id`, `art_id`, `status`, `create_date`) VALUES ('','".$Name."','".$ticket."','".$Release."','".$Open."','".$Close."','".$seats."','".$Description."','".$Featurers."','".$filename."','".$filename1."','".$cat_id."', '".$search."', '1','".$date."')";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
