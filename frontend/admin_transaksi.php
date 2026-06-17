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

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Transaksi</h1>

    <a href="admin_konser.php" class="btn-tombol">Kelola konser</a>

    <table border="1" width="100%">
        <tr>
            <th>Foto</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Status</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php
        
        include("../backend/config.php");
    

        $query = mysqli_query($db, "SELECT * FROM transaksi");

        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td><img src='../uploads/".$data['foto']."' width='100'></td>";
            echo "<td>#TRX-" . str_pad($data['id'], 4, "0", STR_PAD_LEFT) . "</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['status_bayar']."</td>";
            echo "<td>
            <a href='../backend/acc_transaksi.php?id=".$data['id']."'
            class='ACC-tombol'>
            ACC
            </a>
            </td>";
            echo "<td>
            <a href='../backend/reject_transaksi.php?id=".$data['id']."'
            class='RJT-tombol'>
            Reject
            </a>
            </td>";
            echo "<td><a href='../backend/proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
            echo "</tr>";}

        ?>
    </table>
</body>
</html>