<?php 
   if(!isset($_SESSION)){
      session_start();
   }
   
   include('../dbconnection.php');
   
   
   if(isset($_SESSION['is_admin_login'])){
      $adminEmail = $_SESSION['adminLogEmail'];
   }

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Dashboard</title>
      <!-- Bootstrap class -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Font Awaresome css -->
      <link rel="stylesheet" href="../css/all.min.css">
      <!-- google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
      <!-- custom css -->
      <link rel="stylesheet" href="../css/adminstyle.css">
   </head>
   <body style="background-color: #131921; color: #fff;">
      <!-- Top Navbar -->
      <!-- <nav class="navbar admin-navbar d-print-none" style="background-color:#131921;">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php" style="color:#ffffff; text-align:center; margin-left: 145px">Admin Area</a>
      </nav> -->

      <!-- top Navbar -->

<!-- <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark" style="background-color:#131921;">
<div class="container text-center">
    <a href="../index.php" style="text-decoration: none;">
        <h1 class="text-white" style="margin: 0 auto; text-align: center;">Admin Pannel</h1>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
</nav> -->

<div class="d-flex align-items-center justify-content-center text-center text-light" style="background-color: #131921; margin-bottom: -60px;">
    <div class="row">
        <div class="col-12">
            <div class=" p-4 p-sm-5 rounded-5">
                <h1>Admin Section</h1>
                    <div class="text-light"><p><?php echo $adminEmail ?></p></div>
            </div>
        </div>
    </div>
</div>


  <!-- Navbar -->
    
  <!-- <div class="d-flex align-items-center justify-content-center text-center" style="height: 100px;">
  </div> -->

<section class="pt-0" style="margin-top: 50px;">
	<div class="container">
		<div class="row">
         
			<!-- Left sidebar START -->
			<div class="col-xl-3">
				<!-- Responsive offcanvas body START -->
				<div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
					<div class="offcanvas-body p-3 mb-5 rounded-6 p-xl-0">
						<div class="bg-dark border rounded-6 p-1 w-100">
							<!-- Dashboard menu -->
							<div class="list-group list-group-dark list-group-borderless collapse-list">
                            <h1 class="text-center text-light">Admin</h1>
								<a class="list-group-item" href="adminDashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <a class="list-group-item" href="courses.php"><i class="fab fa-accessible-icon"></i>Courses</a>
                                <a class="list-group-item" href="lesson.php"><i class="fa-solid fa-person-chalkboard"></i>Lesson</a>
                                <a class="list-group-item" href="student.php"><i class="fa-solid fa-user"></i>Student</a>
                                <a class="list-group-item" href="adminSellreport.php"><i class="fa-solid fa-bug"></i>Sell Report</a>
                                <a class="list-group-item" href="adminPaymentStstus.php"><i class="fa-solid fa-cart-shopping"></i>Payment Status</a>
                                <a class="list-group-item" href="feedback.php"><i class="fa-solid fa-comments"></i>Feedback</a>
                                <a class="list-group-item" href="instructorRequest.php"><i class="fa-solid fa-chalkboard-user"></i>instructor Request</a>
                                <a class="list-group-item" href="support.php"><i class="fa-regular fa-envelope"></i>Support</a>
                                <a class="list-group-item" href="adminchangepass.php"><i class="fa-solid fa-key"></i>Change Password</a>
								<a class="list-group-item text-danger bg-danger-soft-hover" href="../logout.php"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Responsive offcanvas body END -->
			</div>
			<!-- Left sidebar END -->

			<!-- Main content START -->
			<div class="col-xl-9">
				<div class="card bg-transparent border rounded-3">
						<!-- Course list table START -->
						<div class="table-responsive border-2">
							<table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>