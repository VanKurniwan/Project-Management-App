<?php

namespace Database\Seeders;

use App\Models\Techstack;
use Illuminate\Database\Seeder;

class TechstackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Techstack::create([
            'name' => 'HTML',
            'lowercase' => 'html',
            'color' => 'orange',
            'palette' => '600'
        ]);

        Techstack::create([
            'name' => 'CSS',
            'lowercase' => 'css',
            'color' => 'primary',
            'palette' => '600'
        ]);

        Techstack::create([
            'name' => 'PHP',
            'lowercase' => 'php',
            'color' => 'purple',
            'palette' => '600'
        ]);

        Techstack::create([
            'name' => 'Laravel 11',
            'lowercase' => 'laravel 11',
            'color' => 'red',
            'palette' => '600'
        ]);
    }
}
