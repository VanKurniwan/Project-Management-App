<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Difficulty::create([
            'name' => 'Easy',
            'color' => 'lime',
            'palette' => '600'
        ]);

        Difficulty::create([
            'name' => 'Medium',
            'color' => 'orange',
            'palette' => '600'
        ]);

        Difficulty::create([
            'name' => 'Hard',
            'color' => 'red',
            'palette' => '700'
        ]);
    }
}
