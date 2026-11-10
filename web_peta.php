<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan_pgweb_acara8";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM `data_sppg`";
$result = $conn->query($sql);

$sppg_array = array();
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sppg_array[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Web GIS SPPG Prambanan</title>
<link rel="icon" type="image/png" href="data:image/png;base64,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">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
  :root {
    --bg: #eaf3fa; --card: #ffffff; --ink: #12255a; --muted: #5d7290;
    --line: #cfe2ef; --brand: #1f63c2; --brand-dark: #12296b; --leaf: #2f7d4f;
    --view: #3b9ad9; --edit: #b8923a; --del: #c0392b;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
  body { background: var(--bg); color: var(--ink); padding: 24px 20px 40px; }
  .wrap { width: 96%; max-width: 1400px; margin: 0 auto; }

  .hero { background: var(--brand-dark); color: #fff; border-radius: 14px; padding: 20px 24px; margin-bottom: 18px; display: flex; align-items: center; gap: 20px; flex-wrap: wrap; }
  .hero .ttl { flex: 1; min-width: 240px; }
  .hero h2 { font-size: 1.45rem; }
  .hero p { color: #b9d4ee; font-size: .9rem; margin-top: 2px; }
  .stats { display: flex; gap: 10px; }
  .stat { background: rgba(255,255,255,.1); border-radius: 10px; padding: 8px 16px; text-align: center; min-width: 88px; }
  .stat b { display: block; font-size: 1.35rem; }
  .stat span { font-size: .74rem; color: #b9d4ee; }
  .btn-add { background: #fff; color: var(--brand-dark); padding: 10px 18px; border-radius: 999px; text-decoration: none; font-weight: 700; font-size: .9rem; }
  .btn-add:hover { background: #dcecfa; }

  /* PETA + PANEL SAMPING */
  .map-layout { display: grid; grid-template-columns: 1fr 320px; gap: 18px; margin-bottom: 28px; }
  .map-box { position: relative; }
  #map { width: 100%; height: 520px; border-radius: 14px; border: 1px solid var(--line); z-index: 1; }

  .side { background: var(--card); border: 1px solid var(--line); border-radius: 14px; display: flex; flex-direction: column; height: 520px; overflow: hidden; }
  .side-top { padding: 14px; border-bottom: 1px solid var(--line); }
  .side-top h3 { font-size: .95rem; margin-bottom: 10px; }
  .search { width: 100%; padding: 9px 12px; border: 1px solid var(--line); border-radius: 8px; font-size: .88rem; background: var(--bg); outline: none; }
  .search:focus { border-color: var(--brand); }
  .quick { display: flex; gap: 8px; margin-top: 10px; }
  .quick button { flex: 1; padding: 7px; border-radius: 8px; border: 1px solid var(--line); background: #fff; font-size: .8rem; cursor: pointer; color: var(--ink); }
  .quick button:hover { background: var(--bg); }
  .layer-list { overflow-y: auto; flex: 1; padding: 6px; }
  .layer-item { display: flex; align-items: center; gap: 10px; padding: 9px 10px; border-radius: 8px; font-size: .88rem; }
  .layer-item:hover { background: var(--bg); }
  .layer-item input { accent-color: var(--brand); width: 16px; height: 16px; cursor: pointer; }
  .layer-item label { flex: 1; cursor: pointer; line-height: 1.3; }
  .layer-item small { display: block; color: var(--muted); font-size: .76rem; }
  .layer-item .go { border: none; background: none; cursor: pointer; font-size: 1.05rem; }

  .coord-badge { background: rgba(255,255,255,.95); padding: 4px 10px; border-radius: 6px; font-size: .8rem; font-weight: 600; box-shadow: 0 2px 6px rgba(0,0,0,.15); }

  /* IKON MARKER RESTORAN */
  .pin { width: 36px; height: 36px; background: var(--brand); border: 3px solid #fff; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); box-shadow: 0 3px 8px rgba(0,0,0,.35); display: flex; align-items: center; justify-content: center; }
  .pin span { transform: rotate(45deg); display: flex; }

  /* DAFTAR SPPG - KARTU */
  .sec-title { display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 14px; }
  .sec-title h3 { font-size: 1.1rem; }
  .sec-title span { color: var(--muted); font-size: .85rem; }
  .list-panel { background: var(--card); border: 1px solid var(--line); border-radius: 14px; overflow: hidden; }
  .kap { padding: 10px 18px; background: var(--brand); color: #fff; font-weight: 700; font-size: .92rem; display: flex; justify-content: space-between; }
  .kap small { font-weight: 500; opacity: .85; }
  details.kal { border-bottom: 1px solid var(--line); }
  details.kal:last-child { border-bottom: none; }
  details.kal summary { cursor: pointer; padding: 10px 18px; background: #f1f8fd; font-weight: 600; font-size: .88rem; color: var(--leaf); list-style: none; display: flex; align-items: center; gap: 8px; }
  details.kal summary::-webkit-details-marker { display: none; }
  details.kal summary::before { content: '\25B8'; transition: transform .15s; }
  details.kal[open] summary::before { transform: rotate(90deg); }
  .cnt { margin-left: auto; background: #dff0e6; padding: 1px 9px; border-radius: 999px; font-size: .74rem; }
  .row { display: grid; grid-template-columns: 34px 1.1fr 1.6fr 190px 150px; gap: 12px; align-items: center; padding: 10px 18px; border-top: 1px solid #e3eef6; font-size: .85rem; }
  .row:hover { background: #f4faff; }
  .row .id { color: var(--muted); font-size: .76rem; }
  .row .nm { font-weight: 600; line-height: 1.3; }
  .row .ad { color: var(--muted); line-height: 1.4; }
  .row .xy { font-size: .76rem; line-height: 1.5; }
  .row .xy b { color: var(--muted); font-weight: 600; display: inline-block; width: 28px; }
  .acts { display: flex; gap: 6px; justify-content: flex-end; }
  .btn { padding: 6px 10px; border-radius: 7px; font-size: .78rem; font-weight: 600; text-decoration: none; border: 1px solid transparent; cursor: pointer; background: #fff; }
  .b-view { background: var(--brand); color: #fff; }
  .b-edit { color: var(--brand-dark); border-color: var(--line); }
  .b-del { color: var(--del); border-color: #f0cdc8; }
  .b-view:hover { background: var(--brand-dark); }
  .b-edit:hover { background: #f1f8fd; }
  .b-del:hover { background: #fdf0ee; }
  .row.active { background: #e3f0fc; box-shadow: inset 4px 0 0 var(--brand); }
  .base-switch { display: flex; background: #fff; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,.25); overflow: hidden; }
  .base-switch button { border: none; background: #fff; padding: 7px 14px; font-size: .82rem; font-weight: 600; color: var(--ink); cursor: pointer; }
  .base-switch button.on { background: var(--brand); color: #fff; }
  .quick-all { width: 100%; margin-top: 8px; padding: 8px; border-radius: 8px; border: none; background: var(--brand); color: #fff; font-size: .82rem; font-weight: 600; cursor: pointer; }
  .quick-all:hover { background: var(--brand-dark); }
  .empty { padding: 30px; text-align: center; color: var(--muted); background: var(--card); border-radius: 12px; border: 1px dashed var(--line); }

  /* MODAL HAPUS */
  .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(10,25,60,.5); backdrop-filter: blur(4px); z-index: 9999; justify-content: center; align-items: center; }
  .modal-box { background: #fff; width: 90%; max-width: 400px; padding: 24px; border-radius: 16px; text-align: center; box-shadow: 0 20px 25px -5px rgba(0,0,0,.2); animation: pop .25s cubic-bezier(.175,.885,.32,1.275); }
  @keyframes pop { 0% { opacity: 0; transform: scale(.8); } 100% { opacity: 1; transform: scale(1); } }
  .modal-icon { width: 52px; height: 52px; background: #fee2e2; color: var(--del); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 16px; font-size: 24px; }
  .modal-title { font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; }
  .modal-desc { font-size: .88rem; color: var(--muted); margin-bottom: 22px; line-height: 1.4; }
  .modal-actions { display: flex; gap: 10px; }
  .btn-modal { flex: 1; padding: 10px 16px; border-radius: 8px; font-size: .88rem; font-weight: 600; cursor: pointer; border: none; text-decoration: none; display: inline-block; }
  .btn-cancel { background: #e3eef6; color: var(--ink); }
  .btn-confirm { background: var(--del); color: #fff; }

  @media (max-width: 900px) {
    .map-layout { grid-template-columns: 1fr; }
    .side { height: 340px; }
    #map { height: 420px; }
    .row { grid-template-columns: 1fr; gap: 6px; }
    .acts { justify-content: flex-start; }
  }
</style>
</head>
<body>
<div class="wrap">
  <div class="hero">
    <div class="ttl">
      <h2>Web GIS &amp; Data SPPG Prambanan</h2>
      <p>Sebaran dapur MBG (Satuan Pelayanan Pemenuhan Gizi)</p>
    </div>
    <div class="stats">
      <div class="stat"><b id="statSppg">0</b><span>SPPG</span></div>
      <div class="stat"><b id="statKap">0</b><span>Kapanewon</span></div>
      <div class="stat"><b id="statKal">0</b><span>Kalurahan</span></div>
    </div>
    <a href="input/index.html" class="btn-add">+ Tambah SPPG</a>
  </div>

  <div class="map-layout">
    <div class="map-box"><div id="map"></div></div>

    <aside class="side">
      <div class="side-top">
        <h3>Layer SPPG</h3>
        <input type="search" id="searchBox" class="search" placeholder="Cari nama, kapanewon, kalurahan...">
        <div class="quick">
          <button type="button" onclick="toggleAll(true)">Tampilkan semua</button>
          <button type="button" onclick="toggleAll(false)">Sembunyikan semua</button>
        </div>
        <button type="button" class="quick-all" onclick="fitAll()">Lihat semua titik</button>
      </div>
      <div class="layer-list" id="layerList"></div>
    </aside>
  </div>

  <div class="sec-title">
    <h3>Daftar SPPG</h3>
    <span id="countInfo"></span>
  </div>
  <div class="list-panel" id="cardGrid"></div>
</div>

<div id="customDeleteModal" class="modal-overlay">
  <div class="modal-box">
    <div class="modal-icon">&#9888;</div>
    <div class="modal-title">Hapus Data SPPG?</div>
    <div class="modal-desc">Apakah Anda yakin ingin menghapus data lokasi SPPG ini dari basis data?</div>
    <div class="modal-actions">
      <button class="btn-modal btn-cancel" onclick="closeDeleteModal()">Batal</button>
      <a id="confirmDeleteLink" href="#" class="btn-modal btn-confirm">Ya, Hapus</a>
    </div>
  </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
  var sppgData = <?php echo json_encode($sppg_array); ?>;

  function esc(s) {
    return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) {
      return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
  }

  /* PETA & BASEMAP */
  var map = L.map('map').setView([-7.78, 110.496], 13);
  var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19, attribution: '&copy; OpenStreetMap' });
  var esri = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { attribution: 'Tiles &copy; Esri' });
  osm.addTo(map);

  // Pilihan basemap: dua tombol langsung terlihat
  var BaseSwitch = L.Control.extend({
    options: { position: 'topright' },
    onAdd: function () {
      var c = L.DomUtil.create('div', 'base-switch');
      c.innerHTML = '<button type="button" class="on" data-b="osm">Peta</button><button type="button" data-b="esri">Satelit</button>';
      L.DomEvent.disableClickPropagation(c);
      c.addEventListener('click', function (e) {
        var b = e.target.getAttribute('data-b');
        if (!b) return;
        if (b === 'osm') { map.removeLayer(esri); osm.addTo(map); } else { map.removeLayer(osm); esri.addTo(map); }
        [].forEach.call(c.children, function (x) { x.classList.toggle('on', x === e.target); });
      });
      return c;
    }
  });
  map.addControl(new BaseSwitch());
  L.control.scale({ position: 'bottomright', imperial: false }).addTo(map);

  /* IKON RESTORAN */
  var restoIcon = L.divIcon({
    className: '',
    html: '<div class="pin"><span><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3v5a2 2 0 0 0 4 0V3M8 10v11"/><ellipse cx="16.5" cy="7" rx="2.5" ry="4"/><path d="M16.5 11v10"/></svg></span></div>',
    iconSize: [36, 36],
    iconAnchor: [18, 36],
    popupAnchor: [0, -34],
    tooltipAnchor: [14, -18]
  });

  /* MARKER */
  var markers = {};
  sppgData.forEach(function (item) {
    var lat = parseFloat(item.latitude), lng = parseFloat(item.longitude);
    if (isNaN(lat) || isNaN(lng)) return;
    var m = L.marker([lat, lng], { icon: restoIcon });
    m.bindPopup(
      '<div style="font-size:13px;line-height:1.5;">' +
      '<h4 style="margin:0 0 6px;color:#1f63c2;">' + esc(item.namasppg) + '</h4>' +
      '<b>Kapanewon:</b> ' + esc(item.kapanewon) + '<br>' +
      '<b>Kalurahan:</b> ' + esc(item.kalurahan) + '<br>' +
      '<b>Alamat:</b> ' + esc(item.alamat) + '<br>' +
      '<b>Koordinat:</b> ' + lat + ', ' + lng + '</div>'
    );
    m.bindTooltip(esc(item.namasppg), { direction: 'right' });
    m.addTo(map);
    markers[item.id] = m;
  });

  /* RINGKASAN */
  (function () {
    var kap = {}, kal = {};
    sppgData.forEach(function (i) { kap[i.kapanewon] = 1; kal[i.kapanewon + '|' + i.kalurahan] = 1; });
    document.getElementById('statSppg').textContent = sppgData.length;
    document.getElementById('statKap').textContent = Object.keys(kap).length;
    document.getElementById('statKal').textContent = Object.keys(kal).length;
  })();

  /* LIHAT SEMUA TITIK */
  var activeId = null;
  function fitAll() {
    var pts = Object.keys(markers).map(function (id) { return markers[id].getLatLng(); });
    if (pts.length) map.flyToBounds(L.latLngBounds(pts), { padding: [40, 40], duration: 1.2 });
  }

  /* PANEL LAYER (CHECKBOX 1 PER 1) */
  function renderLayerList(list) {
    var box = document.getElementById('layerList');
    if (!list.length) { box.innerHTML = '<div class="empty" style="border:none">Tidak ada hasil</div>'; return; }
    box.innerHTML = list.map(function (it) {
      var on = markers[it.id] && map.hasLayer(markers[it.id]);
      return '<div class="layer-item">' +
        '<input type="checkbox" id="chk' + it.id + '" ' + (on ? 'checked' : '') + (markers[it.id] ? '' : ' disabled') +
        ' onchange="toggleLayer(' + it.id + ', this.checked)">' +
        '<label for="chk' + it.id + '">' + esc(it.namasppg) + '<small>' + esc(it.kalurahan) + ', ' + esc(it.kapanewon) + '</small></label>' +
        '<button class="go" title="Lihat di peta" onclick="focusSPPG(' + it.id + ')">📍</button></div>';
    }).join('');
  }

  function toggleLayer(id, show) {
    if (!markers[id]) return;
    show ? markers[id].addTo(map) : map.removeLayer(markers[id]);
  }

  function toggleAll(show) {
    Object.keys(markers).forEach(function (id) { toggleLayer(id, show); });
    applyFilter();
  }

  /* KARTU DAFTAR SPPG */
  function renderCards(list) {
    var grid = document.getElementById('cardGrid');
    document.getElementById('countInfo').textContent = list.length + ' dari ' + sppgData.length + ' lokasi';
    if (!list.length) { grid.innerHTML = '<div class="empty" style="border:none">Data SPPG tidak ditemukan</div>'; return; }

    // Kelompokkan: Kapanewon > Kalurahan
    var g = {};
    list.forEach(function (it) {
      var k = it.kapanewon || '-', l = it.kalurahan || '-';
      (g[k] = g[k] || {});
      (g[k][l] = g[k][l] || []).push(it);
    });

    var html = '';
    Object.keys(g).forEach(function (k) {
      var total = 0;
      Object.keys(g[k]).forEach(function (l) { total += g[k][l].length; });
      html += '<div class="kap"><span>Kapanewon ' + esc(k) + '</span><small>' + total + ' SPPG</small></div>';
      Object.keys(g[k]).forEach(function (l) {
        html += '<details class="kal" open><summary>Kalurahan ' + esc(l) + '<span class="cnt">' + g[k][l].length + '</span></summary>';
        g[k][l].forEach(function (it) {
          html += '<div class="row' + (it.id == activeId ? ' active' : '') + '">' +
            '<span class="id">#' + esc(it.id) + '</span>' +
            '<span class="nm">' + esc(it.namasppg) + '</span>' +
            '<span class="ad">' + esc(it.alamat) + '</span>' +
            '<span class="xy"><b>Lat</b>' + esc(it.latitude) + '<br><b>Lng</b>' + esc(it.longitude) + '</span>' +
            '<span class="acts">' +
              '<button class="btn b-view" title="Lihat di peta" onclick="focusSPPG(' + it.id + ')">📍 Lihat</button>' +
              '<a class="btn b-edit" href="edit/index.php?id=' + it.id + '">Edit</a>' +
              '<button class="btn b-del" onclick="openDeleteModal(' + it.id + ')">Hapus</button>' +
            '</span></div>';
        });
        html += '</details>';
      });
    });
    grid.innerHTML = html;
  }

  /* PENCARIAN */
  function applyFilter() {
    var q = document.getElementById('searchBox').value.toLowerCase().trim();
    var list = sppgData.filter(function (it) {
      return (it.namasppg + ' ' + it.kapanewon + ' ' + it.kalurahan + ' ' + it.alamat).toLowerCase().indexOf(q) !== -1;
    });
    renderLayerList(list);
    renderCards(list);
  }
  document.getElementById('searchBox').addEventListener('input', applyFilter);
  applyFilter();

  /* FOKUS KE LOKASI */
  function focusSPPG(id) {
    var m = markers[id];
    if (!m) return;
    if (!map.hasLayer(m)) { m.addTo(map); }
    activeId = id;
    applyFilter();
    document.getElementById('map').scrollIntoView({ behavior: 'smooth', block: 'center' });
    map.flyTo(m.getLatLng(), 16, { duration: 1.2 });
    m.openPopup();
  }

  /* KOORDINAT KURSOR (tanpa kata "Kursor") */
  var CoordControl = L.Control.extend({
    options: { position: 'bottomleft' },
    onAdd: function () {
      var c = L.DomUtil.create('div', 'coord-badge');
      c.id = 'coord-display';
      c.innerHTML = 'Lat: - | Lng: -';
      return c;
    }
  });
  map.addControl(new CoordControl());
  map.on('mousemove', function (e) {
    document.getElementById('coord-display').innerHTML =
      'Lat: ' + e.latlng.lat.toFixed(6) + ' | Lng: ' + e.latlng.lng.toFixed(6);
  });

  /* MODAL HAPUS */
  function openDeleteModal(id) {
    document.getElementById('confirmDeleteLink').href = 'delete.php?id=' + id;
    document.getElementById('customDeleteModal').style.display = 'flex';
  }
  function closeDeleteModal() { document.getElementById('customDeleteModal').style.display = 'none'; }
  window.onclick = function (e) {
    if (e.target == document.getElementById('customDeleteModal')) closeDeleteModal();
  };
</script>
</body>
</html>
<?php $conn->close(); ?>