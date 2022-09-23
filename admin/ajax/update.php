<?php  
	include '../config/connection.php';

	$uid = $_POST['c_uid'];
	$cat = $_POST['c_cat'];
	$Name = $_POST['c_Name'];
	$Price = $_POST['c_Price'];
	$Size = $_POST['c_Size'];
	$Quantity = $_POST['c_Quantity'];
	$Description = $_POST['c_Description'];
	$Featurers = $_POST['c_Featurers'];
	$List_Image = $_FILES['c_List_Image'];
	$Detail_Image = $_FILES['c_Detail_Image'];
	
		$temp = $List_Image['tmp_name'];
		$temp1 = $Detail_Image['tmp_name'];
	
		$date = date('y-m-d-H-i-s');
		$date1 = date('y-m-d-H-i-s');
		
		$filename = $date."photo.png";
		$filename1 = $date1."photo.png";
			
	$sql = "update flipkart set name = '".$Name."', price = '".$Price."', size= '".$Size."', quantity = '".$Quantity."', description = '".$Description."', features = '".$Featurers."', list_image = '".$filename."', detail_image = '".$filename1."', cat_id = '".$cat."' where id = '".$uid."' ";
	
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo 1;
	} else {
		echo 0;
	}
	
?>