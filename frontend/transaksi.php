<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
    <h2>Form Tambah Transaksi</h2>
    <form method="post" action="../backend/proses_transaksi.php" enctype="multipart/form-data">
        <table cellpadding="8">
            <tr>
                <td>Kode Transaksi</td>
                <td><input type="text" name="kode_transaksi" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" maxlength="16"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="1">Laki-laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><input type="text" name="nomor_hp"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Status Bayar</td>
                <td>
                    <select name="status_bayar">
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="failed">Failed</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Expired At</td>
                <td><input type="datetime-local" name="expired_at"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="simpan" value="Simpan Data"></td>
            </tr>
        </table>
    </form>
</body>
</html>