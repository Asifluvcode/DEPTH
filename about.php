<?php
include('./dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <title>About Us</title>
    <style>
       html,
        .swiper-section{

            background: #131921;
        }

        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 320px;
            background: #fff;
            box-shadow: 0 15px 50px rgba(0,0,0,0.2);
            filter: blur(4px);
        }
        .testimonial-box .content {
            padding-right: 80px;
        }
        .swiper-slide img {
            display: block;
            width: 100%;
        }

        .testimonial-box{
            position: relative;
            width: 100%;
            padding: 40px;
            padding-top: 30px;
            color: #999;
        }
        .testimonial-box .quote{
            position: absolute;
            top: 20px;
            right: 30px;
            opacity: 0.2;
        }

        .testimonial-box .details{
            display: flex;
            align-items: center;
            margin-top: 50px;
        }
        .testimonial-box .details .imgBx{
            position: relative;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }
        .testimonial-box .details .imgBx .img{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .testimonial-box .details h3{
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 1px;
            color: #2196f3;
            Line-height: 1.1em;
        }
        .testimonial-box .details h3 span{
            font-size: 12px;
            color: #666;
        }
        .swiper-3d .swiper-slide-shadow-left {
            background-image: none;
        }
        .swiper-3d .swiper-slide-shadow-right {
            background-image: none;
    }
    .swiper-slide-active{
      filter: blur(0px);
    }


    .section-header {
  padding-bottom: 40px;
  padding-top: 40px;
  
}

.section-header h2 {
  font-size: 14px;
  font-weight: 500;
  padding: 0;
  line-height: 1px;
  margin: 0 0 5px 0;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.6);
  font-family: var(--font-primary);
}

.section-header h2::after {
  content: "";
  width: 120px;
  height: 1px;
  display: inline-block;
  background: #5bd9a9;
  margin: 4px 10px;
}

.section-header p {
  margin: 0;
  margin: 0;
  font-size: 36px;
  font-weight: 700;
  font-family: var(--font-secondary);
  color: #fff;
}


/*--------------------------------------------------------------
# Page Header
--------------------------------------------------------------*/


/* Styles for the top-nav container */
.top-nav {
  height: 720px;
  background-color: #131921;
}

/* Styles for the container */
.container {
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 15px;
  padding-right: 15px;
}

/* Styles for the row */
.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}

/* Styles for the column */
.col-md-10,
.col-md-8,
.col-md-12 {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}

.col-md-10 {
  margin-top: 100px;
}

.col-md-10 .h5 {
  font-size: 20px;
  color: #d3d3d3;
  font-weight: lighter;
}

.col-md-10 h1 {
  font-size: 60px;
  margin-top: 0px;
  margin-bottom: 20px;
  line-height: 1.2;
  color: #fff;
}

.col-md-8 {
  margin-top: 30px;
  margin-bottom: 30px;
}

.col-md-8 p {
  font-size: 24px;
  color: #d3d3d3;
  line-height: 1.5;
}

.col-md-12 {
  margin-top: 30px;
}

.col-md-12 a {
  display: inline-block;
  padding: 16px 60px;
  font-size: 20px;
  font-weight: 500;
  color: #fff;
  background-color: #d3d3d3;
  border-radius
}

/* Footer */

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
.footer {
  margin-top: 30px;
  padding: 30px 0;
  font-size: 14px;
  border-top: 1px solid rgba(255, 255, 255, 0.15);
}

.footer .copyright {
  text-align: center;
  color: rgba(255, 255, 255, 0.8);
}

.footer .credits {
  padding-top: 6px;
  text-align: center;
  font-size: 13px;
  color: rgba(255, 255, 255, 0.8);
}

.footer .credits a {
  color: var(--color-primary);
}

@media screen and (min-width:0px) and (max-width: 700px){
    .col-md-8{
       display: none;
    }
}

  </style>
</head>
<body>
<!-- ======= About Section ======= -->


<!-- End About Section -->
 <!-- ======= End Page Header ======= -->
 <div class="section-header" style="margin-top: 50px; text-align: center;">
  <p>Who We are What We Do ?</p><br>
  <h2>ABOUT US!</h2>
</div>

 <div class="top-nav d-flex align-items-center" style="height: 720px; background-color:#131921; text-align: center;">
   <div class="container">
      <div class="row justify-content-center text-center">
         <div class="col-md-10">
            <!-- <span class="h5 text-secondary fw-lighter" style="font-size: 20px;">Welcome</span> -->
            <h1 class="display-huge mt-3 mb-3 lh-1">Unlock your potential and Lets Crack Together</h1>
         </div>
         <div class="col-md-8">
            <p class="lead text-secondary">Welcome to our <b>DEPTH</b> site! which is often abbrivated as <b><i>Distributive Educational paltform transformative Hybrid education</i></b>... Who we are?. We are a community-based platform that offers a wide range of online courses and educational resources. Our mission is to provide accessible 
              and affordable education to everyone, regardless of their location or background. Our courses are created and taught by experienced students and professionals in their respective fields, ensuring the highest
               quality of learning. We believe in the power of community, and our platform allows learners to connect with each other, share knowledge and collaborate on projects. Join us on this exciting journey of learning and growth!
            </p>
         </div>
         <div class="col-md-12 text-center mt-3">
            <a href="./zcommunity/addpost.php" class="btn btn-xl btn-light" style="color: black;">
               Explore More
               <svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
               </svg>
            </a>
         </div>
      </div>
   </div>
</div>

 <!-- End Page Header -->

<section class="swiper-section testimonial" style="margin-top: 50px;">
  <div class="swiper-container">
  <div class="section-header" style="text-align: center;">
    <p>What Students are saying</p><br>
    <h2>Testimonials</h2>
        </div>
    <div class="swiper-wrapper">
    

    <?php
      $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.id = f.stu_id";
      $result = $conn->query($sql);
      $first = true;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $s_img = $row['stu_img'];
          $n_img = str_replace('..', '.', $s_img);
          ?>
      <div class="swiper-slide <?php echo $first ? ' active' : '' ?>"><!--start of swiper-slider card-->
        <div class="testimonial-box">
          <i class="fa-solid fa-quote-left"></i>
          <span>Review</span>
          <div class="content">
            <p><?php echo $row['f_content'] ?></p>
            <div class="details">
              <div class="imgBx">
                <img src="<?php echo $n_img ?>" alt="ali">
              </div>
              <h3><?php echo $row['stu_name'] ?><br><span><?php echo $row['stu_occ'] ?></span></h3>
            </div>
          </div>
        </div>
      </div><!--end of swiper-slider-->
      <?php 
          $first = false;
        }
      }
      ?>
    </div>
  </div>
</section>

<script>
  var swiper = new Swiper(".swiper-container", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 200,
      modifier: 2,
      slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
      },
  });
</script>

    </div>
  </div>
</section>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DEPTH</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       Designed by <a href="index.php">Ali</a>
      </div>
    </div>
  </footer><!-- End Footer -->
 

</body>
</html>