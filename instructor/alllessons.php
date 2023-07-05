<?php 
if(!isset($_SESSION)){
   session_start();
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
}

include('instHeader.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
   $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
   echo "<script> location.href='../index.php'; </script>";
}

?>

<?php 
$sql = "SELECT course_id FROM course";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
   if(isset($_REQUEST['course_id']) && $_REQUEST['course_id'] == $row['course_id']){
      $sql2 = "SELECT * FROM course WHERE course_id = {$_REQUEST['course_id']}";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
      if(($row2['course_id']) == $_REQUEST['course_id']){
         $_SESSION['course_id'] = $row2['course_id'];
         $_SESSION['course_name'] = $row2['course_name'];
?>

<h3 class="mt-5 bg-dark text-white p-2" style=" border-radius: 10px;">Course ID: <?php if(isset($row2['course_id'])){
   echo $row2['course_id'];} ?> Course Name: <?php if(isset($row2['course_name'])){
      echo $row2['course_name'];} ?></h3>
<?php
$sql3 = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['course_id']}";
$result3 = $conn->query($sql3);
echo '<table class="table text-light">
      <thead>
      <tr>
      <th scope="col">Lesson ID</th>
              <th scope="col">Lesson Name</th>
              <th scope="col">Lesson Link</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>';
      while($row3 = $result3->fetch_assoc()){
         echo '<tr>';
          echo '<th scope="row">'.$row3['lesson_id'].'</th>';
          echo '<td>'.$row3['lesson_name'].'</td>';
          echo '<td>'.$row3['lesson_link'].'</td>';
          echo '<td>
               <form action="editlessons.php" method="POST" class="d-inline">
                     <input type="hidden" name="id" value='.$row3["lesson_id"].'>
                     <button
                         type="Submit"
                         class="btn btn-info mar-3"
                         name="view"
                         value="View">
                     <i class="fas fa-pen"></i></button>
                     </form>
     
                     <form action="" method="POST" class="d-inline">
                     <input type="hidden" name="id" value='.$row3["lesson_id"].'>
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
            } else{
               echo '<div class="alert alert-dark mt-4" role="alert">Course Not Found !</div>';
            }
            if(isset($_REQUEST['delete'])){
               $sql4 = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
               if($conn->query($sql4) == TRUE){
                   echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
               } else {
                   echo "Unable to delete the Data";
               }
          
      }
   }
  }
?>
</div>






<?php 
if(isset($_SESSION['course_id'])){
   echo '<div>
   <a class="btn btn-danger box" href="./addlessons.php"><i class="fas fa-plus fa-2x"></i></a>
</div>';
}
?>



<?php  
include('instFooter.php');
?>
