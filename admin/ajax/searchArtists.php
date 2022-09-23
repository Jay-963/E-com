<?php 
	include '../config/conn.php';
	$search_val = $_POST['s_val'];
	if($search_val != ""){
		$search_sql = "select * from artists where name like '".$search_val."%' or profile like '".$search_val."%'";
		$seach_query = mysqli_query($conn, $search_sql);
		$arr = array();
		while($row = mysqli_fetch_assoc($seach_query)){
			array_push($arr, $row);
		}
		echo json_encode($arr);
	} else {
		echo 0;
	}
?>