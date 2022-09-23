<?php
	include 'config/conn.php';
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: signin.php");
	}
	
	$uid = null;
	$Name = null;
	$Email = null;
	$Mobile = null;
	$Address = null;
	$Password = null;
	$Image = null;
	
	if(isset($_GET['userid'])){
		$uid = $_GET['userid'];
		$sqlid = "select * from user_table where user_id = '".$uid."'";
		$resp = mysqli_query($conn, $sqlid);
		$result = mysqli_fetch_array($resp);
		
		$Name = $result['name'];
		$Email = $result['email'];
		$Mobile = $result['mobile'];
		$Address = $result['address'];
		$Password = $result['password'];
		$Image = $result['image'];
	}
	
	
	
	
?>
	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
       	<?php include 'include/sidenav.php'?>
       
        <div class="content">
           
				<?php include 'include/navs.php'?>
       
            <div class="container-fluid pt-4 px-4">
				<div class="row">
					<div class="col-12">
						<div class="card bg-secondary p-4 pt-3">
							<div class="row">
								<div class="col">
									<label for="name" class="mr-sm-2 text-primary">User Name</label>
									<input type="text" value="<?php echo $Name?>"  class="form-control bg-dark mb-4 mt-2" id="name" name="email">						
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2 text-primary">Email Address</label>
									<input type="email" value="<?php echo $Email?>" class="bg-dark form-control mb-4 mt-1" id="Email" name="Price">
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="name" class="mr-sm-2 text-primary">Mobile</label>
									<input type="number" value="<?php echo $Mobile?>"  class="form-control bg-dark mb-4 mt-2" id="Mobile" name="email">						
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2 text-primary">Address</label>
									<input type="text" value="<?php echo $Address?>" class="bg-dark form-control mb-4 mt-1" id="Address" name="Price">
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label for="Price" class="mr-sm-2 text-primary">Image</label>
									<input type="file" value="<?php echo $Image;?>" class="bg-dark form-control mb-4 mt-1" id="image" name="Price">
								</div>
								<div class="col">
									<label for="name" class="mr-sm-2 text-primary">Password</label>
									<input type="password" value="<?php echo $Password?>"  class="form-control bg-dark mb-4 mt-2" id="Password" name="email">
								</div>
							</div>
							<div>
										
								<?php 
										if($uid == null){
									?>
										<a type="button" id="submit" class="btn btn-success my-3">Submit</a>
									<?php
										} else {
									?>
										<a type="button" id="update" class="btn btn-info my-3">update</a>
									<?php
										}
									?>
								
							</div>
						</div>
					</div>
			  </div>
            </div>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include 'include/js.php'?>

	<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				var name = $("#name").val();
				var Email = $("#Email").val();
				var Mobile = $("#Mobile").val();
				var Address = $("#Address").val();
				var Password = $("#Password").val();
				var image = $("#image")[0].files[0];
				
				
				var fd = new FormData();
					fd.append("t_name", name);
					fd.append("t_Email", Email);
					fd.append("t_Mobile", Mobile);
					fd.append("t_Address", Address);
					fd.append("t_Password", Password);
					fd.append("t_image", image);
					
					
				$.ajax({
					url: "ajax/userajax.php",
					type: "POST",
					data: fd,
					processData:false,
					contentType:false,
					success:function(resp){
						console.log(resp);
						if(resp == 1){
						$("#name").val('');
						$("#Email").val('');
						$("#Mobile").val('');
						$("#Address").val('');
						$("#Password").val('');
						$("#image").val('');
						swal("Good job!", "Successfully Data Inserted");
						}
					}
				});	
			});
			
			$("#update").click(function(){
			
				var uid  = '<?php echo $uid ?>';
				var img  = '<?php echo $Image ?>';
				var name = $("#name").val();
				var Email = $("#Email").val();
				var Mobile = $("#Mobile").val();
				var Address = $("#Address").val();
				var Password = $("#Password").val();
				var image = $("#image")[0].files[0];
				
				
					
					var fd = new FormData();
					console.log(fd);
					fd.append("t_uid", uid);
					fd.append("t_Name", name);
					fd.append("t_Email", Email);
					fd.append("t_Mobile", Mobile);
					fd.append("t_Address", Address);
					fd.append("t_Password", Password);
					fd.append("t_image", image);
					fd.append("t_img", img);
					
					
					
					$.ajax({
					url : "ajax/userupdate.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							console.log(resp);
							if(resp == 1){
								$("#name").val('');
								$("#Email").val('');
								$("#Mobile").val('');
								$("#Address").val('');
								$("#Password").val('');
								$("#image").val('');
								swal("Good job!",  "Successfully Data Updated");
							}
						}
					}
				})
			
				});
				
			
			
			
				
		});
		
	</script>
</body>

</html>