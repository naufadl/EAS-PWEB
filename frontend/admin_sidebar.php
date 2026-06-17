<?php
if (!isset($active_menu)) {
    $active_menu = '';
}
?>
<aside class="sidebar">
    <div class="sidebar-header">
        <h1>LUNA</h1>
        <p>Admin Portal</p>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li>
                <!-- # GANTI_PATH: sesuaikan jika nama file transaksi berbeda -->
                <a href="admin_tr.php" class="nav-link <?= $active_menu === 'transaksi' ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">payments</span>
                    Data Transaksi
                </a>
            </li>
            <li>
                <!-- # GANTI_PATH: sesuaikan jika nama file data konser berbeda -->
                <a href="admin_kr.php" class="nav-link <?= $active_menu === 'konser' ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">event</span>
                    Data Konser
                </a>
            </li>
            <li>
                <!-- # GANTI_PATH: sesuaikan jika nama file add konser berbeda -->
                <a href="admin_add_kr.php" class="nav-link <?= $active_menu === 'add_konser' ? 'active' : '' ?>">
                    <span class="material-symbols-outlined">add_circle</span>
                    Tambah Konser
                </a>
            </li>
        </ul>
    </nav>

    <div class="sidebar-footer">
        <div class="avatar-circle">
            <span class="material-symbols-outlined">account_circle</span>
        </div>
        <div>
            <p class="name"><?= isset($_SESSION['nama']) ? htmlspecialchars($_SESSION['nama']) : 'Admin' ?></p>
            <p class="role">Administrator</p>
        </div>
    </div>
</aside>
