<?php


if (!isset($_GET['st'])) {
  header("Location:../index.php");
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <title>Success</title>
     <link rel="icon" href="images/logo.png">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/reg.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>


     <div class="container">
       <div class="jumbotron">
         <h2>Successfully Registered!</h2>
         <h3>Please wait while we validate your account.
         <br>This may take up to 5 days.</h3>
         <a href="../login.php"><button type="button" class="btn btn-success" name="button">Log In</button></a>
       </div>

     </div>



   </body>
 </html>
