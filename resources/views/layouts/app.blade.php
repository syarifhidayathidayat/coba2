<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Pengadaan'))</title>
    {{-- Vite compiled CSS/JS --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    {{-- CoreUI Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/@coreui/icons@3.0.0/css/all.min.css" rel="stylesheet">
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous">
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
</head>
<body>
    <div class="c-app d-flex">
        {{-- Sidebar --}}
        <div class="sidebar sidebar-fixed" id="sidebar">
            @include('layouts.sidebar')
        </div>
        {{-- Main Wrapper --}}
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
    {{-- Scripts --}}
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- jQuery & DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    {{-- Flash Alert --}}
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
    {{-- Sidebar Toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarEl = document.getElementById('sidebar');
            const sidebar = coreui.Sidebar.getOrCreateInstance(sidebarEl);
            document.querySelectorAll('[data-coreui-toggle="sidebar"]').forEach(btn => {
                btn.addEventListener('click', () => {
                    sidebar.toggle();
                });
            });
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnMinimize = document.getElementById('btn-minimize-sidebar');
            if (btnMinimize) {
                btnMinimize.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-minimized');
                });
            }
        });
    </script> --}}
    @stack('scripts')
</body>
</html>
