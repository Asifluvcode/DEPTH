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

if(isset($_REQUEST['stuPassUpdateBtn'])){
    if(($_REQUEST['stuNewPass'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $stuPass = $_REQUEST['stuNewPass'];
            $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
            if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            }else{
                $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
            }
        }
    }
 }
 ?>

<div class="col-sm-9 mt-5">
    <div class="row">
    <h3 class="text-center text-light">Change Your Exesting Password.</h3>

        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>"readonly>
                </div>
                <div class="form-gorup">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" Placeholder="New Password" 
                     name="stuNewPass">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button><br>  
                <?php if(isset($passmsg)) {echo $passmsg;} ?><br>
            </form>
        </div>
    </div>
   </div>
   
   </div><!--  div Row close from Header -->
  </div> <!--  div Container fluid-fluid close from header -->



<?php 
include('./stuInclude/footer.php');
?>