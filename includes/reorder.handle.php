<?php
session_start();
spl_autoload_register("autoLoader");
function autoLoader($class){
  $path = "../classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;
  require_once $fullpath;
}
// Auto loader

if (!isset($_POST['reord-sub']) || !isset($_SESSION['id'])) {
  header("Location:../index.php");
}
$subOK = 1;


$id = $_SESSION['id'];
$pck= $_POST['opts'];
$qty= $_POST['qty'];
$loc= $_POST['loc'];
$em= $_POST['em'];
$ph= $_POST['ph'];
$dt= $_POST['ldate'];

$reord = new Orders;
$data = $reord->exists($id, $pck);
$ldate = $data['ord_date'];

$diff = abs(strtotime($ldate) - strtotime(date("Y-m-d")));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$dayDiff = $months * 30 + $days;


if ($pck == 1) {
  if($dayDiff < 30){
    $err = 11;
    $subOK = 0;
  }
}else if($pck == 2){
  if($dayDiff < 14){
    $err = 11;
    $subOK = 0;
  }

}else{
  if($dayDiff < 7){
    $err = 11;
    $subOK = 0;
  }
}


if ($subOK != 1) {
  header("Location:../profile.php?status=".$err);
}else{
  $res = $reord->updateOrder($id,$pck,$qty,$loc,$ph,$em);
  if ($res == -1) {
    $err = 12;
    header("Location:../profile.php?status=".$err);
  }else{
    header("Location:../profile.php?status=110");
  }

}
