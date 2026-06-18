<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebGIS SMA Bandar Lampung — Pemerataan Aksesibilitas Pendidikan</title>
  <meta name="description" content="Platform WebGIS enterprise untuk analisis pemerataan aksesibilitas Sekolah Menengah Atas (SMA) di Kota Bandar Lampung — sebaran spasial, isokron waktu tempuh, dan distribusi 70 sekolah berbasis PostGIS.">
  <meta name="theme-color" content="#0B1120">
  <meta property="og:title" content="WebGIS SMA Bandar Lampung">
  <meta property="og:description" content="Platform pemetaan sebaran dan aksesibilitas SMA di Bandar Lampung berbasis analisis jaringan jalan.">
  <meta property="og:type" content="website">
  <!-- Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <div class="navbar-inner">
    <a href="index.php" class="navbar-brand">
      <div class="brand-icon"><i class="fa-solid fa-map-location-dot"></i></div>
      <div class="brand-text">
        <span class="brand-title">WebGIS SMA</span>
        <span class="brand-sub">Bandar Lampung</span>
      </div>
    </a>

    <ul class="navbar-nav">
      <li>
        <a href="index.php" <?php if($current_page=='index.php') echo 'class="active"'; ?>>
          <i class="fa-solid fa-house"></i> Beranda
        </a>
      </li>
      <li>
        <a href="peta.php" <?php if($current_page=='peta.php') echo 'class="active"'; ?>>
          <i class="fa-solid fa-map"></i> Peta Interaktif
        </a>
      </li>
      <li>
        <a href="analisis.php" <?php if($current_page=='analisis.php') echo 'class="active"'; ?>>
          <i class="fa-solid fa-chart-pie"></i> Metodologi
        </a>
      </li>
      <li>
        <a href="data-sekolah.php" <?php if($current_page=='data-sekolah.php') echo 'class="active"'; ?>>
          <i class="fa-solid fa-table-list"></i> Data Sekolah
        </a>
      </li>
      <li>
        <a href="peta.php" class="navbar-cta">
          <i class="fa-solid fa-location-dot"></i> Buka Peta
        </a>
      </li>
    </ul>
  </div>
</nav>