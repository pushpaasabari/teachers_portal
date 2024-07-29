<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;


class TeachersController extends Controller
{
    public function dashboard()
    {
        if (Session::has('teachers_sess_id')) {
            $studentData = DB::table('student')->select('*')->get();
            return view('dashboard', compact('studentData'));
        } else {
            return view('login');
        }
    }

    public function teachers_login()
    {
        return view('login');
    }

    function logout()
    {
        if (Session::has('teachers_sess_id')) {
            Session::pull('teachers_sess_id');
            Session::flush();
            return redirect('login');
        }
        return redirect('login');
    }


    public function teachers_login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pwd' => 'required'
        ]);

        $user = DB::table('teachers_basic')->where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->pwd, $user->pwd)) {
                $sess_array = [
                    'teachers_sess_id' => $user->id,
                    'teachers_sess_name' => $user->name,
                    'teachers_sess_email' => $user->email,
                    'loggedin' => 'UserLoggedIn'
                ];
                $request->session()->put($sess_array);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not match!');
            }
        } else {
            return back()->with('fail', 'This email is not register.');
        }
    }
}
