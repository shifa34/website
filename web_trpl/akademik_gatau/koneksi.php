<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_akademik";

$db = mysqli_connect($hostname, $username, $password, $database);

if(!$db){
  die("Gagal menghubungkan ke database");
}

?>