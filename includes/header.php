<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebGIS Pemerataan SMA Bandar Lampung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php if ($current_page == 'peta.php'): ?>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
        <link rel="stylesheet" href="style.css">
    <?php endif; ?>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

<nav class="bg-blue-700 text-white shadow-md sticky top-0 z-[5000]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-map-location-dot text-2xl text-yellow-300"></i>
                <span class="font-bold text-lg tracking-wide">WebGIS SMA Bandar Lampung</span>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="index.php" class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo $current_page == 'index.php' ? 'bg-blue-900 text-white' : 'hover:bg-blue-600' ?>">
                    <i class="fa-solid fa-house mr-1"></i> Beranda
                </a>
                <a href="peta.php" class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo $current_page == 'peta.php' ? 'bg-blue-900 text-white' : 'hover:bg-blue-600' ?>">
                    <i class="fa-solid fa-map mr-1"></i> Peta Interaktif
                </a>
                <a href="analisis.php" class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo $current_page == 'analisis.php' ? 'bg-blue-900 text-white' : 'hover:bg-blue-600' ?>">
                    <i class="fa-solid fa-chart-pie mr-1"></i> Analisis Spasial
                </a>
                <a href="data-sekolah.php" class="px-3 py-2 rounded-md text-sm font-medium transition <?php echo $current_page == 'data-sekolah.php' ? 'bg-blue-900 text-white' : 'hover:bg-blue-600' ?>">
                    <i class="fa-solid fa-list mr-1"></i> Data Sekolah
                </a>
            </div>
        </div>
    </div>
</nav>