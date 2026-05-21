@extends('master')

@section('konten_halaman')
<style>
    .bento-wrapper { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 24px; }
    .premium-box {
        background: #ffffff; border: 1px solid #e3e6f0; border-radius: 20px; padding: 24px;
        display: flex; flex-direction: column; justify-content: space-between; min-width: 0; position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }
    .premium-box:hover { transform: translateY(-4px); box-shadow: 0 12px 24px -8px rgba(37, 99, 235, 0.1); border-color: #4e73df; }
    .span-2 { grid-column: span 2; }
    .box-title { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.2px; color: #475569; display: flex; align-items: center; gap: 8px; margin-bottom: 16px; }
    .huge-number { font-size: 2.8rem; font-weight: 800; letter-spacing: -1.5px; line-height: 1; margin: 6px 0; color: #0f172a; }
    .desc-text { font-size: 13px; color: #475569; line-height: 1.5; margin: 0; } 
    .text-important { font-size: 14px; font-weight: 700; color: #0f172a; }

    .action-label-title { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.2px; color: #64748b; margin-bottom: 12px; display: block; }
    .scroll-action-hub { display: flex; gap: 12px; overflow-x: auto; padding-bottom: 12px; scrollbar-width: none; }
    .action-pill {
        flex: 0 0 auto; display: flex; align-items: center; gap: 8px; padding: 10px 18px;
        background: #ffffff; border: 1px solid #e3e6f0; border-radius: 99px;
        text-decoration: none; color: #1e293b; font-size: 13px; font-weight: 700; transition: all 0.2s;
    }
    .action-pill:hover { background: #4e73df; color: #ffffff !important; border-color: #4e73df; }

    .chart-container-donut { position: relative; width: 100%; height: 110px; margin: 10px auto; }
    .donut-legend-table { margin-top: 16px; background: #f8fafc; border-radius: 12px; padding: 12px 14px; border: 1px solid #e3e6f0; }
    .legend-row { display: flex; justify-content: space-between; align-items: center; font-size: 12.5px; font-weight: 600; }
    .legend-left { display: flex; align-items: center; color: #475569; }
    .dot-indicator { font-size: 7px; margin-right: 8px; display: inline-flex; align-items: center; justify-content: center; line-height: 1; }

    .timeline-container { position: relative; padding-left: 20px; margin-top: 8px; }
    .timeline-container::before { content: ''; position: absolute; left: 5px; top: 8px; bottom: 8px; width: 2px; background: #e2e8f0; }
    .timeline-item { position: relative; padding-bottom: 20px; }
    .timeline-item:last-child { padding-bottom: 0; }
    .timeline-badge { position: absolute; left: -20px; top: 4px; width: 12px; height: 12px; border-radius: 50%; background: #ffffff; border: 3px solid #2563eb; z-index: 2; }
    .timeline-item.success .timeline-badge { border-color: #10b981; }
    .timeline-item.primary .timeline-badge { border-color: #2563eb; }
    .timeline-card { background: #f8fafc; border: 1px solid #e3e6f0; border-radius: 12px; padding: 12px 16px; margin-left: 8px; }

    .micro-pill { display: inline-flex; align-items: center; padding: 2px 6px; border-radius: 4px; font-size: 10px; font-weight: 800; text-transform: uppercase; }
    .task-card-row { background: #f8fafc; border: 1px solid #e3e6f0; border-radius: 14px; padding: 12px 14px; display: flex; flex-direction: column; gap: 4px; margin-bottom: 10px; }
    .bulletin-mask { height: 115px; overflow: hidden; position: relative; margin-top: 8px; }
    .bulletin-slide { display: flex; flex-direction: column; gap: 8px; position: absolute; width: 100%; animation: scrollMarquee 12s linear infinite; }
    @keyframes scrollMarquee { 0% { top: 0; } 100% { top: -140px; } }
    .news-item-card { background: #f8fafc; border: 1px solid #e3e6f0; border-radius: 12px; padding: 10px 12px; }
</style>

<div class="mb-4">
    <span class="action-label-title"><i class="fa-solid fa-square-sliders text-primary me-1"></i> Swipable Quick Action Hub</span>
    <div class="scroll-action-hub">
        <a href="#" class="action-pill shadow-sm"><i class="fa-solid fa-circle-plus text-success"></i> Klaim Jam Lembur</a>
        <a href="#" class="action-pill shadow-sm"><i class="fa-solid fa-file-arrow-up text-primary"></i> Unggah Logbook</a>
        <a href="#" class="action-pill shadow-sm"><i class="fa-solid fa-calendar-day text-info"></i> Ajukan Dispensasi</a>
        <a href="#" class="action-pill shadow-sm"><i class="fa-solid fa-print text-secondary"></i> Cetak Bebas SP</a>
    </div>
</div>

<div class="bento-wrapper">
    <div class="premium-box" style="background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%); border-left: 4px solid #10b981;">
        <div>
            <span class="box-title" style="color: #15803d;"><i class="fa-solid fa-shield-check"></i> Status Jam Aktual</span>
            <div class="huge-number text-success">+14 <span class="fs-5 fw-bold">Jam</span></div>
        </div>
        <div class="pt-3 border-top border-secondary border-opacity-10">
            <span class="micro-pill bg-success bg-opacity-10 text-success mb-1">Kondisi: Aman</span>
            <p class="desc-text text-muted" style="font-size: 12px;">Kamu memiliki deposit jam lembur aktif bebas sanksi kompensasi bengkel.</p>
        </div>
    </div>

    <div class="premium-box">
        <div>
            <span class="box-title"><i class="fa-solid fa-chart-donut text-primary"></i> Presensi Bengkel</span>
            <div class="chart-container-donut">
                <canvas id="donutChartPresensi"></canvas>
            </div>
        </div>
        <div class="donut-legend-table">
            <div class="legend-row mb-2">
                <div class="legend-left"><i class="fa-solid fa-circle dot-indicator text-primary"></i><span>Rasio Kehadiran</span></div>
                <span class="text-dark fw-bold">94.8%</span>
            </div>
            <div class="legend-row">
                <div class="legend-left"><i class="fa-solid fa-circle dot-indicator text-muted"></i><span>Batas Kelulusan</span></div>
                <span class="text-danger fw-bold" style="font-size: 11px;">Min 90%</span>
            </div>
        </div>
    </div>

    <div class="premium-box" style="background: linear-gradient(135deg, #ffffff 0%, #fff7ed 100%); border-left: 4px solid #f59e0b;">
        <div>
            <span class="box-title" style="color: #c2410c;"><i class="fa-solid fa-triangle-exclamation"></i> Sanksi Alpha Tracker</span>
            <div class="my-2">
                <div class="d-flex justify-content-between font-monospace text-dark mb-1" style="font-size: 11px; font-weight: 700;">
                    <span>Limit SP1 (-16h)</span>
                    <span class="text-success">0h Terpakai</span>
                </div>
                <div style="height: 6px; background-color: #f1f5f9; border-radius: 99px; overflow: hidden;">
                    <div style="height: 100%; width: 0%; background-color: #f97316;"></div>
                </div>
            </div>
        </div>
        <div class="pt-2 border-top border-secondary border-opacity-10">
            <span class="micro-pill bg-warning bg-opacity-10 text-warning mb-1" style="color: #b45309 !important;">Threat Level: Nihil</span>
            <p class="desc-text text-muted" style="font-size: 12px;">Data deviasi presensi 0%, aman dari sanksi skorsing surat peringatan.</p>
        </div>
    </div>

    <div class="premium-box span-2" style="min-height: 290px;">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h6 class="box-title" style="color: #0f172a; margin-bottom: 2px;"><i class="fa-solid fa-chart-line-up text-primary"></i> Weekly Performance Balance</h6>
                <p class="text-muted small m-0" style="font-size: 12px;">Alur riwayat akumulasi naik-turun jam harian mahasiswa.</p>
            </div>
            <span class="badge bg-light text-primary border rounded-pill font-monospace" style="font-size: 10px;">Live Data</span>
        </div>
        <div style="position: relative; width: 100%; height: 180px; margin-top: auto;">
            <canvas id="lineChartHistoriJam"></canvas>
        </div>
    </div>

    <div class="premium-box" style="min-height: 290px;">
        <span class="box-title" style="color: #ef4444; margin-bottom: 12px;"><i class="fa-solid fa-hourglass-clock"></i> Upcoming Deadline</span>
        <div class="d-flex flex-column gap-1 flex-fill justify-content-center">
            <div class="task-card-row">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="micro-pill bg-danger bg-opacity-10 text-danger">Sisa 2 Hari</span>
                    <span class="text-muted font-monospace" style="font-size: 10px; font-weight: 700;">Modul 6</span>
                </div>
                <div class="text-important text-truncate">Bubut Blok Hidrolik</div>
                <span class="text-muted small" style="font-size: 12px;"><i class="fa-solid fa-layer-group me-1"></i> Praktik Bengkel Utama</span>
            </div>
            <div class="task-card-row">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="micro-pill bg-warning bg-opacity-10 text-warning" style="color: #b45309 !important;">Sisa 5 Hari</span>
                    <span class="text-muted font-monospace" style="font-size: 10px; font-weight: 700;">Modul 4</span>
                </div>
                <div class="text-important text-truncate">Slicing UI Framework</div>
                <span class="text-muted small" style="font-size: 12px;"><i class="fa-solid fa-code me-1"></i> Teori Pemrograman Web</span>
            </div>
        </div>
    </div>

    <div class="premium-box" style="min-height: 230px;">
        <div>
            <h6 class="box-title"><i class="fa-solid fa-bullhorn text-primary"></i> Bulletin Board</h6>
            <p class="text-muted small m-0" style="font-size: 11px;">Informasi maklumat penting divisi instruktur.</p>
        </div>
        <div class="bulletin-mask">
            <div class="bulletin-slide">
                <div class="news-item-card">
                    <span class="micro-pill bg-primary bg-opacity-10 text-primary mb-1">Peralatan</span>
                    <div class="fw-bold text-dark" style="font-size: 12px;">Kalibrasi CNC Haas v3</div>
                    <span class="text-muted d-block mt-0.5" style="font-size: 11px;">Kluster C ditutup Jumat untuk perawatan berkala mesin bubut.</span>
                </div>
                <div class="news-item-card">
                    <span class="micro-pill bg-danger bg-opacity-10 text-danger mb-1">Akademik</span>
                    <div class="fw-bold text-dark" style="font-size: 12px;">Kuesioner Evaluasi Dosen</div>
                    <span class="text-muted d-block mt-0.5" style="font-size: 11px;">Wajib disubmit mahasiswa sebelum minggu tenang dimulai.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="premium-box span-2" style="min-height: 230px;">
        <div>
            <h6 class="box-title" style="color: #0f172a; margin-bottom: 4px;"><i class="fa-solid fa-clock-history text-primary"></i> Live Registry Activity Log</h6>
            <p class="text-muted small m-0" style="font-size: 11.5px;">Alur riwayat log data aktivitas sistem akademik terverifikasi.</p>
        </div>
        
        <div class="timeline-container">
            <div class="timeline-item success">
                <div class="timeline-badge"></div>
                <div class="timeline-card">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-dark" style="font-size: 13.5px;">Jam Plus Terinput (+4 Jam)</span>
                        <span class="text-muted font-monospace small" style="font-size: 11px;">Hari Ini, 10:14</span>
                    </div>
                    <p class="desc-text text-muted" style="font-size: 12.5px;">Validasi dispensasi lembur pengerjaan perakitan fisik modul driving safety compliance AI.</p>
                </div>
            </div>
            
            <div class="timeline-item primary">
                <div class="timeline-badge"></div>
                <div class="timeline-card">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-dark" style="font-size: 13.5px;">Modul Validasi Tugas Sukses</span>
                        <span class="text-muted font-monospace small" style="font-size: 11px;">Kemarin, 14:32</span>
                    </div>
                    <p class="desc-text text-muted" style="font-size: 12.5px;">Berkas penyerahan evaluasi pengerjaan komponen presisi blok hidrolik disetujui penuh oleh instruktur utama.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const ctxLine = document.getElementById('lineChartHistoriJam').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['M1', 'M2', 'M3', 'M4', 'M5', 'M6'],
                datasets: [{
                    data: [4, 8, -2, 6, 10, 14],
                    borderColor: '#4e73df',
                    backgroundColor: 'rgba(78, 115, 223, 0.03)',
                    borderWidth: 2.5, tension: 0.3, fill: true,
                    pointBackgroundColor: '#ffffff', pointBorderColor: '#4e73df', pointRadius: 4
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11, weight: '700' }, color: '#64748b' } },
                    y: { grid: { color: '#f1f5f9' }, border: { dash: [4, 4] }, ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#64748b' } }
                }
            }
        });

        const ctxDonut = document.getElementById('donutChartPresensi').getContext('2d');
        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Absen'],
                datasets: [{ data: [94.8, 5.2], backgroundColor: ['#4e73df', '#e2e8f0'], borderWidth: 0 }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, cutout: '75%' }
        });
    });
</script>
@endsection