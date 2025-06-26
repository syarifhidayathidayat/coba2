<div class="card mb-4">
    <div class="card-header">Nota Dinas</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>No. Nota Dinas</label>
                <input type="text" name="nota_dinas_nomor" value="{{ old('nota_dinas_nomor', $dokumen->nota_dinas_nomor ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Tanggal Nota Dinas</label>
                <input type="date" name="nota_dinas_tanggal" value="{{ old('nota_dinas_tanggal', $dokumen->nota_dinas_tanggal ?? '') }}" class="form-control">
            </div>
        </div>
    </div>
</div>