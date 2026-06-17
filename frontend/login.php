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
<body class="text-on-background font-body-md overflow-x-hidden selection:bg-primary-container selection:text-on-primary-container min-h-screen flex flex-col">

<!-- NAV -->
<nav class="fixed top-0 w-full z-50 bg-surface/60 backdrop-blur-xl border-b border-white/40 shadow-[0_8px_32px_rgba(205,180,255,0.3)]">
    <div class="flex justify-between items-center px-gutter py-sm max-w-container-max mx-auto">
        <a href="index.php" class="font-display-lg text-display-lg font-bold text-primary tracking-tighter">LUNA</a> <!-- GANTI PATH -->
        <div class="flex items-center gap-sm">
            <a href="register.php" class="font-label-sm text-label-sm bg-primary text-on-primary px-md py-sm rounded-full hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-sm">Daftar</a>
        </div>
    </div>
</nav>

<div class="fixed top-1/4 left-[10%] text-primary/20 pointer-events-none">
    <span class="material-symbols-outlined text-[64px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<div class="fixed bottom-1/3 right-[15%] text-tertiary-container/30 pointer-events-none">
    <span class="material-symbols-outlined text-[120px]" style="font-variation-settings: 'FILL' 1;">bedtime</span>
</div>

<div class="flex-1 flex items-center justify-center px-gutter pt-xl pb-lg">
    <div class="glass-card rounded-lg p-md w-full max-w-sm flex flex-col gap-md">
        <div class="text-center flex flex-col gap-xs">
            <h1 class="font-display-lg-mobile text-display-lg-mobile text-primary font-bold">Masuk</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Selamat datang kembali di LUNA.</p>
        </div>

        <form action="../backend/proses_login.php" method="POST" class="flex flex-col gap-sm"> <!-- GANTI PATH -->
            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Email</label>
                <input type="email" name="email" required
                       class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 transition">
            </div>
            <div class="flex flex-col gap-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-surface-container border border-outline-variant rounded-full px-md py-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 transition">
            </div>
            <button type="submit"
                    class="ethereal-gradient-btn text-on-primary font-label-sm text-label-sm py-sm rounded-full text-center shadow-[0_8px_24px_rgba(205,180,255,0.3)] mt-xs">
                Masuk
            </button>
        </form>

        <p class="text-center font-body-md text-body-md text-on-surface-variant">
            Belum punya akun?
            <a href="register.php" class="text-primary hover:underline">Daftar di sini</a> <!-- GANTI PATH -->
        </p>
    </div>
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