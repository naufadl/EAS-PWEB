<?php
require_once 'config.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_event'];
    $tgl  = $_POST['tanggal_event'];
    $lok  = $_POST['lokasi'];
    $desk = $_POST['deskripsi'];

    $sql = "INSERT INTO events (nama_event, tanggal_event, lokasi, deskripsi) 
            VALUES ('$nama', '$tgl', '$lok', '$desk')";
    
    $query = mysqli_query($db, $sql);

    if ($query) {
        header("Location: ../frontend/admin_konser.php?status=sukses");
    } else {
        echo "Gagal menyimpan: " . mysqli_error($db);
    }
}
?>