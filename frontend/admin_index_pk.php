<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: login.php"); exit(); } // # GANTI_PATH
if ($_SESSION['role'] != 'admin') { header("Location: index.php"); exit(); } // # GANTI_PATH
require_once '../backend/config.php'; // # GANTI_PATH

if (!isset($_GET['id'])) die("ID Event tidak ditemukan!");
$event_id = $_GET['id'];

$result_event = mysqli_query($db, "SELECT * FROM daftar_konser WHERE id = '$event_id'");
$event        = mysqli_fetch_assoc($result_event);
$query_tiket  = mysqli_query($db, "SELECT * FROM paket_tiket WHERE id_event = '$id'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket — <?= htmlspecialchars($event['nama_event']) ?> — LUNA Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#685296', 'primary-container': '#cdb4ff', 'on-primary-container': '#584284',
                        surface: '#fef7fe', 'surface-container': '#f2ecf3', 'surface-variant': '#e6e1e7',
                        'on-surface': '#1d1b1f', 'on-surface-variant': '#49454f', 'outline-variant': '#cbc4d1',
                        error: '#ba1a1a', 'error-container': '#ffdad6', 'on-error-container': '#93000a',
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], display: ['Plus Jakarta Sans', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen font-sans text-on-surface">

<div class="max-w-5xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="flex items-start justify-between mb-8 gap-4">
        <div>
            <p class="text-xs font-semibold tracking-widest text-primary uppercase mb-1">Kelola Paket Tiket</p>
            <h1 class="font-display text-3xl font-bold text-primary leading-tight">
                <?= htmlspecialchars($event['nama_event']) ?>
            </h1>
            <p class="text-sm text-on-surface-variant mt-2 flex items-center gap-3">
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[15px]">calendar_today</span>
                    <?= date('d M Y', strtotime($event['tanggal_event'])) ?>
                </span>
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[15px]">location_on</span>
                    <?= htmlspecialchars($event['lokasi']) ?>
                </span>
            </p>
        </div>
        <a href="admin_kr.php" 
           class="glass-btn-secondary flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-primary whitespace-nowrap">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            Kembali
        </a>
    </div>

    <!-- Grid paket -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $ada = false;
        while ($tiket = mysqli_fetch_assoc($query_tiket)):
            $ada = true;
            $terjual = $tiket['stok_total'] - $tiket['stok_tersedia'];
            $pct = $tiket['stok_total'] > 0 ? round(($tiket['stok_tersedia'] / $tiket['stok_total']) * 100) : 0;
        ?>
        <div class="glass-card rounded-3xl p-6 flex flex-col gap-4">
            <div class="flex justify-between items-start">
                <h3 class="font-display text-lg font-bold text-primary"><?= htmlspecialchars($tiket['nama_paket']) ?></h3>
                <span class="text-xl font-bold text-primary">
                    Rp <?= number_format($tiket['harga'], 0, ',', '.') ?>
                </span>
            </div>

            <!-- Progress bar stok -->
            <div>
                <div class="flex justify-between text-xs text-on-surface-variant mb-1.5">
                    <span>Stok tersisa</span>
                    <span class="font-semibold"><?= $tiket['stok_tersedia'] ?> / <?= $tiket['stok_total'] ?></span>
                </div>
                <div class="h-1.5 rounded-full bg-surface-variant overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-[#cdb4ff] to-[#685296] transition-all"
                         style="width:<?= $pct ?>%"></div>
                </div>
                <div class="flex justify-between text-xs text-on-surface-variant mt-1 opacity-70">
                    <span><?= $terjual ?> terjual</span>
                    <span><?= $pct ?>% tersisa</span>
                </div>
            </div>

            <div class="flex gap-2 mt-auto pt-2 border-t border-white/40">
                <a href="../backend/hapus_paket.php?id=<?= $tiket['id'] ?>&event_id=<?= $event_id ?>"
                    onclick="return confirm('Yakin hapus paket ini?')"
                    class="glass-btn-secondary flex-1 py-2 rounded-full text-xs font-semibold text-error flex items-center justify-center gap-1 hover:opacity-80 transition-opacity">
                        <span class="material-symbols-outlined text-[14px]">delete</span> Hapus
                </a>
            </div>
        </div>
        <?php endwhile; ?>

        <?php if (!$ada): ?>
        <div class="col-span-full text-center py-20 text-on-surface-variant">
            <span class="material-symbols-outlined text-5xl opacity-30 block mb-3">local_activity</span>
            Belum ada paket tiket. Tambah paket baru!
        </div>
        <?php endif; ?>
    </div>

</div>

<!-- FAB tambah paket -->
<a href="admin_add_pk.php?event_id=<?= $event_id ?>" 
   class="ethereal-gradient-btn fixed bottom-8 right-8 w-14 h-14 rounded-full flex items-center justify-center shadow-[0_8px_24px_rgba(205,180,255,0.5)] hover:scale-105 transition-transform">
    <span class="material-symbols-outlined text-white text-[28px]">add</span>
</a>

</body>
</html>