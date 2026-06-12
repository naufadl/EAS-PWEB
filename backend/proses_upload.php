<?php
session_start();
include("config.php");

$namaFile = $_FILES['foto']['name'];
$tmpFile = $_FILES['foto']['tmp_name'];

move_uploaded_file(
    $tmpFile,
    "uploads/".$namaFile
);

$id = $_SESSION['id'];

mysqli_query(
    $db,
    "UPDATE users
     SET foto='$namaFile'
     WHERE id='$id'"
);

echo "Upload berhasil";
?>