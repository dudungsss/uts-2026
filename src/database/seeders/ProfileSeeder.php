<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing profiles
        Profile::query()->delete();
        
        Profile::create([
            'name' => 'Yuliadhy Nugraha',
            'typing_texts' => 'Mahasiswa Esa Unggul,Fullstack Learner,Vibe Coder',
            'tech_stacks' => [
                ['name' => 'Laravel 11', 'icon' => '🐘', 'role' => 'MVC Framework'],
                ['name' => 'Filament V3', 'icon' => '⚡', 'role' => 'Admin Panel'],
                ['name' => 'Livewire', 'icon' => '🔥', 'role' => 'Reactive UI'],
                ['name' => 'TailwindCSS', 'icon' => '🎨', 'role' => 'UI Styling'],
                ['name' => 'MariaDB', 'icon' => '🗄️', 'role' => 'Database'],
                ['name' => 'Docker', 'icon' => '🐋', 'role' => 'Environment'],
                ['name' => 'AlpineJS', 'icon' => '🔷', 'role' => 'Interactivity'],
            ],
            'hero_badge' => 'available for work',
            'total_tech_stack' => 7,
            'dark_mode_status' => '100%',
            'hero_description' => 'Membangun aplikasi web modern dengan Laravel, Filament V3, dan Livewire. Spesialis arsitektur MVC, admin panel dinamis, dan dark mode aesthetic.',
        ]);

    }
}
