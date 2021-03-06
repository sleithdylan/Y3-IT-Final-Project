<!-- Header -->
<?php include('includes/header.php'); ?>

<body class="landing">
  <div class="welcome d-flex justify-content-center flex-column">
    <!-- Navigation -->
    <?php include('includes/nav_transparent.php'); ?>
    <div class="d-flex flex-column inner-wrapper mt-auto mb-auto container">
      <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
          <h1 class="welcome-heading h1 display-3 text-white">StudentHired</h1>
          <p class="h6 text-white">Search for internships online to find the next step in your career.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md">
          <a href="./internships.php">
            <button type="button" class="btn btn-outline-white">Find Internships</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- How It Works -->
  <div id="how-it-works" class="section py-4">
    <h5 class="text-center mt-5">How It Works</h5>
    <div class="features py-5">
      <div class="container">
        <div class="row">
          <div class="feature py-4 col-md-4 d-flex flex-column justify-content-center align-items-center">
            <div class="icon text-primary"><i class="fa fa-binoculars"></i></div>
            <div class="px-3 py-4">
              <h5 class="text-center">Find Internship</h5>
              <p class="text-center">Learn and find internships in each city's most popular industries and companies</p>
            </div>
          </div>
          <div class="feature py-4 col-md-4 d-flex flex-column justify-content-center align-items-center">
            <div class="icon text-primary"><i class="fas fa-clipboard-check"></i></div>
            <div class="px-3 py-4">
              <h5 class="text-center">Apply</h5>
              <p class="text-center">Once you have found a job, look at what the company is looking for and just apply
              </p>
            </div>
          </div>
          <div class="feature py-4 col-md-4 d-flex flex-column justify-content-center align-items-center">
            <div class="icon text-primary"> <i class="fas fa-handshake"></i></div>
            <div class="px-3 py-4">
              <h5 class="text-center">Get Hired</h5>
              <p class="text-center">When you have passed all stages in the interview process, wait for an offer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Get Started (Call-to-Action) -->
  <div class="section section-invert py-4">
    <h5 class="text-center mt-5">Get Started</h5>
    <div class="container text-center mb-5">
      <div class="py-5">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h3 class="welcome-heading h3 mb-3">Start searching for internships for free</h3>
            <p>What are you waiting for? Start searching for internships now <br> to find the next step in your
              career!
            </p>
            <a href="./studentsignup.php">
              <button type="button" class="btn btn-primary">Get Started</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include('includes/footer.php'); ?>