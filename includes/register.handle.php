<?php

spl_autoload_register('autoLoader');
function autoLoader($class){
  $path = "../classes/";
  $ext = ".class.php";
  $fullpath = $path.$class.$ext;

  require_once $fullpath;

}

if (!isset($_POST['signup'])) {
  header("Location:../index.php");
}

$subOK = 1;
$errs=array();


$cmp = $_POST['company'];

if (!preg_match("/^[a-zA-Z\s]+$/",$cmp)) {
  $errs[] = 0;
  $subOK = 0;
}


$em = $_POST['email'];
if (!preg_match("/^[a-zA-Z\d\._]+@[a-zA-Z\._]+\.[a-zA-Z\d\.]+$/",$em)) {
  $errs[] = 1;
  $subOK = 0;
}
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

if ($pwd != $repwd) {
  $errs[] = 2;
  $subOK = 0;
}else{
  if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$pwd) ) {
    $errs[] = 3;
    $subOK = 0;
  }

}
$ph = $_POST['phone'];
if (!preg_match("/^[\+\s\d]+$/",$ph)) {
  $errs[] = 4;
  $subOK = 0;
}

$site = $_POST['site'];
if (!preg_match("/^[a-zA-Z\d\.]+$/",$site)) {
  $errs[] = 5;
  $subOK = 0;
}


if ($subOK != 1) {
  $query = http_build_query(array('err' => $errs));
  header("Location:../register.php?".$query);
}else{
  $reg = new Accounts;
  $res = $reg->register($cmp, $em, $pwd, $ph, $site);
  if ($res != -1) {
    header("Location:reg_success.inc.php?st=success");
  }
}
