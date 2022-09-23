<?php 
	include '../admin/config/conn.php';
	
	$eveid = $_POST['eveid'];
	$paged = $_POST['paged'];
	$limit = $_POST['limit'];
	
	$change = ($paged -1) * $limit;

	//echo $step;
	$sql = "select * from event_table where cat_id = ".$eveid." ORDER BY event_id ASC LIMIT ".$change.", ".$limit."";
	$query = mysqli_query($conn, $sql);
	
	$arr = array();
	
	while($row2 = mysqli_fetch_assoc($query)){
		array_push($arr, $row2);
	}
	
	
	// print_r($arr);
	// print_r($query);
	
	// echo $paged;
	// echo $limit;
	// echo $change;
	//echo $eveid;
	
	
	//echo "<pre>";
	echo json_encode($arr);
	//die();
	
	//echo $paged . " ---- ". $limit; 
	
?>