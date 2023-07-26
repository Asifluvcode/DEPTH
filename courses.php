<!-- Start Including Header -->
<?php
include('./dbconnection.php');
include('./maininclude/header.php');
?>


<div class="d-flex align-items-center justify-content-center text-center text-light" style="height: 360px; background-color: #131921;">
    <div class="row">
        <div class="col-12">
            <div class=" p-4 p-sm-5 rounded-5">
                <h1>Featured Courses!</h1>
                    <div class="text-light"><p>The Folowing Courses Displaying are the Top selling Courses this Month</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="chords-cards">

            <div class="container" style="padding: 40px;">
                <div class="cards-inner-flexbox">
                <?php 
        $sql = "SELECT c.*, COUNT(co.course_id) as total_purchases FROM course c JOIN courseorder co ON c.course_id = co.course_id WHERE c.status = 1 GROUP BY co.course_id ORDER BY total_purchases DESC LIMIT 4";
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
        </section>







<!-- End course page banner -->
<div class="d-flex align-items-center justify-content-center text-center text-light" style="height: 360px; background-color: #131921;">
<div class="row">
<div class="col-12">
<div class=" p-4 p-sm-5 rounded-5">
<h1>Popular Courses!</h1>
<div class="text-light"><p>Enroll to receive Instruction and Access</p></div>

</div>
</div>
</div>
</div>
<section style="background-color: #131921;">
<!-- start Most popular courses -->
<div class="container">
    <!-- <h1 class="text-center" style="color: white;">Popular Courses</h1> -->
    <!-- Start Most Popular Course 1st card Deck -->
    <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-top: -120px;">
        <?php 
        $sql = "SELECT * FROM course WHERE status = 1 ORDER BY course_id DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '<div class="col" style="margin-bottom: 50px;">
                <div class="card h-100 bg-dark text-white" style="border: 2px solid white; padding: 10px; border-radius: 25px;">
                    <img src="' . str_replace('..', '.', $row['course_img']). '" alt="Course Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">' .$row['course_name']. '</h5>
                        <p class="card-text">' .$row['course_desc']. '</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text m-0">Price :<small><del>&#8377;' .$row['course_original_price']. '</del></small>
                        <span><b>&#8377;' .$row['course_price']. '</b></span>
                    </p>
                    <div class="text-right">
                        <a href="coursedetail.php?course_id='.$course_id.'" class="btn btn-light text- fontblack-weight-bolder">Enroll</a>
                    </div>
                    </div>
              </div>
              </div>';
            }
        }
        ?>
    </div>
    </div>
    </section>
<!-- End Most Popular Course card Deck -->
<div class="d-flex align-items-center justify-content-center text-center text-light" style="height: 360px; background-color: #131921;">
    <div class="row">
        <div class="col-12">
            <div class=" p-4 p-sm-5 rounded-5">
                <h1>Become An Instructor!</h1>
                    <div class="text-light"><p>Sign up to receive Instruction and Access</p></div>
                <a href="users/request.php" class=""><button type="button" class="btn btn-info">Sign Up!</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Start including Footer -->
<?php
include('./maininclude/footer.php');
?>
<!-- End including Footer -->
