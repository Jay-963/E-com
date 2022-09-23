<?php 
	include 'admin/config/connection.php';
	
	$uid = null;
	$Name = null;
	$Email = null;
	$Mobile = null;
	$Address = null;
	$Password = null;
	
	
	if(isset($_GET['id'])){
		$uid = $_GET['id'];
		$sqlid = "select * from usertable where id = '".$uid."'";
		$resp = mysqli_query($conn, $sqlid);
		$result = mysqli_fetch_array($resp);
		
		$Name = $result['name'];
		$Email = $result['email'];
		$Mobile = $result['mobile'];
		$Address = $result['address'];
		$Password = $result['password'];
	}
	
	if(isset($_SESSION['lock'])){
		$userid = $_SESSION['lock'];
		$userdata = "select * from usertable where id = '".$userid."'";
		$getuser = mysqli_query($conn, $userdata);
		$userinfo = mysqli_fetch_array($getuser);
	}
	
	
	
	$sqlcat = "select * from catable";
	$sqlauery = mysqli_query($conn, $sqlcat);
	
	
	
	
?>	

		
		
		<div class="navigation">
				<nav class=" navbar-expand-sm fixed-top ">
					<div class="form-inline container">
						<div class="logo">
							<h4><a href="index.php " class="text-light text-decoration-none">Flipkart</a></h4>
							<h6>Explore <span class="text-warning">Plus <i class="fas fa-plus"></span></i></h6>
						</div>
						<input class="form-control mr-sm-0" type="text" placeholder="Search for products, brands and more">
						<button class="btn btn-success " type="submit"><i class="fas fa-search text-primary"></i></i></button>
							<div class="d-flex justify-content-between ">
							<?php if(isset($_SESSION['lock'])){?>
								<div class="dropdown">
									<button class="dropbtn" id="log"><?php echo $userinfo['name'] ?></button>
									<div class="dropdown-content">
										  <a href="profile.php">My Profile</a>
										  <a href="myorder.php">My Orders</a>
										  <a href="logout.php">logout</a>
									</div>
								</div>
							
							<?php }else{?>
								<div class="dropdown">
									<button class="dropbtn" id="loginform">Login</button>
								</div>
							<?php }?>								<div class="more">
									<div class="dropdown">
										<button class="dropbtn">More<i class="fa fa-caret-down"></i></button>
										<div class="dropdown-content">
										  <a href="#">Ntification Prefrences</a>
										  <a href="#">Sell on Flipkart</a>
										  <a href="#">24*7 Customer Care</a>
										   <a href="#">Advertise</a>
										  <a href="#">Download App</a>
										</div>
									</div> 
								</div>
								<div class=" mt-3 p-1">
									<a class="cart text-decoration-none"><i class="fas fa-shopping-cart"></i> Cart</a>
								</div>
								<div class=" mt-3 p-1">
									<h5 id="msg"></h5>
								</div>
							</div>	
					</div>
				</nav>
			</div>
	
		<div class="login" id="logi">
			<div class="row">
				<div class="col-4 p-0">
					<div class="bg-primary text-light py-5 px-4">
						<h4 class="">Login</h4>
						<h5 class="pb-5">Get access to your Orders, Wishlist and Recommendations</h5>
						<div class="pt-5 mt-5"><img src="img/login.png" width="100%"/></div>
					</div>
				</div>
				<div class="col-8 ">
					<div class="p-4">
						<div class="py-5">
						<div class="">
							<input type="email" id="email" class="p-1 my-1 form-control border border-grey border-left-0 border-right-0 border-top-0" placeholder="Enter Your Email" ></input>
						</div>
						<div class="">
							<input type="password" id="pass"  class="p-1 my-1 form-control border border-grey border-left-0 border-right-0 border-top-0" placeholder="Enter Password" ></input>
						</div>
					</div>
					<div>
						<p>By continuing, you agree to Flipkart's <span class="text-primary">Terms of Use</span> and <span class="text-primary">Privacy Policy</span>.</p>
					</div>
					<button type="button" id="login" class="btn btn-warning btn-block text-light">Login</button>
					<p class="text-center text-dark pt-2">OR</p>
					<button type="button" class="btn btn-none btn-block shadow"><span class="text-primary">Request OTP</span></button>
						<div class="pt-3 text-primary pt-4 text-center" id="new" onclick="switchVisible();" value="Click">
							<p>New to Flipkart? Create an account</p>
						</div>
						<div class="cross" id="remove"><i class="fas fa-times"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="regi " id="regis">
			<div class="row">
				<div class="col-4 p-0">
					<div class="bg-primary text-light py-5 px-4">
						<h4 class="">Looks like you're new here!</h4>
						<h5 class="pb-4">Sign up with your mobile number to get started</h5>
						<div class="pt-5 mt-5"><img src="img/login.png" width="100%"/></div>
					</div>
				</div>
				<div class="col-8 ">
					<div class="p-4">
						<div class="py-5">
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">User Name</label>
									<input type="text" value="<?php echo $Name;?>" class="form-control bg-primary" id="Name" placeholder="User Name" name="email">
								</div>
								<div class="col">
									<label for="email" class="mr-sm-2">User Email</label>
									<input type="Email" value="<?php echo $Email;?>" class="form-control bg-primary" id="Email" placeholder="Email" name="email">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="Mobile" class="mr-sm-2">Mobile</label>
									<input type="number" value="<?php echo $Mobile;?>" class="form-control bg-primary" id="Mobile" placeholder="Mobile" name="Mobile">
								</div>
								<div class="col">
									<label for="Address" class="mr-sm-2">Address</label>
									<input type="text" value="<?php echo $Address;?>" class="form-control bg-primary" id="Address" placeholder="Address" name="Address">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="Password" class="mr-sm-2">Password</label>
									<input type="password" value="<?php echo $Password;?>" class="form-control bg-primary" id="Password" placeholder="Enter Password" name="Password">
								</div>
							</div>
						</div>
						<div>
							<p>By continuing, you agree to Flipkart's <span class="text-primary">Terms of Use</span> and <span class="text-primary">Privacy Policy</span>.</p>
						</div>
						<button type="button" class="btn btn-warning btn-block text-light" id="submit">submit</button>	
						<div class="cross" id="remo"><i class="fas fa-times"></i></div>
					</div>
				</div>
			</div>
		</div>
			
			<div class="catagories">
				<div class="container">
					<div class="cat_had  ">
						<div class="row">
							
							<?php
								while($row = mysqli_fetch_array($sqlauery)){
								?>
									<div class="col">
										<div class="partetion text-center">
											<div class="topimg">
												<a href="list.php?cid=<?php echo $row['id']; ?>" class="text-decoration-none">
													<img src="admin/images/catimg/<?php echo $row['image']; ?>" height="60px"/>
													<p class="text-dark"><?php echo $row['name']; ?></p>
												</a>
											</div>
										</div>	
									</div>
								<?php
								}
							?>
							
						</div>	
					</div>	
				</div>	
			</div>
			
	<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		
		<script>
			$(document).ready(function(){
				$("#login").click(function(){
					var email = $("#email").val();
					var pass = $("#pass").val();
					
					var obj = {email,pass};
					$.ajax({
						url: "ajax/session.php",
						type: "POST",
						data: obj,
						success: function(resp){
							if(resp == 1){
								window.location.href = 'index.php';
							} else {
								$("#msg").html("please enter valid email or password");
							}
						}
					})
				})
			})
		
			$(document).ready(function(){
				$("#submit").click(function(){
			
				
				var Name = $("#Name").val();
				var Email = $("#Email").val();
				var Mobile = $("#Mobile").val();
				var Address = $("#Address").val();
				var Password = $("#Password").val();
				
					
					var fd = new FormData();
					// console.log(fd);
					fd.append("c_Name", Name);
					fd.append("c_Email", Email);
					fd.append("c_Mobile", Mobile);
					fd.append("c_Address", Address);
					fd.append("c_Password", Password);
					
					
					
				var obj = {
					c_Name :Name,
					c_Email :Email,
					c_Mobile :Mobile,
					c_Address :Address,
					c_Password :Password,
				
					
				}
					if(Name == ""){
					alert("fill Name");	
				}
					else if(Email == ""){
					alert("must fill");
				}
					else if(Mobile == ""){
					alert("must fill");	
				}
					else if(Address == ""){
					alert("must fill");
				}
					else if(Password == ""){
					alert("must fill");
				}
					
				
				else{$.ajax({
					url : "admin/ajax/userajax.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg").html("successfully data inserted");
							//console.log(resp);
							$("#Name").val('');
							$("#Email").val('');
							$("#Mobile").val('');
							$("#Address").val('');
							$("#Password").val('');
						
						}
					}
				})
			
				}
			});	
			
		$("#update").click(function(){
			
				var uid  = '<?php echo $uid ?>';
				var Name = $("#Name").val();
				var Email = $("#Email").val();
				var Mobile = $("#Mobile").val();
				var Address = $("#Address").val();
				var Password = $("#Password").val();
				
					
					var fd = new FormData();
					console.log(fd);
					fd.append("c_uid", uid);
					fd.append("c_Name", Name);
					fd.append("c_Email", Email);
					fd.append("c_Mobile", Mobile);
					fd.append("c_Address", Address);
					fd.append("c_Password", Password);
				
					
					
				var obj = {
					c_Name :Name,
					c_Email :Email,
					c_Mobile :Mobile,
					c_Address :Address,
					c_Password :Password,
				
				}
					if(Name == ""){
					alert("fill Name");	
				}
					else if(Email == ""){
					alert("must fill");
				}
					else if(Mobile == ""){
					alert("must fill");	
				}
					else if(Address == ""){
					alert("must fill");
				}
					else if(Password == ""){
					alert("must fill");
				}
				
				
				else{$.ajax({
					url : "admin/ajax/userupdate.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg2").html("successfully data updated");
							console.log(resp);
							$("#Name").val('');
							$("#Email").val('');
							$("#Mobile").val('');
							$("#Address").val('');
							$("#Password").val('');
							location.reload();
						}
					}
				})
			
				}
			});		
			
			
	});

		$(document).ready(function(){
			$("#remo").click(function(){
			  $("#regis").hide();
			});
			
		});
		$(document).ready(function(){
			$("#remove").click(function(){
			  $("#logi").hide();
			});
			
		});
		function switchVisible() {
            if (document.getElementById('logi')) {

                if (document.getElementById('logi').style.display == 'none') {
                    document.getElementById('logi').style.display = 'block';
                    document.getElementById('regis').style.display = 'none';
                }
                else {
                    document.getElementById('logi').style.display = 'none';
                    document.getElementById('regis').style.display = 'block';
                }
            }
		}

		
		$(document).ready(function(){ 
			$("#loginform").click(function(){
				$("#logi").toggle();
				
			})	
		})
		$(document).ready(function(){ 
			$("#loginfirst").click(function(){
				$("#logi").toggle();
				
			})	
		})
		
		
		</script>
		


					
			