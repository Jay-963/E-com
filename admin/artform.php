<?php
	include 'config/conn.php';
	
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: signin.php");
	}
			
		$artid = null;	
		$image = null;
		$name = null;
		$nick = null;
		$profile = null;
		$born = null;
		$address = null;
		$about = null;
		$career = null;
	
	
	
	if(isset($_GET['aid'])){
		$artid = $_GET['aid'];
		$sqlid = "select * from artists where art_id = '".$artid."'";
		$sql = mysqli_query($conn, $sqlid);
		$res = mysqli_fetch_array($sql);
		$image = $res['image'];
		$name = $res['name'];
		$nick = $res['nick_name'];
		$profile = $res['profile'];
		$born = $res['born'];
		$address = $res['address'];
		$about = trim ($res['about']);
		$career = trim ($res['career']);
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
       
            <div class="container-fluid  pt-4 px-4">
				<div class="row ">
        <div class="col-12 ">
          <div class="card bg-secondary p-4 pt-3">
				<div class="container">
					<div class="form">
						<h2>Add Artist</h2>
						<div>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Artist Name</label>
									<input type="text" value="<?php echo $name?>"  class="form-control bg-dark bg-primary" id="Name" placeholder="Name" name="email">
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2">Nick Name</label>
									<input type="text" value="<?php echo $nick?>" class="form-control bg-dark bg-primary" id="nick" placeholder="nick name" name="Price">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="Size" class="mr-sm-2">Profile</label>
									<input type="text" value="<?php echo $profile?>" class="form-control bg-dark bg-primary" id="profile" placeholder="detail" name="Size">
								</div>
								<div class="col">
									 <label for="Size" class="mr-sm-2">Date_Of_Birth</label>
									<input type="datetime-local" value="<?php echo $born?>" class="form-control bg-dark bg-primary" id="dob" placeholder="dob" name="Size">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Address</label>
									<input type="text" value="<?php echo $address?>"  class="form-control bg-dark bg-primary" id="address" placeholder="add" name="email">
								</div>
								<div class="col">
									 <label for="List Image" class="mr-sm-2">Art Image</label>
									<input type="file" value="<?php echo $image?>" class="form-control bg-dark" id="List_Image" placeholder="choose Image" name="images" >
									
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									 <label for="Description" class="mr-sm-2">About</label>
									<textarea id="about" class="bg-dark"></textarea>
								</div>
								<div class="col-12">
									<label for="Featurers" class="mr-sm-2">Career</label>
									<textarea id="career" class="bg-dark"></textarea>
								</div>
							</div>
							<div class="row">
								
							</div>
						</div>
							<?php 
								if($artid == null){
							?>
								<a type="submit" id="submit" class="btn btn-success my-3">Submit</a>
							<?php
								}else{	
							?>
								<a type="update" id="update" class="btn btn-info my-3">update</a>
							<?php
								}
							?>	
					</div>	
				</div>
				<div class="msg"></div>
				<div class="msg2"></div>
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
		CKEDITOR.replace('about');
		CKEDITOR.replace('career');
		CKEDITOR.instances['about'].setData("<?php echo $about; ?>");
		CKEDITOR.instances['career'].setData("<?php echo $career; ?>");
		
		
		$(document).ready(function(){
			$("#submit").click(function(){
				
				var Name = $("#Name").val();
				var nick = $("#nick").val();
				var profile = $("#profile").val();
				var dob = $("#dob").val();
				var address = $("#address").val();
				var about = CKEDITOR.instances['about'].getData();
				var career = CKEDITOR.instances['career'].getData();
				var List_Image = $("#List_Image")[0].files[0];
					
					
					var fd = new FormData();
					fd.append("c_Name", Name);
					fd.append("c_nick", nick);
					fd.append("c_profile", profile);
					fd.append("c_dob", dob);
					fd.append("c_address", address);
					fd.append("c_about", about);
					fd.append("c_career", career);
					fd.append("c_List_Image", List_Image);
					
					
				$.ajax({
					url : "ajax/artajax.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							console.log(resp);
							$("#Name").val('');
							$("#nick").val('');
							$("#profile").val('');
							$("#dob").val('');
							$("#address").val('');
							CKEDITOR.instances['Description'].setData("");
							CKEDITOR.instances['Featurers'].setData("");
							$("#List_Image").val('');
							swal("Good job!", "Successfully Data Inserted");
						}
					}
				})
			
				});

				$("#update").click(function(){
				
				var aid = '<?php echo $artid?>'
				var img2 = '<?php echo $image?>'
				var Name = $("#Name").val();
				var nick = $("#nick").val();
				var profile = $("#profile").val();
				var dob = $("#dob").val();
				var address = $("#address").val();
				var about = CKEDITOR.instances['about'].getData();
				var career = CKEDITOR.instances['career'].getData();
				var List_Image = $("#List_Image")[0].files[0];
					
					
					var fd = new FormData();
					fd.append("c_Name", Name);
					fd.append("c_nick", nick);
					fd.append("c_profile", profile);
					fd.append("c_dob", dob);
					fd.append("c_address", address);
					fd.append("c_about", about);
					fd.append("c_career", career);
					fd.append("c_List_Image", List_Image);
					fd.append("c_aid", aid);
					fd.append("c_img2", img2);
					
					
				$.ajax({
					url : "ajax/artupdate.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							console.log(resp);
							$("#Name").val('');
							$("#nick").val('');
							$("#profile").val('');
							$("#dob").val('');
							$("#address").val('');
							CKEDITOR.instances['Description'].setData("");
							CKEDITOR.instances['Featurers'].setData("");
							$("#List_Image").val('');
							swal("Good job!", "Successfully Data Inserted");
						}
					}
				})
			
				});			
		});		
			
	</script>
</body>

</html>