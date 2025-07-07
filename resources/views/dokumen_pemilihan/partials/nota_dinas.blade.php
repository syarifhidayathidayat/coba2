<div class="card mb-4">
    <div class="card-header">
        <h5 class="text-primary">Nota Dinas</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label>No. Nota Dinas</label>
                    <input type="text" name="nota_dinas_nomor"
                        value="{{ old('nota_dinas_nomor', $dokumen->nota_dinas_nomor ?? 'ULP/Pejabat Pengadaan/xxxxx/2025') }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Tanggal Nota Dinas</label>
                    <input type="date" name="nota_dinas_tanggal"
                        value="{{ old('nota_dinas_tanggal', $dokumen->nota_dinas_tanggal ?? '') }}"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('ba_hasil_tanggal');
            const hariInput = document.getElementById('ba_hasil_hari');

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
