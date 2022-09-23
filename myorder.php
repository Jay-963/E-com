<?php 
	include 'admin/config/connection.php';
	session_start();

	if(!isset($_SESSION['lock']) && $_SESSION['lock'] == null){
		header("Location: index.php");
	}
	
	$id = $_SESSION['lock'];
	
	$joint = "select flipkart.list_image, flipkart.name, flipkart.price, ordertable.quantity, ordertable.total_price, ordertable.address, ordertable.create_date
	FROM ordertable
	INNER JOIN flipkart ON ordertable.id=flipkart.id
	where user_id = '".$id."' ";
	
	$orderrun = mysqli_query($conn, $joint);
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
		<link rel="stylesheet" href="css/profile.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		<div class="container py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Product Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Product Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Quantity</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Total</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Date</th>
					</tr>
                  </thead>
                  <tbody>
					<?php
						while($product = mysqli_fetch_array($orderrun)){
					?>
                    <tr>
						<td><img class="text-center orderimg" src="admin/images/limg/<?php echo $product['list_image']; ?>"></td>
						<td class="text-center"><?php echo $product['name'];?></td>
						<td class="text-center"><?php echo $product['price'];?></td>
						<td class="text-center"><?php echo $product['quantity'];?></td>
						<td class="text-center"><?php echo $product['total_price'];?></td>
						<td class="text-center"><?php echo $product['address'];?></td>
						<td class="text-center"><?php echo $product['create_date'];?></td>
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
		<?php include 'include/bottom.php';?>
		<?php include 'include/js.php';?>
	</body>
</html>

