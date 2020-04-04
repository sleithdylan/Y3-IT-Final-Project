<?php
// Requires Config
require('config/config.php');
// Creates and Checks Connection
require('config/db.php');

// Alert/Message Variables
$msg = '';
$msgClass = '';

// Checks for posted data
if (isset($_POST['register'])) {
	// Starts session
	session_start();

	// Gets form data
	$studentFullName = mysqli_real_escape_string($conn, $_POST['student-fullname']);
	$studentEmail = mysqli_real_escape_string($conn, $_POST['student-email']);
	$studentLocation = mysqli_real_escape_string($conn, $_POST['student-location']);
	$studentPassword = mysqli_real_escape_string($conn, $_POST['student-password']);

	// Hashed password
	$passwordHashed = password_hash($studentPassword, PASSWORD_DEFAULT);

	// SELECT Query
	$query = "SELECT * FROM students WHERE student_email = '$studentEmail'";

	// Gets Result
	$result = mysqli_query($conn, $query);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($studentFullName) && isset($studentEmail) && isset($studentLocation) && isset($studentPassword) && $numOfRows != 1) {
		// Passed
		// INSERT Query
		$regQuery = "INSERT INTO students(student_fullname, student_email, student_location, student_password) 
                  VALUES('$studentFullName', '$studentEmail', '$studentLocation', '$passwordHashed')";
		// Gets Result
		$result = mysqli_query($conn, $regQuery);
		$msg = '<strong>Success!</strong> You are now registered';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to studentlogin.php after 1 second
		header('refresh:1; url=studentlogin.php');
	}
	else {
		// Failed
		// Returns error
		$msg = '<strong>Error!</strong> Email taken...';
		$msgClass = 'alert-danger alert-dismissible fade show my-4';
	}

}

?>

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
          <p class="text-black">Let's create your new account</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <?php if($msg != ""): ?>
          <div class="alert <?php echo $msgClass; ?> alert-dismissible fade show" role="alert"><?php echo $msg; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="student-fullname">Full Name</label>
                    <input type="text" class="form-control" id="student-fullname" name="student-fullname"
                      placeholder="Full Name" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid name.
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="student-email">Email</label>
                    <input type="email" class="form-control" id="student-email" name="student-email" placeholder="Email"
                      required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid email.
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="student-location">Location</label>
                  <input type="text" class="form-control" id="country" id="student-location" name="student-location"
                    placeholder="Location" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please enter a valid location.
                  </div>
                </div>
                <div class="form-group">
                  <label for="student-password">Password</label>
                  <input type="password" class="form-control" id="student-password" name="student-password"
                    placeholder="Password" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please enter a password.
                  </div>
                </div>
                <div class="d-flex">
                  <button type="submit" name="register" class="btn btn-primary flex-grow-1">Sign Up</button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                  <h6>
                    Already have an account?
                    <a href="./studentlogin.php" class="text-primary">Log in</a>
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