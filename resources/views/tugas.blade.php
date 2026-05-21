@extends('master')

@section('konten_halaman')
<style>
    .task-container-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; }
    .task-card { background: #ffffff; border: 1px solid #e3e6f0; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.02); margin-bottom: 24px; }
    .task-card:last-child { margin-bottom: 0; }
    .task-card-header { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center; }
    .task-title { font-size: 18px; font-weight: 700; color: #5a5c69; margin-bottom: 8px; }
    .task-meta { font-size: 13px; color: #858796; display: flex; gap: 16px; margin-bottom: 16px; }
    .progress-track { height: 10px; background-color: #eaecf4; border-radius: 99px; overflow: hidden; }
    .progress-bar-fill { height: 100%; border-radius: 99px; }
    .status-badge { font-size: 10px; font-weight: 800; padding: 4px 8px; border-radius: 4px; text-transform: uppercase; }
</style>

<div class="task-container-grid">
    <div>
        <div class="task-card" style="border-left: 4px solid #4e73df;">
            <div class="task-card-header text-primary">
                <span>Kategori: Praktik Bengkel Utama</span>
                <span class="status-badge bg-primary bg-opacity-10 text-primary">In Progress</span>
            </div>
            <h3 class="task-title">Pemesinan Kompleks: Bubut Blok Hidrolik</h3>
            <div class="task-meta">
                <span><i class="fa-solid fa-code-branch me-1"></i> Modul 6</span>
                <span><i class="fa-solid fa-calendar me-1"></i> Deadline: Sisa 2 Hari</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1 font-monospace small fw-bold">
                <span class="text-muted">Progres Pengerjaan Fisik</span>
                <span class="text-primary">75%</span>
            </div>
            <div class="progress-track">
                <div class="progress-bar-fill bg-primary" style="width: 75%;"></div>
            </div>
        </div>

        <div class="task-card" style="border-left: 4px solid #1cc88a;">
            <div class="task-card-header text-success">
                <span>Kategori: Teori Kompetensi</span>
                <span class="status-badge bg-success bg-opacity-10 text-success">Verified</span>
            </div>
            <h3 class="task-title">Slicing UI Framework Dashboard Admin</h3>
            <div class="task-meta">
                <span><i class="fa-solid fa-code me-1"></i> Modul 4</span>
                <span><i class="fa-solid fa-calendar me-1"></i> Selesai: Kemarin</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1 font-monospace small fw-bold">
                <span class="text-muted">Validasi Instruktur</span>
                <span class="text-success">100%</span>
            </div>
            <div class="progress-track">
                <div class="progress-bar-fill bg-success" style="width: 100%;"></div>
            </div>
        </div>
    </div>

    <div>
        <div class="task-card">
            <h4 class="text-secondary fw-bold mb-3" style="font-size: 14px;">Summary Tracker</h4>
            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <span class="text-muted small fw-bold">Total Modul Semester Ini</span>
                <span class="badge bg-secondary font-monospace">8 Modul</span>
            </div>
            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                <span class="text-muted small fw-bold">Modul Selesai</span>
                <span class="badge bg-success font-monospace">5 Verified</span>
            </div>
            <div class="d-flex justify-content-between align-items-center py-2">
                <span class="text-muted small fw-bold">Modul Berjalan</span>
                <span class="badge bg-warning text-dark font-monospace">3 Critical</span>
            </div>
        </div>
    </div>
</div>
@endsection