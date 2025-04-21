<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

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
    }
}
