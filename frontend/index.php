<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Transaksi</title>
</head>
<body>
    <h1>Data Transaksi</h1>
    <a href="proses_transaksi.php">Tambah Data</a><br><br>
    
    <table border="1" width="100%">
        <tr>
            <th>Foto</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Status</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php
        
        include("../backend/config.php");

        $query = mysqli_query($db, "SELECT * FROM transaksi");

        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td><img src='../uploads/".$data['foto']."' width='100'></td>";
            echo "<td>".$data['kode_transaksi']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['status_bayar']."</td>";
            echo "<td><a href='edit_transaksi.php?id=".$data['id']."'>Ubah</a></td>";
            echo "<td><a href='../backend/proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
            echo "</tr>";}

        ?>
    </table>
</body>
</html>