<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <x-primary-button onclick="window.location='{{ route('map.index') }}'">
        {{ __('Go to Map') }}
      </x-primary-button>

    </div>
  </div>
</x-app-layout>
