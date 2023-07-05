<!-- Start Including Header -->
<?php
include('./dbconnection.php');
?>
<!-- End Including Header -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />
    <title>Course</title>

    <style>
        body{
            background-color: #131921;
        }
        .card{
            border:none
        }
        .product{
            background-color: #eee
        }
        .brand{
            font-size: 13px
        }
        .act-price{
            color:black;
            font-weight: 700
        }
        .dis-price{
            text-decoration: line-through
        }
        .about{
            font-size: 14px
        }
        .color{
            margin-bottom:10px
        }
        label.radio{
            cursor: pointer
        }
        label.radio input{
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }
        label.radio span{
            padding: 2px 9px;
            border: 2px solid black;
            display: inline-block;
            color: black;
            border-radius: 3px;
            text-transform: uppercase
        }
        label.radio input:checked+span{
            border-color: white;
            background-color: black;
            color: #fff
        }
        .btn-danger{
            background-color: #ff0000 !important;
            border-color: #ff0000 !important
        }
        .btn-danger:hover{
            background-color: #da0606 !important;
            border-color: #da0606 !important
        }
        .btn-danger:focus{
            box-shadow: none
        }
        .cart i{
            margin-right: 10px
        }
    </style>
</head>

<body>

<!-- Start course page banner -->

<!-- <div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/sky.jpg" alt="courses"
        style="height:180px; width:1800px; object-fit:cover; box-shadow:10px;"/>
    </div>
</div>

<div class="">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div> -->

<!-- End course page banner -->


<!-- Start of Product page  -->

<div class="container mb-5" style="margin-top: 100px;">
<h2 style="font-weight: bold; font-family: 'Playfair Display', serif; text-align: center; margin-bottom: 40px; color: white;">Place Your Order Here</h2>
<?php
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = $course_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="<?php echo str_replace('..', '.', $row['course_img']) ?>" width="250" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="<?php echo str_replace('..', '.', $row['course_img']) ?>" width="70"> <img onclick="change_image(this)" src="<?php echo str_replace('..', '.', $row['course_img']) ?>" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                               <a href="courses.php" style="text-decoration: none;"><div class="d-flex align-items-center" style="color: black;"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1"  style="color: black;">Back</span> </div></a>  <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Unlock exclusive!</span>
                                <h5 class="text-uppercase"><?php echo $row['course_name'] ?></h5>
                    <!--Linked--><form action="checkout.php?course_id=<?php echo $row['course_id'] ?>" method="post">
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">&#8377 <?php echo $row['course_price'] ?></span>
                                    <div class="ml-2"> <small class="dis-price">&#8377 <?php echo $row['course_original_price'] ?></small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about"><?php echo $row['course_desc'] ?> </p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Duration</h6> <label class="radio"> <input type="radio" name="size" value="3" checked> <span>*</span> </label> <label class="radio"> <input type="radio" name="size" value="Years"> <span><?php echo $row['course_duration'] ?></span> </label> 
                            </div>
                            <input type="hidden" name="amount" value="<?php echo $row['course_price'] ?>">
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-dark text-uppercase mr-2 px-4" type="submit" name="buy">Buy Now</button> <!-- <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> --></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End  of Product page  -->  


<!-- start Of lessons -->

<div class="list-group list-group-light">
    <div class="container" style="padding-left: 20%; padding-right: 20%; margin-top: 10px; margin-bottom: 30px;">
        <div class="row">
            <div class="col-lg-12">
                <a href="#" class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2 align-item-left text-left">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Lesson No.</th>
                                <th scope="col">Lesson Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM lesson";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                $num = 0;
                                while($row = $result->fetch_assoc()){
                                    if($course_id == $row['course_id']){
                                        $num++;
                                        echo '<tr>
                                            <th scope="row">'.$num.'</th>
                                            <td>'.$row['lesson_name'].'</td>
                                        </tr>';
                                    }
                    }
                }
                ?>
            </tbody>
        </table></a>
            </div>
        </div>
    </div>
</div>

<!-- End Of lessons -->

<!-- Start Of footer Section -->

<footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1 text-white">Copyright © 2023 || designed by ali || All rights reserved | Depth</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>

<!-- Start Of footer Section -->


<!-- Start of Footer -->

    <!-- Jquery, Bootstrap and Javascript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/all.min.js"></script>

    <script type="text/javascript" src="../js/custom.js"></script>


</body>
</html>
<!-- End of Footer -->