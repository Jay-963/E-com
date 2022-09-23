<?php
	include 'config/conn.php';
	
	
?>
	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	 <div class="container-fluid position-relative d-flex p-0">
       	<?php include 'include/sidenav.php'?>
       
        <div class="content">
           
				<?php include 'include/navs.php'?>
       
            <div class="container-fluid pt-4 px-4">
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
		
		
	<script>
		$(document).ready(function(){
			
		});
			
	</script>
</body>

</html>