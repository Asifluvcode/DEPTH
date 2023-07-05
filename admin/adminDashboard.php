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
   
   $sql = "SELECT * FROM course";
   $result = $conn->query($sql);
   $totalcourse = $result->num_rows;
   
   $sql = "SELECT * FROM student";
   $result = $conn->query($sql);
   $totalstu = $result->num_rows;
   
   $sql = "SELECT * FROM courseorder";
   $result = $conn->query($sql);
   $totalsold = $result->num_rows;
   
   
   ?>
<div class="col-sm-12">
   <div class="row mx-5 text-center">
<!-- <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="d-flex justify-content-center align-items-center p-4 bg-danger bg-opacity-15 rounded-3">
               <span class="display-6 lh-1 text-orange mb-0  text-light"><i class="fas fa-tv fa-fw"></i></span>
               <div class="ms-4">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold  text-light" data-purecounter-start="0" data-purecounter-end="9"	data-purecounter-delay="200"><?php echo $totalcourse; ?></h5>
                  </div>
                     <p class="mb-0 h6 fw-light text-light">Total Courses</p>
               </div>
            </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-15 rounded-3">
               <span class="display-6 lh-1 text-white mb-0" ><i class="fas fa-user-graduate"></i></span>
               <div class="ms-4">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold text-light" data-purecounter-start="0" data-purecounter-end="52"	data-purecounter-delay="200"><?php echo $totalstu; ?></h5>
                  </div>
                  <p class="mb-0 h6 fw-light text-light">Complete lessons</p>
               </div>
            </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
            <div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-15 rounded-3">
               <span class="display-6 lh-1 text-white mb-0"><i class="fas fa-clipboard-check fa-fw"></i></span>
               <div class="ms-4">
                  <div class="d-flex">
                     <h5 class="purecounter mb-0 fw-bold text-light" data-purecounter-start="0" data-purecounter-end="52"	data-purecounter-delay="200"><?php echo $totalsold; ?></h5>
                  </div>
                  <p class="mb-0 h6 fw-light text-light">Complete lessons</p>
               </div>
            </div>
               </div> -->
      <div class="col-sm-4 mt-5">
         <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Courses</div>
            <div class="card-body">
               <h4 class="card-title"><?php echo $totalcourse; ?></h4>
               <a class="btn text-white" href="courses.php">View</a>
            </div>
         </div>
      </div>
      <div class="col-sm-4 mt-5">
         <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Student</div>
            <div class="card-body">
               <h4 class="card-title"><?php echo $totalstu; ?></h4>
               <a class="btn text-white" href="student.php">View</a>
            </div>
         </div>
      </div>
      <div class="col-sm-4 mt-5">
         <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Sold</div>
            <div class="card-body">
               <h4 class="card-title"><?php echo $totalsold; ?></h4>
               <a class="btn text-white" href="adminsellreport.php">View</a>
            </div>
         </div>
      </div>
   </div>

   <div class="mx-0 mt-4 text-center">
      <!--Table-->
      <p class="bg-dark text-white p-2 radius-5" style=" border-radius: 10px;">Course Ordered</p>
      <?php
         $sql = "SELECT * FROM courseorder";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
             echo '<table class="table text-light">
                     <thead>
                        <tr>
                              <th scope="col">Order ID</th>
                              <th scope="col">Transaction ID</th>
                              <th scope="col">Student Email</th>
                              <th scope="col">Order Status</th>
                              <th scope="col">Order Date</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>';
             while ($row = $result->fetch_assoc()) {
                 echo '<tr>
                        <th scope="row">' . $row["co_id"] . '</th>
                        <td>' . $row["order_id"] . '</td>
                        <td>' . $row["stu_email"] . '</td>
                        <td>' . $row["status"] . '</td>
                        <td>' . $row["order_date"] . '</td>
                        <td>' . $row["amount"] . '</td>
                        <td>
                        <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value=' . $row["co_id"] . '>
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="far fa-trash-alt"></i></button></form></td>
                        </tr>';
             }
             echo '</tbody> 
                  </table>';
         } else {
             echo "0 Result";
         }
         if (isset($_REQUEST['delete'])) {
             $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
             if ($conn->query($sql) == TRUE) {
                 echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
             } else {
                 echo "Unable to delete the Data";
             }
         }
         ?>
   </div>
</div>
</div>
</div>
</div>

<?php include('./admininclude/footer.php'); ?>