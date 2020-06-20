<?php


abstract class Dbh
{

  protected function connect()
  {
    $dbs = "localhost";
    $dbu = "root";
    $dbp = "";
    $dbn = "biopack";

    $pdo = new PDO("mysql:host=".$dbs.";dbname=".$dbn.";charset=utf8;",$dbu,$dbp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;

  }
}
