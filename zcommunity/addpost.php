<?php
if(!isset($_SESSION)){
  session_start();
} 
include_once('../dbconnection.php');
include('./cominclude/socialheader.php');

if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
  }

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
        $post_email = $_REQUEST['post_email'];

        $sql = "INSERT INTO mediapost(post_name, post_desc, post_img, post_email) VALUES('$post_name', '$post_desc', '$img_folder', '$post_email')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Successfully Added</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Add Your Couse</div>';
        }
    }
}

?>


<!-- Hero -->
   <section class="hero">
   <div class="container">
      <div class="row">
      <?php 
      $sql = "SELECT * FROM mediapost JOIN student ON mediapost.post_email = student.stu_email ORDER BY post_id DESC";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              $post_id = $row['post_id'];
        echo '<div class="col-lg-6 offset-lg-3">
            <div class="cardbox shadow-lg bg-white">
               <div class="cardbox-heading">
                  <div class="media m-0">
                     <div class="d-flex mr-3">
                        <a href=""><img class="img-fluid rounded-circle" src="'.$row['stu_img'].'" alt="User"></a>
                     </div>
                     <div class="media-body">
                        <p class="m-0">'.$row['stu_name'].'</p>
                        <small><span>'.$row['post_name'].'</span></small> 
                     </div>
                  </div>
                  <!--/ media -->
               </div>
               <!--/ cardbox-heading -->
               <div class="cardbox-item">
                  <img class="img-fluid" src="'.$row['post_img'].'" alt="Image">
               </div>
               <!--/ cardbox-item -->
               <div class="cardbox-base">
                  
                  <ul>
                      <button class="btn like-btn" id="like1"></button>
                      <button class="btn dislike-btn" id="dislike1"></button>
                      <li><a><span id="total-likes"></span></a></li>
                  </ul>
                </div>

               <!--/ cardbox-base -->
               <!-- <div class="cardbox-comments">
                  <span class="comment-avatar float-left">
                  <a href=""><img class="rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/6.jpg" alt="..."></a>                            
                  </span>
                  <div class="search">
                     <input placeholder="Write a comment" type="text">
                     <button><i class="fa fa-camera"></i></button>
                  </div>
                 
               </div> --> 
                      <!--/ Search -->
               <!--/ cardbox-like -->			  
            </div>
            <!--/ cardbox -->
         </div>';
        }
      }
         ?>
         <!--/ col-lg-6 -->	
         <div class="col-lg-3">
            <div class="shadow-lg p-4 mb-2 bg-white author">
               <a href="http://www.themashabrand.com/">Get more by DEPTH</a>
               <p>Share and Gain knowledge</p>
            </div>
         </div>
         <!--/ col-lg-3 -->
      </div>
      <!--/ row -->
   </div>
   <!--/ container -->
</section>

<script>
  // Add event listener to all like buttons
const likeBtns = document.querySelectorAll('.like-btn');
likeBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    // Get the corresponding like count element and increment it by 1
    const likeCountElem = btn.parentElement.querySelector('#like1-bs3');
    likeCountElem.textContent = parseInt(likeCountElem.textContent) + 1;
  });
});
</script>



<!-- For Adding the post -->
<div class="fixed-bottom" id="header-toggle" style="text-align: right; padding: 0px 50px 100px;">
    <?php
      if(isset($_SESSION['is_login'])){ 
          echo '<a class="btn btn-dark box" href=""  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-2x"></i></a>';
      }else{
        echo '<a class="btn btn-dark box" href="../loginor.php"  "><i class="fas fa-plus fa-2x"></i></a>';
      }
      ?>
</div>


<!-- Post Add Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"> <!-- modal-dialog-centered -->
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
          <input type="hidden" name="post_email" id="post_email" value="<?php echo $stuLogEmail ?>">
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
      </form>
    </div>
  </div>
</div>


<?php 
include('./cominclude/socialfooter.php');
?>