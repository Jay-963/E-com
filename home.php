<?php 
	include 'admin/config/conn.php';	
	
	session_start();

	$sql = "SELECT * FROM event_table ORDER BY event_id ASC LIMIT 0, 4;";
	$query = mysqli_query($conn, $sql);
	
	$eve = "select * from event_table where cat_id = 54";
	$cateve = mysqli_query($conn, $eve);
	
	$eve2 = "select * from event_table where cat_id = 48";
	$cateve2 = mysqli_query($conn, $eve2);
	
	$eve3 = "select * from event_table where cat_id = 46";
	$cateve3 = mysqli_query($conn, $eve3);
	
	$eve4 = "select * from event_table where cat_id = 47";
	$cateve4 = mysqli_query($conn, $eve4);
	
	
	$cat = "select * from cat_table";
	$catsql = mysqli_query($conn, $cat);
?>	

	<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Book My Show</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/owl.carousel.min.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		<section class=" home">
			<div class="home1 ">
					<div class="owl-carousel owl-theme" id="slider" >
						<div class="item"><img class="mySlides w3-animate-right" src="img/com2.png" width="100%" height="350px"/></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/com3.png" width="100%" height="350px"/></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/com4.png" width="100%" height="350px"/></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/real.png" width="100%" height="350px"/></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/real1.png" width="100%" height="350px"/></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/real2.png" width="100%" height="350px"/></div>
					</div>
					<!--<div class="w3-content w3-display-container">
						<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
						<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
					</div>-->
				</div>
		</section>
		<section class="Movies mt-5">
			<div class="movies1">
				<div class="container">
					<div>
						<h3>Recommended Movies</h3>
					</div>
					<div class="owl-carousel owl-theme" id="catagories" >	
						<?php
							while($row = mysqli_fetch_array($cateve)){
						?>
							<a href="detail.php?eid=<?php echo $row['event_id']; ?>" class="text-decoration-none">	
								<div class="">
									<div class="">	
										<img class="img-fluid rounded-lg" src="admin/img/limg/<?php echo $row['list_image']?>" height="350px" />
									</div>
									<div class="mt-3">
										<h5 class="text-dark "><?php echo $row['event_name']; ?></h5>
										<h6 class="text-dark ">Multiple Venues</h6>
										<p class="text-decoration-none text-muted m-0">₹ <?php echo $row['ticket'];?></p>
									</div>
								</div>
							</a>
						<?php
							}
						?>	
					</div>
				</div>
			</div>
		</section>
		<section class="container">
			<div>
				<img class="img-fluid rounded-lg" src="img/stream.png" width="100%" height="250px"/>
			</div>
		</section>
		<section class="mt-4 best">
			<div class="best1">	
				<div class="container">
					<div class="py-3">
						<h3>The Best of Entertainment</h3>
					</div>
					<div class="owl-carousel owl-theme" >
					<?php
						while($prow = mysqli_fetch_array($catsql)){
					?>
					<a href="list.php?cid=<?php echo $prow['cat_id']; ?>">
						<div class="item"><img class="mySlides w3-animate-right" src="admin/img/catimg/<?php echo $prow['cat_image']?>" width="100%" height="250px"/></div>
					</a>
					<?php
						}
					?>	
					</div>
				</div>
			</div>	
		</section>
		<section class="Premiere">
			<div class="Premiere1">	
				<div class="container">
					<div class=" text-light">
						<img class="img-fluid rounded-lg" src="img/rupe.png" />
						<h2>Premieres</h2>
						<p>Brand new Releases Every Friday</p>
					</div>
					<div class="owl-carousel owl-theme" id="premiere" >	
						<?php
							while($row = mysqli_fetch_array($cateve2)){
						?>
							<a href="detail.php?eid=<?php echo $row['event_id']; ?>" class="text-decoration-none">	
								<div class="">
									<div class="text-light">	
										<img class="img-fluid rounded-lg" src="admin/img/limg/<?php echo $row['list_image']?>" height="350px" />
									</div>
									<div class="mt-3 text-light">
										<h5 class="text-light"><?php echo $row['event_name']; ?></h5>
										<h6 class="text-light">Multiple Venues</h6>
										<p class="text-decoration-none text-light m-0">₹ <?php echo $row['ticket'];?></p>
									</div>
								</div>
							</a>
						<?php
							}
						?>	
					</div>
				</div>
			</div>	
		</section>
		<section class="Near mt-5">
			<div class="Near1">	
				<div class="container">
					<div>
						<h3>Events Happening Near you</h3>
					</div>
					<div class="owl-carousel owl-theme" id="next" >	
						<?php
							while($row = mysqli_fetch_array($cateve3)){
						?>
							<a href="detail.php?eid=<?php echo $row['event_id']; ?>" class="text-decoration-none">	
								<div class="">
									<div class="">	
										<img class="img-fluid rounded-lg" src="admin/img/limg/<?php echo $row['list_image']?>" height="350px" />
									</div>
									<div class="mt-3">
										<h5 class="text-dark "><?php echo $row['event_name']; ?></h5>
										<h6 class="text-dark ">Multiple Venues</h6>
										<p class="text-decoration-none text-muted m-0">₹ <?php echo $row['ticket'];?></p>
									</div>
								</div>
							</a>
						<?php
							}
						?>	
					</div>
				</div>
			</div>	
		</section>
		<section class="Online mt-5">
			<div class="Online1">	
				<div class="container">
					<div>
						<h3>Online Streaming Events</h3>
					</div>
					<div class="owl-carousel owl-theme" id="next2" >	
						<?php
							while($row = mysqli_fetch_array($cateve4)){
						?>
							<a href="detail.php?eid=<?php echo $row['event_id']; ?>" class="text-decoration-none">	
								<div class="">
									<div class="">	
										<img class="img-fluid rounded-lg" src="admin/img/limg/<?php echo $row['list_image']?>" height="350px" />
									</div>
									<div class="mt-3">
										<h5 class="text-dark "><?php echo $row['event_name']; ?></h5>
										<h6 class="text-dark ">Multiple Venues</h6>
										<p class="text-decoration-none text-muted m-0">₹ <?php echo $row['ticket'];?></p>
									</div>
								</div>
							</a>
						<?php
							}
						?>	
					</div>
				</div>
			</div>	
		</section>
		

		<?php include 'include/bottom.php';?>
		<?php include 'include/js.php';?>
		<script >

			// function plusDivs(n) {
				// showSlides(slideIndex += n);
			// }

			$("#slider").owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					dots:false,
					item:1,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:1
						},
						1000:{
							items:1
						}
					}
					
				});
					$("#catagories").owlCarousel({
						loop:false,
						margin:10,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:5
							}
						}
					});
					$("#premiere").owlCarousel({
						loop:false,
						margin:10,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:5
							}
						}
					});
					$("#next").owlCarousel({
						loop:false,
						margin:10,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:5
							}
						}
					});
					$("#next2").owlCarousel({
						loop:false,
						margin:10,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:3
							},
							1000:{
								items:5
							}
						}
					});
				$('.owl-carousel').owlCarousel({
					loop:false,
					margin:10,
					nav:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:5
						}
					}
				});
		</script>
	</body>
</html>

