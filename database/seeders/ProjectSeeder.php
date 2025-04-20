<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Delete existing Home page data
        CmsPage::where('name', 'Project')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'Project',
        ];

        // Create Home page record
        $project = CmsPage::create([
            'name' => 'Project',
            'slug' => 'project',
            'meta_title' => 'Project - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/hero_1.jpg',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $project->clearMediaCollection($collectionName);
                $project->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }
    }
}
