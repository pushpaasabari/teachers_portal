<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Carbon\Carbon;


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
    public function registration()
    {
        return view('registration');
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

    function registration_post(Request $request)
    {
        // print_r($request->email);
        // exit();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'pwd' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $pwd = Hash::make($request->pwd);
        // $user = TeachersController::create($data);
        $user = DB::table('teachers_basic')->insert([
            'name' => $name,
            'email' => $email,
            'pwd' => $pwd,
            'last_logged_in' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'status' => 1
        ]);

        if (!$user) {
            return redirect(url('registration'))->with("error", "Registration Failed,try again");
        }
        return redirect(url('login'))->with("success", "Registration success, Login to access the app");

    }
}
