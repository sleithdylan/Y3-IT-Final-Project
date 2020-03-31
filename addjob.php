<?php
// Starts session
session_start();

// Requires Config
require('config/config.php');
// Creates and Checks Connection
require('config/db.php');

// Alert/Message Variables
$msg = '';
$msgClass = '';

// Puts session variable into $username
$email = $_SESSION['email'];

// Checks for posted data
if (isset($_POST['addjob'])) {
  // Gets form data
  $jobRole = mysqli_real_escape_string($conn, $_POST['job-title']);
  $jobCompany = mysqli_real_escape_string($conn, $_POST['job-company']);
  $jobLocation = mysqli_real_escape_string($conn, $_POST['job-location']);
  $jobOtherDetails = mysqli_real_escape_string($conn, $_POST['job-other-details']);

  // INSERT Query
  $query = "INSERT INTO jobs(job_title, job_company, job_location, job_other_details, created_by) 
                VALUES('$jobRole', '$jobCompany', '$jobLocation', '$jobOtherDetails', '$email')";

  // Checks Required Fields
  if (mysqli_query($conn, $query) && isset($jobRole) && isset($jobCompany) && isset($jobLocation) && isset($jobOtherDetails)) {
    // Passed
    $msg = '<strong>Success!</strong> Job has been added';
    $msgClass = 'alert-success alert-dismissible fade show';
    // Redirects to employerdashboard.php after 1 second
    header('refresh:1; url=employerdashboard.php');
  } else {
    // Failed
    // Returns error
    $msg = '<strong>Error!</strong> Please fill in all fields correctly';
    $msgClass = 'alert-danger alert-dismissible fade show';
  }

}

?>

<!-- Header -->
<?php include('includes/header.php'); ?>

<body class="addjob">
  <div class="welcome d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav_employer.php'); ?>
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
          <?php if($msg != ""): ?>
          <div class="alert <?php echo $msgClass; ?> alert-dismissible fade show" role="alert"><?php echo $msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="addjob">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="job-title">Role</label>
                    <input type="text" class="form-control" id="job-title" name="job-title" placeholder="Role">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="job-company">Company</label>
                    <input type="text" class="form-control" id="job-company" name="job-company" placeholder="Company">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="job-location">Location</label>
                    <input type="text" class="form-control" id="job-location" name="job-location"
                      placeholder="Location">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="job-other-details">Other</label>
                    <textarea class="form-control" id="job-other-details" name="job-other-details" rows="6"></textarea>
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