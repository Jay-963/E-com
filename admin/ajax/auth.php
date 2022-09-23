<?php 
	session_start();
	include '../config/connection.php';
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$authsql = "select * from usertable where email='".$email."' and password = '".MD5($pass)."'";
	
	$query = mysqli_query($conn, $authsql);
	
	
	if($query->num_rows > 0){
		$row = mysqli_fetch_array($query);
		$_SESSION['token'] = $row['id']; 
		echo 1;
	} else {
		echo 0;
	}
?>