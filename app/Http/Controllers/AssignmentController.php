<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Syllabus;
use App\Models\Classes;
use App\Models\Degree;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
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
                $allassignments = Assignment::whereIn('class', $teacherSubjects)->get();
            } else {
                $allassignments = Assignment::all();
            }
        } else {
            $allassignments = Assignment::where('added_from', session()->get('user_added'))->latest()->get();
        }
        return view('Assignments.view', compact("allassignments"));
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
        $compact = compact('alldegree', 'array_subjects', "allteacher");
        return view('Assignments.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'upload_file' => 'required|mimes:pdf,xlsx,xls',
        ]);
        $input = $request->all();
        if ($request->hasfile("upload_file")) {
            $file = $request->file('upload_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . strtolower($extension);
            $file->move('admin/assets/images/assignment/', $filename);
            $msg = 200;
        }
        if ($msg == 200) {
            $input['upload_file'] = $filename;
            $input['added_from'] = $request->instructor;
            Assignment::create($input);
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
        $assignment = Assignment::find($id);
        $compact = compact('alldegree', 'array_subjects', 'assignment', 'allteacher');
        return view('Assignments.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $syllabus = Assignment::where('id', $id)->first();
        $input = $request->all();
        if ($request->hasfile("upload_file")) {
            $file = $request->file('upload_file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . strtolower($extension);
            File::delete('admin/assets/images/assignment/' . $syllabus->upload_file);
            $file->move('admin/assets/images/assignment/', $filename);
            $input['upload_file'] = $filename;
            $input['added_from'] = $request->instructor;
            $syllabus->update($input);
            return response()->json([
                "message" => 200,
            ]);
        } else {
            $input['upload_file'] = $syllabus->upload_file;
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
        $syllabus = Assignment::find($id);
        if (File::delete('admin/assets/images/assignment/' . $syllabus->upload_file)) {
            Assignment::find($id)->delete();
            return response()->json([
                "message" => 200,
            ]);
        }
    }
    public function download($file)
    {
        $directory = 'admin/assets/images/assignment';
        $filePath = public_path($directory . '/' . $file);
        if (File::exists($filePath)) {
            $originalName = pathinfo($file, PATHINFO_FILENAME);
            $mimeType = File::mimeType($filePath);
            return response()->file($filePath, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . $originalName . '"',
            ]);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}