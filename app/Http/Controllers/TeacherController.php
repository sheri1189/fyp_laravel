<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allteacher = User::where('enter_type', 3)->get();
        return view('User.Teacher.view', compact("allteacher"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allprogram = Program::where('added_from', session()->get('user_added'))->where('program_status', 1)->latest()->get();
        $alldegree = Degree::where('degree_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $teacher = User::where('enter_type', 3)->get();
        $reg_no = 0;
        foreach ($teacher as $t) {
            $reg_no = $t->registeration_no;
        }
        $registeration_no = $reg_no + 1;
        $compact = compact("registeration_no", "allprogram", "alldegree");
        return view('User.Teacher.add')->with($compact);
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
            $input['enter_type'] = 3;
            $input['added_from'] = session()->get('user_added');
            $input['teacher_professional_field'] = serialize(explode(",", $request->teacher_professional_field));
            $input['program'] = serialize($request->program);
            $input['class'] = serialize($request->class);
            $input['is_active'] = 1;
            $input['role_assign'] = "Teacher";
            $input['password'] = Hash::make("thenestacademy");;
            $input['email_verified_at'] = now();
            $input['is_email_verified'] = 1;
            User::create($input);
            return response()->json([
                "message" => "teacher",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            "message" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $allprogram = Program::where('added_from', session()->get('user_added'))->where('program_status', 1)->latest()->get();
        $alldegree = Degree::where('degree_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        $get_user = User::find($id);
        $selectedDegrees = unserialize($get_user->degree);
        $selectedClasses = unserialize($get_user->class);
        $compact = compact('get_user', "allprogram", "alldegree", "selectedDegrees", "selectedClasses");
        return view('User.Teacher.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $request->validate(
            [
                "emial" => "unique:users,email,$id",
            ]
        );
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
            $input['teacher_professional_field'] = $user->teacher_professional_field;
            $input['program'] = $user->program;
            $input['class'] = $user->class;
            $input['password'] = $user->password;
            $input['role_assign'] = $user->role_assign;
            $input['email_verified_at'] = $user->email_verified_at;
            $input['is_email_verified'] = $user->is_email_verified;
            $input['added_from'] = session()->get('user_added');
            $user->update($input);
            return response()->json([
                "message" => "teacher",
            ]);
        } else {
            $input['teacher_picture'] = $user->teacher_picture;
            $input['enter_type'] = $user->enter_type;
            $input['is_active'] = $user->is_active;
            $input['role_assign'] = $user->role_assign;
            $input['password'] = $user->password;
            $input['teacher_professional_field'] = serialize(explode(",", $request->teacher_professional_field));
            $input['program'] = serialize($request->program);
            $input['class'] = serialize($request->class);
            $input['added_from'] = session()->get('user_added');
            $input['email_verified_at'] = $user->email_verified_at;
            $user->update($input);
            return response()->json([
                "message" => "teacher",
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
    public function getAllInstructors()
    {
        try {
            $latestCourses = User::where('enter_type', 3)->get();
            $array_skills = [];
            foreach ($latestCourses as $courses) {
                $unser = unserialize($courses->teacher_professional_field);
                $no = 1;
                foreach ($unser as $un) {
                    $array_skills[$courses->name . "_" . $no] = $un;
                    $no++;
                }
            }
            return response()->json(['message' => $latestCourses, "array_skills" => $array_skills], 200);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong. Please check the server logs for more information.'], 500);
        }
    }
    public function getInstructorDetails($id)
    {
        try {
            $instructorDetail = User::where('id', $id)->first();
            $unser = unserialize($instructorDetail->teacher_professional_field);
            $array_skills = [];
            $no = 1;
            foreach ($unser as $un) {
                $array_skills[$instructorDetail->name . "_" . $no] = $un;
                $no++;
            }
            return response()->json(['message' => $instructorDetail, "array_skills" => $array_skills], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
