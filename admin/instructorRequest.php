<?php
if(!isset($_SESSION)){
    session_start();
}
 
include('./admininclude/header.php');
include('../dbconnection.php');
 
// security of page
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
?>

<div class="col-sm-12 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2" style=" border-radius: 10px;">List of Students</p>
    <?php 
    $sql = "SELECT * FROM instructor_test";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table text-light">
        <thead>
            <tr>
                <th scope="col">inst ID</th>
                <th scope="col">E-mail</th>
                <th scope="col">Score</th>
                <th scope="col">Answer</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
           <?php while($row = $result->fetch_assoc()){
           echo '<tr>';
            echo '<th scope="row">'.$row['inst_id'].'</th>';
            echo '<td>'.$row['inst_email'].'</td>';
            echo '<td>'.$row['inst_score'].'</td>';
            echo '<td>'.$row['inst_response'].'</td>';
            echo '<td>';
            echo '
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="'.$row["inst_id"].'">
                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>
            </tr>';
            }
         }
          ?>
        </tbody>
    </table>
</div>

<?php
// Deleting a user or student from the db
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM instructor_test WHERE inst_id = $id";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else {
        echo "Unable to delete the Data";
    }
}

include('./admininclude/footer.php');
?>
