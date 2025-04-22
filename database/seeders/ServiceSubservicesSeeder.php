<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SubserviceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSubservicesSeeder extends Seeder
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
                'title' => 'Interior Remodeling',
                'description' => 'testtest',
                'image' => 'services/CAaRp6mPaEGNotJZMfv36tlXqXG0ndIjGkmyIPEc.png',
                'subservices' => [
                    [
                        'name' => 'Kitchen Remodel',
                        'children' => ['Cabinet Installation', 'Lighting Setup', 'Backsplash']
                    ],
                    [
                        'name' => 'Bathroom Remodel',
                        'children' => ['Shower Replacement', 'Vanity Install', 'Floor Tiling']
                    ]
                ]
            ],
            [
                'title' => 'HVAC',
                'description' => 'testtest',
                'image' => 'services/CAaRp6mPaEGNotJZMfv36tlXqXG0ndIjGkmyIPEc.png',
                'subservices' => [
                    [
                        'name' => 'Heating System',
                        'children' => ['Furnace Repair', 'Thermostat Setup']
                    ],
                    [
                        'name' => 'Cooling System',
                        'children' => ['AC Installation', 'Vent Cleaning']
                    ]
                ]
            ],
            [
                'title' => 'Exterior Remodeling',
                'description' => 'testtest',
                'image' => 'services/CAaRp6mPaEGNotJZMfv36tlXqXG0ndIjGkmyIPEc.png',
                'subservices' => [
                    [
                        'name' => 'Roofing',
                        'children' => ['Shingle Replacement', 'Leak Repair']
                    ],
                    [
                        'name' => 'Siding',
                        'children' => ['Vinyl Install', 'Paint Touchup']
                    ]
                ]
            ],
            [
                'title' => 'Electric Work',
                'description' => 'testtest',
                'image' => 'services/CAaRp6mPaEGNotJZMfv36tlXqXG0ndIjGkmyIPEc.png',
                'subservices' => [
                    [
                        'name' => 'Wiring',
                        'children' => ['Full House Wiring', 'Outlet Fixing']
                    ],
                    [
                        'name' => 'Panel Upgrades',
                        'children' => ['Breaker Replacement', 'Surge Protection']
                    ]
                ]
            ],
            [
                'title' => 'Plumbing',
                'description' => 'testtest',
                'image' => 'services/CAaRp6mPaEGNotJZMfv36tlXqXG0ndIjGkmyIPEc.png',
                'subservices' => [
                    [
                        'name' => 'Pipe Repair',
                        'children' => ['Leak Fix', 'Joint Replacement']
                    ],
                    [
                        'name' => 'Fixture Installation',
                        'children' => ['Faucet Install', 'Shower Head Setup']
                    ]
                ]
            ],
        ];

        foreach ($services as $serviceData) {
            $service = Service::create([
                'title' => $serviceData['title'],
                'description' => $serviceData['description'],
                'image' => $serviceData['image'],
            ]);

            foreach ($serviceData['subservices'] as $subserviceData) {
                $subservice = ServiceCategory::create([
                    'services_id' => $service->id,
                    'name' => $subserviceData['name'],
                ]);

                foreach ($subserviceData['children'] as $childName) {
                    SubserviceCategory::create([
                        'service_category_id' => $subservice->id,
                        'name' => $childName,
                    ]);
                }
            }
        }
    }
}
