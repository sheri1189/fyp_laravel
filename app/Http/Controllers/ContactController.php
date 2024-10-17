<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Teacher_Attendance;
use App\Models\Teacher_Salary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Psy\CodeCleaner\ReturnTypePass;

class ContactController extends Controller
{
    public function contact()
    {
        $allcontact = Contact::latest()->get();
        return view('Contact.view', compact("allcontact"));
    }
    public function getContact($id)
    {
        return response()->json(["message" => Contact::find($id)]);
    }
    public function applyReply(Request $request, $id)
    {
        $contact = Contact::find($id);
        if ($this->isOnline()) {
            $mail_data = [
                'recipient' => $contact->email,
                'formEmail' => 'itsme.shaharyar@gmail.com',
                'name' => $contact->name,
                'subject' => "AMS | The Nest Academy",
                'body' => $request->reply_message,
            ];
            Mail::send('Contact.reply-template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['formEmail'], $mail_data['name'])
                    ->subject($mail_data['subject']);
            });
            Contact::where('id', $id)->update(["status" => "Replied"]);
            return response()->json([
                "msg" => 200,
            ]);
        } else {
            return response()->json([
                "msg" => 201,
            ]);
        }
        // $contact = Contact::find($id);
        // mail($contact->email, "Message Reply", $request->reply_message);
        // Contact::where('id', $id)->update(["status" => "Replied"]);
        // return response()->json([
        //     "msg" => 200,
        // ]);
    }
    public function isOnline($site = "https://youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
    public function addContact(Request $request)
    {
        try {
            Contact::create([
                "name" => $request->name,
                "email" => $request->email,
                "subject" => $request->subject,
                "contact_no" => $request->contact,
                "message" => $request->message,
                "date" => date('Y-m-d'),
                "status" => "Pending",
            ]);
            return response()->json(['success' => "insert"], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
    public function contactotadmin(Request $request)
    {
        Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "contact_no" => $request->contact_no,
            "message" => $request->message,
            "date" => date('Y-m-d'),
            "status" => "Pending",
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function contact_delete($id)
    {
        Contact::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function teacher_attendance()
    {
        $allteacher = User::where('enter_type', 3)->where('added_from', session()->get('user_added'))->get();
        return view('Sallary.generate', compact("allteacher"));
    }
    public function teacher_attendance_add(Request $request)
    {
        Teacher_Attendance::updateOrInsert(
            [
                'teacher_id' => $request->teacher_id,
                'date' => date('Y-m-d'),
            ],
            [
                'in_time' => date($request->in_time, strtotime('H:i A')),
                'out_time' => date($request->out_time, strtotime('H:i A')),
                'attendance_status' => 'Present',
                'added_from' => session()->get('user_added'),
            ]
        );
        return response()->json([
            'message' => 200,
        ]);
    }
    public function teacher_salary()
    {
        $allsalary = Teacher_Salary::where('added_from', session()->get('user_added'))->get();
        return view('Sallary.view', compact("allsalary"));
    }
    public function add_salary()
    {
        $allteacher = User::where('enter_type', 3)->where('added_from', session()->get('user_added'))->get();
        return view('Sallary.add', compact("allteacher"));
    }
    public function salary_add(Request $request)
    {
        Teacher_Salary::create([
            "voucher_number" => $request->voucher_number,
            "voucher_date" => $request->date,
            "month" => $request->month,
            "teacher_id" => $request->teacher_id,
            "designation" => $request->designation,
            "payment_method" => $request->payment_method,
            "from_date" => $request->from_date,
            "to_date" => $request->to_date,
            "present" => $request->present,
            "absent" => $request->absent,
            "net_salary" => $request->net_salary,
            "academy_expences" => $request->academy_expences,
            "added_from" => session()->get('user_added'),
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function check_teacher_attendance(Request $request)
    {
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $teacherId = $request->teacher;
        $presentCount = 0;
        $absentCount = 0;
        $currentDate = Carbon::parse($fromDate);
        while ($currentDate->lte(Carbon::parse($toDate))) {
            if ($currentDate->dayOfWeek != Carbon::SUNDAY) {
                $attendance = Teacher_Attendance::where('teacher_id', $teacherId)
                    ->whereDate('date', $currentDate->toDateString())
                    ->first();
                if ($attendance && $attendance->attendance_status == 'Present') {
                    $presentCount++;
                } else {
                    $absentCount++;
                }
            }
            $currentDate->addDay();
        }
        $user = User::where('id', $request->teacher)->first();
        $teacher_subjects = $user->teacher_professional_field;
        $unserializedSubjects = unserialize($teacher_subjects);
        $allstudents = User::where('enter_type', 1)->get();
        $feeperSubject = [];
        foreach ($allstudents as $student) {
            $unserstdsubjects = unserialize($student->student_total_subjects);
            $array_cont = count($unserstdsubjects);
            $fees_stds = $student->student_after_discount_fee / $array_cont;
            // $studentAmount = $fees_stds * 0.6 * $presentCount;
            $studentAmount = $fees_stds * 0.6;
            $academyExpensesAmount = $fees_stds * 0.4;

            foreach ($unserstdsubjects as $subject) {
                if (in_array($subject, $unserializedSubjects)) {
                    $feeperSubject[$subject . "_" . $student->name] = [
                        'student_amount' => $studentAmount,
                        'academy_expenses_amount' => $academyExpensesAmount,
                    ];
                }
            }
        }
        $teacher_salary = 0;
        $academy_expences = 0;
        foreach ($feeperSubject as $feesubje) {
            $teacher_salary += $feesubje['student_amount'];
            $academy_expences += $feesubje['academy_expenses_amount'];
        }
        return response()->json([
            'present_count' => $presentCount,
            'absent_count' => $absentCount,
            'teacher_salary' => number_format($teacher_salary, 2),
            'academy_expences' => number_format($academy_expences, 2),
        ]);
    }
    public function history_salary()
    {
        $teacher = User::where('id', session()->get('user_added'))->first();
        $allsalary = Teacher_Salary::where('teacher_id', $teacher->id)->get();
        return view('Sallary.history', compact("allsalary", "teacher"));
    }
}
