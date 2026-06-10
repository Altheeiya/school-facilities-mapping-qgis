<?php include 'includes/header.php'; ?>

<div class="page-wrapper">

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <div class="hero-badge animate-in">
        <i class="fa-solid fa-location-dot"></i>
        Kota Bandar Lampung · 2026
      </div>
      <h1 class="animate-in animate-delay-1">
        Pemerataan Aksesibilitas<br>
        <span>SMA di Bandar Lampung</span>
      </h1>
      <p class="hero-desc animate-in animate-delay-2">
        Platform WebGIS berbasis analisis jaringan jalan untuk memetakan sebaran spasial, jangkauan isokron waktu tempuh, dan pemerataan Sekolah Menengah Atas di Kota Bandar Lampung.
      </p>
      <div class="hero-actions animate-in animate-delay-3">
        <a href="peta.php" class="btn btn-primary btn-lg">
          <i class="fa-solid fa-map"></i> Buka Peta Interaktif
        </a>
        <a href="analisis.php" class="btn btn-outline btn-lg">
          Metodologi <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- STAT CARDS -->
  <div class="container">
    <div class="stat-cards">
      <div class="stat-card animate-in">
        <div class="stat-icon blue"><i class="fa-solid fa-graduation-cap"></i></div>
        <div>
          <div class="stat-label">Total SMA Terdata</div>
          <div class="stat-value">70</div>
        </div>
      </div>
      <div class="stat-card animate-in animate-delay-1">
        <div class="stat-icon green"><i class="fa-solid fa-earth-asia"></i></div>
        <div>
          <div class="stat-label">Sistem Proyeksi</div>
          <div class="stat-value sm">WGS 84 · EPSG:4326</div>
        </div>
      </div>
      <div class="stat-card animate-in animate-delay-2">
        <div class="stat-icon amber"><i class="fa-solid fa-clock"></i></div>
        <div>
          <div class="stat-label">Zona Isokron</div>
          <div class="stat-value sm">3, 6, dan 10 Menit</div>
        </div>
      </div>
      <div class="stat-card animate-in animate-delay-3">
        <div class="stat-icon red"><i class="fa-solid fa-route"></i></div>
        <div>
          <div class="stat-label">Sumber Routing</div>
          <div class="stat-value sm">OpenRouteService</div>
        </div>
      </div>
    </div>
  </div>

  <!-- FITUR SECTION -->
  <section class="section">
    <div class="container">
      <div class="section-header center">
        <div class="section-eyebrow">Fitur Platform</div>
        <h2 class="section-title">Analisis Spasial yang Komprehensif</h2>
        <p class="section-desc">
          Dikembangkan menggunakan data OpenStreetMap, PostGIS, dan OpenRouteService API untuk akurasi dan ketepatan analisis wilayah.
        </p>
      </div>

      <div class="feature-grid">
        <div class="feature-card animate-in">
          <div class="feature-icon blue"><i class="fa-solid fa-circle-dot"></i></div>
          <div class="feature-title">Sebaran 70 Titik SMA</div>
          <p class="feature-desc">Visualisasi presisi lokasi SMA Negeri dan Swasta di seluruh Kota Bandar Lampung berdasarkan koordinat lintang-bujur dari database PostGIS.</p>
        </div>
        <div class="feature-card animate-in animate-delay-1">
          <div class="feature-icon green"><i class="fa-solid fa-network-wired"></i></div>
          <div class="feature-title">Isokron Jalan Dinamis</div>
          <p class="feature-desc">Zona aksesibilitas dihitung dari jaringan jalan aktual via OpenRouteService — bukan sekadar radius lingkaran, melainkan jangkauan riil kendaraan.</p>
        </div>
        <div class="feature-card animate-in animate-delay-2">
          <div class="feature-icon amber"><i class="fa-solid fa-magnifying-glass-location"></i></div>
          <div class="feature-title">Pencarian Sekolah Cepat</div>
          <p class="feature-desc">Cari nama sekolah langsung di peta. Sistem akan otomatis terbang ke koordinat sekolah dan membuka detail popup informasinya.</p>
        </div>
        <div class="feature-card animate-in animate-delay-3">
          <div class="feature-icon violet"><i class="fa-solid fa-database"></i></div>
          <div class="feature-title">Data Langsung dari PostgreSQL</div>
          <p class="feature-desc">Semua data titik SMA diambil real-time dari database PostGIS, memastikan konsistensi data antara tampilan peta dan tabel data.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TEKNOLOGI SECTION -->
  <section class="section" style="background: #fff; border-top: 1px solid var(--gray-200); border-bottom: 1px solid var(--gray-200);">
    <div class="container">
      <div class="section-header center">
        <div class="section-eyebrow">Stack Teknologi</div>
        <h2 class="section-title">Dibangun dengan Teknologi Modern</h2>
      </div>
      <div style="display: flex; flex-wrap: wrap; gap: 16px; justify-content: center;">
        <?php
        $techs = [
          ['PostgreSQL + PostGIS',   'fa-database',    'blue'],
          ['Leaflet.js',             'fa-map',         'green'],
          ['OpenRouteService API',   'fa-route',       'amber'],
          ['PHP',                    'fa-code',        'violet'],
          ['OpenStreetMap',          'fa-earth-asia',  'blue'],
        ];
        foreach($techs as $t): ?>
        <div style="display:flex;align-items:center;gap:10px;background:var(--gray-50);border:1px solid var(--gray-200);border-radius:var(--radius-sm);padding:12px 20px;">
          <span style="width:32px;height:32px;background:var(--primary-light);color:var(--primary);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;">
            <i class="fa-solid <?= $t[1] ?>"></i>
          </span>
          <span style="font-size:13.5px;font-weight:600;color:var(--gray-700);"><?= $t[0] ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section">
    <div class="container" style="text-align:center;">
      <div class="section-eyebrow">Mulai Eksplorasi</div>
      <h2 class="section-title" style="margin:0 auto 12px;">Siap Melihat Petanya?</h2>
      <p class="section-desc" style="margin:0 auto 28px;">Buka peta interaktif dan eksplorasi distribusi SMA beserta zona aksesibilitasnya di Kota Bandar Lampung.</p>
      <a href="peta.php" class="btn btn-primary btn-lg">
        <i class="fa-solid fa-map-location-dot"></i> Buka Peta Interaktif
      </a>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-inner">
      <div>
        <div class="footer-brand">WebGIS SMA Bandar Lampung</div>
        <div style="margin-top:4px;">© 2026 · Analisis Pemerataan Aksesibilitas Pendidikan</div>
      </div>
      <div class="footer-links">
        <a href="index.php">Beranda</a>
        <a href="peta.php">Peta</a>
        <a href="analisis.php">Metodologi</a>
        <a href="data-sekolah.php">Data</a>
      </div>
    </div>
  </footer>

</div><!-- /page-wrapper -->
</body>
</html>