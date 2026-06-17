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
    <title>Tambah Konser — LUNA Admin</title>
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
        input, textarea, select {
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
        input:focus, textarea:focus {
            border-color: #685296;
            box-shadow: 0 0 0 3px rgba(104,82,150,0.12);
        }
        textarea { resize: vertical; min-height: 100px; }
    </style>
</head>
<body class="min-h-screen font-sans text-on-surface">

<div class="max-w-xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <p class="text-xs font-semibold tracking-widest text-primary uppercase mb-1">Admin Portal</p>
            <h1 class="font-display text-3xl font-bold text-primary">Tambah Konser</h1>
        </div>
        <a href="admin_kr.php" 
           class="glass-btn-secondary flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-primary">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <div class="glass-card rounded-3xl p-8">
        <!-- # GANTI_PATH action -->
        <form action="../backend/proses_add_konser.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Nama Event</label>
                <input type="text" name="nama_event" placeholder="Contoh: NCT WISH Concert Tour" required>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Tanggal &amp; Waktu</label>
                <input type="datetime-local" name="tanggal_event" required>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Lokasi</label>
                <input type="text" name="lokasi" placeholder="Contoh: Jakarta International Stadium" required>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Deskripsi</label>
                <textarea name="deskripsi" placeholder="Tuliskan deskripsi konser..."></textarea>
            </div>

            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-on-surface-variant uppercase tracking-wider">Poster Konser</label>
                <!-- Upload area klik -->
                <div id="upload-area"
                     onclick="document.getElementById('gambar').click()"
                     class="border-2 border-dashed border-primary/20 rounded-2xl p-8 text-center cursor-pointer hover:border-primary/50 hover:bg-white/20 transition-all">
                    <span class="material-symbols-outlined text-4xl text-primary opacity-40 block mb-2">cloud_upload</span>
                    <p class="text-sm text-on-surface-variant">Klik untuk upload poster</p>
                    <p class="text-xs text-on-surface-variant opacity-60 mt-1">JPG, PNG, WEBP</p>
                </div>
                <input type="file" id="gambar" name="gambar" accept="image/*" required
                       class="hidden" onchange="previewImg(this)">
                <!-- Preview -->
                <div id="preview-wrap" class="hidden mt-2 rounded-2xl overflow-hidden h-48">
                    <img id="preview-img" src="" alt="Preview" class="w-full h-full object-cover">
                </div>
            </div>

            <button type="submit" name="submit"
                    class="ethereal-gradient-btn text-white font-semibold text-sm px-6 py-3 rounded-full flex items-center justify-center gap-2 mt-2">
                <span class="material-symbols-outlined text-[18px]">save</span>
                Simpan Konser
            </button>

        </form>
    </div>

</div>

<script>
function previewImg(input) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('preview-img').src = e.target.result;
        document.getElementById('preview-wrap').classList.remove('hidden');
        document.getElementById('upload-area').classList.add('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}
</script>

</body>
</html>