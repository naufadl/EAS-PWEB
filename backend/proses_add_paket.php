$nama = $_POST['nama_paket'];
$harga = $_POST['harga'];
$stok = $_POST['stok_total'];


mysqli_query($db, "INSERT INTO nama_tabel_paket (nama_paket, harga, stok_total, stok_tersedia) 
                   VALUES ('$nama', '$harga', '$stok', '$stok')");
header("Location: index_paket.php");