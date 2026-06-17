<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM paket_tiket WHERE id = '$id'";

    if (mysqli_query($db, $query)) {
        header("Location: ../frontend/admin_index_pk.php?pesan=berhasil_dihapus");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>