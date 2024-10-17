<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

use App\Models\Fee;
use App\Models\Fee_Reminder;
use App\Models\Holidays_Reminder as ModelsHolidays_Reminder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class Holidays_Reminder extends Controller
{
    public function reminder_view()
    {
        $allreminder = ModelsHolidays_Reminder::where('added_from', session()->get('user_added'))->where('type', "Reminder")->get();
        return view('Reminder.view', compact("allreminder"));
    }
    public function reminder_add()
    {
        return view('Reminder.add');
    }
    public function reminder_create(Request $request)
    {
        $allusers = User::where('enter_type', 1)->where('added_from', session()->get('user_added'))->get();
        foreach ($allusers as $users) {
            $mail_data = [
                'recipient' => $users->email,
                'formEmail' => 'itsme.shaharyar@gmail.com',
                'name' => $users->name,
                'subject' => "AMS | The Nest Academy",
                'body' => ["message" => $request->description, "name" => $users->name, "from_date" => $request->from_date, "to_date" => $request->to_date],
            ];
            Mail::send('Reminder.reminder_template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['formEmail'], $mail_data['name'])
                    ->subject($mail_data['subject']);
            });
            // $mailBody = "
            // <p><strong>Reminder</strong></p>
            // <p><strong>From " . $request->from_date . " - " . $request->to_date . "</strong></p>
            // <p>" . $request->description . "</p>";
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // mail($users->email, "Reminder", $mailBody, $headers);
            // whatsapp message sending procedure here//
            // Student contact number
            $cleanedStudentNumber = preg_replace('/[^0-9]/', '', $users->contact_no);
            if (substr($cleanedStudentNumber, 0, 1) !== '+') {
                $cleanedStudentNumber = '+' . $cleanedStudentNumber;
            }
            $studentRecipient = $cleanedStudentNumber;
            $studentMessage = "This is the message from the TheNestAcademy : " . $request->description;
            $apiKey = "KoZ7jCxbNvpP";
            $encodedStudentRecipient = urlencode($studentRecipient);
            $encodedStudentMessage = urlencode($studentMessage);
            $studentUrl = "http://api.textmebot.com/send.php?recipient={$encodedStudentRecipient}&apikey={$apiKey}&text={$encodedStudentMessage}&json=yes";

            // Delay for student message
            sleep(8);

            // Initialize cURL for student message
            $studentCurl = curl_init();
            curl_setopt($studentCurl, CURLOPT_URL, $studentUrl);
            curl_setopt($studentCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($studentCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($studentCurl, CURLOPT_SSL_VERIFYPEER, false);
            $studentOutput = curl_exec($studentCurl);
            if (curl_errno($studentCurl)) {
                echo 'Curl error: ' . curl_error($studentCurl);
            }
            curl_close($studentCurl);

            // Guardian contact number
            $cleanedGuardianNumber = preg_replace('/[^0-9]/', '', $users->guadian_number);
            if (substr($cleanedGuardianNumber, 0, 1) !== '+') {
                $cleanedGuardianNumber = '+' . $cleanedGuardianNumber;
            }
            $guardianRecipient = $cleanedGuardianNumber;
            $guardianMessage = "This is the message from the TheNestAcademy : " . $request->description;
            $encodedGuardianRecipient = urlencode($guardianRecipient);
            $encodedGuardianMessage = urlencode($guardianMessage);
            $guardianUrl = "http://api.textmebot.com/send.php?recipient={$encodedGuardianRecipient}&apikey={$apiKey}&text={$encodedGuardianMessage}&json=yes";

            // Delay for guardian message
            sleep(8);

            // Initialize cURL for guardian message
            $guardianCurl = curl_init();
            curl_setopt($guardianCurl, CURLOPT_URL, $guardianUrl);
            curl_setopt($guardianCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($guardianCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($guardianCurl, CURLOPT_SSL_VERIFYPEER, false);
            $guardianOutput = curl_exec($guardianCurl);
            if (curl_errno($guardianCurl)) {
                echo 'Curl error: ' . curl_error($guardianCurl);
            }
            curl_close($guardianCurl);

            // whatsapp message sending procedure here//
            $msg = 200;
        }
        if ($msg == 200) {
            ModelsHolidays_Reminder::create([
                "reminder_name" => $request->reminder_name,
                "from_date" => $request->from_date,
                "to_date" => $request->to_date,
                "status" => $request->status,
                "description" => $request->description,
                "type" => "Reminder",
                "added_from" => session()->get('user_added'),
            ]);
            return response()->json(["message" => 200]);
        }
    }
    public function holiday_view()
    {
        $allholiday = ModelsHolidays_Reminder::where('added_from', session()->get('user_added'))->where('type', "Holiday")->get();
        return view('Holiday.view', compact("allholiday"));
    }
    public function holiday_add()
    {
        return view('Holiday.add');
    }
    public function holiday_create(Request $request)
    {
        $allusers = User::where('enter_type', 1)->where('added_from', session()->get('user_added'))->get();
        foreach ($allusers as $users) {
            $mail_data = [
                'recipient' => $users->email,
                'formEmail' => 'itsme.shaharyar@gmail.com',
                'name' => $users->name,
                'subject' => "AMS | The Nest Academy",
                'body' => ["message" => $request->description, "name" => $users->name, "from_date" => $request->from_date, "to_date" => $request->to_date],
            ];
            Mail::send('Holiday.holiday_template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['formEmail'], $mail_data['name'])
                    ->subject($mail_data['subject']);
            });
            // $mailBody = "
            // <p><strong>Holiday's Reminder</strong></p>
            // <p><strong>From " . $request->from_date . " - " . $request->to_date . "</strong></p>
            // <p>" . $request->description . "</p>";
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // mail($users->email, "Holiday's Reminder", $mailBody, $headers);
            // whatsapp message sending procedure here//
            // Student contact number
            $cleanedStudentNumber = preg_replace('/[^0-9]/', '', $users->contact_no);
            if (substr($cleanedStudentNumber, 0, 1) !== '+') {
                $cleanedStudentNumber = '+' . $cleanedStudentNumber;
            }
            $studentRecipient = $cleanedStudentNumber;
            $studentMessage = "This is the message from the TheNestAcademy : " . $request->description;
            $apiKey = "KoZ7jCxbNvpP";
            $encodedStudentRecipient = urlencode($studentRecipient);
            $encodedStudentMessage = urlencode($studentMessage);
            $studentUrl = "http://api.textmebot.com/send.php?recipient={$encodedStudentRecipient}&apikey={$apiKey}&text={$encodedStudentMessage}&json=yes";

            // Delay for student message
            sleep(8);

            // Initialize cURL for student message
            $studentCurl = curl_init();
            curl_setopt($studentCurl, CURLOPT_URL, $studentUrl);
            curl_setopt($studentCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($studentCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($studentCurl, CURLOPT_SSL_VERIFYPEER, false);
            $studentOutput = curl_exec($studentCurl);
            if (curl_errno($studentCurl)) {
                echo 'Curl error: ' . curl_error($studentCurl);
            }
            curl_close($studentCurl);

            // Guardian contact number
            $cleanedGuardianNumber = preg_replace('/[^0-9]/', '', $users->guadian_number);
            if (substr($cleanedGuardianNumber, 0, 1) !== '+') {
                $cleanedGuardianNumber = '+' . $cleanedGuardianNumber;
            }
            $guardianRecipient = $cleanedGuardianNumber;
            $guardianMessage = "This is the message from the TheNestAcademy : " . $request->description;
            $encodedGuardianRecipient = urlencode($guardianRecipient);
            $encodedGuardianMessage = urlencode($guardianMessage);
            $guardianUrl = "http://api.textmebot.com/send.php?recipient={$encodedGuardianRecipient}&apikey={$apiKey}&text={$encodedGuardianMessage}&json=yes";

            // Delay for guardian message
            sleep(8);

            // Initialize cURL for guardian message
            $guardianCurl = curl_init();
            curl_setopt($guardianCurl, CURLOPT_URL, $guardianUrl);
            curl_setopt($guardianCurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($guardianCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($guardianCurl, CURLOPT_SSL_VERIFYPEER, false);
            $guardianOutput = curl_exec($guardianCurl);
            if (curl_errno($guardianCurl)) {
                echo 'Curl error: ' . curl_error($guardianCurl);
            }
            curl_close($guardianCurl);

            // whatsapp message sending procedure here//
            $msg = 200;
        }
        if ($msg == 200) {
            ModelsHolidays_Reminder::create([
                "holiday_name" => $request->holiday_name,
                "from_date" => $request->from_date,
                "to_date" => $request->to_date,
                "description" => $request->description,
                "type" => "Holiday",
                "added_from" => session()->get('user_added'),
            ]);
            return response()->json(["message" => 200]);
        }
    }
    public function fee_reminder_view()
    {
        $allfeereminder = Fee_Reminder::where('added_from', session()->get('user_added'))->where('type', "Late Fee Reminder")->get();
        return view('Holiday.fee_view', compact("allfeereminder"));
    }
    public function fee_reminder_update($id)
    {
        $feereminder = Fee_Reminder::where('id', $id)->first();
        return view('Holiday.fee_update', compact("feereminder"));
    }
    public function fee_reminder_create(Request $request, $id)
    {
        Fee_Reminder::where('id', $id)->update([
            "reminder_name" => $request->reminder_name,
            "from_date" => $request->from_date,
            "to_date" => $request->to_date,
            "status" => "Scheduling",
            "description" => $request->description,
            "type" => "Late Fee Reminder",
            "added_from" => session()->get('user_added'),
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function fee_reminder_send()
    {
        $allfeereminder = Fee_Reminder::where('added_from', session()->get('user_added'))->first();
        if ($allfeereminder) {
            $currentDate = now()->toDateString();
            if ($currentDate >= $allfeereminder->from_date && $currentDate <= $allfeereminder->to_date) {
                Fee::where('fee_status', 'Awating')->update([
                    "message_sent" => "unsent",
                ]);
                $allfeecouvher = Fee::where('fee_status', 'Awating')->where('month', now()->format('F'))->where('message_sent', 'unsent')->get();
                foreach ($allfeecouvher as $vouvher) {
                    $student = User::where('id', $vouvher->student_id)->first();
                    $mail_data = [
                        'recipient' => $student->email,
                        'formEmail' => 'itsme.shaharyar@gmail.com',
                        'name' => $student->name,
                        'subject' => "AMS | The Nest Academy",
                        'body' => ["message" => $allfeereminder->description, "name" => $student->name, "from_date" => $allfeereminder->from_date, "to_date" => $allfeereminder->to_date],
                    ];
                    Mail::send('Holiday.holiday_template', $mail_data, function ($message) use ($mail_data) {
                        $message->to($mail_data['recipient'])
                            ->from($mail_data['formEmail'], $mail_data['name'])
                            ->subject($mail_data['subject']);
                    });
                    // $mailBody = "
                    // <p><strong>Fee Reminder</strong></p>
                    // <p><strong>From " . $allfeereminder->from_date . " - " . $allfeereminder->to_date . "</strong></p>
                    // <p>" . $allfeereminder->description . "</p>";
                    // $headers = "MIME-Version: 1.0" . "\r\n";
                    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // mail($student->email, "Fee Reminder", $mailBody, $headers);
                    // whatsapp message sending procedure here//
                    // Student contact number
                    $cleanedStudentNumber = preg_replace('/[^0-9]/', '', $student->contact_no);
                    if (substr($cleanedStudentNumber, 0, 1) !== '+') {
                        $cleanedStudentNumber = '+' . $cleanedStudentNumber;
                    }
                    $studentRecipient = $cleanedStudentNumber;
                    $studentMessage = "This is the message from the TheNestAcademy : " . $allfeereminder->description;
                    $apiKey = "KoZ7jCxbNvpP";
                    $encodedStudentRecipient = urlencode($studentRecipient);
                    $encodedStudentMessage = urlencode($studentMessage);
                    $studentUrl = "http://api.textmebot.com/send.php?recipient={$encodedStudentRecipient}&apikey={$apiKey}&text={$encodedStudentMessage}&json=yes";

                    // Delay for student message
                    sleep(8);

                    // Initialize cURL for student message
                    $studentCurl = curl_init();
                    curl_setopt($studentCurl, CURLOPT_URL, $studentUrl);
                    curl_setopt($studentCurl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($studentCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    curl_setopt($studentCurl, CURLOPT_SSL_VERIFYPEER, false);
                    $studentOutput = curl_exec($studentCurl);
                    if (curl_errno($studentCurl)) {
                        echo 'Curl error: ' . curl_error($studentCurl);
                    }
                    curl_close($studentCurl);

                    // Guardian contact number
                    $cleanedGuardianNumber = preg_replace('/[^0-9]/', '', $student->guadian_number);
                    if (substr($cleanedGuardianNumber, 0, 1) !== '+') {
                        $cleanedGuardianNumber = '+' . $cleanedGuardianNumber;
                    }
                    $guardianRecipient = $cleanedGuardianNumber;
                    $guardianMessage = "This is the message from the TheNestAcademy : " . $allfeereminder->description;
                    $encodedGuardianRecipient = urlencode($guardianRecipient);
                    $encodedGuardianMessage = urlencode($guardianMessage);
                    $guardianUrl = "http://api.textmebot.com/send.php?recipient={$encodedGuardianRecipient}&apikey={$apiKey}&text={$encodedGuardianMessage}&json=yes";

                    // Delay for guardian message
                    sleep(8);

                    // Initialize cURL for guardian message
                    $guardianCurl = curl_init();
                    curl_setopt($guardianCurl, CURLOPT_URL, $guardianUrl);
                    curl_setopt($guardianCurl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($guardianCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    curl_setopt($guardianCurl, CURLOPT_SSL_VERIFYPEER, false);
                    $guardianOutput = curl_exec($guardianCurl);
                    if (curl_errno($guardianCurl)) {
                        echo 'Curl error: ' . curl_error($guardianCurl);
                    }
                    curl_close($guardianCurl);

                    // whatsapp message sending procedure here//
                    Fee::where('id', $vouvher->id)->update([
                        "message_sent" => "sent",
                    ]);
                }
            }
        }
    }
}
