<div class="card mb-4">
    <div class="card-header">
        <h5>Berita Acara Hasil Pengadaan Langsung</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. BA Hasil</label>
                <input type="text" name="ba_hasil_nomor"
                    value="{{ old('ba_hasil_nomor', $dokumen->ba_hasil_nomor ?? 'ULP/Pejabat Pengadaan/xxxxx/2025') }}"
                    class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal</label>
                <input type="date" name="ba_hasil_tanggal" id="ba_hasil_tanggal"
                    value="{{ old('ba_hasil_tanggal', $dokumen->ba_hasil_tanggal ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Hari</label>
                <input type="text" name="ba_hasil_hari" id="ba_hasil_hari" readonly
                    value="{{ old('ba_hasil_hari', $dokumen->ba_hasil_hari ?? '') }}" class="form-control bg-light">
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Penawaran Administrasi</label>
                <select name="ba_hasil_penawaran_admin" class="form-control">
                    <option value="0"
                        {{ old('ba_hasil_penawaran_admin', $dokumen->ba_hasil_penawaran_admin ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_hasil_penawaran_admin', $dokumen->ba_hasil_penawaran_admin ?? '1') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Penawaran Teknis</label>
                <select name="ba_hasil_penawaran_teknis" class="form-control">
                    <option value="0"
                        {{ old('ba_hasil_penawaran_teknis', $dokumen->ba_hasil_penawaran_teknis ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_hasil_penawaran_teknis', $dokumen->ba_hasil_penawaran_teknis ?? '1') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>Penawaran Biaya</label>
                <select name="ba_hasil_penawaran_biaya" class="form-control">
                    <option value="0"
                        {{ old('ba_hasil_penawaran_biaya', $dokumen->ba_hasil_penawaran_biaya ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_hasil_penawaran_biaya', $dokumen->ba_hasil_penawaran_biaya ?? '1') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Keterangan Penawaran</label>
                <input type="text" name="ba_hasil_penawaran_keterangan"
                    value="{{ old('ba_hasil_penawaran_keterangan', $dokumen->ba_hasil_penawaran_keterangan ?? '') }}"
                    class="form-control">
            </div>
            <div class="col-md-4">
                <label>Harga Setelah Koreksi Aritmetik</label>
                <input type="number" step="0.01" name="ba_hasil_harga_koreksi"
                    value="{{ old('ba_hasil_harga_koreksi', $dokumen->ba_hasil_harga_koreksi ?? '') }}"
                    class="form-control">
            </div>
            <div class="col-md-4">
                <label>Harga Setelah Negosiasi</label>
                <input type="number" step="0.01" name="ba_hasil_harga_final"
                    value="{{ old('ba_hasil_harga_final', $dokumen->ba_hasil_harga_final ?? '') }}"
                    class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Evaluasi Administrasi</label>
                <textarea name="ba_hasil_evaluasi_admin" class="form-control" rows="1">{{ old('ba_hasil_evaluasi_admin', $dokumen->ba_hasil_evaluasi_admin ?? 'Memenuhi Syarat') }}</textarea>
            </div>


            <div class="col-md-4">
                <label>Evaluasi Teknis</label>
                <textarea name="ba_hasil_evaluasi_teknis" class="form-control" rows="1">{{ old('ba_hasil_evaluasi_teknis', $dokumen->ba_hasil_evaluasi_teknis ?? 'Memenuhi Syarat') }}</textarea>
            </div>

            <div class="col-md-4">
                <label>Evaluasi Kewajaran Harga</label>
                <textarea name="ba_hasil_evaluasi_harga" class="form-control" rows="1">{{ old('ba_hasil_evaluasi_harga', $dokumen->ba_hasil_evaluasi_harga ?? 'Memenuhi Syarat') }}</textarea>
            </div>
        </div>
    </div>
</div>

{{-- @include('dokumen_pemilihan.partials.nota_dinas') --}}


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalInput = document.getElementById('ba_hasil_tanggal');
        const hariInput = document.getElementById('ba_hasil_hari');

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
