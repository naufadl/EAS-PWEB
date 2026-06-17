<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

include("config.php");

if(isset($_POST['submit'])){
    $nama   = mysqli_real_escape_string($db, $_POST['nama_event']);
    $tgl    = mysqli_real_escape_string($db, $_POST['tanggal_event']);
    $lokasi = mysqli_real_escape_string($db, $_POST['lokasi']);
    $desk   = mysqli_real_escape_string($db, $_POST['deskripsi']);

    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    
    $target_dir = "../uploads/";
    move_uploaded_file($tmp_file, $target_dir . $nama_file);

    $sql = "INSERT INTO daftar_konser (nama_event, tanggal_event, lokasi, deskripsi, gambar) 
            VALUES ('$nama', '$tgl', '$lokasi', '$desk', '$nama_file')";

    if(mysqli_query($db, $sql)){
        header("Location: ../frontend/admin_konser.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>