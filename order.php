<?php 
	include 'admin/config/conn.php';
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: home.php");
	}
	
	$id = $_SESSION['token'];
	$joint = "select event_table.list_image, event_table.event_name, event_table.create_date, booking_table.book_id, booking_table.no_of_seats, booking_table.total_price, booking_table.seats_name
	FROM booking_table
	INNER JOIN event_table ON booking_table.event_id=event_table.event_id
	where booking_table.user_id = '".$id."' ";
	// print_r($joint);
	$orderrun = mysqli_query($conn, $joint);
		
	
?>	
		
	<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BookMyShow</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/order.css">
	</head>
	<body class="">
		<?php include 'include/nav.php';?>
		<div class="container home">
			
			<div class="top border p-4 shadow mt-5 ">
				<div class="border border mb-3">
					<div class="d-flex justify-content-between p-3 border border-top-0 border-left-0 border-right-0">
						<div class="p-2 px-4 bg-primary text-light rounded-lg m-auto">My Tickets</div>
					</div>
					
					<div class="row m-3">
					<?php
						while($product = mysqli_fetch_array($orderrun)){
					?>
						<div class="col-9 my-2 p-0">
							<div class="bg-dark p-4">
								<div class="row p-2">
									<div class="col-1">
										<img  src="admin/img/limg/<?php echo $product['list_image']; ?>" width="50px" >
									</div>
									<div class="col-4">
										<h5 class="text-light"><?php echo $product['event_name'] ?></h5>
									</div>
								</div>
								<h6 class="text-light py-3">Ticket No: <?php echo $product['book_id'] ?></h6>
								<div class="row text-light border border-warning m-0">
									<div class="col-4 text-center"><h5>Date On</h5></div>
									<div class="col-4 text-center"><h5>Your Seats</h5></div>
									<div class="col-4 text-center"><h5>Ticket Price</h5></div>
								</div>
								<div class="row text-light border border-warning m-0 border-top-0">
									<div class="col-4 text-center"><h5><?php echo $product['create_date'] ?></h5></div>
									<div class="col-4 text-center"><h5><?php echo $product['seats_name'] ?></h5></div>
									<div class="col-4 text-center"><h5>₹<?php echo $product['total_price'] ?></h5></div>
								</div>
							</div>
						</div>
						<div class="col-3 my-2 p-0">
							<div class="bg-warning p-4">
								<div class="row p-2">
									<div class="col-3">
										<img  src="admin/img/limg/<?php echo $product['list_image']; ?>" width="50px" >
									</div>
									<div class="col-8">
										<h5 class="text-light"><?php echo $product['event_name'] ?></h5>
									</div>
								</div>
								<div class="text-center text-light">
									<img src="img/bar.jpg" width="94px" >
									<h5>Scan Me</h5>
								</div>
								
							</div>
						</div>
						
						<div class="baba"><h5 class="numbering"><?php echo $product['no_of_seats'] ?></h5></div>
						<?php
						}
					?>
					</div>
				</div>
			</div>
		</div>
		<?php include 'include/bottom.php';?>
		<?php include 'include/js.php';?>
		
		 <script>
		
		</script>
		
		
	</body>
</html>

