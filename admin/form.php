<?php include 'config/connection.php';

	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: login.php");
	}
	
	$catsql = "select * from catable";
	$catquery = mysqli_query($conn, $catsql);
	



	$uid = null;
	$catup = null;
	$Name = null;
	$Price = null;
	$Size = null;
	$Quantity = null;
	$Description = null;
	$Featurers = null;
	$List_Image = null;
	$Detail_Image = null;
	
	if(isset($_GET['id'])){
		$uid = $_GET['id'];
		$sqlid = "select * from flipkart where id = '".$uid."'";
		$resp = mysqli_query($conn, $sqlid);
		$result = mysqli_fetch_array($resp);
		$catup = $result['cat_id'];
		$Name = $result['name'];
		$Price = $result['price'];
		$Size = $result['size'];
		$Quantity = $result['quantity'];
		$Description = trim ($result['description']);
		$Featurers = trim ($result['features']);
		$List_Image = $result['list_image'];
		$Detail_Image = $result['detail_image'];
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <title>
    Admin page
  </title>
  <?php include 'include/stylesheet.php';?>
  <link rel="stylesheet" href="css/form.css">
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
						<h2>Add Your Products</h2>
						<form>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Select catagory</label>
									<select id="cat" class="form-control">
										<option value="<?php echo $catup ?>">--select category--</option>
										<?php
											while($row = mysqli_fetch_array($catquery)){
											?>
												<option <?php echo ($catup == $row['id']) ? "selected": ""; ?> value="<?php echo $row['id' ]; ?>" ><?php echo $row['name']; ?></option>
											<?php											
											}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Product Name</label>
									<input type="text" value="<?php echo $Name;?>"  class="form-control bg-primary" id="Name" placeholder="Product Name" name="email">
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2">Product Price</label>
									<input type="number" value="<?php echo $Price;?>" class="form-control bg-primary" id="Price" placeholder="Price" name="Price">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="Size" class="mr-sm-2">Size</label>
									<input type="text" value="<?php echo $Size;?>" class="form-control bg-primary" id="Size" placeholder="Size" name="Size">
								</div>
								<div class="col">
									<label for="Quantity" class="mr-sm-2">Quantity</label>
									<input type="number" value="<?php echo $Quantity;?>" class="form-control bg-primary" id="Quantity" placeholder="Quantity" name="Quantity">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									 <label for="Description" class="mr-sm-2">Description</label>
									<textarea id="Description"></textarea>
								</div>
								<div class="col-12">
									<label for="Featurers" class="mr-sm-2">Featurers</label>
									<textarea id="Featurers"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="List Image" class="mr-sm-2">List Image</label>
									<input type="file" value="images/limg/<?php echo $List_Image;?>" class="form-control bg-primary d-none" id="List_Image" placeholder="choose Image" name="images" >
									<input type="hidden" class="form-control" id="hideimage" placeholder="Image" name="">
									<div class="preimage" id="upimg">
										<img src="images/dummy.jpg" id="dumimage" />
									</div>
								</div>
								<div class="col">
									 <label for="Detail Image" class="mr-sm-2">Detail Image</label>
									<input type="file" value="images/dimg/<?php echo $Detail_Image;?>" class="form-control bg-primary d-none" id="Detail_Image" placeholder="choose Image" name="images" >
									<input type="hidden" class="form-control" id="hideimagedet" placeholder="Image" name="">
									<div class="preimage" id="upimgdetail">
										<img src="images/dummy.jpg" id="dumimagedetail" />
									</div>
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
							<button type="update" href="form.php" id="update" class="btn btn-info my-3">update</button>
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
  </main>
 
  <!--   Core JS Files   -->
  <?php include'include/script.php';?>
  
  <script>
	CKEDITOR.replace( 'Description' );
	CKEDITOR.replace( 'Featurers' );
	CKEDITOR.instances['Description'].setData("<?php echo $Description; ?>");
	CKEDITOR.instances['Featurers'].setData("<?php echo $Featurers; ?>");
	
	
	$(document).ready(function(){
		
		$("#upimg").click(function(){
			$("#List_Image").click();
		});
		
		$("#List_Image").change(function(){
			var file = $(this)[0].files[0];
			var filename = $("#hideimage").val();
			var fd = new FormData();  
			fd.append("c_file",file);
			fd.append("c_filename",filename);
			
			$.ajax({
				 url:"ajax/preimage.php",
				 type:"POST",
				 data:fd,
				 processData:false,
				 contentType:false,
				 success:function(resp){
					 console.log(resp);
					$("#hideimage").val(resp);
					$("#dumimage").attr("src", "");
					$("#dumimage").attr("src", "images/limg/"+resp);
				 }
		   });
		});
		
		$("#upimgdetail").click(function(){
			$("#Detail_Image").click();
		});
		
		$("#Detail_Image").change(function(){
			var file = $(this)[0].files[0];
			var filename = $("#hideimagedet").val();
			var fd = new FormData();
			fd.append("c_file",file);
			fd.append("c_filename",filename);
			
			$.ajax({
				 url:"ajax/preimagedet.php",
				 type:"POST",
				 data:fd,
				 processData:false,
				 contentType:false,
				 success:function(resp){
					 console.log(resp);
					$("#hideimagedet").val(resp);
					$("#dumimagedetail").attr("src", "");
					$("#dumimagedetail").attr("src", "images/dimg/"+resp);
				 }
		   });
		})
		
		$("#submit").click(function(){
				
				var Name = $("#Name").val();
				var Price = $("#Price").val();
				var Size = $("#Size").val();
				var Quantity = $("#Quantity").val();
				var Description = CKEDITOR.instances['Description'].getData();
				var Featurers = CKEDITOR.instances['Featurers'].getData();
				var List_Image = $("#List_Image")[0].files[0];
				var Detail_Image = $("#Detail_Image")[0].files[0];
				var cat_id = $("#cat").val();
					
					//console.log(Featurers);
					
					var fd = new FormData();
					// console.log(fd);
					fd.append("c_Name", Name);
					fd.append("c_Price", Price);
					fd.append("c_Size", Size);
					fd.append("c_Quantity", Quantity);
					fd.append("c_Description", Description);
					fd.append("c_Featurers", Featurers);
					fd.append("c_List_Image", List_Image);
					fd.append("c_Detail_Image", Detail_Image);
					fd.append("c_cat_id", cat_id);
					
					
				var obj = {
					c_Name :Name,
					c_Price :Price,
					c_Size :Size,
					c_Quantity :Quantity,
					c_Description :Description,
					c_Featurers :Featurers,
					c_List_Image :List_Image,
					c_Detail_Image :Detail_Image,
					c_cat_id :cat_id
					
				}
					if(cat_id	== ""){
					alert("Select Cat");	
				}
					else if(Name == ""){
					alert("fill Name");	
				}
					else if(Price == ""){
					alert("1");
				}
					else if(Quantity == ""){
					alert("2");
				}
					else if(Description == ""){
					alert("3");
				}
					else if(Featurers == ""){
					alert("4");	
				}
					else if(List_Image == ""){
					alert("5");
				}
					else if(Detail_Image == ""){
					alert("6");
				}
				
				else{$.ajax({
					url : "ajax/ajax.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg").html("successfully data inserted");
							console.log(resp);
							$("#cat").val('');
							$("#Name").val('');
							$("#Price").val('');
							$("#Size").val('');
							$("#Quantity").val('');
							CKEDITOR.instances['Description'].setData("");
							CKEDITOR.instances['Featurers'].setData("");
							$("#List_Image").val('');
							$("#Detail_Image").val('');
							$("#dumimage").val('');
							$("#dumimagedetail").val('');
						}
					}
				})
			
				}
			});	
			
		$("#update").click(function(){
			
				var uid  = '<?php echo $uid ?>';
				var cat = $("#cat").val();
				var Name = $("#Name").val();
				var Price = $("#Price").val();
				var Size = $("#Size").val();
				var Quantity = $("#Quantity").val();
				var Description = $("#Description").val();
				var Featurers = $("#Featurers").val();
				var List_Image = $("#List_Image")[0].files[0];
				var Detail_Image = $("#Detail_Image")[0].files[0];
					
					var fd = new FormData();
					// console.log(fd);
					fd.append("c_uid", uid);
					fd.append("c_cat", cat);
					fd.append("c_Name", Name);
					fd.append("c_Price", Price);
					fd.append("c_Size", Size);
					fd.append("c_Quantity", Quantity);
					fd.append("c_Description", Description);
					fd.append("c_Featurers", Featurers);
					fd.append("c_List_Image", List_Image);
					fd.append("c_Detail_Image", Detail_Image);
					
					
				var obj = {
					c_cat : cat,
					c_Name :Name,
					c_Price :Price,
					c_Size :Size,
					c_Quantity :Quantity,
					c_Description :Description,
					c_Featurers :Featurers,
					c_List_Image :List_Image,
					c_Detail_Image :Detail_Image
					
				}
					if(Name == ""){
					alert("fill Name");	
				}
					else if(Price == ""){
					alert("fill price");
				}
					else if(Quantity == ""){
					alert("fill Quantity");
				}
					else if(Description == ""){
					alert("fill Description");
				}
					else if(Featurers == ""){
					alert("fill Featurers");	
				}
					else if(List_Image == ""){
					alert("select img");
				}
					else if(Detail_Image == ""){
					alert("select img 2");
				}
				
				else{$.ajax({
					url : "ajax/update.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg2").html("successfully data updated");
							console.log(resp);
							$("#cat").val('');
							$("#Name").val('');
							$("#Price").val('');
							$("#Size").val('');
							$("#Quantity").val('');
							$("#Description").val('');
							$("#Featurers").val('');
							$("#List_Image").val('');
							$("#Detail_Image").val('');
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