<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: login.php"); exit(); } // # GANTI_PATH
if ($_SESSION['role'] != 'admin') { header("Location: index.php"); exit(); } // # GANTI_PATH
require_once '../backend/config.php'; // # GANTI_PATH
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Konser — LUNA Admin</title>
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
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-xs font-semibold tracking-widest text-primary uppercase mb-1">Admin Portal</p>
            <h1 class="font-display text-3xl font-bold text-primary">Data Konser</h1>
        </div>
        <a href="admin_tr.php" 
           class="glass-btn-secondary flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-primary">
            <span class="material-symbols-outlined text-[18px]">payments</span>
            Data Transaksi
        </a>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $query = mysqli_query($db, "SELECT * FROM daftar_konser ORDER BY tanggal_event ASC");
        $ada = false;
        while ($row = mysqli_fetch_assoc($query)):
            $ada = true;
            $aktif = ($row['tanggal_event'] >= date('Y-m-d'));
        ?>
        <!-- klik card → halaman paket -->
        <div class="glass-card rounded-3xl overflow-hidden flex flex-col group cursor-pointer hover:-translate-y-1 transition-transform duration-300"
             onclick="window.location.href='admin_index_pk.php?id=<?= $row['id'] ?>'"> 
            <div class="p-6 flex flex-col gap-3 flex-grow">
                <div class="flex justify-between items-start">
                    <span class="text-xs font-bold px-3 py-1 rounded-full <?= $aktif ? 'bg-[#d3f3df] text-[#1b7a3a]' : 'bg-surface-variant text-on-surface-variant' ?>">
                        <?= $aktif ? 'Aktif' : 'Selesai' ?>
                    </span>
                    <!-- # GANTI_PATH backend delete -->
                    <a href="../backend/delete_konser.php?id=<?= $row['id'] ?>"
                       onclick="event.stopPropagation(); return confirm('Yakin hapus konser ini?')"
                       class="text-on-surface-variant hover:text-error transition-colors flex items-center gap-1 text-xs font-semibold">
                        <span class="material-symbols-outlined text-[16px]">delete</span>
                    </a>
                </div>

                <h3 class="font-display text-lg font-bold text-primary leading-snug">
                    <?= htmlspecialchars($row['nama_event']) ?>
                </h3>

                <div class="flex flex-col gap-1.5 text-sm text-on-surface-variant">
                    <span class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                        <?= date('d M Y', strtotime($row['tanggal_event'])) ?>
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px]">location_on</span>
                        <?= htmlspecialchars($row['lokasi']) ?>
                    </span>
                </div>

                <div class="mt-auto pt-4 border-t border-white/40 flex items-center gap-1 text-xs font-semibold text-primary">
                    <span class="material-symbols-outlined text-[15px]">local_activity</span>
                    Kelola Paket →
                </div>
            </div>
        </div>
        <?php endwhile; ?>

        <?php if (!$ada): ?>
        <div class="col-span-full text-center py-20 text-on-surface-variant">
            <span class="material-symbols-outlined text-5xl opacity-30 block mb-3">event_busy</span>
            Belum ada konser.
        </div>
        <?php endif; ?>
    </div>

</div>

<!-- FAB tambah konser -->
<a href="admin_add_kr.php" 
   class="ethereal-gradient-btn fixed bottom-8 right-8 w-14 h-14 rounded-full flex items-center justify-center shadow-[0_8px_24px_rgba(205,180,255,0.5)] hover:scale-105 transition-transform">
    <span class="material-symbols-outlined text-white text-[28px]">add</span>
</a>

</body>
</html>