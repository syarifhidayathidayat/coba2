@extends('layouts.app')
@section('title', 'Edit Surat Pesanan')
@php
    // These role checks are kept from the original file for consistency.
    $user = auth()->user();
    $isRole52 = $user->hasRole('Pejabat-Pengadaan52');
    $isRole53 = $user->hasRole('Pejabat-Pengadaan53');
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Surat Pesanan</h5>
                        <a href="{{ route('sp.index') }}" class="btn btn-secondary btn-sm">
                            < Kembali</a>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            {{-- Form action points to the update route and method is set to PUT --}}
                            <form action="{{ route('sp.update', $sp->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-3 form-group">
                                        <label>Nomor Surat Pesanan</label>
                                        {{-- The 'value' attribute is pre-filled with existing data --}}
                                        <input type="text" name="nomor_sp" class="form-control"
                                            value="{{ old('nomor_sp', $sp->nomor_sp) }}" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Penyedia</label>
                                        <select name="penyedia_id" class="form-control select2" required>
                                            <option value="">-- Pilih Penyedia --</option>
                                            @foreach ($penyedias as $p)
                                                {{-- The 'selected' attribute is added if the provider matches the saved data --}}
                                                <option value="{{ $p->id }}"
                                                    {{ old('penyedia_id', $sp->penyedia_id) == $p->id ? 'selected' : '' }}>
                                                    {{ $p->nama_penyedia }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Logic for user roles remains the same --}}
                                    @if (auth()->user()->hasRole('admin'))
                                        <div class="col-md-3 form-group">
                                            <label for="jenis_akun">Jenis Akun</label>
                                            <select name="jenis_akun" id="jenis_akun"
                                                class="form-control @error('jenis_akun') is-invalid @enderror" required>
                                                <option value="">-- Pilih Jenis Akun --</option>
                                                {{-- 'selected' attribute added based on saved data --}}
                                                <option value="52"
                                                    {{ old('jenis_akun', $sp->jenis_akun) == '52' ? 'selected' : '' }}>52 |
                                                    Belanja Barang</option>
                                                <option value="53"
                                                    {{ old('jenis_akun', $sp->jenis_akun) == '53' ? 'selected' : '' }}>53 |
                                                    Belanja Modal</option>
                                            </select>
                                            @error('jenis_akun')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @elseif($isRole52 || $isRole53)
                                        <input type="hidden" name="jenis_akun" id="jenis_akun_hidden"
                                            value="{{ old('jenis_akun', $sp->jenis_akun) }}">
                                    @endif
                                    <div class="col-md-3 form-group">
                                        <label>Nama Paket</label>
                                        <select name="nama_paket" id="nama_paket" class="form-control" required>
                                            <option value="">-- Pilih Paket Pekerjaan --</option>
                                            @foreach ($paketPekerjaan as $paket)
                                                {{-- 'selected' attribute added for the matching package name --}}
                                                <option value="{{ $paket->nama_paket }}" data-max="{{ $paket->max }}"
                                                    data-pagu="{{ $paket->pagu }}"
                                                    data-jenis_akun="{{ $paket->jenis_akun }}"
                                                    {{ old('nama_paket', $sp->nama_paket) == $paket->nama_paket ? 'selected' : '' }}>
                                                    {{ $paket->nama_paket }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 form-group">
                                        <label>Tanggal SP</label>
                                        <input type="date" name="tanggal" class="form-control"
                                            value="{{ old('tanggal', $sp->tanggal) }}" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Mulai Pekerjaan</label>
                                        <input type="date" name="mulai_pekerjaan" id="mulai" class="form-control"
                                            value="{{ old('mulai_pekerjaan', $sp->mulai_pekerjaan) }}" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Masa (hari)</label>
                                        <input type="number" name="masa" id="masa" class="form-control"
                                            value="{{ old('masa', $sp->masa) }}" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Akhir Pekerjaan</label>
                                        <input type="text" id="akhir" class="form-control text-muted bg-light"
                                            readonly>
                                        <input type="hidden" name="akhir_pekerjaan" id="akhir_pekerjaan_hidden"
                                            value="{{ old('akhir_pekerjaan', $sp->akhir_pekerjaan) }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 form-group">
                                        <label>Total Pagu</label>
                                        <input type="number" name="total_pagu" id="total_pagu"
                                            class="form-control text-muted bg-light"
                                            value="{{ old('total_pagu', $sp->total_pagu) }}" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Metode</label>
                                        <select name="metode" class="form-control" required>
                                            <option value="">-- Pilih Metode --</option>
                                            @foreach ($metodes as $metode)
                                                <option value="{{ $metode }}"
                                                    {{ old('metode', $sp->metode) == $metode ? 'selected' : '' }}>
                                                    {{ $metode }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="dokumen-pemilihan-field" class="col-md-6 form-group" style="display: none;">
                                        <label>Dokumen Pemilihan</label>
                                        <select name="dokumen_pemilihan_id" class="form-control">
                                            <option value="">-- Pilih Dokumen --</option>
                                            @foreach ($dokumenPemilihan as $dok)
                                                <option value="{{ $dok->id }}"
                                                    {{ old('dokumen_pemilihan_id', $sp->dokumen_pemilihan_id) == $dok->id ? 'selected' : '' }}>
                                                    {{ $dok->undangan_nomor }} – {{ $dok->uraian_paket }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 form-group">
                                        <label>Akun</label>
                                        <input type="text" name="akun" id="akun"
                                            class="form-control text-muted bg-light" value="{{ old('akun', $sp->akun) }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
            namaPaketSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                akunInput.value = selected.getAttribute('data-max') || '';
                totalPaguInput.value = selected.getAttribute('data-pagu') || '';
                const jenis = selected.getAttribute('data-jenis_akun') || '';
                if (jenisAkunInput) jenisAkunInput.value = jenis;
                if (jenisAkunHidden) jenisAkunHidden.value = jenis;
            });
            // --- Adjustments for Edit View ---
            // 1. Trigger change on 'nama_paket' to populate related fields on page load.
            if (namaPaketSelect.value) {
                namaPaketSelect.dispatchEvent(new Event('change'));
            }
            // 2. Initial calculation of the end date when the page loads.
            hitungTanggalAkhir();
            // 3. Initial check for the procurement method to show/hide the document field.
            toggleDokumenField();
        });
    </script>
@endpush
