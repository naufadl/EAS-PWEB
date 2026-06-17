<?php
session_start();
if (!isset($_SESSION['id'])) { header("Location: login.php"); exit(); } // # GANTI_PATH
if ($_SESSION['role'] != 'admin') { header("Location: index.php"); exit(); } // # GANTI_PATH
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket — LUNA Admin</title>
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
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], display: ['Plus Jakarta Sans', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 16px;
            border: 1px solid rgba(203,196,209,0.6);
            background: rgba(255,255,255,0.5);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #1d1b1f;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        input:focus {
            border-color: #685296;
            box-shadow: 0 0 0 3px rgba(104,82,150,0.12);
        }
    </style>
</head>
<body class="min-h-screen font-sans text-on-surface">

<div class="max-w-xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-xs font-semibold tracking-widest text-primary uppercase mb-1">Admin Portal</p>
            <h1 class="font-display text-3xl font-bold text-primary">Tambah Paket</h1>
        </div>
        <!-- # GANTI_PATH — kembali ke halaman paket konser -->
        <a href="admin_index_paket.php?id=<?= htmlspecialchars($_GET['event_id'] ?? '') ?>"
           class="glass-btn-secondary flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-primary">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <div class="glass-card rounded-3xl p-8">
        <!-- # GANTI_PATH action -->
        <form action="../backend/proses_add_paket.php" method="POST" class="flex flex-col gap-5">

            <!-- event_id — jangan diubah -->
            <input type="hidden" name="event_id" value="<?= htmlspecialchars($_GET['event_id'] ?? '') ?>">

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Nama Paket</label>
                <input type="text" name="nama_paket" placeholder="Contoh: Festival, VIP, VVIP" required>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" placeholder="Contoh: 750000" min="0" required
                       oninput="updatePreview(this.value)">
                <p id="harga-preview" class="text-sm font-bold text-primary min-h-[20px]"></p>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Stok Tiket</label>
                <input type="number" name="stok_total" placeholder="Jumlah tiket tersedia" min="1" required>
            </div>

            <button type="submit"
                    class="ethereal-gradient-btn text-white font-semibold text-sm px-6 py-3 rounded-full flex items-center justify-center gap-2 mt-2">
                <span class="material-symbols-outlined text-[18px]">save</span>
                Simpan Paket
            </button>

        </form>
    </div>

</div>

<script>
function updatePreview(val) {
    const el = document.getElementById('harga-preview');
    el.textContent = val && !isNaN(val) ? 'Rp ' + parseInt(val).toLocaleString('id-ID') : '';
}
</script>

</body>
</html>