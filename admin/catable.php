<?php 
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: login.php");
	}
	

	include 'config/connection.php';
	$product = "select * from catable";
	
	$queryrun = mysqli_query($conn, $product);
	?>
<!DOCTYPE html>
<html lang="en">

<head>
 <title>
    Admin Page
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
		
		  <a type="button" href="catform.php" class="btn btn-info">Add catagory</a>
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">createdate</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Delete</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Update</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
						while($product = mysqli_fetch_array($queryrun)){
					?>
                    <tr>
						<td class="text-center"><?php echo $product['name'];?></td>
						<td class="text-center"><?php echo $product['status'];?></td>
						<td class="text-center"><?php echo $product['createdate'];?></td>
						
						<td class="text-center">
							<button class="btn btn-danger" onclick="statusdeletefunc(<?php echo $product['id']; ?>)">Delete</button>
						</td>
						<td class="text-center">
							<a href="catform.php?id=<?php echo $product['id']; ?>" class="btn btn-success">update</a>
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
  </main>
 
  <!--   Core JS Files   -->
  <?php include'include/script.php';?>
  <script>
		function statusdeletefunc(id){
			$.ajax({
				url:'ajax/catdelete.php',
					type:'POST',
						data:{id},
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

		


	