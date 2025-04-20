<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ClassSchedule;
use App\Models\CmsPage;
use App\Models\StayInTouch;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\Project;
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
        $data = CmsPage::where('name', 'Home')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();
        $projects = Project::all();
        return view('front.index', compact('services', 'projects', 'content', 'data'));
    }

    public function about()
    {
        $services = Service::all();
        return view('front.about', compact('services'));
    }
    public function project()
    {
        $projects = Project::all();
        $services = Service::all();
        return view('front.projects', compact('services', 'projects'));
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
}
