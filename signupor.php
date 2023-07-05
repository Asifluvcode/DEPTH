<?php
include('./dbconnection.php');
include('./maininclude/loginhead.php');
?>


<!-- Start of Registration -->

<section class="vh-25 gradient-custom" style="background-color: #385170;">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="background-color: #142d4c; border-radius: 22px; border: 2px solid black;">
          <div class="card-body p-5 text-center">

            <div class="">

              <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
              <p class="text-white-50 mb-5">Please enter your Details to signUp!</p>

              <div class="form-outline form-white mb-4">
                <input type="stuname" id="stuname" class="form-control form-control-lg" name="stuname" placeholder="Name"/>
                <label class="form-label" for="stuname">Name</label>
                <small id="statusMsg1"></small>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="email" id="stuemail" class="form-control form-control-lg" name="stuemail" placeholder="example@gmail.com"/>
                <label class="form-label" for="stuemail">Email</label>
                <small id="statusMsg2"></small>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="stupass" id="stupass" class="form-control form-control-lg" name="stupass" placeholder="Password"/>
                <label class="form-label" for="stupass">New Password</label>
                <small id="statusMsg3"></small>
                </div>

                <p class="mb-0">Already have an account? <a href="loginor.php" class="text-white-50 fw-bold">Login</a> <div>&nbsp</div>

              <button class="btn btn-outline-light btn-lg px-5" type="button" onclick="addStu()" id="signup">Login</button>
              <small id="successMsg"></small>

           

          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php
include('./maininclude/loginfoot.php');
?>