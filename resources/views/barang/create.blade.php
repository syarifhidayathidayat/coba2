@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Tambah Barang untuk SP: {{ $sp->nomor_sp }}</h4>
    <form action="{{ route('barang.store', $sp->id) }}" method="POST">
        @csrf
    
        <div id="barang-list">
            <div class="row mb-2 barang-item align-items-end">
                <div class="col-md-5">
                    <input type="hidden" name="sp_id" value="{{ $sp->id }}">
                    <input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" required>
                </div>
                <div class="col-md-2">
                    <input type="number" name="qty[]" class="form-control" placeholder="Qty" required>
                </div>
                <div class="col-md-3">
                    <select name="penempatan_id[]" class="form-control" required>
                        <option value="">-- Pilih Penempatan --</option>
                        @foreach ($penempatans as $penempatan)
                            <option value="{{ $penempatan->id }}">{{ $penempatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="button" class="btn btn-success btn-sm btn-add" title="Tambah">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm btn-remove" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            
        </div>
    
        <button type="submit" class="btn btn-primary mt-3">Simpan Barang</button>
    </form>
    
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const barangList = document.getElementById('barang-list');

        // Tambah Barang
        barangList.addEventListener('click', function (e) {
            if (e.target.closest('.btn-add')) {
                const item = e.target.closest('.barang-item');
                const clone = item.cloneNode(true);

                // Kosongkan input
                clone.querySelectorAll('input').forEach(input => input.value = '');

                barangList.appendChild(clone);
            }

            // Hapus Barang
            if (e.target.closest('.btn-remove')) {
                const item = e.target.closest('.barang-item');

                // Jangan hapus jika hanya tinggal satu
                if (barangList.querySelectorAll('.barang-item').length > 1) {
                    item.remove();
                } else {
                    alert('Minimal harus ada satu barang.');
                }
            }
        });
    });
</script>

