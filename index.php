<?php 
	include 'admin/config/conn.php';	

	$sql = "SELECT * FROM event_table ORDER BY event_id ASC LIMIT 0, 4;";
	$query = mysqli_query($conn, $sql);
?>	

	<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Flipkart Copy</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		<section class="detail">
			<div class="list">
				<div class="container-fluid">
									<div class="row " id="loaddata">
										<?php 
											while($row = mysqli_fetch_array($query)){	
										?>
										<div class="col-md-3">
											<a href="detail.php?eid=<?php echo $row['event_id']; ?>" class="text-decoration-none">	
											<div class="py-4 text-center">
												<div class="imagesize">	
													<img class="img-fluid rounded-lg" src="admin/img/limg/<?php echo $row['list_image']?>" height="250px"/>
												</div>
												<div class="mt-3">
													<h5 class="text-dark "><?php echo $row['event_name']; ?></h5>
													<h6 class="text-dark ">Multiple Venues</h6>
													<p class="text-decoration-none text-muted m-0">₹ <?php echo $row['ticket'];?></p>
												</div>
											</div>
											</a>
										</div>
										<?php
											}
										?>
									</div>
									
									
									<div id="loader" class="row mb-3">
										<button id="loadmore"  style="margin:auto; margin-bottom:10px;">Load More</button>
										<input type="hidden" value="2" id="counter" />
									</div>
									
								</div>
			</div>
		</section>
		
		
		
		<?php include 'include/bottom.php';?>
		<?php include 'include/js.php';?>
		<script type="text/javascript">
			$(window).scroll(function(){
				
				// console.log($(window).scrollTop());
				// console.log($(window).height());
				// console.log($(document).height());
				
				
				
				if($(window).scrollTop() + $(window).height() >= $(document).height() - 0.5) {
					var position = $("#loader").scrollTop();
					//var bottom = $(document).height() - $(window).height();
					
					console.log(position);
					
					
					var paged = parseInt($("#counter").val());
					var limit = 4;
					
					var obj = {paged, limit};
					
					$.ajax({
						url : "ajax/loaddata.php",
						type : "POST",
						data : obj,
						success : function(resp){
							var data = JSON.parse(resp);
							data.forEach((item, index) => {
								var bind = '<div class="col-md-3">';
								bind += '<a href="detail.php?eid='+item.event_id+'" class="text-decoration-none"><div class="py-4 text-center"><div class="imagesize">';
								bind += '<img class="img-fluid rounded-lg" src="admin/img/limg/'+item.list_image+'" height="250px"/>';
								bind += '</div><div class="mt-3">';
								bind += '<h5 class="text-dark ">'+item.event_name+'</h5><h6 class="text-dark ">Multiple Venues</h6>';
								bind += '<p class="text-decoration-none text-muted m-0">₹ '+item.ticket+'</p></div></div></a></div>';
								$("#loaddata").append(bind);
							});
							if(data.length < 4){
								$("#loadmore").hide();
							}
							//console.log(paged+1);
							$("#counter").val(paged+1);
								
						}
					});
				}
			});
			
			
		</script>
	</body>
</html>

