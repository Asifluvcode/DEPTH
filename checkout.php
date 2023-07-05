<?php
include('./dbconnection.php');

session_start();
if(!isset($_SESSION['stuLogEmail'])){
    echo "<script> location.href = 'loginor.php'</script>";
} else{
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = $course_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    $stuEmail = $_SESSION['stuLogEmail'];

    // code to insert the transaction details to the database
    if(isset($_POST['paynow'])){
        // checking for the empty fields
        if(($_POST['order_id'] == "") || ($_POST['stuEmail'] == "") || 
        ($_POST['course_id'] == "") || ($_POST['status'] == "") ||
        ($_POST['respmsg'] == "") || ($_POST['amount'] == "") || ($_POST['order_date'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else {
            $order_id = $_POST['order_id'];
            $stuEmail = $_POST['stuEmail'];    
            $course_id = $_POST['course_id'];    
            $status = $_POST['status'];
            $amount = $_POST['amount'];                  
            $order_date = $_POST['order_date'];
            $respmsg = $_POST['respmsg'];

            // check if the order ID already exists
            $sql = "SELECT * FROM courseorder WHERE order_id = '$order_id'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Order ID already exists</div>';
            } else {
                $sql = "INSERT INTO courseorder (order_id, stu_email, course_id, status, respmsg, amount, order_date) 
                VALUES('$order_id', '$stuEmail', '$course_id', '$status', '$respmsg', '$amount', '$order_date')";
    
               if($conn->query($sql) == TRUE){
                  echo "<script>alert('Transaction successful! Your order ID is $order_id.'); window.location.href = './Transaction/success.php';</script>";
            } else {
                  $msg = '<span>Denied</span>';
            }
            }
        }
    }
?> 
<!-- echo "<script> location.href = './Transaction/success.php'</script>"; -->

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="GENERATOR" content="Evrsoft First Page">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/all.min.css">
      <link rel="stylesheet" href="css/checkoutstyle.css">
      <title>Merchant Check Out</title>
   </head>
   <body style="background-color: #131921;">
      <div class="container mt-5 px-5">
         <form action="" method="post">
            <div class="mb-4 text-white">
               <h2>Confirm order and pay</h2>
               <span>please make the payment, and start enjoying your courses.</span>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <div class="card p-3">
                     <h6 class="text-uppercase">Billing Details</h6>
                     <div class="row mt-3">
                        <div class="col-md-6">
                           <div><span>Order Id</span></div>
                           <div><input id="order_id" class="form-control" tabindex="1" maxlength="20" name="order_id" autocomplete="off" value="<?php echo "ORDS". rand(10000,99999999) ?>" readonly></div>
                        </div>
                        <div class="col-md-6">
                           <div><span>Course Id</span></div>
                           <input class="form-control" id="course_id" tabindex="2" maxlength="12" size="12" name="course_id" autocomplete="off" value="<?php echo $row['course_id'] ?>" readonly>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-md-6">
                           <div><span>Student Email</span> </div>
                           <input class="form-control" id="stuEmail" tabindex="2" maxlength="12" size="12" name="stuEmail" autocomplete="off" value="<?php if(isset($stuEmail)) { echo $stuEmail; }?>" readonly>
                        </div>
                     </div>
                     <div class="mt-4 mb-4">
                        <h6 class="text-uppercase">Payment details</h6>
                        <div class="inputbox mt-3"> 
                           <input type="text" name="name" class="form-control" required="required"> 
                           <span>Name on card</span> 
                        </div>
                        
                        <div class="row">
                           <div class="col-md-6">
                              <div class="inputbox mt-3 mr-2"> 
                                 <input type="text" name="card_num" class="form-control" required="required"> 
                                 <i class="fa fa-credit-card"></i> 
                                 <span>Card Number</span> 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="d-flex flex-row">
                                 <div class="inputbox mt-3 mr-2"> 
                                    <input type="text" name="card_exp" class="form-control" required="required"> 
                                    <span>Expiry</span> 
                                 </div>
                                 <div class="inputbox mt-3 mr-2"> 
                                 <input type="password" name="card_cvv" class="form-control" required="required" autocomplete="off" pattern="\d+" maxlength="3">
                                 <span>CVV</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="inputbox mt-3"> 
                        <input type="hidden" name="order_date" value="<?php echo date('Y-m-d'); ?>" readonly />
                        <input type="hidden" name="status" value="<?php echo 'Txn Successful' ?>" readonly>
                        <input type="hidden" name="respmsg" value="<?php echo 'Txn Successful' ?>" readonly>
                        <input type="hidden" name="amount" value="<?php if(isset($_POST['amount'])) { echo $_POST['amount']; }?>" readonly>

                        </div>
                     </div>
                  </div>
                  <!-- <div class="mt-4 mb-4 d-flex justify-content-between text-white">
                     <span><--Previous step</span>
                     <button type="submit" class="btn btn-success px-3" id="paynow" name="paynow" >Pay:</button>
                  </div> -->
               </div>
               <div class="col-md-4">
                  <div class="card p-3 text-white mb-3" style="background-color: #eee;">
                     <span class="text-uppercase text-muted brand">You have to pay</span>
                     <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 text-black"><?php if(isset($_POST['amount'])) { echo $_POST['amount']; }?></h1>
                        <span class="mb-0 text-black">.00</span>
                     </div>
                     <span style="color: black;">"Grab the deal and break the World"</span>
                     <!-- <a href="#" class="yellow decoration">Visit our Page to Know More</a> -->
                     <div class="hightlight">
                        <span>100% Guaranteed support and guidance from our wide range of community.</span> <div>&nbsp</div> 
                        <button type="submit" class="btn btn-success px-3" id="paynow" name="paynow" >Pay: <?php if(isset($_POST['amount'])) { echo $_POST['amount']; }?></button>

                     </div>
                  </div>
               </div>
            </div>
      </div>
      </form>



<?php

}

?>





<!-- 

   <div class="container mt -5" >
   <div class="row">
   <div class="col-sm-6 offset-sm-3 jumbotron">
   <h3 class="mb-5">Welcome to E-Learning Payment Page</h3>
   <form method="post" action="pgResponse.php">
   <div class="form-group row">
   <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label> 
   <div class="col-sm-8">
      <input id="ORDER_ID" class="form-control" tabindex="1" maxlength =^ prime prime 20 ^ prime prime size="20" name="ORDER_ID"
         autocomplete="off" value="<?php echo "ORDS". rand(10000,99999999) ?>" readonly>
   </div>
   </div>
   <div class="form-group row">
    <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
    <div class="col-sm-8">
        <input class="form-control" id="CUST_ID" tabindex="2" maxLength="12" size="12" name="CUST_ID"
        autocomplete="off" value="<?php if(isset($stuEmail)) { echo $stuEmail; }?>" readonly>
    </div>
   </div>
   <div class="form-group row">
    <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
    <div class="col-sm-8">
        <input type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['id'])) { echo $_POST['id']; }?>" readonly>
    </div>
   </div>
   <div class="text-center">
    <input type="submit" value="Checkout" class="btn btn-primary" onclick="">
    <a href="./courses.php" class="btn btn-secondary">Cancel</a>
   </div>
</form>
<small class="form-text text-muted">Note: Complete Payment by clicking checkout Button</small>
</div>
</div>
</div>

</body>
</html>

 -->