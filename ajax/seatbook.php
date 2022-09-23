<?php 
	include '../admin/config/conn.php';
	$selectedVal = $_POST['selectVal'];
	$eveids = $_POST['evid'];
	
	
	$sqlGet = "select * from seats where Event_Id='".$eveids."'";
	$getQuery = mysqli_query($conn, $sqlGet);
	$date = date('y-m-d-H-i-s');
	
	
	if($getQuery->num_rows == 0){
		$sqlAdd = "insert into seats (Id, Event_Id, BookSeat, Status, CreatedDate) values ('', '".$eveids."', '".$selectedVal."', 1, '".$date."')";
		$addQuery = mysqli_query($conn, $sqlAdd);
	} else {
		$data = mysqli_fetch_assoc($getQuery);
		$getArr = $data['BookSeat'];
		$maval = $getArr.$selectedVal;
		// echo $maval;
		
		$upSql = "update seats set BookSeat='".$maval."' Where Event_Id='".$eveids."'";
		$updQuery = mysqli_query($conn, $upSql);
	}
	
	
	if($updQuery){
		echo 1;
	} else {
		echo 0;
	}
?>