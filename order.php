<?php 
	include 'admin/config/connection.php';
	session_start();
	
	$catid = $_GET['oid'];
	$getpsql3 = "select * from flipkart where id = '".$catid."'";
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
		<link rel="stylesheet" href="css/order.css">
	</head>
	<body class="">
		<?php include 'include/nav.php';?>
		<div class="container">
			<div class="top border p-3 shadow mt-5 pt-4">
				<div class="border border mb-3">
					<div class="d-flex justify-content-between p-3 border border-top-0 border-left-0 border-right-0">
						<div class="p-2 px-4 bg-primary text-light">Shopping cart</div>
						<div class="p-2 px-4 border"><i class="fas fa-map-marker-alt pr-3"></i>Track</div>
					</div>
					<div class="">
						<div class="d-flex m-2">
							<div class="p-2 flex-fill">
								 <div class="d-flex mb-3">
									<div class="p-2 ">
										<img  src="admin/images/limg/<?php echo $prodquery4['list_image']; ?>" width="50px" >
									</div>
									<div class="p-3 flex-grow-1 ">
										<h5 class="pt-3"><?php echo $prodquery4['name'] ?></h5>
									</div>
								</div>
							</div>
							<div class="p-2  flex-fill">
								<div class="d-flex mb-3">
									<div class="p-2 flex-fill">
										<h5 class="text-center">Price</h5>
										<h5 type="text" id="Price" data-value="<?php echo $prodquery4['price'] ?>" class=" my-1 form-control border text-center box py-2" >₹<?php echo $prodquery4['price'] ?></h5>
									</div>
									<div class="mt-5 plus-minus-input flex-fill">
										<div class="d-flex">
											<div class="input-group-button">
												<button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
												  <i class="fa fa-minus" aria-hidden="true"></i>
												</button>
											</div>
											  <input id="quantityfield" class="input-group-field" type="number" name="quantity" value="1">
											<div class="input-group-button">
												<button type="button" class="button hollow circle" data-quantity="plus" data-field	="quantity">
													<i class="fa fa-plus" aria-hidden="true"></i>
												</button>
											</div>
										</div>
									</div>
									<div class="p-2 flex-fill">
										<h5 class="text-center">Total price</h5>
										<input type="text" id="Total" class=" my-1 form-control border text-center box py-2" ></input>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between p-1 border border-bottom-0 border-left-0 border-right-0">
						<div class="p-1 px-4 ">
							<input type="text" id="address" class=" my-1 form-control border text-center box py-2" placeholder="Place Address" ></input>
						</div>
						<div>
							<?php if(isset($_SESSION['lock'])){?>
								<button class="p-1 m-3 px-3 bg-success text-light rounded-lg" type="button" id="buy" onclick="myFunction()" >Buy Now</button>
								<button class="btn btn-primary" style="display:none;" id="spin">
									<span class="spinner-border spinner-border-sm" ></span>
									Loading..
								</button>
							<?php }else{?>
								<div class="py-2 m-2 px-4 bg-success text-light rounded-lg" type="button" id="loginfirst" >Buy Now</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'include/bottom.php';?>
		<?php include 'include/js.php';?>
		
		<script>
			$(document).ready(function(){
				var price = '<?php echo $prodquery4['price'] ?>';			
				var totalprice = $("#Total").val(price);
				
				$("#buy").click(function(){
					$("#spin").show();
					$("#buy").hide();
					var buy = $("#address").val();
					var totprice = $("#Total").val();
					var prodquan = $("#quantityfield").val();
					var prodId = '<?php echo $prodquery4["id"] ?>';
					var userid = "<?php echo isset($_SESSION['lock']) ? $_SESSION['lock'] : ""; ?>";
					console.log(userid);
					var fd = new FormData();
					
					fd.append("c_Address", buy);
					fd.append("c_price", totprice);
					fd.append("c_prodid", prodId);
					fd.append("c_userid", userid);
					fd.append("c_prodquan", prodquan);
					
					
						if(buy	== ""){
						alert("Enter Your Address");	
					}
						
					$.ajax({
						url:"ajax/buy.php",
						type:"POST",
						data:fd,
						processData:false,
						contentType:false,
						success:function(resp){
							//console.log(resp);
							if(resp == 1){
								$("#spin").hide();
								$("#buy").show();
					
								swal("Good job!", "your order is placed!", "success");
								$("#address").val("");
								$("#Total").val("");
							}
							}	
					})
				
				});
			});
			
				function quantityfunc(currentvalue){
					var quantity = currentvalue;
					var price = '<?php echo $prodquery4['price'] ?>';
					var total = (quantity * price);
					var totalprice = $("#Total").val(total);
					
					
				}
				
		
		
		
	
	
	jQuery(document).ready(function(){
				
	
	// This button will increment the value
    $('[data-quantity="plus"]').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
			quantityfunc(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
			quantityfunc(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});


		</script>
		
		
	</body>
</html>

