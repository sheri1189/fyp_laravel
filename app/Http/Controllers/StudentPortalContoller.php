<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Fee;
use App\Models\Material;
use App\Models\Notice;
use App\Models\Program;
use App\Models\Syllabus;
use App\Models\Test_Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;

class StudentPortalContoller extends Controller
{
    public function student_teacher()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $unser = unserialize($user->student_total_subjects);

        $allteacher = [];

        foreach ($unser as $subject) {
            $teachers = User::where('enter_type', 3)->get();

            foreach ($teachers as $teacher) {
                $teacherSubjects = unserialize($teacher->teacher_professional_field);

                foreach ($teacherSubjects as $teacherSubject) {
                    if (strtolower($teacherSubject) == strtolower($subject)) {
                        $allteacher[] = $teacher;
                        break;
                    }
                }
            }
        }
        $allteacher = collect($allteacher)->unique('id')->values()->all();
        return view('Student.Portal.teacher', compact('allteacher'));
    }

    public function student_attendance()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $allattendance = Attendance::where('student_name', $user->name)->get();
        return view('Student.Portal.attendance', compact("allattendance"));
    }
    public function student_syllabus()
    {

        $user = User::where('id', session()->get('user_added'))->first();
        $unser = unserialize($user->student_total_subjects);
        $allteacher = [];

        foreach ($unser as $subject) {
            $teachers = User::where('enter_type', 3)->get();
            foreach ($teachers as $teacher) {
                $teacherSubjects = unserialize($teacher->teacher_professional_field);
                foreach ($teacherSubjects as $teacherSubject) {
                    if (strtolower($teacherSubject) == strtolower($subject)) {
                        $allteacher[] = $teacher;
                        break;
                    }
                }
            }
        }
        $allsyllabus = [];
        $allteacher = collect($allteacher)->unique('id')->values()->all();
        foreach ($allteacher as $teacher) {
            $syllabus = Syllabus::where('added_from', $teacher->id)->where('program', $user->program)->get();
            $allsyllabus[$teacher->name] = $syllabus;
        }
        return view('Student.Portal.syllabus', compact("allteacher", "allsyllabus"));
    }
    public function student_material()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $unser = unserialize($user->student_total_subjects);
        $allteacher = [];

        foreach ($unser as $subject) {
            $teachers = User::where('enter_type', 3)->get();
            foreach ($teachers as $teacher) {
                $teacherSubjects = unserialize($teacher->teacher_professional_field);
                foreach ($teacherSubjects as $teacherSubject) {
                    if (strtolower($teacherSubject) == strtolower($subject)) {
                        $allteacher[] = $teacher;
                        break;
                    }
                }
            }
        }
        $allmaterial = [];
        $allteacher = collect($allteacher)->unique('id')->values()->all();
        foreach ($allteacher as $teacher) {
            $syllabus = Material::where('added_from', $teacher->id)->where('program', $user->class)->get();
            $allmaterial[$teacher->name] = $syllabus;
        }
        return view('Student.Portal.material', compact("allteacher", "allmaterial"));
    }
    public function student_assignments()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $unser = unserialize($user->student_total_subjects);
        $allteacher = [];

        foreach ($unser as $subject) {
            $teachers = User::where('enter_type', 3)->get();
            foreach ($teachers as $teacher) {
                $teacherSubjects = unserialize($teacher->teacher_professional_field);
                foreach ($teacherSubjects as $teacherSubject) {
                    if (strtolower($teacherSubject) == strtolower($subject)) {
                        $allteacher[] = $teacher;
                        break;
                    }
                }
            }
        }
        $allassignments = [];
        $allteacher = collect($allteacher)->unique('id')->values()->all();
        foreach ($allteacher as $teacher) {
            $syllabus = Assignment::where('added_from', $teacher->id)->where('program', $user->class)->get();
            $allassignments[$teacher->name] = $syllabus;
        }
        return view('Student.Portal.assignments', compact("allteacher", "allassignments"));
    }
    public function student_tests()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $unser = unserialize($user->student_total_subjects);
        $allteacher = [];

        foreach ($unser as $subject) {
            $teachers = User::where('enter_type', 3)->get();
            foreach ($teachers as $teacher) {
                $teacherSubjects = unserialize($teacher->teacher_professional_field);
                foreach ($teacherSubjects as $teacherSubject) {
                    if (strtolower($teacherSubject) == strtolower($subject)) {
                        $allteacher[] = $teacher;
                        break;
                    }
                }
            }
        }
        $alltest = [];
        $allteacher = collect($allteacher)->unique('id')->values()->all();
        foreach ($allteacher as $teacher) {
            $syllabus = Test_Schedule::where('added_from', $teacher->id)->where('program', $user->class)->get();
            $alltest[$teacher->name] = $syllabus;
        }
        return view('Student.Portal.tests', compact("allteacher", "alltest"));
    }
    public function student_notice()
    {
        $allnotice = Notice::all();
        $compact = compact("allnotice");
        return view('Student.Portal.notice')->with($compact);
    }
    public function student_contact()
    {
        return view('Student.Portal.contact');
    }
    public function student_status($id)
    {
        $user = User::where('id', $id)->first();
        $status = $user->is_active;
        if ($status == 1) {
            User::where('id', $id)->update([
                "is_active" => 0,
            ]);
        } else {
            User::where('id', $id)->update([
                "is_active" => 1,
            ]);
        }
        return response()->json([
            "message" => $user,
        ]);
    }
    public function student_voucher()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $currentMonth = Carbon::now()->format('F');
        $fee_getting_current_month = Fee::where('student_id', $user->id)
            ->where('month', $currentMonth)
            ->where('fee_status', 'Awaiting')
            ->first();
        $nextMonth = Carbon::now()->addMonth()->format('F');
        $fee_getting_next_month = Fee::where('student_id', $user->id)
            ->where('month', $nextMonth)
            ->where('fee_status', 'Awating')
            ->first();
        $fee_getting = $fee_getting_next_month ?? $fee_getting_current_month;
        $student = $user;
        $class = Program::where('id', $student->class)->first();
        return view('Student.Portal.voucher_making', compact("fee_getting", "student", "class"));
    }
    public function fee_history()
    {
        $user = User::where('id', session()->get('user_added'))->first();
        $allfee = Fee::where('student_id', $user->id)->where('fee_status', 'Paid')->get();
        $array_student = array();
        foreach ($allfee as $fee) {
            $user = User::where('id', $fee['student_id'])->first();
            if ($user) {
                $array_student[$fee['student_id']] = $user;
            } else {
                continue;
            }
        }
        return view('Student.Portal.details', compact("allfee", "array_student"));
    }
}
