<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Home page data
        CmsPage::where('name', 'Event')->delete();

        // Initialize new content
        $content = [
            'main_heading' => 'main_heading',
        ];

        // Home page data
        $data = [
            'name' => 'Event',
            'slug' => 'events',
            'meta_title' => 'Events & Tournaments - Pnp Gym',
            'meta_description' => 'Welcome to Pnp Gym',
            'content' => json_encode($content),
        ];

        // Create Home page
        $event = CmsPage::create($data);

         // Add images to media collection
       $imagePaths = [
           'event_banner_img' => public_path('front/images/hero_1.jpg'),
       ];

       foreach ($imagePaths as $key => $imagePath) {
           if (file_exists($imagePath)) {
               $mediaName = 'event_banner_img' . ($key + 1); // hero_image_1, hero_image_2, hero_image_3
               $event->addMedia($imagePath)->toMediaCollection($mediaName);
           }
       }
   }
}
