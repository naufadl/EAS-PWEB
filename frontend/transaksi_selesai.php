if ($data['status_bayar'] == 'Pending') {
    echo "Menunggu verifikasi admin";
}
elseif ($data['status_bayar'] == 'Lunas') {
    echo "<a href='../backend/cetak_transaksi.php?id=".$data['id']."'>
            Download Bukti Transaksi
          </a>";
}
else {
    echo "Pembayaran tidak valid";
}