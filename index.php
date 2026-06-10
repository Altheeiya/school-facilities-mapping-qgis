<?php include 'includes/header.php'; ?>

<!-- ===== HERO SECTION ===== -->
<section class="hero" id="hero-section">
    <div class="hero-eyebrow">
        <span class="dot"></span>
        Sistem Informasi Geografis
    </div>
    <h1 class="hero-title">
        Pemerataan Aksesibilitas<br>
        <span class="highlight">SMA Kota Bandar Lampung</span>
    </h1>
    <p class="hero-desc">
        Platform WebGIS berbasis web untuk memetakan sebaran spasial, jangkauan pelayanan, dan analisis isokron waktu tempuh berkendara menuju SMA di Kota Bandar Lampung.
    </p>
    <div class="hero-actions">
        <a href="peta.php" class="btn btn-primary" id="btn-buka-peta">
            <i class="fa-solid fa-map"></i>
            Buka Peta Interaktif
        </a>
        <a href="analisis.php" class="btn btn-ghost" id="btn-lihat-metodologi">
            Lihat Metodologi
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</section>

<!-- ===== STAT CARDS ===== -->
<div class="stat-strip" id="stat-strip">

    <div class="glass-card stat-card accent-blue" id="stat-total-sma">
        <div class="stat-card-left">
            <p class="stat-label">Total SMA Terdata</p>
            <p class="stat-value">71</p>
            <div class="stat-accent-line"></div>
        </div>
        <div class="stat-icon-wrap">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>
    </div>

    <div class="glass-card stat-card accent-teal" id="stat-proyeksi">
        <div class="stat-card-left">
            <p class="stat-label">Sistem Proyeksi</p>
            <p class="stat-value sm">WGS 84 (EPSG:4326)</p>
            <div class="stat-accent-line"></div>
        </div>
        <div class="stat-icon-wrap">
            <i class="fa-solid fa-earth-asia"></i>
        </div>
    </div>

    <div class="glass-card stat-card accent-amber" id="stat-parameter">
        <div class="stat-card-left">
            <p class="stat-label">Parameter Akses</p>
            <p class="stat-value sm">3, 6 &amp; 10 Menit</p>
            <div class="stat-accent-line"></div>
        </div>
        <div class="stat-icon-wrap">
            <i class="fa-solid fa-route"></i>
        </div>
    </div>

</div>

<!-- ===== FEATURES SECTION ===== -->
<div class="features-wrap" id="features-section">
    <div style="text-align: center;">
        <p class="section-eyebrow">Kemampuan Inti</p>
        <h2 class="section-title">Fitur Utama WebGIS</h2>
        <p class="section-sub">Mendukung visualisasi spasial lanjut untuk perencanaan zonasi wilayah pendidikan.</p>
    </div>

    <div class="feature-grid" id="feature-grid">

        <div class="glass-card feature-card" id="feature-sebaran">
            <div class="feature-icon blue">
                <i class="fa-solid fa-circle-dot"></i>
            </div>
            <h3>Sebaran 71 Titik SMA</h3>
            <p>Menyajikan pemetaan lokasi Sekolah Menengah Atas (Negeri &amp; Swasta) secara presisi berdasarkan koordinat lintang dan bujur asli.</p>
        </div>

        <div class="glass-card feature-card" id="feature-isokron">
            <div class="feature-icon green">
                <i class="fa-solid fa-network-wired"></i>
            </div>
            <h3>Jangkauan Isokron Dinamis</h3>
            <p>Analisis area cakupan menggunakan OpenRouteService API berdasarkan waktu tempuh kendaraan riil melewati jaringan jalan sekitar sekolah.</p>
        </div>

        <div class="glass-card feature-card" id="feature-pemerataan">
            <div class="feature-icon amber">
                <i class="fa-solid fa-draw-polygon"></i>
            </div>
            <h3>Pemerataan Kecamatan</h3>
            <p>Visualisasi peta tematik (Choropleth) poligon kecamatan yang menggambarkan nilai indeks tingkat pemerataan sarana pendidikan.</p>
        </div>

    </div>
</div>

<!-- ===== FOOTER ===== -->
<footer class="site-footer" id="main-footer">
    <p>&copy; 2026 WebGIS Pemetaan SMA Bandar Lampung. All Rights Reserved.</p>
</footer>

</body>
</html>