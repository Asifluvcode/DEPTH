<?php 
if(!isset($_SESSION)){
   session_start();
}

include_once('../dbconnection.php');

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
    <title>Watch Course</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css"> 
    <link rel="stylesheet" href="../css/stustyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <style>
    
    </style>
</head>
<body style="background-color: #131921; color: #fff;">
  <!-- Start of Navbar -->
 <header>
<nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark bg-dark">
    <div class="container">
        <a href="../index.php">
        <img src="../images/sitelogo/depth1.png" alt="Depth" height="60px"></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <!-- <li class="nav-item">
            <a class="nav-link" href="#!"></a>
          </li> -->
          <li class="nav-item">
          <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $stu_img ?>" class="rounded-circle" height="22" alt="" loading="lazy"/></a>
          </li>
          <a href="./myCourse.php"><button type="button" class="btn btn-light ms-3">My Courses</button></a>
          <a href="../zcommunity/addpost.php"><button type="button" class="btn btn-light ms-3">Community</button></a>
        </ul>
      </div>
    </div>
  </nav><!-- End of Navbar -->
  </header> 


  <div class="container mt-5">
    <div class="py-5 text-center">
        <h2 style="font-weight: bold; font-family: 'Playfair Display', serif;">Course Watch Section</h2>
        <?php
  if(isset($_GET['course_id'])){
    $course_id = $_GET['course_id'];
    $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of the first row
      $row = $result->fetch_assoc();
      $course_name = $row['course_name'];
      echo '<p>'.$course_name.'</p>';
    } else {
      echo '0 results';
    }
  }
?>
       
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4 mt-5">
            <div class="list-group list-group-dark list-group-borderless collapse-list bg-light">
              <h1 class="text-center text-dark">Lessons</h1>
              <ul class="nav flex-column" id="playlist">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <ul class="nav flex-column" id="playlist">
                      <?php
                      if(isset($_GET['course_id'])){
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                          $num = 0;
                          while($row = $result->fetch_assoc()){
                            if($course_id == $row['course_id']){
                              $num++;
                              echo '<tr>
                                <th scope="row">'.$num.'</th>
                                <td><li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="course: point;">'.$row['lesson_name'].'</li></td>
                              </tr>';
                            }
                          }
                        }
                      }
                      ?>
                    </ul>
                  </tbody>
                </table>
              </ul>
            </div>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Suggesstion">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1"> <!-- Start of video -->
              <video src="" id="videoarea" class="mt-5 w-100" controls></video>
        </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1 text-light">© 2023 All rights reserved | Depth</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>



    <!-- Jquery, Bootstrap and Javascript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/all.min.js"></script>

    <script type="text/javascript" src="../js/custom.js"></script>


</body>
</html>