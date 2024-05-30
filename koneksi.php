<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "stmikera2";

$koneksi = mysqli_connect($hostname, $username, $password, $database) or die("Connection koneksi ke mysql gagal");

if(!$koneksi){
    die("Connection failed: " . mysqli_connect_error());
}

?>

