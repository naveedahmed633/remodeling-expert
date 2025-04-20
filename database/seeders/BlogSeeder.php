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
        // Delete existing Blog page data
        CmsPage::where('name', 'Blog')->delete();

        // Initialize new content
        $content = [
            'banner_section_heading' => 'Blog',
            'get_started_heading' => 'Get Started Today',
            'get_started_description' => 'Start your journey with us and unlock endless possibilities.',
            'get_started_button_text' => 'Join Now',
            'get_started_button_url' => 'order',
        ];

        // Create Blog page record
        $blog = CmsPage::create([
            'name' => 'Blog',
            'slug' => 'blog',
            'meta_title' => 'Blog - Remodeling Expert',
            'meta_description' => 'Welcome to Remodeling Expert',
            'content' => json_encode($content),
        ]);

        // Image paths and their media collection names
        $imagePaths = [
            'banner_image' => 'front/images/blog-banner.png',
            'get_started_today_image' => 'front/images/frames.png',
        ];

        // Attach media to collections
        foreach ($imagePaths as $collectionName => $relativePath) {
            $fullPath = public_path($relativePath);
            if (file_exists($fullPath)) {
                $blog->clearMediaCollection($collectionName);
                $blog->addMedia($fullPath)->toMediaCollection($collectionName);
            }
        }
    }
}
