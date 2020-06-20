<?php
spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "../classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}
// End of autoloader

if (!isset($_POST['lg-sub'])) {
  header("Location:../index.php");
}


$p = htmlspecialchars(strip_tags($_POST['lg-pwd']));
$e = htmlspecialchars(strip_tags($_POST['lg-em']));

$lg = new Accounts;
$res = $lg->login($e,$p);

if ($res == 0){
  header("Location:../login.php?err=0");

}
else if ($res == -1){
  header("Location:../login.php?err=1");
}

else if ($res == -2){
  header("Location:../login.php?err=2");
}
else{
  session_start();
  $_SESSION['id'] = $res['company_id'];
  $_SESSION['name'] = $res['company_name'];
  $_SESSION['email'] = $res['email'];
  $_SESSION['lvl'] = $res['admin'];
  header("Location:../index.php");

}
