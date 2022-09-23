<?php 
	include 'admin/config/conn.php';
	
	if(isset($_SESSION['token'])){
		$userid = $_SESSION['token'];
		$userdata = "select * from user_table where user_id = '".$userid."'";
		$getuser = mysqli_query($conn, $userdata);
		$userinfo = mysqli_fetch_array($getuser);
	}
	
	
	$sqlcat = "select * from cat_table";
	$sqlauery = mysqli_query($conn, $sqlcat);
	
	
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
	</head>
	<body>
 
		<div class="navigation">
				<nav class=" navbar-expand-sm fixed-top ">
				<div class="container">
					<div class="d-flex">
						<div class="form-inline mr-auto">
							<div class="logo">
								<h4><a href="home.php " class=""><img src="img/logo.png" width="120px" /></a></h4>
							</div>
							<input class="form-control mr-sm-0 "  type="text" placeholder="Search for events, shows and more">
							<button class="btn btn-success " type="submit"><i class="fas fa-search text-primary"></i></i></button>
						</div>		
						<div class="more">
							<div class="dropdown">
								<button class="dropbtn p-3">Mumbai<i class="px-2 fa fa-caret-down"></i></button>
									<div class="dropdown-content">
										<a href="#">Ntification Prefrences</a>
										<a href="#">Sell on Flipkart</a>
										<a href="#">24*7 Customer Care</a>
										<a href="#">Advertise</a>
										<a href="#">Download App</a>
									</div>
							</div> 
						</div>
						<div id="" class="login">	
						<?php
							if(isset($_SESSION['token'])){
						?>
							<div class="dropdown">
								<img class="rounded-circle me-lg-2" src="admin/img/limg/<?php echo $userinfo['image']?>"style="width: 40px; height: 40px;">
								<button class="dropbtn  p-3 bg-danger rounded-lg" id=""><?php echo $userinfo['name']?></button>
									<div class="dropdown-content">
										<a href="profile.php">My Profile</a>
										<a href="order.php">My bookings</a>
										<a href="logout2.php">logout</a>
									</div>
							</div>
						<?php
							} else {
						?>
							<div class="dropdown">
								<button class="dropbtn p-3 bg-danger rounded-lg" id="loginform">Login</button>
							</div>
						<?php
							}
						?>	
						</div>	
						<div>
							<div id="myNav" class="overlay">
							  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
							  <div class="overlay-content">
								<a href="#">About</a>
								<a href="#">Services</a>
								<a href="#">Clients</a>
								<a href="#">Contact</a>
							  </div>
							</div>
							<span style="font-size:30px;cursor:pointer; line-height:2.2; color:#fff; padding-left:25px;" onclick="openNav()">&#9776;</span>
						</div>
					</div>	
					</div>
					<div class=" menus ">
						<div class="container d-flex justify-content-between">
							<div class="d-flex text-light p-3">
								<div class="dropdown">
									<a class="p-2  text-light " href="">Movie</a>
								</div>
								<div class="dropdown">
									<a class="p-2 text-light " href="">Streams</a>
								</div>
								<div class="dropdown">
									<a class="p-2 hover dropbtn" href="">Events</a>
									<div class="dropdown-content events">
										<div class="row">
										<?php
											while($row = mysqli_fetch_array($sqlauery)){
										?>
											<div class="col-4">
												<a href="list.php?cid=<?php echo $row['cat_id']; ?>"><?php echo$row['cat_name'] ?></a>
											</div>
										<?php
											}
										?>
										</div>
									</div>
								</div>
								<div class="dropdown">
									<a class="p-2 text-light " href="">Play</a>
								</div>
								<div class=" dropdown">
									<a class="p-2 text-light " href="">Sports</a>
								</div>
								<div class="dropdown ">
									<a class="p-2 text-light " href="">Activities</a>
								</div>
								<div class="dropdown ">
									<a class="p-2 text-light " href="">Buzz</a>
								</div>
							</div>
							<div class="d-flex p-3">
								<div class="dropdown">
									<a class="p-2 text-light " href="">Listyourshow</a>
								</div>
								<div class="dropdown">
									<a class="p-2 text-light " href="">Corporates</a>
								</div>
								<div class="dropdown">
									<a class="p-2 text-light " href="">Show</a>
								</div>
								<div class="dropdown">
									<a class="p-2 text-light " href="">Gift Cards</a>
								</div>
							</div>
						</div>	
					</div>
				</nav>
			</div>
			<div class=" mt-3 p-1">
				<h5 id="msg"></h5>
			</div>
			<div id="loginform2" class="login2">
				<div class="mt-4">
					<h5 class="text-center mt-2">Get Started</h5>
					<div class="mt-3">
							<input type="email" id="email" class="text-dark text-center mb-4 form-control py-4 border border-dark" placeholder="Enter Your Email" ></input>
						</div>
						<div class="">
							<input type="password" id="pass"  class="text-dark text-center mb-4 py-4 form-control border border-dark" placeholder="Enter Your Password" ></input>
					</div>
					<button type="button" id="login" class="btn btn-warning btn-block text-light">Login</button>
					<h5 class="text-center my-4">OR</h5>
					<p class="text-center">By continuing, you agree to BookMyShow's Terms of Use and Privacy Policy.</p>
					<h6 id="second" class="text-center mt-5">New User? Create Your Account</h6>
					<div class="cross"><i class="fas fa-times"></i></div>
				</div>
			</div>	
			<div id="second2" class="second3" >
				<h5 class="text-center">Get Started</h5>
					<div class="">
							<input type="name" id="name" class="text-dark text-center mb-4 form-control py-4 border border-dark" placeholder="Your Name" ></input>
						</div>
						<div class="">
							<input type="Mobile" id="Mobile"  class="text-dark text-center mb-4 py-4 form-control border border-dark" placeholder="Your Mobile" ></input>
						</div>
						<div class="">
							<input type="Email" id="Email"  class="text-dark text-center mb-4 py-4 form-control border border-dark" placeholder="Your Email" ></input>
						</div>
						<div class="">
							<input type="file" id="image"  class="text-dark text-center mb-4 p-2 form-control border border-dark" placeholder="Your Email" ></input>
						</div>
						<div class="">
							<input type="password" id="Password"  class="text-dark text-center mb-4 py-4 form-control border border-dark" placeholder="Your Password" ></input>
					</div>
					<div class="text-center">
						<button id="submit"class="rounded-lg bg-success border-0 p-2 px-3 my-2">Submit</button>	
					</div>
					
				<h6 id="again" class="text-center" >Already have an Account</h6>
				<div class="cross"><i class="fas fa-times"></i></div>
			</div>
			
		
		
		
	
	</body>
</html>

		