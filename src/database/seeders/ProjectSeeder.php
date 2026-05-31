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
        Project::create([
            'title' => 'Website Lowongan Pekerjaan khusus IT',
            'slug' => Str::slug('Website Lowongan Pekerjaan khusus IT'),
            'short_description' => 'Sebuah website untuk menampilkan lowongan pekerjaan khusus di bidang IT.',
            'tech_stack' => 'Laravel, MySQL, Bootstrap',
            'status' => 'done',
            'is_featured' => true,
        ]);
    }
}