@extends('master')

@section('konten_halaman')
<style>
    .contact-wrapper { display: grid; grid-template-columns: 1.5fr 1fr; gap: 24px; }
    .glass-card { background: #fff; border: 1px solid #e3e6f0; border-radius: 16px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
    .ticket-item { padding: 15px; border-radius: 12px; background: #f8fafc; border-left: 4px solid #4e73df; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; }
    .ticket-item.urgent { border-left-color: #e74a3b; }
    .form-control-custom { background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px; font-size: 13px; font-weight: 600; width: 100%; margin-bottom: 15px; }
    .btn-send { background: #4e73df; color: #fff; border: none; padding: 12px; border-radius: 8px; width: 100%; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; cursor: pointer; }
    .btn-send:hover { background: #224abe; transform: translateY(-2px); }
</style>

<div class="contact-wrapper">
    <div class="glass-card">
        <h4 style="font-weight: 800; color: #4e73df; margin-bottom: 20px; font-size: 14px;"><i class="fa-solid fa-list-check me-2"></i>Keluhan & Support Ticket Tracker</h4>
        
        <div class="ticket-item urgent">
            <div>
                <span style="font-size: 10px; font-weight: 800; color: #e74a3b;">#TK-092 (CRITICAL)</span>
                <h6 style="margin: 4px 0; font-weight: 700; color: #334155;">Kalibrasi Sensor CNC Haas v3</h6>
                <p style="font-size: 12px; color: #64748b; margin: 0;">Mesin mengalami deviasi sumbu Y sebesar 0.05mm pada Kluster C bengkel.</p>
            </div>
            <span class="badge bg-danger">Pending</span>
        </div>

        <div class="ticket-item">
            <div>
                <span style="font-size: 10px; font-weight: 800; color: #4e73df;">#TK-088</span>
                <h6 style="margin: 4px 0; font-weight: 700; color: #334155;">Sinkronisasi Otomatis Logbook Lembur</h6>
                <p style="font-size: 12px; color: #64748b; margin: 0;">Input 4 jam dispensasi proyek Driving Safety Compliance AI belum masuk SIAKAD.</p>
            </div>
            <span class="badge bg-primary">In Process</span>
        </div>
    </div>

    <div class="glass-card">
        <h4 style="font-weight: 800; color: #334155; margin-bottom: 20px; font-size: 14px;"><i class="fa-solid fa-paper-plane me-2"></i>Buat Pengajuan Keluhan Baru</h4>
        
        <form id="formKeluhan" onsubmit="handleFormSubmit(event)">
            <label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 6px;">SUBJEK MASALAH / KELUHAN</label>
            <input type="text" class="form-control-custom" required placeholder="Contoh: Malfungsi Alat Bubut / Deviasi Absen">
            
            <label style="font-size: 11px; font-weight: 800; color: #64748b; margin-bottom: 6px;">DESKRIPSI KRONOLOGI LENGKAP</label>
            <textarea class="form-control-custom" rows="4" required placeholder="Jelaskan secara detail kendala teknis yang dihadapi..."></textarea>
            
            <button type="submit" class="btn-send">Kirim Tiket Keluhan</button>
        </form>
    </div>
</div>

<script>
    function handleFormSubmit(event) {
        event.preventDefault(); // Mencegah reload halaman
        
        // 1. Munculkan notifikasi sukses
        alert('Sukses! Tiket keluhan Bastian Beatricio berhasil dikirim ke Admin Utama.');
        
        // 2. Bersihkan/kosongkan isi form secara instan setelah tombol diklik
        document.getElementById('formKeluhan').reset();
    }
</script>
@endsection