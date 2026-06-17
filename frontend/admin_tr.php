<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // # GANTI_PATH jika lokasi login.php berbeda
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header("Location: index.php"); // # GANTI_PATH jika lokasi index.php berbeda
    exit();
}

include("../backend/config.php"); // # GANTI_PATH jika lokasi config.php berbeda

$active_menu = 'transaksi'; // untuk highlight menu sidebar
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Transaksi - LUNA Admin</title>
<link rel="stylesheet" href="style.css"> <!-- # GANTI_PATH jika nama/lokasi css lama berbeda -->
</head>
<body>

<div class="app-shell">

    <?php
        // # GANTI_PATH jika nama file sidebar berbeda
        include("admin_sidebar.php");
    ?>

    <main class="main-content">
        <header class="topbar">
            <h2>Data Transaksi</h2>
        </header>

        <div class="page-wrap">

            <div class="section-head">
                <div></div>
                <a href="admin_konser.php" class="btn btn-outline"> <!-- # GANTI_PATH -->
                    <span class="material-symbols-outlined" style="font-size:18px;">event</span>
                    Kelola Konser
                </a>
            </div>

            <div class="glass-panel table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM transaksi");
                        $ada_data = false;

                        while ($data = mysqli_fetch_array($query)) {
                            $ada_data = true;

                            // badge status otomatis menyesuaikan isi status_bayar
                            $status_raw = strtolower($data['status_bayar']);
                            if (strpos($status_raw, 'pending') !== false || strpos($status_raw, 'belum') !== false) {
                                $badge_class = 'status-pending';
                            } elseif (strpos($status_raw, 'sukses') !== false || strpos($status_raw, 'acc') !== false || strpos($status_raw, 'berhasil') !== false) {
                                $badge_class = 'status-success';
                            } else {
                                $badge_class = 'status-default';
                            }
                        ?>
                            <tr>
                                <td>
                                    <!-- # GANTI_PATH jika folder uploads berbeda -->
                                    <img src="../uploads/<?= htmlspecialchars($data['foto']) ?>" class="thumb" alt="Bukti bayar">
                                </td>
                                <td>#TRX-<?= str_pad($data['id'], 4, "0", STR_PAD_LEFT) ?></td>
                                <td><?= htmlspecialchars($data['nama']) ?></td>
                                <td><span class="status-badge <?= $badge_class ?>"><?= htmlspecialchars($data['status_bayar']) ?></span></td>
                                <td>
                                    <div class="action-group">
                                        <!-- # GANTI_PATH jika lokasi backend berbeda -->
                                        <a href="../backend/acc_transaksi.php?id=<?= $data['id'] ?>" class="btn btn-success">ACC</a>
                                        <a href="../backend/reject_transaksi.php?id=<?= $data['id'] ?>" class="btn btn-danger-outline">Reject</a>
                                        <a href="../backend/proses_hapus.php?id=<?= $data['id'] ?>"
                                           class="btn btn-outline"
                                           onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if (!$ada_data): ?>
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <span class="material-symbols-outlined">inbox</span>
                                        <p>Belum ada transaksi masuk.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</div>

</body>
</html>
