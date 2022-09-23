<?php
	include 'config/conn.php';
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: signin.php");
	}
	
	$uid = null;
	$Name = null;
	$Image = null;
	
	if(isset($_GET['id'])){
		$uid = $_GET['id'];
		$sqlid = "select * from cat_table where cat_id = '".$uid."'";
		$sql = mysqli_query($conn, $sqlid);
		$result = mysqli_fetch_array($sql);
		
		$Name = $result['cat_name'];
		$Image = $result['cat_image'];
		$Email = $result[''];
		// echo $Image;
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
						<div class="card bg-secondary p-4 pt-3">
							<div class="row">
								<div class="col">
									<label for="name" class="mr-sm-2 text-primary">Cat Name</label>
									<input type="text" value="<?php echo $Name?>"  class="form-control bg-dark mb-4 mt-2" id="name" name="email">						
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2 text-primary">Cat Image</label>
									<input type="file" value="<?php echo $Image;?>" class="bg-dark form-control mb-4 mt-1" id="image" name="Price">
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

    <?php include 'include/js.php'?>

	<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				var name = $("#name").val();
				var image = $("#image")[0].files[0];
				
				var fd = new FormData();
					fd.append("t_name", name);
					fd.append("t_image", image);
					
				$.ajax({
					url: "ajax/catinsert.php",
					type: "POST",
					data: fd,
					processData:false,
					contentType:false,
					success:function(resp){
						if(resp == 1){
						$("#name").val("");
						$("#image").val("");
						swal("Good job!", "Successfully Data Inserted");
						}
					}
				});	
			});
			
			
			
				
		});
		
		
			$("#update").click(function(){
				var uid = '<?php echo $uid?>';
				var type = $("#type").val();
				var image = $("#image")[0].files[0];
				var img = '<?php echo $Image?>';
				
				// console.log(type);
				
				var fd = new FormData();
					fd.append("c_uid", uid);
					fd.append("c_type", type);
					fd.append("c_image", image);
					fd.append("c_img", img);
					
					
				$.ajax({
					url: "ajax/catupdate.php",
					type: "POST",
					data: fd,
					processData:false,
					contentType:false,
					success:function(resp){
						if(resp == 1){
							swal("Good job!",  "Successfully Data Updated");
						}
					}
				});	
			});
			
	</script>
</body>

</html>