<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Pengadaan'))</title>

    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- CoreUI Layout Wrapper --}}
    <div class="c-app d-flex">
        {{-- Sidebar --}}
        <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
            @include('layouts.sidebar')
        </div>

        {{-- Main Content --}}
        <div class="wrapper d-flex flex-column min-vh-100 bg-light flex-grow-1">
            {{-- Header / Topbar --}}
            @include('layouts.topbar')

            {{-- Page Content --}}
            <div class="body flex-grow-1 px-3">
                <main>
                    @yield('content')
                </main>
            </div>

            {{-- Footer --}}
            @include('layouts.footer')
        </div>
    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- DataTables & Select2 --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Flash Messages --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: true
            });
        </script>
    @endif

    {{-- Select2 Init --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('.select2').select2({
                placeholder: "Pilih Penyedia",
                allowClear: true
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
