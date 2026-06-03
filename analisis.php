<?php include 'includes/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight flex items-center">
            <i class="fa-solid fa-chart-line text-blue-600 mr-3"></i> Metodologi & Parameter Analisis Spasial
        </h1>
        <p class="text-gray-600 mt-1">Dokumentasi teknis pengolahan Sistem Informasi Geografis fasilitas pendidikan SMA Kota Bandar Lampung.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 lg:col-span-2 space-y-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
                    <i class="fa-solid fa-route text-green-600 mr-2"></i> Analisis Jangkauan Jalan (Isochrone Network Analysis)
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Sistem ini tidak menggunakan radius lingkaran statis "garis lurus udara" biasa, melainkan menerapkan pemodelan analisis jaringan jalan aktual via <strong>OpenRouteService API</strong>. Poligon area mencerminkan jangkauan riil kendaraan roda empat/dua dalam batasan variasi waktu:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                    <div class="p-3 bg-green-50 border border-green-200 rounded-lg">
                        <span class="font-bold text-green-700 text-sm">Zona 3 Menit</span>
                        <p class="text-xs text-gray-500 mt-1">Aksesibilitas sangat tinggi/mudah di sekitar pemukiman sekolah.</p>
                    </div>
                    <div class="p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <span class="font-bold text-yellow-700 text-sm">Zona 6 Menit</span>
                        <p class="text-xs text-gray-500 mt-1">Aksesibilitas sedang, menjangkau perimeter sub-kelurahan terdekat.</p>
                    </div>
                    <div class="p-3 bg-red-50 border border-red-200 rounded-lg">
                        <span class="font-bold text-red-700 text-sm">Zona 10 Menit</span>
                        <p class="text-xs text-gray-500 mt-1">Batas ambang aksesibilitas rendah bagi jangkauan harian pelajar.</p>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-2 flex items-center">
                    <i class="fa-solid fa-shapes text-orange-500 mr-2"></i> Buffer Analisis Tetap
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    Selain jangkauan waktu jalan dinamis, sistem memuat representasi spasial berkas <code>buffer.geojson</code> dengan radius penyangga seluas 3000 meter untuk mengevaluasi konsentrasi cakupan administratif wilayah pendidikan.
                </p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 h-fit space-y-4">
            <h3 class="text-md font-bold text-gray-900 border-b pb-2 flex items-center">
                <i class="fa-solid fa-circle-check text-blue-600 mr-2"></i> Integritas Data Spasial
            </h3>
            <div class="space-y-3">
                <div class="p-2.5 bg-gray-50 rounded-lg text-xs">
                    <span class="font-semibold text-gray-500 block">Sistem Koordinat (CRS)</span>
                    <span class="font-bold text-gray-800 text-sm">WGS 84 / EPSG:4326</span>
                </div>
                <div class="p-2.5 bg-gray-50 rounded-lg text-xs">
                    <span class="font-semibold text-gray-500 block">Sampel Entitas Valid</span>
                    <span class="font-bold text-gray-800 text-sm">71 Titik Koordinat SMA</span>
                </div>
                <div class="p-2.5 bg-gray-50 rounded-lg text-xs">
                    <span class="font-semibold text-gray-500 block">Kategori Filter Utama</span>
                    <span class="font-bold text-gray-800 text-sm">SMA Negeri & Swasta</span>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white py-6 mt-auto text-center text-sm">
    <p>&copy; 2026 WebGIS Pemetaan SMA Bandar Lampung. All Rights Reserved.</p>
</footer>
</body>
</html>