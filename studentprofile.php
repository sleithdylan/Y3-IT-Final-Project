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

// Puts session variable into $email
$email = $_SESSION['student_email'];

// Checks for posted data
if (isset($_POST['profile'])) {
	// Gets form data
	$studentPicture = time() . '_' . $_FILES['student-picture']['name'];
	$studentFullName = mysqli_real_escape_string($conn, $_POST['student-fullname']);
	$studentEmail = mysqli_real_escape_string($conn, $_POST['student-email']);
	$studentLocation = mysqli_real_escape_string($conn, $_POST['student-location']);
	$studentCollege = mysqli_real_escape_string($conn, $_POST['student-college']);
	$studentCourse = mysqli_real_escape_string($conn, $_POST['student-course']);
	$studentPhone = mysqli_real_escape_string($conn, $_POST['student-phone']);
	$studentBio = mysqli_real_escape_string($conn, $_POST['student-about']);
	$studentSkills = mysqli_real_escape_string($conn, $_POST['student-skills']);
	$studentGithub = mysqli_real_escape_string($conn, $_POST['student-github']);
	$studentLinkedin = mysqli_real_escape_string($conn, $_POST['student-linkedin']);

	$target = 'assets/images/profile-pictures/' . $studentPicture;

	// Gets ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// SELECT Query
	$query = "SELECT * FROM students ORDER BY student_id WHERE student_id = {$id}";

	$query = "UPDATE students SET 
      student_fullname = '$studentFullName',
      student_email = '$studentEmail',
      student_phone = '$studentPhone', 
      student_location = '$studentLocation', 
      student_bio = '$studentBio',
      student_skills = '$studentSkills',
      student_github = '$studentGithub',
      student_linkedin = '$studentLinkedin',
      student_college = '$studentCollege',
      student_course = '$studentCourse',
      student_picture = '$studentPicture'
  WHERE student_id = {$id}";

	// Checks Required Fields
	if (mysqli_query($conn, $query) && move_uploaded_file($_FILES['student-picture']['tmp_name'], $target)) {
		// Passed
		$msg = '<strong>Success!</strong> Profile has been edited!';
		$msgClass = 'alert-success alert-dismissible fade show';
		// Redirects to employerdashboard.php after 1 second
		header('refresh:1; url=studentdashboard.php');
	}
	else {
		// Failed
		// Returns error
		$msg = '<strong>Error!</strong> Please fill in all fields correctly';
		$msgClass = 'alert-danger alert-dismissible fade show';
	}

}

// Gets ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// SELECT Query
$query = "SELECT * FROM students WHERE student_id = {$id}";

// Gets Result
$result = mysqli_query($conn, $query);

// Fetch Data
$lists = mysqli_fetch_assoc($result);

// Free's result from memory
mysqli_free_result($result);

// Closes Connection
mysqli_close($conn);

?>

<!-- Header -->
<?php include('includes/header.php'); ?>

<body class="studentprofile">
  <div class="welcome d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav_studentprofile.php'); ?>
    <div class="d-flex flex-column inner-wrapper justify-contents-center mt-auto mb-auto container">
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="about-title d-flex justify-content-between align-items-end">
            <h5>Edit Profile</h5>
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
              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="studentprofile"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <h6>Basic Information</h6>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="student-picture">Profile Picture</label>
                    <input type="file" class="form-control" id="student-picture" name="student-picture"
                      placeholder="Insert Image" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please select a valid picture.
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-fullname">Full Name</label>
                    <input type="text" class="form-control" id="student-fullname" name="student-fullname"
                      value="<?php echo $lists['student_fullname']; ?>" placeholder="Full Name" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid name.
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id="student-email" name="student-email"
                    value="<?php echo $lists['student_email']; ?>" placeholder="Email" required>
                  <div class="form-group col-md-12">
                    <label for="student-phone">Phone</label>
                    <input type="text" class="form-control" id="student-phone" name="student-phone"
                      value="<?php echo $lists['student_phone']; ?>" placeholder="Phone" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid phone #.
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-location">Location</label>
                    <input type="text" class="form-control" id="country" id="student-location" name="student-location"
                      value="<?php echo $lists['student_location']; ?>" placeholder="Location" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid location.
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-about">About</label>
                    <textarea class="form-control" id="student-about" name="student-about" rows="6"
                      required><?php echo $lists['student_bio']; ?></textarea>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid bio.
                    </div>
                  </div>
                  <hr>
                  <h6>Education</h6>
                  <div class="form-group col-md-12">
                    <label for="student-college">College</label>
                    <input type="text" class="form-control" id="student-college" name="student-college"
                      value="<?php echo $lists['student_college']; ?>" placeholder="College" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid college.
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-course">Course</label>
                    <input type="text" class="form-control" id="student-course" name="student-course"
                      value="<?php echo $lists['student_course']; ?>" placeholder="Course" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid course.
                    </div>
                  </div>
                  <hr>
                  <h6>Skills</h6>
                  <div class="form-group col-md-12">
                    <label for="student-skills">Skills</label>
                    <input type="text" class="form-control" id="student-skills" name="student-skills"
                      value="<?php echo $lists['student_skills']; ?>" placeholder="Skills" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter valid skills.
                    </div>
                  </div>
                  <hr>
                  <h6>Websites</h6>
                  <div class="form-group col-md-12">
                    <label for="student-github">GitHub</label>
                    <input type="text" class="form-control" id="student-github" name="student-github"
                      value="<?php echo $lists['student_github']; ?>" placeholder="GitHub" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid url.
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-linkedin">LinkedIn</label>
                    <input type="text" class="form-control" id="student-linkedin" name="student-linkedin"
                      value="<?php echo $lists['student_linkedin']; ?>" placeholder="LinkedIn" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid url.
                    </div>
                  </div>
                </div>
                <hr>
                <div class="d-flex">
                  <button type="submit" name="profile" class="btn btn-primary flex-grow-1">Edit Profile</button>
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