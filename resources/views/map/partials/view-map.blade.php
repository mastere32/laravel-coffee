<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="./leaflet.edgebuffer.js"></script>


<div id="map"
  class="m-auto aspect-[2/1] h-auto max-h-[350px] w-full max-w-[700px] overflow-hidden bg-white p-6 text-gray-900 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
</div>
<script>
  var map = L.map('map').setView([43.5361003, 5.455119], 13);
  var Stadia_AlidadeSmoothDark = L.tileLayer(
    'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
      minZoom: 0,
      maxZoom: 20,
      attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      ext: 'png'
    });
  var Stadia_AlidadeSmooth = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.{ext}', {
    edgeBufferTiles: 1,
    minZoom: 0,
    maxZoom: 20,
    attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    ext: 'png'
  });
  if (document.body.classList.contains('dark')) {
    Stadia_AlidadeSmoothDark.addTo(map);
  } else {
    Stadia_AlidadeSmooth.addTo(map);
  }

  var coffeeCupIcon = L.icon({
    iconUrl: 'cup.png',
    iconSize: [35, 35],
    iconAnchor: [17, 17],
    popupAnchor: [0, 0]
  });
</script>
