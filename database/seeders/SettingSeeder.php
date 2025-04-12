<?php

namespace Database\Seeders;

use App\Models\CmsPage;
use App\Models\CmsPages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        CmsPage::where('name','Setting')->delete();
        $content = [
            'name'=>'Setting',
            'slug'=>'setting',
            'logo'=>'front/images/logo.png',
            'favicon'=>'front/images/logo.png',
            'footer_logo'=>'front/images/logo.png',
            'meta_title' => 'Pnp Gym',
            'meta_description' => 'Pnp Gym',
            'content' => json_encode([
                'site_title'=>'Pnp Gym',
                'copy_right_content'=>'Copyright © 2024 All Rights Reserved.',
                'footer_description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.',
                'email'=>'info@yourmail.com',
                'phone_num'=>'+123 456 7890',
                'working_hours'=>'Mon-Fri: 8am – 4pm',
                'address'=>'12 Division st, New York, 34567',
                'news_letter_heading_red'=>'news_letter_heading_red',
                'news_letter_heading'=>'news_letter_heading',
                'subscribe_btn_text'=>'subscribe_btn_text',
                'youtube'=>'#',
                'linkid'=>'#',
                'twitter'=>'#',
                'instagram'=>'#',
                'facebook'=>'#',

            ])
        ];

        $data  = collect($content)->except([
            'logo',
            'favicon',
            'footer_logo',
        ])->all();
        $home = CmsPage::create($data);
        $home->clearMediaCollection('logo');
        $home->clearMediaCollection('favicon');
        $home->clearMediaCollection('footer_logo');


        $icon = public_path($content['logo']);
        if (file_exists($icon)) $home->copyMedia($icon)->toMediaCollection('logo');

        $favicon = public_path($content['favicon']);
        if (file_exists($favicon)) $home->copyMedia($favicon)->toMediaCollection('favicon');

        $footer_logo = public_path($content['footer_logo']);
        if (file_exists($footer_logo)) $home->copyMedia($footer_logo)->toMediaCollection('footer_logo');
    }

}
