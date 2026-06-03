<?php include 'includes/header.php'; ?>

<div class="flex-1 relative flex flex-col h-[calc(100vh-64px)] overflow-hidden">
    
    <div class="absolute top-4 left-4 z-[1000] bg-white rounded-xl shadow-lg p-5 w-64 border border-gray-200">
        <h4 class="font-bold text-gray-900 mb-2 text-sm flex items-center">
            <i class="fa-solid fa-sliders text-blue-600 mr-2"></i> Aksesibilitas Sekolah
        </h4>
        <p class="text-[11px] text-gray-400 mb-4">Zona jangkauan waktu berkendara (ORS)</p>
        
        <div class="space-y-3">
            <label class="flex items-center p-1.5 rounded hover:bg-gray-50 cursor-pointer transition">
                <input type="checkbox" id="chk-hijau" checked class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                <span class="w-3 h-3 rounded-full bg-green-600 ml-3 mr-2"></span>
                <span class="text-xs text-gray-700 font-medium">Mudah (&le; 3 Menit)</span>
            </label>
            
            <label class="flex items-center p-1.5 rounded hover:bg-gray-50 cursor-pointer transition">
                <input type="checkbox" id="chk-kuning" checked class="w-4 h-4 text-yellow-500 border-gray-300 rounded focus:ring-yellow-400">
                <span class="w-3 h-3 rounded-full bg-yellow-400 border border-yellow-600 ml-3 mr-2"></span>
                <span class="text-xs text-gray-700 font-medium">Sedang (&le; 6 Menit)</span>
            </label>
            
            <label class="flex items-center p-1.5 rounded hover:bg-gray-50 cursor-pointer transition">
                <input type="checkbox" id="chk-merah" checked class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                <span class="w-3 h-3 rounded-full bg-red-600 ml-3 mr-2"></span>
                <span class="text-xs text-gray-700 font-medium">Rendah (&le; 10 Menit)</span>
            </label>
        </div>
        
        <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] text-gray-400">
            <i class="fa-solid fa-circle-info mr-1"></i> Titik biru melambangkan fasilitas SMA. Batas wilayah merupakan poligon kecamatan.
        </div>
    </div>

    <div id="map" class="w-full h-full"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="app.js"></script>

</body>
</html>