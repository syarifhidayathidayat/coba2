<div class="card mb-4">
    <div class="card-header">Berita Acara Pembukaan Penawaran</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. BA</label>
                <input type="text" name="ba_pembukaan_nomor" value="{{ old('ba_pembukaan_nomor', $dokumen->ba_pembukaan_nomor ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Hari</label>
                <input type="text" name="ba_pembukaan_hari" value="{{ old('ba_pembukaan_hari', $dokumen->ba_pembukaan_hari ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal</label>
                <input type="date" name="ba_pembukaan_tanggal" value="{{ old('ba_pembukaan_tanggal', $dokumen->ba_pembukaan_tanggal ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <label>Surat Penawaran</label>
                <select name="ba_pembukaan_surat_penawaran" class="form-control">
                    <option value="0" {{ old('ba_pembukaan_surat_penawaran', $dokumen->ba_pembukaan_surat_penawaran ?? '') == 0 ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="1" {{ old('ba_pembukaan_surat_penawaran', $dokumen->ba_pembukaan_surat_penawaran ?? '') == 1 ? 'selected' : '' }}>Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Dokumen Teknis</label>
                <select name="ba_pembukaan_dok_teknis" class="form-control">
                    <option value="0" {{ old('ba_pembukaan_dok_teknis', $dokumen->ba_pembukaan_dok_teknis ?? '') == 0 ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="1" {{ old('ba_pembukaan_dok_teknis', $dokumen->ba_pembukaan_dok_teknis ?? '') == 1 ? 'selected' : '' }}>Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Persyaratan</label>
                <select name="ba_pembukaan_syarat" class="form-control">
                    <option value="0" {{ old('ba_pembukaan_syarat', $dokumen->ba_pembukaan_syarat ?? '') == 0 ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="1" {{ old('ba_pembukaan_syarat', $dokumen->ba_pembukaan_syarat ?? '') == 1 ? 'selected' : '' }}>Ada</option>
                </select>
            </div>
            <div class="col-md-3">
                <label>Lain yang Diminta</label>
                <select name="ba_pembukaan_lain" class="form-control">
                    <option value="0" {{ old('ba_pembukaan_lain', $dokumen->ba_pembukaan_lain ?? '') == 0 ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="1" {{ old('ba_pembukaan_lain', $dokumen->ba_pembukaan_lain ?? '') == 1 ? 'selected' : '' }}>Ada</option>
                </select>
            </div>
        </div>

        <div class="mt-3">
            <label>Keterangan</label>
            <textarea name="ba_pembukaan_keterangan" class="form-control" rows="3">{{ old('ba_pembukaan_keterangan', $dokumen->ba_pembukaan_keterangan ?? '') }}</textarea>
        </div>
    </div>
</div>

@include('dokumen_pemilihan.partials.ba_klarifikasi')
