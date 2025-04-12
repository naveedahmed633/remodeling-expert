<?php

namespace App\Http\Controllers;

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
        $events = Event::all();
        $testimonials = Testimonial::all();

        // Class schedules ko unique banayein
        $classSchedules = ClassSchedule::with('trainer', 'classType')->orderBy('start_time')->get();
        $times = DB::table('class_schedules')
            ->selectRaw('MIN(start_time) as min_time, MAX(end_time) as max_time')
            ->first();
        $minTime = $times->min_time;
        $maxTime = $times->max_time;

        $uniqueSchedules = $classSchedules->unique(function ($schedule) {
            return $schedule->trainer_id . '-' . $schedule->class_type_id . '-' . $schedule->day . '-' . $schedule->start_time . '-' . $schedule->end_time;
        });
        $uniqueSchedules = $uniqueSchedules->values(); // Reset array keys

        // Class types ko unique banayein
        $classTypes = ClassSchedule::with('classType')
            ->get()
            ->pluck('classType')
            ->unique('id');

        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        return view('front.index', compact('compData', 'compContent', 'services', 'testimonials', 'events', 'uniqueSchedules', 'classTypes'));
    }

    public function about()
    {
        $data = CmsPage::where('name', 'About')->first();
        $content = json_decode($data->content, true);

        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        $testimonials = Testimonial::all();
        return view('front.about', compact('testimonials', 'compData', 'compContent', 'data', 'content'));
    }

    public function contact()
    {
        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        $data = CmsPage::where('name', 'Contact')->first();
        $content = json_decode($data->content, true);

        return view('front.contact', compact('compData', 'compContent', 'data', 'content'));
    }

    public function events()
    {
        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        $data = CmsPage::where('name', 'Event')->first();
        $content = json_decode($data->content, true);

        $events = Event::all();
        $testimonials = Testimonial::all();

        return view('front.events', compact('compData', 'compContent', 'events', 'testimonials', 'data', 'content'));
    }

    public function leagues()
    {
        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        $data = CmsPage::where('name', 'League')->first();
        $content = json_decode($data->content, true);

        $testimonials = Testimonial::all();
        $tournaments = Tournament::all();

        return view('front.leagues-and-tournaments', compact('compData', 'compContent', 'tournaments', 'testimonials', 'data', 'content'));
    }

    public function personalTraining()
    {
        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        $data = CmsPage::where('name', 'Training')->first();
        $content = json_decode($data->content, true);

        $services = Service::all();
        $testimonials = Testimonial::all();

        return view('front.personal-training', compact('compData', 'compContent', 'services', 'testimonials', 'data', 'content'));
    }

    public function programs()
    {
        $compData = CmsPage::where('name', 'Home')->first();
        $compContent = json_decode($compData->content, true);

        $classSchedules = ClassSchedule::with('trainer', 'classType')->orderBy('start_time')->get();

        $uniqueSchedules = $classSchedules->unique(function ($schedule) {
            return $schedule->trainer_id . '-' . $schedule->class_type_id . '-' . $schedule->day . '-' . $schedule->start_time . '-' . $schedule->end_time;
        });
        $uniqueSchedules = $uniqueSchedules->values();
        $classTypes = ClassSchedule::with('classType')
            ->get()
            ->pluck('classType')
            ->unique('id');

        $data = CmsPage::where('name', 'Program')->first();
        $content = json_decode($data->content, true);

        $testimonials = Testimonial::all();
        return view('front.programs', compact('compData', 'compContent', 'uniqueSchedules', 'classSchedules', 'classTypes', 'testimonials', 'data', 'content'));
    }

    public function weightTraining($id)
    {
        $service = Service::where('id', $id)->first();
        return view('front.weight-training', compact('service'));
    }

    public function package()
    {
        return view('front.package');
    }

    public function subscribeNowSubmit(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:stay_in_touches,email|max:255',
        ]);

        $admin_email = 'testinfo@mailinator.com';
        $email = $request->email;

        $stay_in_touch = new StayInTouch();
        $stay_in_touch->email = $email;
        $stay_in_touch->save();

        $view = view('front.email.contact-message', compact(['email',]))->render();


        $data = [
            'from' => $email,
            'to' => $admin_email,
            'subject' => 'Subscribe',
            'body' => $view,
        ];
        // Send email to admin
        $data['to'] = $admin_email;
        $this->customMail($data['from'], $data['to'], $data['subject'], $data['body']);
        return redirect()->back()->with('success', 'Your Request  has been Sent');
    }

    public function adultTraining()
    {
        return view('front.adult-training-plan');
    }

    public function youthTraining()
    {
        return view('front.youth-training-plan');
    }
    public function getInTouch()
    {
        $data = CmsPage::where('name', 'Get_In_Touch')->first();
        $content = json_decode($data->content);
        
        return view('front.get-in-touch',compact('data', 'content'));
    }
}
