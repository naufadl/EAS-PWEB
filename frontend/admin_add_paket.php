<form action="../backend/proses_add_paket.php" method="POST">
    <input type="hidden" name="event_id" value="<?= $_GET['event_id']; ?>"> <br>
    <input type="text" name="nama_paket" placeholder="Nama Paket"><br>
    <input type="number" name="harga" placeholder="Harga"><br>
    <input type="number" name="stok_total" placeholder="Stok"><br>
    
    <button type="submit">Simpan Paket</button>
</form>