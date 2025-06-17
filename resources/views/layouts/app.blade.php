<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- SB Admin 2 CSS -->
     <link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- fitur cari pada dropdown --}}

</head>

<body id="page-top">

    <div id="wrapper">
        @include('layouts.sidebar') {{-- Sidebar SB Admin --}}
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.topbar') {{-- Topbar (opsional) --}}
                <div class="container-fluid">
                    @yield('content') {{-- Konten halaman --}}
                </div>
            </div>

            @include('layouts.footer') {{-- Footer --}}
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- SB Admin 2 JS -->
    <script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>
    <!-- DataTables JS global -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts')
</body>

</html>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih Penyedia",
            allowClear: true
        });
    });
</script>
