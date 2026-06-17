

if ($data['status_bayar'] == 'pending') {
    echo "Menunggu verifikasi admin";
}
elseif ($data['status_bayar'] == 'paid') {
    echo "<a href='../backend/cetak_transaksi.php?id=".$data['id']."'>
            Download Bukti Transaksi
          </a>";
}
else {
    echo "Pembayaran tidak valid";
}