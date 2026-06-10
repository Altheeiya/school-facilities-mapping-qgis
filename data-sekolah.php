<?php
include 'includes/header.php';

// DB Config
$host = 'localhost'; $dbname = 'db_sig_sma';
$user = 'postgres';  $pass  = 'Farhan22.';

$sekolah = [];
$error   = null;
$total   = 0;

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT id, name, \"addr:city\", \"addr:street\", ST_Y(geom) AS lat, ST_X(geom) AS lng FROM tabel_sekolah ORDER BY name ASC");
    $sekolah = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = count($sekolah);
} catch (PDOException $e) {
    $error = $e->getMessage();
}
?>

<div class="page-wrapper">
  <section class="section">
    <div class="container">

      <!-- Page Header -->
      <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:16px;margin-bottom:28px;">
        <div>
          <div class="section-eyebrow">Database PostGIS</div>
          <h1 class="section-title">Data Sekolah Menengah Atas</h1>
          <p style="font-size:14.5px;color:var(--gray-500);margin-top:4px;">
            Menampilkan <strong style="color:var(--gray-800);"><?= $total ?> sekolah</strong> yang terdaftar di Kota Bandar Lampung.
          </p>
        </div>
        <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
          <div class="search-bar" style="width:260px;">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="tbl-search" placeholder="Filter nama sekolah..." oninput="filterTable(this.value)">
          </div>
          <a href="peta.php" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-map-location-dot"></i> Lihat di Peta
          </a>
        </div>
      </div>

      <?php if ($error): ?>
      <div style="background:var(--danger-light);border:1px solid #FCA5A5;border-radius:var(--radius);padding:16px 20px;display:flex;gap:12px;align-items:center;margin-bottom:24px;">
        <i class="fa-solid fa-circle-exclamation" style="color:var(--danger);"></i>
        <div>
          <strong style="color:var(--danger);font-size:14px;">Gagal terhubung ke database</strong>
          <p style="font-size:13px;color:var(--gray-600);margin-top:2px;"><?= htmlspecialchars($error) ?></p>
        </div>
      </div>
      <?php endif; ?>

      <!-- Stats Row -->
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px;margin-bottom:24px;">
        <?php
        $negeri  = count(array_filter($sekolah, fn($r) => stripos($r['name'],'SMAN')!==false || stripos($r['name'],'SMA N')!==false || stripos($r['name'],'SMA NEGERI')!==false));
        $swasta  = $total - $negeri;
        ?>
        <div style="background:#fff;border:1px solid var(--gray-200);border-radius:var(--radius);padding:16px 20px;display:flex;align-items:center;gap:12px;">
          <div class="stat-icon blue" style="width:38px;height:38px;font-size:15px;border-radius:10px;"><i class="fa-solid fa-graduation-cap"></i></div>
          <div><div class="stat-label">Total SMA</div><div class="stat-value" style="font-size:20px;"><?= $total ?></div></div>
        </div>
        <div style="background:#fff;border:1px solid var(--gray-200);border-radius:var(--radius);padding:16px 20px;display:flex;align-items:center;gap:12px;">
          <div class="stat-icon green" style="width:38px;height:38px;font-size:15px;border-radius:10px;"><i class="fa-solid fa-building-columns"></i></div>
          <div><div class="stat-label">SMA Negeri</div><div class="stat-value" style="font-size:20px;"><?= $negeri ?></div></div>
        </div>
        <div style="background:#fff;border:1px solid var(--gray-200);border-radius:var(--radius);padding:16px 20px;display:flex;align-items:center;gap:12px;">
          <div class="stat-icon amber" style="width:38px;height:38px;font-size:15px;border-radius:10px;"><i class="fa-solid fa-school"></i></div>
          <div><div class="stat-label">SMA Swasta</div><div class="stat-value" style="font-size:20px;"><?= $swasta ?></div></div>
        </div>
      </div>

      <!-- Table -->
      <div class="table-wrapper">
        <table class="data-table" id="sekolah-table">
          <thead>
            <tr>
              <th style="width:48px;">#</th>
              <th>Nama Sekolah</th>
              <th>Status</th>
              <th>Kota</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th style="width:80px;"></th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($sekolah) && !$error): ?>
            <tr>
              <td colspan="7" style="text-align:center;padding:40px;color:var(--gray-400);">
                <i class="fa-solid fa-inbox" style="font-size:28px;display:block;margin-bottom:10px;"></i>
                Tidak ada data sekolah.
              </td>
            </tr>
            <?php else: ?>
            <?php foreach($sekolah as $i => $row):
              $nama  = htmlspecialchars($row['name'] ?? 'Tanpa Nama');
              $kota  = htmlspecialchars($row['addr:city'] ?? 'Bandar Lampung');
              $lat   = number_format((float)$row['lat'], 6);
              $lng   = number_format((float)$row['lng'], 6);
              $isNeg = stripos($nama, 'SMAN') !== false || stripos($nama, 'SMA N ') !== false;
              $statusClass = $isNeg ? 'badge-green' : 'badge-blue';
              $statusText  = $isNeg ? 'Negeri' : 'Swasta';
            ?>
            <tr>
              <td style="color:var(--gray-400);font-size:12px;"><?= $i+1 ?></td>
              <td>
                <div style="font-weight:600;color:var(--gray-900);font-size:13.5px;"><?= $nama ?></div>
              </td>
              <td><span class="badge <?= $statusClass ?>"><?= $statusText ?></span></td>
              <td style="color:var(--gray-600);"><?= $kota ?></td>
              <td class="font-mono" style="font-size:12px;color:var(--gray-500);"><?= $lat ?></td>
              <td class="font-mono" style="font-size:12px;color:var(--gray-500);"><?= $lng ?></td>
              <td>
                <a href="peta.php" class="btn btn-sm btn-outline" style="padding:5px 10px;font-size:11.5px;gap:4px;" title="Lihat di peta">
                  <i class="fa-solid fa-location-dot"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Table Footer -->
      <div style="margin-top:12px;display:flex;justify-content:space-between;align-items:center;">
        <span style="font-size:12.5px;color:var(--gray-400);" id="tbl-count">
          Menampilkan <?= $total ?> dari <?= $total ?> data
        </span>
        <span style="font-size:12.5px;color:var(--gray-400);">
          <i class="fa-solid fa-database" style="margin-right:4px;"></i>PostgreSQL · db_sig_sma · tabel_sekolah
        </span>
      </div>

    </div>
  </section>

  <footer class="site-footer">
    <div class="footer-inner">
      <div>
        <div class="footer-brand">WebGIS SMA Bandar Lampung</div>
        <div style="margin-top:4px;">© 2026 · Analisis Pemerataan Aksesibilitas Pendidikan</div>
      </div>
      <div class="footer-links">
        <a href="index.php">Beranda</a>
        <a href="peta.php">Peta</a>
        <a href="analisis.php">Metodologi</a>
        <a href="data-sekolah.php">Data</a>
      </div>
    </div>
  </footer>
</div>

<script>
function filterTable(q) {
  const rows  = document.querySelectorAll('#sekolah-table tbody tr');
  const lower = q.toLowerCase().trim();
  let visible = 0;
  rows.forEach(r => {
    const name = r.cells[1]?.textContent.toLowerCase() || '';
    const show = lower === '' || name.includes(lower);
    r.style.display = show ? '' : 'none';
    if (show) visible++;
  });
  document.getElementById('tbl-count').textContent =
    `Menampilkan ${visible} dari <?= $total ?> data`;
}
</script>

</body>
</html>