<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            SettingSeeder::class,
            ServiceSeeder::class,
            ClassTypeSeeder::class,
            HomeSeeder::class,
            AboutSeeder::class,
            TrainerSeeder::class,
            ScheduleSeeder::class,
            EventsSeeder::class,
            ContactSeeder::class,
            LeagueSeeder::class,
            ProgramsSeeder::class,
            TrainingSeeder::class,
        ]);
    }
}
