<!-- Start Including Header -->
<?php
   include('./maininclude/header.php');
   include('./dbconnection.php');
   
   ?>
<!-- End Including Header -->
<!-- Start course page banner -->


<!-- <div class="d-print-none">
   <div class="row">
      <img src="" alt=""
         style="height:100px; width:1800px; object-fit:cover; box-shadow:10px; background-color: #131921;"/>
   </div>
</div> -->


<!-- End course page banner -->
<!-- start of main -->
<div class="col-sm-12">
   <form action="" class="mt-3 form-inline d-print-none justify-content-center" style="background-color: #131921; color: #fff;>
      <section class="" style="background-color: #fff;">
         <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
               <div class="col-xl-9">
                  <h1 class="text-light mb-4 text-center" style="margin-top: 100px;">Payment Status</h1>
                  <div class="card" style="border-radius: 15px;">
                     <div class="card-body">
                        <div class="row align-items-center pt-4 pb-3">
                           <div class="col-md-3 ps-5 text-center">
                              <label for="order_id">Enter Order ID: </label>
                           </div>
                           <div class="col-md-6 pe-5">
                              <input type="text" class="forn-control ml-3 form-control-lg" id="order_id" name="order_id">
                           </div>
                           <div class="col-md-3 px-5 py-4">
                              <button type="submit" class="btn btn-danger btn-lg" name="search_order">Search</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </form>
</div>
<?php
   if (isset($_REQUEST['search_order'])) {
       $search_order = $_REQUEST['order_id'];
       $sql = "SELECT * FROM courseorder WHERE order_id = '$search_order'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();
   ?>
<div class="col-sm-12 mb-5">
<section class="vh-10" style="background-color: #131921; color: white;">
<div class="container h-100">
   <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
         <h3 class="mt-5 bg-white text-dark p-2 text-center" style=" border-radius: 15px; ">Payment Receipt</h3>
         <div class="card" style="border-radius: 15px;">
                     <div class="card-body">
                        <div class="row align-items-center px-5 py-4">
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
                  <div class="d-print-none text-left">
                     <tr class="print-only">
                        <td><button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</button></td>
                     </tr>
                  </div>
               </div>
            </div>
         </div>
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

<div class="d-print-none" style="background-color: #131921; margin-top: 240px;">
   <footer class=" text-muted text-center text-small">
   <p class="mb-1 mt-5 text-light">© 2023 All rights reserved | Depth</p>
   <ul class="list-inline">
       <li class="list-inline-item"><a href="#">Privacy</a></li>
       <li class="list-inline-item"><a href="#">Terms</a></li>
       <li class="list-inline-item"><a href="#">Support</a></li>
   </ul>
</footer>

</div>

<!-- Start of Footer -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>

<!-- student Ajax call Javascript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>

<script type="text/javascript" src="js/adminajaxrequest.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>
</html>
<!-- End of Footer -->