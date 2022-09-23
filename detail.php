<?php 
	include 'admin/config/conn.php';	
	
	session_start();

	
	
	$eveid = $_GET['eid'];
	$sql = "select * from event_table where event_id = '".$eveid."'";
	$query = mysqli_query($conn, $sql);
	$fetch = mysqli_fetch_array($query);
	
	
	$artId = $fetch['art_id'];
	$art = "select * from artists where art_id in (".$artId.")";
	$query2 = mysqli_query($conn, $art);
	
	//$art = "SELECT event_table.art_id, image, name, nick_name, profile, born, address FROM artists LEFT JOIN event_table ON artists.art_id = event_table.art_id where artists.art_id IN (event_table.art_id) AND event_id = '".$eveid."' ";
	
	
	
	
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
		<section class="detail" style="background-image:url('admin/img/dimg/<?php echo $fetch['detail_image']?>')">
		</section>
		<section class="detail1">	
			<div class="container">
				<div class="detailing">
					<div class="row">
						<div class="col-4 ">
							<img class="" src="admin/img/limg/<?php echo $fetch['list_image']?>" width="250px"/>
						</div>
						<div class="col-8 ">
							<div class="text-light px-3">
								<h2 class="my-3"><dt><?php echo $fetch['event_name']; ?></dt></h2>
								<h5 class="my-3"><dt><i class="fas fa-thumbs-up text-success"></i> 278.1K <span>are interested</span></dt></h5>
								<div class="release p-2 my-3">
									<div class="row">
										<div class="col-9">
											<h6 class=""><?php echo $fetch['date_on']; ?></h6>
											<p class="m-0">Mark interested to know when bookings open</p>
										</div>
										<div class="col-3 ">
											<button class="rounded-sm border-0">I'm intrested</button>
										</div>
									</div>
								</div>
								<div class="my-3">
									<a class="bg-light text-dark p-1 rounded-sm">2D, 3D, 4DX 3D, 3D SCREEN X, IMAX 3D</a>
								</div>
								<div class="my-2">
									<a class="bg-light text-dark p-1 rounded-sm">English, Tamil, Telugu, Hindi</a>
								</div>
								<div class="my-2">
									<h5>1h 59m • Action, Adventure, Fantasy • UA</h5>
								</div>
								<div class="mt-5">
								
								
									<a href="sitting.php?eve=<?php echo $fetch['event_id']; ?>" class=" btn-danger text-decoration-none btn-lg mt-5">Book tickets</a>
								
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
		<section class="container">
			<div class="mt-4">
				<h4><dt>About the Event</dt></h4>
				<h5><?php echo $fetch['description'];?></h5>
				<h5><?php echo $fetch['features'];?></h5>
			</div>
			<div class="border border-dark border-right-0 border-left-0 border-bottom-0 my-5">
				<div class="mt-5 mb-4">
					<h4>Cast</h4>
				</div>
				<div class="row">
				<?php 
					while($row = mysqli_fetch_array($query2)){
				?>
						<div class="col-2 text-center">
							<a href="artist.php?aid=<?php echo $row['art_id']; ?>" class="text-decoration-none text-dark">
								<img class="rounded-circle" src="admin/img/artimg/<?php echo $row['image']?>" height="100px" width="100px"/>
								<h5 class="mb-0"><?php echo $row['name']?></h5>
								<p><?php echo $row['nick_name']?></p>
							</a>
						</div>
				<?php
					}
				?>	
				</div>
				
			</div>
		</section>
		
		
		
		<?php include 'include/bottom.php';?>	
		<?php include 'include/js.php';?>
		<script>
			$(document).ready(function(){
				$("#remo").click(function(){
					$("#regis").toggle();
				});
			});
		</script>
		
		
	</body>
</html>

