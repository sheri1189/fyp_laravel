<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ url('/dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt="" height="80">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt="Logo Not Found" height="80">
            </span>
        </a>
        <a href="{{ url('/dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt="" height="80">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt="Logo Not Found" height="80">
            </span>
            22 </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                @php
                    $user = DB::table('users')
                        ->where('id', session()->get('user_added'))
                        ->first();
                @endphp
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                @if ($user->role_assign == 'Admin')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @elseif($user->role_assign == 'Student')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/student_dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/teacher_dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @endif
                @if ($user->role_assign == 'Admin')
                    <li class="menu-title"><span data-key="t-menu">Courses</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarDegree') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarDegree">
                            <i class="fa-solid fa-list-check"></i> <span data-key="t-dashboards">Degree</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDegree">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/degree/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Degree</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/degree') }}" class="nav-link" data-key="t-crm">
                                        View Degrees </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarClass') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarClass">
                            <i class="fa-solid fa-bars-progress"></i> <span data-key="t-dashboards">Class</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarClass">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/program/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Class</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/program') }}" class="nav-link" data-key="t-crm">
                                        View Classes </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarGroup') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarGroup">
                            <i class="fa-brands fa-discourse"></i> <span data-key="t-dashboards">Group</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarGroup">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/courses/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Group</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/courses') }}" class="nav-link" data-key="t-crm">
                                        View Groups </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarRoom') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarRoom">
                            <i class="fa-solid fa-section"></i> <span data-key="t-dashboards">Room</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarRoom">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/classes/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Room</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/classes') }}" class="nav-link" data-key="t-crm">
                                        View Rooms </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Staff</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarInquiry') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarInquiry">
                            <i class="fa-solid fa-clipboard-question"></i> <span data-key="t-dashboards">Inquiry</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarInquiry">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/inquiry/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Inquiry</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/inquiry') }}" class="nav-link" data-key="t-crm">
                                        View Inquiries </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStudent') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarStudent">
                            <i class="fa-solid fa-graduation-cap"></i> <span data-key="t-dashboards">Student</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStudent">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/student') }}" class="nav-link" data-key="t-crm">
                                        View Students </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/active_students') }}" class="nav-link" data-key="t-crm">
                                        Active Students </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/students_leave') }}" class="nav-link" data-key="t-crm">
                                        Students Leave </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStaff') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarStaff">
                            <i class="fa-sharp fa-solid fa-person"></i> <span data-key="t-dashboards">Staff</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStaff">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/staff/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Staff</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/staff') }}" class="nav-link" data-key="t-crm">
                                        View Staffs </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarTeacher') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarTeacher">
                            <i class="fa-solid fa-person-chalkboard"></i> <span data-key="t-dashboards">Teacher</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTeacher">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/teacher/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/teacher') }}" class="nav-link" data-key="t-crm">
                                        View Teachers </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Teacher Salary</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarTeacherSalary') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarTeacherSalary">
                            <i class="fa-solid fa-person-chalkboard"></i> <span data-key="t-dashboards">Teacher
                                Salary</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTeacherSalary">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/teacher_attendance') }}" class="nav-link"
                                        data-key="t-analytics">
                                        Teacher Attendance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/teacher_salary') }}" class="nav-link" data-key="t-analytics">
                                        Teacher Salary</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Fee Management</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarFeeManagement') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarFeeManagement">
                            <i class="fas fa-rupee-sign"></i> <span data-key="t-dashboards">Fee Management</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarFeeManagement">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/generate_voucher') }}" class="nav-link"
                                        data-key="t-analytics">
                                        Generate Voucher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/all_vouchers') }}" class="nav-link"
                                        data-key="t-analytics">
                                        All Vouchers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/pay_fee') }}" class="nav-link" data-key="t-analytics">
                                        Fee Pay</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/all_fee') }}" class="nav-link" data-key="t-analytics">
                                        All Fee</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('/delay_fee') }}" class="nav-link" data-key="t-crm">
                                        Fee Reminder </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Notifications</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarNotifications') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarNotifications">
                            <i class="fas fa-bell"></i> <span data-key="t-dashboards">Notifications</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarNotifications">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/general_sms') }}" class="nav-link" data-key="t-analytics">
                                        General SMS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/reminder_view') }}" class="nav-link" data-key="t-analytics">
                                        Reminder</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/holiday_view') }}" class="nav-link" data-key="t-analytics">
                                        Holidays</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/fee_reminder_view') }}" class="nav-link"
                                        data-key="t-analytics">
                                        Late Fee Reminder</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('/delay_fee') }}" class="nav-link" data-key="t-crm">
                                        Fee Reminder </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($user->role_assign == 'Admin')
                    <li class="menu-title"><span data-key="t-menu">Day Book</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarDayBook') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarDayBook">
                            <i class="fa-solid fa-book"></i> <span data-key="t-dashboards">Day Book</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDayBook">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/day_book/create') }}" class="nav-link" data-key="t-crm">
                                        Manage Day Book</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/day_book_category') }}" class="nav-link" data-key="t-crm">
                                        Day Book Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/report_daybook') }}" class="nav-link" data-key="t-crm">
                                        Day Book Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="menu-title"><span data-key="t-menu">Management</span></li>
                @if ($user->role_assign == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarBooks') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarBooks">
                            <i class="fa-solid fa-book"></i> <span data-key="t-dashboards">Books</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarBooks">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/books/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Books</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/books') }}" class="nav-link" data-key="t-crm">
                                        View Books</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($user->role_assign == 'Teacher')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarAttendance') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarAttendance">
                            <i class="fa-solid fa-clipboard-user"></i> <span data-key="t-dashboards">Attendance</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAttendance">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/attendance/create') }}" class="nav-link"
                                        data-key="t-analytics">
                                        Add Attendance</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/attendance') }}" class="nav-link" data-key="t-crm">
                                        View Attendance</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($user->role_assign == 'Admin' || $user->role_assign == 'Teacher')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarSyllabus') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarSyllabus">
                            <i class="fa-solid fa-chalkboard-user"></i> <span data-key="t-dashboards">Syllabus</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarSyllabus">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/syllabus/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Syllabus</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/syllabus') }}" class="nav-link" data-key="t-crm">
                                        View Syllabus</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarAssignments') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarAssignments">
                            <i class="fa-brands fa-atlassian"></i> <span data-key="t-dashboards">Assignments</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAssignments">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/assignments/create') }}" class="nav-link"
                                        data-key="t-analytics">
                                        Add Assignments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/assignments') }}" class="nav-link" data-key="t-crm">
                                        View Assignments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarMaterial') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMaterial">
                            <i class="fa-solid fa-recycle"></i> <span data-key="t-dashboards">Material</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMaterial">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/material/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Material</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/material') }}" class="nav-link" data-key="t-crm">
                                        View Material</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarTest_Schedule') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarTest_Schedule">
                            <i class="fa-solid fa-vials"></i> <span data-key="t-dashboards">Test
                                Schedule</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTest_Schedule">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/test/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Test</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/test') }}" class="nav-link" data-key="t-crm">
                                        View Tests</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($user->role_assign == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarTime_Table') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarTime_Table">
                            <i class="fa-solid fa-calendar-days"></i> <span data-key="t-dashboards">Time
                                Table</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarTime_Table">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/time/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Time Table</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/time') }}" class="nav-link" data-key="t-crm">
                                        View Time Table</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarNotice') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarNotice">
                            <i class="fa-solid fa-circle-exclamation"></i> <span data-key="t-dashboards">Notice
                                Board</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarNotice">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/notice/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Notice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/notice') }}" class="nav-link" data-key="t-crm">
                                        View Notice</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarBlog') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarBlog">
                            <i class="fa-solid fa-blog"></i> <span data-key="t-dashboards">Blog</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarBlog">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/blog/create') }}" class="nav-link" data-key="t-analytics">
                                        Add Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/blog') }}" class="nav-link" data-key="t-crm">
                                        View Blogs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarContact') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarContact">
                            <i class="fa-solid fa-address-book"></i> <span data-key="t-dashboards">Contact</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarContact">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/contact') }}" class="nav-link" data-key="t-crm">
                                        View Contact</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarReports') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarReports">
                            <i class="fa-solid fa-address-book"></i> <span data-key="t-dashboards">Reports</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarReports">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/fee_report') }}" class="nav-link" data-key="t-crm">
                                        Student Fee Report</a>
                                        <a href="{{ url('/student_report') }}" class="nav-link" data-key="t-crm">
                                            Student Report</a>
                                    <a href="{{ url('/staff_report') }}" class="nav-link" data-key="t-crm">
                                        Staff Report</a>
                                    <a href="{{ url('/expences_report') }}" class="nav-link" data-key="t-crm">
                                        Expenses & Revenue Report</a>
                                    <a href="{{ url('/profit_loss') }}" class="nav-link" data-key="t-crm">
                                        Profit & Loss Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($user->role_assign == 'Student')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStudentTeacher') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarStudentTeacher">
                            <i class="fa-solid fa-person-chalkboard"></i> <span data-key="t-dashboards">Teacher</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStudentTeacher">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_teacher') }}" class="nav-link" data-key="t-crm">
                                        View Teachers </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStdAttendance') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarStdAttendance">
                            <i class="fa-solid fa-clipboard-user"></i> <span data-key="t-dashboards">Attendance</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStdAttendance">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_attendance') }}" class="nav-link" data-key="t-crm">
                                        View Attendance</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStdSyllabus') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarStdSyllabus">
                            <i class="fa-solid fa-chalkboard-user"></i> <span data-key="t-dashboards">Syllabus</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStdSyllabus">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_syllabus') }}" class="nav-link" data-key="t-crm">
                                        View Syllabus</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStdMaterial') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarStdMaterial">
                            <i class="fa-solid fa-recycle"></i> <span data-key="t-dashboards">Material</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStdMaterial">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_material') }}" class="nav-link" data-key="t-crm">
                                        View Material</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStdAssignments') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarStdAssignments">
                            <i class="fa-brands fa-atlassian"></i> <span data-key="t-dashboards">Assignments</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStdAssignments">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_assignments') }}" class="nav-link" data-key="t-crm">
                                        View Assignments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStdTests') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarStdTests">
                            <i class="fa-solid fa-vials"></i> <span data-key="t-dashboards">Test Schedule</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStdTests">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_tests') }}" class="nav-link" data-key="t-crm">
                                        View Schedule</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if ($user->role_assign == 'Student' || $user->role_assign == 'Teacher')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarNotice') }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarNotice">
                            <i class="fa-solid fa-circle-exclamation"></i> <span data-key="t-dashboards">Notice
                                Board</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarNotice">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_notice') }}" class="nav-link" data-key="t-crm">
                                        View Notices</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ url('#sidebarStdContact') }}"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarStdContact">
                            <i class="fa-solid fa-address-book"></i> <span data-key="t-dashboards">Contact</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarStdContact">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ url('/student_contact') }}" class="nav-link" data-key="t-crm">
                                        Contact To Admin</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if($user->role_assign == 'Teacher')
                <li class="menu-title"><span data-key="t-menu">History Salary</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/history_salary') }}">
                        <i class="fas fa-rupee-sign"></i> <span data-key="t-dashboards">Salary History</span>
                    </a>
                </li>
                @endif
                @if($user->role_assign == 'Student')
                <li class="menu-title"><span data-key="t-menu">Fee Voucher</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/student_voucher') }}">
                        <i class="fas fa-rupee-sign"></i> <span data-key="t-dashboards">Get Fee Voucher</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('/fee_history') }}">
                        <i class="fas fa-rupee-sign"></i> <span data-key="t-dashboards">Fee History</span>
                    </a>
                </li>
                @endif
                {{-- <li class="menu-title"><span data-key="t-menu">User Management</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('#sidebarRole') }}" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="fa-solid fa-person-chalkboard"></i> <span data-key="t-dashboards">Role</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarRole">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/role/create') }}" class="nav-link" data-key="t-analytics">
                                    Add Role</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('##') }}" class="nav-link" data-key="t-crm">
                                    View Roles </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('#sidebarUser') }}" data-bs-toggle="collapse"
                        User="button" aria-expanded="false" aria-controls="sidebarUser">
                        <i class="fa-solid fa-person-chalkboard"></i> <span data-key="t-dashboards">User</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/user_add') }}" class="nav-link" data-key="t-analytics">
                                    Add User</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('##') }}" class="nav-link" data-key="t-crm">
                                    View Users </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
