<?php
include("../backend/config.php");
?>
<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Status Transaksi - LUNA</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css"> <!-- GANTI PATH jika style.css bukan di folder yang sama -->

    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                "tertiary-fixed-dim": "#a8cbe8", "inverse-primary": "#d2bbff",
                "surface-container": "#f2ecf3", "surface": "#fef7fe",
                "on-primary-fixed": "#230a4e", "error-container": "#ffdad6",
                "secondary-fixed-dim": "#edb8cc", "surface-container-highest": "#e6e1e7",
                "on-tertiary": "#ffffff", "primary-container": "#cdb4ff",
                "primary": "#685296", "secondary-fixed": "#ffd8e6",
                "on-surface-variant": "#49454f", "on-secondary-fixed": "#301020",
                "tertiary-fixed": "#cae6ff", "error": "#ba1a1a",
                "surface-bright": "#fef7fe", "on-secondary-container": "#7b5163",
                "on-secondary-fixed-variant": "#623b4c", "on-primary": "#ffffff",
                "primary-fixed": "#eaddff", "tertiary-container": "#a2c4e1",
                "tertiary": "#40627b", "surface-container-lowest": "#ffffff",
                "on-primary-container": "#584284", "on-error": "#ffffff",
                "secondary": "#7c5264", "surface-container-low": "#f8f2f8",
                "on-primary-fixed-variant": "#503b7c", "on-error-container": "#93000a",
                "on-tertiary-fixed-variant": "#274a63", "inverse-on-surface": "#f5eff5",
                "outline": "#7a7580", "secondary-container": "#ffc8dd",
                "on-secondary": "#ffffff", "surface-container-high": "#ece6ed",
                "surface-dim": "#ded8df", "inverse-surface": "#322f34",
                "on-surface": "#1d1b1f", "on-background": "#1d1b1f",
                "surface-tint": "#685296", "surface-variant": "#e6e1e7",
                "outline-variant": "#cbc4d1", "on-tertiary-fixed": "#001e2f",
                "on-tertiary-container": "#2f526a", "primary-fixed-dim": "#d2bbff",
                "background": "#fef7fe"
              },
              "borderRadius": {
                "DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"
              },
              "spacing": {
                "lg": "48px", "container-max": "1200px", "xs": "4px",
                "sm": "12px", "base": "8px", "md": "24px", "xl": "80px", "gutter": "24px"
              },
              "fontFamily": {
                "display-lg": ["Plus Jakarta Sans"], "label-sm": ["Inter"],
                "headline-md": ["Plus Jakarta Sans"], "body-lg": ["Inter"],
                "display-lg-mobile": ["Plus Jakarta Sans"], "body-md": ["Inter"]
              },
              "fontSize": {
                "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                "display-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}],
                "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
              }
            }
          }
        }
    </script>
</head>

<body class="text-on-background font-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container min-h-screen flex flex-col">

<nav class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-xl border-b border-white/40 shadow-[0_8px_32px_rgba(205,180,255,0.3)]">
    <div class="flex justify-between items-center px-gutter py-sm max-w-container-max mx-auto">
        <a href="index.php" class="font-display-lg text-display-lg font-bold text-primary tracking-tighter">LUNA</a>
        <div class="flex items-center gap-sm">
            <a href="login.php" class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors hidden md:block">Masuk</a>
            <a href="register.php" class="font-label-sm text-label-sm bg-primary text-on-primary px-md py-sm rounded-full hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm">Daftar</a>
        </div>
    </div>
</nav>

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
            <a href="../backend/cetak_transaksi.php?id=<?= $data['id']; ?>"
               class="ethereal-gradient-btn text-on-primary font-label-sm text-label-sm px-xl py-sm rounded-full text-center shadow-[0_8px_24px_rgba(205,180,255,0.3)] flex items-center gap-xs"> <!-- GANTI PATH -->
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

        <a href="index.php" class="glass-btn-secondary w-full py-sm rounded-full font-label-sm text-label-sm text-primary text-center border-none shadow-sm">
            Kembali ke Beranda
        </a>

    </div>
</div>

<footer class="bg-gradient-to-t from-tertiary-container/20 to-transparent border-t border-white/30 py-md text-center">
    <p class="font-body-md text-body-md text-on-surface-variant opacity-70">© 2026 Promotor Konser LUNA. Hak cipta dilindungi undang-undang.</p>
</footer>

</body>
</html>