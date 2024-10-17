<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

use App\Models\{Attendance, Campaign, Classes, Contact, Conversation, Courses, Customer, Degree, Email_Campaign, Fee, Group, Plan, Program, Report, Teacher_Salary, User};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function signin()
    {
        if (session()->has('user_added')) {
            return redirect('/dashboard');
        } else {
            return view('authentication.signin');
        }
    }
    public function signup()
    {
        return view('authentication.signup');
    }
    public function logout()
    {
        if (session()->has('user_added')) {
            session()->forget('user_added');
            return view('authentication.logout');
        } else {
            return redirect('/');
        }
    }
    public function otp()
    {
        if (session('admin_check') != '') {
            return view('authentication.otp');
        } else {
            return redirect('/')->with('error', 'Please Enter The Credentials First..!');
        }
    }
    public function forget()
    {
        return view('authentication.forget');
    }
    public function reset()
    {
        return view('authentication.reset');
    }
    public function offline()
    {
        return view('authentication.offline');
    }
    public function dashboard()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        $studentstotal = User::where('enter_type', 1)->get();
        $totalquery = User::where('enter_type', 2)->count();
        $totalstudent = User::where('enter_type', 1)->count();
        $allclasses = Classes::where('added_from', session()->get('user_added'))->count();
        $currentYear = Carbon::now()->year;
        $totalStudentsThisYear = User::where('enter_type', 1)
            ->whereYear('created_at', $currentYear)
            ->count();
        $totalstaff = User::where('enter_type', 3)->orwhere('enter_type', 4)->count();
        $totalteacher = User::where('enter_type', 3)->count();
        $malestaff = User::where('enter_type', 3)->where('gender', 'Male')->count();
        $femalestaff = User::where('enter_type', 3)->where('gender', 'Female')->count();
        $malestudent = User::where('enter_type', 1)->where('gender', 'Male')->whereYear('created_at', $currentYear)
            ->count();
        $femalestudent = User::where('enter_type', 1)->where('gender', 'Female')->whereYear('created_at', $currentYear)
            ->count();
        $allprogram = Program::where('added_from', session()->get('user_added'))->get();
        $array_programs = [];
        foreach ($allprogram as $program) {
            $array_programs[ucfirst($program->program_name)] = User::where('enter_type', 1)->where('program', $program->id)->count();
        }
        $array_gender = ["Male" => User::where('enter_type', 1)->where('gender', "Male")->count(), "Female" => User::where('enter_type', 1)->where('gender', "Female")->count()];
        $totalcontact = Contact::all()->count();
        $allcourses = Courses::where('added_from', session()->get('user_added'))->skip(0)->take(5)->get();
        $fee_series = array();
        for ($j = 1; $j <= 12; $j++) {
            $fee = Fee::whereYear('created_at', date('Y'))->whereMonth('created_at', $j)->where('fee_status', 'Paid')->count();
            $fee_series[] = $fee;
        }
        if ($user->enter_type == 3) {
            $unserializeclass = unserialize($user->class);
            $unserializeprogram = unserialize($user->program);
            $array_class = [];
            foreach ($unserializeclass as $unsercla) {
                $course = Degree::findOrFail($unsercla);
                $array_class[$unsercla] = $course->degree_name;
            }
            $array_program = [];
            foreach ($unserializeprogram as $unserpro) {
                $program = Program::findOrFail($unserpro);
                $array_program[$unserpro] = $program->program_name;
            }
            return view('Pages.dashboard', compact("user", "totalquery", "totalstudent", "totalteacher", "malestaff", "femalestaff", "malestudent", "femalestudent", "totalstaff", "totalcontact", "allcourses", "fee_series", "totalStudentsThisYear", "allclasses", "studentstotal", "array_gender", "array_class", "array_programs", "array_program"));
        } else {
            return view('Pages.dashboard', compact("user", "totalquery", "totalstudent", "totalteacher", "malestaff", "femalestaff", "malestudent", "femalestudent", "totalstaff", "totalcontact", "allcourses", "fee_series", "totalStudentsThisYear", "allclasses", "studentstotal", "array_programs", "array_gender"));
        }
    }
    public function student_dashboard()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        return view('Pages.student_dashboard', compact("user"));
    }
    public function teacher_dashboard()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        $currentMonth = Carbon::now()->format('F');
        if ($user->enter_type == 3) {
            $salary =Teacher_Salary::where('teacher_id',$user->id)->where('month',$currentMonth)->first();
            $unserializeclass = unserialize($user->class);
            $unserializeprogram = unserialize($user->program);
            $array_class = [];
            foreach ($unserializeclass as $unsercla) {
                $course = Degree::findOrFail($unsercla);
                $array_class[$unsercla] = $course->degree_name;
            }
            $array_program = [];
            foreach ($unserializeprogram as $unserpro) {
                $program = Program::findOrFail($unserpro);
                $array_program[$unserpro] = $program->program_name;
            }
            return view('Pages.teacher_dashboard', compact("user", "array_class", "array_program","salary"));
        } else {
            return view('Pages.teacher_dashboard', compact("user"));
        }
    }
    public function profile()
    {
        $user = DB::table('users')->where("id", session()->get('user_added'))->first();
        return view('Pages.profile', compact("user"));
    }
    public function getGmailPage()
    {
        return view('authentication.gmail');
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            "message" => 200,
        ]);
    }
}
