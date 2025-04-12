<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'main_heading_red' => 'Welcome to',
            'main_heading_rest' => 'Our Website',
            'hero_highlighted_text' => 'Strength in Body',
            'hero_remaining_heading' => 'and Spirit',
            'heading' => 'heading',
            
            // Hero Section 1
            'hero_heading_1' => 'Strength in Body',
            'hero_description_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque libero arcu, tempor ut elementum id, tincidunt vel quam.',
            'hero_button_text_1' => 'Learn More',

            // Hero Section 2
            'hero_heading_2' => 'Transform Your Mind',
            'hero_description_2' => 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras justo odio, dapibus ac facilisis in.',
            'hero_button_text_2' => 'Get Started',

            // Hero Section 3
            'hero_heading_3' => 'Build Your Strength',
            'hero_description_3' => 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
            'hero_button_text_3' => 'Join Now',

            // Define content for the Benefits section
            'small_heading' => 'Why Choose Us?',
            'benefit_heading' => 'Unlock Your Full Potential',
            'description' => 'We provide everything you need to achieve your fitness goals, including expert trainers, modern equipment, and personalized plans.',
            'counter_1' => '10+ Years of Experience',
            'counter_2' => '500+ Happy Clients',
            'counter_3' => '100+ Programs',
            'button_text' => 'Learn More',

            // Define content for the Training Prices section
            'training_small_heading' => 'Our Training Plans',
            'training_heading' => 'Affordable Prices for Every Goal',

            // Define content for the sports_motivation section
            'sports_motivation_small_heading' => 'Stay Motivated',
            'sports_motivation_heading' => 'Push Your Limits',
            'sports_motivation_description' => 'Embrace the challenge, conquer your goals, and unleash your true potential with every workout.',
            'sports_motivation_button_text' => 'Join Now',

            // Define content for the classes_schedule section
            'classes_schedule_small_heading' => 'Our Timetable',
            'classes_schedule_heading' => 'Choose Your Class',
        ];

        // Home page data
        $data = [
            'name' => 'Home',
            'slug' => 'home',
            'meta_title' => 'Home - Pnp Gym',
            'meta_description' => 'Welcome to Pnp Gym',
            'content' => json_encode($content),
        ];

        // Create Home page
        $home = CmsPage::create($data);

        // Add images to media collection
        $imagePaths = [
            'hero_image_1' => public_path('front/images/hero_1.jpg'),
            'hero_image_2' => public_path('front/images/hero_2.jpg'),
            'hero_image_3' => public_path('front/images/hero_3.jpg'),
            'benefits_image_png' => public_path('front/images/benefits_image.png'),
            'benefits_image_1' => public_path('front/images/benefits_image_1.jpg'),
            'benefits_image_2' => public_path('front/images/benefits_image_2.jpg'),
        ];

        foreach ($imagePaths as $key => $imagePath) {
            if (file_exists($imagePath)) {
                $mediaName = 'hero_image_' . ($key + 1); // hero_image_1, hero_image_2, hero_image_3
                $home->addMedia($imagePath)->toMediaCollection($mediaName);
            }
        }

        // Optionally: Add the logo if it's part of the media collection
        $logoPath = public_path('front/images/logo.png');
        if (file_exists($logoPath)) {
            $home->addMedia($logoPath)->toMediaCollection('logo');
        }
    }
}
