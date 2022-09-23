<?php 
	include '../admin/config/connection.php';
	$page = $_POST['page'];
	$limit = $_POST['limit'];
	$cid = $_POST['cid'];
	
	$offset = (($page - 1) * $limit); 
	
	//echo $page.'-------'.$limit;
	
	$getpsql2 = "select * from flipkart where cat_id = '".$cid."' limit ".$offset.", ".$limit."";
	$prodquery2 = mysqli_query($conn, $getpsql2);
	
	$dataarr = array();
	
	while($row = mysqli_fetch_array($prodquery2)){
		 //array_push($dataarr, $row['name']);
		 
		 $html = '<div class="col-md-3">
							<a href="detail.php?pid='.$row['id'].'" class="text-decoration-none">	
							<div class="p-4 list">
								<div>
									<div class="imagesize">	
											<img class="img-fluid " src="admin/images/limg/'.$row['list_image'].'" height="250px"/>
									</div>
								</div>
								<div class="mt-3">
									<p class="text-decoration-none"><h5 class="text-dark ">'.$row['name'].'</h5></p>
									<p class="text-decoration-none"><p class="text-success mb-0">₹'.$row['price'].'</p></p>
									<p class="text-decoration-none"><p class="text-muted mb-0">Grab Now!</p></p>
								</div>
							</div>
							</a>
				</div>';
				
				
		array_push($dataarr, $html);
	}
	
	
	echo json_encode($dataarr);
	
	
?>