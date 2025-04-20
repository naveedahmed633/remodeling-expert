<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Delete existing Home page data
        CmsPage::where('name', 'Contact')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'Contact Us',
            'address_heading' => 'Address',
            'address_description_1' => 'Your Company Name 333 Street',
            'address_description_2' => 'City Name, Postal Code Zip Code',
            'office_hours_heading' => 'Office Hours',
            'office_hours_description_1' => 'Mon-Fri: 08:00 AM - 05:00 PM',
            'office_hours_description_2' => 'Sat-Sun: Emergency only',
            'phone_number_heading' => 'Phone Number',
            'phone_number_description_1' => 'Main Phone Line',
            'phone_number_description_2' => '(111) 123-1234',
            'get_in_touch_heading' => 'Get in touch with us',
            'get_in_touch_description' => 'Please fill out the form with all required information and we will get back to you within 3 business days.',
            'get_in_touch_button_text' => 'Submit',
            'get_started_heading' => 'Get Started Today',
            'get_started_description' => 'Start your journey with us and unlock endless possibilities.',
            'get_started_button_text' => 'Join Now',
            'get_started_button_url' => 'Get Started',
        ];

        // Create Home page record
        $contact = CmsPage::create([
            'name' => 'Contact',
            'slug' => 'contact',
            'meta_title' => 'Contact - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/hero_1.jpg',
            'get_started_today_image' => 'front/images/hero_2.jpg',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $contact->clearMediaCollection($collectionName);
                $contact->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }
    }
}
