<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Home page data
        CmsPage::where('name', 'Program')->delete();

        // Initialize new content
        $content = [
            'main_heading' => 'main_heading',
        ];

        // Home page data
        $data = [
            'name' => 'Program',
            'slug' => 'program',
            'meta_title' => 'Program - Pnp Gym',
            'meta_description' => 'Welcome to Pnp Gym',
            'content' => json_encode($content),
        ];

        // Create Home page
        $program = CmsPage::create($data);

         // Add images to media collection
       $imagePaths = [
           'program_banner_img' => public_path('front/images/hero_1.jpg'),
       ];

       foreach ($imagePaths as $key => $imagePath) {
           if (file_exists($imagePath)) {
               $mediaName = 'program_banner_img' . ($key + 1); // hero_image_1, hero_image_2, hero_image_3
               $program->addMedia($imagePath)->toMediaCollection($mediaName);
           }
       }
   }
}
