<!-- Header -->
<?php include('includes/header.php'); ?>

<body class="login">
  <div class="welcome d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav.php'); ?>
    <div class="d-flex flex-column inner-wrapper justify-contents-center mt-auto mb-auto container">
      <div class="row">
        <div class="col-md-8 mb-3 text-center mx-auto">
          <h3 class="welcome-heading h3 text-black">Log in</h3>
          <p class="text-black">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt, iste.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="employer-email">Email</label>
                    <input type="email" class="form-control" id="employer-email" name="employer-email"
                      placeholder="Email">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="employer-password">Password</label>
                    <input type="password" class="form-control" id="employer-password" name="employer-password"
                      placeholder="Password">
                  </div>
                </div>
                <div class="d-flex">
                  <button type="submit" name="login" class="btn btn-primary flex-grow-1">Log in</button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                  <h6>
                    Don't have an account?
                    <a href="./employersignup.php" class="text-primary">Sign up</a>
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