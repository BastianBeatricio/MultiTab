<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Core - Bastian Beatricio</title>
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

        /* SIDEBAR PANEL KIRI (SB ADMIN BLUE STYLE) */
        .sidebar-wrapper {
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
            padding: 24px 16px;
            z-index: 1000;
        }

        .logo-text { 
            font-weight: 800; 
            color: #ffffff; 
            letter-spacing: 1px; 
            font-size: 14px; 
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            display: block;
        }
        .logo-text i { font-size: 18px; }

        .sidebar-menu { list-style: none; padding: 0; margin-top: 24px; }
        .sidebar-menu .nav-item { margin-bottom: 4px; }
        .sidebar-menu .nav-link {
            display: flex; align-items: center; padding: 12px 16px; color: rgba(255, 255, 255, 0.65);
            text-decoration: none; font-weight: 700; font-size: 13px; border-radius: 8px; transition: all 0.2s;
        }
        .sidebar-menu .nav-link i { font-size: 14px; width: 24px; opacity: 0.8; }
        .sidebar-menu .nav-link:hover { color: #ffffff; background-color: rgba(255, 255, 255, 0.1); }
        
        /* Indikator Menu Aktif Otomatis */
        .sidebar-menu .nav-link.active { 
            color: #ffffff; 
            background-color: rgba(255, 255, 255, 0.18);
            font-weight: 800;
        }

        /* MAIN CONTENT STRUCTURE */
        .main-container-box {
            margin-left: 240px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            min-width: 0;
            width: calc(100% - 240px);
        }

        /* TOPBAR PUTIH SEJAJAR */
        .topbar-wrapper {
            background: #ffffff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            box-shadow: 0 4px 24px -8px rgba(0, 0, 0, 0.05);
            margin-bottom: 32px;
            width: 100%;
        }

        .topbar-brand-area { display: flex; flex-direction: column; }
        .topbar-title { color: #5a5c69; font-weight: 700; font-size: 15px; margin: 0; }
        .topbar-subtitle { color: #858796; font-size: 12px; font-weight: 600; margin: 0; margin-top: 2px; }

        /* GOOGLE ACC BUTTON POJOK KANAN ATAS */
        .topbar-account-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 1px solid #e3e6f0; 
            padding-left: 18px;
            height: 40px;
        }
        
        .account-meta-text { text-align: right; }
        .account-user-name { font-size: 13px; font-weight: 700; color: #5a5c69; display: block; }
        .account-user-nim { font-size: 11px; font-weight: 600; color: #b7b9cc; display: block; margin-top: 1px; }

        .avatar-circle-img {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 12px;
            border: 1px solid #d1d3e2;
        }

        /* CONTENT PANEL AREA */
        .dashboard-content-area {
            padding: 0 32px 32px 32px;
            flex: 1;
            max-width: 1400px;
            width: 100%;
        }

        /* CLOCK SIDEBAR SYSTEM */
        .sidebar-clock-panel {
            background: rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            text-align: center;
            margin-bottom: 16px;
        }
        .side-date-txt {
            display: flex; justify-content: center; align-items: center; gap: 5px;
            font-size: 10.5px; font-weight: 700; color: rgba(255, 255, 255, 0.6);
            padding-bottom: 4px; margin-bottom: 6px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .side-day-bold { color: #38bdf8; text-transform: uppercase; }
        .side-time-display {
            font-family: 'JetBrains Mono', monospace; font-size: 14.5px; font-weight: 800;
            color: #ffffff; display: flex; align-items: center; justify-content: center; line-height: 1;
        }
        .side-ampm-badge {
            font-size: 8px; background: #ffffff; color: #4e73df;
            padding: 1px 3px; border-radius: 3px; font-weight: 800; margin-left: 4px; line-height: 1;
        }
        .blink-colon { animation: pulseBlink 1s infinite; color: #38bdf8; margin: 0 1px; }
        @keyframes pulseBlink { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }

        @media (max-width: 992px) {
            .sidebar-wrapper { width: 70px; padding: 24px 8px; align-items: center; }
            .sidebar-wrapper .logo-text span, .sidebar-wrapper hr, .sidebar-wrapper .sidebar-clock-panel, .sidebar-wrapper .mt-auto { display: none !important; }
            .sidebar-menu .nav-link { padding: 12px; justify-content: center; width: 40px; height: 40px; }
            .sidebar-menu .nav-link i { margin: 0; width: auto; }
            .sidebar-menu .nav-link span { display: none; }
            .main-container-box { margin-left: 70px; width: calc(100% - 70px); }
        }
    </style>
</head>
<body>

<div class="sidebar-wrapper">
    <a class="logo-text d-flex align-items-center justify-content-center gap-2 mb-2" href="#">
        <i class="fa-solid fa-face-laugh-wink"></i>
        <span>Matrix.Hub <sup>2</sup></span>
    </a>
    <hr style="opacity: 0.15; color: #fff; margin: 12px 0;">

    <ul class="sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('utama') ? 'active' : '' }}" href="{{ url('/utama') }}">
                <i class="fa-solid fa-tachometer-alt"></i><span>Dashboard Utama</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('tugas') ? 'active' : '' }}" href="{{ url('/tugas') }}">
                <i class="fa-solid fa-folder"></i><span>Monitoring Tugas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('pengaturan') ? 'active' : '' }}" href="{{ url('/pengaturan') }}">
                <i class="fa-solid fa-wrench"></i><span>Control Panel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">
                <i class="fa-solid fa-headset"></i><span>Hub Kontak Pro</span>
            </a>
        </li>
    </ul>
    
    <div class="mt-auto">
        <div class="sidebar-clock-panel">
            <div class="side-date-txt">
                <span class="side-day-bold" id="sideDay">--</span>
                <span style="opacity: 0.4;">•</span>
                <span id="sideDate" style="color: rgba(255,255,255,0.8);">-- --- ----</span>
            </div>
            <div class="side-time-display">
                <span id="sideHr">00</span><span class="blink-colon">:</span><span id="sideMin">00</span><span class="blink-colon">:</span><span id="sideSec">00</span>
                <span class="side-ampm-badge" id="sideAmpm">AM</span>
            </div>
        </div>
        <div class="text-center">
            <span class="fw-bold" style="font-size: 9px; color: rgba(255,255,255,0.5); letter-spacing: 0.5px;">ATMI CORE ENGINE v2.4</span>
        </div>
    </div>
</div>

<div class="main-container-box">
    <div class="topbar-wrapper">
        <div class="topbar-brand-area">
            <h1 class="topbar-title">Sistem Monitoring Mahasiswa</h1>
            <span class="topbar-subtitle">Politeknik ATMI Surakarta &nbsp;|&nbsp; Workspace Utama</span>
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
        let hours = now.getHours();
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; 
        const hoursStr = String(hours).padStart(2, '0');

        document.getElementById('sideHr').textContent = hoursStr;
        document.getElementById('sideMin').textContent = minutes;
        document.getElementById('sideSec').textContent = seconds;
        document.getElementById('sideAmpm').textContent = ampm;

        const opsiHari = { weekday: 'long' };
        const opsiTanggal = { day: 'numeric', month: 'short', year: 'numeric' };
        document.getElementById('sideDay').textContent = now.toLocaleDateString('id-ID', opsiHari);
        document.getElementById('sideDate').textContent = now.toLocaleDateString('id-ID', opsiTanggal);
    }
    setInterval(updateSidebarClock, 1000);
    window.addEventListener('DOMContentLoaded', updateSidebarClock);
</script>
</body>
</html>