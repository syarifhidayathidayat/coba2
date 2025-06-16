@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Form Input Surat Pesanan</h3>
        <form action="{{ route('sp.store') }}" method="POST">

            @csrf

            <div class="row">
                <div class="col-md-4">
                    <label>Nomor Surat Pesanan</label>
                    <input type="text" name="nomor_sp" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Penyedia</label>
                    <select name="penyedia_id" class="form-control select2" required>
                        <option value="">-- Pilih Penyedia --</option>
                        @foreach ($penyedias as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_penyedia }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Nama Paket</label>
                    <select name="nama_paket" id="nama_paket" class="form-control" required>
                        <option value="">-- Pilih Paket Pekerjaan --</option>
                        @foreach ($paketPekerjaan as $paket)
                            <option value="{{ $paket->nama_paket }}" data-max="{{ $paket->max }}" data-pagu="{{ $paket->pagu }}">{{ $paket->nama_paket }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Tanggal SP</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-3">
                    <label>Mulai Pekerjaan</label>
                    <input type="date" name="mulai_pekerjaan" id="mulai" class="form-control"
                        value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-3">
                    <label>Masa (hari)</label>
                    <input type="number" name="masa" id="masa" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Akhir Pekerjaan</label>
                    <input type="text" id="akhir" class="form-control" readonly>
                    <input type="hidden" name="akhir_pekerjaan" id="akhir_pekerjaan_hidden">
                </div>
            </div>
            <div class="row mt-3">
                {{-- Total Kontrak dihapus --}}
                <div class="col-md-4">
                    <label>Total Pagu</label>
                    <input type="number" name="total_pagu" id="total_pagu" class="form-control" required readonly>
                </div>
                <div class="col-md-4">
                    <label>Metodes</label>
                    <select name="metode" class="form-control" required>
                        <option value="">-- Pilih Metode --</option>
                        @foreach ($metodes as $metode)
                            <option value="{{ $metode }}">{{ $metode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Akun</label>
                    <input type="text" name="akun" id="akun" class="form-control" required readonly>
                </div>
            </div>
            <button class="btn btn-success btn-sm mt-4">Simpan</button>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mulaiInput = document.getElementById('mulai');
        const masaInput = document.getElementById('masa');
        const akhirInput = document.getElementById('akhir');
        const akhirHidden = document.getElementById('akhir_pekerjaan_hidden');
        const submitBtn = document.querySelector('button[type="submit"]');
        const namaPaketSelect = document.getElementById('nama_paket');
        const akunInput = document.getElementById('akun');
        const totalPaguInput = document.getElementById('total_pagu');

        function hitungTanggalAkhir() {
            const mulai = new Date(mulaiInput.value);
            const masa = parseInt(masaInput.value);

            if (!isNaN(mulai.getTime()) && !isNaN(masa)) {
                const akhir = new Date(mulai);
                akhir.setDate(akhir.getDate() + masa - 1);

                const yyyy = akhir.getFullYear();
                const mm = String(akhir.getMonth() + 1).padStart(2, '0');
                const dd = String(akhir.getDate()).padStart(2, '0');
                const formatted = `${yyyy}-${mm}-${dd}`;

                if (akhir.getDay() === 0 || akhir.getDay() === 6) {
                    akhirInput.value = '';
                    akhirHidden.value = '';
                    alert('Tanggal akhir jatuh pada hari Sabtu/Minggu. Silakan ubah masa pekerjaan.');
                    if (submitBtn) submitBtn.disabled = true;
                } else {
                    akhirInput.value = formatted;
                    akhirHidden.value = formatted;
                    if (submitBtn) submitBtn.disabled = false;
                }
            }
        }

        mulaiInput.addEventListener('change', hitungTanggalAkhir);
        masaInput.addEventListener('input', hitungTanggalAkhir);

        namaPaketSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const max = selectedOption.getAttribute('data-max');
            const pagu = selectedOption.getAttribute('data-pagu');
            akunInput.value = max || '';
            totalPaguInput.value = pagu || '';
        });
    });
</script>

