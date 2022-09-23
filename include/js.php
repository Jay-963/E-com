

<?php include 'admin/config/connection.php';?>
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		
		<script>
		$("#slider").owlCarousel({
					loop:true,
					margin:10,
					nav:true,
					dots:false,
					item:1,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:1
						},
						1000:{
							items:1
						}
					}
					
				});
		</script>
		
		