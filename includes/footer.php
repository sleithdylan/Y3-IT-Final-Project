<!-- Footer -->
<footer>
  <nav class="navbar-dark bg-primary">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-8">
          <div class="d-flex flex-column">
            <a class="navbar-brand mb-2" href="./index.php">
              <img src="assets/images/studenthired-logo-white.svg" class="mr-2">
              <span class="font-weight-bold">Student</span><span class="font-weight-light">Hired</span>
            </a>
            <p class="text-white">&copy; StudentHired 2020 &ndash; All rights reserved.</p>
            <div class="social mb-3">
              <a class="text-white" href="https://twitter.com/studenthired">
                <i class="fab fa-twitter-square fa-lg"></i>
              </a>
              <a class="text-white" href="https://www.facebook.com/StudentHired-107639287471343/">
                <i class="fab fa-facebook-square fa-lg pl-3"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md">
          <ul class="navbar-nav flex-column">
            <li class="nav-item">
              <a class="nav-link active disabled" href="#">Company</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php#how-it-works">How It Works</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./internships.php">Internships</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../sitemap.xml">Sitemap</a>
            </li>
          </ul>
        </div>
        <div class="col-md">
          <ul class="navbar-nav flex-column">
            <li class="nav-item">
              <a class="nav-link active disabled" href="#">Legal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./terms.php">Terms & Conditions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./privacy.php">Privacy Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./disclaimer.php">Disclaimer</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</footer>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="./assets/js/main.js"></script>
<script src="./assets/js/countrySelect.min.js"></script>
<script>
  $("#country").countrySelect({
    defaultCountry: "ie",
    preferredCountries: ['ie', 'gb', 'us'],
    responsiveDropdown: true
  });
</script>
</body>

</html>