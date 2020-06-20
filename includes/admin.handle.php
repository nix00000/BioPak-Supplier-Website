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

$change = new Accounts;
$orders = new Orders;


if (isset($_POST['approve'])) {
  $id = $_POST['id'];
  $act = $change->approve($id);
  if ($act != -1) {
    header("Location:../admin.php?st=0");
  }else{
    header("Location:../admin.php?st=1");
  }
}else if (isset($_POST['delete'])){
  $id = $_POST['id'];
  $act = $change->delete($id);

  if ($act != -1) {
    header("Location:../admin.php?st=0");
  }else{
    header("Location:../admin.php?st=1");
  }
}else if (isset($_POST['send'])){
  $id = htmlspecialchars(strip_tags($_POST['order_id']));
  $act = $orders->send($id);

  if ($act != -1) {
    header("Location:../admin.php?ord=".$act);
  }else{
    header("Location:../admin.php?ord=1");
  }


}else if (isset($_POST['cancel'])){
  $id = htmlspecialchars(strip_tags($_POST['order_id']));
  $act = $orders->cancel($id);

  if ($act != -1) {
    header("Location:../admin.php?ord=0");
  }else{
    header("Location:../admin.php?ord=1");
  }


}else{
  header("Location:../index.php");
}
