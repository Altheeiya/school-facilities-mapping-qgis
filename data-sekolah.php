<?php include 'includes/header.php'; ?>

<!-- ===== DATA SEKOLAH PAGE ===== -->
<main class="data-page" id="data-page">

    <!-- Page Header -->
    <div class="page-header" id="data-page-header">
        <h1>
            <div class="icon-badge"><i class="fa-solid fa-list"></i></div>
            Data Sekolah Menengah Atas
        </h1>
        <p>Daftar lengkap SMA di Kota Bandar Lampung berdasarkan data koordinat spasial dari database PostgreSQL/PostGIS.</p>
    </div>

    <!-- Table Container -->
    <div class="table-wrap" id="table-container">
        <div class="table-scroll">
            <table id="tabel-sekolah" aria-label="Tabel data sekolah menengah atas">
                <thead>
                    <tr>
                        <th scope="col">Nama Sekolah</th>
                        <th scope="col">Jenjang</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Lintang</th>
                        <th scope="col">Bujur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ── Database Configuration ──────────────────────────────────
                    $host   = 'localhost';
                    $dbname = 'db_sig_sma';
                    $user   = 'postgres';
                    $pass   = 'password_anda_disini'; // <-- UBAH DENGAN PASSWORD POSTGRESQL ANDA

                    try {
                        $pdo  = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // ST_Y = Latitude, ST_X = Longitude
                        $stmt = $pdo->query("SELECT *, ST_Y(geom) AS lat, ST_X(geom) AS lng FROM tabel_sekolah ORDER BY name ASC");

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $nama = isset($row['name']) ? htmlspecialchars($row['name']) : 'Tanpa Nama';
                                $city = isset($row['addr:city'])
                                    ? htmlspecialchars($row['addr:city'])
                                    : (isset($row['addr_city']) ? htmlspecialchars($row['addr_city']) : 'Bandar Lampung');
                                $lat  = number_format($row['lat'], 6);
                                $lng  = number_format($row['lng'], 6);
                                echo "
                                <tr>
                                    <td class='td-name'>$nama</td>
                                    <td><span class='badge badge-blue'>SMA</span></td>
                                    <td>$city</td>
                                    <td class='mono'>$lat</td>
                                    <td class='mono'>$lng</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='tbl-empty'>
                                    <i class='fa-solid fa-database' style='opacity:0.3;font-size:2rem;display:block;margin-bottom:10px;'></i>
                                    Data belum ada di tabel.
                                  </td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "<tr><td colspan='5' class='tbl-error'>
                                <i class='fa-solid fa-triangle-exclamation' style='margin-right:8px;'></i>
                                Gagal terhubung ke Database: " . htmlspecialchars($e->getMessage()) . "
                              </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<!-- ===== FOOTER ===== -->
<footer class="site-footer" id="data-footer">
    <p>&copy; 2026 WebGIS Pemetaan SMA Bandar Lampung. All Rights Reserved.</p>
</footer>

</body>
</html>