<?php include 'includes/header.php'; ?>

<div class="peta-layout" style="position:relative;">

  <!-- Search Bar - Floating Top Center -->
  <div class="map-search-wrapper">
    <div class="map-search-box">
      <i class="fa-solid fa-magnifying-glass" style="color:var(--gray-400);font-size:13px;"></i>
      <input type="text" id="search-sekolah" placeholder="Cari nama SMA di Bandar Lampung..." autocomplete="off">
      <button id="search-clear" style="display:none;border:none;background:none;cursor:pointer;color:var(--gray-400);padding:0;" title="Hapus">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>
    <div id="search-results" class="map-search-dropdown"></div>
  </div>

  <!-- Legend Panel - Floating Left -->
  <div class="map-legend">
    <div class="map-legend-title">
      <i class="fa-solid fa-layer-group" style="color:var(--primary);"></i>
      Zona Aksesibilitas
    </div>
    <p class="map-legend-sub">Jangkauan waktu berkendara via ORS</p>

    <label class="legend-item" for="chk-hijau">
      <input type="checkbox" id="chk-hijau" checked style="display:none;">
      <span class="legend-dot" style="background:#16A34A;"></span>
      <span class="legend-label">≤ 3 Menit <br><small style="color:var(--gray-400);font-weight:400;">Sangat mudah</small></span>
      <i class="fa-solid fa-check legend-check" id="icon-hijau" style="color:#16A34A;"></i>
    </label>

    <label class="legend-item" for="chk-kuning">
      <input type="checkbox" id="chk-kuning" checked style="display:none;">
      <span class="legend-dot" style="background:#F59E0B;"></span>
      <span class="legend-label">≤ 6 Menit <br><small style="color:var(--gray-400);font-weight:400;">Sedang</small></span>
      <i class="fa-solid fa-check legend-check" id="icon-kuning" style="color:#F59E0B;"></i>
    </label>

    <label class="legend-item" for="chk-merah">
      <input type="checkbox" id="chk-merah" checked style="display:none;">
      <span class="legend-dot" style="background:#DC2626;"></span>
      <span class="legend-label">≤ 10 Menit <br><small style="color:var(--gray-400);font-weight:400;">Rendah</small></span>
      <i class="fa-solid fa-check legend-check" id="icon-merah" style="color:#DC2626;"></i>
    </label>

    <div class="legend-divider"></div>

    <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
      <span style="width:10px;height:10px;border-radius:50%;background:#2563EB;border:2px solid #fff;box-shadow:0 0 0 1px #2563EB;display:inline-block;"></span>
      <span style="font-size:12px;color:var(--gray-600);font-weight:500;">Titik SMA</span>
    </div>

    <p class="legend-footer">
      <i class="fa-solid fa-circle-info" style="margin-right:4px;"></i>
      Klik titik untuk info sekolah. Klik zona untuk detail jangkauan.
    </p>
  </div>

  <!-- Map Container -->
  <div id="map"></div>

</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="app.js"></script>

</body>
</html>