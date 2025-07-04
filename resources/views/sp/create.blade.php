@extends('layouts.app')
@section('title', 'Tambah Surat Pesanan')
@section('content')
    @php
        $user = auth()->user();
        $isRole52 = $user->hasRole('Pejabat-Pengadaan52');
        $isRole53 = $user->hasRole('Pejabat-Pengadaan53');
    @endphp
    <div class="container-fluid">
        <div class="mb-4">
            <h1 class="h3 text-gray-800">{{ $pageTitle ?? 'Buat Surat Pesanan' }}</h1>
            <x-breadcrumb :items="[
                ['label' => 'Dashboard', 'url' => route('dashboard')],
                ['label' => 'Surat Pesanan', 'url' => route('sp.index')],
                ['label' => 'Tambah SP'],
            ]" />
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('sp.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-3 form-group">
                            <label>Nomor Surat Pesanan</label>
                            <input type="text" name="nomor_sp" class="form-control" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Penyedia</label>
                            <select name="penyedia_id" class="form-control select2" required>
                                <option value="">-- Pilih Penyedia --</option>
                                @foreach ($penyedias as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_penyedia }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (auth()->user()->hasRole('admin'))
                            <div class="col-md-3 form-group">
                                <label for="jenis_akun">Jenis Akun</label>
                                <select name="jenis_akun" id="jenis_akun"
                                    class="form-control @error('jenis_akun') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Akun --</option>
                                    <option value="52">52 | Belanja Barang</option>
                                    <option value="53">53 | Belanja Modal</option>
                                </select>
                                @error('jenis_akun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @elseif($isRole52 || $isRole53)
                            <input type="hidden" name="jenis_akun" id="jenis_akun_hidden"
                                value="{{ $isRole52 ? '52' : '53' }}">
                        @endif
                        <div class="col-md-3 form-group">
                            <label>Nama Paket</label>
                            <select name="nama_paket" id="nama_paket" class="form-control" required>
                                <option value="">-- Pilih Paket Pekerjaan --</option>
                                @foreach ($paketPekerjaan as $paket)
                                    <option value="{{ $paket->nama_paket }}" data-max="{{ $paket->max }}"
                                        data-pagu="{{ $paket->pagu }}" data-jenis_akun="{{ $paket->jenis_akun }}">
                                        {{ $paket->nama_paket }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 form-group">
                            <label>Tanggal SP</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Mulai Pekerjaan</label>
                            <input type="date" name="mulai_pekerjaan" id="mulai" class="form-control"
                                value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Masa (hari)</label>
                            <input type="number" name="masa" id="masa" class="form-control" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Akhir Pekerjaan</label>
                            <input type="text" id="akhir" class="form-control text-muted bg-light" readonly>
                            <input type="hidden" name="akhir_pekerjaan" id="akhir_pekerjaan_hidden">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 form-group">
                            <label>Total Pagu</label>
                            <input type="number" name="total_pagu" id="total_pagu" class="form-control text-muted bg-light"
                                readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Metode</label>
                            <select name="metode" class="form-control" required>
                                <option value="">-- Pilih Metode --</option>
                                @foreach ($metodes as $metode)
                                    <option value="{{ $metode }}" {{ $metode == 'E-Purchasing' ? 'selected' : '' }}>
                                        {{ $metode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="dokumen-pemilihan-field" class="col-md-4 form-group" style="display: none;">
                            <label>Dokumen Pemilihan</label>
                            <select name="dokumen_pemilihan_id" class="form-control">
                                <option value="">-- Pilih Dokumen --</option>
                                @foreach ($dokumenPemilihan as $dok)
                                    <option value="{{ $dok->id }}">{{ $dok->undangan_nomor }} –
                                        {{ $dok->uraian_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 form-group">
                            <label>Akun</label>
                            <input type="text" name="akun" id="akun" class="form-control text-muted bg-light"
                                readonly>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mulaiInput = document.getElementById('mulai');
            const masaInput = document.getElementById('masa');
            const akhirInput = document.getElementById('akhir');
            const akhirHidden = document.getElementById('akhir_pekerjaan_hidden');
            const submitBtn = document.querySelector('button[type="submit"]');
            const namaPaketSelect = document.getElementById('nama_paket');
            const akunInput = document.getElementById('akun');
            const totalPaguInput = document.getElementById('total_pagu');
            const jenisAkunInput = document.getElementById('jenis_akun');
            const jenisAkunHidden = document.getElementById('jenis_akun_hidden');
            const metodeSelect = document.querySelector('select[name="metode"]');
            const dokumenField = document.getElementById('dokumen-pemilihan-field');

            function hitungTanggalAkhir() {
                const mulai = new Date(mulaiInput.value);
                const masa = parseInt(masaInput.value);
                if (!isNaN(mulai.getTime()) && !isNaN(masa)) {
                    const akhir = new Date(mulai);
                    akhir.setDate(akhir.getDate() + masa - 1);
                    const yyyy = akhir.getFullYear();
                    const mm = String(akhir.getMonth() + 1).padStart(2, '0');
                    const dd = String(akhir.getDate()).padStart(2, '0');
                    const formatted = `${yyyy}-${mm}-${dd}`;
                    if (akhir.getDay() === 0 || akhir.getDay() === 6) {
                        akhirInput.value = '';
                        akhirHidden.value = '';
                        alert('Tanggal akhir jatuh pada hari Sabtu/Minggu. Silakan ubah masa pekerjaan.');
                        if (submitBtn) submitBtn.disabled = true;
                    } else {
                        akhirInput.value = formatted;
                        akhirHidden.value = formatted;
                        if (submitBtn) submitBtn.disabled = false;
                    }
                }
            }

            function toggleDokumenField() {
                dokumenField.style.display = metodeSelect.value === 'Pengadaan Langsung' ? 'block' : 'none';
            }
            mulaiInput.addEventListener('change', hitungTanggalAkhir);
            masaInput.addEventListener('input', hitungTanggalAkhir);
            metodeSelect.addEventListener('change', toggleDokumenField);
            toggleDokumenField();
            namaPaketSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                akunInput.value = selected.getAttribute('data-max') || '';
                totalPaguInput.value = selected.getAttribute('data-pagu') || '';
                const jenis = selected.getAttribute('data-jenis_akun') || '';
                if (jenisAkunInput) jenisAkunInput.value = jenis;
                if (jenisAkunHidden) jenisAkunHidden.value = jenis;
            });
        });
    </script>
@endpush
