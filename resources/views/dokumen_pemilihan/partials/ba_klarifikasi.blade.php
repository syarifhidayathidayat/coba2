<div class="card mb-4">
    <div class="card-header">
        <h5>Berita Acara Klarifikasi dan Negosiasi</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. BA Klarifikasi</label>
                <input type="text" name="ba_klarifikasi_nomor"
                    value="{{ old('ba_klarifikasi_nomor', $dokumen->ba_klarifikasi_nomor ?? 'ULP/Pejabat Pengadaan/xxxxx/2025') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal</label>
                <input type="date" name="ba_klarifikasi_tanggal" id="ba_klarifikasi_tanggal"
                    value="{{ old('ba_klarifikasi_tanggal', $dokumen->ba_klarifikasi_tanggal ?? '') }}"
                    class="form-control">
            </div>
            <div class="col-md-3">
                <label>Hari</label>
                <input type="text" name="ba_klarifikasi_hari" id="ba_klarifikasi_hari"
                    value="{{ old('ba_klarifikasi_hari', $dokumen->ba_klarifikasi_hari ?? '') }}" class="form-control bg-light">
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Harga Penawaran</label>
                <input type="number" step="0.01" name="ba_klarifikasi_harga_penawaran"
                    value="{{ old('ba_klarifikasi_harga_penawaran', $dokumen->ba_klarifikasi_harga_penawaran ?? '') }}"
                    class="form-control">
            </div>
            <div class="col-md-6">
                <label>Harga Setelah Negosiasi</label>
                <input type="number" step="0.01" name="ba_klarifikasi_harga_negosiasi"
                    value="{{ old('ba_klarifikasi_harga_negosiasi', $dokumen->ba_klarifikasi_harga_negosiasi ?? '') }}"
                    class="form-control">
            </div>
        </div>
    </div>
</div>

{{-- @include('dokumen_pemilihan.partials.ba_hasil') --}}



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalInput = document.getElementById('ba_klarifikasi_tanggal');
        const hariInput = document.getElementById('ba_klarifikasi_hari');

        const hariIndo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        if (tanggalInput && hariInput) {
            tanggalInput.addEventListener('change', function() {
                const tanggal = new Date(this.value);
                if (!isNaN(tanggal.getTime())) {
                    hariInput.value = hariIndo[tanggal.getDay()];
                } else {
                    hariInput.value = '';
                }
            });

            // Isi otomatis saat load jika sudah ada tanggal
            if (tanggalInput.value) {
                const tanggal = new Date(tanggalInput.value);
                if (!isNaN(tanggal.getTime())) {
                    hariInput.value = hariIndo[tanggal.getDay()];
                }
            }
        }
    });
</script>
