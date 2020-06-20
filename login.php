
<?php
session_start();

if (isset($_SESSION['email'])) {
  header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Sign Up</title>
    <link rel="icon" href="images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container ver-center">
        <form action="includes/login.handle.php" method=post>
          <div class="wrapping">

              <?php
              if (isset($_GET['err'])) {
                $err = $_GET['err'];

                switch ($err) {
                  case 0:
                    echo "<p class='neg-msg'>*Account does not exist</p>";
                    break;
                  case 1:
                    echo "<p class='neg-msg'>*Incorrect password</p>";
                    break;
                  case 2:
                    echo "<p class='neg-msg'>*Account is not approved yet <br> Please wait while we process your request</p>";
                    break;

                }
              }

               ?>


            <div class="imag">
              <a href="index.php"><p><img src="images/logo.png" alt="Logo">BioPack</p></a>
            </div>

            <div class="form-row">
              <label for="usern">Email: </label>
              <input type="text" name="lg-em" class="form-control" placeholder="Email..." id="email">
            </div>

            <div class="form-row">
              <label for="pwd">Password: </label>
              <input type="password" name = "lg-pwd" class="form-control" placeholder="Password..." id="pwd">
            </div>

            <br>

            <button type="submit" name="lg-sub" class="btn btn-success">Log in</button>

            <br>
            <br>
            <p style="text-align:center">Don't have an account? Click <a href="register.php">here</a> to sign up </p>

          </div>

        </form>
    </div>
