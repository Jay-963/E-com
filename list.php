<?php
	include 'admin/config/connection.php';
	session_start();
	
	$page = 1;
	/* if(isset($_GET['page'])){
		$page = $_GET['page'];
	} */
	$limit = 8;
	
	$offset = (($page - 1) * $limit);  
	
	$catid = $_GET['cid'];
	$getpsql2 = "select * from flipkart where cat_id = '".$catid."' limit ".$offset.", ".$limit."";
	$prodquery2 = mysqli_query($conn, $getpsql2);
	
	$getpsql3 = "select * from catable where id = '".$catid."'";
	$prodquery3 = mysqli_query($conn, $getpsql3);
	$prodquery4 = mysqli_fetch_array($prodquery3);
	
	$getpsql4 = "select * from flipkart where cat_id = '".$catid."'";
	$prodquery5 = mysqli_query($conn, $getpsql4);
	$pagination = ceil($prodquery5->num_rows / $limit);
	// echo $prodquery3;
	
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
			<div class="m-2 shadow-lg mt-3 bg-white border border-grey border-left-0 border-right-0 border-bottom-0 ">
					<div class="">
						<div class="d-flex justify-content-between border border-grey border-left-0 border-right-0 border-top-0 ">
							<div class="p-3"><h3><?php echo $prodquery4['name'] ?></h3></div>
						</div>
					</div>	
				<div class="container-fluid">
					<div class="row " id="loaddata">
						<?php
								while($prow2 = mysqli_fetch_array($prodquery2)){
							?>
						<div class="col-md-3">
							<a href="detail.php?pid=<?php echo $prow2['id']; ?>" class="text-decoration-none">	
							<div class="p-4 list">
								<div>
									<div class="imagesize">	
											<img class="img-fluid " src="admin/images/limg/<?php echo $prow2['list_image']; ?>" height="250px"/>
									</div>
								</div>
								<div class="mt-3">
									<p class="text-decoration-none"><h5 class="text-dark "><?php echo $prow2['name']; ?></h5></p>
									<p class="text-decoration-none"><p class="text-success mb-0">₹<?php echo $prow2['price']; ?></p></p>
									<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
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
			
			<div class="highlight" style="text-align:center;">
				<ul class="text-center nav justify-content-center">
					<?php 
						for($i=1; $i<=$pagination; $i++){
							?>
								<li class="m-2 bg-primary  text-light"><a class="text-light px-2 text-decoration-none" href="list.php?cid=<?php echo $catid; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php
						}
					
					?>
				</ul>
				<input type="hidden" value="2" id="page" />
				<button id="loadmore" class="btn btn-primary">Load More</button>
			</div>	
		<?php include 'include/bottom.php';?>	
		<?php include 'include/js.php';?>
		
		<script>
			$(document).ready(function(){
				$("#loadmore").click(function(){
					var page = parseInt($("#page").val());
					var limit = 8;
					var cid = '<?php echo $catid; ?>';
					$.ajax({
						url: 'ajax/loadmore.php',
						type: 'POST',
						data:{page, limit, cid},
						success: function(resp){
							//loaddata
							var respdata = JSON.parse(resp);
							for(var i=0; i<respdata.length;i++){
								var htmldata = $.parseHTML(respdata[i]);
								$("#loaddata").append(htmldata);
							}
							$("#page").val(page+1);
							
						}
					})
				});
			})
		</script>
	</body>
</html>
