<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Degree;
use App\Models\Leave;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allstudent = User::where('enter_type', 1)->get();
        $program_array = [];
        foreach ($allstudent as $student) {
            $program = Program::where('id', $student->program)->first();
            $program_array[$student->id] = $program->program_name;
        }
        return view('User.Student.view', compact("allstudent", "program_array"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $allclasses = Classes::where('classes_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $query = User::where('enter_type', 1)->get();
        $reg_no = 0;
        foreach ($query as $q) {
            $reg_no = $q->registeration_no;
        }
        $registeration_no = $reg_no + 1;
        $compact = compact('alldegree', 'allclasses', "registeration_no");
        return view('User.Student.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "unique:users,email",
        ]);
        $input = $request->all();
        if ($request->hasfile("teacher_picture")) {
            $file = $request->file('teacher_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            $file->move('admin/assets/images/instructors/', $filename);
            $msg = 200;
        }
        if ($msg == 200) {
            $input['teacher_picture'] = $filename;
            $input['enter_type'] = 1;
            $input['is_active'] = 1;
            $input['password'] = Hash::make("thenestacademy");
            $input['role_assign'] = "Student";
            $array_stds = [];
            $no = 0;
            foreach (explode(",", $request->student_total_subjects) as $subject) {
                $array_stds[$request->name . "_" . $no] = $subject;
                $no++;
            }
            $input['student_total_subjects'] = serialize($array_stds);
            $input['fees_paid_status'] = 0;
            $input['added_from'] = session()->get('user_added');
            $input['email_verified_at'] = now();
            $input['is_email_verified'] = 1;
            User::create($input);
            return response()->json([
                "message" => "student",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $degree = Degree::where('id', $user->degree)->first();
        $program = Program::where('id', $user->program)->first();
        $class = Classes::where('id', $user->class)->first();
        return response()->json([
            "message" => $user,
            "degree" => $degree,
            "program" => $program,
            "class" => $class,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $allclasses = Classes::where('classes_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $query = User::where('enter_type', 2)->get();
        $get_user = User::find($id);
        $compact = compact('alldegree', 'allclasses', 'get_user');
        return view('User.Student.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            "email" => "unique:users,email,$id",
        ]);
        $input = $request->all();
        if ($request->hasfile("teacher_picture")) {
            $file = $request->file('teacher_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            File::delete('admin/assets/images/instructors/' . $user->teacher_picture);
            $file->move('admin/assets/images/instructors/', $filename);
            $input['teacher_picture'] = $filename;
            $input['enter_type'] = $user->enter_type;
            $input['is_active'] = $user->is_active;
            $input['password'] = $user->password;
            $input['role_assign'] = $user->role_assign;
            $input['added_from'] = session()->get('user_added');
            $input['email_verified_at'] = $user->email_verified_at;
            $input['is_email_verified'] = $user->is_email_verified;
            $array_stds = [];
            $no = 0;
            foreach (explode(",", $request->student_total_subjects) as $subject) {
                $array_stds[$request->name . "_" . $no] = $subject;
                $no++;
            }
            $input['student_total_subjects'] = serialize($array_stds);
            $user->update($input);
            return response()->json([
                "message" => "student",
            ]);
        } else {
            $input['teacher_picture'] = $user->teacher_picture;
            $input['enter_type'] = $user->enter_type;
            $input['is_active'] = $user->is_active;
            $input['password'] = $user->password;
            $input['role_assign'] = $user->role_assign;
            $input['added_from'] = session()->get('user_added');
            $input['email_verified_at'] = $user->email_verified_at;
            $input['is_email_verified'] = $user->is_email_verified;
            $array_stds = [];
            $no = 0;
            foreach (explode(",", $request->student_total_subjects) as $subject) {
                $array_stds[$request->name . "_" . $no] = $subject;
                $no++;
            }
            $input['student_total_subjects'] = serialize($array_stds);
            $user->update($input);
            return response()->json([
                "message" => "student",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function addStudent(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return response()->json(['error' => 'exist'], 200);
        } else {
            $query = User::where('enter_type', 1)->get();
            $reg_no = 0;
            foreach ($query as $q) {
                $reg_no = $q->registeration_no;
            }
            $registeration_no = $reg_no + 1;
            try {
                User::create([
                    "registeration_no" => $registeration_no,
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "emial_verified_at" => now(),
                    "enter_type" => 1,
                    "is_active" => 0,
                ]);
                return response()->json(['success' => "insert"], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }
    }
    public function active_students()
    {
        $allstudent = User::where('enter_type', 1)->where('is_active', 1)->get();
        $program_array = [];
        foreach ($allstudent as $student) {
            $program = Program::where('id', $student->program)->first();
            $program_array[$student->id] = $program->program_name;
        }
        return view('User.Student.active', compact("allstudent", "program_array"));
    }
    public function students_leave()
    {
        $allleave = Leave::where('added_from', session()->get('user_added'))->get();
        $array_student = [];
        foreach ($allleave as $leave) {
            $student = User::where('id', $leave->student_id)->first();
            $array_student[$leave->id] = $student;
        }
        return view('User.Student.leave', compact("allleave", "array_student"));
    }
    public function leave_add()
    {
        $allstudent = User::where('enter_type', 1)->get();
        $array_class = [];
        foreach ($allstudent as $student) {
            $class = Classes::where('id', $student->class)->first();
            $array_class[$student->id] = $class;
        }
        return view('User.Student.add_leave', compact("allstudent", "array_class"));
    }
    public function add_leave(Request $request)
    {
        Leave::create([
            "student_id" => $request->student_id,
            "from_date" => $request->from_date,
            "to_date" => $request->to_date,
            "leave_type" => $request->leave_type,
            "status" => $request->status,
            "reason" => $request->reason,
            "added_from" => session()->get('user_added'),
        ]);
        return response()->json(
            [
                "message" => 200,
            ]
        );
    }
}
