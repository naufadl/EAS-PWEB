<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

include("config.php");

$nama = $_POST['nama_paket'];
$harga = $_POST['harga'];
$stok = $_POST['stok_total'];
$event_id = $_POST['event_id'];

$query = "INSERT INTO paket_tiket (event_id, nama_paket, harga, stok_total, stok_tersedia) 
          VALUES ('$event_id', '$nama', '$harga', '$stok', '$stok')";

if (mysqli_query($db, $query)) {
    header("Location: ../frontend/admin_index_paket.php?id=" . $event_id);
} else {
    echo "Error: " . mysqli_error($db);
}
?>