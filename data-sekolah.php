<?php include 'includes/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight flex items-center">
            <i class="fa-solid fa-list-check text-blue-600 mr-3"></i> Atribut Database Geografis SMA
        </h1>
        <p class="text-gray-600 mt-1">Daftar tabel tabular data spasial dari berkas <code>data/sma.geojson</code>.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                <thead class="bg-gray-50 text-gray-700 font-semibold uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Nama Sekolah</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Kota Administratif</th>
                        <th class="px-6 py-4">Garis Lintang (Lat)</th>
                        <th class="px-6 py-4">Garis Bujur (Lng)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600">
                    <?php
                    $jsonFile = 'data/sma.geojson';
                    if (file_exists($jsonFile)) {
                        $jsonData = json_decode(file_get_contents($jsonFile), true);
                        
                        if (isset($jsonData['features'])) {
                            foreach ($jsonData['features'] as $feature) {
                                $props = $feature['properties'];
                                $geom = $feature['geometry'];
                                
                                // Deteksi nama sekolah
                                $nama = isset($props['name']) ? htmlspecialchars($props['name']) : 'Tanpa Nama';
                                $city = isset($props['addr:city']) ? htmlspecialchars($props['addr:city']) : 'Bandar Lampung';
                                
                                // Koordinat GeoJSON: [bujur, lintang]
                                $lng = isset($geom['coordinates'][0]) ? $geom['coordinates'][0] : '-';
                                $lat = isset($geom['coordinates'][1]) ? $geom['coordinates'][1] : '-';
                                
                                echo "<tr class='hover:bg-gray-50 transition'>";
                                echo "<td class='px-6 py-4 font-bold text-gray-900'>$nama</td>";
                                echo "<td class='px-6 py-4'><span class='px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800'>SMA</span></td>";
                                echo "<td class='px-6 py-4'>$city</td>";
                                echo "<td class='px-6 py-4 font-mono text-xs text-gray-500'>$lat</td>";
                                echo "<td class='px-6 py-4 font-mono text-xs text-gray-500'>$lng</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='px-6 py-4 text-center text-red-500'>Format GeoJSON tidak valid.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='px-6 py-4 text-center text-red-500'>Berkas data/sma.geojson tidak ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white py-6 mt-auto text-center text-sm">
    <p>&copy; 2026 WebGIS Pemetaan SMA Bandar Lampung. All Rights Reserved.</p>
</footer>
</body>
</html>