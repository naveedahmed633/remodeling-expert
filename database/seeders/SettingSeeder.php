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
        // Delete existing Setting page data if it exists
        CmsPage::where('name', 'Setting')->delete();

        // Define content for the Setting page
        $content = [
            'banner_section_heading' => 'Welcome to Our Website',
            'banner_section_description' => 'Experience strength in both body and spirit with our expert remodeling solutions.',
            'banner_section_button_text' => 'Explore More',
            'banner_section_button_url' => 'about-us',
        ];

        // Create Setting page record
        CmsPage::create([
            'name' => 'Setting',
            'slug' => 'setting',
            'meta_title' => 'Website Settings - Remodeling Expert',
            'meta_description' => 'Customize and manage your experience on the Remodeling Expert website.',
            'content' => json_encode($content),
        ]);
    }
}
