<?php
// Starts session
session_start();

$email = $_SESSION['student_email'];

function getUsersData($studentId) {
  // Requires Config
  require ('config/config.php');
  // Creates and Checks Connection
  require ('config/db.php');
  $array = array();
  $query = mysqli_query($conn, "SELECT * FROM students WHERE student_id=" . $studentId);
  // $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($query)) {
    $array['student_id'] = $row['student_id'];
    $array['student_fullname'] = $row['student_fullname'];
    $array['student_email'] = $row['student_email'];
    $array['student_password'] = $row['student_password'];
    $array['student_phone'] = $row['student_phone'];
    $array['student_location'] = $row['student_location'];
    $array['student_bio'] = $row['student_bio'];
    $array['student_skills'] = $row['student_skills'];
    $array['student_github'] = $row['student_github'];
    $array['student_linkedin'] = $row['student_linkedin'];
    $array['student_picture'] = $row['student_picture'];
  }
  return $array;
}

function getId($email) {
  // Requires Config
  require ('config/config.php');
  // Creates and Checks Connection
  require ('config/db.php');
  $query = mysqli_query($conn, "SELECT student_id FROM students WHERE student_email='" . $email . "'");
  while ($row = mysqli_fetch_assoc($query)) {
    return $row['student_id'];
  }
}

?>

<!-- Header -->
<?php include('includes/header.php'); ?>

<body>
  <div class="d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav_student.php'); ?>
  </div>
  <div class="d-flex flex-column my-5 inner-wrapper justify-contents-center container">
    <?php if(isset($_SESSION['student_email'])) { 
    
    $usersData = getUsersData(getId($_SESSION['student_email']));
      
    ?>
    <div class="row">
      <div class="col-md-12">
        <div id="cardDiv" class="card my-3">
          <div id="cardPost" class="card-body">
            <div class="text-center d-flex justify-content-center align-items-start">
              <img src="./assets/images/profile-pictures/<?php echo $usersData['student_picture'] ?>"
                class="rounded-circle mb-3" alt="profile" height="100" width="100">
              <div class="profile-info d-flex flex-column justify-content-center align-items-start ml-4">
                <div class="d-flex">
                  <h4 class="font-weight-bold mr-3"><?php echo $usersData['student_fullname'] ?></h4>
                </div>
                <div class="d-flex">
                  <h6><i class="fas fa-briefcase align-middle mr-3"></i>Student</h6>
                </div>
                <div class="d-flex">
                  <h6><i
                      class="fas fa-map-marker-alt align-middle mr-3"></i><?php echo $usersData['student_location'] ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="row">
      <div class="col-md-8">
        <div id="cardDiv" class="card my-3">
          <div id="cardPost" class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h5 class="mr-3">About Me</h5>
            </div>
            <p><?php echo $usersData['student_bio'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div id="cardDiv" class="card my-3">
          <div id="cardPost" class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h5 class="mr-3">Contact Information</h5>
            </div>
            <h6>Email</h6>
            <p><i class="fas fa-envelope mr-2 align-middle"></i><?php echo $usersData['student_email'] ?></p>
            <h6>Phone</h6>
            <p><i class="fas fa-phone mr-2 align-middle"></i><?php echo $usersData['student_phone'] ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div id="cardDiv" class="card my-3">
          <div id="cardPost" class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h5 class="mr-3">Education</h5>
            </div>
            <h6>GMIT GALWAY</h6>
            <h6>2017 - Present</h6>
            <p>Level 8 (Honours) in Computing and Digital Media</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div id="cardDiv" class="card my-3">
          <div id="cardPost" class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h5 class="mr-3">Websites</h5>
            </div>
            <p><i class="fab fa-github mr-2 align-middle"></i><?php echo $usersData['student_github'] ?></p>
            <p><i class="fab fa-linkedin-in mr-2 align-middle"></i><?php echo $usersData['student_linkedin'] ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div id="cardDiv" class="card my-3">
          <div id="cardPost" class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <h5 class="mr-3">Skills</h5>
            </div>
            <p><?php echo $usersData['student_skills'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>