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
$stuName = $row["stu_name"];
$stuOcc = $row["stu_occ"];
$stuImg = $row["stu_img"];
}

 if(isset($_REQUEST['updateStuNameBtn'])){
   if(($_REQUEST['stu_name'] == "")){
      // checking for the empty fields
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
   }else{
      $stuName = $_REQUEST['stu_name'];
      $stuOcc = $_REQUEST['stu_occ'];
      $stu_image = $_FILES['stu_img']['name'];
      $stu_image_temp = $_FILES['stu_img']['tmp_name'];
      $img_folder = '../images/stu/'. $stu_image;
      move_uploaded_file($stu_image_temp, $img_folder);

      $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$img_folder'
      WHERE stu_email = '$stuEmail'";
      if($conn->query($sql) == TRUE){
         $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successful</div>';
        } else {
         $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Update</div>';
      }
   }
 }

 ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <div class="form-body">
        <div class="form-content">
            <div class="form-items">
                <h3>Student Profile</h3>
                <p>Update your profile below.</p>
                <form class="requires-validation"  method="POST" enctype="multipart/form-data" novalidate>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="id">Student ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?php if(isset($stuId)) { echo $stuId; } ?>" readonly required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="stu_email">Email</label>
                            <input type="text" class="form-control" id="stu_email" value="<?php echo $stuEmail ?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="stu_name">Name</label>
                            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($stuName)) { echo $stuName; } ?>" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="stu_occ">Occupation</label>
                            <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($stuOcc)) { echo $stuOcc; } ?>" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="stu_img">Profile</label>
                            <input type="file" class="form-control-file" id="stu_img" name="stu_img" required>

                        </div>
                    </div>

                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="invalidCheck" id="invalidCheck" required="required">
                        <label class="form-check-label">I confirm that all data are correct</label>
                    </div> -->

                    <div class="form-button mt-3">
                        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
                        <?php if(isset($msg)) {echo $msg;} ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
     <!-- Close Row Div from header -->

<?php  
include('./stuInclude/footer.php');
?>