<?php 
	include 'admin/config/conn.php';	
	
	session_start();

	
	
	$artid = $_GET['aid'];
	$art = "select * from artists where art_id = '".$artid."'";
	$query = mysqli_query($conn, $art);
	$fecth = mysqli_fetch_array($query);
	
?>	

	<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Flipkart Copy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		<section class="art">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<div class="artimg">
							<img class="rounded-circle artimg2" src="admin/img/artimg/<?php echo $fecth['image']?>" width="250px"/>
						</div>
					</div>
					<div class="col-9">
						<div class="artimg3 text-light">
							<h1><dt><?php echo $fecth['name']?></dt></h1>
							<p>Also Known As :<?php echo $fecth['nick_name']?></p>
							<h5>Profile: <?php echo $fecth['profile']?></h5>
							<div class="row">
								<h5 class="pl-3">Born: <?php echo $fecth['born']?></h5> 
								<h5><?php echo $fecth['address']?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="container">
			<div class="mt-5">
				<h3><dt>About</dt></h3>
				<h6><?php echo $fecth['about']?></h6>
			</div>
		</section>
		
		
		
		<?php include 'include/bottom.php';?>	
		<?php include 'include/js.php';?>
		<script>
			
		</script>
		
		
	</body>
</html>

