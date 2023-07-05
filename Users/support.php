<?php 
if(!isset($_SESSION)){
   session_start();
}

include('./stuInclude/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
   $stuEmail = $_SESSION['stuLogEmail'];
}else{
   echo "<script> location.href='loginor.php'; </script>";
}

$sql = "SELECT * FROM student WHERE stu_email= '$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
   $row = $result->fetch_assoc();
   $stuId= $row["id"];
}

if(isset($_REQUEST['submitFeedbackBtn'])){
    if(empty($_REQUEST['query'])){
       // checking for the empty field
       $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $fcontent = mysqli_real_escape_string($conn, $_REQUEST["query"]);
        $sql = "INSERT INTO support (query, id, email) VALUES ('$fcontent', '$stuId', '$stuEmail')";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Posted Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Post</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
   <h3 class="text-center">Ask Anything</h3>
    <form class="mx-5" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="id">Student ID</label>
         <input type="text" class="form-control" id="id" name="id" value="<?php if(isset($stuId))
         { echo $stuId; } ?>" readonly>
      </div>
      <div class="form-group">
         <label for="query">Feedback</label>
         <textarea type="text" class="form-control" id="query" name="query" required></textarea>
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="text" class="form-control" id="stu_email" value="<?php echo $stuEmail ?>" name="stu_email">
      </div>
      <div class="text-left">
         <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Send</button>
         <?php if(isset($msg)) {echo $msg;} ?>
      </div>
    </form>
</div>




<div class="col-sm-12 mt-5">
    <!-- Table -->
    <h3 class="mt-5 bg-dark text-white p-2" style=" border-radius: 10px;">Your Queries may appear here...</h3>
    <?php 
    $sql = "SELECT * FROM support";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table">
        <thead>
            <tr>
               
                <th scope="col">Content</th>
                
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            //  echo '<th scope="row">'.$row['id'].'</th>';
             echo '<td>'.$row['query'].'</td>';
             
             echo '<td style="color: green;">'.$row['status'].'</td>';
             echo '<td>
                 <form action="" method="POST" class="d-inline">
                 <input type="hidden" name="id" value='.$row["id"].'>
                     <button
                     type="submit"
                     class="btn btn-secondary"
                     name="delete"
                     value="Delete">
                 <i class="far fa-trash-alt"></i></button>
                 </form>

             </td>
             </tr>';
             }
        echo '</tbody>
        </table>';
    }else{
        echo "0 result";
    }
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM support WHERE id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "Unable to delete the Data";
        }
    }
    ?>
    </div>
  </div>
</div>

<?php  
include('./stuInclude/footer.php');
?> 
