@extends('layouts.admin')

@section('title', 'Buat BAST untuk SP')
@section('content')
<div class="container-fluid">
    <h4>Buat BAST untuk SP: {{ $sp->nomor_sp }}</h4>

    <form action="{{ route('bast.store', ['sp_id' => $sp->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="sp_id" value="{{ $sp->id }}">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor BAST</label>
                            <input type="text" name="nomor_bast" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor BAP</label>
                            <input type="text" name="nomor_bap" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomor_bapem">Nomor BAPEM</label>
                            <input type="text" name="nomor_bapem" id="nomor_bapem" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kwitansi">Nomor Kwitansi</label>
                            <input type="text" name="no_kwitansi" id="no_kwitansi" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="draft">Draft</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal BAST</label>
                            <input type="date" name="tanggal_bast" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Detail Barang</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Qty Kontrak</th>
                            <th>Jumlah Serah Terima</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sp->barangs as $barang)
                        <tr>
                            <td>
                                {{ $barang->nama_barang }}
                                <input type="hidden" name="barang_id[]" value="{{ $barang->id }}">
                            </td>
                            <td>{{ $barang->qty }}</td>
                            <td>
                                <input type="number" name="jumlah_serah_terima[]" class="form-control" 
                                    min="1" max="{{ $barang->qty }}" required>
                            </td>
                            <td>
                                <select name="kondisi[]" class="form-control" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                    <option value="Rusak Berat">Rusak Berat</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="keterangan_barang[]" class="form-control">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan BAST</button>
            <a href="{{ route('sp.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection 