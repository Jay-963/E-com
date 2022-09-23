<?php include 'config/connection.php';
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: login.php");
	}

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <title>
    Admin page
  </title>
  <?php include 'include/stylesheet.php';
  
  ?>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
 <?php include'include/sidenave.php';?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include'include/nav.php';?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card p-4 pt-3">
				<div class="container">
					<div class="form">
						<h2>Log-in</h2>
						<form>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">User Name</label>
									<input type="text" value="<?php echo $Name;?>"  class="form-control bg-primary" id="Name" placeholder="User Name" name="email">
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
						</form>
						<?php 
							if($uid == null){
						?>
							<button type="submit" id="submit" class="btn btn-success my-3">Submit</button>
						<?php
							} else {
						?>
							<button type="update" href="user.php" id="update" class="btn btn-info my-3">update</button>
						<?php
					}
				?>
					</div>	
					<div class="msg"></div>
					<div class="msg2"></div>
				</div>
          </div>
        </div>
      </div>
      
      
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <?php include'include/script.php';?>
  <script>
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
					url : "ajax/userajax.php",
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
					url : "ajax/userupdate.php",
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
  </script>
</body>

</html>