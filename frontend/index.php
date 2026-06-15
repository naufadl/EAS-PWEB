<?php
include("../backend/config.php");
$query = mysqli_query($db, "SELECT * FROM events ORDER BY tanggal_event ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="hero">
        <h1>Malam Nebula: Aurora</h1>
        <p>Benamkan diri Anda dalam perjalanan audiovisual...</p>
        <a href="konser.php?id=1" class="btn">Jelajahi Konser</a>
    </section>

    <h2>Konser Mendatang</h2>
    <div class="konser-container">
        <?php while($data = mysqli_fetch_array($query)) { ?>
            <div class="card-konser">
                <img src="uploads/<?= $data['gambar']; ?>" alt="Poster">
                <h3><?= $data['nama_event']; ?></h3>

                <div class="info">
                    <span><?= $data['tanggal_event']; ?></span>
                    <span><?= $data['lokasi']; ?></span>
                </div>
                <a href="konser.php?id=<?= $data['id']; ?>">Lihat Detail</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>