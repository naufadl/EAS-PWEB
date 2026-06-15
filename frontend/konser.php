<?php
require_once '../backend/config.php';


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$event_id = $_GET['id'];
//data konser
$query_event = mysqli_query($db, "SELECT * FROM events WHERE id = '$event_id'");
$event = mysqli_fetch_assoc($query_event);

//data paket tiket
$query_paket = mysqli_query($db, "SELECT * FROM paket_tiket WHERE event_id = '$event_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title><?= htmlspecialchars($event['nama_event']); ?></title>
</head>
<body>

    <div class="banner-header">
        <img src="../uploads/<?= $event['gambar']; ?>" alt="Poster">
        <div class="banner-overlay">
            <h1><?= htmlspecialchars($event['nama_event']); ?></h1>
            <p><?= htmlspecialchars($event['lokasi']); ?> • <?= date('d M Y', strtotime($event['tanggal_event'])); ?></p>
        </div>
    </div>

    <div class="container-detail">
        <section class="info-acara">
            <h2>Tentang Acara</h2>
            <p><?= nl2br(htmlspecialchars($event['deskripsi'])); ?></p>
            
            <h3>Peraturan & Persyaratan</h3>
            <ul>
                <li>Wajib membawa kartu identitas (KTP/ID fisik).</li>
                <li>Dilarang membawa kamera profesional.</li>
                <li>Kebijakan tas transparan diterapkan.</li>
            </ul>
        </section>

        <section class="pilihan-tiket">
            <h2>Pilihan Tiket</h2>
            <div class="paket-container">
                <?php while ($tiket = mysqli_fetch_assoc($query_paket)) : ?>
                    <div class="card-paket">
                        <h3><?= htmlspecialchars($tiket['nama_paket']); ?></h3>
                        <p class="harga">Rp <?= number_format($tiket['harga'], 0, ',', '.'); ?></p>
                        <p>Tersisa: <?= $tiket['stok_tersedia']; ?> tiket</p>
                        
                        <?php if ($tiket['stok_tersedia'] > 0) : ?>
                            <a href="form_transaksi.php?id_paket=<?= $tiket['id']; ?>" class="btn-pesan">Pesan Tiket</a>
                        <?php else : ?>
                            <button class="btn-disabled" disabled>Habis Terjual</button>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
</body>
</html>