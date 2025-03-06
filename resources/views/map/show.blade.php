<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Map') }} - {{ $map->title }}
      </h2>
      <div class="flex items-center justify-around gap-1">
        <a href="{{ route('map.edit', $map->id) }}"
          class="btn btn-gray-200 mr-2 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100">
          <span class="material-icons p-1">
            edit
          </span>
        </a>
        <form method="POST" action="{{ route('map.destroy', $map->id) }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-red-500 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100">
            <span class="material-icons p-1">
              delete
            </span>
          </button>
        </form>
      </div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
        <div class="bg-white p-6 dark:bg-gray-800">
          <h2 class="text-2xl font-bold leading-tight text-gray-800 dark:text-gray-200">
            {{ $map->title }}
          </h2>
          <a href="{{ $map->url }}"
            class="btn btn-gray-200 mt-2 rounded px-2 font-bold dark:bg-gray-700 dark:text-gray-100">
            Link
          </a>
          @if ($map->coord)
            <p class="mt-2 text-gray-600 dark:text-gray-400">
              Latitude: {{ $map->coord->latitude }}
              <br>
              Longitude: {{ $map->coord->longitude }}
              <br>
              Altitude: {{ $map->coord->altitude }}
            </p>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
