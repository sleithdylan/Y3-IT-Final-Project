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
$email = $_SESSION['student_email'];

// Checks for posted data
if (isset($_POST['profile'])) {

  // echo "<pre>", print_r($_FILES),"</pre>";
  // echo "<pre>", print_r($_FILES['student-picture']),"</pre>";
  // echo "<pre>", print_r($_FILES['student-picture']['name']),"</pre>";
  
  // Gets form data
  // $studentPicture = time() . '_' . $_FILES['student-picture']['name'];
  $studentFullName = mysqli_real_escape_string($conn, $_POST['student-fullname']);
  $studentEmail = mysqli_real_escape_string($conn, $_POST['student-email']);
  $studentLocation = mysqli_real_escape_string($conn, $_POST['student-location']);
  $studentPhone = mysqli_real_escape_string($conn, $_POST['student-phone']);
  $studentBio = mysqli_real_escape_string($conn, $_POST['student-about']);
  $studentSkills = mysqli_real_escape_string($conn, $_POST['student-skills']);
  $studentGithub = mysqli_real_escape_string($conn, $_POST['student-github']);
  $studentLinkedin = mysqli_real_escape_string($conn, $_POST['student-linkedin']);

  // $target = 'assets/images/profile-pictures/' . $studentPicture;

  // if(move_uploaded_file($_FILES['student-picture']['tmp_name'], $target)){
  //     $query = "INSERT INTO students(student_picture, student_fullname, student_email, student_phone, student_location, student_bio)
  //     VALUES('$studentPicture', '$studentFullName', '$studentEmail', '$studentPhone', '$studentLocation', '$studentBio')";
  // 		$msg = '<strong>Success!</strong> Image uploaded';
  // 		$msgClass = 'alert-success alert-dismissible fade show';
  // } else {
  // 		$msg = '<strong>Error!</strong> Failed to upload image..';
  // 		$msgClass = 'alert-danger alert-dismissible fade show';
  // }

  // Gets ID
  $id = mysqli_real_escape_string($conn, $_GET['id']);

  // SELECT Query
  $query = "SELECT * FROM students ORDER BY student_id WHERE student_id = {$id}";

  // Gets Result
  $result = mysqli_query($conn, $query);

  // Fetch Data
  $lists = mysqli_fetch_assoc($result);

  $query = "UPDATE students SET 
      student_fullname = '$studentFullName',
      student_email = '$studentEmail',
      student_phone = '$studentPhone', 
      student_location = '$studentLocation', 
      student_bio = '$studentBio',
      student_skills = '$studentSkills',
      student_github = '$studentGithub',
      student_linkedin = '$studentLinkedin'
  WHERE student_id = {$id}";

  // Checks Required Fields
  if (mysqli_query($conn, $query)) {
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
// var_dump($lists);

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
    <?php include('includes/nav_student.php'); ?>
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
                enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="student-picture">Profile Picture</label>
                    <input type="file" class="form-control" id="student-picture" name="student-picture"
                      placeholder="Insert Image">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-fullname">Full Name</label>
                    <input type="text" class="form-control" id="student-fullname" name="student-fullname"
                      value="<?php echo $lists['student_fullname']; ?>" placeholder="Full Name">
                  </div>
                  <input type="hidden" class="form-control" id="student-email" name="student-email"
                    value="<?php echo $lists['student_email']; ?>" placeholder="Email">
                  <div class="form-group col-md-12">
                    <label for="student-phone">Phone</label>
                    <input type="text" class="form-control" id="student-phone" name="student-phone"
                      value="<?php echo $lists['student_phone']; ?>" placeholder="Phone">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-location">Location</label>
                    <input type="text" class="form-control" id="student-location" name="student-location"
                      value="<?php echo $lists['student_location']; ?>" placeholder="Location">
                  </div>
                  <hr>
                  <div class="form-group col-md-12">
                    <label for="student-skills">Skills</label>
                    <input type="text" class="form-control" id="student-skills" name="student-skills"
                      value="<?php echo $lists['student_skills']; ?>" placeholder="Skills">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-github">GitHub</label>
                    <input type="text" class="form-control" id="student-github" name="student-github"
                      value="<?php echo $lists['student_github']; ?>" placeholder="GitHub">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="student-linkedin">LinkedIn</label>
                    <input type="text" class="form-control" id="student-linkedin" name="student-linkedin"
                      value="<?php echo $lists['student_linkedin']; ?>" placeholder="LinkedIn">
                  </div>
                  <hr>
                  <div class="form-group col-md-12">
                    <label for="student-about">About Me</label>
                    <textarea class="form-control" id="student-about" name="student-about"
                      rows="6"><?php echo $lists['student_bio']; ?></textarea>
                  </div>
                </div>
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