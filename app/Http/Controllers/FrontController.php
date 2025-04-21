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
use App\Models\RemodelType;
use App\Models\ServiceCategory;
use App\Models\SubserviceCategory;
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
        $data = CmsPage::where('name', 'About')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();
        return view('front.about', compact('services', 'content', 'data'));
    }
    public function project()
    {
        $data = CmsPage::where('name', 'Project')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $projects = Project::all();
        $services = Service::all();
        return view('front.projects', compact('services', 'projects', 'content', 'data'));
    }

    public function services()
    {
        $data = CmsPage::where('name', 'Service')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();
        return view('front.services', compact('services', 'content', 'data'));
    }

    public function blog()
    {
        $data = CmsPage::where('name', 'BLog')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();
        $blogs = Blog::all();
        return view('front.blog', compact('blogs', 'services', 'content', 'data'));
    }

    public function contact()
    {
        $data = CmsPage::where('name', 'Contact')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();
        return view('front.contact', compact('services', 'content', 'data'));
    }

    public function order()
    {
        $servicesForm = ServiceCategory::with('subServices.remodelTypes')->get();
        $data = CmsPage::where('name', 'Step Form')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();
    
        $remodelTypes = RemodelType::all();
        $subServicesData = SubserviceCategory::all();
    
        return view('front.order', compact(
            'services',
            'content',
            'data',
            'servicesForm',
            'subServicesData',
            'remodelTypes'
        ));
    }
}
