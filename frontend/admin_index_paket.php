<?php
include("../backend/config.php"); 
?>
<table border="1" width="100%">
    <tr>
        <th>Nama Paket</th>
        <th>Harga</th>
        <th>Stok Tersedia</th>
        <th>Aksi</th>
    </tr>
    <?php
    $query = mysqli_query($db, "SELECT * FROM paket_tiket");
    while($data = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<td>" . $data['nama_paket'] . "</td>";
        echo "<td>" . $data['harga'] . "</td>";
        echo "<td>" . $data['stok_tersedia'] . "</td>";
        echo "<td>
                <a href='edit_paket.php?id=".$data['id']."'>Edit</a> | 
                <a href='hapus_paket.php?id=".$data['id']."'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>