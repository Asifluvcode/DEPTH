<?php
if(!isset($_SESSION)){
    session_start();
 }
 
 include('./admininclude/header.php');
 include('../dbconnection.php');
 
// security of page
 if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
 }else{
    echo "<script> location.href='../index.php'; </script>";
 }
?>

<div class="col-sm-12 mt-5">
    <!-- Table -->
    <h3 class="mt-5 bg-dark text-white p-2" style=" border-radius: 10px;">Support Queries</h3>
    <?php 
    $sql = "SELECT * FROM support";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table text-light">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Content</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>';
             echo '<th scope="row">'.$row['id'].'</th>';
             echo '<td>'.$row['query'].'</td>';
             echo '<td>'.$row['email'].'</td>';
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

                 <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
                    <button
                    type="submit"
                    class="btn btn-success"
                    name="approve"
                    value="Approve">
                <i class="fas fa-check"></i></button>
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

    if(isset($_REQUEST['approve'])){
        $sql = "UPDATE support SET status='Status Approved' WHERE id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?approved" />';
        } else {
            echo "Unable to update the data";
        }
    }
    ?>
    </div>
  </div>
</div>
<?php 
include('./admininclude/footer.php');
?>