<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing contacts
        Contact::query()->delete();
        
        // Social media contacts
        Contact::create([
            'name' => 'Email',
            'email' => 'ynugrahauga29@email.com',
            'contact_type' => 'email',
            'is_system_contact' => true,
            'url' => 'mailto:ynugrahauga29@email.com',
            'icon' => '✉',
            'display_order' => 1,
        ]);

        Contact::create([
            'name' => 'dudungsss',
            'email' => null,
            'contact_type' => 'github',
            'is_system_contact' => true,
            'url' => 'https://github.com/dudungsss',
            'icon' => '⑂',
            'display_order' => 2,
        ]);
   }
}
