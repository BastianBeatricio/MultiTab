<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM SIAKAD - Bastian Beatricio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: #f8fafc; 
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
        }

        /* ==========================================================================
           REVISI UTAMA: KALIBRASI PADDING SIDEBAR (MENGHAPUS CELAH KOSONG ATAS)
           ========================================================================== */
        .sidebar-wrapper {
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            padding: 16px 16px 24px 16px; /* Padding atas dikurangi dari 24px menjadi 16px agar logo naik pas */
            z-index: 1000;
        }

        /* Merapatkan logo ke batas atas kontainer */
        .logo-text { 
            font-weight: 800; 
            color: #ffffff; 
            letter-spacing: 1.5px; 
            font-size: 15px; 
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            display: block;
            margin-top: 4px; /* Penyelaras mikro agar posisi logo presisi */
        }

        .sidebar-menu { list-style: none; padding: 0; margin-top: 20px; } /* Jarak menu ke garis pembatas dirapatkan */
        .sidebar-menu .nav-item { margin-bottom: 4px; }
        .sidebar-menu .nav-link {
            display: flex; align-items: center; padding: 12px 16px; color: rgba(255, 255, 255, 0.7);
            text-decoration: none; font-weight: 700; font-size: 13px; border-radius: 8px; transition: all 0.2s;
        }
        .sidebar-menu .nav-link i { font-size: 14px; width: 24px; opacity: 0.8; }
        .sidebar-menu .nav-link:hover { color: #ffffff; background-color: rgba(255, 255, 255, 0.1); }
        .sidebar-menu .nav-link.active { 
            color: #ffffff; 
            background-color: rgba(255, 255, 255, 0.18);
            font-weight: 800;
        }

        /* CONTAINER AREA UTAMA KANAN */
        .main-container-box {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
            width: calc(100% - 240px);
        }

        /* TOPBAR PRESTISIUS */
        .topbar-wrapper {
            background: #ffffff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            box-shadow: 0 4px 24px -8px rgba(0, 0, 0, 0.05);
            margin-bottom: 32px;
            flex-wrap: nowrap;
        }

        .topbar-brand-area { display: flex; flex-direction: column; min-width: 0; }
        .topbar-title { color: #4e73df; font-weight: 800; font-size: 16px; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap; }
        .topbar-subtitle { color: #858796; font-size: 12px; font-weight: 600; margin: 0; margin-top: 2px; white-space: nowrap; }

        .topbar-account-badge {
            display: flex; 
            align-items: center; 
            gap: 12px; 
            border-left: 1px solid #e3e6f0; 
            padding-left: 18px; 
            height: 40px;
            flex-shrink: 0;
        }
        .account-meta-text { text-align: right; }
        .account-user-name { font-size: 13px; font-weight: 700; color: #5a5c69; display: block; white-space: nowrap; }
        .account-user-nim { font-size: 11px; font-weight: 600; color: #b7b9cc; display: block; margin-top: 1px; white-space: nowrap; }

        .avatar-circle-img {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; border: 1px solid #d1d3e2;
        }

        .dashboard-content-area { 
            padding: 0 32px 32px 32px; 
            flex: 1;
        }

        /* CLOCK SIDEBAR BAWAH */
        .sidebar-clock-panel {
            background: rgba(0, 0, 0, 0.15); border: 1px solid rgba(255, 255, 255, 0.08); padding: 12px; border-radius: 10px; text-align: center; margin-bottom: 16px;
        }
        .side-date-txt { display: flex; justify-content: center; align-items: center; gap: 5px; font-size: 10.5px; font-weight: 700; color: rgba(255, 255, 255, 0.6); padding-bottom: 4px; margin-bottom: 6px; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
        .side-time-display { font-family: 'JetBrains Mono', monospace; font-size: 14.5px; font-weight: 800; color: #ffffff; display: flex; align-items: center; justify-content: center; line-height: 1; }
        .blink-colon { animation: pulseBlink 1s infinite; color: #38bdf8; }
        @keyframes pulseBlink { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }
    </style>
</head>
<body>

<div class="sidebar-wrapper">
    <a class="logo-text d-flex align-items-center justify-content-center gap-2" href="#">
        <i class="fa-solid fa-graduation-cap"></i>
        <span>SISTEM SIAKAD</span>
    </a>
    <hr style="opacity: 0.15; color: #fff; margin: 12px 0;">

    <ul class="sidebar-menu">
        <li class="nav-item"><a class="nav-link {{ Request::is('utama') ? 'active' : '' }}" href="{{ url('/utama') }}"><i class="fa-solid fa-tachometer-alt"></i><span>Dashboard Utama</span></a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('tugas') ? 'active' : '' }}" href="{{ url('/tugas') }}"><i class="fa-solid fa-folder"></i><span>Monitoring Tugas</span></a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('pengaturan') ? 'active' : '' }}" href="{{ url('/pengaturan') }}"><i class="fa-solid fa-wrench"></i><span>Control Panel</span></a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}"><i class="fa-solid fa-headset"></i><span>Hub Kontak Pro</span></a></li>
    </ul>
    
    <div class="mt-auto">
        <div class="sidebar-clock-panel">
            <div class="side-date-txt"><span style="color: #38bdf8; text-transform: uppercase;" id="sideDay">--</span> <span style="opacity: 0.4;">•</span> <span id="sideDate">-- --- ----</span></div>
            <div class="side-time-display"><span id="sideHr">00</span><span class="blink-colon">:</span><span id="sideMin">00</span><span class="blink-colon">:</span><span id="sideSec">00</span><span style="font-size: 8px; background: #ffffff; color: #4e73df; padding: 1px 3px; border-radius: 3px; font-weight: 800; margin-left: 4px;" id="sideAmpm">AM</span></div>
        </div>
        <div class="text-center"><span class="fw-bold" style="font-size: 9px; color: rgba(255,255,255,0.5);">ATMI ENGINE v2.4</span></div>
    </div>
</div>

<div class="main-container-box">
    <div class="topbar-wrapper">
        <div class="topbar-brand-area">
            <h1 class="topbar-title">SISTEM SIAKAD MAHASISWA</h1>
            <span class="topbar-subtitle">Politeknik ATMI Surakarta &nbsp;|&nbsp; Portal Academic Utama</span>
        </div>
        <div class="topbar-account-badge">
            <div class="account-meta-text">
                <span class="account-user-name">Bastian Beatricio</span>
                <span class="account-user-nim">NIM: 2026-ATMI-04</span>
            </div>
            <div class="avatar-circle-img">B</div>
        </div>
    </div>
    
    <div class="dashboard-content-area">
        @yield('konten_halaman')
    </div>
</div>

<script>
    function updateSidebarClock() {
        const now = new Date();
        let hours = now.getHours(); const minutes = String(now.getMinutes()).padStart(2, '0'); const seconds = String(now.getSeconds()).padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM'; hours = hours % 12; hours = hours ? hours : 12; const hoursStr = String(hours).padStart(2, '0');
        document.getElementById('sideHr').textContent = hoursStr; document.getElementById('sideMin').textContent = minutes; document.getElementById('sideSec').textContent = seconds; document.getElementById('sideAmpm').textContent = ampm;
        const opsiHari = { weekday: 'long' }; const opsiTanggal = { day: 'numeric', month: 'short', year: 'numeric' };
        document.getElementById('sideDay').textContent = now.toLocaleDateString('id-ID', opsiHari); document.getElementById('sideDate').textContent = now.toLocaleDateString('id-ID', opsiTanggal);
    }
    setInterval(updateSidebarClock, 1000); window.addEventListener('DOMContentLoaded', updateSidebarClock);
</script>
</body>
</html>AWWWW