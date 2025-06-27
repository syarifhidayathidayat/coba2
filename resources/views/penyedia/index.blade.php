@extends('layouts.app')

@section('title', 'Daftar Penyedia')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h2 class="mb-0">Daftar Penyedia</h2>
            <a href="{{ route('penyedia.create') }}" class="btn btn-primary mt-3">
                <i class="fas fa-plus"></i> Tambah Penyedia
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tempat untuk tombol export -->
        <div class="d-flex justify-content-end mb-2" id="export-buttons"></div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Show</th>
                                <th>Nama Penyedia</th>
                                <th>Nama Direktur</th>
                                <th>Alamat</th>
                                {{-- <th>Telp</th> --}}
                                {{-- <th>Website</th> --}}
                                {{-- <th>Fax</th> --}}
                                <th>Email</th>
                                <th>Rekening</th>
                                <th>Cabang Bank</th>
                                <th>Rekening A/n</th>
                                <th>NPWP</th>
                                <th>NPWP Doc</th>
                                <th>KTP Doc</th>
                                <th>Rek. Koran Doc</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyedias as $penyedia)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('penyedia.show', $penyedia->id) }}" title="Detail">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                    </td>
                                    <td>{{ $penyedia->nama_penyedia }}</td>
                                    <td>{{ $penyedia->nama_direktur_penyedia }}</td>
                                    <td>{{ $penyedia->alamat }}</td>
                                    {{-- <td>{{ $penyedia->telepon }}</td> --}}
                                    {{-- <td>{{ $penyedia->website }}</td> --}}
                                    {{-- <td>{{ $penyedia->fax }}</td> --}}
                                    <td>{{ $penyedia->email }}</td>
                                    <td>{{ $penyedia->rekening_bank }}</td>
                                    <td>{{ $penyedia->cabang_bank }}</td>
                                    <td>{{ $penyedia->rekening_atas_nama }}</td>
                                    <td>{{ $penyedia->npwp }}</td>
                                    <td class="text-center">
                                        @if ($penyedia->dokumen_npwp)
                                            <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}" target="_blank"
                                                title="Lihat NPWP">
                                                <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($penyedia->dokumen_ktp)
                                            <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}" target="_blank"
                                                title="Lihat KTP">
                                                <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($penyedia->dokumen_rekening_koran)
                                            <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}"
                                                target="_blank" title="Lihat Rekening Koran">
                                                <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex gap-1 flex-wrap">
                                            <a href="{{ route('penyedia.edit', $penyedia->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('penyedia.destroy', $penyedia->id) }}" method="POST"
                                                onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<!-- DataTables + Buttons CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
    $(document).ready(function () {
        const table = $('.datatable').DataTable({
            responsive: true,
            scrollX: true,
            autoWidth: true,
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            order: [[1, 'desc']],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    className: 'btn btn-sm btn-secondary',
                    text: '<i class="fas fa-copy"></i> Salin'
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-sm btn-success',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'pdfHtml5',
                    className: 'btn btn-sm btn-danger',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm btn-info',
                    text: '<i class="fas fa-print"></i> Cetak'
                },
                {
                    extend: 'colvis',
                    className: 'btn btn-sm btn-warning',
                    text: '<i class="fas fa-columns"></i> Kolom'
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            }
        });

        // Render tombol export ke div
        table.buttons().container().appendTo('#export-buttons');
    });
</script>
@endpush
