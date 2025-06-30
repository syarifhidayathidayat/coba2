<div class="card mb-4">
    <div class="card-header">
        <h5 class="text-primary">Berita Acara Pembukaan Penawaran</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. BA</label>
                <input type="text" name="ba_pembukaan_nomor"
                    value="{{ old('ba_pembukaan_nomor', $dokumen->ba_pembukaan_nomor ?? 'ULP/Pejabat Pengadaan/xxxxx/2025') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal</label>
                <input type="date" name="ba_pembukaan_tanggal" id="ba_pembukaan_tanggal"
                    value="{{ old('ba_pembukaan_tanggal', $dokumen->ba_pembukaan_tanggal ?? '') }}"
                    class="form-control">
            </div>
            <div class="col-md-3">
                <label>Hari</label>
                <input type="text" name="ba_pembukaan_hari" id="ba_pembukaan_hari" readonly
                    value="{{ old('ba_pembukaan_hari', $dokumen->ba_pembukaan_hari ?? '') }}" class="form-control bg-light">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label>Surat Penawaran</label>
                <select name="ba_pembukaan_surat_penawaran" class="form-control">
                    <option value="0"
                        {{ old('ba_pembukaan_surat_penawaran', $dokumen->ba_pembukaan_surat_penawaran ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_pembukaan_surat_penawaran', $dokumen->ba_pembukaan_surat_penawaran ?? '1') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Dokumen Teknis</label>
                <select name="ba_pembukaan_dok_teknis" class="form-control">
                    <option value="0"
                        {{ old('ba_pembukaan_dok_teknis', $dokumen->ba_pembukaan_dok_teknis ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_pembukaan_dok_teknis', $dokumen->ba_pembukaan_dok_teknis ?? '1') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Persyaratan</label>
                <select name="ba_pembukaan_syarat" class="form-control">
                    <option value="0"
                        {{ old('ba_pembukaan_syarat', $dokumen->ba_pembukaan_syarat ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_pembukaan_syarat', $dokumen->ba_pembukaan_syarat ?? '1') == 1 ? 'selected' : '' }}>Ada
                    </option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Lain yang Diminta</label>
                <select name="ba_pembukaan_lain" class="form-control">
                    <option value="0"
                        {{ old('ba_pembukaan_lain', $dokumen->ba_pembukaan_lain ?? '') == 0 ? 'selected' : '' }}>Tidak
                        Ada</option>
                    <option value="1"
                        {{ old('ba_pembukaan_lain', $dokumen->ba_pembukaan_lain ?? '1') == 1 ? 'selected' : '' }}>Ada
                    </option>
                </select>
            </div>
        </div>
        <div class="mt-3">
            <label>Keterangan</label>
            <textarea name="ba_pembukaan_keterangan" class="form-control" rows="3">{{ old('ba_pembukaan_keterangan', $dokumen->ba_pembukaan_keterangan ?? '') }}</textarea>
        </div>
    </div>
</div>
{{-- @include('dokumen_pemilihan.partials.ba_klarifikasi') --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalInput = document.getElementById('ba_pembukaan_tanggal');
        const hariInput = document.getElementById('ba_pembukaan_hari');
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
