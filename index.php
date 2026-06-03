<?php include 'includes/header.php'; ?>

<div class="bg-gradient-to-r py-20 text-white" style="background-image: linear-gradient(to right, #1d4ed8, #1e40af);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">
            Analisis Pemerataan Aksesibilitas SMA Kota Bandar Lampung
        </h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto mb-8">
            Sistem Informasi Geografis berbasis web untuk memetakan sebaran spasial, jangkauan pelayanan, dan analisis isokron waktu tempuh berkendara menuju SMA di Kota Bandar Lampung.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="peta.php" class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold px-6 py-3 rounded-lg shadow-lg transition transform hover:-translate-y-0.5">
                <i class="fa-solid fa-map mr-2"></i> Buka Peta Interaktif
            </a>
            <a href="analisis.php" class="bg-white hover:bg-gray-100 text-blue-700 font-semibold px-6 py-3 rounded-lg shadow-lg transition">
                Lihat Metodologi <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Total SMA Terdata</p>
                <p class="text-3xl font-bold text-gray-900">71</p> </div>
            <i class="fa-solid fa-graduation-cap text-3xl text-gray-300"></i>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Sistem Proyeksi</p>
                <p class="text-2xl font-bold text-gray-900">WGS 84 (EPSG:4326)</p>
            </div>
            <i class="fa-solid fa-earth-asia text-3xl text-gray-300"></i>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Parameter Aksesibilitas</p>
                <p class="text-xl font-bold text-gray-900">3, 6, dan 10 Menit</p>
            </div>
            <i class="fa-solid fa-route text-3xl text-gray-300"></i>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Fitur Utama WebGIS</h2>
        <p class="text-gray-600 mt-2">Mendukung visualisasi spasial lanjut untuk perencanaan zonasi wilayah pendidikan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600 text-xl">
                <i class="fa-solid fa-circle-dot"></i>
            </div>
            <h3 class="text-lg font-bold mb-2">Sebaran 71 Titik SMA</h3>
            <p class="text-gray-600 text-sm">
                Menyajikan pemetaan lokasi Sekolah Menengah Atas (Negeri & Swasta) secara presisi berdasarkan koordinat lintang dan bujur asli.
            </p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 text-green-600 text-xl">
                <i class="fa-solid fa-network-wired"></i>
            </div>
            <h3 class="text-lg font-bold mb-2">Jangkauan Isokron Dinamis</h3>
            <p class="text-gray-600 text-sm">
                Analisis area cakupan menggunakan OpenRouteService API berdasarkan waktu tempuh kendaraan riil melewati jaringan jalan sekitar sekolah.
            </p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 text-yellow-600 text-xl">
                <i class="fa-solid fa-draw-polygon"></i>
            </div>
            <h3 class="text-lg font-bold mb-2">Pemerataan Kecamatan</h3>
            <p class="text-gray-600 text-sm">
                Visualisasi peta tematik (Choropleth) poligon kecamatan yang menggambarkan nilai indeks tingkat pemerataan sarana pendidikan.
            </p>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white py-6 mt-auto text-center text-sm">
    <p>&copy; 2026 WebGIS Pemetaan SMA Bandar Lampung. All Rights Reserved.</p>
</footer>
</body>
</html>