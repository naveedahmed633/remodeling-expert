<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Remove existing Project page if it exists
        CmsPage::where('name', 'Project')->delete();

        // Define content for the Project page
        $content = [
            'banner_section_heading' => 'Our Projects',
        ];

        // Create Project page record
        CmsPage::create([
            'name' => 'Project',
            'slug' => 'project',
            'meta_title' => 'Projects - Remodeling Expert',
            'meta_description' => 'Explore our completed and ongoing remodeling projects at Remodeling Expert.',
            'content' => json_encode($content),
        ]);

        // Check if projects already exist in the table to avoid duplication
        if (Project::count() == 0) {
            // Insert sample projects
            DB::table('projects')->insert([
                [
                    'title' => 'Modern Kitchen Renovation',
                    'description' => 'A complete remodel of a modern kitchen, including custom cabinetry, new appliances, and modern design features.',
                    'description1' => 'This project involved updating the entire layout, adding new countertops, and installing energy-efficient appliances.',
                    'client' => 'John Doe',
                    'year' => 2023,
                    'author' => 'Jane Smith',
                    'image' => 'uploads/projects/modern-kitchen.jpg',
                    'image1' => 'uploads/projects/modern-kitchen-1.jpg',
                    'image2' => 'uploads/projects/modern-kitchen-2.jpg',
                    'image3' => 'uploads/projects/modern-kitchen-3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Luxury Bathroom Remodel',
                    'description' => 'A luxurious bathroom transformation with high-end finishes, including a freestanding tub, walk-in shower, and custom vanities.',
                    'description1' => 'This remodel featured premium tile work, advanced water fixtures, and custom cabinetry designed to create a spa-like experience.',
                    'client' => 'Sarah Lee',
                    'year' => 2022,
                    'author' => 'Mark Johnson',
                    'image' => 'uploads/projects/luxury-bathroom.jpg',
                    'image1' => 'uploads/projects/luxury-bathroom-1.jpg',
                    'image2' => 'uploads/projects/luxury-bathroom-2.jpg',
                    'image3' => 'uploads/projects/luxury-bathroom-3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Outdoor Living Space',
                    'description' => 'Transforming a backyard into a relaxing outdoor living area with a custom deck, seating, and landscaping.',
                    'description1' => 'The project included building a custom deck, adding a fire pit, and landscaping the area to enhance outdoor living.',
                    'client' => 'Emily White',
                    'year' => 2021,
                    'author' => 'Tom Green',
                    'image' => 'uploads/projects/outdoor-living.jpg',
                    'image1' => 'uploads/projects/outdoor-living-1.jpg',
                    'image2' => 'uploads/projects/outdoor-living-2.jpg',
                    'image3' => 'uploads/projects/outdoor-living-3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Home Office Renovation',
                    'description' => 'Renovating a home office with ergonomic furniture, storage solutions, and smart technology to enhance productivity.',
                    'description1' => 'The renovation involved creating a productive environment with better lighting, storage, and ergonomic workstations.',
                    'client' => 'Michael Brown',
                    'year' => 2020,
                    'author' => 'Linda Grey',
                    'image' => 'uploads/projects/home-office.jpg',
                    'image1' => 'uploads/projects/home-office-1.jpg',
                    'image2' => 'uploads/projects/home-office-2.jpg',
                    'image3' => 'uploads/projects/home-office-3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        
    }
}
