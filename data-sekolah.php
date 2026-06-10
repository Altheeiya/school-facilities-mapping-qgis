<tbody class="divide-y divide-gray-200 text-gray-600">
    <?php
    // Konfigurasi Database
    $host = 'localhost';
    $dbname = 'db_sig_sma';
    $user = 'postgres';
    $pass = 'Farhan22.'; // Password PostgreSQL

    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
        
        // ST_Y digunakan untuk mengambil Lintang (Latitude)
        // ST_X digunakan untuk mengambil Bujur (Longitude)
        $query = "SELECT *, ST_Y(geom) AS lat, ST_X(geom) AS lng FROM tabel_sekolah";
        $stmt = $pdo->query($query);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Deteksi nama dan kota, sesuaikan dengan nama kolom hasil import QGIS
                $nama = isset($row['name']) ? htmlspecialchars($row['name']) : 'Tanpa Nama';
                // Karena di GeoJSON sebelumnya propertinya "addr:city", QGIS biasanya mengubahnya menjadi "addr_city" atau "addr:city"
                $city = isset($row['addr:city']) ? htmlspecialchars($row['addr:city']) : (isset($row['addr_city']) ? htmlspecialchars($row['addr_city']) : 'Bandar Lampung');
                
                // Format angka koordinat agar tidak terlalu panjang
                $lat = number_format($row['lat'], 6);
                $lng = number_format($row['lng'], 6);

                echo "<tr class='hover:bg-gray-50 transition'>";
                echo "<td class='px-6 py-4 font-bold text-gray-900'>$nama</td>";
                echo "<td class='px-6 py-4'><span class='px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800'>SMA</span></td>";
                echo "<td class='px-6 py-4'>$city</td>";
                echo "<td class='px-6 py-4 font-mono text-xs text-gray-500'>$lat</td>";
                echo "<td class='px-6 py-4 font-mono text-xs text-gray-500'>$lng</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='px-6 py-4 text-center text-red-500'>Data belum ada di tabel.</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='5' class='px-6 py-4 text-center text-red-500'>Gagal terhubung ke Database: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
    ?>
</tbody>