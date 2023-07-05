<?php 
if(!isset($_SESSION)){
   session_start();
}

include('./stuInclude/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
   $stuLogEmail = $_SESSION['stuLogEmail'];
}else{
   echo "<script> location.href='./loginor.php'; </script>";
}

if(isset($_POST['requestsend'])){
   
    // checking for the empty fields
    if(($_POST['inst_name'] == "") || ($_POST['inst_response'] == "") || ($_POST['inst_score'] == "") ){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $inst_email = $_POST['inst_email'];
        // $inst_name = $_POST['inst_name'];
        $inst_response = $_POST['inst_response'];
        $inst_score = $_POST['inst_score'];

        // Check if the answer to 2+2 is correct
        if($inst_score == 4) {
            $sql = "INSERT INTO instructor_test(inst_response, inst_email, inst_score) VALUES('$inst_response','$inst_email', '$inst_score')";

            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-12 ml-5 mt-2"> Response Requested Successfully</div>';
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Process</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">You are not eligible</div>';
        }
    }
}

?>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
   <h3 class="text-center">Instruct Access Request</h3>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="inst_name">Your Name</label>
         <input type="text" class="form-control" id="inst_name" name="inst_name">
      </div>
      <div class="form-group">
         <!-- <label for="inst_email">Email</label> -->
         <input type="hidden" class="form-control" id="inst_email" value="<?php echo $stuLogEmail ?>" name="inst_email">
      </div>
      <div class="form-group">
         <label for="inst_response">Why You want to Become an Instructor?</label>
         <!-- <input type="text" class="form-control" id="inst_response" name="inst_response"> -->
         <textarea type="text" class="form-control" id="inst_response" name="inst_response""></textarea>
      </div>
      <div class="form-group">
      <label for="inst_response">Verify!</label><br>
         <label for="inst_score">2+2= </label>
         <input type="text" class="form-control-file" id="inst_score" name="inst_score">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-danger" id="requestsend" name="requestsend">Submit</button>
        <!-- <a href="instructor.php" class="btn btn-secondary">Close</a>  -->
      </div>
      <?php if(isset($msg)) {echo $msg;} ?>
   </form>
 </div>
</div> <!-- Div row Course form header-->


<?php  
include('./stuInclude/footer.php');
?>
