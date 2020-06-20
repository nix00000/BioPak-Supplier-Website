<?php

require_once 'includes/header.inc.php';


if (!isset($_SESSION['id']) || $_SESSION['lvl'] != 1) {
  header("Location:index.php");
}



 ?>
<!-- css -->
<link rel="stylesheet" href="css/admin.css">


 <div class="container-fluid bg-info p-5">
   <div class="container bg-light acc-cont">
     <h3 class="text-center"><i>Accounts</i></h3>
     <hr>
     <div class="row justify-content-center">
      <input class="form-control mr-sm-2 col-3" type="search" placeholder="Search" aria-label="Search" id="src-inp">
      <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="search">Search</button>
     </div>


     <?php
      if (isset($_GET['st'])) {
        $st = $_GET['st'];
        switch ($st) {
          case 0:
            echo '<p class="pos-msg">Change implemented successfully</p>';
            break;

          case 1:
            echo '<p class="neg-msg">Change failed to execute</p>';
            break;
        }
      }
      ?>
     <hr>
     <div class="accounts"></div>

   </div>
 </div>



 <div class="container-fluid bg-info p-5">
   <div class="container bg-light acc-cont">
     <h3 class="text-center"><i>Orders</i></h3>
     <hr>
     <div class="row justify-content-center">
      <input class="form-control mr-sm-2 col-3" type="search" placeholder="Search" aria-label="Search" id="srcord">
      <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="search2">Search</button>
     </div>
     <?php
      if (isset($_GET['ord'])) {
        $ord = $_GET['ord'];
        switch ($ord) {
          case 0:
            echo '<p class="pos-msg">Change implemented successfully</p>';
            break;

          case 1:
            echo '<p class="neg-msg">Change failed to execute</p>';
            break;
        }
      }
      ?>
     <hr>
     <div class="orders"></div>

   </div>
 </div>


 <script src = "js/admin.js"></script>
