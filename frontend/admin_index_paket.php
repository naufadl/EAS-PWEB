<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

require_once '../backend/config.php';

if (!isset($_GET['id'])) {
    die("ID Event tidak ditemukan!");
}

$event_id = $_GET['id']; 

$result_event = mysqli_query($db, "SELECT * FROM events WHERE id = '$event_id'");
$event = mysqli_fetch_assoc($result_event);

$query_tiket = mysqli_query($db, "SELECT * FROM paket_tiket WHERE event_id = '$event_id'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Kelola Paket - <?= htmlspecialchars($event['nama_event']); ?></title>
</head>
<body>

    <h1>Kelola Paket: <?= htmlspecialchars($event['nama_event']); ?></h1>

    <div class="paket-container">
        <?php while ($tiket = mysqli_fetch_assoc($query_tiket)) : ?>
            <div class="card-paket">
                <h3><?= htmlspecialchars($tiket['nama_paket']); ?></h3>
                <p>Harga: Rp <?= number_format($tiket['harga'], 0, ',', '.'); ?></p>
                <p>Stok: <?= $tiket['stok_tersedia']; ?> / <?= $tiket['stok_total']; ?></p>
                <button>Edit Detail</button>
                <button>Ubah Kuota</button>
            </div>
        <?php endwhile; ?>
    </div>

    <a href="admin_add_paket.php?event_id=<?= $event_id; ?>" class="btn-tombol">+</a>

</body>
</html>