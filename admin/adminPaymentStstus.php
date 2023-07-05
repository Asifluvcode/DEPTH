<?php
// Start session and include header and database connection
if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/header.php');
include('../dbconnection.php');

// Check if admin is logged in
if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

?>

<div class="col-sm-12 mt-5 text-left">
<p class="bg-dark text-white p-2" style=" border-radius: 10px;">Payment Status</p>
   <form action="" class="mt-3 form-inline d-print-none">
      <div class="form-group mr-3">
        <label for="order_id">Enter Order ID: </label>
         <input type="text" class="forn-control ml-3" id="order_id" name="order_id">
         <button type="submit" class="btn btn-danger" name="search_order">Search</button>
      </div>
   </form>

<?php

// Check if form has been submitted with an order ID
if (isset($_REQUEST['search_order'])) {
    $search_order = $_REQUEST['order_id'];
    $sql = "SELECT * FROM courseorder WHERE order_id = '$search_order'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <div class="col-sm-12 mt-5 text-left">
            <h3 class="mt-5 bg-dark text-white p-2" style=" border-radius: 10px;">Customer Transaction Details</h3>
            <div class="container" style="margin-bottom: 20px;">
            <div class="row">
                    <table class="table table-bordered table-hover text-light">
                        <tbody>
                            <tr>
                                <th scope="row">Order ID:</th>
                                <td><?php echo $row['order_id'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Student Email:</th>
                                <td><?php echo $row['stu_email'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Course ID:</th>
                                <td><?php echo $row['course_id'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Status:</th>
                                <td><?php echo $row['status'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Response Message:</th>
                                <td><?php echo $row['respmsg'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Amount:</th>
                                <td><?php echo $row['amount'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Date:</th>
                                <td><?php echo $row['order_date'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-print-none">
                    <tr class="print-only">
                        <td><button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</button></td>
                    </tr>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        // If no matching order is found, display an error message
        echo "<div class='alert alert-warning'>No orders found for order ID $search_order</div>";
    }
}
?>

<!-- Search form -->

<?php
// Include footer
include('./admininclude/footer.php');
?>
