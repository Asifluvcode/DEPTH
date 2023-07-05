
 
 <!-- start of footer about section -->
 
 <footer class="footer-07" style="background-color: #131921;">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 text-center" style="margin-top: 80px;">
<!-- <h2 class="footer-heading"><a href="index.php" class="logo" style="text-decoration: none;">DEPTH.com</a></h2> -->
<p class="text-light">
Copyright &copy;<script>document.write(new Date().getFullYear());</script>|| designed by ali || All rights reserved | DEPTH
</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="tands.php" style="text-decoration: none;">Privacy</a></li>
            <li class="list-inline-item"><a href="" style="text-decoration: none;">Terms</a></li>
            <li class="list-inline-item"><a href="users/support.php" style="text-decoration: none;">Support</a></li>
        </ul>
</div>
</div>

</div>
</footer>


      
<!-- End of footer about section -->

<!-- Start of sign up registration -->
<div class="modal fade" id="studentRegModelCenter" tabindex="-1" aria-labelledby="studentRegModelCenterLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header bg-dark text-white">
        <h1 class="modal-title fs-5" id="studentRegModelCenterLabel">Get Started</h1>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    
  <!-- start student registration -->
  <?php include('studentRegistration.php'); ?>
  <!-- End student registration -->


    <div class="modal-footer bg-dark text-white">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-light text-dark" onclick="addStu()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div>

<!-- End of sign up registration -->

<!-- Start of Login -->
<div class="modal fade" id="studentLoginModelCenter" tabindex="-1" aria-labelledby="studentLoginModelCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white radius-5">
                <h1 class="modal-title fs-5" id="studentLoginModelCenterLabel" style="font-size: 25px;">Login</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- start student Login -->
            <div class="modal-body">
                <form id="studentLoginForm" >
                    <div class="form-group"><i class="fas fa-envelope"></i>
                        <label for="stuLoginemail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" class="form-control" placeholder="E-mail" name="stuLoginemail" id="stuLogemail">
                    </div>

                    <div class="form-group"><i class="fas fa-key"></i>
                        <label for="stuLoginpass" class="pl-2 font-weight-bold" >Password</label>
                        <input type="password" name="password" autocomplete="on" class="form-control" id="stuLoginpass" placeholder="Password">
                    </div>
                </form>
            </div>
            <!-- End of student Login -->

            <div class="modal-footer bg-dark text-white">
                <small id="statusLogMsg"></small>
                <button type="button" class="btn btn-light text-dark" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Login -->



<!-- Start of Admin Login  -->
<div class="modal fade" id="adminLoginModelCenter" tabindex="-1" aria-labelledby="studentLoginModelCenterLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header bg-dark text-white">
        <h1 class="modal-title fs-5" id="studentLoginModelCenterLabel">Admin Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    
    <!-- start admin Login -->
    <div class="modal-body">  
        <form id="adminLoginForm">
            <div class="form-group"><i class="fas fa-envelope"></i>
                <label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                <input type="email" class="form-control" placeholder="E-mail" name="adminLogemail" id="adminLogemail">
            </div>

            <div class="form-group"><i class="fas fa-key"></i>
                <label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
                <input type="password" name="adminLogpass" autocomplete="on" class="form-control" id="adminLogpass" placeholder="Password">
            </div>
        </form>
    </div>
    <!-- End of admin Login -->
    <div class="modal-footer bg-dark text-white">
    <small id="statusAdminLogMsg"></small>
        <button type="button" class="btn btn-light text-dark" id="adminLoginBtn" onclick="checkAdmin()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </div>
    </div>
</div>
</div>
<!-- End of Admin Login -->

<!-- Jquery, Bootstrap and Javascript -->
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