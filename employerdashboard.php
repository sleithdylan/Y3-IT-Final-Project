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
if (isset($_POST['delete'])) {
	// Gets form data
	$delete_id = mysqli_real_escape_string($conn, $_POST['delete-id']);

	// DELETE Query
	$query = "DELETE FROM jobs WHERE job_id = {$delete_id}";

	if (mysqli_query($conn, $query)) {
		// Passed
		$msg = '<strong>Success!</strong> Member has been deleted';
		$msgClass = 'alert-success alert-dismissible fade show mt-4';
		// Redirects to employerdashboard.php
		header('refresh:1; url=employerdashboard.php');
	}
	else {
		// Failed
		// Returns error
		$msg = '<strong>Error!</strong> Something went wrong.. (' . mysqli_error($conn) . ')';
		$msgClass = 'alert-danger alert-dismissible fade show my-4';
	}

}

// SELECT Query
$query = "SELECT * FROM jobs WHERE created_by = '$email' ORDER BY job_id ASC";

// Gets Result
$result = mysqli_query($conn, $query);

// Fetch Data
$lists = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Checks number of rows
$numRows = mysqli_num_rows($result);

// Free's result from memory
mysqli_free_result($result);

// Closes Connection
mysqli_close($conn);

?>

<!-- Header -->
<?php include('includes/header.php'); ?>

<body>
  <div class="d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav_employer.php'); ?>
  </div>
  <div class="d-flex flex-column my-5 inner-wrapper justify-content-center container">
    <div class="row">
      <div class="col-md-12">
        <div class="about-title d-flex justify-content-between align-items-end">
          <h5>Manage Your Jobs</h5>
          <a href="./addjob.php" class="text-white">
            <button class="btn btn-primary">Add a job</button>
          </a>
        </div>
        <?php foreach($lists as $list) : ?>
        <div id="cardDiv" class="card my-4">
          <div id="cardPost" class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h4 class="mr-3"><?php echo $list['job_title'] ?></h4>
              <form method="POST" action="employerdashboard.php">
                <input type="hidden" name="delete-id" value="<?php echo $list['job_id']; ?>">
                <a href="editjob.php?id=<?php echo $list['job_id']?>"><i class="fas fa-pen mr-3"></i></a>
                <button type="submit" name="delete" class="border-0 bg-white"><i
                    class="fas fa-trash text-danger"></i></button>
              </form>
            </div>
            <h5><?php echo $list['job_company'] ?></h5>
            <h6><?php echo $list['job_location'] ?></h6>
            <p class="collapse"><?php echo $list['job_other_details'] ?></p>
            <div class="d-flex justify-content-between align-items-start">
              <button type="button" class="btn btn-light mr-1 read-more mt-1">Read More</button>
              <p class="mr-3">Created at: <?php echo $list['created_at'] ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>