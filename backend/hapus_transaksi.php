<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($db, "SELECT foto FROM transaksi WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
    
    if ($data && file_exists("../uploads/" . $data['foto'])) {
        unlink("../uploads/" . $data['foto']);
    }

    $sql = "DELETE FROM transaksi WHERE id = '$id'";
    $query_hapus = mysqli_query($db, $sql);

    if ($query_hapus) {
        header("Location: ../frontend/admin_transaksi.php?status=sukses");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($db);
    }
} else {
    header("Location: ../frontend/admin_transaksi.php");
}
?>