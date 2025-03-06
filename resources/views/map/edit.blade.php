<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Update Map') }}
    </h2>
  </x-slot>
  <form method="POST" action="{{ route('map.update', $map->id) }}">
    @csrf
    @method('PUT')

    <!-- Map title and URL -->
    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
      <input id="title" type="text" name="title" value="{{ old('title', $map->title) }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100"
        required>
      @error('title')
        <span class="text-sm text-red-500">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-200">URL</label>
      <input id="url" type="url" name="url" value="{{ old('url', $map->url) }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
      @error('url')
        <span class="text-sm text-red-500">{{ $message }}</span>
      @enderror
    </div>

    <!-- Coordinates -->
    <div class="mb-4">
      <label for="coordinates" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Coordinates</label>
      <div class="-mx-2 flex flex-wrap">
        @if ($map->coord)
          <div class="mb-4 w-full px-2 md:w-1/2 xl:w-1/3">
            <label for="latitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Latitude</label>
            <input id="latitude" type="number" name="latitude" value="{{ old('latitude', $map->coord->latitude) }}"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
            @error('latitude')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4 w-full px-2 md:w-1/2 xl:w-1/3">
            <label for="longitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Longitude</label>
            <input id="longitude" type="number" name="longitude" value="{{ old('longitude', $map->coord->longitude) }}"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
            @error('longitude')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <div class="mb-4 w-full px-2 md:w-1/2 xl:w-1/3">
            <label for="altitude_value"
              class="block text-sm font-medium text-gray-700 dark:text-gray-200">Altitude</label>
            <input id="altitude_value" type="number" name="altitude_value"
              value="{{ old('altitude_value', $map->coord ? substr($map->coord->altitude, 0, -1) : '') }}"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
            @error('altitude')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
        @else
          <div class="mb-4 w-full px-2 md:w-1/2 xl:w-1/3">
            <label for="latitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Latitude</label>
            <input id="latitude" type="number" name="latitude" value=""
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
          </div>

          <div class="mb-4 w-full px-2 md:w-1/2 xl:w-1/3">
            <label for="longitude" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Longitude</label>
            <input id="longitude" type="number" name="longitude" value=""
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
          </div>

          <div class="mb-4 w-full px-2 md:w-1/2 xl:w-1/3">
            <label for="altitude_value"
              class="block text-sm font-medium text-gray-700 dark:text-gray-200">Altitude</label>
            <input id="altitude_value" type="number" name="altitude_value" value=""
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100">
          </div>
        @endif
      </div>
    </div>

    <div class="flex items-center justify-end bg-gray-50 px-4 py-3 text-right sm:px-6 dark:bg-gray-800">
      <button type="submit">Submit</button>
    </div>
  </form>
</x-app-layout>
