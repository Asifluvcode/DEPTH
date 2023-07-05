<?php 
if(!isset($_SESSION)){
   session_start();
}

include('./stuInclude/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
   $stuEmail = $_SESSION['stuLogEmail'];
}else{
   echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM student WHERE stu_email= '$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
   $row = $result->fetch_assoc();
   $stuId= $row["id"];
}

if(isset($_REQUEST['submitFeedbackBtn'])){
    if(empty($_REQUEST['f_content'])){
       // checking for the empty field
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $fcontent = mysqli_real_escape_string($conn, $_REQUEST["f_content"]);
        $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent', '$stuId')";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Posted Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Post</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
   <h3 class="text-center">Student Profile</h3>
    <form class="mx-5" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="id">Student ID</label>
         <input type="text" class="form-control" id="id" name="id" value="<?php if(isset($stuId))
         { echo $stuId; } ?>" readonly>
      </div>
      <div class="form-group">
         <label for="f_content">Feedback</label>
         <textarea type="text" class="form-control" id="f_content" name="f_content" minlength="30" required></textarea>
      </div>
      <div class="text-left">
         <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Send</button>
         <?php if(isset($msg)) {echo $msg;} ?>
      </div>
    </form>
</div>

<?php  
include('./stuInclude/footer.php');
?> 
