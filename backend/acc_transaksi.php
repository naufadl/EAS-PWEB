<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

include("config.php");

$id = $_GET['id'];

$ambil_data = mysqli_query($db, "SELECT * FROM transaksi WHERE id = '$id'");
$data = mysqli_fetch_array($ambil_data);
$id_paket = $data['id_paket'];

$update_status = mysqli_query($db, "UPDATE transaksi SET status_bayar = 'paid' WHERE id = '$id'");

if ($update_status) {
    mysqli_query($db, "UPDATE paket_tiket SET stok_tersedia = stok_tersedia- 1 WHERE id = '$id_paket' AND stok_tersedia > 0");
    header("Location: ../frontend/admin_transaksi.php");
} else {
    echo "Gagal: " . mysqli_error($db);
}
exit();<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak");
}

include("config.php");

$id = $_GET['id'];

$ambil_data = mysqli_query($db, "SELECT * FROM transaksi WHERE id = '$id'");
$data = mysqli_fetch_array($ambil_data);
$id_paket = $data['id_paket'];

$update_status = mysqli_query($db, "UPDATE transaksi SET status_bayar = 'paid' WHERE id = '$id'");

if ($update_status) {
    mysqli_query($db, "UPDATE paket_tiket SET stok_tersedia = stok_tersedia- 1 WHERE id = '$id_paket' AND stok_tersedia > 0");
    header("Location: ../frontend/admin_tr.php");
} else {
    echo "Gagal: " . mysqli_error($db);
}
exit();
?>
?>