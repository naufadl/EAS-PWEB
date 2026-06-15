<?php
include("config.php"); 

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jk = $_POST['jenis_kelamin'];
    $hp = $_POST['nomor_hp'];
    $email = $_POST['email'];
    $status = $_POST['status_bayar'];
    

    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($tmp_foto, "../uploads/" . $nama_foto);
    $sql = "INSERT INTO transaksi ( nama, nik, jenis_kelamin, nomor_hp, email, status_bayar, foto) 
            VALUES ( '$nama', '$nik', '$jk', '$hp', '$email', 'Pending', '$nama_foto')";
    
    $query = mysqli_query($db, $sql);

    
    if($query){
        header('Location: ../frontend/index.php');
    } else {
        echo "Gagal menyimpan!";
    }
}
?>