<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainers = [
            ['name' => 'Albert Fincher'],
            ['name' => 'Maria Smith'],
            ['name' => 'Darian Philips'],
            ['name' => 'Anna Bauman'],
        ];

        foreach ($trainers as $trainer) {
            Trainer::create([
                'name' => $trainer['name'],
            ]);
        }
    }
}
