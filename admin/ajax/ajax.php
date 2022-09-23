<?php 
	include '../config/connection.php';
	
	$Name = $_POST['c_Name'];
	$Price = $_POST['c_Price'];

	$Size = $_POST['c_Size'];
	$Quantity = $_POST['c_Quantity'];
	$Description = $_POST['c_Description'];
	$Featurers = $_POST['c_Featurers'];
	$List_Image = $_FILES['c_List_Image'];
	$Detail_Image = $_FILES['c_Detail_Image'];
	$cat_id = $_POST['c_cat_id'];
	
	$temp = $List_Image['tmp_name'];
	$temp1 = $Detail_Image['tmp_name'];
	
	
	
	
	$date = date('y-m-d-H-i-s');
	$date1 = date('y-m-d-H-i-s');
	
	$filename = $date."photo.png";
	$filename1 = $date1."photo.png";
	
	
	move_uploaded_file($temp, '../images/limg/'.$filename);
	move_uploaded_file($temp1, '../images/dimg/'.$filename1);
	
	$sql = "INSERT INTO `flipkart`(`id`, `name`, `price`, `size`, `quantity`, `description`, `features`, `list_image`, `detail_image`, `status`, `created_date`, `cat_id`) VALUES ('', '".$Name."', '".$Price."', '".$Size."', '".$Quantity."', '".$Description."', '".$Featurers."', '".$filename."', '".$filename1."', '', '', '".$cat_id."')";
	
	$query = mysqli_query($conn, $sql);
	
	// echo $query;
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
?>
