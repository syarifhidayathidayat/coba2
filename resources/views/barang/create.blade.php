@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Tambah Barang untuk SP: {{ $sp->nomor_sp }}</h4>
    <form action="{{ route('barang.store', $sp->id) }}" method="POST">
        @csrf

        <div id="barang-list">
            <div class="row mb-2 barang-item">
                <input type="hidden" name="sp_id" value="{{ $sp->id }}">

                <div class="col-md-3">
                    <input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" required>
                </div>

                <div class="col-md-1">
                    <input type="number" name="qty[]" class="form-control qty" placeholder="Qty" required>
                </div>

                <div class="col-md-2">
                    <input type="text" class="form-control harga-format" placeholder="Harga">
                    <input type="hidden" name="harga[]" class="harga">
                </div>

                <div class="col-md-2">
                    <input type="text" class="form-control ongkos-format" placeholder="Ongkir">
                    <input type="hidden" name="ongkos_kirim[]" class="ongkos">
                </div>

                <div class="col-md-2">
                    <input type="text" class="form-control total-format" placeholder="Total" readonly>
                    <input type="hidden" name="total[]" class="total">
                </div>

                <div class="col-md-2">
                    <select name="penempatan_id[]" class="form-control" required>
                        <option value="">-- Penempatan --</option>
                        @foreach ($penempatans as $penempatan)
                            <option value="{{ $penempatan->id }}">{{ $penempatan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-1 d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-danger btn-remove" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-success btn-add" title="Tambah">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Ringkasan --}}
        <div class="mt-4 p-3 border rounded bg-light">
            <h6>Ringkasan:</h6>
            <div class="row">
                <div class="col-md-4">
                    <label>Total Harga Barang</label>
                    <div id="total-harga" class="form-control bg-white" readonly></div>
                </div>
                <div class="col-md-4">
                    <label>Total Ongkos Kirim</label>
                    <div id="total-ongkir" class="form-control bg-white" readonly></div>
                </div>
                <div class="col-md-4">
                    <label>Total Kontrak</label>
                    <div id="total-kontrak" class="form-control bg-white" readonly></div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Barang</button>
    </form>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const barangList = document.getElementById('barang-list');

        function unformatNumber(str) {
            return parseInt(str.replace(/\./g, '').replace(',', '')) || 0;
        }

        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        function updateTotals() {
            let grandTotal = 0;
            let totalOngkir = 0;
            let totalKontrak = 0;

            document.querySelectorAll('.barang-item').forEach(function(item) {
                const qty = parseInt(item.querySelector('[name="qty[]"]').value) || 0;
                const hargaFormatted = item.querySelector('.harga-format').value;
                const ongkirFormatted = item.querySelector('.ongkos-format').value;

                const harga = unformatNumber(hargaFormatted);
                const ongkir = unformatNumber(ongkirFormatted);

                const total = Math.floor(qty * harga) + ongkir;

                // Set value ke input hidden dan display
                item.querySelector('.harga').value = harga;
                item.querySelector('.ongkos').value = ongkir;
                item.querySelector('.total').value = total;
                item.querySelector('.total-format').value = formatNumber(total);

                grandTotal += qty * harga;
                totalOngkir += ongkir;
                totalKontrak += total;
            });

            document.getElementById('total-harga').textContent = formatNumber(grandTotal);
            document.getElementById('total-ongkir').textContent = formatNumber(totalOngkir);
            document.getElementById('total-kontrak').textContent = formatNumber(totalKontrak);
        }

        // Auto-format saat input harga & ongkir diketik
        function handleFormatInput(selector) {
            barangList.addEventListener('input', function(e) {
                if (e.target.matches(selector)) {
                    const val = e.target.value.replace(/\./g, '').replace(',', '');
                    const formatted = formatNumber(val);
                    e.target.value = formatted;
                    updateTotals();
                }
            });
        }

        handleFormatInput('.harga-format');
        handleFormatInput('.ongkos-format');
        barangList.addEventListener('input', function(e) {
            if (e.target.name === "qty[]") updateTotals();
        });

        // Tambah dan Hapus Barang
        barangList.addEventListener('click', function(e) {
            if (e.target.closest('.btn-add')) {
                const item = e.target.closest('.barang-item');
                const clone = item.cloneNode(true);
                clone.querySelectorAll('input').forEach(input => input.value = '');
                barangList.appendChild(clone);
                updateTotals();
            }

            if (e.target.closest('.btn-remove')) {
                const item = e.target.closest('.barang-item');
                if (barangList.querySelectorAll('.barang-item').length > 1) {
                    item.remove();
                    updateTotals();
                } else {
                    alert('Minimal harus ada satu barang.');
                }
            }
        });

        updateTotals(); // Panggil awal
    });
</script>
