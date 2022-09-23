<?php
	include 'admin/config/conn.php';
	
	session_start();

	
	
	$eveid = $_GET['cid'];
	$sql = "select * from event_table where cat_id = '".$eveid."' ORDER BY event_id ASC LIMIT 0, 4";
	$query = mysqli_query($conn, $sql);
	
	$getpsql3 = "select * from cat_table where cat_id = '".$eveid."'";
	$prodquery3 = mysqli_query($conn, $getpsql3);
	$prodquery4 = mysqli_fetch_array($prodquery3);
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Flipkart Copy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>	
			<div>
				<div class="container">
					<div class="list">
						<div class="row">
							<div class="col-3">
								<h4 class="pb-4">Filters</h4>
								<div id="remo" class="bg-white dropbox mt-2">
									<h6 class="mb-0" id="great"><i class="fas fa-caret-down"></i><span id="gerat2" class="pl-3">Date</span></h6>	
								</div>
								
								<div id="regis" class="bg-white dropbox">
									<div class="d-inline-flex">
										<button class="m-2 btn-sm red" >Today</button>
										<button class="m-2 btn-sm red" >Tomorrow</button>
									</div>
										<button class="m-2 btn-sm d-block red" >This Weekend</button>			
										<input id="datebox" class="" type="radio" style="border:0;"></input>
										
										<input id="date" class="pl-2 w-25 " type="date" style="border:0;" ></input>
										
								</div>
								<div id="lang" class="bg-white dropbox mt-2">
									<h6 class="mb-0"><i class="fas fa-caret-down"></i><span class="pl-3">Language</span></h6>
								</div>
								<div id="language" class="bg-white dropbox">
									<div class="d-inline-flex">
										<button class="m-2 btn-sm red" >English</button>
										<button class="m-2 btn-sm red" >Hindi</button>
										<button class="m-2 btn-sm red" >Gujrati</button>		
									</div>
										<button class="m-2 btn-sm red" >Marathi</button>			
										<button class="m-2 btn-sm red" >Tamil</button>			
								</div>
								<div id="cate" class="bg-white dropbox mt-2">
									<h6 class="mb-0"><i class="fas fa-caret-down"></i><span class="pl-3">Categories</span></h6>
								</div>
								<div id="categories" class="bg-white dropbox">
									<div class="d-inline-flex">
										<button class="m-2 btn-sm red" >Standup Comedy</button>
									</div>
										<button class="m-2 btn-sm d-block red" >Open Mic Comedy</button>			
								</div>
								<div id="filt" class="bg-white dropbox mt-2">
									<h6 class="mb-0"><i class="fas fa-caret-down"></i><span class="pl-3">More Filters</span></h6>
								</div>
								<div id="Filters" class="bg-white dropbox">
									<div class="d-inline-flex">
										<button class="m-2 btn-sm red" >Online Streaming</button>
									</div>
										<button class="m-2 btn-sm d-block red" >Out Door Events</button>			
								</div>
								<div id="prc" class="bg-white dropbox mt-2">
									<h6 class="mb-0"><i class="fas fa-caret-down"></i><span class="pl-3">Price</span></h6>
								</div>
								<div id="price" class="bg-white dropbox">
									<div class="d-inline-flex">
										<button class="m-2 btn-sm red" >Free</button>
										<button class="m-2 btn-sm red" >0-500</button>
										<button class="m-2 btn-sm red" >501-2000</button>
									</div>
										<button class="m-2 btn-sm d-block red" >Above 2000</button>			
								</div>
								<button class=" btn-lg btn-danger bg-white text-danger mt-2" style="width: -webkit-fill-available;">Brouse By Venues</button>
							</div>
							
							
							<div class="col-9">
								<div class="p-3" id= "more">
								<h4><?php echo $prodquery4['cat_name']?></h4>
								<div class="container-fluid">
									<div class="row " id="loaddata">
										<?php 
											while($row = mysqli_fetch_array($query)){
										?>
										<div class="col-md-3">
											<a href="detail.php?eid=<?php echo $row['event_id']; ?>" class="text-decoration-none">	
											<div class="py-4">
												<div class="imagesize">	
													<img class="img-fluid rounded-lg" src="admin/img/limg/<?php echo $row['list_image']?>" height="250px"/>
												</div>
												<div class="mt-3">
													<h5 class="text-dark "><?php echo $row['event_name']; ?></h5>
													<h6 class="text-dark ">Multiple Venues</h6>
													<p class="text-decoration-none text-muted m-0"><?php echo $prodquery4['cat_name']?></p>
													<p class="text-decoration-none text-muted m-0">₹ <?php echo $row['ticket'];?></p>
												</div>
											</div>
											</a>
										</div>
										<?php
											}
										?>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div id="loader" class="row mb-3">
						<button id="loadmore" class="m-auto btn-primary border-0 px-3 p-2 ">Load More</button>
						<input type="hidden" value="2" id="counter"/>
					</div>
				</div>
			</div>
		<?php include 'include/bottom.php';?>
		<?php include 'include/js.php';?>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#remo").click(function(){
					$("#regis").toggle();
				});
				
				$("#lang").click(function(){
					$("#language").toggle();
				});
				
				$("#cate").click(function(){
					$("#categories").toggle();
				});
				
				$("#filt").click(function(){
					$("#Filters").toggle();
				});
				
				$("#prc").click(function(){
					$("#price").toggle();
				});
				$("#datebox").click(function(){
					$("#date").click();
				});
			});
			
			var isScroll = true;
			$(window).scroll(function(){
				var footHeight = $("#footer").offset().top;
				console.log(isScroll);
				if(($(window).scrollTop() + $(window).height() >= footHeight + 100) && isScroll) {
					isScroll=false;
					var position = $("#loader").scrollTop();
					setTimeout(function(){isScroll=true},1000);
					console.log(position);
					
					var eveid = '<?php echo $eveid; ?>';
					var paged = parseInt($("#counter").val());					
					var limit = 4;
					
					console.log(paged);
					console.log(limit);
					
					
					var obj = {eveid, paged, limit};
					
					$.ajax({
						url : "ajax/loaddata.php",
						type : "POST",
						data : obj,
						success : function(resp){
							console.log(resp);
							var data = JSON.parse(resp);
							
							//console.log(data);
							
							data.forEach((item, index) => {
								var stru = '<div class="col-md-3">';
								stru += '<a href="detail.php?eid='+item.event_id+'" class="text-decoration-none">	<div class="py-4"><div class="imagesize">';
								stru += '<img class="img-fluid rounded-lg" src="admin/img/limg/'+item.list_image+'" height="250px"/>';
								stru += '</div><div class="mt-3">';
								stru += '<h5 class="text-dark ">'+item.event_name+'</h5><h6 class="text-dark ">Multiple Venues</h6>';
								stru += '<p class="text-decoration-none text-muted m-0">₹ '+item.ticket+'</p></div></div></a></div>';
								$("#loaddata").append(stru);
							});
							
							if(data.length < 4){
								$("#loadmore").hide();
							}
							$("#counter").val(paged+1);
							
						}
					});
				}
			});
			
			
			
		</script>
	</body>
</html>
