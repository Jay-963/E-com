<?php 
	include 'config/conn.php';
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: signin.php");
	}
	
	$cat = "select * from artists";
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
       
            <div class="container-fluid pt-4  px-4">
               <div class="row">
				<div class="col-12">
		
		  <a type="button" href="artform.php" class="btn btn-info mb-3">Add Artist</a>
          <div class="card bg-secondary mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 " >
                  <thead>
                    <tr>
					
					 <th class="text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Artist Image</th>
                      <th class="text-uppercase text-light text-xxs font-weight-bolder opacity-7 ps-2 text-center">Artist Name</th>
                      <th class="text-center text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Nick Name</th>
                      <th class="text-center text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Profile</th>
                      <th class="text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Born</th>
                      <th class="text-uppercase text-light text-xxs font-weight-bolder opacity-7 ps-2 text-center">Address</th>
                      <th class="text-center text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">About</th>
					  <th class="text-center text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Career</th>
					  
                      <th class="text-center text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Delete</th>
                      <th class="text-center text-uppercase text-light text-xxs font-weight-bolder opacity-7 text-center">Update</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
						while($product = mysqli_fetch_array($query)){
					?>
                    <tr>
						<td class="text-center">
							<img src="img/artimg/<?php echo $product['image'];?>" width="50px" height="50px"/>
						</td>
						<td class="text-center"><?php echo $product['name'];?></td>
						<td class="text-center"><?php echo $product['nick_name'];?></td>
						<td class="text-center"><?php echo $product['profile'];?></td>
						<td class="text-center"><?php echo $product['born'];?></td>
						<td class="text-center"><?php echo $product['address'];?></td>
						<td class="text-center"><?php echo $product['about'];?></td>
						<td class="text-center"><?php echo $product['career'];?></td>
						
						<td class="text-center">
							<button class="btn btn-danger" onclick="deletefunct(<?php echo $product['art_id']; ?>)">Delete</button>
						</td>
						<td class="text-center">
							<a type="button" class="btn btn-success" href="artform.php?aid=<?php echo $product['art_id'];?>">Update</a>
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

    </div>

    <?php include 'include/js.php'?>
	
	<script>
		function deletefunct(art_id){
			$.ajax({
				url:"ajax/artdelete.php",
				type:"POST",
				data:{art_id},
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