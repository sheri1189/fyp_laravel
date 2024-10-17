<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Day_Book;
use App\Models\Day_Book_Category;
use App\Models\Degree;
use App\Models\Fee;
use App\Models\Teacher_Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReprotController extends Controller
{
    public function student_report()
    {
        $allstudents = User::where('enter_type', 1)->get();
        $alldata = Attendance::all();
        return view('Report.student', compact("allstudents", "alldata"));
    }
    public function staff_report()
    {
        $allteacher = User::where('enter_type', 3)->get();
        $alldata = Teacher_Attendance::all();
        $array_data = [];
        foreach ($alldata as $cat) {
            $array_data[$cat->id] = User::where('id', $cat->teacher_id)->first();
        }
        return view('Report.staff', compact("allteacher", "alldata", "array_data"));
    }
    public function expences_report()
    {
        $allcategory = Day_Book_Category::all();
        $alldata = Day_Book::all();
        $array_data = [];
        foreach ($alldata as $cat) {
            $array_data[$cat->id] = Day_Book_Category::where('id', $cat->category_name)->first();
        }
        return view('Report.expences', compact('alldata', "allcategory", "array_data"));
    }
    public function select_students(Request $request, $value)
    {
        if ($value == "Today") {
            $today = Carbon::today();
            $array_data = [];
            $conversations = DB::table('attendances')
                ->where('date', $today->format('Y-m-d'))->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Yesterday") {
            $yesterday = Carbon::yesterday();
            $array_data = [];
            $conversations = DB::table('attendances')
                ->where('date', $yesterday->format('Y-m-d'))->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "This Week") {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
            $array_data = [];
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last Week") {
            $startDate = Carbon::now()->subWeek()->startOfWeek();
            $endDate = Carbon::now()->subWeek()->endOfWeek();
            $array_data = [];
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 7 Days") {
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(7);
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            $array_data = [];
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 30 Days") {

            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(30);
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            $array_data = [];
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 60 Days") {
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(60);
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            $array_data = [];
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 90 Days") {

            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(90);
            $array_data = [];
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "This Year") {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();

            $array_data = [];
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last Year") {
            $startDate = Carbon::now()->subYear()->startOfYear();
            $endDate = Carbon::now()->subYear()->endOfYear();
            $array_data = [];
            $conversations = DB::table('attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('student_name', $request->student_id)->where('status', $request->select_type)
                ->get();
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,

                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        }
    }
    public function select_teacher(Request $request, $value)
    {
        if ($value == "Today") {
            $today = Carbon::today();
            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->where('date', $today->format('Y-m-d'))->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Yesterday") {
            $yesterday = Carbon::yesterday();
            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->where('date', $yesterday->format('Y-m-d'))->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "This Week") {
            $startDate = Carbon::now()->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last Week") {
            $startDate = Carbon::now()->subWeek()->startOfWeek();
            $endDate = Carbon::now()->subWeek()->endOfWeek();
            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 7 Days") {
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(7);
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            $array_data = [];
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 30 Days") {

            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(30);
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            $array_data = [];
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 60 Days") {
            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(60);
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            $array_data = [];
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last 90 Days") {

            $endDate = Carbon::now();
            $startDate = Carbon::now()->subDays(90);
            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "This Year") {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();

            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } elseif ($value == "Last Year") {
            $startDate = Carbon::now()->subYear()->startOfYear();
            $endDate = Carbon::now()->subYear()->endOfYear();
            $array_data = [];
            $conversations = DB::table('teacher__attendances')
                ->whereBetween('date', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])->where('teacher_id', $request->teacher_id)->where('attendance_status', $request->select_type)
                ->get();
            foreach ($conversations as $conver) {
                $array_data[$conver->id] = User::where('id', $conver->teacher_id)->first();
            }
            if ($conversations->isNotEmpty()) {
                return response()->json([
                    "message" => $conversations,
                    "message2" => $array_data,
                ]);
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        }
    }
    public function profit_loss()
    {
        return view('Report.profit_loss');
    }
    public function get_profit_loss(Request $request, $value)
    {
        $from_date = $request->from_date;
        $to_date = $value;
        $allcategory = Day_Book_Category::all();
        $totalExpenses = 0;
        $totalRevenue = 0;

        foreach ($allcategory as $category) {
            if ($category->category_type == "Expenses") {
                $records = Day_Book::where('category_name', $category->id)
                    ->whereBetween('date', [$from_date, $to_date])
                    ->get();
                $totalExpenses += $records->sum('amount');
            } else {
                $records = Day_Book::where('category_name', $category->id)
                    ->whereBetween('date', [$from_date, $to_date])
                    ->get();
                $totalRevenue += $records->sum('amount');
            }
        }
        $profit = $totalRevenue - $totalExpenses;
        $loss = $totalExpenses - $totalRevenue;
        $profit = max(0, $profit);
        $loss = max(0, $loss);
        return response()->json([
            'expences' => $totalExpenses,
            'revenue' => $totalRevenue,
            'profit' => $profit,
            'loss' => $loss,
        ]);
    }
    public function fee_report()
    {
        $students = User::where('enter_type', 1)
            ->where('is_active', 1)
            ->get();
        $array_vouchers = [];
        foreach ($students as $student) {
            $existingRecord = Fee::where([
                "student_id" => $student->id,
            ])->first();
            if ($existingRecord) {
                $array_vouchers[$student->id] = $existingRecord;
            } else {
                continue;
            }
        }
        $alldegree = Degree::where('added_from', session()->get('user_added'))->where('degree_status', 1)->latest()->get();
        return view('Report.fee_report', compact("alldegree", "array_vouchers", "students"));
    }
    public function class_based_students($id)
    {
        return response()->json([
            "message" => User::where('program', $id)->get(),
        ]);
    }
    public function select_students_fee_report(Request $request, $value)
    {
        $currentDate = now();
        $student_id = $request->student_id;
        $selectType = $value;
        switch ($value) {
            case "Today":
                $startDate = Carbon::today();
                $endDate = $startDate->copy()->endOfDay();
                break;
            case "Yesterday":
                $startDate = Carbon::yesterday();
                $endDate = $startDate->copy()->endOfDay();
                break;
            case "This Week":
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case "Last Week":
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate = Carbon::now()->subWeek()->endOfWeek();
                break;
            case "Last 7 Days":
                $endDate = Carbon::now();
                $startDate = $endDate->copy()->subDays(7);
                break;
            case "Last 30 Days":
                $endDate = Carbon::now();
                $startDate = $endDate->copy()->subDays(30);
                break;
            case "Last 60 Days":
                $endDate = Carbon::now();
                $startDate = $endDate->copy()->subDays(60);
                break;
            case "Last 90 Days":
                $endDate = Carbon::now();
                $startDate = $endDate->copy()->subDays(90);
                break;
            case "This Year":
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case "Last Year":
                $startDate = Carbon::now()->subYear()->startOfYear();
                $endDate = Carbon::now()->subYear()->endOfYear();
                break;
            default:
        }

        $array_data = [];
        $fees = DB::table('fees')
            ->whereBetween('created_at', [$startDate->format('Y-m-d H:i:s'), $endDate->format('Y-m-d H:i:s')])
            ->where('student_id', $student_id)
            ->get();
        foreach ($fees as $fee) {
            $array_data[$fee->id] = User::where('id', $fee->student_id)->first();
        }
        if ($fees->isNotEmpty()) {
            return response()->json([
                "message" => $fees,
                "message2" => $array_data,
            ]);
        } else {
            return response()->json([
                "message" => 300,
            ]);
        }
    }
}
