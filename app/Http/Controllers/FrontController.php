<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ClassSchedule;
use App\Models\CmsPage;
use App\Models\StayInTouch;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\Tournament;
use App\Traits\PHPCustomMail;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class FrontController extends Controller
{
    use PHPCustomMail;

    public function index()
    {
        $services = Service::all();
        return view('front.index', compact('services'));
    }

    public function about()
    {
        $services = Service::all();
        return view('front.about', compact('services'));
    }
    public function project()
    {
        $services = Service::all();
        return view('front.projects', compact('services'));
    }

    public function services()
    {
        $services = Service::all();
        return view('front.services', compact('services'));
    }

    public function classicAndProfessional()
    {
        $services = Service::all();
        return view('front.classic', compact('services'));
    }

    public function blog()
    {
        $services = Service::all();
        $blogs = Blog::all();
        return view('front.blog', compact('blogs', 'services'));
    }

    public function contact()
    {
        $services = Service::all();
        return view('front.contact', compact('services'));
    }

    public function order()
    {
        $services = Service::all();
        return view('front.order', compact('services'));
    }

    public function store(Request $request)
    {
        $services = $request->input('services', []);

        $cleanedServices = array_map(function ($service) {
            return preg_replace('/\s+/', ' ', trim($service));
        }, $services);

        $validated = $request->validate([
            'name' => 'required|string|max:255',   
            'phone' => 'nullable|string|max:15',     
            'email' => 'required|email|max:255',   
            'message' => 'nullable|string|max:500',  
        ]);
        
         
        dd($cleanedServices);
    }
}
