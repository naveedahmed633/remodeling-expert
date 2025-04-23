<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            // Delete existing Home page data
            CmsPage::where('name', 'Step Form')->delete();
    
            // Initialize new content
            $content = [
                'banner_section_heading' => 'Welcome to',
                'banner_section_description' => 'Our Website',
                'banner_section_button_text' => 'Strength in Body',
                'banner_section_button_url' => 'https://remodeling-expert.kaamupdates.net/',
            ];
    
            // Create Home page record
            $step_form = CmsPage::create([
                'name' => 'Step Form',
                'slug' => 'step_form',
                'meta_title' => 'Step Form - Remodeling Expert',
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
                    $step_form->clearMediaCollection($collectionName);
                    $step_form->addMedia($fullPath)->toMediaCollection($collectionName);
                }
            }
        }
    }
}
