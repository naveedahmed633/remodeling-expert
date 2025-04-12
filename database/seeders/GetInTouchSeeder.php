<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class getInTouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete existing Home page data
        CmsPage::where('name', 'Get_In_Touch')->delete();

        // Initialize new content
        $content = [
            'main_heading' => 'main_heading',
            'form_heading' => 'form_heading',
            'form_discription' => 'form_discription',
            'form_btn_text' => 'form_btn_text',
        ];

        // Home page data
        $data = [
            'name' => 'Get_In_Touch',
            'slug' => 'get_in_touch',
            'meta_title' => 'Get In Touch - Pnp Gym',
            'meta_description' => 'Welcome to Pnp Gym',
            'content' => json_encode($content),
        ];

        // Create Home page
        $get_in_touch_banner_img = CmsPage::create($data);

         // Add images to media collection
       $imagePaths = [
           'get_in_touch_banner_img' => public_path('front/images/hero_1.jpg'),
       ];

       foreach ($imagePaths as $key => $imagePath) {
           if (file_exists($imagePath)) {
               $mediaName = 'get_in_touch_banner_img' . ($key + 1); 
               $get_in_touch_banner_img->addMedia($imagePath)->toMediaCollection($mediaName);
           }
       }
   }
}
