<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Http\Requests\StoreSyllabusRequest;
use App\Http\Requests\UpdateSyllabusRequest;
use App\Models\Classes;
use App\Models\Degree;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user) {
            if ($user->role_assign == "Teacher") {
                $teacherSubjects = unserialize($user->teacher_professional_field);
                $allsyllabus = Syllabus::whereIn('class', $teacherSubjects)->get();
            } else {
                $allsyllabus = Syllabus::all();
            }
        } else {
            $allsyllabus = Syllabus::where('added_from', session()->get('user_added'))->latest()->get();
        }
        return view('Syllabus.view', compact("allsyllabus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allclasses = User::where('enter_type', 1)->get();
        $array_subjects = [];
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user->role_assign == "Admin") {
            $allteacher = User::where('enter_type', 3)->latest()->get();
            $alldegree = Degree::where('degree_status', 1)->latest()->get();
            foreach ($allclasses as $class) {
                if ($class->student_total_subjects) {
                    $unser = unserialize($class->student_total_subjects);
                    if (is_array($unser)) {
                        foreach ($unser as $subject) {
                            $array_subjects[] = $subject;
                        }
                    }
                }
            }
        } else if ($user->role_assign == "Teacher") {
            $allteacher = User::where('id', session()->get('user_added'))->get();
            $array_subjects = unserialize($user->teacher_professional_field);
            $allgetdegrees = unserialize($user->class);
            $getting_degrees = [];
            foreach ($allgetdegrees as $getdegrees) {
                $alldegree = Degree::where('id', $getdegrees)->first();
                if ($alldegree) {
                    $getting_degrees[] = $alldegree;
                }
            }
            $alldegree = $getting_degrees;
        }
        $array_subjects = array_unique($array_subjects);
        $compact = compact('alldegree', 'array_subjects', 'allteacher');
        return view('Syllabus.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "upload_image" => 'mimes:jpeg,jpg,png,gif|required',
        ]);
        $input = $request->all();
        if ($request->hasfile("upload_image")) {
            $file = $request->file('upload_image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            $file->move('admin/assets/images/syllabus/', $filename);
            $msg = 200;
        }
        if ($msg == 200) {
            $input['upload_image'] = $filename;
            $input['added_from'] = $request->instructor;
            Syllabus::create($input);
            return response()->json([
                "message" => 200,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $allclasses = User::where('enter_type', 1)->get();
        $array_subjects = [];
        $user = User::where('id', session()->get('user_added'))->first();
        if ($user->role_assign == "Admin") {
            $allteacher = User::where('enter_type', 3)->latest()->get();
            $alldegree = Degree::where('degree_status', 1)->latest()->get();
            foreach ($allclasses as $class) {
                if ($class->student_total_subjects) {
                    $unser = unserialize($class->student_total_subjects);
                    if (is_array($unser)) {
                        foreach ($unser as $subject) {
                            $array_subjects[] = $subject;
                        }
                    }
                }
            }
        } else if ($user->role_assign == "Teacher") {
            $allteacher = User::where('id', session()->get('user_added'))->get();
            $array_subjects = unserialize($user->teacher_professional_field);
            $allgetdegrees = unserialize($user->class);
            $getting_degrees = [];
            foreach ($allgetdegrees as $getdegrees) {
                $alldegree = Degree::where('id', $getdegrees)->first();
                if ($alldegree) {
                    $getting_degrees[] = $alldegree;
                }
            }
            $alldegree = $getting_degrees;
        }
        $array_subjects = array_unique($array_subjects);
        $syllabus = Syllabus::find($id);
        $compact = compact('alldegree', 'array_subjects', 'syllabus', 'allteacher');
        return view('Syllabus.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "upload_image" => 'mimes:jpeg,jpg,png,gif|required',
        ]);
        $syllabus = Syllabus::where('id', $id)->first();
        $input = $request->all();
        if ($request->hasfile("upload_image")) {
            $file = $request->file('upload_image');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            File::delete('admin/assets/images/syllabus/' . $syllabus->upload_image);
            $file->move('admin/assets/images/syllabus/', $filename);
            $input['upload_image'] = $filename;
            $input['added_from'] = $request->instructor;
            $syllabus->update($input);
            return response()->json([
                "message" => 200,
            ]);
        } else {
            $input['upload_image'] = $syllabus->upload_image;
            $input['added_from'] = $request->instructor;
            $syllabus->update($input);
            return response()->json([
                "message" => 200,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::find($id);
        if (File::delete('admin/assets/images/syllabus/' . $syllabus->upload_image)) {
            Syllabus::find($id)->delete();
            return response()->json([
                "message" => 200,
            ]);
        }
    }
}
