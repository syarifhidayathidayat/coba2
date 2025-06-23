<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Pengadaan'))</title>

    {{-- Vite Laravel --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- DataTables CSS (Bootstrap 5 style) --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="c-app d-flex">
        {{-- Sidebar --}}
        <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
            @include('layouts.sidebar')
        </div>

        {{-- Main Content --}}
        <div class="wrapper d-flex flex-column min-vh-100 bg-light flex-grow-1">
            {{-- Topbar --}}
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

    {{-- jQuery (wajib sebelum plugin lain) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Bootstrap JS via Vite --}}

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Select2 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    {{-- DataTables Export & Button --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    {{-- Export Dependencies --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    {{-- SweetAlert Session Flash --}}
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
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Pilih opsi',
                allowClear: true
            });
        });
    </script>

    {{-- Tempat inject script tambahan dari halaman --}}
    @stack('scripts')
</body>

</html>
