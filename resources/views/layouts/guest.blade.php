<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Library Management System') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Tailwind CSS --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- Open Sans desde Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased leading-normal">
  <div id="app" class="min-h-screen flex flex-col">
    @yield('content')
  </div>

  {{-- Scripts --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
