<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ClassSchedule;
use App\Models\CmsPage;
use App\Models\Order;
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

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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
        session()->forget([
            'selected_services_data',
            'selected_subservices_data',
            'remodel_type',
            'selected_subchildservices_data'
        ]);

        $serviceCategories = Service::get();
        $data = CmsPage::where('name', 'Step Form')->first();
        $content = $data ? json_decode($data->content, true) : [];
        $services = Service::all();

        $remodelTypes = RemodelType::all();
        $subServicesData = SubserviceCategory::all();

        return view('front.order', compact(
            'services',
            'content',
            'data',
            'serviceCategories',
            'subServicesData',
            'remodelTypes'
        ));
    }

    public function storeSelectedServices(Request $request)
    {

        session()->put('selected_services_data', [
            'ids' => $request->services,
            'titles' => $request->service_titles,
        ]);

        $subcategories = ServiceCategory::whereIn('services_id', $request->services)->get();

        return response()->json([
            'status' => 'success',
            'subcategories' => $subcategories,
        ]);
    }

    public function storeSubcategories(Request $request)
    {
        $selectedSubIds = $request->subservices;

        session()->put('selected_subservices_data', [
            'ids' => $selectedSubIds,
            'titles' => $request->subTitles,
        ]);

        $subChildCategories = SubserviceCategory::whereIn('service_category_id', $selectedSubIds)->get();

        return response()->json([
            'status' => 'success',
            'subchildcategories' => $subChildCategories
        ]);
    }

    public function storeRemodelType(Request $request)
    {
        session()->put('remodel_type', $request->remodel_type);
        return response()->json(['status' => 'success']);
    }

    public function storeSubChildCategories(Request $request)
    {
        session()->put('selected_subchildservices_data', [
            'ids' => $request->subchildservices,
            'titles' => $request->subChildTiles,
        ]);

        return response()->json(['status' => 'success']);
    }

    public function orderDataForm(Request $request)
    {
        $services = session('selected_services_data');
        $subcategories = session('selected_subservices_data');
        $remodelType = session('remodel_type');
        $subchild = session('selected_subchildservices_data');

        $data = [
            $services, $subcategories, $remodelType, $subchild
        ];

        Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
            'services' => json_encode($data),
        ]);


        // Format email content
        $emailData = [
            'name' => $request->name,
            'email' => $request->email,
            'services' => $services,
            'subcategories' => $subcategories,
            'remodelType' => $remodelType,
            'subchild' => $subchild
        ];

        // Send email using Mailable class
        // Mail::to($request->email)->send(new \App\Mail\OrderSummaryMail($emailData));

        // Clear session after submission (optional)
        session()->forget([
            'selected_services_data',
            'selected_subservices_data',
            'remodel_type',
            'selected_subchildservices_data'
        ]);


        return redirect()->route('index')->with('success','Order Placed Successfully');
    }
}
