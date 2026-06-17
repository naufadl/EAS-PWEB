<?php
require_once '../backend/config.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$event_id = $_GET['id'];
//data konser
$query_event = mysqli_query($db, "SELECT * FROM daftar_konser WHERE id = '$event_id'");
$event = mysqli_fetch_assoc($query_event);

//data paket tiket
$query_paket = mysqli_query($db, "SELECT * FROM paket_tiket WHERE id_event = '$event_id'");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?= htmlspecialchars($event['nama_event']); ?></title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <link rel="stylesheet" href="style.css">

    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "tertiary-fixed-dim": "#a8cbe8",
                      "inverse-primary": "#d2bbff",
                      "surface-container": "#f2ecf3",
                      "surface": "#fef7fe",
                      "on-primary-fixed": "#230a4e",
                      "error-container": "#ffdad6",
                      "secondary-fixed-dim": "#edb8cc",
                      "surface-container-highest": "#e6e1e7",
                      "on-tertiary": "#ffffff",
                      "primary-container": "#cdb4ff",
                      "primary": "#685296",
                      "secondary-fixed": "#ffd8e6",
                      "on-surface-variant": "#49454f",
                      "on-secondary-fixed": "#301020",
                      "tertiary-fixed": "#cae6ff",
                      "error": "#ba1a1a",
                      "surface-bright": "#fef7fe",
                      "on-secondary-container": "#7b5163",
                      "on-secondary-fixed-variant": "#623b4c",
                      "on-primary": "#ffffff",
                      "primary-fixed": "#eaddff",
                      "tertiary-container": "#a2c4e1",
                      "tertiary": "#40627b",
                      "surface-container-lowest": "#ffffff",
                      "on-primary-container": "#584284",
                      "on-error": "#ffffff",
                      "secondary": "#7c5264",
                      "surface-container-low": "#f8f2f8",
                      "on-primary-fixed-variant": "#503b7c",
                      "on-error-container": "#93000a",
                      "on-tertiary-fixed-variant": "#274a63",
                      "inverse-on-surface": "#f5eff5",
                      "outline": "#7a7580",
                      "secondary-container": "#ffc8dd",
                      "on-secondary": "#ffffff",
                      "surface-container-high": "#ece6ed",
                      "surface-dim": "#ded8df",
                      "inverse-surface": "#322f34",
                      "on-surface": "#1d1b1f",
                      "on-background": "#1d1b1f",
                      "surface-tint": "#685296",
                      "surface-variant": "#e6e1e7",
                      "outline-variant": "#cbc4d1",
                      "on-tertiary-fixed": "#001e2f",
                      "on-tertiary-container": "#2f526a",
                      "primary-fixed-dim": "#d2bbff",
                      "background": "#fef7fe"
              },
              "borderRadius": {
                      "DEFAULT": "1rem",
                      "lg": "2rem",
                      "xl": "3rem",
                      "full": "9999px"
              },
              "spacing": {
                      "lg": "48px",
                      "container-max": "1200px",
                      "xs": "4px",
                      "sm": "12px",
                      "base": "8px",
                      "md": "24px",
                      "xl": "80px",
                      "gutter": "24px"
              },
              "fontFamily": {
                      "display-lg": ["Plus Jakarta Sans"],
                      "label-sm": ["Inter"],
                      "headline-md": ["Plus Jakarta Sans"],
                      "body-lg": ["Inter"],
                      "display-lg-mobile": ["Plus Jakarta Sans"],
                      "body-md": ["Inter"]
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

<body class="text-on-background font-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container">

    <nav class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-xl border-b border-white/40 shadow-[0_8px_32px_rgba(205,180,255,0.3)]">
        <div class="flex justify-between items-center px-gutter py-sm max-w-container-max mx-auto">
            <a href="index.php" class="font-display-lg text-display-lg font-bold text-primary tracking-tighter">LUNA</a> <!-- GANTI PATH jika index.php bukan di root yang sama -->
            <div class="flex items-center gap-sm">
                <a href="login.php" class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-colors hidden md:block">Masuk</a>
                <a href="register.php" class="font-label-sm text-label-sm bg-primary text-on-primary px-md py-sm rounded-full hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm">Daftar</a>
            </div>
        </div>
    </nav>

    <div class="relative h-[50vh] md:h-[60vh] flex items-end pt-xl overflow-hidden">
        <img src="../uploads/<?= $event['gambar']; ?>" alt="Poster <?= htmlspecialchars($event['nama_event']); ?>"
            class="absolute inset-0 w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/40 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary/30 to-transparent"></div>

        <div class="relative z-10 max-w-container-max mx-auto px-gutter pb-xl w-full">
            <div class="inline-block px-sm py-xs rounded-full bg-white/20 text-white font-label-sm text-label-sm mb-sm border border-white/30 backdrop-blur-sm">
                ✨ Live Event
            </div>
            <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-xs line-clamp-2">
                <?= htmlspecialchars($event['nama_event']); ?>
            </h1>
            <p class="font-body-lg text-body-lg text-white/80">
                <?= htmlspecialchars($event['lokasi']); ?> &nbsp;•&nbsp; <?= date('d M Y', strtotime($event['tanggal_event'])); ?>
            </p>
        </div>
    </div>

    <div class="max-w-container-max mx-auto px-gutter py-xl grid grid-cols-1 lg:grid-cols-3 gap-xl relative z-10">

        <!-- Tentang Acara -->
        <section class="lg:col-span-2 flex flex-col gap-md">
            <div class="glass-card rounded-lg p-md flex flex-col gap-sm">
                <h2 class="font-headline-md text-headline-md text-primary">Tentang Acara</h2>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    <?= nl2br(htmlspecialchars($event['deskripsi'])); ?>
                </p>
            </div>

            <div class="glass-card rounded-lg p-md flex flex-col gap-sm">
                <h3 class="font-headline-md text-headline-md text-primary">Peraturan &amp; Persyaratan</h3>
                <ul class="flex flex-col gap-xs">
                    <li class="flex items-start gap-xs font-body-md text-body-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-primary mt-[2px] text-[18px]">check_circle</span>
                        Wajib membawa kartu identitas (KTP/ID fisik).
                    </li>
                    <li class="flex items-start gap-xs font-body-md text-body-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-primary mt-[2px] text-[18px]">check_circle</span>
                        Dilarang membawa kamera profesional.
                    </li>
                    <li class="flex items-start gap-xs font-body-md text-body-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-primary mt-[2px] text-[18px]">check_circle</span>
                        Kebijakan tas transparan diterapkan.
                    </li>
                </ul>
            </div>
        </section>

    <!-- Pilihan Tiket -->
    <section class="flex flex-col gap-sm">
        <h2 class="font-headline-md text-headline-md text-primary">Pilihan Tiket</h2>

        <?php while ($tiket = mysqli_fetch_assoc($query_paket)) : ?>
            <div class="glass-card rounded-lg p-md flex flex-col gap-sm hover:-translate-y-1 transition-transform duration-300">
                <h3 class="font-headline-md text-headline-md text-on-surface"><?= htmlspecialchars($tiket['nama_paket']); ?></h3>
                <p class="font-display-lg-mobile text-display-lg-mobile text-primary font-bold">
                    Rp <?= number_format($tiket['harga'], 0, ',', '.'); ?>
                </p>
                <p class="font-label-sm text-label-sm text-on-surface-variant">
                    Tersisa: <span class="text-secondary font-semibold"><?= $tiket['stok_tersedia']; ?> tiket</span>
                </p>

                <?php if ($tiket['stok_tersedia'] > 0) : ?>
                    <a href="transaksi.php?id_paket=<?= $tiket['id']; ?>" 
                       class="ethereal-gradient-btn text-on-primary font-label-sm text-label-sm py-sm rounded-full text-center shadow-[0_8px_24px_rgba(205,180,255,0.3)] mt-sm">
                        Pesan Tiket
                    </a>
                <?php else : ?>
                    <button disabled
                            class="w-full py-sm rounded-full font-label-sm text-label-sm text-on-surface-variant bg-surface-container cursor-not-allowed mt-sm border border-outline-variant/40">
                        Habis Terjual
                    </button>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </section>

</div>

    <footer class="w-full mt-xl bg-surface-container-low dark:bg-surface-container-highest bg-gradient-to-t from-tertiary-container/20 to-transparent">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-gutter py-xl max-w-container-max mx-auto text-left relative z-10">
            <div class="flex flex-col gap-sm">
                <span class="font-display-lg-mobile text-display-lg-mobile font-bold text-primary">LUNA</span>
                <p class="font-body-md text-body-md text-on-surface-variant dark:text-outline-variant max-w-[250px]">
                    Kami promotor konser.
                </p>
            </div>
            <div class="flex flex-col gap-sm">
                <h4 class="font-label-sm text-label-sm text-primary dark:text-primary-fixed font-semibold">Jelajahi</h4>
                <a class="font-body-md text-body-md text-on-surface-variant dark:text-outline-variant hover:text-primary transition-colors" href="index.php">Konser</a>
            </div>
            <div class="flex flex-col gap-sm">
                <h4 class="font-label-sm text-label-sm text-primary dark:text-primary-fixed font-semibold">Dukungan</h4>
                <a class="font-body-md text-body-md text-on-surface-variant dark:text-outline-variant hover:text-primary transition-colors" href="#">FAQ</a>
            </div>
            <div class="flex flex-col gap-sm">
                <h4 class="font-label-sm text-label-sm text-primary dark:text-primary-fixed font-semibold">Hubungkan</h4>
                <a class="font-body-md text-body-md text-on-surface-variant dark:text-outline-variant hover:text-primary transition-colors" href="#">Sosial</a>
            </div>
        </div>
        <div class="border-t border-white/30 dark:border-outline-variant/20 py-md text-center">
            <p class="font-body-md text-body-md text-on-surface-variant dark:text-outline-variant opacity-70">
                © 2026 Promotor Konser LUNA. Hak cipta dilindungi undang-undang.
            </p>
        </div>
    </footer>
</body>
</html>