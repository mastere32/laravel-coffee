<div class="scroll m-4 max-h-[350px] overflow-y-scroll sm:rounded-lg">
  <button id="show-all-on-map-button" class="btn btn-gray-200 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100"
    onclick="toggleShowAllOnMap()">
    Show all on map
  </button>
  <script>
    function toggleShowAllOnMap() {
      const button = document.getElementById('show-all-on-map-button');
      if (button.innerText === 'Show all on map') {
        button.innerText = 'Hide all on map';
        button.classList.add('bg-red-500');
        showAllOnMap();
      } else {
        button.innerText = 'Show all on map';
        button.classList.remove('bg-red-500');
        hideAllOnMap();
      }
    }
  </script>

  @foreach ($lines as $line)
    <div class="m-4 flex justify-between overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
      <div class="h-100 flex flex-col justify-between gap-1 p-3 dark:text-gray-100">
        <span>{{ $line->Title }}</span>
        <a href="{{ $line->url }}" target="_blank"> link </a>
      </div>
      <div class="h-100 flex flex-col justify-between gap-1 p-3 dark:text-gray-100">
        @if ($line->coord)
          <button class="btn btn-gray-200 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100"
            onclick="toggleOnMap({{ $line->coord->latitude }}, {{ $line->coord->longitude }}, '{{ $line->coord->id }}')">
            Show on map
          </button>
          <button class="btn btn-gray-200 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100"
            onclick="centerOnMap({{ $line->coord->latitude }}, {{ $line->coord->longitude }}, '{{ $line->coord->id }}')">
            Center
          </button>
        @endif
      </div>
    </div>
  @endforeach


</div>

<script>
  var icons = {};

  function hideOnMap(id) {
    map.removeLayer(icons[id]);
    delete icons[id];
    console.log("hiding: " + id);

  }

  function showOnMap(latitude, longitude, id) {
    var icon = L.marker([latitude, longitude], {
      icon: coffeeCupIcon
    }).addTo(map);
    icons[id] = icon;
    console.log("showing: " + id);
  }

  function toggleOnMap(latitude, longitude, id) {
    if (icons[id]) {
      hideOnMap(id);
    } else {
      showOnMap(latitude, longitude, id);
    }
  }

  function centerOnMap(latitude, longitude, id) {
    map.setView([latitude, longitude], 7, {
      animate: true,
      duration: 2.5
    });
    console.log("center: " + id);
  }

  function showAllOnMap() {
    axios.get("{{ route('map.fetchAllCoordinates') }}")
      .then(response => {
        console.log(response.data);
        response.data.forEach((coordinate) => {
          if (!icons[coordinate.id])
            showOnMap(coordinate.latitude, coordinate.longitude, coordinate.id);
        });

        console.log(icons);
        console.log("showing all");
      });
  }

  function hideAllOnMap() {
    axios.get("{{ route('map.fetchAllCoordinates') }}")
      .then(response => {
        console.log(response.data);
        response.data.forEach((coordinate) => {
          if (icons[coordinate.id])
            hideOnMap(coordinate.id);
        });

        console.log("hiding all");
      });
  }
</script>
