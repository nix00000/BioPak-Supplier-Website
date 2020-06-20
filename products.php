<?php
require_once 'includes/header.inc.php';

$page = 0;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
if ($page > 2 || $page < 0) {
  $page = 0;
}



?>
<link rel="stylesheet" href="css/products.css">

<div class="well">
  <img class="header-img mx-auto" src="images/pan1.jpg" alt="header">

</div>

<!-- Insert selected product -->
<div class="container prod-cont bg-light mt-4">


  <?php
  switch ($page) {
    case 0:
      echo '
      <div class="row justify-content-center">
        <div class="col-8 col-lg-4">
          <img src="images/paper1.jpg" alt="plastic">
        </div>
        <div class="col-8 col-lg-6">
          <h2 class="mb-2"><b>Bio-Paper</b></h2>
          <h4>
            <ul>
              <li>Available with all packs</li>
              <li>Very durable</li>
              <li>Great designs</li>
              <li>Reliabale delivery</li>
              <li>Bio degradable paper</li>
              <li>Recycled</li>
              <li>Data privacy, always.</li>
            </ul>
          </h4>
        </div>
      </div>
      ';
      break;
    case 1:
      echo '
      <div class="row justify-content-center">
        <div class="col-8 col-lg-4">
          <img src="images/bio-plastic.jpg" alt="plastic">
        </div>
        <div class="col-8 col-lg-6">
          <h2 class="mb-2"><b>Bio-Plastic</b></h2>
          <h4>
            <ul>
              <li>Premium and Standard packs only</li>
              <li>Very durable</li>
              <li>Great designs</li>
              <li>Reliabale delivery</li>
              <li>Food safe</li>
              <li>Fully recycled</li>
              <li>Data privacy, always.</li>
            </ul>
          </h4>
        </div>
      </div>
      ';
      break;

    case 2:
      echo '
      <div class="row justify-content-center">
        <div class="col-8 col-lg-4">
          <img src="images/alumn.jpg" alt="aluminium">
        </div>
        <div class="col-8 col-lg-6">
          <h2 class="mb-2"><b>Aluminium</b></h2>
          <h4>
            <ul>
              <li>Recyclabel aluminium</li>
              <li>Very durable</li>
              <li>Great designs</li>
              <li>Reliabale delivery</li>
              <li>Premium exclusive</li>
              <li>Data privacy, always.</li>
            </ul>
          </h4>
        </div>
      </div>
      ';
      break;

  }

   ?>

</div>
<hr>


<h2 class="my-4 text-center"><i>Our Packaging Models</i></h2>

<div class="container examples bg-light">
  <div class="row justify-content-center">
    <img class="w-50 mx-auto" src="products/styles.jpg" alt="exam">
  </div>
</div>

<br>

<hr>
<!-- Paper -->
<h2 class="text-center"><i>Our Products</i></h2>
<div class="container-fluid d-flex flex-row flex-wrap justify-content-center my-3" id="examples">

  <?php

  switch ($page) {
    case 0:
      echo '
      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/paper.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Paper Pouch 1</h5>
          <p>Basic paper package</p>
          <p>This design is available with the <b>Basic pack</b></p>
        </div>
      </div>

      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/pack.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Paper Pouch 2</h5>
          <p>Great design with transparent middle part</p>
          <p>This design is available with the <b>Standard pack</b></p>
        </div>
      </div>

      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/custompaper.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Paper Box</h5>
          <p>Premium paper package</p>
          <p>This is a custom design only available with <b>Premium</b> packs</p>
        </div>
      </div>
      ';
      break;
    case 1:
      echo '
      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/pack2.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Aluminium Box</h5>
          <p>Plastic package</p>
          <p>Platic material only with <b>Standard</b> or <b>Premium</b> packs</p>
        </div>
      </div>

      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/plastpack.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Plastic Pouch 3</h5>
          <p>Plastic package</p>
          <p>Platic material only with <b>Standard</b> or <b>Premium</b> packs</p>
        </div>
      </div>


      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/plastdeg.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Plastic Pouch 3</h5>
          <p>Plastic package</p>
          <p>Platic material only with <b>Standard</b> or <b>Premium</b> packs</p>
        </div>
      </div>
      ';
      break;

    case 2:
      echo '
      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/alum3.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Aluminium Box</h5>
          <p>Premium aluminium package</p>
          <p>Aluminium material only with <b>Premium</b> packs</p>
        </div>
      </div>

      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/alum2.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Aluminium Pouch 1</h5>
          <p>Premium aluminium package</p>
          <p>Aluminium material only with <b>Premium</b> packs</p>
        </div>
      </div>


      <div class="card my-2 mx-2 bg-secondary text-light p-2" style="width: 18rem;">
        <img class="card-img-top" style="width: 260px;height:200px;margin:auto;" src="products/alum4.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Aluminium Pouch 2</h5>
          <p>Premium aluminium package</p>
          <p>Aluminium material only with <b>Premium</b> packs</p>
        </div>
      </div>
      ';
      break;

  }


   ?>

</div>



<?php
  include 'includes/footer.inc.php';

 ?>
