<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Degree;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Karachi');
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allattendance = Attendance::where('added_from', session()->get('user_added'))->get();
        return view('Attendance.view', compact("allattendance"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = User::where('id', session()->get('user_added'))->first();
        $all_students = User::where('enter_type', 1)->get();
        $matchingStudents = $all_students->filter(function ($student) use ($teacher) {
            $studentSubjects = unserialize($student->student_total_subjects);
            $teacherDegrees = unserialize($teacher->teacher_professional_field);
            if (is_array($studentSubjects) && is_array($teacherDegrees)) {
                return count(array_intersect($teacherDegrees, $studentSubjects)) > 0;
            }
            return false;
        });
        $all_students = User::whereIn('id', $matchingStudents->pluck('id'))->get();
        $unser = unserialize($teacher->program);
        $userclass = unserialize($teacher->class);
        $progs = [];
        $tec_class = [];
        foreach ($unser as $un) {
            $progs[$un] = Program::select("program_name")->where('id', $un)->first();
        }
        foreach ($userclass as $unclass) {
            $tec_class[$unclass] = Degree::select("degree_name")->where('id', $unclass)->first();
        }
        return view('Attendance.add', compact("all_students", "teacher", "progs", "tec_class"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
    public function present_std($id)
    {
        $student = User::find($id);
        $date = date('Y-m-d');
        $existingAttendance = Attendance::where('student_name', $student->name)
            ->where('date', $date)
            ->first();
        if ($existingAttendance) {
            $existingAttendance->update([
                "time" => date('H:i:s A'),
                "status" => "Present",
                "added_from" => session()->get('user_added'),
            ]);
        } else {
            Attendance::create([
                "student_name" => $student->name,
                "registeration_no" => $student->registeration_no,
                "time" => date('H:i:s A'),
                "date" => $date,
                "status" => "Present",
                "added_from" => session()->get('user_added'),
            ]);
        }

        return response()->json([
            "message" => 200,
        ]);
    }
    public function absent_std($id)
    {
        $student = User::find($id);
        $date = date('Y-m-d');
        $existingAttendance = Attendance::where('student_name', $student->name)
            ->where('date', $date)
            ->first();
        if ($existingAttendance) {
            $existingAttendance->update([
                "time" => date('H:i:s A'),
                "status" => "Absent",
                "added_from" => session()->get('user_added'),
            ]);
        } else {
            Attendance::create([
                "student_name" => $student->name,
                "registeration_no" => $student->registeration_no,
                "time" => date('H:i:s A'),
                "date" => $date,
                "status" => "Absent",
                "added_from" => session()->get('user_added'),
            ]);
        }

        return response()->json([
            "message" => 200,
        ]);
    }
    public function all_attendance()
    {
        return response()->json([
            "message" => Attendance::where('added_from', session()->get('user_added'))->where('date', date('Y-m-d'))->get(),
        ]);
    }
    public function program_based_students(Request $request)
    {
        $subject = $request->subject;
        $allstudents = User::where('enter_type', 1)
            ->where('program', $request->program)
            ->where('degree', $request->class)
            ->get();

        $matchingStudents = [];
        foreach ($allstudents as $student) {
            $unserliazliestds = unserialize($student->student_total_subjects);
            if (in_array($subject, $unserliazliestds)) {
                $matchingStudents[] = $student;
            }
        }
        return response()->json([
            "message" => $matchingStudents,
        ]);
    }
}
