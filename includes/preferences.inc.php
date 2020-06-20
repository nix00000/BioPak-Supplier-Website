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
$update = new Accounts;
if (isset($_POST['sub-em'])) {
  $pass = htmlspecialchars(strip_tags($_POST['pass']));
  $email = htmlspecialchars(strip_tags($_POST['email']));
  $id = $_SESSION['id'];
  if (!preg_match("/^[a-zA-Z\d\._]+@[a-zA-Z\._]+\.[a-zA-Z\d\.]+$/",$email)) {
    header("Location:../profile.php?status=0");
  }

  $res = $update->updateEmail($id,$email,$pass);
  if ($res == -1) {
    header("Location:../profile.php?status=1");
  }else if ($res == -2){
    header("Location:../profile.php?status=2");
  }else{
    unset($_SESSION['email']);
    $_SESSION['email'] = $res;
    header("Location:../profile.php?status=200");
  }


  // END OF EMAIL UPDATE

}else if(isset($_POST['sub-pass'])){
  $oldpass = htmlspecialchars(strip_tags(($_POST['old-pass'])));
  $newpass = htmlspecialchars(strip_tags(($_POST['new-pass'])));
  $repass = htmlspecialchars(strip_tags(($_POST['re-pass'])));
  $id = $_SESSION['id'];

  if ($newpass != $repass) {
    header("Location:../profile.php?status=3");
    exit();
  }

  if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/',$newpass)) {
    header("Location:../profile.php?status=4");
    exit();
  }

  $res = $update->updatePass($id, $oldpass, $newpass);
  if ($res == -1) {
    header("Location:../profile.php?status=1");
  }else if ($res == -2){
    header("Location:../profile.php?status=2");
  }else{
    header("Location:../profile.php?status=300");
  }

}else{
  header("Location:../index.php");
}
