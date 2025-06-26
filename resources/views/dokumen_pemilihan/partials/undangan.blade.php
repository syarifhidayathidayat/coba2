<div class="card mb-4">
    <div class="card-header">Undangan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label>No. Undangan</label>
                <input type="text" name="undangan_nomor" value="{{ old('undangan_nomor', $dokumen->undangan_nomor ?? '') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Tanggal Undangan</label>
                <input type="date" name="undangan_tanggal" value="{{ old('undangan_tanggal', $dokumen->undangan_tanggal ?? '') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label>HPS</label>
                <input type="number" step="0.01" name="hps" value="{{ old('hps', $dokumen->hps ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Pemasukan Dokumen (Tanggal Mulai)</label>
                <input type="date" name="undangan_pemasukan_tgl_mulai" value="{{ old('undangan_pemasukan_tgl_mulai', $dokumen->undangan_pemasukan_tgl_mulai ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Sampai Tanggal</label>
                <input type="date" name="undangan_pemasukan_tgl_selesai" value="{{ old('undangan_pemasukan_tgl_selesai', $dokumen->undangan_pemasukan_tgl_selesai ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <label>Waktu Pemasukan</label>
            <input type="time" name="undangan_pemasukan_jam" value="{{ old('undangan_pemasukan_jam', $dokumen->undangan_pemasukan_jam ?? '') }}" class="form-control">
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Evaluasi dan Negosiasi (Tanggal Mulai)</label>
                <input type="date" name="undangan_evaluasi_tgl_mulai" value="{{ old('undangan_evaluasi_tgl_mulai', $dokumen->undangan_evaluasi_tgl_mulai ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Sampai Tanggal</label>
                <input type="date" name="undangan_evaluasi_tgl_selesai" value="{{ old('undangan_evaluasi_tgl_selesai', $dokumen->undangan_evaluasi_tgl_selesai ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <label>Waktu Evaluasi</label>
            <input type="time" name="undangan_evaluasi_jam" value="{{ old('undangan_evaluasi_jam', $dokumen->undangan_evaluasi_jam ?? '') }}" class="form-control">
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Hari Penandatanganan SPK</label>
                <input type="text" name="undangan_spk_hari" value="{{ old('undangan_spk_hari', $dokumen->undangan_spk_hari ?? '') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Tanggal SPK</label>
                <input type="date" name="undangan_spk_tanggal" value="{{ old('undangan_spk_tanggal', $dokumen->undangan_spk_tanggal ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <label>Uraian Singkat Paket Pengadaan</label>
            <textarea name="uraian_paket" class="form-control" rows="3">{{ old('uraian_paket', $dokumen->uraian_paket ?? '') }}</textarea>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>No Surat Izin Usaha</label>
                <input type="text" name="no_surat_izin_usaha" value="{{ old('no_surat_izin_usaha', $dokumen->no_surat_izin_usaha ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Masa Berlaku Surat Penawaran</label>
                <input type="text" name="masa_berlaku_penawaran" value="{{ old('masa_berlaku_penawaran', $dokumen->masa_berlaku_penawaran ?? '') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Bidang Usaha</label>
                <input type="text" name="bidang_usaha" value="{{ old('bidang_usaha', $dokumen->bidang_usaha ?? '') }}" class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <label>Jangka Waktu Penyerahan Barang</label>
            <input type="text" name="jangka_waktu_penyerahan" value="{{ old('jangka_waktu_penyerahan', $dokumen->jangka_waktu_penyerahan ?? '') }}" class="form-control">
        </div>
    </div>
</div>

@include('dokumen_pemilihan.partials.ba_pembukaan')