<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduleData = [
            ['trainer_id' => 1, 'class_type_id' => 1, 'day' => 'Monday', 'start_time' => '09:00:00', 'end_time' => '10:00:00'],
            ['trainer_id' => 2, 'class_type_id' => 2, 'day' => 'Sunday', 'start_time' => '10:00:00', 'end_time' => '11:00:00'],
            ['trainer_id' => 3, 'class_type_id' => 3, 'day' => 'Tuesday', 'start_time' => '11:00:00', 'end_time' => '12:00:00'],
            ['trainer_id' => 4, 'class_type_id' => 4, 'day' => 'Wednesday', 'start_time' => '12:00:00', 'end_time' => '13:00:00'],
            ['trainer_id' => 2, 'class_type_id' => 1, 'day' => 'Sunday', 'start_time' => '13:00:00', 'end_time' => '14:00:00'],
            ['trainer_id' => 1, 'class_type_id' => 3, 'day' => 'Friday', 'start_time' => '14:00:00', 'end_time' => '15:00:00'],
            ['trainer_id' => 2, 'class_type_id' => 2, 'day' => 'Saturday', 'start_time' => '15:00:00', 'end_time' => '16:00:00'],
            ['trainer_id' => 3, 'class_type_id' => 4, 'day' => 'Sunday', 'start_time' => '16:00:00', 'end_time' => '17:00:00'],
        ];

        foreach ($scheduleData as $schedule) {
            ClassSchedule::create($schedule);
        }
    }
}
