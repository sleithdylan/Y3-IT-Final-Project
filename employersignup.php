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
	$employerFullName = mysqli_real_escape_string($conn, $_POST['employer-fullname']);
	$employerEmail = mysqli_real_escape_string($conn, $_POST['employer-email']);
	$employerEmail = strtolower($employerEmail); // Returns email in lowercase
	$employerEmail = filter_var($employerEmail, FILTER_SANITIZE_EMAIL); // Removes illegal characters
	$employerEmail = trim($employerEmail); // Removes whitespace
	$employerLocation = mysqli_real_escape_string($conn, $_POST['employer-location']);
	$employerPassword = mysqli_real_escape_string($conn, $_POST['employer-password']);

	// Hashed password
	$passwordHashed = password_hash($employerPassword, PASSWORD_DEFAULT);

	// SELECT Query
	$query = "SELECT * FROM employers WHERE employer_email = '$employerEmail'";

	// Gets Result
	$result = mysqli_query($conn, $query);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($employerFullName) && isset($employerEmail) && isset($employerLocation) && isset($employerPassword) && $numOfRows != 1) {
		// Passed
		// INSERT Query
		$regQuery = "INSERT INTO employers(employer_fullname, employer_email, employer_location, employer_password) 
                  VALUES('$employerFullName', '$employerEmail', '$employerLocation', '$passwordHashed')";
		// Gets Result
		$result = mysqli_query($conn, $regQuery);
		$msg = '<strong>Success!</strong> You are now registered';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to employerlogin.php after 1 second
		header('refresh:1; url=employerlogin.php');
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
                    <label for="employer-fullname">Full Name</label>
                    <input type="text" class="form-control" id="employer-fullname" name="employer-fullname"
                      placeholder="Full Name" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid name.
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="employer-email">Email</label>
                    <input type="email" class="form-control" id="employer-email" name="employer-email"
                      placeholder="Email" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid email.
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="employer-location">Location</label>
                  <input type="text" class="form-control" id="country" id="employer-location" name="employer-location"
                    placeholder="Location" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please enter a valid location.
                  </div>
                </div>
                <div class="form-group">
                  <label for="employer-password">Password</label>
                  <input type="password" class="form-control" id="employer-password" name="employer-password"
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