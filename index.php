<?php
	include 'admin/config/connection.php';
	session_start();

	$getpsql = "select * from flipkart where cat_id =45  LIMIT 6";
	$prodquery = mysqli_query($conn, $getpsql);
	
	$getpsql2 = "select * from flipkart where cat_id = 43 LIMIT 6";
	$prodquery2 = mysqli_query($conn, $getpsql2);
	
	$getpsql3 = "select * from flipkart where cat_id = 44 LIMIT 6";
	$prodquery3 = mysqli_query($conn, $getpsql3);
	
	$getpsql4 = "select * from flipkart where cat_id = 48	LIMIT 6";
	$prodquery4 = mysqli_query($conn, $getpsql4);
	
	$getpsql5 = "select * from flipkart where cat_id = 41	LIMIT 6";
	$prodquery5 = mysqli_query($conn, $getpsql5);
	

	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Flipkart Copy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/owl.carousel.min.css">
	</head>
	<body>
		<div class="flipkart ">
			<?php include 'include/nav.php';?>
				<div class="ads m-2">
					<div class="owl-carousel owl-theme" id="slider" >
						<div class="item"><img class="mySlides w3-animate-right" src="img/slider.png" width="100%" height="350px"></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/slider2.png" width="100%" height="350px"></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/slider3.png" width="100%" height="350px"></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/real.png" width="100%" height="350px"></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/real1.png" width="100%" height="350px"></div>
						<div class="item"><img class="mySlides w3-animate-right" src="img/real2.png" width="100%" height="350px"></div>
					</div>
					<div class="w3-content w3-display-container">
						<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
						<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
					</div>	
				</div>	
			<div class="m-2 shadow-lg bg-white">
					<div class="">
						<div class="d-flex justify-content-between border border-grey border-left-0 border-right-0 border-top-0 ">
							<div class="p-3"><h3>Top Offers</h3></div>
							<div class="py-3 px-2">
								<a href="list.php"><button type="button" class="btn btn-primary">View All</button></a>
							</div>
						</div>
					</div>	
				<div class="">
					<div class="d-flex ">
						<?php
							while($prow4 = mysqli_fetch_array($prodquery5)){
							?>
							<a href="detail.php?pid=<?php echo $prow4['id']; ?>" class="text-decoration-none">
								<div class="p-4 flex-fill list ">
									<div class="mb-3 ">
										<img src="admin/images/limg/<?php echo $prow4['list_image']; ?>" height="150px"/>
									</div>
									<div class="">
										<p class="text-decoration-none"><h5 class="text-dark "><?php echo $prow4['name']; ?></h5></p>
										<p class="text-decoration-none"><p class="text-success mb-0">₹<?php echo $prow4['price']; ?></p></p>
										<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
									</div>
								</div>
							</a>	
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<div class="m-2 shadow-lg bg-white">
					<div class="">
						<div class="d-flex justify-content-between border border-grey border-left-0 border-right-0 border-top-0 ">
							<div class="p-3"><h3>Top Brand Watches</h3></div>
							<div class="py-3 px-2">
								<button type="button" class="btn btn-primary">View All</button>
							</div>
						</div>
					</div>	
				<div class="">
					<div class="d-flex">
						<?php 
							while($prow = mysqli_fetch_array($prodquery)){
							?>
								<a href="detail.php?pid=<?php echo $prow['id']; ?>" class="text-decoration-none">
									<div class="p-4 flex-fill list ">
										<div class="mb-3 ">
											<img src="admin/images/limg/<?php echo $prow['list_image']; ?>" height="150px"/>
										</div>
										<div class="">
											<p class="text-decoration-none"><h5 class="text-dark "><?php echo $prow['name']; ?></h5></p>
											<p class="text-decoration-none"><p class="text-success mb-0">₹<?php echo $prow['price']; ?></p></p>
											<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
										</div>
									</div>
								</a>	
							<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<div class="m-2 shadow-lg bg-white">
					<div class="">
						<div class="d-flex justify-content-between border border-grey border-left-0 border-right-0 border-top-0 ">
							<div class="p-3"><h3>Upcoming Sales</h3></div>
							<div class="py-3 px-2">
								<a href="list.php"><button type="button" class="btn btn-primary">View All</button></a>
							</div>
						</div>
					</div>	
				<div class="">
					<div class="d-flex ">
						<?php
							while($prow2 = mysqli_fetch_array($prodquery2)){
							?>
							<a href="detail.php?pid=<?php echo $prow2['id']; ?>" class="text-decoration-none">
								<div class="p-4 flex-fill list ">
									<div class="mb-3 ">
										<img src="admin/images/limg/<?php echo $prow2['list_image']; ?>" height="150px"/>
									</div>
									<div class="">
										<p class="text-decoration-none"><h5 class="text-dark "><?php echo $prow2['name']; ?></h5></p>
										<p class="text-decoration-none"><p class="text-success mb-0">₹<?php echo $prow2['price']; ?></p></p>
										<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
									</div>
								</div>
							</a>	
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<div class="m-2 shadow-lg bg-white">
					<div class="">
						<div class="d-flex justify-content-between border border-grey border-left-0 border-right-0 border-top-0 ">
							<div class="p-3"><h3>New Fashion</h3></div>
							<div class="py-3 px-2">
								<a href="list.php"><button type="button" class="btn btn-primary">View All</button></a>
							</div>
						</div>
					</div>	
				<div class="">
					<div class="d-flex ">
						<?php
							while($prow3 = mysqli_fetch_array($prodquery3)){
							?>
							<a href="detail.php?pid=<?php echo $prow3['id']; ?>" class="text-decoration-none">
								<div class="p-4 flex-fill list ">
									<div class="mb-3 ">
										<img src="admin/images/limg/<?php echo $prow3['list_image']; ?>" height="150px"/>
									</div>
									<div class="">
										<p class="text-decoration-none"><h5 class="text-dark "><?php echo $prow3['name']; ?></h5></p>
										<p class="text-decoration-none"><p class="text-success mb-0">₹<?php echo $prow3['price']; ?></p></p>
										<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
									</div>
								</div>
							</a>
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<div class="m-2 shadow-lg bg-white">
					<div class="">
						<div class="d-flex justify-content-between border border-grey border-left-0 border-right-0 border-top-0 ">
							<div class="p-3"><h3>Beauty & Toys</h3></div>
							<div class="py-3 px-2">
								<a href="list.php"><button type="button" class="btn btn-primary">View All</button></a>
							</div>
						</div>
					</div>	
				<div class="">
					<div class="d-flex ">
						<?php
							while($prow4 = mysqli_fetch_array($prodquery4)){
							?>
							<a href="detail.php?pid=<?php echo $prow4['id']; ?>" class="text-decoration-none">
								<div class="p-4 flex-fill list ">
									<div class="mb-3 ">
										<img src="admin/images/limg/<?php echo $prow4['list_image']; ?>" height="150px"/>
									</div>
									<div class="">
										<p class="text-decoration-none"><h5 class="text-dark "><?php echo $prow4['name']; ?></h5></p>
										<p class="text-decoration-none"><p class="text-success mb-0">₹<?php echo $prow4['price']; ?></p></p>
										<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
									</div>
								</div>
							</a>	
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<?php include 'include/bottom.php';?>
			<?php include 'include/js.php';?>
	</body>
</html>