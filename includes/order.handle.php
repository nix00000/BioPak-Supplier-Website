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

if (!isset($_POST['ord-sub']) && !isset($_SESSION['id'])) {
  header("Location:../index.php");
}
// Create instance Orders and variable
$ord = new Orders;
$subOK = 1;
$id = $_SESSION['id'];

// Pack
$pck = (int)$_POST['opts'] + 1;
if ($pck < 0 || $pck > 3) {
  $err = 0;
  $subOK = 0;
}

$pck = htmlspecialchars(strip_tags($pck));

// Quantity
if ($pck == 1) {
  $qty = $_POST['qtyb'];
}else if ($pck == 2){
  $qty = $_POST['qtys'];
}else{
  $qty = $_POST['qtyp'];
}

$qty = htmlspecialchars(strip_tags($qty));

if ($qty > 100 && $pck == 1 || $qty > 200 && $pck == 2 || $qty > 500 && $pck == 3) {
  $err = 1;
  $subOK = 0;
}

// Locations
if ($pck == 1) {
  $loc = 1;
}else{
  $loc = htmlspecialchars(strip_tags($_POST['loc']));
  if ($loc > 3 && $pck == 2) {
    $err = 2;
    $subOK = 0;
  }
}

// info
$em = $_POST['email'];
if (!preg_match("/^[a-zA-Z\d\_.]+@[a-zA-Z\._]+\.[a-zA-Z\d\.]+$/",$em)) {
  $err = 3;
  $subOK = 0;
}

$ph = $_POST['phone'];
if (!preg_match("/^[\+\d]+$/",$ph)) {
  $err = 4;
  $subOK = 0;
}
// End of data gather


// Check if it exists
$exists = 0;
$data = $ord->exists($id,$pck);

if ($data == -2) {
  $err = 8;
}else if($data == -1){

  if ($subOK != 1) {
    header("Location:../order.php?err=".$err);
  }else{
    // Exe
    $res = $ord->order($id,$pck,$qty,$loc,$em,$ph);

    if ($res != -1) {
      header("Location:../order.php?err=200");
    }else{
      $err = 6;
      header("Location:../order.php?err=".$err);
    }

  }

} // Not Found
else{

  // Date
  $ldate = $data['ord_date'];

  $diff = abs(strtotime($ldate) - strtotime(date("Y-m-d")));
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  $dayDiff = $months * 30 + $days;

  if ($pck == 1) {
    if($dayDiff < 30){
      $err = 7;
      $subOK = 0;
    }
  }else if($pck == 2){
    if($dayDiff < 14){
      $err = 7;
      $subOK = 0;
    }

  }else{
    if($dayDiff < 7){
      $err = 7;
      $subOK = 0;
    }
  }

  if ($subOK != 1) {
    header("Location:../order.php?err=".$err);
  }else{
    $res = $ord->updateOrder($id,$pck, $qty, $loc, $ph, $em);
    if ($res != -1) {
      header("Location:../order.php?err=200");
    }else{
      header("Location:../order.php?err=".$err);

    }


  }


}
