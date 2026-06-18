<?php include 'includes/header.php'; ?>

<div class="map-app" id="mapApp">

  <!-- ══════════════════════════════════════════
       LEFT SIDEBAR — Enterprise Control Panel
  ══════════════════════════════════════════ -->
  <aside class="map-sidebar" id="mapSidebar">

    <!-- Sidebar Header -->
    <div class="sidebar-header">
      <div class="sidebar-logo">
        <div class="sidebar-logo-icon"><i class="fa-solid fa-map-location-dot"></i></div>
        <div>
          <div class="sidebar-logo-title">WebGIS SMA</div>
          <div class="sidebar-logo-sub">Bandar Lampung · 2026</div>
        </div>
      </div>
      <button class="sidebar-toggle-btn" id="sidebarToggle" title="Collapse sidebar">
        <i class="fa-solid fa-chevron-left" id="sidebarToggleIcon"></i>
      </button>
    </div>

    <!-- Search -->
    <div class="sidebar-section">
      <div class="sidebar-section-label">
        <i class="fa-solid fa-magnifying-glass"></i> Pencarian Sekolah
      </div>
      <div class="map-search-wrapper" style="position:relative;">
        <div class="map-search-box">
          <i class="fa-solid fa-search" style="color:var(--text-muted);font-size:13px;"></i>
          <input type="text" id="search-sekolah" placeholder="Cari nama SMA..." autocomplete="off">
          <button id="search-clear" style="display:none;border:none;background:none;cursor:pointer;color:var(--text-muted);padding:0;" title="Hapus">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div id="search-results" class="map-search-dropdown"></div>
      </div>
    </div>

    <!-- Layer Toggle -->
    <div class="sidebar-section">
      <div class="sidebar-section-label">
        <i class="fa-solid fa-layer-group"></i> Zona Aksesibilitas
      </div>
      <p class="sidebar-section-desc">Jangkauan waktu berkendara via OpenRouteService</p>

      <div class="zone-toggle-list">
        <label class="zone-toggle-item" for="chk-hijau">
          <input type="checkbox" id="chk-hijau" checked>
          <div class="zt-color" style="background:#4ADE80;box-shadow:0 0 8px rgba(74,222,128,.5);"></div>
          <div class="zt-info">
            <div class="zt-label">≤ 3 Menit</div>
            <div class="zt-desc">Sangat Mudah Dijangkau</div>
          </div>
          <div class="zt-check" id="icon-hijau"><i class="fa-solid fa-check"></i></div>
        </label>

        <label class="zone-toggle-item" for="chk-kuning">
          <input type="checkbox" id="chk-kuning" checked>
          <div class="zt-color" style="background:#FBBF24;box-shadow:0 0 8px rgba(251,191,36,.5);"></div>
          <div class="zt-info">
            <div class="zt-label">≤ 6 Menit</div>
            <div class="zt-desc">Aksesibilitas Sedang</div>
          </div>
          <div class="zt-check" id="icon-kuning"><i class="fa-solid fa-check"></i></div>
        </label>

        <label class="zone-toggle-item" for="chk-merah">
          <input type="checkbox" id="chk-merah" checked>
          <div class="zt-color" style="background:#F87171;box-shadow:0 0 8px rgba(248,113,113,.5);"></div>
          <div class="zt-info">
            <div class="zt-label">≤ 10 Menit</div>
            <div class="zt-desc">Aksesibilitas Rendah</div>
          </div>
          <div class="zt-check" id="icon-merah"><i class="fa-solid fa-check"></i></div>
        </label>
      </div>
    </div>

    <!-- Marker Legend -->
    <div class="sidebar-section">
      <div class="sidebar-section-label">
        <i class="fa-solid fa-circle-dot"></i> Marker
      </div>
      <div class="marker-legend-item">
        <span class="marker-dot" style="background:#60A5FA;border-color:#fff;box-shadow:0 0 8px rgba(96,165,250,.6);"></span>
        <span class="marker-legend-label">Titik SMA (70 Sekolah)</span>
      </div>
    </div>

    <!-- Basemap Switcher -->
    <div class="sidebar-section">
      <div class="sidebar-section-label">
        <i class="fa-solid fa-map"></i> Basemap
      </div>
      <div class="basemap-switcher" id="basemapSwitcher">
        <button class="bm-btn bm-active" data-bm="osm" id="bm-osm">
          <i class="fa-solid fa-map"></i> OpenStreetMap
        </button>
        <button class="bm-btn" data-bm="satellite" id="bm-satellite">
          <i class="fa-solid fa-satellite"></i> Satellite
        </button>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="sidebar-section">
      <div class="sidebar-section-label">
        <i class="fa-solid fa-chart-bar"></i> Statistik Cepat
      </div>
      <div class="quick-stats">
        <div class="qs-item">
          <div class="qs-value" id="qs-total">70</div>
          <div class="qs-label">Total SMA</div>
        </div>
        <div class="qs-item">
          <div class="qs-value qs-green" id="qs-loaded">—</div>
          <div class="qs-label">Loaded</div>
        </div>
        <div class="qs-item">
          <div class="qs-value qs-amber" id="qs-zoom">12</div>
          <div class="qs-label">Zoom</div>
        </div>
      </div>
    </div>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
      <a href="index.php" class="sf-link"><i class="fa-solid fa-house"></i> Beranda</a>
      <a href="analisis.php" class="sf-link"><i class="fa-solid fa-chart-pie"></i> Analisis</a>
      <a href="data-sekolah.php" class="sf-link"><i class="fa-solid fa-table-list"></i> Data</a>
    </div>
  </aside>

  <!-- ══════════════════════════════════════════
       MAIN MAP AREA
  ══════════════════════════════════════════ -->
  <div class="map-main" id="mapMain">

    <!-- Top Toolbar -->
    <div class="map-toolbar" id="mapToolbar">
      <div class="toolbar-left">
        <button class="tb-btn" id="btnZoomIn"   title="Zoom In">  <i class="fa-solid fa-plus"></i></button>
        <button class="tb-btn" id="btnZoomOut"  title="Zoom Out"> <i class="fa-solid fa-minus"></i></button>
        <div class="tb-divider"></div>
        <button class="tb-btn" id="btnFitBounds" title="Fit to Data"><i class="fa-solid fa-expand"></i></button>
        <button class="tb-btn" id="btnLocate"    title="My Location"><i class="fa-solid fa-location-crosshairs"></i></button>
        <div class="tb-divider"></div>
        <button class="tb-btn" id="btnResetView" title="Reset View"><i class="fa-solid fa-rotate-left"></i></button>
      </div>
      <div class="toolbar-center">
        <span class="toolbar-title">
          <i class="fa-solid fa-map-location-dot" style="color:var(--brand-400);"></i>
          Peta Sebaran SMA — Kota Bandar Lampung
        </span>
      </div>
      <div class="toolbar-right">
        <div class="coord-display" id="coordDisplay">
          <i class="fa-solid fa-crosshairs" style="color:var(--text-muted);font-size:11px;"></i>
          <span id="coordText">Arahkan kursor ke peta</span>
        </div>
      </div>
    </div>

    <!-- Map Container -->
    <div id="map"></div>

    <!-- Map Loading Overlay -->
    <div class="map-loading" id="mapLoading">
      <div class="map-loading-inner">
        <div class="loading-spinner"></div>
        <div class="loading-text">Memuat Data Sekolah…</div>
        <div class="loading-sub">Menghitung zona aksesibilitas via ORS</div>
      </div>
    </div>

    <!-- Bottom Status Bar -->
    <div class="map-statusbar">
      <div class="sb-left">
        <span class="sb-badge sb-blue">
          <i class="fa-solid fa-database"></i> PostGIS
        </span>
        <span class="sb-badge sb-green" id="sb-status">
          <i class="fa-solid fa-circle" style="font-size:7px;"></i> Memuat…
        </span>
      </div>
      <div class="sb-center">
        <span class="sb-info" id="sb-center-info">
          <i class="fa-solid fa-globe"></i> WGS 84 · EPSG:4326
        </span>
      </div>
      <div class="sb-right">
        <span class="sb-info">
          <i class="fa-solid fa-route"></i> ORS API
        </span>
        <span class="sb-info">
          <i class="fa-solid fa-map"></i> Leaflet 1.9.4
        </span>
      </div>
    </div>
  </div>

</div><!-- /map-app -->

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="app.js"></script>
<script>
// ── Sidebar Toggle ─────────────────────────────────────────────
const sidebar     = document.getElementById('mapSidebar');
const mapMain     = document.getElementById('mapMain');
const toggleBtn   = document.getElementById('sidebarToggle');
const toggleIcon  = document.getElementById('sidebarToggleIcon');

toggleBtn.addEventListener('click', () => {
  const collapsed = sidebar.classList.toggle('sidebar-collapsed');
  toggleIcon.style.transform = collapsed ? 'rotate(180deg)' : '';
  // Invalidate map size after transition
  setTimeout(() => { if(typeof map !== 'undefined') map.invalidateSize(); }, 320);
});

// ── Custom Toolbar Buttons ────────────────────────────────────
document.getElementById('btnZoomIn').addEventListener('click',  () => map.zoomIn());
document.getElementById('btnZoomOut').addEventListener('click', () => map.zoomOut());
document.getElementById('btnResetView').addEventListener('click', () => map.setView([-5.429, 105.261], 12));
document.getElementById('btnFitBounds').addEventListener('click', () => {
  if (typeof smaLayer !== 'undefined' && smaLayer) {
    try { map.fitBounds(smaLayer.getBounds(), { padding: [40, 40] }); } catch(e) {}
  }
});
document.getElementById('btnLocate').addEventListener('click', () => {
  map.locate({ setView: true, maxZoom: 16 });
});

// ── Basemap Switcher ──────────────────────────────────────────
document.querySelectorAll('.bm-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.bm-btn').forEach(b => b.classList.remove('bm-active'));
    btn.classList.add('bm-active');
    const bm = btn.dataset.bm;
    if (bm === 'osm') {
      map.removeLayer(satellite); map.addLayer(osm);
    } else {
      map.removeLayer(osm); map.addLayer(satellite);
    }
  });
});

// ── Coordinate display ────────────────────────────────────────
map.on('mousemove', (e) => {
  const lat = e.latlng.lat.toFixed(5);
  const lng = e.latlng.lng.toFixed(5);
  document.getElementById('coordText').textContent = `${lat}, ${lng}`;
});

// ── Zoom level display ────────────────────────────────────────
map.on('zoomend', () => {
  document.getElementById('qs-zoom').textContent = map.getZoom();
});

// ── Watch data load and update status ────────────────────────
const origFetch = window.fetch;
window.fetch = function(...args) {
  return origFetch.apply(this, args).then(res => {
    if (args[0] && String(args[0]).includes('api_sekolah')) {
      res.clone().json().then(data => {
        if (data && data.features) {
          const total = data.features.length;
          document.getElementById('qs-loaded').textContent = total;
          document.getElementById('sb-status').innerHTML =
            `<i class="fa-solid fa-circle" style="font-size:7px;color:#4ADE80;"></i> ${total} SMA Loaded`;
          document.getElementById('mapLoading').style.opacity = '0';
          setTimeout(() => {
            document.getElementById('mapLoading').style.display = 'none';
          }, 500);
        }
      }).catch(() => {});
    }
    return res;
  });
};

// ── Fallback hide loader ───────────────────────────────────────
setTimeout(() => {
  const loader = document.getElementById('mapLoading');
  if (loader) { loader.style.opacity = '0'; setTimeout(() => loader.style.display = 'none', 500); }
}, 8000);
</script>

</body>
</html>