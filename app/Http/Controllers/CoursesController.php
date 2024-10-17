<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Models\Degree;
use Illuminate\Support\Facades\File;
use App\Models\Program;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcourse = Courses::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allcourse");
        return view('Courses.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $compact = compact('alldegree');
        return view('Courses.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoursesRequest $request)
    {
        $input = $request->all();
        if ($request->hasfile("course_picture")) {
            $file = $request->file('course_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            $file->move('admin/assets/images/courses/', $filename);
            $msg = 200;
        }
        if ($msg == 200) {
            $input['course_picture'] = $filename;
            $input['course_title'] = strtolower($request->course_title);
            $input['added_from'] = session()->get('user_added');
            $input['course_status'] = 1;
            Courses::create($input);
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
        $courses = Courses::where('id', $id)->first();
        if ($courses->course_status == 1) {
            Courses::where('id', $courses->id)->update([
                "course_status" => 2,
            ]);
        } else {
            Courses::where('id', $courses->id)->update([
                "course_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $courses,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courses = Courses::where('id', $id)->first();
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        $compact = compact('alldegree', 'courses');
        return view('Courses.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $courses = Courses::where('id', $id)->first();
        $request->validate(
            [
                "course_title" => "unique:courses,course_title,$id",
            ]
        );
        $input = $request->all();
        if ($request->hasfile("course_picture")) {
            $file = $request->file('course_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = rand(10000, 50000) . "." . strtolower($extension);
            File::delete('admin/assets/images/courses/' . $courses->course_picture);
            $file->move('admin/assets/images/courses/', $filename);
            $input['course_picture'] = $filename;
            $input['course_title'] = strtolower($request->course_title);
            $input['added_from'] = session()->get('user_added');
            $input['course_status'] = $courses->course_status;
            $courses->update($input);
            return response()->json([
                "message" => 200,
            ]);
        } else {
            $input['course_picture'] = $courses->course_picture;
            $input['course_title'] = strtolower($request->course_title);
            $input['added_from'] = session()->get('user_added');
            $input['course_status'] = $courses->course_status;
            $courses->update($input);
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
        Courses::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getProgram($id)
    {
        return response()->json([
            "message" => Program::where('program_degree', $id)->where('program_status', 1)->get(),
        ]);
    }
    public function getAllCourses()
    {
        try {
            $programSelect = Program::where('program_name', 'short courses')->first();
            if ($programSelect) {
                $programId = $programSelect->id;
                $courseDetail = Courses::where('course_program', $programId)->latest()->get();
                $resultArray = $courseDetail->isEmpty() ? [] : $courseDetail;
                return response()->json(['message' => $resultArray, "students" => User::where('enter_type', 1)->count(), "teachers" => User::where('enter_type', 3)->count(), "classes" => Program::where('program_name', '!=', 'short courses')->count()], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
    public function getCourseDetails($id)
    {
        try {
            // $programSelect = Program::where('program_name', 'short courses')->first();
            // if ($programSelect) {
            //     $programId = $programSelect->id;
            //     $courseDetail = Courses::where('course_program', $programId)->latest()->get();
            //     $resultArray = $courseDetail->isEmpty() ? [] : $courseDetail;
            //     return response()->json(['message' => $resultArray], 200);
            // }
            $courseDetail = Courses::where('id', $id)->first();
            return response()->json(['message' => $courseDetail], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
    public function getCoursesAll()
    {
        try {
            $programSelect = Program::where('program_name', 'short courses')->first();
            if ($programSelect) {
                $programId = $programSelect->id;
                $courseDetail = Courses::where('course_program', $programId)->latest()->get();
                $resultArray = $courseDetail->isEmpty() ? [] : $courseDetail;
                return response()->json(['message' => $resultArray], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
