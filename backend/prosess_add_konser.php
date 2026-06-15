<?php
include("config.php");

if(isset($_POST['submit'])){
    $nama = $_POST['nama_event'];
    $tgl = $_POST['tanggal_event'];
    $lokasi = $_POST['lokasi'];
    $desk = $_POST['deskripsi'];

    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    
    $target_dir = "../uploads/";
    move_uploaded_file($tmp_file, $target_dir . $nama_file);

    $sql = "INSERT INTO events (nama_event, tanggal_event, lokasi, deskripsi, gambar) 
            VALUES ('$nama', '$tgl', '$lokasi', '$desk', '$nama_file')";

    if(mysqli_query($db, $sql)){
        header("Location: ../frontend/admin_konser.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>