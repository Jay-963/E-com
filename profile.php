<?php 
	include 'admin/config/conn.php';
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: home.php");
	}
	
	
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
		<link rel="stylesheet" href="css/profile.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		<div class="container home">	
				<div class="d-flex ">
					<div class="mt-3">
						<div class="side">
							<div class="border border-light bg-light  mb-2 p-3 shadow">
								<a>Hello,</a>
								<img class="rounded-circle me-lg-2" src="admin/img/limg/<?php echo $userinfo['image']?>"style="width: 40px; height: 40px;">
								<h5><?php echo $userinfo['name']?></h5>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a><dt><span class="text-primary pr-3"><i class="fas fa-sort-alpha-down"></i></span>MY BOOKINGS</dt></a>
							</div>
							<div class="border border-right-0 border-left-0 border-bottom-0 bg-light p-3 shadow">
								<a><dt><span class="text-primary pr-3"><i class="fas fa-user-alt"></i></span>ACCOUNTS SETTINGS</dt></a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Profile Information</a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Manage Addresses</a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>PAN Card Information</a>
							</div>
							<div class="border border-right-0 border-left-0 border-bottom-0 bg-light p-3 shadow">
								<a><dt><span class="text-primary pr-3"><i class="far fa-handshake"></i></span>PAYMENTS</dt></a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Gifts Cards</a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Saved UPI</a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Saved Cards</a>
							</div>
							<div class="border border-right-0 border-left-0 border-bottom-0  bg-light p-3 shadow">
								<a><dt><span class="text-primary pr-3"><i class="far fa-envelope"></i></span>MY CHATS</dt></a>
							</div>
							<div class="border border-right-0 border-left-0 border-bottom-0  bg-light p-3 shadow">
								<a><dt><span class="text-primary pr-3"><i class="fas fa-random"></i></span>MY STUFF</dt></a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Profile Information</a>
							</div>
							<div class="border border-light bg-light p-3 shadow">
								<a>Manage Addresses</a>
							</div>
							<div class="border border-right-0 border-left-0 border-bottom-0  bg-light p-3 shadow">
								<a><dt><span class="text-primary pr-3"><i class="fas fa-power-off"></i></span>Logout</dt></a>
							</div>
						</div>
					</div>
					<div class="flex-grow-1 mt-3">
						<div class="border border-light bg-light mx-3 p-2 shadow">
							<h5 class="p-3">Personal Information</h5>
							<div class="d-flex flex-row ">
								<div class="p-2 "><span class="border p-2 px-5"><?php echo $userinfo['name'] ?></span></div>
								<div class="p-2 "><span class="border p-2 px-5">chauhan</span></div>
							</div>
							<div class="p-3 PT-4">
								<p>Your Gender</p>
								<div class="form-check-inline">
								  <label class="form-check-label" for="radio1">
									<input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Male
								  </label>
								</div>
								<div class="form-check-inline">
								  <label class="form-check-label" for="radio2">
									<input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Female
								  </label>
								</div>
							</div>	
							<div class="pt-3">
								<h5 class="p-3 pt-4">Email Addresses</h5>
									<div class="d-flex flex-row ">
										<div class="p-2 "><span class="border p-2 px-5"><?php echo $userinfo['email'] ?></span></div>
									</div>
							</div>
							<div class="pt-3">
								<h5 class="p-3 pt-4">Mobile</h5>
									<div class="d-flex flex-row ">
										<div class="p-2 "><span class="border p-2 px-5"><?php echo $userinfo['mobile'] ?></span></div>
									</div>
							</div>
							<div class="p-3 pt-5">
								<h5>FAQs</h5>
								<p class="text-dark">What happens when I update my email address (or mobile number)?</p>
								<p class="para">Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).</p>
								<p class="text-dark">When will my Flipkart account be updated with the new email address (or mobile number)?</p>
								<p class="para">It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.</p>
								<p class="text-dark">What happens to my existing Flipkart account when I update my email address (or mobile number)?</p>
								<p class="para">Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.</p>
								<p class="text-dark">Does my Seller account get affected when I update my email address?</p>
								<p class="para">Flipkart has a 'single sign-on' policy. Any changes will reflect in your Seller account also.</p>
								<span class="text-primary">Deactivate Account</span>
							</div>
						</div>
					</div>					
				</div>
		</div>	
		<?php include 'include/bottom.php';?>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		
	</body>
</html>

