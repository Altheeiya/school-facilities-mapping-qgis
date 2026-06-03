<?php include 'includes/header.php'; ?>

<div class="flex-1 relative flex flex-col h-[calc(100vh-64px)] overflow-hidden">
    
    <div class="absolute top-4 left-1/2 -translate-x-1/2 z-[1000] w-full max-w-md px-4">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 p-2 flex flex-col relative">
            <div class="relative flex items-center">
                <input type="text" id="search-sekolah" placeholder="Cari nama SMA di Bandar Lampung..." 
                       class="w-full pl-9 pr-4 py-2 bg-gray-50 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition">
                <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-sm"></i>
            </div>
            <div id="search-results" class="hidden absolute left-0 right-0 top-full mt-2 mx-4 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto text-sm z-[2000]"></div>
        </div>
    </div>

    <div class="absolute top-24 left-4 z-[1000] bg-white rounded-xl shadow-lg p-5 w-64 border border-gray-200 flex flex-col max-h-[calc(100vh-120px)]">
        <h4 class="font-bold text-gray-900 mb-2 text-sm flex items-center">
            <i class="fa-solid fa-sliders text-blue-600 mr-2"></i> Aksesibilitas Sekolah
        </h4>
        <p class="text-[11px] text-gray-400 mb-3">Zona jangkauan waktu berkendara (ORS)</p>
        
        <div class="space-y-2.5 flex-1 overflow-y-auto">
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