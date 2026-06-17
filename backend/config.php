<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "final_project_luna";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung: " . mysqli_connect_error());
}
?>