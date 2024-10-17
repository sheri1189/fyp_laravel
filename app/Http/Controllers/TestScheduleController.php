<?php

namespace App\Http\Controllers;

use App\Models\Test_Schedule;
use App\Http\Requests\StoreTest_ScheduleRequest;
use App\Http\Requests\UpdateTest_ScheduleRequest;
use App\Models\Books;
use App\Models\Classes;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class TestScheduleController extends Controller
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
                $alltest = Test_Schedule::whereIn('class', $teacherSubjects)->get();
            } else {
                $alltest = Test_Schedule::all();
            }
        } else {
            $alltest = Test_Schedule::where('added_from', session()->get('user_added'))->latest()->get();
        }
        return view('Test.view', compact("alltest"));
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
        return view('Test.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['book'] = NULL;
        $input['batch'] = NULL;
        $input['added_from'] = $request->instructor;
        Test_Schedule::create($input);
        return response()->json([
            "message" => 200,
        ]);
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
        $test = Test_Schedule::find($id);
        $compact = compact('alldegree', 'array_subjects', 'allteacher', 'test');
        return view('Test.edit')->with($compact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $test = Test_Schedule::find($id);
        $input = $request->all();
        $input['added_from'] = $request->instructor;
        $test->update($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Test_Schedule::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getSubject($id)
    {
        $user = User::where('id', $id)->first();

        $classData = [];
        $programData = [];
        $teacherProfessionalFieldData = [];

        // Unserialize and process data for the 'class' field
        if ($user->class) {
            $classData = unserialize($user->class);
            $processedClassData = [];
            foreach ($classData as $classId) {
                $degree = Degree::where('id', $classId)->first();
                if ($degree) {
                    $processedClassData[] = $degree;
                }
            }
            $classData = $processedClassData;
        }

        // Unserialize and process data for the 'program' field
        if ($user->program) {
            $programData = unserialize($user->program);
            $processedProgramData = [];
            foreach ($programData as $programId) {
                $degree = Program::where('id', $programId)->first();
                if ($degree) {
                    $processedProgramData[] = $degree;
                }
            }
            $programData = $processedProgramData;
        }
        if ($user->teacher_professional_field) {
            $teacherProfessionalFieldData = unserialize($user->teacher_professional_field);
        }
        return response()->json([
            "message" => $classData,
            "message2" => $programData,
            "message3" => $teacherProfessionalFieldData,
        ]);
    }
}
