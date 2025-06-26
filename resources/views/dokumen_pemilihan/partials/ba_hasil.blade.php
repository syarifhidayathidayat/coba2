<div class="card mb-4">
    <div class="card-header">Berita Acara Hasil Pengadaan Langsung</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. BA Hasil</label>
                <input type="text" name="ba_hasil_nomor"
                    value="{{ old('ba_hasil_nomor', $dokumen->ba_hasil_nomor ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Hari</label>
                <input type="text" name="ba_hasil_hari"
                    value="{{ old('ba_hasil_hari', $dokumen->ba_hasil_hari ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal</label>
                <input type="date" name="ba_hasil_tanggal"
                    value="{{ old('ba_hasil_tanggal', $dokumen->ba_hasil_tanggal ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <label>Penawaran Administrasi</label>
                <select name="ba_hasil_penawaran_admin" class="form-control">
                    <option value="0"
                        {{ old('ba_hasil_penawaran_admin', $dokumen->ba_hasil_penawaran_admin ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_hasil_penawaran_admin', $dokumen->ba_hasil_penawaran_admin ?? '') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Penawaran Teknis</label>
                <select name="ba_hasil_penawaran_teknis" class="form-control">
                    <option value="0"
                        {{ old('ba_hasil_penawaran_teknis', $dokumen->ba_hasil_penawaran_teknis ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_hasil_penawaran_teknis', $dokumen->ba_hasil_penawaran_teknis ?? '') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Penawaran Biaya</label>
                <select name="ba_hasil_penawaran_biaya" class="form-control">
                    <option value="0"
                        {{ old('ba_hasil_penawaran_biaya', $dokumen->ba_hasil_penawaran_biaya ?? '') == 0 ? 'selected' : '' }}>
                        Tidak Ada</option>
                    <option value="1"
                        {{ old('ba_hasil_penawaran_biaya', $dokumen->ba_hasil_penawaran_biaya ?? '') == 1 ? 'selected' : '' }}>
                        Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Keterangan Penawaran</label>
                <input type="text" name="ba_hasil_penawaran_keterangan"
                    value="{{ old('ba_hasil_penawaran_keterangan', $dokumen->ba_hasil_penawaran_keterangan ?? '') }}"
                    class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Harga Setelah Koreksi Aritmetik</label>
                <input type="number" step="0.01" name="ba_hasil_harga_koreksi"
                    value="{{ old('ba_hasil_harga_koreksi', $dokumen->ba_hasil_harga_koreksi ?? '') }}"
                    class="form-control">
            </div>
            <div class="col-md-6">
                <label>Harga Setelah Negosiasi</label>
                <input type="number" step="0.01" name="ba_hasil_harga_final"
                    value="{{ old('ba_hasil_harga_final', $dokumen->ba_hasil_harga_final ?? '') }}"
                    class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <label>Evaluasi Administrasi</label>
            <textarea name="ba_hasil_evaluasi_admin" class="form-control" rows="2">{{ old('ba_hasil_evaluasi_admin', $dokumen->ba_hasil_evaluasi_admin ?? '') }}</textarea>
        </div>

        <div class="mt-3">
            <label>Evaluasi Teknis</label>
            <textarea name="ba_hasil_evaluasi_teknis" class="form-control" rows="2">{{ old('ba_hasil_evaluasi_teknis', $dokumen->ba_hasil_evaluasi_teknis ?? '') }}</textarea>
        </div>

        <div class="mt-3">
            <label>Evaluasi Kewajaran Harga</label>
            <textarea name="ba_hasil_evaluasi_harga" class="form-control" rows="2">{{ old('ba_hasil_evaluasi_harga', $dokumen->ba_hasil_evaluasi_harga ?? '') }}</textarea>
        </div>
    </div>
</div>

@include('dokumen_pemilihan.partials.nota_dinas')
