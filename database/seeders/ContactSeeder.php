<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Remove existing Contact page if it exists
        CmsPage::where('name', 'Contact')->delete();

        // Define content for the Contact page
        $content = [
            'banner_section_heading' => 'Contact Us',

            // Address section
            'address_heading' => 'Address',
            'address_description_1' => 'Your Company Name, 333 Street',
            'address_description_2' => 'City Name, Postal Code, Zip Code',

            // Office hours section
            'office_hours_heading' => 'Office Hours',
            'office_hours_description_1' => 'Mon–Fri: 08:00 AM – 05:00 PM',
            'office_hours_description_2' => 'Sat–Sun: Emergency Only',

            // Phone number section
            'phone_number_heading' => 'Phone Number',
            'phone_number_description_1' => 'Main Phone Line',
            'phone_number_description_2' => '(111) 123-1234',

            // Contact form section
            'get_in_touch_heading' => 'Get in Touch With Us',
            'get_in_touch_description' => 'Please fill out the form with all required information. We’ll get back to you within 3 business days.',
            'get_in_touch_button_text' => 'Submit',

            // CTA section
            'get_started_heading' => 'Get Started Today',
            'get_started_description' => 'Start your journey with us and unlock endless possibilities.',
            'get_started_button_text' => 'Join Now',
            'get_started_button_url' => 'order', // updated for consistency
        ];

        // Create Contact page record
        CmsPage::create([
            'name' => 'Contact',
            'slug' => 'contact',
            'meta_title' => 'Contact - Remodeling Expert',
            'meta_description' => 'Reach out to Remodeling Expert for inquiries, consultations, and project planning.',
            'content' => json_encode($content),
        ]);
    }
}
