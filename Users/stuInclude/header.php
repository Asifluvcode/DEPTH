<?php 
include_once('../dbconnection.php');
if(!isset($_SESSION)){
    session_start();
 }

if(isset($_SESSION['is_login'])){
   $stuLogEmail = $_SESSION['stuLogEmail'];
}else{
   echo "<script> location.href='../loginor.php'; </script>";
}
if(isset($stuLogEmail)){
    $sql = "SELECT stu_img, stu_name FROM student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
    $stu_name = $row['stu_name'];
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
</style>
</head>

<body style="background-color: #131921; color: white;">
<!-- top Navbar -->
<nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
    <div class="container">
        <a href="../index.php" style="text-decoration: none;">
      <h4 class="text-white">Dashboard</h4></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
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
            <li class="nav-item">
              <a class="nav-link" href="#!"><p class="text-light"><?php echo $stu_name ?></p></a>
            </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
    
  <div class="d-flex align-items-center justify-content-center text-center" style="height: 100px;">
  </div>

<!-- =======================
Page content START -->
<section class="pt-0 mt-3">
	<div class="container">
		<div class="row">
			<!-- Left sidebar START -->
      <div class="col-xl-3">
    <!-- Responsive offcanvas body START -->
    <div class="offcanvas-xl offcanvas-start" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-body p-3 mb-5 rounded-6 p-xl-0">
            <div class="bg-dark border rounded-6 p-1 w-100">
                <!-- Dashboard menu -->
                <div class="list-group list-group-dark list-group-borderless collapse-list">
                    <img src="<?php echo $stu_img ?>" alt="Student Profile" alt="Course Image" class="card-img-top" style="object-fit: cover; height: 300px;  border-radius: 25px; padding: 5px; margin-top: -40px;">
                    <?php
                        $stuLogEmail = // get the value of stuLogEmail from session or wherever it is stored
                        $sql = "SELECT stu_email FROM student INNER JOIN instructor_test ON student.stu_email = instructor_test.inst_email WHERE instructor_test.inst_score = 4 AND instructor_test.inst_email = '$stuLogEmail'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            echo '<a class="list-group-item" href="../instructor/instructor.php"><i class="fa-solid fa-person-chalkboard"></i>Instructor</a>';
                        }
                    ?>
                    <a class="list-group-item" href="studentProfile.php"><i class="fa-regular fa-user"></i>Edit Profile <span class="sr-only">(current)</span></a>
                    <a class="list-group-item" href="myCourse.php"><i class="fa-solid fa-person-chalkboard"></i>My Course</a>
                    <a class="list-group-item" href="stufeedback.php"><i class="fa-regular fa-comment"></i>Feedback</a>
                    <a class="list-group-item" href="studentChangePass.php"><i class="fas fa-key"></i>Change Password</a>
                    <a class="list-group-item" href="request.php"><i class="fa-solid fa-chalkboard-user"></i></i>Request Instructor</a>
                    <a class="list-group-item" href="support.php"><i class="fa-regular fa-envelope"></i>Support</a>
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
<script>
    var offcanvasSidebar = new bootstrap.Offcanvas(document.getElementById('offcanvasSidebar'));
</script>

