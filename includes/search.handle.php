<?php

session_start();
spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "../classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}
// End of autoloader

if (isset($_POST['src'])) {
  $src= htmlspecialchars(strip_tags($_POST['src']));

  $new = new Accounts;

  $res = $new->searchAcc($src);

  if ($res == -1) {
    echo "No results found...";
  }else if(count($res) == 0){
    echo "No results found...";
  }
  else{
    foreach ($res as $k) {
      if ($k['admin'] != 1) {
        if ($k['approved'] == 1) {
          $ap = "Approved";
        }else{
          $ap = "Not Approved";
        }
        echo '
          <div class="acc">
            <form action="includes/admin.handle.php" method="post">
              <h5><b>Company:</b> '.$k['company_name'].'</h5>
              <h5><b>Email:</b> '.$k['email'].'</h5>
              <h5><b>Phone:</b> '.$k['phone'].'</h5>
              <h5><b>Status:</b> '.$ap.'</h5>
              <input type="hidden" name="id" value="'.$k['company_id'].'">
              <br>
          ';

          if ($k['approved'] == 1) {
            echo '<button class="btn btn-success btn-disabeled mx-1" type="submit" name="approve" disabled>Approve</button>
                  <button class="btn btn-danger mx-1" type="submit" name="delete">Delete</button>
            ';

          }else{
            echo '<button class="btn btn-success" type="submit" name="approve">Approve</button>
                  <button class="btn btn-danger" type="button" name="delete">Cancel</button>
            ';
          }

        echo'
          </form>
        </div>
        ';
      }
    }
  }
}
else if (isset($_POST['srcord'])) {
  $ord = htmlspecialchars(strip_tags($_POST['srcord']));
  $new = new Orders;
  $res = $new->searchOrd($ord);

  if ($res == -1) {
    echo "No results found...";
  }else{
    foreach ($res as $r) {
      echo '
      <div class="ord">
        <form action="includes/admin.handle.php" method="post">
          <h5><b>To: </b>'.$r['company_name'].'</h5>
          <h5><b>Quantity: </b>'.$r['units'].'</h5>
          <h5><b>Pack: </b>'.$r['pack_name'].'</h5>
          <h5><b>Phone:</b>'.$r['phone'].' </h5>
          <h5><b>Email: </b>'.$r['email'].'</h5>
          <h5><b>Status: </b>'.$r['sent'].'</h5>
          <h5><b>Order Date: </b>'.date("d-m-Y",strtotime($r['ord_date'])).'</h5>
          <input type="hidden" name="order_id" value="'.$r['order_id'].'">
          <br>

          <button class="btn btn-success mr-3" type="submit" name="send">Send</button>
          <button class="btn btn-danger ml-3" type="submit" name="cancel">Cancel</button>

        </form>
      </div>
      ';
    }
  }

}
