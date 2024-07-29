<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function create(Request $request)
    {
        // print_r($request()->post());
        // exit();
        if (Session::has('teachers_sess_id')) {

            $request->validate([
                'student_name' => 'required',
                'subject' => 'required',
                'mark' => 'required'
            ]);

            $student_name = $request->student_name;
            $subject = $request->subject;
            $mark = $request->mark;

            $student_check = DB::table('student')
                ->where('name', '=', $student_name)
                ->where('subject', '=', $subject)
                ->get();

            if (count($student_check) == 1) {
                $up = DB::table('student')->where('name', $student_name)
                    ->where('subject', $subject)
                    ->update(['mark' => $mark, 'updated_at' => Carbon::now()]);
                if ($up == true) {
                    return redirect()->back()->with('success', $student_name . ' Successfully Updated!');
                } else {
                    return redirect()->back()->with('Error', $student_name . ' Something went wrong!');
                }
            } else {
                $add = DB::table('student')->insert([
                    'name' => $request->student_name,
                    'subject' => $request->subject,
                    'mark' => $request->mark,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                if ($add == true) {
                    return redirect()->back()->with('success', $student_name . ' Successfully Created!');
                } else {
                    return redirect()->back()->with('Error', $student_name . ' Something went wrong!');
                }
            }
        } else {
            return view('login');
        }
    }
    public function get_student(Request $request)
    {
        $get_student_ajax['student'] = DB::table('student')
            ->where("id", $request->id)
            ->get()
            ->first();
        return response()->json($get_student_ajax);
    }
    public function student_post(Request $request)
    {
        // print_r($request->student_name_edit);
        // exit();
        $request->validate([
            'stud_id' => 'required',
            'student_name_edit' => 'required',
            'subject_edit' => 'required',
            'mark_edit' => 'required'
        ]);

        $edit = DB::table('student')->where('id', $request->stud_id)
            ->update([
                'name' => $request->student_name_edit,
                'subject' => $request->subject_edit,
                'mark' => $request->mark_edit,
                'updated_at' => Carbon::now()
            ]);
        if ($edit == true) {
            return redirect()->back()->with('success', $request->student_name_edit . ' Successfully Updated!');
        } else {
            return redirect()->back()->with('Error', $request->student_name_edit . ' Something went wrong!');
        }

    }

    function student_del($id, $student_name, $subject)
    {
        $del = DB::table('student')
            ->where('id', $id)
            ->where('name', $student_name)
            ->where('subject', $subject)
            ->delete();
        if ($del == true) {
            return redirect()->back()->with('success', $student_name . ' Successfully Deleted!');
        } else {
            return redirect()->back()->with('Error', $student_name . ' Something went wrong!');
        }

    }

    public function result()
    {
        return view('result');
    }


}

