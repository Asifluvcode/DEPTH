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
<p class="bg-dark text-white p-2" style=" border-radius: 10px;">Sell Report</p>
<form action="" class="d-print-none" method="post">
  <div class="row">
    <div class="col-sm-3">
    <input type="date" class="form-control" id="startdate" name="startdate">
    </div>
    <div class="col-sm-3">
    <input type="date" class="form-control" id="enddate" name="enddate">
    </div>
    <div class="col-sm-2">
    <input type="submit" class="btn btn-secondary" value="search" name="searchsubmit">
    </div>
  </div>
  </form>

<?php
if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows >0){
        echo '
        <p class="bg-dark text-white p-2 mt-4" style=" border-radius: 10px;">Details</p>
        <table class="table text-light">
        <thead>
        <tr>
        <th scope="col">Order Id</th>
        <th scope="col">Course Id</th>
        <th scope="col">Student Email</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Ordered Date</th>
        <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
            echo 
            '<tr>
            <th scope="row">'.$row["order_id"].'</th>
            <td>'.$row["course_id"].'</td>
            <td>'.$row["stu_email"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["order_date"].'</td>
            <td>'.$row["amount"].'</td>
            </tr>';
        }
        echo '<tr>
        <td>
            <form action="" class="d-print-none">
            <input type="submit" value="Print" class="btn btn-danger" onclick="window.print()">
            </form>
        </td>
        </tr>
    </tbody>
</table>';
    }else{
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' roll='alert'>No Records Found !</div>";
    }
}
?>

</div>
</div>
</div>

</div> <!--div row close from Header-->
</div><br>  <!--div container-fluid close from Header-->

<?php 
include('./admininclude/footer.php');
?>
