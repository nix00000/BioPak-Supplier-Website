<?php

session_start();

if (!isset($_SESSION['email'])) {
  header("Location:../index.php");

}else{
  unset($_SESSION['email']);
  unset($_SESSION['id']);
  session_destroy();

  header("Location:../index.php");
}
