<?php
$current_page = basename($_SERVER['PHP_SELF']);

// Dynamic title per page
$titles = [
    'index.php'        => 'Beranda — WebGIS SMA Bandar Lampung',
    'peta.php'         => 'Peta Interaktif — WebGIS SMA Bandar Lampung',
    'analisis.php'     => 'Analisis Spasial — WebGIS SMA Bandar Lampung',
    'data-sekolah.php' => 'Data Sekolah — WebGIS SMA Bandar Lampung',
];
$page_title = $titles[$current_page] ?? 'WebGIS SMA Bandar Lampung';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="Sistem Informasi Geografis berbasis web untuk memetakan sebaran spasial, jangkauan pelayanan, dan analisis isokron SMA di Kota Bandar Lampung.">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <?php if ($current_page === 'peta.php'): ?>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <?php endif; ?>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar" role="navigation" aria-label="Main navigation">
    <div class="navbar-inner">

        <!-- Brand -->
        <a href="index.php" class="navbar-brand" id="nav-brand">
            <div class="brand-icon-wrap">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <span>WebGIS SMA Bandar Lampung</span>
        </a>

        <!-- Desktop Links -->
        <ul class="navbar-links" role="list">
            <li>
                <a href="index.php" id="nav-beranda" class="<?php echo $current_page === 'index.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-house"></i> Beranda
                </a>
            </li>
            <li>
                <a href="peta.php" id="nav-peta" class="<?php echo $current_page === 'peta.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-map"></i> Peta Interaktif
                </a>
            </li>
            <li>
                <a href="analisis.php" id="nav-analisis" class="<?php echo $current_page === 'analisis.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-chart-pie"></i> Analisis Spasial
                </a>
            </li>
            <li>
                <a href="data-sekolah.php" id="nav-data" class="<?php echo $current_page === 'data-sekolah.php' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-list"></i> Data Sekolah
                </a>
            </li>
        </ul>

        <!-- Hamburger Button (mobile) -->
        <button class="hamburger" id="hamburger-btn" aria-label="Toggle navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>

<!-- Mobile Menu Drawer -->
<div class="mobile-menu" id="mobile-menu" role="menu" aria-hidden="true">
    <a href="index.php" id="mob-beranda" class="<?php echo $current_page === 'index.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-house"></i> Beranda
    </a>
    <a href="peta.php" id="mob-peta" class="<?php echo $current_page === 'peta.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-map"></i> Peta Interaktif
    </a>
    <a href="analisis.php" id="mob-analisis" class="<?php echo $current_page === 'analisis.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-chart-pie"></i> Analisis Spasial
    </a>
    <a href="data-sekolah.php" id="mob-data" class="<?php echo $current_page === 'data-sekolah.php' ? 'active' : ''; ?>">
        <i class="fa-solid fa-list"></i> Data Sekolah
    </a>
</div>

<!-- Hamburger Toggle Script -->
<script>
(function() {
    const btn  = document.getElementById('hamburger-btn');
    const menu = document.getElementById('mobile-menu');
    btn.addEventListener('click', function() {
        const isOpen = menu.classList.toggle('open');
        btn.classList.toggle('open', isOpen);
        btn.setAttribute('aria-expanded', isOpen);
        menu.setAttribute('aria-hidden', !isOpen);
    });
    // Close on outside click
    document.addEventListener('click', function(e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.remove('open');
            btn.classList.remove('open');
            btn.setAttribute('aria-expanded', 'false');
            menu.setAttribute('aria-hidden', 'true');
        }
    });
})();
</script>