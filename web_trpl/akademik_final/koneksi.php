<?php

$hostname = "localhost";
$username = "user";
$password = "user";
$database = "db_akademik";

$db = mysqli_connect($hostname, $username, $password, $database);

if(!$db){
  die("Gagal menghubungkan ke database");
}

?>