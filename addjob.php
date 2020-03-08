<!-- Header -->
<?php include('includes/header.php'); ?>

<body class="addjob">
  <div class="welcome d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav.php'); ?>
    <div class="d-flex flex-column inner-wrapper justify-contents-center mt-auto mb-auto container">
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="about-title d-flex justify-content-between align-items-end">
            <h5>Add a Job</h5>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12 mb-2 mx-auto">
          <div class="card">
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="role">Role</label>
                    <input type="email" class="form-control" id="role" name="role" placeholder="Role">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="company">Company</label>
                    <input type="password" class="form-control" id="company" name="company" placeholder="Company">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="location">Location</label>
                    <input type="password" class="form-control" id="location" name="location" placeholder="Location">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="other">Other</label>
                    <textarea class="form-control" id="other" name="other" rows="6"></textarea>
                  </div>
                </div>
                <div class="d-flex">
                  <button type="submit" name="addjob" class="btn btn-primary flex-grow-1">Add Job</button>
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