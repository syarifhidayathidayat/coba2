@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Edit Barang: {{ $nama_barang }} untuk SP: {{ $sp->nomor_sp }}</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('barang.update', ['sp_id' => $sp->id, 'nama_barang' => $nama_barang]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $nama_barang }}" required readonly>
            </div>
            <div class="col-md-2">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $barangs->first()->harga ?? 0 }}" required>
            </div>
            <div class="col-md-2">
                <label>Ongkos Kirim</label>
                <input type="number" name="ongkos_kirim" class="form-control" value="{{ $barangs->first()->ongkos_kirim ?? 0 }}">
            </div>
        </div>
        <div id="penempatan-list">
            <label>Penempatan & Qty</label>
            @foreach($barangs as $i => $barang)
            <div class="row penempatan-item align-items-center mb-2">
                <div class="col-md-5">
                    <select name="penempatan_id[]" class="form-control" required>
                        <option value="">-- Penempatan --</option>
                        @foreach($penempatans as $penempatan)
                            <option value="{{ $penempatan->id }}" {{ $barang->penempatan_id == $penempatan->id ? 'selected' : '' }}>{{ $penempatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="qty_penempatan[]" class="form-control" placeholder="Qty" min="1" value="{{ $barang->qty }}" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-sm btn-danger btn-remove-penempatan">Hapus</button>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-sm btn-secondary mb-3" id="btn-add-penempatan">Tambah Penempatan</button>
        <br>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('sp.show', $sp->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const penempatanList = document.getElementById('penempatan-list');
    const btnAdd = document.getElementById('btn-add-penempatan');
    let initialTotalQty = 0;
    // Hitung qty awal (saat load)
    document.querySelectorAll('input[name="qty_penempatan[]"]').forEach(function(input) {
        initialTotalQty += parseInt(input.value) || 0;
    });

    btnAdd.addEventListener('click', function() {
        const penempatanHTML = `
            <div class=\"row penempatan-item align-items-center mb-2\">
                <div class=\"col-md-5\">
                    <select name=\"penempatan_id[]\" class=\"form-control\" required>
                        <option value=\"\">-- Penempatan --</option>
                        @foreach($penempatans as $penempatan)
                            <option value=\"{{ $penempatan->id }}\">{{ $penempatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=\"col-md-3\">
                    <input type=\"number\" name=\"qty_penempatan[]\" class=\"form-control\" placeholder=\"Qty\" min=\"1\" required>
                </div>
                <div class=\"col-md-2\">
                    <button type=\"button\" class=\"btn btn-sm btn-danger btn-remove-penempatan\">Hapus</button>
                </div>
            </div>
        `;
        penempatanList.insertAdjacentHTML('beforeend', penempatanHTML);
    });
    penempatanList.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-penempatan')) {
            if(confirm('Yakin hapus penempatan ini?')) {
                e.target.closest('.penempatan-item').remove();
            }
        }
    });
    // Validasi penempatan tidak boleh ganda
    document.querySelector('form').addEventListener('submit', function(e) {
        let penempatanVals = [];
        let duplicate = false;
        document.querySelectorAll('select[name="penempatan_id[]"]')
            .forEach(function(sel) {
                if (penempatanVals.includes(sel.value) && sel.value !== '') duplicate = true;
                penempatanVals.push(sel.value);
            });
        if (duplicate) {
            alert('Penempatan tidak boleh ganda!');
            e.preventDefault();
            return false;
        }
    });
});
</script>
@endpush 