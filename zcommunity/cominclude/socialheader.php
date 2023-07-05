<?php
if(!isset($_SESSION)){
   session_start();
}

if(isset($_SESSION['is_login'])){
   $stuLogEmail = $_SESSION['stuLogEmail'];
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
    <title>Social Media</title>
    <link rel="stylesheet" href="../css/socialstyle.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet"/>



    <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet"> 
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


   <style>

/*---------------------------------------------------------------------- /
SECTIONS
----------------------------------------------------------------------- */

.section-cards {
    z-index: 3;
    position: relative;
}

.section-gray {
    background: #131921;
    padding: 60px 0 30px 0;
}


/*---------------------------------------------------------------------- /
CARDS
----------------------------------------------------------------------- */

.card {
    display: inline-block;
    position: relative;
    width: 100%;
    margin-bottom: 30px;
    border-radius: 6px;
    color: rgba(0, 0, 0, 0.87);
    background: #fff;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.card .card-image {
    height: 60%;
    position: relative;
    overflow: hidden;
    margin-left: 15px;
    margin-right: 15px;
    margin-top: -30px;
    border-radius: 6px;
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card .card-image img {
    width: 100%;
    height: 100%;
    border-radius: 6px;
    pointer-events: none;
}

.card .card-image .card-caption {
    position: absolute;
    bottom: 15px;
    left: 15px;
    color: #fff;
    font-size: 1.3em;
    text-shadow: 0 2px 5px rgba(33, 33, 33, 0.5);
}

.card img {
    width: 100%;
    height: auto;
}

.img-raised {
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

.card .ftr {
    margin-top: 15px;
}

.card .ftr div {
    display: inline-block;
}

.card .ftr .author {
    color: #888;
}

.card .ftr .stats {
    float: right;
    line-height: 30px;
}

.card .ftr .stats {
    position: relative;
    top: 1px;
    font-size: 14px;
}


/* ============ Card Table ============ */

.table {
    margin-bottom: 0px;
}

.card .table {
    padding: 15px 30px;
}

.card .table-primary {
    background: linear-gradient(60deg, #ab47bc, #7b1fa2);
}

.card .table-info {
    background: linear-gradient(60deg, #26c6da, #0097a7);
}

.card .table-success {
    background: linear-gradient(60deg, #66bb6a, #388e3c);
}

.card .table-warning {
    background: linear-gradient(60deg, #ffa726, #f57c00);
}

.card .table-danger {
    background: linear-gradient(60deg, #ef5350, #d32f2f);
}

.card .table-rose {
    background: linear-gradient(60deg, #ec407a, #c2185b);
}

.card [class*="table-"] {
    color: #FFFFFF;
    border-radius: 6px;
}

.card [class*="table-"] .card-caption a,
.card [class*="table-"] .card-caption,
.card [class*="table-"] .icon i {
    color: #FFFFFF;
}

.card [class*="table-"] .icon i {
    border-color: rgba(255, 255, 255, 0.25);
}

.card [class*="table-"] .author a,
.card [class*="table-"] .ftr .stats,
.card [class*="table-"] .category,
.card [class*="table-"] .card-description {
    color: rgba(255, 255, 255, 0.8);
}

.card [class*="table-"] .author a:hover,
.card [class*="table-"] .author a:focus,
.card [class*="table-"] .author a:active {
    color: #FFFFFF;
}

.card [class*="table-"] h1 small,
.card [class*="table-"] h2 small,
.card [class*="table-"] h3 small {
    color: rgba(255, 255, 255, 0.8);
}


/* ============ Card Blog ============ */

.card-blog {
    margin-top: 30px;
}

.card-blog .card-caption {
    margin-top: 5px;
}

.card-blog .card-image + .category {
    margin-top: 20px;
}

.card-raised {
    box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}


/* ============ Card Background ============ */

.card-background {
    background-position: center;
    background-size: cover;
    text-align: center;
}

.card-background .table {
    position: relative;
    z-index: 2;
    min-height: 280px;
    padding-top: 40px;
    padding-bottom: 40px;
    max-width: 440px;
    margin: 0 auto;
}

.card-background .category,
.card-background .card-description,
.card-background small {
    color: rgba(255, 255, 255, 0.8);
}

.card-background .card-caption {
    color: #FFFFFF;
    margin-top: 10px;
}

.card-background:after {
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    table: "";
    background-color: rgba(0, 0, 0, 0.56);
    border-radius: 6px;
}


/* ============ Card Profile ============ */

.card-profile {
    margin-top: 30px;
    text-align: center;
}


/* ============ Card Category ============ */

.category {
    position: relative;
    line-height: 0;
    margin: 15px 0;
}

.card .category-social .fa {
    font-size: 24px;
    position: relative;
    margin-top: -4px;
    top: 2px;
    margin-right: 5px;
}


/* ============ Card Author ============ */

.card .author .avatar {
    width: 36px;
    height: 36px;
    overflow: hidden;
    border-radius: 50%;
    margin-right: 5px;
}

.card .author a {
    color: #333;
    text-decoration: none;
}

.card .author a .ripple-cont {
    display: none;
}


/* ============ Card Product ============ */

.card-product {
    margin-top: 30px;
}

.card-product .btn-simple.btn-just-icon {
    padding: 0;
}

.card-product .ftr {
    margin-top: 5px;
}

.card-product .ftr .stats {
    margin-top: 4px;
    top: 0;
}

.card-product .ftr h4 {
    margin-bottom: 0;
}

.card-product .card-caption,
.card-product .category,
.card-product .card-description {
    text-align: center;
}

.card-description p {
    color: #888;
}

.card-caption,
.card-caption a {
    color: #333;
    text-decoration: none;
}

.card-caption {
    font-weight: 700;
    font-family: "Roboto Slab", "Times New Roman", serif;
}



   </style>
</head>

<!-- Sid bars Social Page -->

<body id="body-pd" style="background-color: #131921">
   <header class="header" id="header"  style="background-color: #131921; margin-bottom: 20px;">
      <div class="header_toggle"> <i class='bx bx-menu text-white' id="header-toggle"></i> </div>
      <div class="header_title text-white"><h4>Social.Page</h4></div>
      
      <div class="header_img"> <img src="<?php echo $stu_img ?>" alt=""> </div>

   </header>
   <div class="l-navbar" id="nav-bar">
      <nav class="nav">
         <div class="whole_nav">
                <a href="../index.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">ZCommunity</span> </a>
            <div class="nav_list">
            <a href="./addpost.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
            <?php 
            if(!isset($_SESSION['is_login'])){ 
               echo '<a href="../loginor.php" class="nav_link"> <i class=\'fa-solid fa-right-to-bracket\'></i> <span class="nav_name">Sign In</span></a> 
                     <a href="../signupor.php" class="nav_link"> <i class=\'bx bx-user nav_icon\'></i> <span class="nav_name">Get Started</span></a>';
                  }else{    
                // echo '<a href="" class="nav_link" data-toggle="modal" data-target="#exampleModal"> <i class=\'fa-solid fa-plus\'></i> <span class="nav_name">Add Post</span></a>';
                // echo '<a href="" class="nav_link" data-toggle="modal" data-target="#shareKnowledge"> <i class=\'fa-solid fa-plus\'></i> <span class="nav_name">Share</span></a>';
                // echo '<a href="" class="nav_link" data-toggle="modal" data-target="#postQuery"> <i class=\'fa-solid fa-plus\'></i> <span class="nav_name">Post Query</span></a>';
               }
               ?>
                     <!-- <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span></a>  -->
                     <a href="postquery.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> 
                     <!-- <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a>  -->
                     <a href="./blog.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> 
                     <!-- <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>  -->
               </div>
            </div>
         <a href="../logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
      </nav>
   </div>
            

