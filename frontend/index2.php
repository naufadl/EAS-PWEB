<?php
include("../backend/config.php");
// Mengambil data event dari database
$query = mysqli_query($db, "SELECT * FROM daftar_konser ORDER BY tanggal_event ASC");
?>

<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>LUNA - Ethereal Concert Experiences</title>
    
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

<body class="text-on-background font-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container relative">

<nav class="fixed top-0 w-full z-50 bg-surface/60 dark:bg-surface-dim/60 backdrop-blur-xl border-b border-white/40 dark:border-outline-variant/20 shadow-[0_8px_32px_rgba(205,180,255,0.3)]">
    <div class="flex justify-between items-center px-gutter py-sm max-w-container-max mx-auto">
        <div class="font-display-lg text-display-lg font-bold text-primary dark:text-primary-fixed-dim tracking-tighter">LUNA</div>
        <div class="hidden md:flex gap-md items-center">
            <a class="font-label-sm text-label-sm text-primary dark:text-primary-fixed-dim border-b-2 border-primary dark:border-primary-fixed-dim pb-1 scale-95 duration-150 ease-in-out" href="index.php">Beranda</a>
            <a class="font-label-sm text-label-sm text-on-surface-variant dark:text-outline-variant hover:text-primary transition-colors hover:backdrop-blur-2xl hover:bg-white/20 transition-all duration-300 px-sm py-xs rounded-full" href="transaksi.php">Transaksi Tiket</a>
            <a class="font-label-sm text-label-sm text-on-surface-variant dark:text-outline-variant hover:text-primary transition-colors hover:backdrop-blur-2xl hover:bg-white/20 transition-all duration-300 px-sm py-xs rounded-full" href="#">Tentang</a>
        </div>
        <div class="flex items-center gap-sm">
            <a href="login.php" class="font-label-sm text-label-sm text-on-surface-variant dark:text-outline-variant hover:text-primary transition-colors hidden md:block">Masuk</a>
            <a href="register.php" class="font-label-sm text-label-sm bg-primary text-on-primary px-md py-sm rounded-full hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm">Daftar</a>
        </div>
    </div>
</nav>

<section class="relative min-h-[90vh] flex items-center justify-center pt-xl px-gutter overflow-hidden">
    <div class="absolute top-1/4 left-[10%] text-primary/30 floating-element">
        <span class="material-symbols-outlined text-[64px]" style="font-variation-settings: 'FILL' 1;">star</span>
    </div>
    <div class="absolute bottom-1/3 right-[15%] text-tertiary-container/40 floating-element-slow">
        <span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1;">bedtime</span>
    </div>
    <div class="absolute top-1/3 right-[20%] text-secondary-fixed/50 floating-element scale-50">
        <span class="material-symbols-outlined text-[48px]" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
    </div>

    <div class="max-w-container-max mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-xl items-center relative z-10 mt-xl">
        <div class="text-left flex flex-col gap-md">
            <div class="inline-block px-sm py-xs rounded-full bg-primary-container/30 text-on-primary-container font-label-sm text-label-sm w-max border border-white/50 backdrop-blur-sm">
                ✨ Pengalaman Mendatang Unggulan
            </div>
            <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-primary">
                Malam Nebula:<br/><span class="text-tertiary">Aurora</span>
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md">
                Benamkan diri Anda dalam perjalanan audiovisual yang transenden di bawah bintang digital. Penampilan intim oleh Aurora, bermandikan cahaya bioluminesen.
            </p>
            <div class="flex gap-sm mt-sm">
                <a href="#konser-section" class="ethereal-gradient-btn text-on-primary font-label-sm text-label-sm px-xl py-sm rounded-full text-center shadow-[0_8px_24px_rgba(205,180,255,0.3)]">
                    Jelajahi Konser
                </a>
            </div>
        </div>
        
        <div class="relative w-full aspect-[4/5] md:aspect-square lg:aspect-[4/5] rounded-xl overflow-hidden glass-card p-xs group">
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent z-10 rounded-xl pointer-events-none"></div>
            <img alt="Aurora Concert Poster" class="w-full h-full object-cover rounded-xl transition-transform duration-700 group-hover:scale-105" src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=800&q=80"/>
            <div class="absolute bottom-md left-md right-md z-20 text-on-primary">
                <div class="flex justify-between items-end">
                    <div>
                        <p class="font-label-sm text-label-sm text-inverse-primary mb-xs">15 NOV • THE OBSERVATORY</p>
                        <h2 class="font-headline-md text-headline-md">Aurora Live</h2>
                    </div>
                    <div class="bg-white/20 backdrop-blur-md rounded-full px-sm py-xs border border-white/30 text-center">
                        <p class="font-label-sm text-label-sm leading-tight text-white">Tiket<br/>Hampir Habis</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="konser-section" class="py-xl px-gutter max-w-container-max mx-auto relative z-10">
    <div class="flex flex-col md:flex-row justify-between items-end mb-lg gap-sm">
        <div>
            <h2 class="font-display-lg-mobile text-display-lg-mobile text-primary mb-xs">Konser Mendatang</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Temukan lanskap suara surgawi di dekat Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        
        <?php while($data = mysqli_fetch_array($query)) { ?>
            <div class="glass-card rounded-lg overflow-hidden flex flex-col group hover:-translate-y-2 transition-transform duration-500">
                <div class="relative aspect-video overflow-hidden p-xs">
                    <img src="uploads/<?= $data['gambar']; ?>" alt="Poster <?= $data['nama_event']; ?>" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-sm right-sm bg-primary/80 backdrop-blur-sm text-on-primary font-label-sm text-label-sm px-sm py-xs rounded-full border border-white/30">
                        Live Event
                    </div>
                </div>
                <div class="p-md flex flex-col flex-grow gap-sm">
                    <div>
                        <h3 class="font-headline-md text-headline-md text-primary"><?= $data['nama_event']; ?></h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Luna Promotor</p>
                    </div>
                    <div class="flex items-center gap-xs text-secondary mt-auto pt-sm border-t border-white/50">
                        <span class="material-symbols-outlined text-[18px]">calendar_today</span>
                        <span class="font-label-sm text-label-sm"><?= date('d M Y', strtotime($data['tanggal_event'])); ?></span>
                        
                        <span class="material-symbols-outlined text-[18px] ml-auto">location_on</span>
                        <span class="font-label-sm text-label-sm"><?= $data['lokasi']; ?></span>
                    </div>
                    
                    <a href="konser.php?id=<?= $data['id']; ?>" class="glass-btn-secondary w-full py-sm rounded-full font-label-sm text-label-sm text-primary mt-sm text-center hover:bg-primary-container hover:text-on-primary-container border-none shadow-sm block">
                        Lihat Detail
                    </a>
                </div>
            </div>
            <?php } ?>

    </div>
</section>

<footer class="w-full mt-xl bg-surface-container-low dark:bg-surface-container-highest bg-gradient-to-t from-tertiary-container/20 to-transparent">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter px-gutter py-xl max-w-container-max mx-auto text-left relative z-10">
        <div class="flex flex-col gap-sm">
            <span class="font-display-lg-mobile text-display-lg-mobile font-bold text-primary">LUNA</span>
            <p class="font-body-md text-body-md text-on-surface-variant dark:text-outline-variant max-w-[250px]">
                Mengurasi pengalaman konser surgawi yang melampaui kebiasaan.
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