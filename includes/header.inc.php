<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BioPack worldwide packaging solutions</title>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="Nikola Grubor">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BioPak supplier website,Bio-degradable packacging material
    adn fast and reliable delivery ">
    <meta name="keywords" content="Packaging,bio-degradable,eco-friendly
    fast delivery,reliable,supplier">

    <link rel="icon" href="images/logo.png">


    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- jquery -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Frames -->
    <link rel="stylesheet" href="css/header.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-xl navbar-dark text-light bg-dark px-5 ">
      <a class="navbar-brand ml-5" href="index.php"><img src="images/logo.png" alt="Logo"><p class="nav-logo-txt">BioPak<p></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-5">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Products
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="products.php?page=0">Bio Paper</a>
              <a class="dropdown-item" href="products.php?page=1">Bio Plastic</a>
              <a class="dropdown-item" href="products.php?page=2">Bio Aluminium</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="solutions.php">Solutions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pricing.php">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php

          if (isset($_SESSION['lvl'])){
            if ($_SESSION['lvl'] == 1) {
              echo '
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
              ';
            }
          }

          ?>



        </ul>

        <?php

        if (!isset($_SESSION['email'])) {
          echo '
          <a class = "nav-link text-light ml-lg-5" href="login.php"><button class= "btn btn-success" type="button" name="button">Log in</button></a>
          <a class = " nav-link text-light" href="register.php"><button class= "btn btn-info" type="button" name="button">Sign Up</button></a>
          ';
        }else{
          echo '
          <a class = "nav-link text-light" href="profile.php?id='.$_SESSION['id'].'"><button class= "btn btn-success" type="button" name="button">'.$_SESSION['email'].'</button></a>
          ';
        }


         ?>

      </div>

      <!-- <div class="collapse navbar-collapse">
        <a class = "nav-link text-light ml-auto" href="#">Log in</a>
        <a class = "nav-link text-light" href="#">Sign Up</a>

      </div> -->
  </nav>



    <!-- Script -->

    <script type="text/javascript">
    $(document).ready(function(){


    });

    </script>
