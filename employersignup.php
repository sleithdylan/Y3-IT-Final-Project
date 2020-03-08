<!-- Header -->
<?php include('includes/header.php'); ?>

<body class="signup">
  <div class="welcome d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav.php'); ?>
    <div class="d-flex flex-column inner-wrapper justify-contents-center mt-auto mb-auto container">
      <div class="row">
        <div class="col-md-8 mb-3 text-center mx-auto">
          <h3 class="welcome-heading h3 text-black">Sign Up</h3>
          <p class="text-black">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, iste.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="employer-fullname">Full Name</label>
                    <input type="text" class="form-control" id="employer-fullname" name="employer-fullname"
                      placeholder="Full Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="employer-email">Email</label>
                    <input type="email" class="form-control" id="employer-email" name="employer-email"
                      placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="employer-password">Password</label>
                  <input type="password" class="form-control" id="employer-password" name="employer-password"
                    placeholder="Password">
                </div>
                <div class="d-flex">
                  <button type="submit" name="register" class="btn btn-primary flex-grow-1">Sign Up</button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                  <h6>
                    Already have an account?
                    <a href="./employerlogin.php" class="text-primary">Log in</a>
                  </h6>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>