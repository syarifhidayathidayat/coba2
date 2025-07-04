@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Surat Pesanan</h3>
    <form action="{{ route('sp.update', $sp->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-3">
                <label>Nomor Surat Pesanan</label>
                <input type="text" name="nomor_sp" class="form-control" value="{{ $sp->nomor_sp }}" required>
            </div>
            <div class="col-md-3">
                <label>Penyedia</label>
                <select name="penyedia_id" class="form-control select2" required>
                    <option value="">-- Pilih Penyedia --</option>
                    @foreach ($penyedias as $p)
                        <option value="{{ $p->id }}" {{ $sp->penyedia_id == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_penyedia }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label>Jenis Akun</label>
                <input type="text" class="form-control" value="{{ $sp->jenis_akun }}" readonly>
                <input type="hidden" name="jenis_akun" id="jenis_akun_hidden" value="{{ $sp->jenis_akun }}">
            </div>
            <div class="col-md-3">
                <label>Nama Paket</label>
                <select name="nama_paket" id="nama_paket" class="form-control" required>
                    <option value="">-- Pilih Paket Pekerjaan --</option>
                    @foreach ($paketPekerjaan as $paket)
                        <option value="{{ $paket->nama_paket }}"
                            data-max="{{ $paket->max }}"
                            data-pagu="{{ $paket->pagu }}"
                            data-jenis_akun="{{ $paket->jenis_akun }}"
                            {{ $sp->nama_paket == $paket->nama_paket ? 'selected' : '' }}>
                            {{ $paket->nama_paket }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <label>Tanggal SP</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $sp->tanggal }}" required>
            </div>
            <div class="col-md-3">
                <label>Mulai Pekerjaan</label>
                <input type="date" name="mulai_pekerjaan" id="mulai" class="form-control"
                    value="{{ $sp->mulai_pekerjaan }}" required>
            </div>
            <div class="col-md-3">
                <label>Masa (hari)</label>
                <input type="number" name="masa" id="masa" class="form-control" value="{{ $sp->masa }}" required>
            </div>
            <div class="col-md-3">
                <label>Akhir Pekerjaan</label>
                <input type="text" id="akhir" class="form-control" value="{{ $sp->akhir_pekerjaan }}" readonly>
                <input type="hidden" name="akhir_pekerjaan" id="akhir_pekerjaan_hidden" value="{{ $sp->akhir_pekerjaan }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Total Pagu</label>
                <input type="number" name="total_pagu" id="total_pagu" class="form-control" value="{{ $sp->total_pagu }}" required readonly>
            </div>
            <div class="col-md-4">
                <label>Metode</label>
                <select name="metode" class="form-control" required>
                    <option value="">-- Pilih Metode --</option>
                    @foreach ($metodes as $metode)
                        <option value="{{ $metode }}" {{ $sp->metode == $metode ? 'selected' : '' }}>
                            {{ $metode }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Akun</label>
                <input type="text" name="akun" id="akun" class="form-control" value="{{ $sp->akun }}" required>
            </div>
        </div>

        <div class="mt-4">
            @php
                $kembaliRoute = $sp->jenis_akun == '53' ? route('sp.index.53') : route('sp.index.52');
            @endphp
            <button type="submit" class="btn btn-primary">Update SP</button>
            <a href="{{ $kembaliRoute }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        function hitungTanggalAkhir() {
            let mulai = $('#mulai').val();
            let masa = parseInt($('#masa').val());
            if (mulai && masa) {
                let akhir = new Date(mulai);
                akhir.setDate(akhir.getDate() + masa - 1);
                let formatted = akhir.toISOString().split('T')[0];
                $('#akhir').val(formatted);
                $('#akhir_pekerjaan_hidden').val(formatted);
            }
        }

        $('#masa, #mulai').on('change', hitungTanggalAkhir);

        $('#nama_paket').on('change', function () {
            let selected = $(this).find('option:selected');
            $('#total_pagu').val(selected.data('pagu') || '');
            $('#akun').val(selected.data('max') || '');

            // Set juga jenis_akun dari paket
            const jenis = selected.data('jenis_akun') || '';
            $('#jenis_akun_hidden').val(jenis);
        });

        // Jalankan saat load pertama kali
        $('#nama_paket').trigger('change');
        hitungTanggalAkhir();
    });
</script>
@endpush
