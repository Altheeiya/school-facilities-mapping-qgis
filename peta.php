<?php include 'includes/header.php'; ?>

<!-- ===== MAP PAGE WRAPPER ===== -->
<div class="map-page" id="map-page-wrapper">

    <!-- Search Bar Overlay -->
    <div class="map-search" id="map-search-container">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input
                type="text"
                id="search-sekolah"
                placeholder="Cari nama SMA di Bandar Lampung..."
                autocomplete="off"
                aria-label="Cari nama sekolah"
            >
        </div>
        <div id="search-results" class="hidden"></div>
    </div>

    <!-- Legend Panel -->
    <aside class="map-legend" id="map-legend" aria-label="Legenda peta aksesibilitas">
        <div class="legend-head">
            <i class="fa-solid fa-sliders"></i>
            Aksesibilitas
        </div>
        <p class="legend-sub">Zona jangkauan berkendara (ORS)</p>

        <label class="legend-row" for="chk-hijau">
            <input type="checkbox" id="chk-hijau" checked>
            <span class="ldot g"></span>
            <span class="legend-lbl">Mudah (&le; 3 Menit)</span>
        </label>

        <label class="legend-row" for="chk-kuning">
            <input type="checkbox" id="chk-kuning" checked>
            <span class="ldot y"></span>
            <span class="legend-lbl">Sedang (&le; 6 Menit)</span>
        </label>

        <label class="legend-row" for="chk-merah">
            <input type="checkbox" id="chk-merah" checked>
            <span class="ldot r"></span>
            <span class="legend-lbl">Rendah (&le; 10 Menit)</span>
        </label>

        <hr class="legend-hr">

        <p class="legend-note">
            <i class="fa-solid fa-circle-info" style="margin-right:4px;"></i>
            Titik = SMA. Area = batas kecamatan.
        </p>
    </aside>

    <!-- Filter Panel -->
    <aside class="map-legend" id="map-filter" aria-label="Filter Data Sekolah" style="top: 310px;">
        <div class="legend-head">
            <i class="fa-solid fa-filter"></i>
            Filter Sekolah
        </div>
        <p class="legend-sub">Pilih status sekolah</p>

        <label class="legend-row" for="filter-semua">
            <input type="radio" name="filter-status" id="filter-semua" value="all" checked>
            <span class="legend-lbl">Semua Sekolah</span>
        </label>
        <label class="legend-row" for="filter-negeri">
            <input type="radio" name="filter-status" id="filter-negeri" value="public">
            <span class="legend-lbl">SMA Negeri</span>
        </label>
        <label class="legend-row" for="filter-swasta">
            <input type="radio" name="filter-status" id="filter-swasta" value="private">
            <span class="legend-lbl">SMA Swasta</span>
        </label>
    </aside>

    <!-- Leaflet Map -->
    <div id="map" aria-label="Peta interaktif sebaran SMA Bandar Lampung"></div>

</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="app.js"></script>

</body>
</html>