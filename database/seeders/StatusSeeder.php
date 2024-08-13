<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'Planned',
            'color' => 'stone',
            'palette' => '600'
        ]);

        Status::create([
            'name' => 'WIP',
            'color' => 'amber',
            'palette' => '600'
        ]);

        Status::create([
            'name' => 'Done',
            'color' => 'emerald',
            'palette' => '600'
        ]);
    }
}
