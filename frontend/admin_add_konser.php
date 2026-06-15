<form action="../backend/prosess_add_konser.php" method="POST">
    nama:<input type="text" name="nama_event" placeholder="Nama Event" required><br>
    tanggal:<input type="datetime-local" name="tanggal_event" required><br>
    lokasi:<input type="text" name="lokasi" placeholder="Lokasi" required><br>
    deskripsi:<textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
    <button type="submit" name="submit">Simpan Event</button>
</form>