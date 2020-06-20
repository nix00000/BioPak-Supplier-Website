<?php

require_once 'includes/header.inc.php';
 ?>
 <!-- CSS -->
<link rel="stylesheet" href="css/pricing.css">

<div class="prods container bg-secondary d-flex flex-wrap justify-content-around">
  <div class="card bg-info" style="width: 18rem;">
    <img class="card-img-top" src="images/bio-paper.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>Basic Pack - $799</b></h5>
      <p class="card-text">
      <ul>
        <li>Basic designs</li>
        <li>Delivery every 30 days</li>
        <li>One delivery location</li>
        <li>100 units per month</li>
        <li>We don’t share your data</li>
      </ul>
      </p>
      <p class="text-center"><a href="order.php" class="btn btn-primary text-center">Order Now</a></p>

    </div>
  </div>

  <div class="card bg-success" style="width: 18rem;">
    <img class="card-img-top" src="images/bio-plastic.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>Standard Pack - $1,799</b></h5>
      <p class="card-text">
        <ul>
          <li>Additional designs</li>
          <li>Delivery every 14 days</li>
          <li>Free delivery</li>
          <li>Paper + Plastic</li>
          <li>3 delivery location</li>
          <li>200 units per month</li>
          <li>We don’t share your data</li>
        </ul>
      </p>
      <p class="text-center"><a href="order.php" class="btn btn-primary text-center">Order Now</a></p>

    </div>
  </div>

  <div class="card premium" style="width: 18rem;">
    <img class="card-img-top" src="images/alum.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><b>Premium Pack - $2,799</b></h5>
      <p class="card-text">
        <ul>
          <li>All designs + customer designs</li>
          <li>Delivery every 7 days</li>
          <li>Free delivery</li>
          <li>Paper + Plastic + Aluminium</li>
          <li>Unlimited delivery location</li>
          <li>500 units per month</li>
          <li>We don’t share your data</li>
        </ul>
      </p>
      <p class="text-center"><a href="order.php" class="btn btn-primary text-center">Order Now</a></p>
    </div>

  </div>

</div>

<div class="well bg-warning p-3 text-center">
  <h5>Fow further enquiries on our offers please <a class="text-primary" href="contact.php">contact us</a>.</h5>

</div>



<?php
  include 'includes/footer.inc.php';

 ?>
