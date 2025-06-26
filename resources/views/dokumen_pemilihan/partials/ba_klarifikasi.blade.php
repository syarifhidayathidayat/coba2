<div class="card mb-4">
    <div class="card-header">Berita Acara Klarifikasi dan Negosiasi</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. BA Klarifikasi</label>
                <input type="text" name="ba_klarifikasi_nomor" value="{{ old('ba_klarifikasi_nomor', $dokumen->ba_klarifikasi_nomor ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Hari</label>
                <input type="text" name="ba_klarifikasi_hari" value="{{ old('ba_klarifikasi_hari', $dokumen->ba_klarifikasi_hari ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal</label>
                <input type="date" name="ba_klarifikasi_tanggal" value="{{ old('ba_klarifikasi_tanggal', $dokumen->ba_klarifikasi_tanggal ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Harga Penawaran</label>
                <input type="number" step="0.01" name="ba_klarifikasi_harga_penawaran" value="{{ old('ba_klarifikasi_harga_penawaran', $dokumen->ba_klarifikasi_harga_penawaran ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Harga Setelah Negosiasi</label>
                <input type="number" step="0.01" name="ba_klarifikasi_harga_negosiasi" value="{{ old('ba_klarifikasi_harga_negosiasi', $dokumen->ba_klarifikasi_harga_negosiasi ?? '') }}" class="form-control">
            </div>
        </div>
    </div>
</div>

@include('dokumen_pemilihan.partials.ba_hasil')
