<?php 

if(!isset($_SESSION)){
   session_start();
}

include('./admininclude/header.php');
include('../dbconnection.php');


if(isset($_SESSION['is_admin_login'])){
   $adminEmail = $_SESSION['adminLogEmail'];
}else{
   echo "<script> location.href='../index.php'; </script>";
}

// <!-- update -->
if(isset($_REQUEST['requpdate'])){
   // checking for Empty Fields
   if(($_REQUEST['id'] == "") || ($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || 
   ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")){
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
      // Assigning user values to variables
      $sid = $_REQUEST['id'];
      $sname = $_REQUEST['stu_name'];
      $semail = $_REQUEST['stu_email'];    
      $spass = $_REQUEST['stu_pass'];    
      $socc= $_REQUEST['stu_occ'];
      $simg = '../images/stu/'. $_FILES['stu_img']['name'];    

      $sql = "UPDATE student SET id = '$sid', stu_name = '$sname', stu_email = '$semail', stu_pass = '$spass',
      stu_occ = '$socc', stu_img = '$simg' WHERE id = '$sid'";
      if($conn->query($sql) == TRUE){
         $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
        } else {
         $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Update</div>';
      }
    }
}




?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
<?php
if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM student WHERE id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

   <h3 class="text-center">Update Student Detail</h3>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="stu_id">ID</label>
         <input type="text" class="form-control" id="id" name="id" value="<?php if(isset($row['id']))
         { echo $row['id']; } ?>"readonly>
      </div>
      <div class="form-group">
         <label for="stu_name">Name</label>
         <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name']))
         { echo $row['stu_name']; } ?>">
      </div>
      <div class="form-group">
         <label for="stu_email">email</label>
         <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email']))
         { echo $row['stu_email']; } ?>">
      </div>
      <div class="form-group">
         <label for="stu_pass">Password</label>
         <input type="text" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass']))
         { echo $row['stu_pass']; } ?>">
      </div>
      <div class="form-group">
         <label for="stu_occ">Occupation</label>
         <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($row['stu_occ']))
         { echo $row['stu_occ']; } ?>">
      </div>
      <div class="form-group">
         <label for="stu_img">Course Thumbnail</label>
         <img src="<?php if(isset($row['simg'])) { echo $row['simg']; } ?>" class="img-thumbnail">
         <input type="file" class="form-control-file" id="stu_img" name="stu_img">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
        <a href="student.php" class="btn btn-secondary">Close</a> 
      </div>
      <?php if(isset($msg)) {echo $msg;} ?>
   </form>
  </div>
 </div>
</div> <!-- Div row Course form header-->


<?php 
include('./admininclude/footer.php');
?>