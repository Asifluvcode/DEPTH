<?php
include('./dbconnection.php');
include('./maininclude/loginhead.php');
?>

<!-- Start of Login -->
<section class="vh-25 gradient-custom" style="background-color: #385170">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="background-color: #142d4c; border-radius: 22px; border: 2px solid black;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-0 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="email" id="stuLogemail" class="form-control form-control-lg" name="stuLoginemail" placeholder="Email"/>
                <label class="form-label" for="stuLoginemail">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="stuLoginpass" class="form-control form-control-lg" name="password" placeholder="Password"/>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <p class="mb-0">Don't have an account? <a href="signupor.php" class="text-white-50 fw-bold">Sign Up</a></p> <div>&nbsp</div>

              <button class="btn btn-outline-light btn-lg px-5" type="button" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
              <div >
              <small id="statusLogMsg"></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 
<?php
include('./maininclude/loginfoot.php');
?>