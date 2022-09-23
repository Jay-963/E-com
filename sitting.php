<?php 

	session_start();
	include 'admin/config/conn.php';
	
	
	
	// $usid = $_SESSION['token'];
	// echo $usid;
	
	$eveid = $_GET['eve'];
	$sqlseats = "select * from event_table where event_id = '".$eveid."'";
	$seatquery = mysqli_query($conn, $sqlseats);
	$seats = mysqli_fetch_array($seatquery);
	
	
	$eveid = $_GET['eve'];
	$sqlGet2 = "select BookSeat from seats where Event_Id='".$eveid."'";
	$getQuery2 = mysqli_query($conn, $sqlGet2);
	$data = mysqli_fetch_row($getQuery2);
	$getArr = array();
	if(!empty($data)){
		$getArr = explode(",", $data[0]);
	}
	
	$eveid = $_GET['eve'];
	$sqlseats1 = "select * from event_table where event_id = '".$eveid."'";
	$seatquery1 = mysqli_query($conn, $sqlseats1);
	$seats1 = mysqli_fetch_array($seatquery1);

	$eveid = $_GET['eve'];
	$sqlseats2 = "select * from booking_table where event_id = '".$eveid."'";
	$seatquery2 = mysqli_query($conn, $sqlseats2);
	$seats2 = mysqli_fetch_array($seatquery2);
	
	
?>	
		
	<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BookMyShow</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/all.min.css" /> 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include 'include/nav.php';?>
		
		
		<section class="section-one_seats home">
	<div class="main-div_seats">
		<table cellspacing="0" cellpadding="10">
			
			<?php
				$rows = array('A', 'B', 'C', 'D', 'E', 'F');
				for($i=0; $i<=0; $i++){
					?>
						<tr>
							<td>
								<div class="abcd_seats"><?php echo $rows[$i]; ?></div>
							</td>
							<td>
								<?php
									for( $j=1; $j<=$seats['seats']; $j++){
										if($j==$seats['seats']){
											?>
											<div class="seatsnum">
												<button <?php echo $checkArrVal ? 'disabled' : ''; ?> data-seat="<?php echo $rows[$i].$j; ?>" class="seatsclick <?php echo $isDisable; ?>"><?php echo $j; ?></button>
											</div>
											<?php
										} else {
											
											$mainVal = $rows[$i].$j;
											$checkArrVal = in_array($mainVal, $getArr); 
											$isDisable = '';
											$disable = '';
											if($checkArrVal){
												$isDisable = 'disabled';
												$disable = 'dis';
											}	
											?>
											<div class="seatsnum">
												<button <?php echo $checkArrVal ? 'disabled' : ''; ?> data-seat="<?php echo $rows[$i].$j; ?>" class="seatsclick <?php echo $isDisable; ?> <?php echo $disable; ?>"><?php echo $j; ?></button>
											</div>
											<?php
										}
									}
								?>
							</td>	
						</tr>					
					<?php
				}
			?>
		</table>
		<div class=" ">
			<div class="top border p-4 shadow mt-5 ">
				<div class="border border mb-3">
					<div class="d-flex justify-content-between p-3 border border-top-0 border-left-0 border-right-0">
						<div class="p-2 px-4 bg-primary text-light">Booking cart</div>
						<div class="p-2 px-4 border"><i class="fas fa-map-marker-alt pr-3"></i>Track</div>
					</div>
					<div class="">
						<div class="d-flex m-2">
							<div class="p-2 flex-fill">
								 <div class="d-flex mb-3">
									<div class="p-2 ">
										<img  src="admin/img/limg/<?php echo $seats1['list_image']; ?>" width="50px" >
									</div>
									<div class="p-3 flex-grow-1 ">
										<h5 class="pt-3"><?php echo $seats1['event_name'] ?></h5>
									</div>
								</div>
							</div>
							<div class="p-2  flex-fill">
								<div class="d-flex mb-3">
									<div class="p-2 flex-fill">
										<h5 class="text-center px-5 ">Ticket Price</h5>
										<h5 type="text" id="Price" data-value="" class=" my-1 form-control border text-center box py-2" >₹<?php echo $seats1['ticket'] ?></h5>
									</div>
									<div class="mt-2 plus-minus-input flex-fill">
										<h5 class="text-center p-1">Total No of Seats</h5>
										<div class="d-flex">
											<div class="input-group-button">
												<button type="button" class="button hollow circle ml-4	" data-quantity="minus" data-field="quantity">
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
										<input type="text" id="Total" class=" my-1 form-control border text-center box py-2"  ></input>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between p-1 border border-bottom-0 border-left-0 border-right-0">
						<div class="p-1 px-4 ">
							<input type="text" id="address" class=" my-1 form-control border text-center box py-2" placeholder="Place Address" ></input>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="text-center mt-3 mb-5">
			<?php if(isset($_SESSION['token'])){?>
				<a href="order.php" class="btn-lg border-0 btn-success ml-auto" id="seatsubmit">Confirm Your Seats</a>
			<?php }else{?>
				<a id="ifnl" class=" btn-danger text-decoration-none btn-lg mt-5">Login First</a>
			<?php }?>
		</div>	
	</div>	
</section>
		<?php include "include/js.php" ?>
		<script>
		$(document).ready(function(){
			var selectedVal = "";
			$(".seatsclick").on( "click", function() {
				var el = $(this).attr("data-seat");
				if(!$(this).hasClass('fix')){
					$(this).toggleClass('fix');
					if(selectedVal === ""){
						selectedVal += el + ',';
					} else {
						selectedVal +=  el + ',';
					}
				} else {
					selectedVal = selectedVal.replace(el+',', '');
					$(this).removeClass('fix');
				}
				
				console.log(selectedVal);
				
					
			});
			
			var price = '<?php echo $seats['ticket'] ?>';			
			var totalprice = $("#Total").val(price);
			
			$("#seatsubmit").on('click', function(){
				
				var selectVal = selectedVal;
				var evid = '<?php echo $eveid?>';
				$.ajax({
					url:'ajax/seatbook.php',
					type:'POST',
					data:{selectVal, evid},
					success:function(resp){
						// console.log(resp);
						if(resp == 1){
							swal("Good job!", "Successfully Data Inserted");
						}
					}
					
				});

				var usid = '<?php echo $usid?>';
				var totprice = $("#Total").val();
				var prodquan = $("#quantityfield").val();
					
				$.ajax({
					url:'ajax/seu.php',
					type:'POST',
					data:{selectVal, evid, usid, totprice, prodquan},
					success:function(resp){
						// console.log(resp);
						if(resp == 1){
							swal("Good job!", "Successfully Data Inserted");
						}
					}
					
				});
			})
			
		})
		
		
				function quantityfunc(currentvalue){
					var quantity = currentvalue;
					var price = '<?php echo $seats['ticket'] ?>';
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
