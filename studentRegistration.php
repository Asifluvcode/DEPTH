    <!-- start student registration -->
    <div class="modal-body">  
        <form id="stuRegForm">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="stuname" class="pl-2 font-weight-bold">Name</label>
                <small id="statusMsg1"></small>
                <input type="stuname" class="form-control" placeholder="Name" name="stuname" id="stuname">
            </div>

            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                <small id="statusMsg2"></small>
                <input type="email" class="form-control" placeholder="example@gmail.com" name="stuemail" id="stuemail">
                
            </div>

            <div class="form-group">
                <i class="fas fa-key"></i>
                <label for="stupass" class="pl-2 font-weight-bold">New Password</label>
                <small id="statusMsg3"></small>
                <input type="password" name="password" autocomplete="on" class="form-control" id="stupass" placeholder="Password">
            </div>
            <p class="text-center text-muted mt-5 mb-0">Have already an account?
                <a href="#" data-bs-toggle="modal" data-bs-target="#studentLoginModelCenter"><u>Login</u></a></p>
        </form>
    </div>
    <!-- End of student registration! -->