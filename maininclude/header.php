
<?php

include_once('./dbconnection.php');
if(!isset($_SESSION)){
    session_start();
 }

if(isset($_SESSION['is_login'])){
   $stuLogEmail = $_SESSION['stuLogEmail'];
}

if(isset($stuLogEmail)){
  $sql = "SELECT admin_status FROM student WHERE stu_email = '$stuLogEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $admin_status = $row['admin_status'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    

    <!-- Testimonials -->

    <!--Font G -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    
  

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />

    

    <title>Depth</title>

    <style>
        /* Hover For Pages start */
.dropdown-menu {
    background-color: black !important;
    border: 1px solid white !important;
}

.dropdown-item {
    color: #fff !important;
}

.dropdown-item:hover {
    color: #9b8de3 !important;
}

.dropdown-item:hover,
.dropdown-item:focus {
    background-color: rgba(199, 237, 241, 0.1);
}

/* Start including of popular course carosile */
.container {
    max-width: 1400px;
    padding: 0 15px;
    margin: 0 auto;
}

h2 {
    font-size: 32px;
    margin-bottom: 1em;
}

.cards {
    display: flex;
    padding: 25px 0px;
    list-style: none;
    overflow-x: scroll;
    -ms-scroll-snap-type: x mandatory;
    scroll-snap-type: x mandatory;
}

.card {
    display: flex;
    flex-direction: column;
    flex: 0 0 100%;
    padding: 20px;
    background: var(--white);
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 15%);
    scroll-snap-align: start;
    transition: all 0.2s;
}

.card:not(:last-child) {
    margin-right: 10px;
}

.card:hover {
    color: var(--white);
    background: var(--red);
}

.card .card-title {
    font-size: 20px;
}

.card .card-content {
    margin: 20px 0;
    max-width: 85%;
}

.card .card-link-wrapper {
    margin-top: auto;
}

.card .card-link {
    display: inline-block;
    text-decoration: none;
    color: white;
    background: var(--red);
    padding: 6px 12px;
    border-radius: 8px;
    transition: background 0.2s;
}

.card:hover .card-link {
    background: var(--darkred);
}

.cards::-webkit-scrollbar {
    height: 12px;
}

.cards::-webkit-scrollbar-thumb,
.cards::-webkit-scrollbar-track {
    border-radius: 92px;
}

.cards::-webkit-scrollbar-thumb {
    background: var(--darkred);
}

.cards::-webkit-scrollbar-track {
    background: var(--thumb);
}

@media (min-width: 500px) {
    .card {
        flex-basis: calc(50% - 10px);
    }

    .card:not(:last-child) {
        margin-right: 20px;
    }
}

@media (min-width: 700px) {
    .card {
        flex-basis: calc(calc(100% / 3) - 20px);
    }

    .card:not(:last-child) {
        margin-right: 30px;
    }
}

@media (min-width: 1100px) {
    .card {
        flex-basis: calc(25% - 30px);
    }

    .card:not(:last-child) {
        margin-right: 40px;
    }
}

/* Most popular course */

.team-boxed {
  color:#313437;
  background-color:#eef4f7;
}

.team-boxed p {
  color:#7d8285;
}

.team-boxed h2 {
  font-weight:bold;
  margin-bottom:40px;
  padding-top:40px;
  color:inherit;
}

@media (max-width:767px) {
  .team-boxed h2 {
    margin-bottom:25px;
    padding-top:25px;
    font-size:24px;
  }
}

.team-boxed .intro {
  font-size:16px;
  max-width:500px;
  margin:0 auto;
}

.team-boxed .intro p {
  margin-bottom:0;
}

.team-boxed .people {
  padding:50px 0;
}

.team-boxed .item {
  text-align:center;
}

.team-boxed .item .box {
  text-align:center;
  padding:30px;
  background-color:#fff;
  margin-bottom:30px;
}

.team-boxed .item .name {
  font-weight:bold;
  margin-top:28px;
  margin-bottom:8px;
  color:inherit;
}

.team-boxed .item .title {
  text-transform:uppercase;
  font-weight:bold;
  color:#d0d0d0;
  letter-spacing:2px;
  font-size:13px;
}

.team-boxed .item .description {
  font-size:15px;
  margin-top:15px;
  margin-bottom:20px;
}

.team-boxed .item img {
  max-width:160px;
}

.team-boxed .social {
  font-size:18px;
  color:#a2a8ae;
}

.team-boxed .social a {
  color:inherit;
  margin:0 10px;
  display:inline-block;
  opacity:0.7;
}

.team-boxed .social a:hover {
  opacity:1;
}


/* For screens smaller than 768px */
@media only screen and (max-width: 400px) {
  .cards-inner-flexbox {
    justify-content: center;
  }
  
  .cards-inner-flexboxitems {
    width: 100%;
    margin-bottom: 20px;
  }
}

/* For screens between 768px and 992px */
@media only screen and (min-width: 400px) and (max-width: 700px) {
  .cards-inner-flexboxitems {
    width: 48%;
    margin-bottom: 20px;
  }
}

/* For screens larger than 992px */
@media only screen and (min-width: 400px) {
  .cards-inner-flexbox {
    justify-content: space-between;
  }
  
  .cards-inner-flexboxitems {
    width: 22%;
  }
}

/* Adjustments for all screens */
.chords-cards {
  background-color: #131921;
  /* padding-top: 60px 0; */
}

.cards-inner-flexbox {
  /* margin-top: 150px; */
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.card-box {
  background-image: linear-gradient(163deg, #00ff75 0%, #3700ff 100%);
  border-radius: 20px;
  transition: all 0.5s;
  margin-bottom: 30px;
}

.card-box-2 {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  background-color: #131921;
  border-radius: 20px;
  transition: all 0.4s;
}

.card-box-2:hover {
  transform: scale(0.98);
  border-radius: 20px;
}

.card-box:hover {
  box-shadow: 0px 0px 30px 1px rgba(0, 255, 117, 0.3);
}

.card-box-2 h3 {
  font-family: "Manrope", sans-serif;
  font-style: normal;
  font-weight: 300;
  font-size: 28px;
  line-height: 36px;
  color: white;
  margin-bottom: 10px;
}

.card-box-2 p {
  font-style: normal;
  font-weight: 300;
  font-size: 14px;
  line-height: 20px;
  color: white;
  margin-bottom: 10px;
}

.read-more-cta {
  margin-bottom: 15px;
  font-family: "Alkatra", cursive;
  text-decoration: none;
  font-style: normal;
  display: inline-block;
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  background-color: #fff;
  border-radius: 12px;
  color: var(--white);
  padding: 6px 20px;
  border: 2px solid white;
  transition: all 0.4s;
}

.read-more-cta:hover {
  border: 2px solid blue;
  
}

    </style>
</head>

<body style="background-color: #131921;">
<!-- Start Navigation -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-0 border-bottom border-dark fixed-top d-print-none" style="background-color: #131921;">
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a href="index.php" class="navbar-brand"><img src="images/sitelogo/depth1.png" alt="Depth" height="60px"></a><!-- Distributive Educational paltform transformative Hybrid education-->

    <!-- Navbar toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="courses.php">Courses</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="demoMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="demoMenu">
            <li><a class="dropdown-item" href="paymentstatus.php">Payment Status</a></li>
            <!-- Dropdown submenu -->
            <li class="dropdown-submenu">
              <?php
                $stuLogEmail = isset($_SESSION['stuLogEmail']) ? $_SESSION['stuLogEmail'] : '';
                if (!empty($stuLogEmail)) {
                  $sql = "SELECT * FROM student WHERE stu_email = '$stuLogEmail' AND admin_status = 1";
                  $result = $conn->query($sql);
                  if ($result->num_rows == 1) {
                    echo '<a href="#login" data-bs-toggle="modal" data-bs-target="#adminLoginModelCenter" class="dropdown-item text-blue"><b>Admin Login</b></a>';
                  }
                }
              ?>
              <!-- Submenu options -->
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Student</a></li>
                <li><a class="dropdown-item" href="#">Instructor</a></li>
                <li><a class="dropdown-item" href="#">Admin</a></li>
              </ul>
            </li>
            <li><a class="dropdown-item"  href="about.php">About</a></li>
            <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./zcommunity/addpost.php">Community</a>
        </li>

        <?php 
        if(!isset($_SESSION['is_login'])){
           echo '<li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#studentLoginModelCenter">Sign In</a></li>
                 <li class="nav-item"><button type="button" class="btn btn-light ms-3"><a data-bs-toggle="modal" data-bs-target="#studentRegModelCenter">Get Started</a></button></li>';
        }else{
           echo '<li class="nav-item">
           <button type="button" class="btn btn-light" style="color: black; background-color: white; text-decoration: none;">
             <a href="users/myCourse.php" style="color: black; text-decoration: none;">My Profile</a></button></li>';
        }
        ?>

      </ul>
    </div>
  </div>
</nav>

    <!-- Navbar -->
    <!--Main Navigation-->

    <!-- End Navigation -->

