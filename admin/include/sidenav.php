<?php 
	include 'config/conn.php';
	
	if(isset($_SESSION['token'])){
		$userid = $_SESSION['token'];
		$userdata = "select * from user_table where user_id = '".$userid."'";
		$getuser = mysqli_query($conn, $userdata);
		$userinfo = mysqli_fetch_array($getuser);
	}
	
?>



<div class="sidebar pt-2 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
				
			
                <div class="d-flex align-items-center ms-4 mb-4">
				
				<?php
					if(isset($_SESSION['token'])){
				?>	
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/limg/<?php echo $userinfo['image']?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $userinfo['name']?></h6>
                        <span>Admin</span>
					</div>	
					<?php
						} else {
					?>	
						 <div class="position-relative">
							<img class="rounded-circle" src="img/user.jpg"  style="width: 40px; height: 40px;">
							<div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
						</div>
						<div class="ms-3">
							<h6 class="mb-0">sign in</h6>
							<span>Admin</span>
						</div>
					<?php
						}
					?>	
                    
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="eventable.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Events</a>
                    <a href="catable.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>catagory</a>
                    <a href="usertable.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>User</a>
                    <a href="artable.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Artists</a>
                    <a href="logout.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>logout</a>
                </div>
            </nav>
        </div>