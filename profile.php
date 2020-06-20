
<?php
require_once 'includes/header.inc.php';

if (!isset($_SESSION['email'])) {
  header("Location:index.php");
}

 ?>
<!-- CSS -->
<link rel="stylesheet" href="css/profile.css">


<div class="well msg text-center">
  <?php
  if (isset($_GET['status'])) {
    $st = $_GET['status'];
    switch ($st) {
      case 0:
        echo '<p class="text-center py-2 neg-msg bg-light">Invalid email input</p>';
        break;
      case 1:
        echo '<p class="text-center py-2 neg-msg bg-light">Incorrect password</p>';
        break;
      case 2:
        echo '<p class="text-center py-2 neg-msg bg-light">Error... Please try again later</p>';
        break;
      case 200:
        echo '<p class="text-center py-2 pos-msg bg-light">Email updated successfully!</p>';
        break;
      case 3:
        echo '<p class="text-center py-2 neg-msg bg-light">Password change error. Password do not match</p>';
        break;
      case 4:
        echo '<p class="text-center py-2 neg-msg bg-light">Invalid password input</p>';
        break;
      case 300:
        echo '<p class="text-center py-2 pos-msg bg-light">Password changed successfully!</p>';
        break;
      case 11:
        echo '<p class="text-center py-2 neg-msg bg-light">Cannot reorder so soon...Please select another pack or wait the designated period</p>';
        break;
      case 12:
        echo '<p class="text-center py-2 neg-msg bg-light">Error reordering.. Please try again later or contact us</p>';
        break;
      case 110:
        echo '<p class="text-center py-2 text-success bg-light">Reorder successful!</p>';
        break;
    }
  }

   ?>
</div>

<div class="container bg-primary user-p-cont">
  <div class="container col-10 mx-auto bg-light user-p">
    <h3 class="text-center">Account Information</h3>
    <hr>
      <div class="row justify-content-center">
        <div class="col-4 col-md-4">
          <h4>Client Id: </h4>
        </div>
        <div class="col-8 col-md-2">
          <h4 id="cmp-id">#<?php echo $_SESSION['id']; ?></h4>
        </div>

      </div>

      <div class="row justify-content-center">
        <div class="col-4 col-md-4">
          <h4>Company: </h4>
        </div>
        <div class="col-8 col-md-2">
          <h4 id="nm"><?php echo $_SESSION['name']; ?></h4>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-4 col-md-4">
          <h4>Phone: </h4>
        </div>
        <div class="col-8 col-md-2">
          <h4 id="em"><?php echo $_SESSION['email']; ?></h4>
        </div>
      </div>

    <br>

    <p class="text-center"><a href="includes/logout.inc.php"><button class="btn btn-danger col-12 col-md-4" type="button" name="button">Log Out</button></a></p>

  </div>

  <br><br>

  <div class="container bg-light col-10 mx-auto ord-items">
    <h3 class="text-center mt-1">Recent Orders</h3>
    <hr>
    <div class="items">

    </div>
  </div>


<br><br>
  <div class="container bg-light col-10 mx-auto acc-pref">
    <h3 class="text-center mt-1">Account Preferences</h3>
    <hr>
    <div class="row">
      <h4 class="col-5 col-md-2 pref-it">Email:</h4>
      <h4 class="col-7 col-md-5 pref-it"><?php echo $_SESSION['email']; ?></h4>
      <button class="col-9 col-md-2 mx-5 btn btn-warning" id="show-email">Change</button>
    </div>
    <br>
    <!-- Email Dropdown -->
    <div class="wrap-em-ch border border-warning">
      <div class="row justify-content-center">
        <h4 class="my-4">Change Email</h4>
      </div>

      <form action="includes/preferences.inc.php" method="post">

      <div class="row pass-c justify-content-center">
        <div class="col-10 col-md-6">
          <input class="form-control" type="text" name="email" placeholder="New Email...">
        </div>
      </div>

      <div class="row pass-c justify-content-center mt-2">
        <div class="col-10 col-md-6">
          <input class="form-control" type="password" name="pass" placeholder="Password...">
        </div>
      </div>

      <br>

      <div class="row justify-content-center my-3">
        <button class="btn btn-warning mr-3" id="sub-em" type="submit" name="sub-em">Change</button>
        <button class="btn btn-danger ml-3" id="cancel-email" type="button" name="button">Cancel</button>
      </div>
    </form>


    </div>

    <!-- Password -->
    <br>
    <div class="row">
      <h4 class="col-5 col-md-2 pref-it">Password:</h4>
      <h4 class="col-6 col-md-5 pref-it">Click to change</h4>
      <button class="col-9 col-md-2 mx-5 btn btn-warning" id="show-pass">Change</button>
    </div>
    <br><br>

    <!-- Password Dropdown -->
    <div class="wrap-pas-ch border border-warning">
      <div class="row justify-content-center">
        <h4 class="my-4">Change Password</h4>
      </div>

      <form action="includes/preferences.inc.php" method="post">

      <div class="row pass-c justify-content-center">
        <div class="col-10 col-md-6">
          <input class="form-control" type="password" name="old-pass" placeholder="Old Password...">
        </div>
      </div>

      <br>

      <div class="row pass-c justify-content-center mb-2">
        <div class="col-10 col-md-6">
          <input class="form-control" type="password" name="new-pass" placeholder="New Password...">
        </div>
      </div>
      <div class="row pass-c justify-content-center">
        <div class="col-10 col-md-6">
          <input class="form-control" type="password" name="re-pass" placeholder="Retype Password...">
        </div>

      </div>

      <div class="row justify-content-center my-3">
        <button class="btn btn-warning mr-3" id="sub-pass" type="submit" name="sub-pass">Change</button>
        <button class="btn btn-danger ml-3" id="cancel-pass" type="button" name="button">Cancel</button>
      </div>

      </form>

    </div>


  </div>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var k = 9;
    $(".items").load("includes/profile.inc.php",{
      k : k
    });

    // Message
    (function(){
      console.log("fired")
      setTimeout(function(){
        $(".msg").slideUp("slow")
      },6000);
    })();

    // Password
    $("#show-pass").click(function(){
      $(".wrap-pas-ch").slideDown("slow");
      $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $("#cancel-pass").click(function(){
      $(".wrap-pas-ch").slideUp("slow");
    });

    // email
    $("#show-email").click(function(){
      $(".wrap-em-ch").slideDown("slow");
      $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $("#cancel-email").click(function(){
      $(".wrap-em-ch").slideUp("slow");
    });


  });//End of document

</script>




</body>
</html>
