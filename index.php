<?php include 'includes/header.php'; ?>

<div class="page-wrapper">

  <!-- ═══════════════════════════════════════════
       HERO — FULL-BLEED PHOTO
  ═══════════════════════════════════════════ -->
  <section class="hero-enterprise" id="hero">
    <div class="hero-bg">
      <img src="assets/images/hero-school.jpg" alt="Gedung SMA Bandar Lampung" class="hero-bg-img" id="heroBgImg">
      <div class="hero-overlay"></div>
      <div class="hero-overlay-gradient"></div>
    </div>

    <!-- Floating particles -->
    <div class="hero-particles" aria-hidden="true">
      <span class="particle p1"></span>
      <span class="particle p2"></span>
      <span class="particle p3"></span>
      <span class="particle p4"></span>
      <span class="particle p5"></span>
    </div>

    <div class="hero-content container">
      <div class="hero-eyebrow animate-hero">
        <span class="eyebrow-dot"></span>
        Sistem Informasi Geografis · Kota Bandar Lampung · 2026
      </div>

      <h1 class="hero-title animate-hero anim-d1">
        Pemerataan Aksesibilitas<br>
        <span class="hero-title-accent">SMA Bandar Lampung</span>
      </h1>

      <p class="hero-subtitle animate-hero anim-d2">
        Platform WebGIS enterprise berbasis analisis jaringan jalan untuk memetakan sebaran spasial, zona isokron waktu tempuh, dan distribusi Sekolah Menengah Atas di seluruh Kota Bandar Lampung.
      </p>

      <div class="hero-cta-group animate-hero anim-d3">
        <a href="peta.php" class="btn-ent btn-ent-primary">
          <i class="fa-solid fa-map-location-dot"></i>
          Buka Peta Interaktif
          <i class="fa-solid fa-arrow-right btn-arrow"></i>
        </a>
        <a href="analisis.php" class="btn-ent btn-ent-ghost">
          <i class="fa-solid fa-chart-pie"></i>
          Lihat Metodologi
        </a>
      </div>

      <!-- Hero micro-stats -->
      <div class="hero-stats animate-hero anim-d4">
        <div class="hstat">
          <div class="hstat-value" data-count="70">0</div>
          <div class="hstat-label">SMA Terdata</div>
        </div>
        <div class="hstat-divider"></div>
        <div class="hstat">
          <div class="hstat-value" data-count="13">0</div>
          <div class="hstat-label">Kecamatan</div>
        </div>
        <div class="hstat-divider"></div>
        <div class="hstat">
          <div class="hstat-value" data-suffix="km²" data-count="197">0</div>
          <div class="hstat-label">Luas Wilayah</div>
        </div>
        <div class="hstat-divider"></div>
        <div class="hstat">
          <div class="hstat-value" data-suffix="%" data-count="100">0</div>
          <div class="hstat-label">Coverage Data</div>
        </div>
      </div>
    </div>

    <!-- Scroll cue -->
    <div class="hero-scroll-cue" aria-hidden="true">
      <div class="scroll-mouse">
        <div class="scroll-wheel"></div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       MARQUEE TECH STRIP
  ═══════════════════════════════════════════ -->
  <div class="tech-marquee-wrap">
    <div class="tech-marquee">
      <div class="marquee-track">
        <?php
        $techs = [
          ['PostgreSQL + PostGIS', 'fa-database'],
          ['Leaflet.js v1.9',     'fa-map'],
          ['OpenRouteService API','fa-route'],
          ['PHP 8.2',             'fa-code'],
          ['OpenStreetMap',       'fa-earth-asia'],
          ['EPSG:4326 / WGS 84', 'fa-globe'],
          ['Analisis Isokron',    'fa-clock'],
          ['QGIS Processing',     'fa-layer-group'],
        ];
        // duplicate for infinite scroll
        $all = array_merge($techs, $techs);
        foreach($all as $t): ?>
        <div class="marquee-item">
          <i class="fa-solid <?= $t[1] ?>"></i>
          <?= $t[0] ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- ═══════════════════════════════════════════
       STAT CARDS — FLOATING
  ═══════════════════════════════════════════ -->
  <section class="section-ent bg-surface">
    <div class="container">
      <div class="stat-grid">
        <div class="stat-card-ent animate-scroll">
          <div class="sc-icon-wrap sc-blue">
            <i class="fa-solid fa-graduation-cap"></i>
          </div>
          <div class="sc-body">
            <div class="sc-value counter" data-count="70">70</div>
            <div class="sc-label">Total SMA Terdata</div>
            <div class="sc-desc">Negeri & Swasta se-Bandar Lampung</div>
          </div>
          <div class="sc-trend up"><i class="fa-solid fa-arrow-trend-up"></i> Lengkap</div>
        </div>

        <div class="stat-card-ent animate-scroll asd1">
          <div class="sc-icon-wrap sc-green">
            <i class="fa-solid fa-earth-asia"></i>
          </div>
          <div class="sc-body">
            <div class="sc-value">WGS 84</div>
            <div class="sc-label">Sistem Proyeksi</div>
            <div class="sc-desc">EPSG:4326 — Standar Internasional</div>
          </div>
          <div class="sc-trend neutral"><i class="fa-solid fa-check-circle"></i> Terverifikasi</div>
        </div>

        <div class="stat-card-ent animate-scroll asd2">
          <div class="sc-icon-wrap sc-amber">
            <i class="fa-solid fa-clock"></i>
          </div>
          <div class="sc-body">
            <div class="sc-value">3 / 6 / 10</div>
            <div class="sc-label">Zona Isokron (Menit)</div>
            <div class="sc-desc">Berbasis jaringan jalan aktual</div>
          </div>
          <div class="sc-trend up"><i class="fa-solid fa-route"></i> Dinamis</div>
        </div>

        <div class="stat-card-ent animate-scroll asd3">
          <div class="sc-icon-wrap sc-violet">
            <i class="fa-solid fa-database"></i>
          </div>
          <div class="sc-body">
            <div class="sc-value">Real-time</div>
            <div class="sc-label">Sumber Data</div>
            <div class="sc-desc">Streaming langsung dari PostGIS</div>
          </div>
          <div class="sc-trend up"><i class="fa-solid fa-bolt"></i> Live</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       FEATURES — BENTO GRID
  ═══════════════════════════════════════════ -->
  <section class="section-ent bg-raised">
    <div class="container">
      <div class="section-label-row animate-scroll">
        <span class="section-pill">Fitur Platform</span>
      </div>
      <div class="section-heading-row animate-scroll">
        <h2 class="section-h2">Analisis Spasial<br><span>yang Komprehensif</span></h2>
        <p class="section-lead">Dikembangkan menggunakan data OpenStreetMap, PostGIS, dan OpenRouteService API untuk akurasi dan ketepatan analisis wilayah.</p>
      </div>

      <div class="bento-grid">
        <!-- Card 1 — wide -->
        <div class="bento-card bento-wide animate-scroll">
          <div class="bento-icon bento-blue">
            <i class="fa-solid fa-circle-dot"></i>
          </div>
          <div class="bento-tag">Sebaran Spasial</div>
          <h3 class="bento-title">70 Titik SMA Dipetakan</h3>
          <p class="bento-body">Visualisasi presisi lokasi SMA Negeri dan Swasta di seluruh Kota Bandar Lampung berdasarkan koordinat lintang-bujur dari database PostGIS. Setiap titik dapat diklik untuk informasi detail sekolah.</p>
          <div class="bento-visual bv-dots"></div>
        </div>

        <!-- Card 2 -->
        <div class="bento-card animate-scroll asd1">
          <div class="bento-icon bento-green">
            <i class="fa-solid fa-network-wired"></i>
          </div>
          <div class="bento-tag">Routing Engine</div>
          <h3 class="bento-title">Isokron Jalan Dinamis</h3>
          <p class="bento-body">Zona aksesibilitas dihitung via OpenRouteService — bukan radius lingkaran, melainkan jangkauan riil kendaraan di jaringan jalan nyata.</p>
        </div>

        <!-- Card 3 -->
        <div class="bento-card animate-scroll asd2">
          <div class="bento-icon bento-amber">
            <i class="fa-solid fa-magnifying-glass-location"></i>
          </div>
          <div class="bento-tag">UX Cepat</div>
          <h3 class="bento-title">Pencarian Sekolah Instan</h3>
          <p class="bento-body">Cari nama sekolah langsung di peta. Sistem fly-to ke koordinat dan membuka popup detail secara otomatis.</p>
        </div>

        <!-- Card 4 -->
        <div class="bento-card animate-scroll asd1">
          <div class="bento-icon bento-violet">
            <i class="fa-solid fa-database"></i>
          </div>
          <div class="bento-tag">Backend</div>
          <h3 class="bento-title">Data Langsung PostGIS</h3>
          <p class="bento-body">Semua data diambil real-time dari PostgreSQL/PostGIS, memastikan konsistensi antara tampilan peta dan tabel data sekolah.</p>
        </div>

        <!-- Card 5 — wide CTA -->
        <div class="bento-card bento-cta animate-scroll">
          <div class="bento-cta-inner">
            <div>
              <div class="bento-tag">Siap Digunakan</div>
              <h3 class="bento-title" style="margin-top:10px;">Eksplorasi Peta Interaktif</h3>
              <p class="bento-body">Buka peta WebGIS dan jelajahi sebaran SMA serta zona aksesibilitasnya secara langsung.</p>
            </div>
            <a href="peta.php" class="btn-ent btn-ent-primary">
              <i class="fa-solid fa-map-location-dot"></i>
              Buka Peta
              <i class="fa-solid fa-arrow-right btn-arrow"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       HOW IT WORKS — PIPELINE
  ═══════════════════════════════════════════ -->
  <section class="section-ent">
    <div class="container">
      <div class="section-label-row animate-scroll">
        <span class="section-pill">Alur Analisis</span>
      </div>
      <h2 class="section-h2 center animate-scroll">Bagaimana Platform Bekerja</h2>

      <div class="pipeline-grid">
        <div class="pipeline-step animate-scroll">
          <div class="pipeline-num">01</div>
          <div class="pipeline-icon"><i class="fa-solid fa-database"></i></div>
          <h4 class="pipeline-title">Pengumpulan Data</h4>
          <p class="pipeline-desc">Data koordinat 70 SMA diinput ke PostgreSQL + ekstensi PostGIS dengan sistem proyeksi WGS 84 / EPSG:4326.</p>
        </div>
        <div class="pipeline-conn animate-scroll asd1"><i class="fa-solid fa-chevron-right"></i></div>

        <div class="pipeline-step animate-scroll asd1">
          <div class="pipeline-num">02</div>
          <div class="pipeline-icon"><i class="fa-solid fa-route"></i></div>
          <h4 class="pipeline-title">Kalkulasi Isokron</h4>
          <p class="pipeline-desc">OpenRouteService API menghitung zona jangkauan 3, 6, dan 10 menit berbasis jaringan jalan dari OSM.</p>
        </div>
        <div class="pipeline-conn animate-scroll asd2"><i class="fa-solid fa-chevron-right"></i></div>

        <div class="pipeline-step animate-scroll asd2">
          <div class="pipeline-num">03</div>
          <div class="pipeline-icon"><i class="fa-solid fa-map"></i></div>
          <h4 class="pipeline-title">Rendering Peta</h4>
          <p class="pipeline-desc">Leaflet.js merender data GeoJSON dari API PHP secara real-time dengan layer kontrol dan popup interaktif.</p>
        </div>
        <div class="pipeline-conn animate-scroll asd3"><i class="fa-solid fa-chevron-right"></i></div>

        <div class="pipeline-step animate-scroll asd3">
          <div class="pipeline-num">04</div>
          <div class="pipeline-icon"><i class="fa-solid fa-chart-pie"></i></div>
          <h4 class="pipeline-title">Analisis & Output</h4>
          <p class="pipeline-desc">Visualisasi distribusi, gap aksesibilitas, dan laporan metodologi tersaji dalam dashboard analitik.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       TECH STACK — LOGO CARDS
  ═══════════════════════════════════════════ -->
  <section class="section-ent bg-surface">
    <div class="container">
      <div class="section-label-row animate-scroll">
        <span class="section-pill">Stack Teknologi</span>
      </div>
      <h2 class="section-h2 center animate-scroll">Dibangun dengan Teknologi Modern</h2>

      <div class="tech-grid">
        <?php
        $stack = [
          ['PostgreSQL + PostGIS', 'fa-database',    'Spatial Database', 'sc-blue'],
          ['Leaflet.js',          'fa-map',          'Web Mapping',      'sc-green'],
          ['OpenRouteService',    'fa-route',        'Routing Engine',   'sc-amber'],
          ['PHP 8.2',             'fa-code',         'Backend',          'sc-violet'],
          ['OpenStreetMap',       'fa-earth-asia',   'Basemap Data',     'sc-blue'],
          ['QGIS',               'fa-layer-group',   'GIS Processing',   'sc-green'],
        ];
        foreach($stack as $s): ?>
        <div class="tech-card animate-scroll">
          <div class="tc-icon <?= $s[3] ?>">
            <i class="fa-solid <?= $s[1] ?>"></i>
          </div>
          <div class="tc-name"><?= $s[0] ?></div>
          <div class="tc-role"><?= $s[2] ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       CTA BANNER
  ═══════════════════════════════════════════ -->
  <section class="cta-banner animate-scroll">
    <div class="cta-banner-bg"></div>
    <div class="container">
      <div class="cta-inner">
        <div class="cta-text">
          <div class="cta-eyebrow">Mulai Eksplorasi</div>
          <h2 class="cta-title">Siap Melihat Petanya?</h2>
          <p class="cta-desc">Buka peta interaktif dan eksplorasi distribusi 70 SMA beserta zona aksesibilitasnya di Kota Bandar Lampung.</p>
        </div>
        <div class="cta-actions">
          <a href="peta.php" class="btn-ent btn-ent-primary btn-ent-xl">
            <i class="fa-solid fa-map-location-dot"></i>
            Buka Peta Interaktif
            <i class="fa-solid fa-arrow-right btn-arrow"></i>
          </a>
          <a href="data-sekolah.php" class="btn-ent btn-ent-ghost btn-ent-xl">
            <i class="fa-solid fa-table-list"></i>
            Lihat Data Sekolah
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       FOOTER
  ═══════════════════════════════════════════ -->
  <footer class="footer-ent">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand-col">
          <a href="index.php" class="footer-logo">
            <div class="footer-logo-icon"><i class="fa-solid fa-map-location-dot"></i></div>
            <div>
              <div class="footer-logo-title">WebGIS SMA</div>
              <div class="footer-logo-sub">Bandar Lampung</div>
            </div>
          </a>
          <p class="footer-tagline">Platform Sistem Informasi Geografis untuk analisis pemerataan aksesibilitas pendidikan Sekolah Menengah Atas di Kota Bandar Lampung.</p>
        </div>

        <div class="footer-nav-col">
          <div class="footer-nav-group">
            <div class="footer-nav-label">Navigasi</div>
            <a href="index.php" class="footer-nav-link"><i class="fa-solid fa-house"></i> Beranda</a>
            <a href="peta.php" class="footer-nav-link"><i class="fa-solid fa-map"></i> Peta Interaktif</a>
            <a href="analisis.php" class="footer-nav-link"><i class="fa-solid fa-chart-pie"></i> Metodologi</a>
            <a href="data-sekolah.php" class="footer-nav-link"><i class="fa-solid fa-table-list"></i> Data Sekolah</a>
          </div>
          <div class="footer-nav-group">
            <div class="footer-nav-label">Teknologi</div>
            <a href="#" class="footer-nav-link"><i class="fa-solid fa-database"></i> PostgreSQL / PostGIS</a>
            <a href="#" class="footer-nav-link"><i class="fa-solid fa-map"></i> Leaflet.js</a>
            <a href="#" class="footer-nav-link"><i class="fa-solid fa-route"></i> OpenRouteService</a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="footer-copy">© 2026 WebGIS SMA Bandar Lampung · Analisis Pemerataan Aksesibilitas Pendidikan</div>
        <div class="footer-bottom-badges">
          <span class="fbadge"><i class="fa-solid fa-shield-check"></i> Data Terverifikasi</span>
          <span class="fbadge"><i class="fa-solid fa-bolt"></i> Real-time API</span>
        </div>
      </div>
    </div>
  </footer>

</div><!-- /page-wrapper -->

<script>
// ── Counter animation on scroll ──────────────────────────────
const counters = document.querySelectorAll('[data-count]');
const counterObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting || entry.target.classList.contains('counted')) return;
    entry.target.classList.add('counted');
    const target = +entry.target.dataset.count;
    const suffix = entry.target.dataset.suffix || '';
    const dur = 1600;
    const step = dur / target;
    let current = 0;
    const timer = setInterval(() => {
      current += Math.ceil(target / 80);
      if (current >= target) { current = target; clearInterval(timer); }
      entry.target.textContent = current + suffix;
    }, step);
  });
}, { threshold: 0.5 });

counters.forEach(c => counterObserver.observe(c));

// ── Scroll reveal ─────────────────────────────────────────────
const scrollEls = document.querySelectorAll('.animate-scroll');
const scrollObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in-view');
      scrollObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });
scrollEls.forEach(el => scrollObserver.observe(el));

// ── Hero parallax ─────────────────────────────────────────────
const heroBg = document.getElementById('heroBgImg');
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  if (heroBg && scrolled < window.innerHeight) {
    heroBg.style.transform = `scale(1.06) translateY(${scrolled * 0.25}px)`;
  }
}, { passive: true });

// ── Navbar shrink on scroll ───────────────────────────────────
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('navbar-scrolled', window.scrollY > 50);
}, { passive: true });
</script>

</body>
</html>