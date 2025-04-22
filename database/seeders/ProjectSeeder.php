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
                    'image' => 'uploads/projects/modern-kitchen.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Luxury Bathroom Remodel',
                    'description' => 'A luxurious bathroom transformation with high-end finishes, including a freestanding tub, walk-in shower, and custom vanities.',
                    'image' => 'uploads/projects/luxury-bathroom.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Outdoor Living Space',
                    'description' => 'Transforming a backyard into a relaxing outdoor living area with a custom deck, seating, and landscaping.',
                    'image' => 'uploads/projects/outdoor-living.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Home Office Renovation',
                    'description' => 'Renovating a home office with ergonomic furniture, storage solutions, and smart technology to enhance productivity.',
                    'image' => 'uploads/projects/home-office.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
