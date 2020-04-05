<?php
// Requires Config
require('config/config.php');
// Creates and Checks Connection
require('config/db.php');

// Alert/Message Variables
$msg = '';
$msgClass = '';

// Checks for posted data
if (isset($_POST['login'])) {
	// Starts session
	session_start();

	// Gets form data
	$studentEmail = mysqli_real_escape_string($conn, $_POST['student-email']);
	$studentPassword = mysqli_real_escape_string($conn, $_POST['student-password']);

	// Puts variable into session variable
	$_SESSION['student_email'] = $studentEmail;

	// SELECT Query
	$query = "SELECT * FROM students WHERE student_email = '$studentEmail' && BINARY student_password = '$studentPassword'";
	$hash = "SELECT student_password FROM students WHERE student_email = '$studentEmail'";

	// Gets Result
	$result = mysqli_query($conn, $query);
	$passwordHashed = mysqli_query($conn, $hash);

	// Returns all hashed passwords in an array
	$lists = mysqli_fetch_array($passwordHashed, MYSQLI_NUM);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($studentEmail) && isset($studentPassword) && $numOfRows == 1 || password_verify($studentPassword, $lists[0])) {
		// Sets Cookie for 30 Days and then it will expire
		setcookie('student_email', $studentEmail, time() + 2592000);
		// Passed
		$msg = '<strong>Success!</strong> You have logged in';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to studentdashboard.php after 1 second
		header('refresh:1;url=studentdashboard.php');
	}
	else {
		// Failed
		// Returns error
		$msg = '<strong>Error!</strong> Something went wrong..';
		$msgClass = 'alert-danger alert-dismissible fade show my-4';
	}

}

?>

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
          <p class="text-black">Sign in as a student to continue</p>
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
                  <div class="form-group col-md-12">
                    <label for="student-email">Email</label>
                    <input type="email" class="form-control" id="student-email" name="student-email" placeholder="Email"
                      required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-password">Password</label>
                    <input type="password" class="form-control" id="student-password" name="student-password"
                      placeholder="Password" required>
                  </div>
                </div>
                <div class="d-flex">
                  <button type="submit" name="login" class="btn btn-primary flex-grow-1">Log in</button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                  <h6>
                    Don't have an account?
                    <a href="./studentsignup.php" class="text-primary">Sign up</a>
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