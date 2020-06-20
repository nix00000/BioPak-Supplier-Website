<?php
require_once 'includes/header.inc.php';
 ?>
<!-- css -->
<link rel="stylesheet" href="css/about.css">

<div class="container-fluid bg-light p-3 aboutus">
  <div class="row justify-content-center sub-links">
    <div class="col-2 ab-link">
      <h4><a class = "lnk old" href="about.php?page=0">Our Story</a></h4>
    </div>
    <div class="col-2 ab-link">
      <h4><a class = "lnk old" href="about.php?page=1">Vision</a></h4>
    </div>
    <div class="col-2 ab-link">
      <h4><a class = "lnk old" href="about.php?page=2">Mission</a></h4>
    </div>
  </div>

  <hr>

  <div class="container">

    <?php
      $page = 0;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      if ($page > 2 || $page < 0) {
        $page = 0;
      }

      switch ($page) {
        case 0:
          echo '
          <div class="row">
            <h4 class="ml-5">Our Story</h4>
          </div>
            <hr>
          <div class="row justify-content-center mx-5">
            <h5>
              We started with a vision to clean the planet.
              However, we know that sometimes the green initiatives can pose
              a burden to companies and make them spend money.
              This makes them repusle the green initiavtives and they
              attmpt to avoid them any way they can.
              We want to counter this by showing that a green initiative
              does not mean slower business, but rather faster.
              For this reason we created a fast delivery soltions as well
              as packagind solutions that last.
              <br>
              <br>
              Join us in building a network of a new circular econmy system, which
              will benefit all (including our planet). We care about the environment.
              Our company was founded in 1991 and it is a proud supplier of
              many companies that wish to join the circular economy idea.
            </h5>
          </div>
          ';
          break;
        case 1:
          echo '
          <div class="row">
            <h4 class="ml-5">Vision</h4>
          </div>
            <hr>
          <div class="row justify-content-center mx-5">
            <h5>
              Clean planet and stable business! We want to become the worlds top supplier
              of bio degradable packaging, while cleaning the planet bit by bit, pack by pack
            </h5>
          </div>
          ';
          break;
        case 2:
          echo '
          <div class="row">
              <h4 class="ml-5">Mission</h4>
            </div>
              <hr>
            <div class="row justify-content-center mx-5">
              <h5>
                Our mission is to become a global-scale company in the near future. We want to expand
                our market into all the continents. We want to progress forward while keeping
                planet clean. We desire to use the experience we have gathered over many years
                to provide a better service to our customers.
              </h5>
            </div>
          </div>
          ';
          break;

      }


     ?>

    </div>
    <!-- end of about part -->



<!-- End of main div -->
</div>


<?php
  include 'includes/footer.inc.php';

 ?>
