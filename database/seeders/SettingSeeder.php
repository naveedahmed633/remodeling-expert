<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Home page data
        CmsPage::where('name', 'Setting')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'Welcome to',
            'banner_section_description' => 'Our Website',
            'banner_section_button_text' => 'Strength in Body',
            'banner_section_button_url' => 'and Spirit',

            'transforming_homes_heading' => 'Strength in Body',
            'transforming_homes_desc_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
            'transforming_homes_desc_2' => 'Learn More',
            'transforming_homes_button_text' => 'Learn More',
            'transforming_homes_button_url' => 'Learn More',

            'interior_solutions_heading' => 'Transform Your Mind',
            'interior_solutions_description' => 'Praesent commodo cursus magna...',
            'interior_solution_desc_1' => 'Get Started',
            'interior_solution_desc_2' => 'Get Started',
            'interior_solution_desc_3' => 'Get Started',
            'interior_solution_desc_4' => 'Get Started',
            'interior_solution_button_text' => 'Get Started',
            'interior_solution_button_url' => 'Get Started',

            'estimate_section_heading' => 'Build Your Strength',
            'estimate_section_description' => 'Fusce dapibus, tellus ac cursus commodo...',
            'estimate_image_heading_1' => 'Join Now',
            'estimate_image_heading_2' => 'Join Now',
            'estimate_image_heading_3' => 'Join Now',
            'estimate_image_heading_4' => 'Join Now',
            'estimate_image_desc_1' => 'Join Now',
            'estimate_image_desc_2' => 'Join Now',
            'estimate_image_desc_3' => 'Join Now',
            'estimate_image_desc_4' => 'Join Now',
            'estimate_button_text' => 'Join Now',
            'estimate_button_url' => 'Join Now',

            'before_after_heading' => 'Why Choose Us?',

            'trusted_small_heading' => 'Unlock Your Full Potential',
            'trusted_main_heading' => 'We provide everything you need...',
            'trusted_description' => '10+ Years of Experience',
            'dark_box_heading' => '500+ Happy Clients',
            'dark_box_description' => '100+ Programs',
            'dark_box_number' => '981938',

            'recent_projects_heading' => 'Our Training Plans',
            'recent_projects_description' => 'Affordable Prices for Every Goal',

            'recent_projects_button_text' => 'Stay Motivated',
            'recent_projects_button_url' => 'Push Your Limits',

            'get_started_heading' => 'Embrace the challenge...',
            'get_started_description' => 'Join Now',

            'get_started_button_text' => 'Our Timetable',
            'get_started_button_url' => 'Choose Your Class',
        ];

        // Create Home page record
        $setting = CmsPage::create([
            'name' => 'Setting',
            'slug' => 'setting',
            'meta_title' => 'Setting - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/hero_1.jpg',
            'transforming_settings_image' => 'front/images/hero_2.jpg',
            'interior_solution_image_1' => 'front/images/hero_3.jpg',
            'interior_solution_image_2' => 'front/images/benefits_image.png',
            'interior_solution_image_3' => 'front/images/benefits_image_1.jpg',
            'interior_solution_image_4' => 'front/images/benefits_image_2.jpg',
            'estimate_image_1' => 'front/images/benefits_image_2.jpg',
            'estimate_image_2' => 'front/images/benefits_image_2.jpg',
            'estimate_image_3' => 'front/images/benefits_image_2.jpg',
            'estimate_image_4' => 'front/images/benefits_image_2.jpg',
            'before_image' => 'front/images/benefits_image_2.jpg',
            'after_image' => 'front/images/benefits_image_2.jpg',
            'trusted_section_image' => 'front/images/benefits_image_2.jpg',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $setting->clearMediaCollection($collectionName);
                $setting->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }

        // Optionally add the logo
        $logoPath = public_path('front/images/logo.png');
        if (file_exists($logoPath)) {
            $setting->clearMediaCollection('logo');
            $setting->addMedia($logoPath)->toMediaCollection('logo');
        }
    }
}
