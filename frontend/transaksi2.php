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

<div class="flex-1 flex items-center justify-center px-gutter pt-xl pb-lg">
    <div class="glass-card rounded-lg p-md w-full max-w-lg flex flex-col gap-md">
        <div class="flex flex-col gap-xs">
            <div class="inline-block px-sm py-xs rounded-full bg-primary-container/30 text-on-primary-container font-label-sm text-label-sm w-max border border-white/50">
                ✨ Pemesanan Tiket
            </div>
            <h1 class="font-display-lg-mobile text-display-lg-mobile text-primary font-bold">Data Pemesan</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Lengkapi data diri untuk melanjutkan pemesanan.</p>
        </div>

        <form method="post" action="../backend/proses_transaksi.php" enctype="multipart/form-data" class="flex flex-col gap-sm"> <!-- GANTI PATH -->
            <input type="hidden" name="id_paket" value="<?= $_GET['id_paket']; ?>">

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Nama Lengkap</label>
                <input type="text" name="nama" required placeholder="Masukkan nama lengkap"
                       class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 transition">
            </div>

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">NIK</label>
                <input type="text" name="nik" maxlength="16" placeholder="16 digit NIK"
                       class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 transition">
            </div>

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                        class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/40 transition appearance-none">
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                </select>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Nomor HP</label>
                <input type="text" name="nomor_hp" placeholder="08xxxxxxxxxx"
                       class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 transition">
            </div>

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Email</label>
                <input type="email" name="email" placeholder="email@kamu.com"
                       class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 transition">
            </div>

            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Foto</label>
                <div class="w-full bg-surface-container border border-outline-variant rounded-lg px-md py-sm">
                    <input type="file" name="foto"
                           class="w-full font-body-md text-body-md text-on-surface-variant file:mr-sm file:py-xs file:px-sm file:rounded-full file:border-0 file:font-label-sm file:text-label-sm file:bg-primary-container file:text-on-primary-container hover:file:bg-primary hover:file:text-on-primary file:transition file:cursor-pointer">
                </div>
            </div>

            <button type="submit" name="simpan"
                    class="ethereal-gradient-btn text-on-primary font-label-sm text-label-sm py-sm rounded-full text-center shadow-[0_8px_24px_rgba(205,180,255,0.3)] mt-xs">
                Simpan &amp; Lanjutkan
            </button>
        </form>
    </div>
</div>

<footer class="bg-gradient-to-t from-tertiary-container/20 to-transparent border-t border-white/30 py-md text-center">
    <p class="font-body-md text-body-md text-on-surface-variant opacity-70">© 2026 Promotor Konser LUNA. Hak cipta dilindungi undang-undang.</p>
</footer>
</body>
</html>