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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Kelola Event</title>
</head>
<body>

<div class="event-container">
    <?php
    $query = mysqli_query($db, "SELECT * FROM daftar_konser");

    while ($row = mysqli_fetch_assoc($query)) :
        $status = ($row['tanggal_event'] >= date('Y-m-d')) ? 'Aktif' : 'Selesai';
    ?>
        <div class="card" onclick="window.location.href='admin_index_paket.php?id=<?= $row['id']; ?>';" style="cursor: pointer;">
            <h3><?= htmlspecialchars($row['nama_event']); ?></h3>
            <p>📅 <?= date('d M Y', strtotime($row['tanggal_event'])); ?></p>
            <p>📍 <?= htmlspecialchars($row['lokasi']); ?></p>
        </div>
    <?php endwhile; ?>
</div>

<a href="admin_add_konser.php" class="btn-tombol">'+'</a>

</body>
</html>