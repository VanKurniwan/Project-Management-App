<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use App\Models\Project;
use App\Models\Techstack;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Difficulty;
use Illuminate\Database\Seeder;
use Database\Seeders\TechstackSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            StatusSeeder::class,
            TechstackSeeder::class,
            DifficultySeeder::class
        ]);

        Project::factory(9)->recycle([
            Status::all(),
            Techstack::all(),
            Difficulty::all()
        ])->create();
    }
}
