<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

use App\Models\Classes;
use App\Models\Fee;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Program;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use TCPDF;
use Illuminate\Support\Facades\View;
use ZipArchive;

class FeeController extends Controller
{
    public function generate_voucher()
    {
        $allclasses = Program::where('program_status', 1)->where('added_from', session()->get('user_added'))->latest()->get();
        return view('Fee.voucher', compact("allclasses"));
    }
    public function get_batch($id)
    {
        $allUsers = User::where('program', $id)
            ->where('enter_type', 1)
            ->select('batch')
            ->distinct()
            ->get();
        return response()->json([
            "message" => $allUsers,
        ]);
    }
    public function get_students(Request $request, $id)
    {
        $allusers = User::where('batch', $id)->where('program', $request->class)->where('enter_type', 1)->get();
        return response()->json([
            "message" => $allusers,
        ]);
    }
    public function voucher_getting(Request $request)
    {
        $existingRecord = Fee::where([
            "student_id" => $request->students,
            "month" => $request->month,
        ])->first();
        if ($existingRecord) {
            $existingRecord->update([
                "student_id" => $existingRecord->student_id,
                "month" => $existingRecord->month,
                "fee_receipt_no" => $existingRecord->fee_receipt_no,
                "due_date" => $existingRecord->due_date,
                "room" => $existingRecord->room,
                "batch" => $existingRecord->batch,
                "fee_status" => $existingRecord->fee_status,
                "added_from" => $existingRecord->added_from,
            ]);
            $fee_getting = $existingRecord;
        } else {
            Fee::create([
                "student_id" => $request->students,
                "month" => $request->month,
                "fee_receipt_no" => $request->fee_receipt_no,
                "due_date" => $request->due_date,
                "room" => $request->room,
                "batch" => $request->batch,
                "fee_status" => "Awating",
                "added_from" => session()->get('user_added'),
            ]);
            $fee_getting = Fee::where('fee_receipt_no', $request->fee_receipt_no)->first();
        }
        if ($this) {
            $student = User::where('id', $request->students)->first();
            $class = Program::where('id', $student->class)->first();
            return view('Fee.voucher_making', compact("fee_getting", "student", "class"));
        }
    }
    public function fees_add()
    {
        $allfee = Fee::where('fee_status', 'Awating')->get();
        $array_student = array();
        foreach ($allfee as $fee) {
            $user = User::where('id', $fee->student_id)->first();
            if ($user) {
                $array_student[$fee->student_id] = $user;
            } else {
                continue;
            }
        }
        return view('Fee.pay', compact("allfee", "array_student"));
    }
    public function fee_confirm($id)
    {
        Fee::where('id', $id)->update([
            "fee_status" => "Paid",
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function applying_fee($id)
    {
        return response()->json([
            "message" => User::find($id),
        ]);
    }
    public function all_fee()
    {
        $allfee = Fee::distinct()->get('student_id')->toArray();
        $array_student = array();

        foreach ($allfee as $fee) {
            $user = User::where('id', $fee['student_id'])->first();

            if ($user) {
                $array_student[$fee['student_id']] = $user;
            } else {
                continue;
            }
        }
        return view('Fee.all', compact("allfee", "array_student"));
    }
    public function feeDetails($id)
    {
        $allfee = Fee::where('student_id', $id)->where('fee_status', 'Paid')->get();
        $array_student = array();
        foreach ($allfee as $fee) {
            $user = User::where('id', $fee['student_id'])->first();
            if ($user) {
                $array_student[$fee['student_id']] = $user;
            } else {
                continue;
            }
        }
        return view('Fee.details', compact("allfee", "array_student"));
    }
    public function over_all()
    {
        $currentDate = now();
        $currentMonth = Carbon::now()->format('F');
        $fifthDayDate = $currentDate->copy()->addDays(5)->format('Y-m-d');
        if ($currentDate->day == 1) {
            if ($currentDate->dayOfWeek === Carbon::SUNDAY) {
                $currentDate->addDay();
                $fifthDayDate = $currentDate->copy()->addDays(5)->format('Y-m-d');
            }
            $students = User::where('enter_type', 1)
                ->where('is_active', 1)
                ->get();
            $array_vouchers = [];
            foreach ($students as $student) {
                $voucher_no = 'CRV-' . rand(1000, 9000) . '-' . rand(100000, 900000);
                $existingRecord = Fee::where([
                    "student_id" => $student->id,
                    "month" => $currentMonth,
                ])->first();
                if ($existingRecord) {
                    $existingRecord->update([
                        "student_id" => $existingRecord->student_id,
                        "month" => $existingRecord->month,
                        "fee_receipt_no" => $existingRecord->fee_receipt_no,
                        "due_date" => $existingRecord->due_date,
                        "room" => $existingRecord->room,
                        "batch" => $existingRecord->batch,
                        "fee_status" => $existingRecord->fee_status,
                        "added_from" => $existingRecord->added_from,
                    ]);
                } else {
                    Fee::create([
                        "student_id" => $student->id,
                        "month" => $currentMonth,
                        "fee_receipt_no" => $voucher_no,
                        "due_date" => $fifthDayDate,
                        "room" => $student->class,
                        "batch" => $student->batch,
                        "fee_status" => "Awating",
                        "added_from" => session()->get('user_added'),
                    ]);
                }
                $array_vouchers[$student->id] = $existingRecord;
            }
            return view('Fee.pdf_table', compact('students', 'array_vouchers'));
        } else {
            return response()->json(['message' => 'Not the first day of the month.'], 300);
        }
    }
    public function all_vouchers()
    {
        $currentDate = now();
        $currentMonth = Carbon::now()->format('F');
        $students = User::where('enter_type', 1)
            ->where('is_active', 1)
            ->get();
        $array_vouchers = [];
        foreach ($students as $student) {
            $existingRecord = Fee::where([
                "student_id" => $student->id,
                "month" => $currentMonth,
            ])->first();
            if ($existingRecord) {
                $array_vouchers[$student->id] = $existingRecord;
            } else {
                continue;
            }
        }
        return view('Fee.all_vouchers', compact('students', 'array_vouchers'));
    }
    public function voucher_detail($id)
    {
        $user = User::where('id', $id)->first();
        $currentMonth = Carbon::now()->format('F');
        $fee_getting = Fee::where('student_id', $user->id)->where('month', $currentMonth)->first();
        $student = $user;
        $class = Program::where('id', $student->class)->first();
        return view('Fee.voucher_details', compact("fee_getting", "student", "class"));
    }
}



// $currentDate = now();
//         $currentMonth = $currentMonth = Carbon::now()->format('F');
//         $fifthDayDate = $currentDate->copy()->addDays(5)->format('Y-m-d');
//         if ($currentDate->day == 25) {
//             $students = User::where('enter_type', 1)
//                 ->where('is_active', 1)
//                 ->get();
//             $pdfs = [];
//             foreach ($students as $student) {
//                 $voucher_no = 'CRV-' . rand(1000, 9000) . '-' . rand(100000, 900000);
//                 Fee::updateOrInsert(
//                     [
//                         "student_id" => $student->id,
//                         "month" => $currentMonth,
//                     ],
//                     [
//                         "fee_receipt_no" => $voucher_no,
//                         "due_date" => $fifthDayDate,
//                         "room" => $student->class,
//                         "batch" => $student->batch,
//                         "fee_status" => "Awating",
//                         "added_from" => session()->get('user_added'),
//                     ]
//                 );
//                 if ($this) {
//                     $fee_getting = Fee::where('fee_receipt_no', $voucher_no)->first();
//                     $student = User::where('id', $student->id)->first();
//                     $class = Program::where('id', $student->class)->first();
//                     $pdf = Pdf::loadView('student_voucher', compact('student', 'class', 'fee_getting'));
//                     $pdfs[] = $pdf;
//                     $pdf->save(public_path('vouchers/' . $student->name . '.pdf'));
//                 }
//             }
//             return view('Fee.pdf_table', compact('pdfs', 'students'));
//         } else {
//             return response()->json(['message' => 'Not the first day of the month.'], 300);
//         }
