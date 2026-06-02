<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qgis Pemerataan SMA & SMK</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="style.css">

    <style>
        .filter-container {
            position: absolute;
            top: 20px;
            left: 70px; /* Di sebelah kanan tombol zoom default Leaflet */
            z-index: 1000;
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            font-family: Arial, sans-serif;
        }
        .filter-container h4 {
            margin: 0 0 8px 0;
            font-size: 14px;
        }
        .filter-item {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            font-size: 13px;
            cursor: pointer;
        }
        .filter-item input {
            margin-right: 8px;
            cursor: pointer;
        }
        .dot {
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }
    </style>
</head>
<body>

<div class="filter-container">
    <h4>Aksesibilitas Sekolah</h4>
    <label class="filter-item">
        <input type="checkbox" id="chk-hijau" checked>
        <span class="dot" style="background-color: green;"></span> Mudah (1 Km)
    </label>
    <label class="filter-item">
        <input type="checkbox" id="chk-kuning" checked>
        <span class="dot" style="background-color: yellow; border: 1px solid orange;"></span> Sedang (2 Km)
    </label>
    <label class="filter-item">
        <input type="checkbox" id="chk-merah" checked>
        <span class="dot" style="background-color: red;"></span> Rendah (3 Km)
    </label>
</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="app.js"></script>

</body>
</html>