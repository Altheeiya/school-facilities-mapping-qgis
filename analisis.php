<?php include 'includes/header.php'; ?>

<!-- ===== ANALYSIS PAGE ===== -->
<main class="analisis-page" id="analisis-page">

    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <div class="icon-badge"><i class="fa-solid fa-chart-line"></i></div>
            Metodologi &amp; Parameter Spasial
        </h1>
        <p>Dokumentasi teknis pengolahan Sistem Informasi Geografis fasilitas pendidikan SMA Kota Bandar Lampung.</p>
    </div>

    <!-- Content Grid -->
    <div class="analisis-grid" id="analisis-grid">

        <!-- Main Content Card -->
        <div class="glass-card analisis-main" id="analisis-main">

            <!-- Section 1: Isochrone -->
            <div class="a-section" id="section-isochrone">
                <div class="a-section-title">
                    <div class="ti green"><i class="fa-solid fa-route"></i></div>
                    Analisis Jangkauan Jalan (Isochrone Network)
                </div>
                <p>
                    Sistem ini tidak menggunakan radius lingkaran statis "garis lurus udara" biasa, melainkan menerapkan pemodelan analisis jaringan jalan aktual via <strong>OpenRouteService API</strong>. Poligon area mencerminkan jangkauan riil kendaraan roda empat/dua dalam batasan variasi waktu:
                </p>

                <!-- Zona Badges -->
                <div class="zona-grid" id="zona-grid">
                    <div class="zona-card g" id="zona-3">
                        <div class="zona-card-title">
                            <i class="fa-solid fa-circle-check"></i> Zona 3 Menit
                        </div>
                        <p>Aksesibilitas sangat tinggi / mudah di sekitar pemukiman sekolah.</p>
                    </div>
                    <div class="zona-card y" id="zona-6">
                        <div class="zona-card-title">
                            <i class="fa-solid fa-circle-half-stroke"></i> Zona 6 Menit
                        </div>
                        <p>Aksesibilitas sedang, menjangkau perimeter sub-kelurahan terdekat.</p>
                    </div>
                    <div class="zona-card r" id="zona-10">
                        <div class="zona-card-title">
                            <i class="fa-solid fa-circle-xmark"></i> Zona 10 Menit
                        </div>
                        <p>Batas ambang aksesibilitas rendah bagi jangkauan harian pelajar.</p>
                    </div>
                </div>
            </div>

            <hr class="a-divider">

            <!-- Section 2: Buffer -->
            <div class="a-section" id="section-buffer">
                <div class="a-section-title">
                    <div class="ti amber"><i class="fa-solid fa-shapes"></i></div>
                    Buffer Analisis Tetap
                </div>
                <p>
                    Selain jangkauan waktu jalan dinamis, sistem memuat representasi spasial berkas <code>buffer.geojson</code> dengan radius penyangga seluas <strong>3000 meter</strong> untuk mengevaluasi konsentrasi cakupan administratif wilayah pendidikan.
                </p>
            </div>

            <hr class="a-divider">

            <!-- Section 3: Statistik Dashboard -->
            <div class="a-section" id="section-statistik">
                <div class="a-section-title">
                    <div class="ti blue" style="background: var(--rb-50); color: var(--accent); border: 1px solid var(--glass-border);"><i class="fa-solid fa-chart-pie"></i></div>
                    Dashboard Statistik Sekolah
                </div>
                <p>
                    Distribusi jumlah sekolah menengah atas di Kota Bandar Lampung berdasarkan tipe kepemilikan (Negeri/Swasta) dan sebaran per wilayah.
                </p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 24px;">
                    <div class="glass-card" style="padding: 20px; background: #fff;">
                        <h4 style="text-align: center; font-size: 0.85rem; font-weight: 800; color: var(--text-primary); margin-bottom: 16px;">Proporsi Status Sekolah</h4>
                        <canvas id="chartStatus" width="400" height="300"></canvas>
                    </div>
                    <div class="glass-card" style="padding: 20px; background: #fff;">
                        <h4 style="text-align: center; font-size: 0.85rem; font-weight: 800; color: var(--text-primary); margin-bottom: 16px;">Top 10 Wilayah Terbanyak</h4>
                        <canvas id="chartWilayah" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sidebar: Data Integrity -->
        <div class="glass-card analisis-sidebar" id="analisis-sidebar">
            <div class="sidebar-title">
                <i class="fa-solid fa-shield-halved"></i>
                Integritas Data
            </div>

            <div class="data-row" id="data-crs">
                <div class="dr-label">Sistem Koordinat (CRS)</div>
                <div class="dr-val">WGS 84 / EPSG:4326</div>
            </div>

            <div class="data-row" id="data-sampel">
                <div class="dr-label">Sampel Valid</div>
                <div class="dr-val">71 Titik SMA</div>
            </div>

            <div class="data-row" id="data-kategori">
                <div class="dr-label">Kategori Filter</div>
                <div class="dr-val">SMA Negeri &amp; Swasta</div>
            </div>

            <div class="data-row" id="data-api">
                <div class="dr-label">API Isokron</div>
                <div class="dr-val">OpenRouteService v2</div>
            </div>
        </div>

    </div>
</main>

<!-- ===== FOOTER ===== -->
<footer class="site-footer" id="analisis-footer">
    <p>&copy; 2026 WebGIS Pemetaan SMA Bandar Lampung. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('api/api_statistik.php')
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success') {
                // Render Chart Status
                const statusCtx = document.getElementById('chartStatus').getContext('2d');
                const statusLabels = data.data.sekolah_berdasarkan_status.map(item => item.status.toUpperCase());
                const statusCounts = data.data.sekolah_berdasarkan_status.map(item => parseInt(item.total));
                
                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: {
                        labels: statusLabels,
                        datasets: [{
                            data: statusCounts,
                            backgroundColor: ['#2176c8', '#16a34a', '#d97706'],
                            borderWidth: 0
                        }]
                    },
                    options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
                });

                // Render Chart Wilayah
                const wilayahCtx = document.getElementById('chartWilayah').getContext('2d');
                const wilayahLabels = data.data.sekolah_berdasarkan_wilayah.map(item => item.wilayah);
                const wilayahCounts = data.data.sekolah_berdasarkan_wilayah.map(item => parseInt(item.total));
                
                new Chart(wilayahCtx, {
                    type: 'bar',
                    data: {
                        labels: wilayahLabels,
                        datasets: [{
                            label: 'Jumlah Sekolah',
                            data: wilayahCounts,
                            backgroundColor: '#2176c8',
                            borderRadius: 4
                        }]
                    },
                    options: { 
                        responsive: true, 
                        plugins: { legend: { display: false } },
                        scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                    }
                });
            }
        })
        .catch(error => console.error('Error fetching statistics:', error));
});
</script>

</body>
</html>