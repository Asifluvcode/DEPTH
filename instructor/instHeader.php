<?php 
include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
 }

if(isset($_SESSION['is_login'])){
   $stuLogEmail = $_SESSION['stuLogEmail'];
}else{
   echo "<script> location.href='../index.php'; </script>";
}
if(isset($stuLogEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap class -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Font Awaresome css -->
      <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/profilestyle.css">

    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap' rel='stylesheet'>
        <style>
  /* Color of the links BEFORE scroll */
.navbar-scroll .nav-link,
.navbar-scroll .navbar-toggler-icon,
.navbar-scroll .navbar-brand {
  color: #ffffff;
  transition: color 0.2s ease-in-out;
}

/* Color of the navbar BEFORE scroll */
.navbar-scroll {
  background-color: #131921;
  transition: background-color 0.2s ease-in-out;
}

.navbar-brand {
  font-size: unset;
  height: 3.5rem;
}

.pro-card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.pro-card:hover .image img {
    transform: scale(1.5)
}

.name-btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</style>
</head>

<body style="background-color: #131921; color: white;">
<!-- top Navbar -->
<nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
    <div class="container">
        <a href="../index.php" style="text-decoration: none;">
      <h4 class="text-white">Dashboard</h4></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#!"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#!"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#!"></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $stu_img ?>" class="rounded-circle" height="22" alt="" loading="lazy"/></a>
          </li>
          <button type="button" class="btn btn-light ms-3">Community</button>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
    
  <div class="d-flex align-items-center justify-content-center text-center" style="height: 100px;">
  </div>

<!-- =======================
Page content START -->
<section class="pt-0">
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
                <img src="<?php echo $stu_img ?>" alt="Student Profile" class="img-thumbnail round-circle" style="border-radius: 60%;">
                <?php
                    $sql = "SELECT * FROM student where status = 1";
                    $result = $conn->query($sql);
                    if($result->num_rows == 1){
                    echo '<a class="list-group-item" href="instructor.php"><i class="fa-solid fa-person-chalkboard"></i> Instructor</a>';
                    }
                ?>
								<a class="list-group-item" href="postedcourse.php"><i class="fa-solid fa-list"></i> Published Courses<span class="sr-only">(current)</span></a>
								<a class="list-group-item" href="addcourse.php"><i class="fa-solid fa-plus"></i> Add Course</a>
								<a class="list-group-item" href="../users/studentProfile.php"><i class="fa-solid fa-user"></i> Student Profile</a>
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