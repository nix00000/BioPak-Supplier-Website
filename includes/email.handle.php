<?php


if (!isset($_POST['send'])) {
  header("Location:../contact.php");
}

try {
  $name = $_POST['name'];
  $mailFrom = $_POST['name'];
  $msg = $_POST['name'];
  $subject = "test";

  $mailTo = 'n.grubor@protonmail.com';
  $headers = "From: ".$mailFrom;

  mail($mailTo,"User",$msg,$headers);
  header("Location:../contact.php?st=1");



} catch (Exception $e) {
  header("Location:../contact.php?st=0");
}
