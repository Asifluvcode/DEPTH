<?php 

include('./cominclude/header.php');
include_once('../dbconnection.php');


if(isset($_REQUEST['postBtn'])){
   
    // checking for the empty fields
    if(($_REQUEST['post_name'] == "") || ($_REQUEST['post_desc'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $post_name = $_REQUEST['post_name'];
        $post_desc = $_REQUEST['post_desc'];    
        $post_image = $_FILES['post_img']['name'];
        $post_image_temp = $_FILES['post_img']['tmp_name'];
        $img_folder = '../images/posts/'.$post_image;
        move_uploaded_file($post_image_temp, $img_folder);

        $sql = "INSERT INTO mediapost(post_name, post_desc, post_img) VALUES('$post_name', '$post_desc', '$img_folder')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Successfully Added</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Add Your Couse</div>';
        }
    }
}


?>

<div class="top-nav d-flex align-items-center" style="height: 720px; background-color: #131921;">
  <div class="container">
    <div class="row justify-content-center text-center" style="margin-top: -100;">
    <div class="col-sm-9 mt-5">
<div>
    <a class="btn btn-danger box" href="#" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-plus fa-2x"></i></a>
    <div class="col-lg-8 mx-auto text-center" style="color: white; margin-top: 80px;">
				<h1>Most Reasent Posts</h1>
				<p class="mb-0">Upload What ever you want and let the world watches it.</p>
			</div>
</div>
</div>
      </div>
      <div class="col-md-8">
      </div>
      <div class="col-md-12 text-center mt-3">
      </div>
    </div>
  </div>
</div>

<section>
  <div class="container mt-5 text-light">
    <div class="col-md-8-ml-auto">
      <?php 
      $sql = "SELECT * FROM mediapost";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              $post_id = $row['post_id'];
              echo '<div class="col">
                <div class="card h-100 bg-light text-dark" style="border: 2px solid white; padding: 10px; border-radius: 25px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
                  <img src="'.$row['post_img'].'" alt="Guitar" class="card-img-top" style="object-fit: cover; height: 100%;">
                  <div class="card-body">
                    <h5 class="card-title">' .$row['post_name']. '</h5>
                    <p class="card-text">' .$row['post_desc']. '</p>
                  </div>
                  <div class="text-right">
                    <a href="postdetail.php?post_id='.$post_id.'" type="hidden"></a>
                  </div>
                </div>
              </div>';
          }
      }
      ?>
    </div>
  </div>
</section>




<?php 

if(isset($_REQUEST['postSubmitBtn'])){
   
    // checking for the empty fields
    if(($_REQUEST['post_name'] == "") || ($_REQUEST['post_desc'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $post_name = $_REQUEST['post_name'];
        $post_desc = $_REQUEST['post_desc'];    
        $post_image = $_FILES['post_img']['name'];
        $post_image_temp = $_FILES['post_img']['tmp_name'];
        $img_folder = '../images/posts/'.$post_image;
        move_uploaded_file($post_image_temp, $img_folder);

        $sql = "INSERT INTO mediapost(post_name, post_desc, post_img) VALUES('$post_name', '$post_desc', '$img_folder')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Successfully Posted</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Add Your Post</div>';
        }
    }
}
?>



<!-- Post Add Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="post_name" class="col-form-label">Post Name:</label>
            <input type="text" class="form-control" id="post_name" name="post_name">
          </div>
          <div class="form-group">
            <label for="post_desc" class="col-form-label">Post Description:</label>
            <textarea class="form-control" id="post_desc" name="post_desc"></textarea>
          </div>
          <div class="form-group">
            <label for="post_img" class="col-form-label">Post Image:</label>
            <input type="file" class="form-control-file" id="post_img" name="post_img">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"  id="postSubmitBtn" name="postSubmitBtn">Add Post</button>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
      </form>
    </div>
  </div>
</div>




<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>






<?php

include('./cominclude/footer.php');
?>