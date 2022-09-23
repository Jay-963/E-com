<?php  
	include '../config/conn.php';

	$uid = $_POST['c_uid'];
	$Name = $_POST['c_Name'];
	$ticket = $_POST['c_ticket'];
	$Release = $_POST['c_Release'];
	$seats = $_POST['c_seats'];
	$Open = $_POST['c_Open'];
	$Close = $_POST['c_Close'];
	$Description = $_POST['c_Description'];
	$Featurers = $_POST['c_Featurers'];
	$List_Image = $_FILES['c_List_Image'];
	$Detail_Image = $_FILES['c_Detail_Image'];
	$limg = $_POST['c_limg'];
	$dimg = $_POST['c_dimg'];
	$cat_id = $_POST['c_cat_id'];
	$search = $_POST['c_search'];
	
	
	
		$temp = $List_Image['tmp_name'];
		$temp1 = $Detail_Image['tmp_name'];
	
		move_uploaded_file($temp, '../img/limg/'.$limg);
		move_uploaded_file($temp, '../img/dimg/'.$dimg);
			
	$sql = "UPDATE `event_table` SET `event_name`='".$Name."',`ticket`='".$ticket."',`date_on`='".$Release."',`tickets_opening`='".$Open."',`tickets_closing`='".$Close."',`seats`='".$seats."',`description`='".$Description."',`features`='".$Featurers."',`list_image`='".$limg."',`detail_image`='".$dimg."',`cat_id`='".$cat_id."', `art_id`='".$search."', `status`='1' WHERE event_id = '".$uid."'";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	
?>