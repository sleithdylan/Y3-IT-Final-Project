<?php
// Requires Config
require('config/config.php');
// Creates and Checks Connection
require('config/db.php');

// SELECT Query
$query = "SELECT * FROM jobs ORDER BY job_id ASC";

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
    <?php include('includes/nav_active.php'); ?>
  </div>
  <div class="d-flex flex-column my-5 inner-wrapper justify-contents-center container">
    <div class="row">
      <div class="col-md-12">
        <!-- <div class="about-title d-flex justify-content-between align-items-end"></div> -->
        <h4 class="h4 text-black">Current Internships</h4>
        <p class="text-black">Found: <?php echo $numRows ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php foreach($lists as $list) : ?>
        <div class="card my-4">
          <div class="card-body">
            <h4><?php echo $list['job_title'] ?></h4>
            <h5><?php echo $list['job_company'] ?></h5>
            <h6><?php echo $list['job_location'] ?></h6>
            <p class="collapse"><?php echo $list['job_other_details'] ?></p>
            <button type="button" class="btn btn-light mr-1 read-more mt-1">Read More</button>
            <a href="#">
              <button type="button" class="btn btn-primary mt-1" disabled>Apply Now</button>
            </a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>