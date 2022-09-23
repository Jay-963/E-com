<?php 
	session_start();
	
	include '../config/conn.php';
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$authsql = "select * from user_table where email='".$email."' and password = '".MD5($pass)."'";
	
	$query = mysqli_query($conn, $authsql);
	
	//print_r($query);
	 
	if($query->num_rows > 0){
		$row = mysqli_fetch_array($query);
		$_SESSION['token'] = $row['user_id']; 
		//print_r($row);
		echo 1;
	} else {
		echo 0;
	}
?>