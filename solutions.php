<?php
require_once 'includes/header.inc.php';
 ?>

<!-- css -->
<link rel="stylesheet" href="css/solutions.css">


<div class="container-fluid p-0">
  <img class="w-100" style="height:300px;" src="images/trucks-panorama.jpg" alt="trucks">

</div>


<div class="container-fluid border border-dark bg-info sol-head">
  <div class="wrap bg-info text-center">
    <h2><b>We Solve Problems</b></h2>
    <h4>Let us take care of your circular economy.
      We handle all the recycling, We handle your waste</h4>
  </div>

</div>

<br>
<hr>
<br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-6 resp">
      <img src="images/responsibility.jpg" alt="responsiblity">
    </div>

    <div class="col-12 col-lg-7 col-xl-6">
      <h4>We take responsibility in cleaning the envronment<br>
      as well as providing excellent customer service. <br><br>
      Businesses do not need suffer from circular economy<br><br>
      Its implementation should be a victory for everyone!
    </h4>

    </div>

  </div>
</div>

<br>
<br>
<hr>


<!-- <div class="well p-5 border border-dark track" >
  <img src="images/truck1.png" alt="truck" id ="truck">
</div> -->

<div class="container measures" id="measures">
  <h2 class="text-center my-4"><i>Measures</i></h2>
  <div class="row justify-content-center">
    <div class="col-7">
      <h4 class="measure"><b>1 Unit = 1 Tone</b></h4>
      <hr>
      <h4 class="measure"><b>Standard pack paper</b> = 50g paper = 20,000 packs </h4>
      <h4 class="measure"><b>Standard pack plastic</b> = 70 g = 14,300 packs</h4>
      <h4 class="measure"><b>Standard pack aluminum</b> = 80g = 14,300packs</h4>
      <h4 class="measure"><b>Large pack paper</b> = 120g = 8,300 packs</h4>
      <h4 class="measure"><b>Large pack plastic</b> = 150g = 6,600 packs</h4>
      <h4 class="measure"><b>Large pack aluminum</b> = 120g = 8,300 packs</h4>
    </div>

  </div>


</div>

<br>
<br>
<hr>
  <div class="container-fluid bg-success justify-content-center py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-5 wrapper">
        <img src="images/circular.PNG" alt="Cricular econ">

      </div>

      <div class="col-12 col-md-3 wrapper-txt">
        <p>We take the problem from you</p>
        <p>Our responsibility is to take recycling and a part of production</p>
        <p>We provide you with the packaging you need</p>
      </div>

    </div>
  </div>

  <br>

  <div class="container p-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-5 thework">
        <img src="images/production.png" alt="Prod line">

      </div>

      <div class="col-12 col-md-4 thework-txt ">
        <p>We create the packaging from the design you choose.
          Send us your specifications and we will make it. The limitations
          depend on the package selected.
          To view examples of our prodcuts visit our
        </p>
        <a href="products.php#examples"> <button class="btn btn-success" type="button" name="button">View Examples</button> </a>

      </div>

    </div>


    <br><br>
    <hr>
    <br><br>
    <div class="row justify-content-center">
      <div class="col-12 col-md-4 thework-txt ">
        <p>We deliver the packaging to your factory doors.
          Just specify the amount of location you want and our team will contact
          you to arrange further details.

        </p>
        <a href="pricing.php"> <button class="btn btn-success" type="button" name="button">Select a Pack</button> </a>
      </div>

      <div class="col-12 col-md-6 thework">
        <img src="images/truck1.png" alt="Prod line">

      </div>



    </div>


  </div>




<?php
  include 'includes/footer.inc.php';

 ?>
 <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
 <script type="text/javascript">

 $(document).ready(function(){

   $(window).scroll(function(){
     var x = $(document).scrollTop();

     // Circular economy
     if (x > 1300) {
       console.log(x)
       $(".wrapper-txt").show();
       $(".wrapper-txt > p").fadeIn("slow");
     }else{
       $(".wrapper-txt > p").fadeOut("slow");
       $(".wrapper-txt").fadeOut();

     }


     // Prod
     if (x > 1500) {
       $(".thework-txt").fadeIn("slow");
     }else{
       $(".thework-txt").fadeOut("slow");
     }

   }); // END OF SCROLL EVENT

 })// END OF MAIN

 </script>
