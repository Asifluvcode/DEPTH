<?php
if(!isset($_SESSION)){
  session_start();
} 
include_once('../dbconnection.php');
include('./cominclude/socialheader.php');
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
    }



    if(isset($_POST["querypost"])) {
      
      $query_category = $_REQUEST['query_category'];
      $query = $_REQUEST['query'];
      $query_email = $_REQUEST['query_email'];
      $post_date = $_POST['post_date'];
    
      $allowed_ext = array("pdf");
    
    
            $sql = "INSERT INTO querypost(query_email, query_category, post_date, query) VALUES ('$query_email','$query_category','$post_date','$query')";
            if ($conn->query($sql) === TRUE) {
                echo "Query Posted successfully.";
            }
          }
    ?>
?>



<section>
<article class="col-md-12 mt-5">
        <!-- Modern - Bootstrap Cards -->
        <header>

        <!-- BLOG CARDS -->

        <div class="cards-1 section-gray">
            <div class="container">
                <div class="row">
                <?php
                $sql = "SELECT * FROM querypost JOIN student ON querypost.query_email = student.stu_email ORDER BY query_category DESC";
                $result = $conn->query($sql);

                // display links to view PDF files
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {

                    // Get the date the post was created
                    $post_date = $row['post_date'];

                    echo '<div class="col-md-4">
                    <div class="card">
                            <div class="table">
                                <h6 class="category text-danger">
	    									<i class="fa fa-globe "></i>'.$row['query_category'].'
	    								</h6>
                                <h4 class="card-caption">
	    									<a href="#">'.$row['query'].'</a>
	    								</h4>
                                <div class="ftr">
                                    <div class="author">
                                        <a href="#"> <img src="'.$row['stu_img'].'" alt="" class="avatar img-raised"> <span>'.$row['stu_name'].'</span>
                                            <div class="ripple-cont">
                                                <div class="ripple ripple-on ripple-out" style="left: 574px; top: 364px; background-color: rgb(60, 72, 88); transform: scale(11.875);"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="stats">Posted: '.$post_date.'</div>
                                </div>
                            </div>
                        </div>
                    </div>';
                  }
                } else {
                  echo "No Queries Posted.";
                }
                ?>

            </div>
        </div>
        
    </article>
</section>

    <!-- Posting -->
    <div class="fixed-bottom" id="" style="text-align: right; margin-right: 50px; margin-bottom: 100px;">
    <?php
            if(isset($_SESSION['is_login'])){ 
                echo '<a class="btn btn-dark box" href=""  data-toggle="modal" data-target="#postQuery"><i class="fas fa-plus fa-2x"></i></a>';
            }else{
              echo '<a class="btn btn-dark box" href="../loginor.php"  "><i class="fas fa-plus fa-2x"></i></a>';
            }
            ?>
</div>


    <!-- Modal for Posting Query -->
<div class="modal fade" id="postQuery" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"> <!-- modal-dialog-centered -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel">Post Query</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="query_category" class="col-form-label">Query Category</label>
            <input type="text" class="form-control" id="query_category" name="query_category">
            <label for="query" class="col-form-label">Query</label>
            <input type="text" class="form-control" id="query" name="query">
            
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"  id="querypost" name="querypost">Post</button>
          <input type="hidden" name="query_email" id="query_email" value="<?php echo $stuLogEmail ?>">
          <input type="hidden" name="post_date" value="<?php echo date('Y-m-d'); ?>" readonly />
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
      </form>
    </div>
  </div>
</div>





<?php 
include('./cominclude/socialfooter.php');
?>