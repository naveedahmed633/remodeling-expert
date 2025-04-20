<?php

namespace App\Providers;

use App\Models\CmsPage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        try {
            $pageNames = [
                'Home', 'About', 'Contact', 'Feature', 'Services', 
                'Faqs', 'CompanyStatistic', 'Testimonial', 'Blog', 
                'Category', 'Product', 'Setting'
            ];

            // Get all pages in one query
            $pages = CmsPage::whereIn('name', $pageNames)->get()->keyBy('name');

            // Fill missing pages with null
            $pageData = collect($pageNames)->mapWithKeys(function ($name) use ($pages) {
                return [$name => $pages->get($name)];
            })->toArray();

            View::share('pageData', $pageData);
        } catch (\Exception $e) {
            // In case of a major issue, fallback to empty pageData
            View::share('pageData', []);
        }
    }
}
