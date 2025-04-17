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
    public function adminLoginView()
    {
        return view('admin.auth.login');
    }
    public function adminLogin(Request $request)
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
      return view('admin.pages.dashboard');
    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
