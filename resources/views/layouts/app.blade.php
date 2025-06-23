<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}" defer></script> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="c-app">

    @include('partials.sidebar') {{-- <- sudah fixed position dan scrollable --}}

    <div class="c-wrapper d-flex flex-column">
        @include('partials.header')

        <div class="c-body flex-grow-1">
            <main class="c-main px-4 py-3">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>

        <footer class="c-footer px-4">
            <div>&copy; {{ date('Y') }} {{ config('app.name') }}</div>
            <div class="ms-auto">Powered by <a href="https://coreui.io">CoreUI</a></div>
        </footer>
    </div>

</body>

</html>
