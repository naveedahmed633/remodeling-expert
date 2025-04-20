<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Home page data
        CmsPage::where('name', 'About')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'About Us',
            'transforming_homes_heading' => 'Transforming Homes with Expert Craftsmanship',
            'transforming_homes_desc_1' => 'At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home’s beauty and value.',
            'transforming_homes_desc_2' => "We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it's a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.",
            'transforming_homes_desc_3' => "Let’s build something amazing together!",
            'transforming_homes_button_text' => 'LEARN MORE',
            'transforming_homes_button_url' => 'project',
            'estimate_section_heading' => 'Get the estimate for your Full Home',
            'estimate_section_description' => 'Estimate the approximate cost of doing up your home interiors',
            'estimate_image_heading_1' => 'Cabinets',
            'estimate_image_heading_2' => 'Flooring',
            'estimate_image_heading_3' => 'Lighting',
            'estimate_image_heading_4' => 'DOORS',
            'estimate_image_desc_1' => 'Estimate the approximate cost your cabinets.',
            'estimate_image_desc_2' => 'Estimate the approximate cost your Flooring.',
            'estimate_image_desc_3' => 'Estimate the approximate cost your Lighting.',
            'estimate_image_desc_4' => 'Estimate the approximate cost your DOORS.',
            'estimate_button_text' => 'GET A FREE QUOTE',
            'estimate_button_url' => 'order',
            'before_after_heading' => 'Before and After',
            'trusted_small_heading' => 'Trusted Experts',
            'trusted_main_heading' => 'Building Your Vision into Reality',
            'trusted_description' => 'Our dedicated team ensures excellence in every step of your construction journey, delivering unmatched results on time and on budget.',
            'dark_box_heading' => 'Need Consultation?',
            'dark_box_description' => 'We’re here to help 24/7.',
            'dark_box_number' => '+92 300 1234567',
        ];

        // Create Home page record
        $about = CmsPage::create([
            'name' => 'About',
            'slug' => 'about',
            'meta_title' => 'About - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/hero_1.jpg',
            'transforming_homes_image' => 'front/images/hero_2.jpg',
            'before_after' => 'front/images/hero_3.jpg',
            'after_image' => 'front/images/benefits_image.png',
            'estimate_image_1' => 'front/images/benefits_image_1.jpg',
            'estimate_image_2' => 'front/images/benefits_image_2.jpg',
            'estimate_image_3' => 'front/images/benefits_image_2.jpg',
            'estimate_image_4' => 'front/images/benefits_image_2.jpg',
            'trusted_section_image' => 'front/images/benefits_image_2.jpg',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $about->clearMediaCollection($collectionName);
                $about->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }

        // Optionally add the logo
        $logoPath = public_path('front/images/logo.png');
        if (file_exists($logoPath)) {
            $about->clearMediaCollection('logo');
            $about->addMedia($logoPath)->toMediaCollection('logo');
        }
    }
}
