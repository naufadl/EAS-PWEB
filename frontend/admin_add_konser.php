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
?>

<form action="../backend/proses_add_konser.php" method="POST" enctype="multipart/form-data">
    Nama Event: <input type="text" name="nama_event" placeholder="Nama Event" required><br>
    Tanggal: <input type="datetime-local" name="tanggal_event" required><br>
    Lokasi: <input type="text" name="lokasi" placeholder="Lokasi" required><br>
    Deskripsi: <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
    Poster: <input type="file" name="gambar" accept="image/*" required><br>
    
    <button type="submit" name="submit">Simpan Event</button>
</form>