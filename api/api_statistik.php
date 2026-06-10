<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'db_sig_sma';
$user = 'postgres'; 
$pass = 'Farhan22.'; // <-- UBAH DENGAN PASSWORD POSTGRESQL ANDA

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Statistik Status Sekolah (Negeri vs Swasta)
    $stmtStatus = $pdo->query("
        SELECT COALESCE(\"operator:type\", 'Lainnya') AS status, COUNT(*) as total 
        FROM tabel_sekolah 
        GROUP BY \"operator:type\"
    ");
    $statusData = $stmtStatus->fetchAll(PDO::FETCH_ASSOC);

    // Statistik per Kecamatan
    // OSM usually uses addr:district or addr_district or addr:subdistrict for Kecamatan
    $stmtKecamatan = $pdo->query("
        SELECT COALESCE(\"addr:district\", \"addr:subdistrict\", \"addr:city\", 'Tidak Diketahui') AS wilayah, COUNT(*) as total 
        FROM tabel_sekolah 
        GROUP BY COALESCE(\"addr:district\", \"addr:subdistrict\", \"addr:city\", 'Tidak Diketahui')
        ORDER BY total DESC
        LIMIT 10
    ");
    $kecamatanData = $stmtKecamatan->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'status' => 'success',
        'data' => [
            'sekolah_berdasarkan_status' => $statusData,
            'sekolah_berdasarkan_wilayah' => $kecamatanData
        ]
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => "Koneksi gagal: " . $e->getMessage()
    ]);
}
?>
