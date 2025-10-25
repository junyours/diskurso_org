<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <meta name="google-site-verification" content="2XyQMgn8Xz_5JVc5z57O-9Aj9VNKq4-Z5KMSv-WzJgg" />

  <title>{{ config('app.name') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-800 text-sm antialiased">
  @include('components.web.navbar')
  <main class="min-h-screen max-w-7xl mx-auto">
    @include('components.web.banner')
    @include('components.web.marquee')
    <div class="flex flex-col md:flex-row">
      <div class="p-2 w-full space-y-2 md:w-xs">
        @include('components.web.category')
        @include('components.web.download')
      </div>
      <div class="flex-1 md:py-2 max-md:px-2">
        @yield('content')
      </div>
      <div class="p-2 w-full space-y-2 md:w-xs">
        @include('components.web.author-menu')
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