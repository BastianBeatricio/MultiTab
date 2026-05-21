@extends('master')

@section('konten_halaman')
<style>
    .settings-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; }
    .settings-card { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.02); }
    .settings-title { font-size: 16px; font-weight: 700; color: #4e73df; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
    .form-switch .form-check-input { width: 2.5em; height: 1.25em; cursor: pointer; }
</style>

<div class="settings-grid">
    <div class="settings-card">
        <h3 class="settings-title"><i class="fa-solid fa-bell"></i> Notification Engine</h3>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="switchDeadline" checked>
            <label class="form-check-input-label text-dark fw-bold small d-block" for="switchDeadline">Pengingat Batas Waktu Tugas</label>
            <span class="text-muted small">Kirim alert push otomatis saat deadline modul tersisa < 2 hari.</span>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="switchAlpha">
            <label class="form-check-input-label text-dark fw-bold small d-block" for="switchAlpha">Warning Limit Alpha Tracker</label>
            <span class="text-muted small">Notifikasi instan jika akumulasi jam deviasi mendekati batas SP1.</span>
        </div>
    </div>

    <div class="settings-card">
        <h3 class="settings-title"><i class="fa-solid fa-database"></i> Core Data Sync</h3>
        <p class="text-muted small mb-3">Sistem Matrix terintegrasi otomatis dengan pangkalan data internal kampus.</p>
        <div class="p-3 bg-light rounded border mb-3">
            <div class="d-flex justify-content-between small font-monospace fw-bold">
                <span class="text-secondary">SIAKAD ATMI Sync</span>
                <span class="text-success">Connected</span>
            </div>
        </div>
        <button class="btn btn-outline-primary btn-sm w-100 fw-bold rounded-pill"><i class="fa-solid fa-rotate me-1"></i> Paksa Sinkronisasi Ulang</button>
    </div>
</div>
@endsection