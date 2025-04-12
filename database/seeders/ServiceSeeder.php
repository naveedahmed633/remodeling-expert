<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'title' => 'Weight Training',
                'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.",
                'image' => 'front/images/weightimg.jpg',
            ],
            [
                'title' => 'Mobility Training',
                'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.",
                'image' => 'front/images/mobilityimg.jpg',
            ],
            [
                'title' => 'Quickness Training',
                'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.",
                'image' => 'front/images/quicknesimg.jpg',
            ],
            [
                'title' => 'Plyometric Training',
                'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.",
                'image' => 'front/images/plyometricimg.jpg',
            ],
        ];

        foreach ($services as $service) {
            $serviceModel = new Service();
            $serviceModel->title = $service['title'];
            $serviceModel->description = $service['description'];

            // Add image using Spatie Media Library
            $serviceModel->save();
            $serviceModel->addMedia(public_path($service['image']))
                ->preservingOriginal()
                ->toMediaCollection('services');
        }
    }

}
