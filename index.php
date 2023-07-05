<!-- Start include header -->
<?php

if(!isset($_SESSION)){
   session_start();
 } 
 
   include('./dbconnection.php');
   include('./maininclude/header.php');
   
   
   $sql = "SELECT * FROM course";
   $result = $conn->query($sql);
   $totalcourse = $result->num_rows;
   
   $sql = "SELECT * FROM student";
   $result = $conn->query($sql);
   $totalstu = $result->num_rows;
   
   $sql = "SELECT * FROM courseorder";
   $result = $conn->query($sql);
   $totalsold = $result->num_rows;
   ?>
<!-- End including header -->
<!-- Start video background -->
<div class="top-nav d-flex align-items-center" style="height: 720px; background-color:#131921;">
   <div class="container">
      <div class="row justify-content-center text-center">
         <div class="col-md-10">
            <span class="h5 text-secondary fw-lighter" style="font-size: 20px;">Welcome</span>
            <h1 class="display-huge mt-3 mb-3 lh-1">Unlock your potential and Lets Crack Together</h1>
         </div>
         <div class="col-md-8">
            <p class="lead text-secondary">We are some sort of With community providing customizable features and seamless 
               integration with popular learning management systems, and making the global audience to reach out in one place.
            </p>
         </div>
         <div class="col-md-12 text-center mt-3">
            <a href="./zcommunity/addpost.php" class="btn btn-xl btn-light">
               Join us
               <svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
               </svg>
            </a>
         </div>
      </div>
   </div>
</div>
<!-- End video background -->
<!-- Start Text banner -->
<section class="py-0 py-xl-5" style="background-color:#131921;">
   <div class="container">
      <div class="row g-4">
         <!-- Counter item -->
         <div class="col-sm-6 col-xl-3">
            <div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-10 rounded-3">
               <span class="display-6 lh-1 text-warning mb-0"><i class="fa-solid fa-window-restore"></i></span>
               <div class="ms-4 h6 fw-normal mb-0">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="60"	data-purecounter-delay="200"><?php echo $totalcourse; ?></h5>
                     <span class="mb-0 h5">K+</span>
                  </div>
                  <p class="mb-0">Online Courses</p>
               </div>
            </div>
         </div>
         <!-- Counter item -->
         <div class="col-sm-6 col-xl-3">
            <div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">
               <span class="display-6 lh-1 text-info mb-0"><i class="fa-solid fa-chalkboard-user"></i></span>
               <div class="ms-4 h6 fw-normal mb-0">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="200" data-purecounter-delay="200">20</h5>
                     <span class="mb-0 h5">k+</span>
                  </div>
                  <p class="mb-0">Expert Tutors</p>
               </div>
            </div>
         </div>
         <!-- Counter item -->
         <div class="col-sm-6 col-xl-3">
            <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
               <span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-user-tie"></i></span>
               <div class="ms-4 h6 fw-normal mb-0">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="6" data-purecounter-delay="300"><?php echo $totalstu; ?></h5>
                     <span class="mb-0 h5">K+</span>
                  </div>
                  <p class="mb-0">Online Students</p>
               </div>
            </div>
         </div>
         <!-- Counter item -->
         <div class="col-sm-6 col-xl-3">
            <div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-10 rounded-3">
               <span class="display-6 lh-1 text-info mb-0"><i class="fas fa-user-graduate"></i></span>
               <div class="ms-4 h6 fw-normal mb-0">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="6" data-purecounter-delay="300"><?php echo $totalsold; ?></h5>
                     <span class="mb-0 h5">K+</span>
                  </div>
                  <p class="mb-0">Certified Courses</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Text banner -->

<div class="d-flex align-items-center justify-content-center text-center text-light" style="height: 360px; background-color: #131921;">
    <div class="row">
        <div class="col-12">
            <div class=" p-4 p-sm-5 rounded-5">
                <h1>MOST POPULAR COURSES!</h1>
                    <div class="text-light"><p>Choose the best of courses from specialized Instructors and Community</p></div>
            </div>
        </div>
    </div>
</div>
<!-- Start to more popular courses -->

<section class="chords-cards">

            <div class="container">
                <div class="cards-inner-flexbox">
                <?php 
         $sql = "SELECT * FROM course ORDER BY RAND() LIMIT 4";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                  $course_id = $row['course_id'];

                     echo '
                    <div class="cards-inner-flexboxitems" id="majors">
                        <div class="card-box">
                        <img src="' . str_replace('..', '.', $row['course_img']). '" alt="Course Image" class="card-img-top" style="object-fit: cover; height: 300px;  border-radius: 25px; padding: 5px; margin-top: -40px;">
                            <div class="card-box-2">
                                <h3>' .$row['course_name']. '</h3>
                                <p><small><del>&#8377;' .$row['course_original_price']. '</del></small></p>
                                <p><b>&#8377;' .$row['course_price']. '</b></p>
                                <a class="read-more-cta" href="coursedetail.php?course_id='.$course_id.'">Enroll > </a>
                            </div>
                        </div>
                    </div>';
               }}
               ?>
                       

                    </div>
                </div>
<div class="d-flex align-items-center justify-content-center text-center text-light" style="background-color: #131921;">
    <div class="row">
        <div class="col-12">
            <div class=" p-4 p-sm-5 rounded-5">
                <a href="courses.php" class=""><button type="button" class="btn btn-info">More Courses</button></a>
            </div>
        </div>
    </div>
</div>
        </section>


<!-- start Most popular courses -->
<section style="background-color: #131921; ">
   <div class="container">
      <div class="row mb-4">
         <div class="col-lg-8 mx-auto text-center" style="color: white; margin-top: 80px; margin-bottom: 20px;">
            <h1>Why is this Website For?</h1>
            <p class="mb-0">What it provides?</p>
         </div>
      </div>
      <div class="row align-items-center" style="">
         <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
            <div class="row align-items-center">
               <!--start col-->
               <div class="col-lg-6 col-md-6 col-6">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 d-none d-lg-block">
                        <div class="card work-desk-1 rounded border-0 shadow-lg overflow-hidden" style="width: 300px; height: 450px;">
                           <div class="embed-responsive embed-responsive-16by9">
                              <video class="embed-responsive-item" src="images/sitelogo/327x450.mp4" autoplay loop muted width="320px" height="450" controls="false" onclick="return false;" controlslist="nodownload nofullscreen" disableRemotePlayback playsinline style="object-fit: cover; pointer-events: none;"></video>
                           </div>
                           <div class="img-overlay bg-dark"></div>
                        </div>
                     </div>
                     <!--end col-->
                     <div class="col-12">
                        <div class="mt-4 pt-2 text-right">
                           <a href="about.php" class="btn btn-info">Read More <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <!--end row-->
               </div>
               <!--end col-->
               <div class="col-lg-6 col-md-6 col-6">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 mt-4 pt-2 d-none d-lg-block">
                        <div class="card work-desk-2 rounded border-0 shadow-lg overflow-hidden">
                           <img src="images/sitelogo/241x362.jpg" class="img-fluid" alt="Image" />
                           <div class="img-overlay bg-dark"></div>
                        </div>
                     </div>
                     <!--end col-->
                     <div class="col-lg-12 col-md-12 mt-4 pt-2 d-none d-lg-block">
                        <div class="card work-desk-3 rounded border-0 shadow-lg overflow-hidden" style="width: 300px; height: 200px;">
                           <div class="embed-responsive embed-responsive-16by9">
                              <video class="embed-responsive-item" src="images/sitelogo/600x401.mp4" autoplay loop muted width="300px" height="200px" controls="false" onclick="return false;" controlslist="nodownload nofullscreen" disableRemotePlayback playsinline style="object-fit: cover; pointer-events: none;"></video>
                           </div>
                           <div class="img-overlay bg-dark"></div>
                        </div>
                     </div>
                     <!--end col-->
                  </div>
                  <!--end row-->
               </div>
               <!--end col-->
            </div>
            <!--end row-->
         </div>
         <!--end col-->
         <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
            <div class="section-title ml-lg-5">
               <h5 class="text-light font-weight-normal mb-3">About</h5>
               <h4 class="title mb-4 text-light">
                  Our mission is to make <br />
                  Everyones life to study as much they Need.
               </h4>
               <p class="text-light mb-0 text-light">"If you work hard and stay dedicated, success will inevitably follow. Effort and persistence are the keys to unlocking your full potential."</p>
               <div class="row" style="color: blue;">
                  <div class="col-lg-6 mt-4 pt-2">
                     <div class="media align-items-center rounded shadow p-3 bg-white" style="box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);">
                        <i class="fa fa-play h4 mb-0 text-custom"></i>
                        <h6 class="ml-3 mb-0"><a href="courses.php" class="text-dark">Responsive</a></h6>
                     </div>
                  </div>
                  <div class="col-lg-6 mt-4 pt-2">
                     <div class="media align-items-center rounded shadow p-3 bg-white" style="box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);">
                        <i class="fa fa-file-download h4 mb-0 text-custom"></i>
                        <h6 class="ml-3 mb-0"><a href="./zcommunity/blog.php" class="text-dark">Free Download</a></h6>
                     </div>
                  </div>
                  <div class="col-lg-6 mt-4 pt-2">
                     <div class="media align-items-center rounded shadow p-3 bg-white" style="box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);">
                        <i class="fa fa-user h4 mb-0 text-custom"></i>
                        <h6 class="ml-3 mb-0"><a href="javascript:void(0)" class="text-dark">Support</a></h6>
                     </div>
                  </div>
                  <div class="col-lg-6 mt-4 pt-2">
                     <div class="media align-items-center rounded shadow p-3 bg-white" style="box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);">
                        <i class="fa fa-image h4 mb-0 text-custom"></i>
                        <h6 class="ml-3 mb-0"><a href="./zcommunity/addpost.php" class="text-dark">Development</a></h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end col-->
      </div>
      <!--enr row-->
   </div>
</section>


<!-- Start including feedback -->
<div class="align-items-center justify-content-center text-center" style="background-color: #131921; height: 500px;">
   <div id="student-feedback-carousel" class="carousel slide" data-bs-ride="carousel">
      <h1 class="pt-5 text-light">Testimonials!</h1>
      <div class="carousel-inner align-items-center justify-content-center text-center">
         <?php
            $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.id = f.stu_id";
            $result = $conn->query($sql);
            $first = true;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $s_img = $row['stu_img'];
                $n_img = str_replace('..', '.', $s_img);
                ?>
         <div class="carousel-item<?php echo $first ? ' active' : '' ?>" >
            <div class="container" style="background-color:#131921;">
               <div class="row justify-content-center">
                  <div class="col-md-12 mb-4 p-4 p-sm-5 rounded-5">
                     <div class="card p-3 text-center px-4 h-100 bg-dark text-white" style="border: 2px solid white; padding: 10px; border-radius: 25px;">
                        <div class="user-image">
                           <img src="<?php echo $n_img ?>" class="rounded-circle" style="max-width: 100px; max-height: 100px;" width="80">
                        </div>
                        <div class="user-content">
                           <h5 class="mb-0"><?php echo $row['stu_name'] ?></h5>
                           <span><?php echo $row['stu_occ'] ?></span>
                           <p><?php echo $row['f_content'] ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php 
            $first = false;
            }
            }
            ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#student-feedback-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#student-feedback-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
      </button>
   </div>
   <script>
      $(document).ready(function() {
        $('#student-feedback-carousel').carousel({
          interval: 3000
        });
      
        $('.carousel-control-prev').click(function() {
          $('#student-feedback-carousel').carousel('prev');
        });
      
        $('.carousel-control-next').click(function() {
          $('#student-feedback-carousel').carousel('next');
        });
      });
   </script>
</div>
</div>
<!-- End including feedback -->







<!-- start including footer -->
<?php
   include('./maininclude/footer.php');
   ?>
<!-- End including Footer -->