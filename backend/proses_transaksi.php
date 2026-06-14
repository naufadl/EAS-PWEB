<?php
include("config.php"); 

if(isset($_POST['simpan'])){
    $kode = $_POST['kode_transaksi'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jk = $_POST['jenis_kelamin'];
    $hp = $_POST['nomor_hp'];
    $email = $_POST['email'];
    $status = $_POST['status_bayar'];
    $expired = $_POST['expired_at'];

    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($tmp_foto, "../uploads/" . $nama_foto);
    $sql = "INSERT INTO transaksi (kode_transaksi, nama, nik, jenis_kelamin, nomor_hp, email, status_bayar, expired_at, foto) 
            VALUES ('$kode', '$nama', '$nik', '$jk', '$hp', '$email', '$status', '$expired', '$nama_foto')";
    
    $query = mysqli_query($db, $sql);

    // Jika berhasil, arahkan ke halaman daftar data (index.php)
    if($query){
        header('Location: ../frontend/index.php');
    } else {
        echo "Gagal menyimpan!";
    }
}
?>