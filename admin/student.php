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
?>

<div class="col-sm-12 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2" style=" border-radius: 10px;">List of Students</p>
    <?php 
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table text-light">
        <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">E-mail</th>
                <th scope="col">Author</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
           <?php while($row = $result->fetch_assoc()){
           echo '<tr>';
            echo '<th scope="row">'.$row['id'].'</th>';
            echo '<td>'.$row['stu_name'].'</td>';
            echo '<td>'.$row['stu_email'].'</td>';
            echo '<td>'.$row['status'].'</td>';
            echo '<td>';
            echo '
                <form action="editstudent.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                <button
                    type="Submit"
                    class="btn btn-info mar-3"
                    name="view"
                    value="View">
                <i class="fas fa-pen"></i></button>
                </form>

                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                    <button
                    type="submit"
                    class="btn btn-secondary"
                    name="delete"
                    value="Delete">
                <i class="far fa-trash-alt"></i></button>
                </form>

                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                    <button
                    type="submit"
                    class="btn btn-success"
                    name="approve"
                    value="Approve">
                <i class="fas fa-check"></i></button>
                </form>

                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                    <button
                    type="submit"
                    class="btn btn-danger"
                    name="deny"
                    value="Deny">
                <i class="fas fa-times"></i></button>
                </form>

            </td>
            </tr>';
            } ?>
        </tbody>
    </table>
<?php } else {
    echo "0 result";
} 

if(isset($_REQUEST['approve'])){
    $sql = "UPDATE student SET status=1 WHERE id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?approved" />';
    } else {
        echo "Unable to update the data";
    }
}
if(isset($_REQUEST['deny'])){
    $sql = "UPDATE student SET status=0 WHERE id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?denied" />';
    } else {
        echo "Unable to update the data";
    }
}


// Deleting a user or student from the db
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM student WHERE id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else {
        echo "Unable to delete the Data";
    }
}

 ?>
</div>
</div>

<!-- Div Row Close from Header -->
<div>
    <a class="btn btn-danger box" href="./addnewstudent.php"><i class="fas fa-plus fa-2x"></i></a>
    
</div>
</div>
<!-- DIv Container-fluid close form header -->
<?php 
include('./admininclude/footer.php');
?>