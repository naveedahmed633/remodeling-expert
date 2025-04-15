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

        return view('front.index');
    }

    public function about()
    {
        return view('front.about');
    }
    public function project()
    {
        return view('front.projects');
    }

    public function services()
    {
        return view('front.services');
    }
}
