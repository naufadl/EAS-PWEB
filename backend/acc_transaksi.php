<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

include("config.php");

$id = $_GET['id'];

mysqli_query(
    $db,
    "UPDATE transaksi
     SET status_bayar='Lunas'
     WHERE id='$id'"
);

header("Location: ../frontend/admin_transaksi.php");
exit();
?>