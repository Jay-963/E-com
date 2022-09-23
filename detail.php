<?php 
	include 'admin/config/connection.php';
	
	session_start();
	
	$catid = $_GET['pid'];
	$getpsql3 = "select * from flipkart where id = '".$catid."'";
	$prodquery3 = mysqli_query($conn, $getpsql3);
	$prodquery4 = mysqli_fetch_array($prodquery3);
	
	
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
		<link rel="stylesheet" href="css/detail.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		<div class="container">
			<div class="back bg-light border p-2">
				<div class="row">
					<div class="col-4 ">
						<div class="w3-content" style="max-width:1200px">
							 <img  src="admin/images/limg/<?php echo $prodquery4['list_image']; ?>" width="350px" >
							 <div class="d-flex mt-3">
								<div class="p-2 flex-fill">
									<button type="button" class="btn bg-danger btn-lg btn-block text-light">Add To Cart</button>
								</div>
								<div class="p-2  flex-fill">
									<a href="order.php?oid=<?php echo $prodquery4['id']; ?>" class="text-decoration-none">	
										<button type="button" class="btn bg-warning btn-lg btn-block text-light">Order Now</button>
									</a>
								</div>
							</div>
						</div>
					</div>	
					<div class="col-8">
						<div class="detailpart">
							<p>Home > Audio & Video > Headphones > OnePlus Headphones > OnePlus Bullets</p>
							<h2><?php echo $prodquery4['name'] ?></h2>
							<div class="d-flex flex-row my-3 ">
								  <div class="pr-2"><button type="button" class="btn btn-success btn-sm">4.2<i class="fas fa-star"></i></button></div>
								  <div class="px-2">5,18,058 Ratings & 45,224 Reviews</div>
								  <div class="px-2"><a href="#"><img src="img/flo.png" width="75px"/></a></div>
							</div>
							<div class="d-flex flex-row ">
								  <div class="pt-1"><h2 class="m-0"><i class="fas fa-rupee-sign"></i><?php echo $prodquery4['price'] ?></h2></div>
								  <div class="p-2 text-success">8% off</div>
							</div>
							<div class=" text-danger">Hurry, Only 3 Left</div>
						</div>
						<div class="p-2">
							<p>Features</p>
							<p class=" pl-0"><?php echo $prodquery4['features'] ?></p>
						</div>
						<div class="mt-3 ">
							<div class="row">
								<div class="col-1">
									<p>Description</p>
								</div>
								<div class="col-10 pl-3">
									<p><?php echo $prodquery4['description'] ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>	
		</div>		
		<?php include 'include/bottom.php';?>
		
		<?php include 'include/js.php';?>
		<script>
			function currentDiv(n) {
				showDivs(slideIndex = n);
			}

			function showDivs(n) {
			  var i;
			  var x = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("demo");
			  if (n > x.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = x.length}
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
			  }
			  x[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " w3-opacity-off";
			}
		</script>
		
		
	</body>
</html>

