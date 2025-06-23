<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Pengadaan') }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  @yield('content')

</body>
</html>
