<div class="m-4 max-h-[350px] overflow-y-scroll sm:rounded-lg">
  <button class="btn btn-gray-200 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100" onclick="showAllOnMap()">
    Show all on map
  </button>
  @foreach ($lines as $line)
    <div class="m-4 flex justify-between overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
      <div class="h-100 flex flex-col justify-between gap-1 p-3 dark:text-gray-100">
        <span>{{ $line['Title'] }}</span>
        <a href="{{ $line['url'] }}" target="_blank">{{ Str::limit($line['url'], 25, '...') }}</a>
      </div>
      <div class="h-100 flex flex-col justify-between gap-1 p-3 dark:text-gray-100">
        @if ($line->coord)
          <button class="btn btn-gray-200 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100"
            onclick="showOnMap({{ $line->coord->latitude }}, {{ $line->coord->longitude }}, '{{ hash('sha256', $line['url']) }}')">
            Show on map
          </button>
          <button class="btn btn-gray-200 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100"
            onclick="centerOnMap({{ $line->coord->latitude }}, {{ $line->coord->longitude }}, '{{ hash('sha256', $line['url']) }}')">
            Center
          </button>
        @endif
      </div>
    </div>
  @endforeach


</div>

<script>
  var icons = {};

  function showOnMap(latitude, longitude, id = "") {
    if (icons[id] == undefined) {
      var icon = L.marker([latitude, longitude], {
        icon: coffeeCupIcon
      }).addTo(map);
      icons[id] = icon;
      console.log("show: " + id);
    } else {
      map.removeLayer(icons[id]);
      icons[id] = undefined;
    }
    console.log("icons: " + icons[id]);
  }

  function centerOnMap(latitude, longitude, id = "") {
    map.setView([latitude, longitude], 15);
    console.log("center: " + id);
  }

  function showAllOnMap() {
    fetch('/map/fetchAllCoordinates')
      .then(response => response.json())
      .then(data => {
        data.forEach((line) => {
          if (icons[line.id] != undefined) return;
          showOnMap(line.latitude, line.longitude, line.id);
        });

        console.log("show all");
        console.log(all);
      });
  }
</script>
