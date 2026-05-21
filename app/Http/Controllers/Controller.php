<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function halamanUtama() {
        return view('utama');
    }

    public function halamanTugas() {
        // Data simulasi internal agar aman tanpa database phpMyAdmin
        $data_tugas = [
            (object)[
                'nama' => 'Sistem Deteksi Kelengkapan Berkendara AI',
                'kategori' => 'AI & Safety Compliance',
                'status' => 'Active'
            ],
            (object)[
                'nama' => 'Web Portal Tugas Akhir UpServer',
                'kategori' => 'Web Native v1',
                'status' => 'In Progress'
            ],
            (object)[
                'nama' => 'Core Database Syncer Cluster',
                'kategori' => 'Database Engine',
                'status' => 'Synced'
            ]
        ];

        return view('tugas', compact('data_tugas'));
    }

    public function halamanPengaturan() {
        return view('pengaturan');
    }
}