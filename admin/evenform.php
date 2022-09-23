<?php
	include 'config/conn.php';
	
	
	session_start();

	if(!isset($_SESSION['token']) && $_SESSION['token'] == null){
		header("Location: signin.php");
	}
	
	$catsql = "select * from cat_table";
	$catquery = mysqli_query($conn, $catsql);
	
		$uid = null;
		$catup = null; 
		$name = null;
		$ticket = null;
		$release = null;
		$open = null;
		$close = null;
		$seats = null;
		$description = null;
		$features = null;
		$list_image = null;
		$detail_image = null;
		$cat_id = null;
	
	if(isset($_GET['eid'])){
		$uid = $_GET['eid'];
		$sqlid = "select * from event_table where event_id = '".$uid."'";
		$resp = mysqli_query($conn, $sqlid);
		$result = mysqli_fetch_array($resp);
		$catup = $result['cat_id'];
		$name = $result['event_name'];
		$ticket = $result['ticket'];
		$release = $result['date_on'];
		$open = $result['tickets_closing'];
		$close = $result['tickets_closing'];
		$seats = $result['seats'];
		$description = trim ($result['description']);
		$features = trim ($result['features']);
		$list_image = $result['list_image'];
		$detail_image = $result['detail_image'];
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
						<h2>Add New Events</h2>
						
						<div>
							<div class="row">
								<ul id="bindList">
									
								</ul>
							</div>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Select catagory</label>
									<select id="cat" class="form-control bg-dark">
										<option value="<?php echo $catup ?>">--select category--</option>
										<?php
											while($row = mysqli_fetch_array($catquery)){
											?>
												<option class="bg-dark"<?php echo ($catup == $row['cat_id']) ? "selected": ""; ?> value="<?php echo $row['cat_id' ]; ?>" ><?php echo $row['cat_name']; ?></option>
											<?php											
											}
										?>
									</select>
								</div>
								<div class="col">
									 <label for="name" class="mr-sm-2">Select Artists</label>
									<div class="input_wrap">
										<div>
											<input type="text" value=""  class="form-control bg-dark bg-primary" id="artist_id" placeholder="Search Artist" oninput="searchArtists(this)">
										</div>
										<div class="artist_list" >
											<ul id="list_search">
												
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Event Name</label>
									<input type="text" value="<?php echo $name;?>"  class="form-control bg-dark bg-primary" id="Name" placeholder="Product Name" name="email">
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2">Tickets</label>
									<input type="number" value="<?php echo $ticket;?>" class="form-control bg-dark bg-primary" id="ticket" placeholder="ticket" name="Price">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="Size" class="mr-sm-2">Releasing Date</label>
									<input type="date" value="<?php echo $release;?>" class="form-control bg-dark bg-primary" id="Release" placeholder="Release" name="Size">
								</div>
								<div class="col">
									 <label for="Size" class="mr-sm-2">Seats</label>
									<input type="number" value="<?php echo $seats;?>" class="form-control bg-dark bg-primary" id="seats" placeholder="Release" name="Size">
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="name" class="mr-sm-2">Tickets Opening</label>
									<input type="date" value="<?php echo $open;?>"  class="form-control bg-dark bg-primary" id="Open" placeholder="Product Name" name="email">
								</div>
								<div class="col">
									<label for="Price" class="mr-sm-2">Tickets Closing</label>
									<input type="date" value="<?php echo $close;?>" class="form-control bg-dark bg-primary" id="Close" placeholder="ticket" name="Price">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									 <label for="Description" class="mr-sm-2">Description</label>
									<textarea id="Description" class="bg-dark"></textarea>
								</div>
								<div class="col-12">
									<label for="Featurers" class="mr-sm-2">Featurers</label>
									<textarea id="Featurers" class="bg-dark"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col">
									 <label for="List Image" class="mr-sm-2">List Image</label>
									<input type="file" value="<?php echo $list_image;?>" class="form-control bg-dark" id="List_Image" placeholder="choose Image" name="images" >
									
								</div>
								<div class="col">
									 <label for="Detail Image" class="mr-sm-2">Detail Image</label>
									<input type="file" value="<?php echo $detail_image;?>" class="form-control bg-dark " id="Detail_Image" placeholder="choose Image" name="images" >
								</div>
							</div>
						</div>
							<?php 
								if($uid == null){
							?>
								<a type="submit" id="submit" class="btn btn-success my-3">Submit</a>
							<?php
								} else {
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
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include 'include/js.php'?>

	<script>
		CKEDITOR.replace( 'Description' );
		CKEDITOR.replace( 'Featurers' );
		CKEDITOR.instances['Description'].setData("<?php echo $description; ?>");
		CKEDITOR.instances['Featurers'].setData("<?php echo $features; ?>");
		
		
		
		$(document).ready(function(){
			$("#artist_id").focus(function(){
				$(".artist_list").removeClass('hide');
			});
			
			$("#artist_id").blur(function(){
				$(".artist_list").addClass('hide');
			});
		
			$("#submit").click(function(){
				
				
				var listEl = $("#bindList li");
				var arr = [...listEl];
				// var artArr = [];
				// arr.forEach((item, index) => {
					// artArr.push(item.getAttribute('data-id'));
					
				// });
				// console.log(artArr);
				var artArr = '';
				arr.forEach((item, index) => {
					if(artArr == ''){
						var com = '';
					} else { com = ','}
					artArr += com + item.getAttribute('data-id');
				});
				console.log(artArr);
				
				
				
				var Name = $("#Name").val();
				var ticket = $("#ticket").val();
				var Release = $("#Release").val();
				var seats = $("#seats").val();
				var Open = $("#Open").val();
				var Close = $("#Close").val();
				var Description = CKEDITOR.instances['Description'].getData();
				var Featurers = CKEDITOR.instances['Featurers'].getData();
				var List_Image = $("#List_Image")[0].files[0];
				var Detail_Image = $("#Detail_Image")[0].files[0];
				var cat_id = $("#cat").val();
					// console.log(search);
					
					var fd = new FormData();
					fd.append("c_search", artArr)
					fd.append("c_Name", Name);
					fd.append("c_ticket", ticket);
					fd.append("c_Release", Release);
					fd.append("c_seats", seats);
					fd.append("c_Open", Open);
					fd.append("c_Close", Close);
					fd.append("c_Description", Description);
					fd.append("c_Featurers", Featurers);
					fd.append("c_List_Image", List_Image);
					fd.append("c_Detail_Image", Detail_Image);
					fd.append("c_cat_id", cat_id);
					
					
				$.ajax({
					url : "ajax/ajax.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							$("#msg").html("successfully data inserted");
							console.log(resp);
							$("#artist_id").val('');
							$("#cat").val('');
							$("#Name").val('');
							$("#ticket").val('');
							$("#Release").val('');
							$("#seats").val('');
							$("#open").val('');
							$("#Close").val('');
							CKEDITOR.instances['Description'].setData("");
							CKEDITOR.instances['Featurers'].setData("");
							$("#List_Image").val('');
							$("#Detail_Image").val('');
							swal("Good job!", "Successfully Data Inserted");
						}
					}
				})
			
				});	
				
			$("#update").click(function(){
				
				var listEl = $("#bindList li");
				var arr = [...listEl];
				// var artArr = [];
				// arr.forEach((item, index) => {
					// artArr.push(item.getAttribute('data-id'));
					
				// });
				// console.log(artArr);
				var artArr = '';
				arr.forEach((item, index) => {
					if(artArr == ''){
						var com = '';
					} else { com = ','}
					artArr += com + item.getAttribute('data-id');
				});
				console.log(artArr);
				
				
				
				var uid = '<?php echo $uid?>';
				var Name = $("#Name").val();
				var ticket = $("#ticket").val();
				var Release = $("#Release").val();
				var seats = $("#seats").val();
				var Open = $("#Open").val();
				var Close = $("#Close").val();
				var Description = CKEDITOR.instances['Description'].getData();
				var Featurers = CKEDITOR.instances['Featurers'].getData();
				var List_Image = $("#List_Image")[0].files[0];
				var Detail_Image = $("#Detail_Image")[0].files[0];
				var limg = '<?php echo $list_image?>';
				var dimg = '<?php echo $detail_image?>';
				var cat_id = $("#cat").val();
				
					console.log(Description);
					
					
					var fd = new FormData();
					console.log(fd);
					fd.append("c_search", artArr)
					fd.append("c_uid", uid);
					fd.append("c_Name", Name);
					fd.append("c_ticket", ticket);
					fd.append("c_Release", Release);
					fd.append("c_seats", seats);
					fd.append("c_Open", Open);
					fd.append("c_Close", Close);
					fd.append("c_Description", Description);
					fd.append("c_Featurers", Featurers);
					fd.append("c_List_Image", List_Image);
					fd.append("c_Detail_Image", Detail_Image);
					fd.append("c_limg", limg);
					fd.append("c_dimg", dimg);
					fd.append("c_cat_id", cat_id);
					
					
				$.ajax({
					url : "ajax/update.php",
					type : "POST",
					data : fd,
					processData:false,
					contentType:false,
					success : function(resp){
						if(resp == 1){
							swal("Good job!", "Successfully Data Updated");
							console.log(resp);
							$("#artist_id").val('');
							$("#cat").val('');
							$("#Name").val('');
							$("#ticket").val('');
							$("#Release").val('');
							$("#seats").val('');
							$("#open").val('');
							$("#Close").val('');
							CKEDITOR.instances['Description'].setData("");
							CKEDITOR.instances['Featurers'].setData("");
							$("#List_Image").val('');
							$("#Detail_Image").val('');
						}
					}
				})
			
				});	
				
				$(document).on('click', '.list_item', function(){
					var id = $(this).data('id');
					var name = $(this).find('h4').html();
					//$("#artist_id").val(name);
					var el = "<li data-id='"+id+"'>";
								el += "<div>";
								el += "<h4>"+name+"</h4>";
								el += "<span>X</span></div></li>";
					$("#bindList").append(el);
				});
				$(document).on('click', '#bindList li span', function(){
					var el  = $(this).parents('li').remove();
					console.log(el);
				});
		});
		function searchArtists(event){
			var searchVal = event.value;
			$("#list_search").html("");
			$.ajax({
					url : "ajax/searchArtists.php",
					type : "POST",
					data : {s_val:searchVal},
					success : function(resp){
						if(resp != 0){
							var searchdata = JSON.parse(resp);
							//console.log(searchdata);
							searchdata.forEach((item, index) => {
								var el = "<li data-id='"+item.art_id+"' class='list_item'><div>";
								el += "<img width='50px' src='img/artimg/"+item.image+"' /></div><div>";
								el += "<h4>"+item.name+"</h4>";
								el += "<p>"+item.profile+"</p></div></li>";
								$("#list_search").append(el);
							});
						} else {
							$("#list_search").html("");
						}
						
					}
			})
		}
			
	</script>
</body>

</html>