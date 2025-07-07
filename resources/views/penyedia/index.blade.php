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
                    <table id="tabel-penyedia" class="table table-hover table-bordered table-striped w-100">
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
                                {{-- <th>NPWP Doc</th>
                                <th>KTP Doc</th>
                                <th>Rek. Koran Doc</th> --}}
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
                                    {{-- <td class="text-center">
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
                                    </td> --}}
                                    <td class="text-nowrap text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                id="penyediaActionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cog"></i> Action
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="penyediaActionDropdown">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('penyedia.edit', $penyedia->id) }}">
                                                        <i class="fas fa-edit me-2"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('penyedia.destroy', $penyedia->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="return confirm('Hapus data ini?')">
                                                            <i class="fas fa-trash-alt me-2"></i> Hapus
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
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
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> --}}
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
    <script>
        $(function() {
            $('#tabel-penyedia').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                searching: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                order: [
                    [4, 'desc']
                ],
            });
        });
    </script>
@endpush
