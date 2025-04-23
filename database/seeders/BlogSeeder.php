<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Remove existing Blog page if it exists
        CmsPage::where('name', 'Blog')->delete();

        // Define content for the Blog page
        $content = [
            'banner_section_heading' => 'Our Blog',
            'get_started_heading' => 'Get Started Today',
            'get_started_description' => 'Start your journey with us and unlock endless possibilities.',
            'get_started_button_text' => 'Join Now',
            'get_started_button_url' => 'https://remodeling-expert.kaamupdates.net/',
        ];

        // Create a new Blog page record
        CmsPage::create([
            'name' => 'Blog',
            'slug' => 'blog',
            'meta_title' => 'Blog - Remodeling Expert',
            'meta_description' => 'Explore insights and updates from Remodeling Expert.',
            'content' => json_encode($content),
        ]);
    }
}
