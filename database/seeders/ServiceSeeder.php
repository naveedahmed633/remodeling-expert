<?php

namespace Database\Seeders;

use App\Models\CmsPage;
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
        // Delete existing Home page data
        CmsPage::where('name', 'Service')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'Our Services',

            'transforming_homes_heading' => 'Transforming Homes with Expert Craftsmanship',
            'transforming_homes_desc_1' => 'At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home’s beauty and value.',
            'transforming_homes_desc_2' => "We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it's a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.",
            'transforming_homes_desc_3' => 'Let’s build something amazing together!',
            'transforming_homes_button_text' => 'Learn More',
            'transforming_homes_button_url' => 'project',

            'trusted_small_heading' => 'Trusted Experts',
            'trusted_main_heading' => 'Building Your Vision into Reality',
            'trusted_description' => 'Our dedicated team ensures excellence in every step of your construction journey, delivering unmatched results on time and on budget.',
            'dark_box_heading' => 'Need Consultation?',
            'dark_box_description' => 'We’re here to help 24/7.',
            'dark_box_number' => '+92 300 1234567',
        ];

        // Create Home page record
        $service = CmsPage::create([
            'name' => 'Service',
            'slug' => 'service',
            'meta_title' => 'Service - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/hero_1.jpg',
            'transforming_homes_image' => 'front/images/hero_3.jpg',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $service->clearMediaCollection($collectionName);
                $service->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }
    }
}
