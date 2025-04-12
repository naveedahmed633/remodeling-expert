<?php

namespace App\Providers;

use App\Models\CmsPage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pageData = [];
    
        $pageNames = ['Home','About', 'Contact', 'Feature', 'Services', 'Faqs', 'CompanyStatistic', 'Testimonial', 'Blog','Category','Product','Setting'];
    
        foreach ($pageNames as $pageName) {
            try {
                $page = CmsPage::where('name', $pageName)->first();
    
                if ($page) {
                    $pageData[$pageName] = $page; // Store the full model, not just the content
                }
            } catch (\Exception $e) {
                $pageData[$pageName] = null;
            }
        }
    
        View::share('pageData', $pageData);
    }
}
