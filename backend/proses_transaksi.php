<?php
include("config.php"); 

if(isset($_POST['simpan'])){
    $id_paket = $_POST['id_paket'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jk = $_POST['jenis_kelamin'];
    $hp = $_POST['nomor_hp'];
    $email = $_POST['email'];
    $status = $_POST['status_bayar'];

    $query_paket = mysqli_query($db, "SELECT harga FROM paket_tiket WHERE id = '$id_paket'");
    $data_paket  = mysqli_fetch_assoc($query_paket);
    $harga       = $data_paket['harga'];

    $query_last = mysqli_query($db, "SELECT kode_transaksi FROM transaksi ORDER BY id DESC LIMIT 1");
    $last = mysqli_fetch_assoc($query_last);
    $last_num = $last ? (int)substr($last['kode_transaksi'], 3) : 0;
    $kode_transaksi = "TRX" . str_pad($last_num + 1, 3, "0", STR_PAD_LEFT);
    

    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($tmp_foto, "../uploads/" . $nama_foto);
    $sql = "INSERT INTO transaksi (id_paket, kode_transaksi, nama, harga, nik, jenis_kelamin, nomor_hp, email, status_bayar, foto) 
            VALUES ('$id_paket', '$kode_transaksi', '$nama', '$harga', '$nik', '$jk', '$hp', '$email', 'Pending', '$nama_foto')";
            
    $query = mysqli_query($db, $sql);

    
    if($query){

        $id_transaksi = mysqli_insert_id($db);
        header("Location: cetak_transaksi.php?id=".$id_transaksi);
        exit();
        
    } else {
        echo "Gagal menyimpan!";
    }
}
?>