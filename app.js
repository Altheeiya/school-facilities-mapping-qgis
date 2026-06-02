// =======================
// INISIALISASI MAP
// =======================
const map = L.map('map').setView([-5.429, 105.261], 12);

// =======================
// BASE LAYERS
// =======================
const osm = L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    { attribution: '© OpenStreetMap' }
);

const satellite = L.tileLayer(
    'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
    { attribution: '© Esri' }
);

osm.addTo(map);

// =======================
// LAYER VARIABLES
// =======================
let smaLayer;
let smkLayer;
let kecamatanLayer;
let bufferLayer;

// Pisahkan grup layer untuk masing-masing warna aksesibilitas
let layerHijau = L.layerGroup();
let layerKuning = L.layerGroup();
let layerMerah = L.layerGroup();

// Menyimpan semua fitur sekolah untuk pencarian
let allSchools = [];

// =======================
// HELPER AUTO-DETEKSI ATRIBUT NAMA
// =======================
function getFeatureName(properties) {
    if (!properties) return "Tanpa Nama";
    return properties.name || properties.nama || properties.NAME || properties.NAMA || "Tanpa Nama";
}

// =======================
// CHOROPLETH WARNA KECAMATAN
// =======================
function getColor(d){
    return d > 80 ? '#006837' :
           d > 60 ? '#31a354' :
           d > 40 ? '#78c679' :
           d > 20 ? '#c2e699' :
                    '#ffffcc';
}

function styleKecamatan(feature){
    const nilai = feature.properties ? (feature.properties.nilai_pemerataan || 0) : 0;
    return {
        fillColor: getColor(nilai),
        weight: 2,
        color: '#333',
        fillOpacity: 0.7
    };
}

// =======================
// LAYER AKSESIBILITAS DI SEKITAR SEKOLAH
// =======================
function buatAksesibilitasSekolah(latlng, namaSekolah) {
    // 1. Zona Merah (Radius 3 km)
    const merah = L.circle(latlng, {
        radius: 3000,
        fillColor: 'red',
        color: 'red',
        weight: 1,
        fillOpacity: 0.12
    }).bindPopup(`<b>${namaSekolah}</b><br>Zona Merah: Aksesibilitas Rendah (> 2km)`);

    // 2. Zona Kuning (Radius 2 km)
    const kuning = L.circle(latlng, {
        radius: 2000,
        fillColor: 'yellow',
        color: 'orange',
        weight: 1,
        fillOpacity: 0.18
    }).bindPopup(`<b>${namaSekolah}</b><br>Zona Kuning: Aksesibilitas Sedang (1km - 2km)`);

    // 3. Zona Hijau (Radius 1 km)
    const hijau = L.circle(latlng, {
        radius: 1000,
        fillColor: 'green',
        color: 'green',
        weight: 1,
        fillOpacity: 0.25
    }).bindPopup(`<b>${namaSekolah}</b><br>Zona Hijau: Mudah Diakses (0km - 1km)`);

    // Masukkan ke grup masing-masing warna
    merah.addTo(layerMerah);
    kuning.addTo(layerKuning);
    hijau.addTo(layerHijau);
}

// =======================
// EVENT LISTENER TOMBOL CENTANG (INDEX.PHP)
// =======================
document.getElementById('chk-hijau').addEventListener('change', function(e) {
    if(e.target.checked) { map.addLayer(layerHijau); } else { map.removeLayer(layerHijau); }
});

document.getElementById('chk-kuning').addEventListener('change', function(e) {
    if(e.target.checked) { map.addLayer(layerKuning); } else { map.removeLayer(layerKuning); }
});

document.getElementById('chk-merah').addEventListener('change', function(e) {
    if(e.target.checked) { map.addLayer(layerMerah); } else { map.removeLayer(layerMerah); }
});

// =======================
// LOAD SMA
// =======================
fetch('data/sma.geojson')
.then(res => res.json())
.then(data => {
    smaLayer = L.geoJSON(data, {
        pointToLayer: function(feature, latlng){
            const nama = getFeatureName(feature.properties);
            buatAksesibilitasSekolah(latlng, nama);
            
            // Tambahkan ke array pencarian
            allSchools.push({
                name: nama,
                lat: latlng.lat,
                lng: latlng.lng,
                type: 'SMA'
            });

            return L.circleMarker(latlng, {
                radius: 6,
                fillColor: 'blue',
                color: '#fff',
                weight: 1,
                fillOpacity: 1
            });
        },
        onEachFeature: function(feature, layer){
            const namaSekolah = getFeatureName(feature.properties);
            layer.bindPopup(`<b>${namaSekolah}</b><br>Kategori: SMA`);
        }
    });
    smaLayer.addTo(map);
    initializeLayers();
});

// =======================
// LOAD SMK
// =======================
fetch('data/smk.geojson')
.then(res => res.json())
.then(data => {
    smkLayer = L.geoJSON(data, {
        pointToLayer: function(feature, latlng){
            const nama = getFeatureName(feature.properties);
            buatAksesibilitasSekolah(latlng, nama);
            
            // Tambahkan ke array pencarian
            allSchools.push({
                name: nama,
                lat: latlng.lat,
                lng: latlng.lng,
                type: 'SMK'
            });

            return L.circleMarker(latlng, {
                radius: 6,
                fillColor: 'red',
                color: '#fff',
                weight: 1,
                fillOpacity: 1
            });
        },
        onEachFeature: function(feature, layer){
            const namaSekolah = getFeatureName(feature.properties);
            layer.bindPopup(`<b>${namaSekolah}</b><br>Kategori: SMK`);
        }
    });
    smkLayer.addTo(map);
    initializeLayers();
}).catch(err => console.log("Data SMK tidak ditemukan."));

// =======================
// LOAD KECAMATAN
// =======================
fetch('data/kecamatan.geojson')
.then(res => res.json())
.then(data => {
    if(data && data.features){
        kecamatanLayer = L.geoJSON(data, {
            style: styleKecamatan,
            onEachFeature: function(feature, layer){
                const namaKec = getFeatureName(feature.properties);
                const nilai = feature.properties ? (feature.properties.nilai_pemerataan || '-') : '-';
                layer.bindPopup(`<b>Wilayah: ${namaKec}</b><br>Nilai Pemerataan: ${nilai}`);
            }
        });
        kecamatanLayer.addTo(map);
    }
    initializeLayers();
})
.catch(err => {
    console.error("Gagal memuat data Kecamatan:", err);
    initializeLayers(); 
});

// =======================
// LOAD BUFFER
// =======================
fetch('data/buffer.geojson')
.then(res => res.json())
.then(data => {
    if(data && data.features){
        bufferLayer = L.geoJSON(data, {
            style:{ color:'orange', weight:2, fillOpacity:0.2 }
        });
    }
    initializeLayers();
})
.catch(err => {
    console.error("Gagal memuat data Buffer:", err);
    initializeLayers();
});

// =======================
// LAYER CONTROL & AUTO CENTER
// =======================
let layerControl;

function initializeLayers(){
    if(layerControl) {
        map.removeControl(layerControl);
    }

    const baseMaps = {
        "OpenStreetMap": osm,
        "Satelit": satellite
    };

    const overlayMaps = {};
    const groupLayers = [];

    if (smaLayer) { overlayMaps["Titik SMA"] = smaLayer; groupLayers.push(smaLayer); }
    if (smkLayer) { overlayMaps["Titik SMK"] = smkLayer; groupLayers.push(smkLayer); }
    if (kecamatanLayer) { overlayMaps["Batas Kecamatan"] = kecamatanLayer; groupLayers.push(kecamatanLayer); }
    if (bufferLayer) { overlayMaps["Radius Zonasi"] = bufferLayer; }
    
    // Tampilkan semua layer aksesibilitas secara default di awal map load
    layerMerah.addTo(map);
    layerKuning.addTo(map);
    layerHijau.addTo(map);

    layerControl = L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

    if (groupLayers.length > 0) {
        const group = L.featureGroup(groupLayers);
        map.fitBounds(group.getBounds());
    }
}

// =======================
// SEARCH FUNCTIONALITY
// =======================
function handleSearch() {
    const searchInput = document.getElementById('search-input').value.toLowerCase().trim();
    const resultsContainer = document.getElementById('search-results');
    
    if (searchInput.length === 0) {
        resultsContainer.classList.remove('show');
        resultsContainer.innerHTML = '';
        return;
    }
    
    const results = allSchools.filter(school => 
        school.name.toLowerCase().includes(searchInput)
    );
    
    if (results.length === 0) {
        resultsContainer.innerHTML = '<div class="search-result-item">Tidak ada hasil</div>';
        resultsContainer.classList.add('show');
        return;
    }
    
    resultsContainer.innerHTML = results.map(school => 
        `<div class="search-result-item" onclick="centerMapToSchool(${school.lat}, ${school.lng}, '${school.name}')">${school.name}</div>`
    ).join('');
    resultsContainer.classList.add('show');
}

function centerMapToSchool(lat, lng, name) {
    map.setView([lat, lng], 16);
    
    const popup = L.popup()
        .setLatLng([lat, lng])
        .setContent(`<b>${name}</b>`)
        .openOn(map);
    
    document.getElementById('search-results').classList.remove('show');
    document.getElementById('search-input').value = '';
}