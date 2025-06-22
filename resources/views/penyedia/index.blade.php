@extends('layouts.app')

@section('title', 'Daftar Penyedia')
@section('content')
    <div class="container-fluid">
        <h2>Daftar Penyedia</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('penyedia.create') }}" class="btn btn-primary mb-3">Tambah Penyedia</a>

        <table class="table table-bordered datatable table-responsive">
            <thead>
                <tr>
                    <!-- <th>No</th> -->
                    <th>Show</th>
                    <th>Nama Penyedia</th>
                    <th>Nama Direktur</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Website</th>
                    <th>Fax</th>
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
                @foreach ($penyedias as $index => $penyedia)
                    <tr>
                        <!-- <td>{{ $index + 1 }}</td> -->
                        <td>
                            <a href="{{ route('penyedia.show', $penyedia->id) }}"  title="Detail">
                                <i class="fas fa-eye"></i></th>
                        <td>{{ $penyedia->nama_penyedia }}</td>
                        <td>{{ $penyedia->nama_direktur_penyedia }}</td>
                        <td>{{ $penyedia->alamat }}</td>
                        <td>{{ $penyedia->telepon }}</td>
                        <td>{{ $penyedia->website }}</td>
                        <td>{{ $penyedia->fax }}</td>
                        <td>{{ $penyedia->email }}</td>
                        <td>{{ $penyedia->rekening_bank }}</td>
                        <td>{{ $penyedia->cabang_bank }}</td>
                        <td>{{ $penyedia->rekening_atas_nama }}</td>
                        <td>{{ $penyedia->npwp }}</td>

                        {{-- Tampilkan link file jika tersedia --}}
                        <td>
                            @if ($penyedia->dokumen_npwp)
                                <a href="{{ asset('storage/' . $penyedia->dokumen_npwp) }}" target="_blank"
                                    title="Lihat NPWP">
                                    <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($penyedia->dokumen_ktp)
                                <a href="{{ asset('storage/' . $penyedia->dokumen_ktp) }}" target="_blank"
                                    title="Lihat KTP">
                                    <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($penyedia->dokumen_rekening_koran)
                                <a href="{{ asset('storage/' . $penyedia->dokumen_rekening_koran) }}" target="_blank"
                                    title="Lihat Rekening Koran">
                                    <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td class="text-nowrap">
                            <a href="{{ route('penyedia.edit', $penyedia->id) }}" class="btn btn-sm btn-warning"
                                title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('penyedia.destroy', $penyedia->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger"
                                    title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true, // opsional, untuk responsif otomatis
                order: [
                    [0, 'desc']
                ], // urutkan berdasarkan kolom No (indeks 0) secara descending
            });
        });
    </script>
@endpush
