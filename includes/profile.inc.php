<?php
session_start();
spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "../classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}

if (!isset($_POST['k'])) {
  exit();
}else{
  $id = $_SESSION['id'];
  $ord = new Orders;
  $data = $ord->orderDetails($id);



  foreach ($data as $k) {
    // Date
    $ldate = $k['ord_date'];

    $order = 1;

    $diff = abs(strtotime($ldate) - strtotime(date("Y-m-d")));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $dayDiff = $months * 30 + $days;
    if ($k['pack_id'] == 1) {
      if($dayDiff < 30){
        $daystill = 30 - $dayDiff;
        $order = 0;
      }
    }else if($k['pack_id'] == 2){
      if($dayDiff < 14){
        $daystill = 14 - $dayDiff;
        $order = 0;
      }

    }else{
      if($dayDiff < 7){
        $daystill = 7 - $dayDiff;
        $order = 0;
      }
    }

    echo '
    <div class="well item-div text-center text-light">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Pack</th>
            <th scope="col">Qty</th>
            <th scope="col">Location</th>
            <th scope="col">Price</th>
            <th scope="col">Last Order</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>'.$k['pack_name'].'</td>
            <td>'.$k['units'].'</td>
            <td>'.$k['del_loc'].'</td>
            <td>$'.$k['price'].'</td>
            <td>'.$dayDiff.' day(s) ago</td>
            <td>';

            if ($k['sent'] == 0) {
              echo 'Pending';
            }else{
              echo 'Sent';
            }

          echo '
            </td>
          </tr>
        </tbody>
      </table>

      <form action="includes/reorder.handle.php" method="post">

      <input type="hidden" name="opts" value="'.$k['pack_id'].'">
      <input type="hidden" name="qty" value="'.$k['units'].'">
      <input type="hidden" name="loc" value="'.$k['del_loc'].'">
      <input type="hidden" name="em" value="'.$k['email'].'">
      <input type="hidden" name="ph" value="'.$k['phone'].'">
      <input type="hidden" name="ldate" value="'.$dayDiff.'">

      ';
      if ($order != 1) {
        echo '
        <div class="cont-btns">
          <button class="btn btn-light bg-danger text-light disabled" type="submit" name="reord-sub" disabled>Reorder</button>
        </div>
        <p class="text-dark">(Days to reorder: '.$daystill.')</p>
        ';
      }else{
        echo '
        <div class="cont-btns">
          <button class="btn btn-light bg-danger text-light" type="submit" name="reord-sub">Reorder</button>
        </div>
        <p class="text-dark">(Reorder available)</p>
        ';
      }

      echo'
      </form>
    </div>
    <br>
    ';
  }
}
