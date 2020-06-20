<?php
require_once 'includes/header.inc.php';

if (!isset($_SESSION['email'])) {
  header("Location:login.php");
}

 ?>
<link rel="stylesheet" href="css/order.css">
<div class="container bg-light ord-cont">
  <p class="msg">
    <?php
    if (isset($_GET['err'])) {
      $err = $_GET['err'];

      switch ($err) {
        case 0:
          echo "<p class='neg-msg'>Error selecting the pack</p>";
          break;
        case 1:
          echo "<p class='neg-msg'>Wrong quantity</p>";
          break;
        case 2:
          echo "<p class='neg-msg'>Error selecting the pack</p>";
          break;
        case 3:
          echo "<p class='neg-msg'>Error email or phone</p>";
          break;
        case 4:
          echo "<p class='neg-msg'>Error email or phone</p>";
          break;
        case 7:
          echo "<p class='neg-msg'>You cannot reorder so soon</p>";
          break;
        case 200:
          echo "<p class='pos-msg'>Order has been placed.\nCheck your profile</p>";
          break;
      }
    }
     ?>
  </p>
  <h3>Order Here</h3>
  <hr>
  <form action="includes/order.handle.php" method="post">
    <div class="form-group">
      <label for="opts"><b>Select a pack:</b></label>
      <select class="form-control packs" name="opts" id = "pck-op">
        <option value="0">Basic Pack</option>
        <option value="1">Standard Pack</option>
        <option value="2">Premium Pack</option>

      </select>

    </div>
    <label style="margin-bottom:0" for="qty"><b>Amount of Units :</b></label>
    <p style="margin:0"><small>What is a <a class="text-info" href="solutions.php#measures">unit</a>?</small></p>
    <div class="form-group inp-bsc">
      <input class="delv-inp" type="number" name="qtyb" value="80" min="80" max ="100">
      <p>(Max 100 with Basic Pack)</p>

      <hr>

      <label style="margin-bottom:0" for="loc"><b>Num. of Delivery Locations: </b></label>
      <p><i>Only 1 location with Basic Pack</i></p>
    </div>
    <div class="form-group inp-std">
      <input class="delv-inp" type="number" name="qtys" value="80" min="80" max ="200">
      <p>(Max 200 with Standard Pack)</p>

      <hr>

      <label style="margin-bottom:0" for="loc"><b>Num. of Delivery Locations: </b></label><br>
      <input class="delv-inp" type="number" name="loc" value="1" min="1" max ="3">
      <p>(Max 3 locations with Standard Pack)</p>

    </div>
    <div class="form-group inp-prm">
      <input class="delv-inp" type="number" name="qtyp" value="80" min="80" max ="500">
      <p>(Max 500 with Premium Pack)</p>

      <hr>

      <label style="margin-bottom:0" for="loc"><b>Num. of Delivery Locations: </b></label><br>
      <input class="delv-inp" type="number" name="loc" value="1" min="1">
      <p>(Unlimited locations with Premium Pack)</p>

    </div>

    <hr>

    <div class="form-group">

      <div class="row">
        <div class="col-2 col-sm-2">
          <label for="phone">Email: </label>
        </div>
        <div class="col-10 col-md-6 col-lg-4">
          <input class = "col-12" type="text" name="email" required>
        </div>
      </div>
      <div class="row">
        <div class="col-2 col-sm-2">
          <label for="phone">Phone: </label>
        </div>
        <div class="col-10 col-md-6 col-lg-4">
          <input class = "col-12" type="text" name="phone" required>

        </div>

      </div>

    </div>

    <hr>

    <div class="form-group">
      <div class="inp-bsc">
        <p class="prc"><b>Total Price: $799</b></p>
      </div>

      <div class="inp-std">
        <p class="prc"><b>Total Price: $1,799</b></p>
      </div>

      <div class="inp-prm">
        <p class="prc"><b>Total Price: $2,799</b></p>
      </div>

    </div>

    <p>* We will contact you within 1-2 working days to arrange further details.<br> </p>

    <button class="btn btn-success" type="submit" name="ord-sub">Submit</button>

  </form>

</div>

<script type="text/javascript">
$(document).ready(function(){

  $("select#pck-op").change(function(){
    var num = Number($(this).children(":selected").val());

    if (num == 0) {
      $(".inp-bsc").show();
      $(".inp-std").hide();
      $(".inp-prm").hide();
    }else if (num == 1){
      $(".inp-bsc").hide();
      $(".inp-std").show();
      $(".inp-prm").hide();
    }else {
      $(".inp-bsc").hide();
      $(".inp-std").hide();
      $(".inp-prm").show();
    }

  });



});

</script>

<?php
  include 'includes/footer.inc.php';

 ?>
