<?php
session_start();
if (isset($_SESSION['email'])) {
  header("location:index.php");
}
if (isset($_POST['err'])) {
  print_r($_POST['err']);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Sign Up</title>
    <link rel="icon" href="images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reg.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container ver-center">

        <form action="includes/register.handle.php" method="post">
          <div class="wrapping">
            <p class="msg">
              <?php
              if (isset($_GET['err'])) {
                $arr = $_GET['err'];
                foreach ($arr as $key => $v) {
                  switch ($v) {
                    case 0:
                      echo "* Invalid Name input <br>";
                      break;
                    case 1:
                      echo "* Invalid Email input<br>";
                      break;
                    case 2:
                      echo "* Passwords do not match<br>";
                      break;
                    case 3:
                      echo "* Invalid Password input<br>";
                      break;
                    case 4:
                      echo "* Invalid Phone input<br>";
                      break;
                  }
                }
              }

               ?>


            </p>

            <div class="imag">
              <a href="index.php"><p><img src="images/logo.png" alt="Logo">BioPack</p></a>

            </div>

            <div class="form-row">
              <label for="usern">Company: </label>
              <input type="text" name="company" class="form-control" placeholder="Company" id="company" required>
            </div>

            <div class="form-row">
              <label for="lname">Email: </label>
              <input type="text" name="email" class="form-control" placeholder="Email" id="email" required>
            </div>

            <div class="form-row">
              <label for="pwd">Password: </label>
              <input type="password" name = "pwd" class="form-control" placeholder="Password" id="pwd" required>
            </div>

            <div class="form-row">
              <label for="repwd">Retype: </label>
              <input type="password" name = "repwd" class="form-control" placeholder="Password" id="repwd" required>
            </div>


            <div class="form-row">
              <label for="repwd">Phone: </label>
              <input type="text" name = "phone" class="form-control" placeholder="Phone" id="phone" required>
            </div>

            <div class="form-row">
              <label for="repwd">Website (optional): </label>
              <input type="text" name = "site" class="form-control" placeholder="Website" id="site">
            </div>

            <br>

            <button type="submit" name="signup" class="btn btn-primary">Sign up</button>

            <br>
            <br>
            <p style="text-align:center">Already have an account? Click <a href="login.php">here</a> to log in </p>

          </div>

        </form>


    </div>

  </body>
</html>
