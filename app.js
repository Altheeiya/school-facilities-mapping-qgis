// =======================
// INISIALISASI MAP & PANES (Kunci Utama Urutan Layer)
// =======================
const map = L.map('map').setView([-5.429, 105.261], 12);

// Buat custom pane untuk mengontrol penumpukan poligon dan titik
map.createPane('kecamatanPane');
map.getPane('kecamatanPane').style.zIndex = 400; // Paling Bawah

map.createPane('isochronePane');
map.getPane('isochronePane').style.zIndex = 450; // Di Tengah (Aksesibilitas ORS)

map.createPane('titikSekolahPane');
map.getPane('titikSekolahPane').style.zIndex = 650; // Paling Atas (Marker Bulat)
map.getPane('titikSekolahPane').style.pointerEvents = 'auto'; // Pastikan bisa diklik

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
// LAYER VARIABLES & GROUPS
// =======================
let smaLayer;
let kecamatanLayer;
let bufferLayer;

// Grup layer untuk masing-masing warna aksesibilitas
const layerHijau = L.layerGroup().addTo(map);
const layerKuning = L.layerGroup().addTo(map);
const layerMerah = L.layerGroup().addTo(map);

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
        weight: 1.5,
        color: '#666',
        fillOpacity: 0.4, // Dikurangi sedikit agar tembus pandang
        pane: 'kecamatanPane' // Terikat di pane bawah
    };
}

// =======================
// LOGIKA PENCARIAN SEKOLAH
// =======================
const searchInput   = document.getElementById('search-sekolah');
const searchResults = document.getElementById('search-results');
const searchClear   = document.getElementById('search-clear');

searchInput.addEventListener('input', function(e) {
    const keyword = e.target.value.toLowerCase().trim();
    searchResults.innerHTML = '';
    searchClear.style.display = keyword ? 'block' : 'none';

    if (keyword === '') {
        searchResults.classList.remove('open');
        return;
    }

    let cocok = 0;

    if (smaLayer) {
        smaLayer.eachLayer(function(layer) {
            const properties = layer.feature.properties;
            const namaSekolah = getFeatureName(properties);

            if (namaSekolah.toLowerCase().includes(keyword)) {
                cocok++;
                const item = document.createElement('div');
                item.className = 'map-search-item';
                item.innerHTML = `<i class="fa-solid fa-location-dot" style="color:var(--primary);font-size:11px;"></i>${namaSekolah}`;

                item.addEventListener('click', function() {
                    searchInput.value = namaSekolah;
                    searchClear.style.display = 'block';
                    searchResults.classList.remove('open');

                    const latlng = layer.getLatLng();
                    map.flyTo(latlng, 16, { animate: true, duration: 1.5 });
                    setTimeout(() => { layer.openPopup(); }, 1500);
                });

                searchResults.appendChild(item);
            }
        });
    }

    if (cocok > 0) {
        searchResults.classList.add('open');
    } else {
        const noResult = document.createElement('div');
        noResult.className = 'map-search-item';
        noResult.style.color = 'var(--gray-400)';
        noResult.style.fontStyle = 'italic';
        noResult.textContent = 'Sekolah tidak ditemukan';
        searchResults.appendChild(noResult);
        searchResults.classList.add('open');
    }
});

searchClear.addEventListener('click', function() {
    searchInput.value = '';
    searchResults.innerHTML = '';
    searchResults.classList.remove('open');
    searchClear.style.display = 'none';
    searchInput.focus();
});

document.addEventListener('click', function(e) {
    if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
        searchResults.classList.remove('open');
    }
});

// =======================
// LAYER AKSESIBILITAS DI SEKITAR SEKOLAH (DINAMIS - ORS)
// =======================
const ORS_API_KEY = 'eyJvcmciOiI1YjNjZTM1OTc4NTExMTAwMDFjZjYyNDgiLCJpZCI6ImQ4NjkxMWE0MDU4OTQzMzk4NDJjNTcwZjYxYmM1MzRiIiwiaCI6Im11cm11cjY0In0=';

function buatAksesbilitasDinamis(lat, lng, namaSekolah) {
    const url = `https://api.openrouteservice.org/v2/isochrones/driving-car`;
    const batasanWaktu = [180, 360, 600]; // 3 Menit, 6 Menit, 10 Menit

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': ORS_API_KEY
        },
        body: JSON.stringify({
            locations: [[lng, lat]], 
            range: batasanWaktu,
            range_type: 'time',
            smoothing: 3.0
        })
    })
    .then(response => {
        if (!response.ok) throw new Error("Gagal merespon API ORS");
        return response.json();
    })
    .then(data => {
        // Balik urutan agar poligon terbesar (merah) digambar duluan/paling bawah
        data.features.reverse();

        L.geoJSON(data, {
            style: function(feature) {
                const value = feature.properties.value; 
                if (value <= 180) {
                    return { color: '#28a745', fillColor: '#28a745', fillOpacity: 0.45, weight: 1.5, pane: 'isochronePane' };
                } else if (value <= 360) {
                    return { color: '#ffc107', fillColor: '#ffc107', fillOpacity: 0.30, weight: 1.5, pane: 'isochronePane' };
                } else {
                    return { color: '#dc3545', fillColor: '#dc3545', fillOpacity: 0.15, weight: 1.5, pane: 'isochronePane' };
                }
            },
            onEachFeature: function(feature, layer) {
                const value = feature.properties.value;
                let menit = value / 60;
                let keterangan = `Zona Jangkauan: ${menit} Menit Berkendara`;
                layer.bindPopup(`<b>${namaSekolah}</b><br>${keterangan}`);

                // Masukkan ke grup masing-masing kontrol UI
                if (value <= 180) {
                    layer.addTo(layerHijau);
                } else if (value <= 360) {
                    layer.addTo(layerKuning);
                } else {
                    layer.addTo(layerMerah);
                }
            }
        });
    })
    .catch(err => console.error(`Gagal memuat jangkauan untuk ${namaSekolah}:`, err));
}

// =======================
// LOAD DATA SMA (dari PostgreSQL via API)
// =======================
fetch('api/api_sekolah.php')
.then(res => {
    if (!res.ok) throw new Error('Gagal memanggil API: HTTP ' + res.status);
    return res.json();
})
.then(data => {
    // Jika API mengembalikan error dari PHP (koneksi DB gagal, dll)
    if (data.error) {
        console.error('API Error:', data.error);
        alert('Gagal memuat data sekolah.\nError: ' + data.error);
        return;
    }

    smaLayer = L.geoJSON(data, {
        pointToLayer: function(feature, latlng){
            const nama = getFeatureName(feature.properties);

            // Trigger zona aksesibilitas ORS
            buatAksesbilitasDinamis(latlng.lat, latlng.lng, nama);

            return L.circleMarker(latlng, {
                radius: 6,
                fillColor: '#0056b3',
                color: '#fff',
                weight: 1.5,
                fillOpacity: 1,
                pane: 'titikSekolahPane'
            });
        },
        onEachFeature: function(feature, layer){
            const p = feature.properties;
            const namaSekolah = getFeatureName(p);
            const kota = p['addr:city'] || 'Bandar Lampung';
            const jalan = p['addr:street'] ? `<br>Jalan: ${p['addr:street']}` : '';
            layer.bindPopup(`<b>${namaSekolah}</b><br>Kota: ${kota}${jalan}`);
        }
    });
    smaLayer.addTo(map);

    // Inisialisasi layer control setelah data sekolah siap
    try {
        initializeLayers();
    } catch(e) {
        console.warn('initializeLayers error (tidak fatal):', e);
    }
})
.catch(err => {
    // Hanya error jaringan / HTTP yang sampai sini
    console.error('Fetch error api_sekolah.php:', err);
    alert('Gagal terhubung ke server.\nPastikan Laragon aktif dan PostgreSQL berjalan.\nDetail: ' + err.message);
});

// Catatan: Tabel kecamatan tidak tersedia di database.
// Panggil initializeLayers() agar layer control awal bisa tampil.
initializeLayers();

// =======================
// LOAD DATA BUFFER
// =======================
fetch('data/buffer.geojson')
.then(res => res.json())
.then(data => {
    if(data && data.features){
        bufferLayer = L.geoJSON(data, {
            style:{ color:'orange', weight:2, fillOpacity:0.15, pane: 'kecamatanPane' }
        });
    }
    initializeLayers();
})
.catch(err => {
    console.error("Gagal memuat data Buffer:", err);
    initializeLayers();
});

// =======================
// EVENT LISTENER LEGEND CHECKBOXES
// =======================
function toggleZone(chkId, iconId, layer) {
    const chk  = document.getElementById(chkId);
    const icon = document.getElementById(iconId);
    if (!chk) return;
    chk.addEventListener('change', function() {
        if (this.checked) {
            map.addLayer(layer);
            if (icon) icon.style.opacity = '1';
        } else {
            map.removeLayer(layer);
            if (icon) icon.style.opacity = '0.2';
        }
    });
    // Klik label legend juga toggle
    const label = chk.closest('.legend-item');
    if (label) {
        label.addEventListener('click', () => {
            chk.checked = !chk.checked;
            chk.dispatchEvent(new Event('change'));
        });
    }
}
toggleZone('chk-hijau',  'icon-hijau',  layerHijau);
toggleZone('chk-kuning', 'icon-kuning', layerKuning);
toggleZone('chk-merah',  'icon-merah',  layerMerah);

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
    if (kecamatanLayer) { overlayMaps["Batas Kecamatan"] = kecamatanLayer; groupLayers.push(kecamatanLayer); }
    if (bufferLayer) { overlayMaps["Radius Zonasi 3KM"] = bufferLayer; }
    
    layerControl = L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

    // Auto-center peta jika layer utama telah termuat
    if (groupLayers.length > 0 && smaLayer) {
        map.fitBounds(smaLayer.getBounds());
    }
}