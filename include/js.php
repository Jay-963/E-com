
		<script src="js/jquery.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
	    <script>
			$(document).ready(function(){
				$("#login").click(function(){
					var email = $("#email").val();
					var pass = $("#pass").val();
					
					var obj = {email,pass};
					$.ajax({
						url: "admin/ajax/auth.php",
						type: "POST",
						data: obj,
						success: function(resp){
								if(resp == 1){
								window.location.href = 'home.php';
							} else {
								swal("wrong Password!", {
									className: "red-bg",
								});
							}
						}
					});
				});
			
				$("#submit").click(function(){
					var name = $("#name").val();
					var Email = $("#Email").val();
					var Mobile = $("#Mobile").val();
					var Address = $("#Address").val();
					var Password = $("#Password").val();
					var image = $("#image")[0].files[0];
					
					
					var fd = new FormData();
						fd.append("t_name", name);
						fd.append("t_Email", Email);
						fd.append("t_Mobile", Mobile);
						fd.append("t_Address", Address);
						fd.append("t_Password", Password);
						fd.append("t_image", image);
						
					
					$.ajax({
						url: "ajax/homeuser.php",
						type: "POST",
						data: fd,
						processData:false,
						contentType:false,
						success:function(resp){
							console.log(resp);
							if(resp == 1){
								$("#name").val('');
								$("#Email").val('');
								$("#Mobile").val('');
								$("#Address").val('');
								$("#Password").val('');
								$("#image").val('');
								swal("Good job!", "Successfully Data Inserted");
								}
						}
					});	
				});
				
				
			});	
			
				
				function openNav() {
					  document.getElementById("myNav").style.width = "20%";
					}

					function closeNav() {
					  document.getElementById("myNav").style.width = "0%";
					}
					
				
					$("#loginform").click(function(){
						$("#loginform2").toggle();
					});
					$("#ifnl").click(function(){
						$("#loginform2").toggle();
					});
					
					$("#second").click(function(){
						$("#second2").toggle();
					});
					$("#second").click(function(){
						$("#loginform2").hide();
					});
					$("#again").click(function(){
						$("#second2").hide();
					});
					$("#again").click(function(){
						$("#loginform2").show();
					});
					$(".cross").click(function(){
						$("#loginform2").hide();
					});
					$(".cross").click(function(){
						$("#second2").hide();
					});
					
				
				function switchVisible() {
					if (document.getElementById('loginform2')) {

						if (document.getElementById('loginform2').style.display == 'none') {
							document.getElementById('loginform2').style.display = 'block';
							document.getElementById('second2').style.display = 'none';
						}
						else {
							document.getElementById('loginform2').style.display = 'none';
							document.getElementById('second2').style.display = 'block';
						}
					}
				}
					
		</script>

		
				