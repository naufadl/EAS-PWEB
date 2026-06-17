<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: login.php"); exit(); } // # GANTI_PATH
if ($_SESSION['role'] != 'admin') { header("Location: index.php"); exit(); } // # GANTI_PATH
include("../backend/config.php"); // # GANTI_PATH
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi — LUNA Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- # GANTI_PATH -->
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
            <h1 class="font-display text-3xl font-bold text-primary">Data Transaksi</h1>
        </div>
        <a href="admin_kr.php" 
           class="glass-btn-secondary flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-primary">
            <span class="material-symbols-outlined text-[18px]">event</span>
            Kelola Konser
        </a>
    </div>

    <!-- Table -->
    <div class="glass-card rounded-3xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-white/40">
                    <th class="text-left px-6 py-4 text-xs font-semibold tracking-widest text-on-surface-variant uppercase">Bukti</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold tracking-widest text-on-surface-variant uppercase">Kode</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold tracking-widest text-on-surface-variant uppercase">Nama</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold tracking-widest text-on-surface-variant uppercase">Status</th>
                    <th class="text-left px-6 py-4 text-xs font-semibold tracking-widest text-on-surface-variant uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($db, "SELECT * FROM transaksi");
                $ada = false;
                while ($data = mysqli_fetch_array($query)):
                    $ada = true;
                    $s = strtolower($data['status_bayar']);
                    if (str_contains($s,'pending') || str_contains($s,'belum')) {
                        $badge = 'bg-error-container text-on-error-container';
                    } elseif (str_contains($s,'sukses') || str_contains($s,'acc') || str_contains($s,'berhasil')) {
                        $badge = 'bg-[#d3f3df] text-[#1b7a3a]';
                    } else {
                        $badge = 'bg-surface-variant text-on-surface-variant';
                    }
                ?>
                <tr class="border-b border-white/30 hover:bg-white/30 transition-colors">
                    <td class="px-6 py-4">
                        <!-- # GANTI_PATH uploads -->
                        <img src="../uploads/<?= htmlspecialchars($data['foto']) ?>"
                             class="w-14 h-14 object-cover rounded-xl" alt="Bukti">
                    </td>
                    <td class="px-6 py-4 font-semibold text-primary">
                        #TRX-<?= str_pad($data['id'], 4, "0", STR_PAD_LEFT) ?>
                    </td>
                    <td class="px-6 py-4"><?= htmlspecialchars($data['nama']) ?></td>
                    <td class="px-6 py-4">
                        <span class="<?= $badge ?> text-xs font-bold px-3 py-1 rounded-full capitalize">
                            <?= htmlspecialchars($data['status_bayar']) ?>
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2 flex-wrap">
                            <!-- # GANTI_PATH backend -->
                            <a href="../backend/acc_transaksi.php?id=<?= $data['id'] ?>"
                               class="ethereal-gradient-btn text-white text-xs font-semibold px-4 py-2 rounded-full flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">check_circle</span> ACC
                            </a>
                            <a href="../backend/reject_transaksi.php?id=<?= $data['id'] ?>"
                               class="bg-error-container text-on-error-container text-xs font-semibold px-4 py-2 rounded-full flex items-center gap-1 hover:opacity-80 transition-opacity">
                                <span class="material-symbols-outlined text-[14px]">cancel</span> Reject
                            </a>
                            <a href="../backend/proses_hapus.php?id=<?= $data['id'] ?>"
                               onclick="return confirm('Yakin hapus transaksi ini?')"
                               class="glass-btn-secondary text-xs font-semibold px-4 py-2 rounded-full flex items-center gap-1 text-on-surface-variant">
                                <span class="material-symbols-outlined text-[14px]">delete</span> Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php if (!$ada): ?>
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-5xl opacity-30 block mb-3">inbox</span>
                        Belum ada transaksi masuk.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>