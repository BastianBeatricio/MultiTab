<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Multitab Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Gaya Cadangan Otomatis Jika CSS CDN Gagal Load */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; padding: 40px 20px; color: #333; }
        .container { max-width: 900px; margin: 0 auto; }
        .mb-4 { margin-bottom: 1.5rem; }
        .fw-bold { font-weight: 700; }
        .text-muted { color: #6c757d; margin-top: 5px; }
        
        /* Card Wadah */
        .card-custom { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); padding: 25px; border: none; }
        
        /* Navigasi Tab Menyamping */
        .nav-tabs { display: flex; flex-wrap: wrap; list-style: none; padding-left: 0; margin-bottom: 20px; border-bottom: 2px solid #dee2e6; }
        .nav-tabs .nav-item { margin-bottom: -2px; }
        .nav-tabs .nav-link { display: block; padding: 12px 20px; color: #6c757d; font-weight: 500; text-decoration: none; background: none; border: none; cursor: pointer; border-bottom: 3px solid transparent; transition: all 0.2s; }
        .nav-tabs .nav-link:hover { color: #0d6efd; }
        .nav-tabs .nav-link.active { color: #0d6efd; font-weight: bold; border-bottom: 3px solid #0d6efd; }
        
        /* Konten Tab Aktif/Sembunyi */
        .tab-content { padding-top: 15px; }
        .tab-pane { display: none; }
        .tab-pane.active { display: block; animation: fadeIn 0.3s ease-in-out; }
        .mb-3 { margin-bottom: 1rem; }
        .text-secondary { color: #555; line-height: 1.6; }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard Pengembangan Web</h2>
        <p class="text-muted">Kelola seluruh modul aplikasi melalui menu tab di bawah ini.</p>
    </div>

    <div class="card card-custom">
        
        <ul class="nav nav-tabs" id="customTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" onclick="bukaTab(event, 'konten-tab1')">
                    🏠 Tema Utama
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" onclick="bukaTab(event, 'konten-tab2')">
                    📊 Data Tugas
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" onclick="bukaTab(event, 'konten-tab3')">
                    ⚙️ Pengaturan Isi
                </button>
            </li>
        </ul>

        <div class="tab-content" id="customTabContent">
            
            <div class="tab-pane active" id="konten-tab1">
                <h4 class="fw-bold mb-3">Konsep Tema Baru</h4>
                <p class="text-secondary">Ini adalah area isi utama untuk tema baru kamu. Kamu bisa menaruh teks deskripsi, gambar, komponen jumbotron, atau ringkasan informasi di sini.</p>
            </div>

            <div class="tab-pane" id="konten-tab2">
                <h4 class="fw-bold mb-3">Integrasi Data Tugas Kemarin</h4>
                <p class="text-secondary">Di dalam tab kedua ini, nantinya kita bisa menyisipkan struktur tabel HTML untuk menampilkan data yang ditarik dari database MySQL kamu (<code>lh44_nexus</code>).</p>
            </div>

            <div class="tab-pane" id="konten-tab3">
                <h4 class="fw-bold mb-3">Pengaturan & Form Input</h4>
                <p class="text-secondary">Tab ketiga ini bisa kamu manfaatkan untuk meletakkan formulir input (<em>form</em>) jika ingin menambahkan data baru atau konfigurasi konten lainnya ke database.</p>
            </div>

        </div>
        </div>
    </div>

<script>
    function bukaTab(evt, namaTab) {
        // Sembunyikan semua konten tab
        var i, tabpane, tablinks;
        tabpane = document.getElementsByClassName("tab-pane");
        for (i = 0; i < tabpane.length; i++) {
            tabpane[i].className = tabpane[i].className.replace(" active", "");
        }

        // Matikan status aktif semua tombol tab
        tablinks = document.getElementsByClassName("nav-link");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Tampilkan tab yang sedang diklik dan tambahkan kelas "active"
        document.getElementById(namaTab).className += " active";
        evt.currentTarget.className += " active";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/bootstrap.bundle.min.js"></script>
</body>
</html>