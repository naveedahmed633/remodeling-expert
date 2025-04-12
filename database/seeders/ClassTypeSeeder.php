<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classTypes = [
            ['name' => 'Dance Class', 'description' => 'A fun and energetic class focused on dance routines.'],
            ['name' => 'Fat Burning', 'description' => 'A high-intensity class designed to burn fat effectively.'],
            ['name' => 'Gym', 'description' => 'A comprehensive fitness program that targets strength training.'],
            ['name' => 'Powerlifting', 'description' => 'A class focused on strength training and powerlifting techniques.'],
        ];

        foreach ($classTypes as $type) {
            ClassType::create([
                'name' => $type['name'],
                'description' => $type['description'],
            ]);
        }
    }
}
