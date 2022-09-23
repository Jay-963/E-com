<?php 
	include 'config/conn.php';
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: signin.php");
	}
	
	$cat = "select * from cat_table";
	$query = mysqli_query($conn, $cat);
	

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
				 <a type="button" href="catform.php" class="btn btn-info mb-3">Add Catagory</a>
				 <div class="card bg-secondary mb-4">
                <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
						<th class="text-center text-light  text-xxs font-weight-bolder opacity-7 text-center">name</th>
						<th class=" text-light text-xxs font-weight-bolder opacity-7 text-center">image</th>
						<th class=" text-light text-xxs font-weight-bolder opacity-7 ps-2 text-center">create_date</th>
						<th class="text-center text-light  text-xxs font-weight-bolder opacity-7 text-center">delete</th>
						<th class="text-center text-light  text-xxs font-weight-bolder opacity-7 text-center">update</th>
						<th class="text-light opacity-7"></th>
					</tr>
                  </thead>
                  <tbody>
						<?php
							while($catagory = mysqli_fetch_array($query)){
						?>
					
						<tr>
							<td class="text-center"><?php echo $catagory['cat_name'];?></td>
							<td class="text-center">
								<img src="img/catimg/<?php echo $catagory['cat_image'];?>" width="50px" height="50px"/>
							</td>
							<td class="text-center"><?php echo $catagory['create_date'];?></td>
							
							<td class="text-center">
								<button class="btn btn-danger" onclick="deletefunct(<?php echo $catagory['cat_id'];?>)">Delete</button>
							</td>
							<td class="text-center">
								<a type="button" class="btn btn-success" href="catform.php?id=<?php echo $catagory['cat_id'];?>">Update</a>
							</td>
						</tr>
						
						<?php
							}
						?>
                  </tbody>
                </table>
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
		function deletefunct(cat_id){
			$.ajax({
				url:"ajax/catdelete.php",
				type:"POST",
				data:{cat_id},
				success: function(resp){
					console.log(resp);{
						location.reload();
					}
				}
				
			})
		}
	</script>
</body>

</html>