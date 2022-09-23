<?php include 'config/connection.php';
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: login.php");
	}
	
	$uid = null;
	$Name = null;
	$image = null;
	
	if(isset($_GET['id'])){
		$uid = $_GET['id'];
		$sqlid = "select * from catable where id = '".$uid."'";
		$resp = mysqli_query($conn, $sqlid);
		$result = mysqli_fetch_array($resp);
		
		$Name = $result['name'];
		$Image = $result['image'];
		
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
						<h2>Catogries</h2>
						<form>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Cat Type</label>
									<input type="text" value="<?php echo $Name;?>"  class="form-control bg-primary" id="Name" placeholder="Name" name="name">
								</div>
								<div class="col">
									 <label for="name" class="mr-sm-2">Catagory Image</label>
									<input type="file" value="<?php echo $Image;?>"  class="form-control bg-primary" id="img" placeholder="place image" name="img">
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
				var image = $("#img")[0].files[0];
				
				var fd = new FormData();
					fd.append("c_Name", Name);
					fd.append("c_img", image);
					
				var obj = {
					c_Name : Name,
					c_img : image
					
				}
					
				
				$.ajax({
					url : "ajax/catajax.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg").html("successfully data inserted");
							//console.log(resp);
							$("#Name").val('');
							$("#img").val('');
						
						}
					}
				})
			
				}
			});	
			
		$("#update").click(function(){
			
				var uid  = '<?php echo $uid ?>';
				var Name = $("#Name").val();
				
					
					
				var obj = {
					c_Name :Name,
				
				}
					if(Name == ""){
					alert("fill Name");	
				}
				
				else{$.ajax({
					url : "ajax/catupdate.php",
					type : "POST",
					data : obj,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg2").html("successfully data updated");
							//console.log(resp);
							$("#Name").val('');
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