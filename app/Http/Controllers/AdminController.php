<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\CmsPage;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function adminLoginView()
    {
        return view('admin.auth.login');
    }
    function adminLogin(Request $request)
    {

        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on admins table'
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard')->with('success', 'Login Successful');
            } else {
                return redirect()->back()->with('error', 'Role not authorized');
            }
        } else {
            return redirect()->back()->with('error', 'Email and password are wrong');
        }
    }

    public function dashboard()
    {
        $services = Service::all();

        // Class schedules ko unique banayein
        $classSchedules = ClassSchedule::with('trainer', 'classType')->get();
        $uniqueSchedules = $classSchedules->unique(function ($schedule) {
            return $schedule->trainer_id . '-' . $schedule->class_type_id . '-' . $schedule->day . '-' . $schedule->start_time . '-' . $schedule->end_time;
        });
        $uniqueSchedules = $uniqueSchedules->values(); // Reset array keys
        return view('admin.pages.dashboard',compact('services','uniqueSchedules'));
    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function settingCreate()
    {
        $data = CmsPage::where('name','Setting')->first();
        if ($data){
            $content = json_decode($data->content);
        }
        return view('admin.pages.setting',compact('data','content'));
    }
    public function profile()
    {
        $user = Auth::user();
//        dd($user->getFirstMediaUrl('admin_profile'));
        return view('admin.pages.profile',compact('user'));
    }
    public function userProfileUpdate(Request $request)
    {
        $user_id = $request->admin_id;
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

//        $user->first_name = $request->first_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        $user->update();

        if ($request->hasFile('admin_profile')) {
            $user->clearMediaCollection('admin_profile');
            $user->addMediaFromRequest('admin_profile')->toMediaCollection('admin_profile');
        }
        return redirect()->back()->with('success','Admin Profile Updated');
    }
}
