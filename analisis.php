<?php include 'includes/header.php'; ?>

<div class="page-wrapper">
  <section class="section">
    <div class="container">

      <!-- Page Header -->
      <div style="margin-bottom:32px;">
        <div class="section-eyebrow">Dokumentasi Teknis</div>
        <h1 class="section-title">Metodologi &amp; Analisis Spasial</h1>
        <p style="font-size:15px;color:var(--gray-500);margin-top:6px;max-width:640px;line-height:1.65;">
          Penjelasan lengkap parameter teknis dan pendekatan pengolahan Sistem Informasi Geografis untuk analisis pemerataan SMA Kota Bandar Lampung.
        </p>
      </div>

      <div style="display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start;">

        <!-- Main Content -->
        <div style="display:flex;flex-direction:column;gap:20px;">

          <!-- Isochrone Card -->
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <i class="fa-solid fa-route" style="color:var(--success);"></i>
                Analisis Isokron — Network Analysis
              </div>
            </div>
            <div class="card-body">
              <p style="font-size:14px;color:var(--gray-600);line-height:1.7;margin-bottom:20px;">
                Sistem ini menggunakan pendekatan <strong>analisis jaringan jalan aktual</strong> via <strong>OpenRouteService API</strong>, bukan radius lingkaran statis. Poligon yang dihasilkan mencerminkan jangkauan nyata kendaraan bermotor yang melewati jaringan jalan di sekitar sekolah.
              </p>
              <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;">
                <div class="zone-chip zone-green" style="flex-direction:column;align-items:flex-start;gap:6px;padding:14px;">
                  <div style="display:flex;align-items:center;gap:6px;"><div class="dot"></div><strong>Zona 3 Menit</strong></div>
                  <p style="font-size:12px;opacity:.8;line-height:1.4;font-weight:400;">Aksesibilitas sangat tinggi. Pemukiman terdekat di sekitar sekolah.</p>
                </div>
                <div class="zone-chip zone-amber" style="flex-direction:column;align-items:flex-start;gap:6px;padding:14px;">
                  <div style="display:flex;align-items:center;gap:6px;"><div class="dot"></div><strong>Zona 6 Menit</strong></div>
                  <p style="font-size:12px;opacity:.8;line-height:1.4;font-weight:400;">Aksesibilitas sedang. Menjangkau perimeter sub-kelurahan terdekat.</p>
                </div>
                <div class="zone-chip zone-red" style="flex-direction:column;align-items:flex-start;gap:6px;padding:14px;">
                  <div style="display:flex;align-items:center;gap:6px;"><div class="dot"></div><strong>Zona 10 Menit</strong></div>
                  <p style="font-size:12px;opacity:.8;line-height:1.4;font-weight:400;">Batas ambang aksesibilitas rendah bagi jangkauan harian pelajar.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Metodologi Steps -->
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <i class="fa-solid fa-list-check" style="color:var(--primary);"></i>
                Alur Metodologi
              </div>
            </div>
            <div class="card-body" style="padding-top:8px;padding-bottom:8px;">
              <?php
              $steps = [
                ['Akuisisi Data', 'Data titik SMA diperoleh dari OpenStreetMap melalui filter amenity=school di wilayah Kota Bandar Lampung, kemudian diproses di QGIS.'],
                ['Import ke PostGIS', 'Layer titik sekolah diimport ke database PostgreSQL/PostGIS dengan sistem koordinat WGS 84 (EPSG:4326) menggunakan ekstensi PostGIS.'],
                ['Penyajian via API', 'PHP API mengambil data dari tabel PostGIS dan mengkonversi kolom geometri menggunakan fungsi ST_AsGeoJSON() menjadi format GeoJSON standar.'],
                ['Rendering Leaflet.js', 'Titik-titik sekolah dirender sebagai CircleMarker interaktif di atas tile OpenStreetMap menggunakan library Leaflet.js.'],
                ['Kalkulasi Isokron', 'Untuk setiap titik sekolah, sistem memanggil OpenRouteService Isochrones API dengan batas waktu 180, 360, dan 600 detik (driving-car).'],
              ];
              foreach($steps as $i => $s): ?>
              <div class="method-step">
                <div class="step-number"><?= $i+1 ?></div>
                <div class="step-content">
                  <h4><?= $s[0] ?></h4>
                  <p><?= $s[1] ?></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Buffer Analysis -->
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <i class="fa-solid fa-draw-polygon" style="color:#F59E0B;"></i>
                Buffer Analisis Statis
              </div>
            </div>
            <div class="card-body">
              <p style="font-size:14px;color:var(--gray-600);line-height:1.7;">
                Selain zona isokron dinamis, sistem juga memuat layer <code style="background:var(--gray-100);padding:2px 6px;border-radius:4px;font-size:13px;">buffer.geojson</code> sebagai representasi spasial radius penyangga <strong>3.000 meter</strong>. Buffer ini digunakan untuk evaluasi konsentrasi cakupan administratif wilayah pendidikan secara Euclidean distance.
              </p>
            </div>
          </div>

        </div>

        <!-- Sidebar -->
        <div style="display:flex;flex-direction:column;gap:16px;">

          <!-- Data Integrity -->
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <i class="fa-solid fa-shield-check" style="color:var(--primary);"></i>
                Integritas Data
              </div>
            </div>
            <div class="card-body" style="padding-top:12px;">
              <?php
              $specs = [
                ['Sistem Koordinat',   'WGS 84 / EPSG:4326'],
                ['Total Entitas SMA',  '70 Titik Koordinat'],
                ['Tipe Geometri',      'Point (2D)'],
                ['Kategori Sekolah',   'SMA Negeri & Swasta'],
                ['Sumber Data',        'OpenStreetMap (OSM)'],
                ['Database',           'PostgreSQL + PostGIS'],
                ['Format API Output',  'GeoJSON (RFC 7946)'],
              ];
              foreach($specs as $s): ?>
              <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid var(--gray-100);">
                <span style="font-size:12px;color:var(--gray-500);font-weight:500;"><?= $s[0] ?></span>
                <span style="font-size:12.5px;color:var(--gray-800);font-weight:700;text-align:right;max-width:150px;"><?= $s[1] ?></span>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Tools Used -->
          <div class="card">
            <div class="card-header">
              <div class="card-title"><i class="fa-solid fa-toolbox" style="color:var(--success);"></i> Tools &amp; Layanan</div>
            </div>
            <div class="card-body" style="padding-top:12px;">
              <?php
              $tools = [
                ['fa-database',   '#2563EB', 'PostgreSQL + PostGIS', 'Spatial Database'],
                ['fa-map',        '#16A34A', 'Leaflet.js 1.9.4',     'Peta Interaktif'],
                ['fa-route',      '#F59E0B', 'OpenRouteService',     'Analisis Isokron'],
                ['fa-code',       '#7C3AED', 'PHP 8.2',              'Backend API'],
                ['fa-globe',      '#0EA5E9', 'OpenStreetMap',        'Tile Basemap'],
              ];
              foreach($tools as $t): ?>
              <div style="display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid var(--gray-100);">
                <div style="width:32px;height:32px;border-radius:8px;background:<?= $t[1] ?>18;color:<?= $t[1] ?>;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">
                  <i class="fa-solid <?= $t[0] ?>"></i>
                </div>
                <div>
                  <div style="font-size:13px;font-weight:600;color:var(--gray-800);"><?= $t[2] ?></div>
                  <div style="font-size:11.5px;color:var(--gray-400);"><?= $t[3] ?></div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Quick Link -->
          <a href="peta.php" class="btn btn-primary" style="justify-content:center;">
            <i class="fa-solid fa-map-location-dot"></i> Buka Peta Interaktif
          </a>
        </div>

      </div>
    </div>
  </section>

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
</div>

</body>
</html>