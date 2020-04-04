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
	$employerEmail = mysqli_real_escape_string($conn, $_POST['employer-email']);
	$employerPassword = mysqli_real_escape_string($conn, $_POST['employer-password']);

	// Puts variable into session variable
	$_SESSION['email'] = $employerEmail;

	// SELECT Query
	$query = "SELECT * FROM employers WHERE employer_email = '$employerEmail' && BINARY employer_password = '$employerPassword'";
	$hash = "SELECT employer_password FROM employers WHERE employer_email = '$employerEmail'";

	// Gets Result
	$result = mysqli_query($conn, $query);
	$passwordHashed = mysqli_query($conn, $hash);

	// Returns all hashed passwords in an array
	$lists = mysqli_fetch_array($passwordHashed, MYSQLI_NUM);

	// Gets number of rows
	$numOfRows = mysqli_num_rows($result);

	if (mysqli_query($conn, $query) && isset($employerEmail) && isset($employerPassword) && $numOfRows == 1 || password_verify($employerPassword, $lists[0])) {
		// Sets Cookie for 30 Days and then it will expire
		setcookie('employer_email', $employerEmail, time() + 2592000);
		// Passed
		$msg = '<strong>Success!</strong> You have logged in';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to employerdashboard.php after 1 second
		header('refresh:1;url=employerdashboard.php');
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
          <p class="text-black">Sign in as a employer to continue</p>
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
                    <label for="employer-email">Email</label>
                    <input type="email" class="form-control" id="employer-email" name="employer-email"
                      placeholder="Email" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="employer-password">Password</label>
                    <input type="password" class="form-control" id="employer-password" name="employer-password"
                      placeholder="Password" required>
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