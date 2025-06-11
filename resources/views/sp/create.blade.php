@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Form Input SP</h3>
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
                    @foreach($penyedias as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_penyedia }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-4">
                <label>Nama Paket</label>
                <input type="text" name="nama_paket" class="form-control" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Tanggal SP</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Total Kontrak</label>
                <input type="number" name="total_kontrak" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Mulai Pekerjaan</label>
                <input type="date" name="mulai_pekerjaan" id="mulai" class="form-control" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Masa (hari)</label>
                <input type="number" name="masa" id="masa" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label>Akhir Pekerjaan</label>
                <input type="text" id="akhir" class="form-control" readonly>
            </div>
            <div class="col-md-4">
                <label>Metode</label>
                <select name="metode" class="form-control" required>
                    <option value="">-- Pilih Metode --</option>
                    @foreach($metodes as $metode)
                        <option value="{{ $metode }}">{{ $metode }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Total Pagu</label>
                <input type="number" name="total_pagu" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Akun</label>
                <input type="text" name="akun" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary mt-4">Simpan</button>
    </form>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mulaiInput = document.getElementById('mulai');
        const masaInput = document.getElementById('masa');
        const akhirInput = document.getElementById('akhir');
        const submitBtn = document.querySelector('button[type="submit"]');

        function hitungTanggalAkhir() {
            const mulai = new Date(mulaiInput.value);
            const masa = parseInt(masaInput.value);

            if (!isNaN(mulai.getTime()) && !isNaN(masa)) {
                const akhir = new Date(mulai);
                akhir.setDate(akhir.getDate() + masa - 1); // Dikurangi 1 agar mulai dihitung sebagai hari ke-1

                const hari = akhir.getDay(); // 0 = Minggu, 6 = Sabtu

                if (hari === 0 || hari === 6) {
                    akhirInput.value = '';
                    alert('Tanggal akhir jatuh pada hari Sabtu/Minggu. Silakan ubah masa pekerjaan.');
                    if (submitBtn) submitBtn.disabled = true;
                } else {
                    const yyyy = akhir.getFullYear();
                    const mm = String(akhir.getMonth() + 1).padStart(2, '0');
                    const dd = String(akhir.getDate()).padStart(2, '0');

                    akhirInput.value = `${yyyy}-${mm}-${dd}`;
                    if (submitBtn) submitBtn.disabled = false;
                }
            }
        }

        mulaiInput.addEventListener('change', hitungTanggalAkhir);
        masaInput.addEventListener('input', hitungTanggalAkhir);
    });
</script>



