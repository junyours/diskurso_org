<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

  <title>{{ config('app.name') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 text-sm antialiased">
  @include('components.web.navbar')
  <main class="min-h-screen max-w-7xl mx-auto">
    @include('components.web.banner')
    <div class="flex">
      <div class="p-2 min-w-xs">
        @include('components.web.research-journal')
      </div>
      <div class="flex-1 py-2">
        @yield('content')
      </div>
      <div class="p-2 min-w-xs">
        @include('components.web.archive')
      </div>
    </div>
  </main>
  @include('components.web.footer')
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</body>

</html>