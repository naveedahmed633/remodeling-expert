<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Home page data
        CmsPage::where('name', 'Home')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'Transform Your Home with Expert Remodeling',
            'banner_section_description' => 'Transform your space with precision and style. Our expert remodeling services deliver high-quality craftsmanship, innovative designs, and seamless execution to bring your vision to life.',
            'banner_section_button_text' => 'Sart Now',
            'banner_section_button_url' => 'order',

            'transforming_homes_heading' => 'Transforming Homes with Expert Craftsmanship',
            'transforming_homes_desc_1' => 'At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home’s beauty and value.',
            'transforming_homes_desc_2' => "We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it's a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.",
            'transforming_homes_desc_3' => 'Let’s build something amazing together!',
            'transforming_homes_button_text' => 'Learn More',
            'transforming_homes_button_url' => 'services',

            'interior_solutions_heading' => 'Your all-in-one destination for interior solutions',
            'interior_solutions_description' => 'At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home’s beauty and value.',
            'interior_solution_desc_1' => 'Interior Remodeling',
            'interior_solution_desc_2' => 'Interior Remodeling',
            'interior_solution_desc_3' => 'Plumbing',
            'interior_solution_desc_4' => 'HVAC',
            'interior_solution_button_text' => 'More Services',
            'interior_solution_button_url' => 'services',

            'estimate_section_heading' => 'Get the estimate for your Full Home',
            'estimate_section_description' => 'Estimate the approximate cost of doing up your home interiors',
            'estimate_image_heading_1' => 'Cabinets',
            'estimate_image_heading_2' => 'Flooring',
            'estimate_image_heading_3' => 'Lighting',
            'estimate_image_heading_4' => 'DOORS',
            'estimate_image_desc_1' => 'Estimate the approximate cost your cabinets.',
            'estimate_image_desc_2' => 'Estimate the approximate cost your flooring.',
            'estimate_image_desc_3' => 'Estimate the approximate cost your lightings.',
            'estimate_image_desc_4' => 'Estimate the approximate cost your doors.',
            'estimate_button_text' => 'Get A Quote',
            'estimate_button_url' => '____',

            'before_after_heading' => 'Before & After',

            'trusted_small_heading' => 'Trusted Experts',
            'trusted_main_heading' => 'Building Your Vision into Reality',
            'trusted_description' => 'Our dedicated team ensures excellence in every step of your construction journey, delivering unmatched results on time and on budget.',
            'dark_box_heading' => 'Need Consultation?',
            'dark_box_description' => 'We’re here to help 24/7.',
            'dark_box_number' => '+92 300 1234567',

            'recent_projects_heading' => 'Recent Projects',
            'recent_projects_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.',
            'recent_projects_button_text' => 'More Projects',
            'recent_projects_button_url' => 'project',

            'get_started_heading' => 'Get Started Today',
            'get_started_description' => 'Start your journey with us and unlock endless possibilities.',
            'get_started_button_text' => 'Join Now',
            'get_started_button_url' => 'order',
        ];

        // Create Home page record
        $home = CmsPage::create([
            'name' => 'Home',
            'slug' => 'home',
            'meta_title' => 'Home - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/home.png',
            'transforming_homes_image' => 'front/images/3d-rendering-loft-luxury-living-room-with-bookshelf.png',
            'interior_solution_image_1' => 'front/images/all-in-one.png',
            'interior_solution_image_2' => 'front/images/image (2).png',
            'interior_solution_image_3' => 'front/images/image (3).png',
            'interior_solution_image_4' => 'front/images/image (4).png',
            'estimate_image_1' => 'front/images/Cabinets.png',
            'estimate_image_2' => 'front/images/Flooring.png',
            'estimate_image_3' => 'front/images/Lighting.png',
            'estimate_image_4' => 'front/images/DOORS.png',
            'before_image' => 'front/images/image.png',
            'after_image' => 'front/images/image.png',
            'trusted_section_image' => 'front/images/image (1).png',
            'get_started_today_image' => 'front/images/image (1).png',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $home->clearMediaCollection($collectionName);
                $home->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }

        // Optionally add the logo
        $logoPath = public_path('front/images/logo.png');
        if (file_exists($logoPath)) {
            $home->clearMediaCollection('logo');
            $home->addMedia($logoPath)->toMediaCollection('logo');
        }
    }
}
