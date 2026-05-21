@extends('master')

@section('konten_halaman')
<style>
    /* Desain dasar bento card premium - Padding diperlebar secara vertikal & horizontal */
    .settings-premium-card { 
        background: #ffffff; 
        border: 1px solid #e3e6f0; 
        border-radius: 12px; 
        padding: 24px 28px; /* Atas-Bawah 24px, Kiri-Kanan 28px agar teks tidak mepet ke border card */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02); 
        transition: all 0.3s ease;
        width: 100%;
    }
    .settings-premium-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(78, 115, 223, 0.06);
        border-color: #4e73df;
    }
    
    .settings-title { 
        font-size: 13px; 
        font-weight: 800; 
        color: #4e73df; 
        margin-bottom: 20px; /* Jarak judul ke konten di bawahnya dibuat ideal */
        display: flex; 
        align-items: center; 
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .settings-desc { 
        font-size: 12.5px; 
        color: #858796; 
        line-height: 1.5; 
        margin-top: 4px; 
        display: block; 
    }

    .setting-item-row { padding-bottom: 16px; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; }
    .setting-item-row:last-child { padding-bottom: 0; margin-bottom: 0; border-bottom: none; }

    /* Box Status server dibuat lebih slim agar seimbang */
    .sync-status-box {
        background-color: #f8fafc;
        border: 1px solid #eaecf4;
        border-radius: 10px;
        padding: 12px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 14px;
        margin-bottom: 16px;
    }
    .sync-label-text { font-size: 13px; font-weight: 700; color: #4e5569; }

    .premium-online-badge {
        font-size: 11px; font-weight: 800; color: #1cc88a; background-color: rgba(28, 200, 138, 0.1);
        border: 1px solid rgba(28, 200, 138, 0.18); padding: 5px 12px; border-radius: 50px; display: inline-flex; align-items: center; gap: 6px;
    }
    .live-dot-pulse { width: 6px; height: 6px; background-color: #1cc88a; border-radius: 50%; display: inline-block; }

    .btn-sync-premium {
        background-color: #4e73df; border: 1px solid #4e73df; color: #ffffff; font-weight: 700; font-size: 13px; letter-spacing: 0.5px;
        padding: 12px 20px; border-radius: 8px; width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;
        box-shadow: 0 4px 12px rgba(78, 115, 223, 0.15); transition: all 0.2s ease; cursor: pointer;
    }
    .btn-sync-premium:hover { background-color: #2e59d9; border-color: #264dc2; }

    .log-item { padding: 12px 16px; border-radius: 8px; background: #f8fafc; border: 1px solid #e3e6f0; margin-bottom: 12px; }
    .log-item:last-child { margin-bottom: 0; }
    .log-text-detail { font-size: 12px; color: #64748b; line-height: 1.4; display: block; margin-top: 4px; }
</style>

<div class="container-fluid p-0">
    
    <div class="settings-premium-card mb-4">
        <h3 class="settings-title"><i class="fa-solid fa-bell text-primary"></i> Notification Engine</h3>
        
        <div class="setting-item-row">
            <div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input" type="checkbox" id="switchDeadline" checked style="cursor: pointer; width: 2.4em; height: 1.2em;">
                <label class="form-check-label text-dark fw-bold small ms-2" for="switchDeadline" style="cursor: pointer; font-size: 13.5px;">Pengingat Batas Waktu</label>
            </div>
            <span class="settings-desc ms-4 ps-2">Kirim alert push otomatis ke dashboard saat deadline modul praktik tersisa &lt; 2 Hari.</span>
        </div>
        
        <div class="setting-item-row">
            <div class="form-check form-switch d-flex align-items-center">
                <input class="form-check-input" type="checkbox" id="switchAlpha" style="cursor: pointer; width: 2.4em; height: 1.2em;">
                <label class="form-check-label text-dark fw-bold small ms-2" for="switchAlpha" style="cursor: pointer; font-size: 13.5px;">Warning Alpha Tracker</label>
            </div>
            <span class="settings-desc ms-4 ps-2">Notifikasi instan jika akumulasi jam deviasi bengkel mendekati batas kritis SP1.</span>
        </div>
    </div>

    <div class="settings-premium-card mb-4">
        <h3 class="settings-title"><i class="fa-solid fa-database text-success"></i> Core Data Sync</h3>
        <p class="text-secondary small m-0" style="line-height: 1.6; font-size: 13px;">Portal SIAKAD terintegrasi secara aman dengan enkripsi internal kampus untuk melakukan kalkulasi jam aktual mahasiswa secara berkala.</p>
        
        <div class="sync-status-box">
            <span class="sync-label-text">SIAKAD Database Status</span>
            <span class="premium-online-badge">
                <span class="live-dot-pulse"></span> Sync Active
            </span>
        </div>
        
        <button class="btn-sync-premium" onclick="this.innerHTML='<i class=\'fa-solid fa-spinner fa-spin\'></i> Synchronizing...'; setTimeout(()=>{this.innerHTML='<i class=\'fa-solid fa-rotate\'></i> Paksa Sinkronisasi Ulang'; alert('Data SIAKAD Bastian Beatricio berhasil diperbarui!');}, 1500);">
            <i class="fa-solid fa-rotate"></i> Paksa Sinkronisasi Ulang
        </button>
    </div>

    <div class="settings-premium-card">
        <h3 class="settings-title"><i class="fa-solid fa-shield-halved text-warning"></i> Security & Logs</h3>
        <p class="text-muted small mb-3" style="font-size: 12.5px;">Aktivitas autentikasi pengerjaan Driving Safety Compliance AI.</p>
        
        <div class="log-item">
            <div class="d-flex justify-content-between font-monospace mb-1 fw-bold text-dark" style="font-size: 12px;">
                <span class="text-success"><i class="fa-solid fa-cloud-arrow-down me-1"></i> Sync Success</span>
                <span class="text-muted">10:14</span>
            </div>
            <span class="log-text-detail">Data jam aktual +4 jam lembur pengerjaan fisik modul sukses ditarik dari basis data pusat.</span>
        </div>

        <div class="log-item">
            <div class="d-flex justify-content-between font-monospace mb-1 fw-bold text-dark" style="font-size: 12px;">
                <span><i class="fa-solid fa-key me-1"></i> Auth Handshake</span>
                <span class="text-muted">08:52</span>
            </div>
            <span class="log-text-detail">Terminal Node #04 Bastian Beatricio sukses terverifikasi oleh enkripsi sistem.</span>
        </div>
        
        <div class="log-item">
            <div class="d-flex justify-content-between font-monospace mb-1 fw-bold text-dark" style="font-size: 12px;">
                <span><i class="fa-solid fa-microchip me-1"></i> Core Loaded</span>
                <span class="text-muted">06:00</span>
            </div>
            <span class="log-text-detail">SIAKAD Engine v2.4 berhasil menginisiasi seluruh modul navigasi.</span>
        </div>
    </div>

</div>
@endsection