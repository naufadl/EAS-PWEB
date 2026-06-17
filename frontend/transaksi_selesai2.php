<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>

<body class="text-on-background font-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container min-h-screen flex flex-col">

<!-- NAV -->
<nav class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-xl border-b border-white/40 shadow-[0_8px_32px_rgba(205,180,255,0.3)]">
    <div class="flex justify-between items-center px-gutter py-sm max-w-container-max mx-auto">
        <a href="index.php" class="font-display-lg text-display-lg font-bold text-primary tracking-tighter">LUNA</a> <!-- GANTI PATH -->
        <div class="flex items-center gap-sm">
            <a href="login.php" class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors hidden md:block">Masuk</a>
            <a href="register.php" class="font-label-sm text-label-sm bg-primary text-on-primary px-md py-sm rounded-full hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm">Daftar</a>
        </div>
    </div>
</nav>

<!-- KONTEN STATUS -->
<div class="flex-1 flex items-center justify-center px-gutter pt-xl pb-lg">
    <div class="glass-card rounded-lg p-md w-full max-w-sm flex flex-col items-center gap-md text-center">

        <?php if ($data['status_bayar'] == 'pending') : ?>
            <span class="material-symbols-outlined text-[64px] text-tertiary" style="font-variation-settings: 'FILL' 1;">schedule</span>
            <div class="flex flex-col gap-xs">
                <h1 class="font-headline-md text-headline-md text-primary">Menunggu Verifikasi</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Transaksimu sedang ditinjau oleh admin. Kami akan segera menghubungimu.</p>
            </div>

        <?php elseif ($data['status_bayar'] == 'paid') : ?>
            <span class="material-symbols-outlined text-[64px] text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
            <div class="flex flex-col gap-xs">
                <h1 class="font-headline-md text-headline-md text-primary">Pembayaran Berhasil!</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Tiketmu sudah siap. Unduh bukti transaksi di bawah ini.</p>
            </div>
            <a href="../backend/cetak_transaksi.php?id=<?= $data['id']; ?>" <!-- GANTI PATH -->
               class="ethereal-gradient-btn text-on-primary font-label-sm text-label-sm px-xl py-sm rounded-full text-center shadow-[0_8px_24px_rgba(205,180,255,0.3)] flex items-center gap-xs">
                <span class="material-symbols-outlined text-[18px]">download</span>
                Download Bukti Transaksi
            </a>

        <?php else : ?>
            <span class="material-symbols-outlined text-[64px] text-error" style="font-variation-settings: 'FILL' 1;">cancel</span>
            <div class="flex flex-col gap-xs">
                <h1 class="font-headline-md text-headline-md text-error">Pembayaran Tidak Valid</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Terjadi masalah dengan pembayaranmu. Silakan hubungi admin.</p>
            </div>
        <?php endif; ?>

        <a href="index.php" class="glass-btn-secondary w-full py-sm rounded-full font-label-sm text-label-sm text-primary text-center border-none shadow-sm"> <!-- GANTI PATH -->
            Kembali ke Beranda
        </a>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-gradient-to-t from-tertiary-container/20 to-transparent border-t border-white/30 py-md text-center">
    <p class="font-body-md text-body-md text-on-surface-variant opacity-70">© 2026 Promotor Konser LUNA. Hak cipta dilindungi undang-undang.</p>
</footer>

</body>
</html>