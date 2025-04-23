<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Remove existing Service CMS page if it exists
        CmsPage::where('name', 'Service')->delete();
    
        // Define content for the Service page
        $content = [
            'banner_section_heading' => 'Our Services',
            'transforming_homes_heading' => 'Transforming Homes with Expert Craftsmanship',
            'transforming_homes_desc_1' => 'At Remodeling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home’s beauty and value.',
            'transforming_homes_desc_2' => "We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it's a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.",
            'transforming_homes_desc_3' => 'Let’s build something amazing together!',
            'transforming_homes_button_text' => 'Learn More',
            'transforming_homes_button_url' => 'https://remodeling-expert.kaamupdates.net/',
            'trusted_small_heading' => 'Trusted Experts',
            'trusted_main_heading' => 'Building Your Vision into Reality',
            'trusted_description' => 'Our dedicated team ensures excellence in every step of your construction journey, delivering unmatched results on time and on budget.',
            'dark_box_heading' => 'Need Consultation?',
            'dark_box_description' => 'We’re here to help 24/7.',
            'dark_box_number' => '+92 300 1234567',
            
            'get_started_heading' => 'Get Started Today',
            'get_started_description' => 'You dream It, we design It.',
            'get_started_button_text' => 'CONTACT US',
            'get_started_button_url' => 'remodeling-expert.kaamupdates.net',
        ];
    
        // 👇 Only insert if services table is empty
        if (DB::table('services')->count() === 0) {
            DB::table('services')->insert([
                [
                    'title' => 'Interior Remodeling',
                    'description' => 'We specialize in kitchen, bathroom, and living room remodeling with modern design elements.',
                    'image' => 'uploads/services/RPpDl5Vq9NGzJ1J7CJsaX4otoICacJYRYgecYPqG.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Exterior Renovation',
                    'description' => 'Transform your home exterior with siding, roofing, and outdoor living enhancements.',
                    'image' => 'uploads/services/XMQcVxHtTqeEOLfdtzGvN8cS2p2ZmxMnM2VMSLKG.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Plumbing Services',
                    'description' => 'Expert plumbing solutions for your remodeling projects, including pipe fitting and fixture installation.',
                    'image' => 'uploads/services/o1EUu0ZQNR4T9MXoN2X3ORH7DF6fTmnmWLuQJzMU.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Electrical Upgrades',
                    'description' => 'From lighting installations to complete wiring updates, we ensure safety and efficiency.',
                    'image' => 'uploads/services/zyQUqO2fpT03kAkHLUn1KRWQUc9dkvcJp6N1Ryn6.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'HVAC Installation',
                    'description' => 'Stay comfortable with professional heating, ventilation, and air conditioning services.',
                    'image' => 'uploads/services/AIfPUHBXO0xef83KKumfNwtnunzEBVO1GRwXRbV3.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    
        // 👇 Create CMS Page (you may also add a similar check if needed)
        CmsPage::create([
            'name' => 'Service',
            'slug' => 'service',
            'meta_title' => 'Our Services - Remodeling Expert',
            'meta_description' => 'Explore professional remodeling services by Remodeling Expert. From kitchens to full home transformations, we deliver quality and precision.',
            'content' => json_encode($content),
        ]);
    }    
}
