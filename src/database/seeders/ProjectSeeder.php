<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectReport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::create([
            'title'             => 'Portfolio UTS — Laravel + Filament',
            'slug'              => 'portfolio-uts-laravel-filament',
            'short_description' => 'Website portfolio UTS yang dibangun dengan Laravel 11, Filament V3, Livewire, dan MariaDB dalam environment Docker. Menampilkan project, laporan, dan form kontak yang tersimpan ke database.',
            'tech_stack'        => 'Laravel,Filament V3,Livewire,MariaDB,Docker,TailwindCSS',
            'status'            => 'active',
            'is_featured'       => true,
        ]);

        ProjectReport::create([
            'project_id'          => $project->id,
            'problem_analysis'    => "Mahasiswa membutuhkan platform untuk menampilkan project akademik secara profesional.\nSistem harus dinamis — data dikelola via admin panel tanpa perlu edit kode.\nLaporan teknis perlu disajikan secara terstruktur untuk keperluan penilaian UTS.",
            'system_requirements' => "Halaman portfolio dengan daftar project dari database\nHalaman detail project dengan laporan teknis lengkap\nForm kontak yang menyimpan pesan ke tabel contacts\nAdmin panel Filament untuk CRUD semua data",
            'main_features'       => "CRUD Project via Filament Admin\nLaporan teknis per project (problem analysis, requirements, features, arsitektur)\nUpload gambar ERD dan flowchart\nForm kontak tersimpan ke database\nFilter project berdasarkan status\nDark mode aesthetic UI",
            'architecture'        => "Aplikasi menggunakan arsitektur MVC dengan Laravel sebagai framework utama.\nLivewire digunakan untuk reactive component tanpa JavaScript manual.\nFilament V3 sebagai admin panel untuk mengelola semua data.\nDatabase MariaDB dijalankan dalam container Docker.",
            'progress_status'     => 'In Development — 65%',
        ]);

        Project::create([
            'title'             => 'Tech-Hire',
            'slug'              => 'tech-hire',
            'short_description' => 'CRUD admin panel menggunakan Filament V3 untuk mengelola projects, reports, dan contacts. Dilengkapi dengan fitur upload gambar dan filter.',
            'tech_stack'        => 'Laravel,Filament V3,Livewire,MariaDB,Docker,TailwindCSS',
            'status'            => 'Progress',
            'is_featured'       => true,
        ]);

        ProjectReport::create([
            'project_id'          => 2,
            'problem_analysis'    => "Perusahaan membutuhkan sistem untuk mengelola data kandidat dan proses rekrutmen secara efisien.\nSistem harus memungkinkan admin untuk melakukan CRUD data kandidat, posisi, dan laporan proses rekrutmen.\nLaporan teknis diperlukan untuk mendokumentasikan analisis masalah, kebutuhan sistem, fitur utama, dan arsitektur solusi.",
            'system_requirements' => "Admin panel dengan CRUD untuk kandidat, posisi, dan laporan rekrutmen\nFitur upload dokumen kandidat (CV)\nFilter data berdasarkan status rekrutmen\nLaporan teknis terstruktur untuk dokumentasi",
            'main_features'       => "CRUD Kandidat via Filament Admin\nUpload CV Kandidat\nFilter berdasarkan status rekrutmen\nLaporan teknis per proses rekrutmen\nUI yang responsif dan user-friendly",
            'architecture'        => "Aplikasi dibangun dengan Laravel menggunakan arsitektur MVC.\nLivewire digunakan untuk membuat komponen interaktif tanpa JavaScript manual.\nFilament V3 sebagai admin panel untuk mengelola semua data.\nDatabase MariaDB dijalankan dalam container Docker.",
            'progress_status'     => 'In Development — 40%',
        ]);
    }
}