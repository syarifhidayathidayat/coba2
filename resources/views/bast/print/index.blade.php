                    <div class="info-item">
                        <div class="info-label">Nomor BAPEM</div>
                        <div class="info-value">: {{ $bast->nomor_bapem }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Nomor Kwitansi</div>
                        <div class="info-value">: {{ $bast->no_kwitansi }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal BAST</div>
                        <div class="info-value">: {{ $bast->tanggal_bast->format('d-m-Y') }}</div>
                    </div> 