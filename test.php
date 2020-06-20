<?php

spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}

// $test = new Orders;
// $data = $test->orderDetails(4);
//
// print_r($data);
// $diff = abs(strtotime("2020-06-05") - strtotime(date("Y-m-d")));
// $years = floor($diff / (365*60*60*24));
// $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
// $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//
// print($days);
?>


<div class="container">
  <img class="col-8" src="" alt="">
  <div class="col-4">
    <ul>
      <li>Bio-Degradable</li>
      <li>Durable</li>
      <li>Recycled</li>
      <li>Fair Prices</li>
    </ul>

  </div>


</div>


<div class="acc">
  <form class="" action="index.html" method="post">
    <h5>Email: </h5>
    <input type="text" name="id" value="hidden">
    <button type="button" name="button">Approve</button>

  </form>
</div>





<div class="ord">
  <form action="" method="post">
    <h5>To: </h5>
    <h5>Quantity: </h5>
    <h5>Pack: </h5>
    <h5>Phone: </h5>
    <h5>Email: </h5>


    <button type="button" name="button">Approve</button>
    <button type="button" name="button">Cancel</button>

  </form>
</div>

<input type="hidden" name="order_id" value="">
