<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DayBookController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\Holidays_Reminder;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ReprotController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPortalContoller;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestScheduleController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\UserController;
use App\Mail\SendgridMail;
use App\Models\Day_Book;
use App\Models\Degree;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// use Illuminate\Support\Facades\Mail;

// Route::get('/send_mail', function () {
//     $email = 'official.thenestacademy@gmail.com';
//     Mail::to($email)->send(new SendgridMail());
//     return "Email sent successfully!";
// });



Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('event:clear');
    echo 'Cache Cleared';
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'signin')->name('authentication.signin');
    Route::get('/signup', 'signup')->name('authentication.signup');
    Route::get('/forget', 'forget')->name('authentication.forget');
    Route::get('/resend', 'resend')->name('authentication.resend');
    Route::get('/offline', 'offline')->name('authentication.offline');
    Route::get('/gmail', 'getGmailPage');
});
Route::controller(Holidays_Reminder::class)->group(function () {
    Route::get('/fee_reminder_send', 'fee_reminder_send');
});
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/registeration', 'registeration')->name('registeration');
    Route::post('/signin', 'signin');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');
    Route::get('/verification-email/{email}', 'verificationEmail');
    Route::get('/blank-token/{email}', 'blanktoken');
    Route::get('/resend-email/{email}', 'resendemail');
    Route::post('/reset-link', 'resetLink');
    Route::get('/reset-password/{email}', 'resetPassword');
    Route::post('/update_password', 'updatePassword');
});
Route::group(["middleware" => ["authlogin"]], function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.dashboard');
        Route::get('/student_dashboard', 'student_dashboard')->name('student_dashboard.student_dashboard');
        Route::get('/teacher_dashboard', 'teacher_dashboard')->name('teacher_dashboard.teacher_dashboard');
        Route::get('/logout', 'logout')->name('authentication.logout');
        Route::get('/form', 'form')->name('dashboard.form');
        Route::get('/table', 'table')->name('dashboard.table');
        Route::get('/profile', 'profile')->name('dashboard.profile');
        Route::put('/update-profile/{id}', 'updateProfile');
    });
    Route::resources([
        'degree' => DegreeController::class,
        'program' => ProgramController::class,
        'courses' => CoursesController::class,
        'staff' => StaffController::class,
        'role' => RoleController::class,
        'classes' => ClassesController::class,
        'inquiry' => QueryController::class,
        'student' => StudentController::class,
        'teacher' => TeacherController::class,
        'staff' => StaffController::class,
        'books' => BooksController::class,
        'syllabus' => SyllabusController::class,
        'time' => TimeTableController::class,
        'test' => TestScheduleController::class,
        'notice' => NoticeController::class,
        'blog' => BlogController::class,
        'assignments' => AssignmentController::class,
        'material' => MaterialController::class,
        'attendance' => AttendanceController::class,
        'day_book' => DayBookController::class,
    ]);
    Route::controller(DegreeController::class)->group(function () {
        Route::get('/degree-recyclebin', 'degreerecycleBin');
    });
    Route::controller(StudentController::class)->group(function () {
        Route::get('/active_students', 'active_students');
        Route::get('/students_leave', 'students_leave');
        Route::get('/leave_add', 'leave_add');
        Route::post('/add_leave', 'add_leave');
    });
    Route::controller(ProgramController::class)->group(function () {
        Route::get('/program-recyclebin', 'programrecycleBin');
    });
    Route::controller(CoursesController::class)->group(function () {
        Route::get('/get_program/{id}', 'getProgram');
    });
    Route::controller(QueryController::class)->group(function () {
        Route::get('/approve_for_student/{id}', 'approveForStudent');
    });
    Route::controller(TestScheduleController::class)->group(function () {
        Route::get('/get_subject/{id}', 'getSubject');
    });

    Route::controller(AssignmentController::class)->group(function () {
        Route::get('/downloadFile/{file}', 'download');
    });
    Route::get('/downloadMaterialFile/{file}', 'MaterialController@download')->name('downloadMaterialFile');
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'contact');
        Route::post('/contact_add', 'contactotadmin');
        Route::get('/get_contact/{id}', 'getContact');
        Route::put('/apply_reply/{id}', 'applyReply');
        Route::delete('/contact_delete/{id}', 'contact_delete');
        Route::get('/teacher_salary/', 'teacher_salary');
        Route::get('/teacher_attendance', 'teacher_attendance');
        Route::post('/teacher_attendance_add', 'teacher_attendance_add');
        Route::get('/add_salary', 'add_salary');
        Route::post('/salary_add', 'salary_add');
        Route::post('/check_teacher_attendance', 'check_teacher_attendance');
        Route::get('/history_salary', 'history_salary');
    });
    Route::controller(FeeController::class)->group(function () {
        Route::get('/generate_voucher', 'generate_voucher');
        Route::get('/get_batch/{id}', 'get_batch');
        Route::get('/get_students/{id}', 'get_students');
        Route::post('/voucher_getting', 'voucher_getting');
        Route::get('/pay_fee', 'fees_add');
        Route::get('/delay_fee', 'fees_delay');
        Route::get('/applying_fee/{id}', 'applying_fee');
        Route::get('/all_fee', 'all_fee');
        Route::get('/fee-confirm/{id}', 'fee_confirm');
        Route::get('/fee-details/{id}', 'feeDetails');
        Route::get('/delay_fee_notice', 'delayFeesNotification');
        Route::get('/over_all', 'over_all');
        Route::get('/all_vouchers','all_vouchers');
        Route::get('/voucher-details/{id}','voucher_detail');
    });
    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/present_student/{id}', 'present_std');
        Route::get('/absent_student/{id}', 'absent_std');
        Route::get('/all_attendance', 'all_attendance');
        Route::post('/program_based_students', 'program_based_students');
    });
    Route::controller(StudentPortalContoller::class)->group(function () {
        Route::get('/student_teacher/', 'student_teacher');
        Route::get('/student_attendance/', 'student_attendance');
        Route::get('/student_syllabus/', 'student_syllabus');
        Route::get('/student_material/', 'student_material');
        Route::get('/student_assignments/', 'student_assignments');
        Route::get('/student_notice/', 'student_notice');
        Route::get('/student_contact/', 'student_contact');
        Route::get('/student_tests/', 'student_tests');
        Route::get('/student_status/{id}', 'student_status');
        Route::get('/student_voucher', 'student_voucher');
        Route::get('/fee_history', 'fee_history');
    });
    Route::controller(DayBookController::class)->group(function () {
        Route::get('/day_book_category', 'dayBookCategory');
        Route::post('/category_add', 'category_add');
        Route::get('/report_daybook', 'report_daybook');
        Route::get('/select_period/{value}', 'selectPeriod');
    });
    Route::controller(NotificationController::class)->group(function () {
        Route::get('/general_sms', 'general_sms');
        Route::get('/reminder', 'reminder');
        Route::get('/holidays', 'holidays');
        Route::post('/add_general_sms', 'add_general_sms');
    });
    Route::controller(Holidays_Reminder::class)->group(function () {
        Route::get('/holiday_view', 'holiday_view');
        Route::get('/holiday_add', 'holiday_add');
        Route::get('/reminder_view', 'reminder_view');
        Route::get('/reminder_add', 'reminder_add');
        Route::post('/reminder_create', 'reminder_create');
        Route::post('/holiday_create', 'holiday_create');
        Route::get('/fee_reminder_view', 'fee_reminder_view');
        Route::get('/fee_reminder_update/{id}', 'fee_reminder_update');
        Route::put('/fee_reminder_create/{id}', 'fee_reminder_create');
    });
    Route::controller(ReprotController::class)->group(function () {
        Route::get('/student_report', 'student_report');
        Route::get('/staff_report', 'staff_report');
        Route::get('/expences_report', 'expences_report');
        Route::get('/select_students/{value}', 'select_students');
        Route::get('/select_teacher/{value}', 'select_teacher');
        Route::get('/profit_loss', 'profit_loss');
        Route::get('/get_profit_loss/{value}', 'get_profit_loss');
        Route::get('/fee_report','fee_report');
        Route::get('/class_based_students/{id}','class_based_students');
        Route::get('/select_students_fee_report/{value}','select_students_fee_report');
    });
    Route::get('/download-pdf/{filename}', function ($filename) {
        $file = public_path('vouchers/' . $filename);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];
        return Response::download($file, $filename, $headers);
    })->name('download.pdf');
});
