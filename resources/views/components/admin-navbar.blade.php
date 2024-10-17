<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ url('/admin/dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt=""
                                height="80">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt="Logo Not Found"
                                height="80">
                        </span>
                    </a>

                    <a href="{{ url('/admin/dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt=""
                                height="80">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}" alt="Logo Not Found"
                                height="80">
                        </span>
                    </a>
                </div>

                {{-- <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button> --}}
                @php
                    $user = DB::table('users')
                        ->where('id', session()->get('user_added'))
                        ->first();
                @endphp
                <div class="btn-group">
                    <button type="button" class="btn btn-light text-dark dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-list"></i> Quick Access</button>
                    <div class="dropdown-menu">
                        @if ($user->role_assign == 'Admin')
                            <a class="dropdown-item" href="{{ url('/degree') }}"><i class="fas fa-arrow-right"></i>
                                Degree</a>
                            <a class="dropdown-item" href="{{ url('/program') }}"><i class="fas fa-arrow-right"></i>
                                Class</a>
                            <a class="dropdown-item" href="{{ url('/courses') }}"><i class="fas fa-arrow-right"></i>
                                Group</a>
                            <a class="dropdown-item" href="{{ url('/classes') }}"><i class="fas fa-arrow-right"></i>
                                Room</a>
                            <a class="dropdown-item" href="{{ url('/query') }}"><i class="fas fa-arrow-right"></i>
                                Query</a>
                            <a class="dropdown-item" href="{{ url('/student') }}"><i class="fas fa-arrow-right"></i>
                                Student</a>
                            <a class="dropdown-item" href="{{ url('/teacher') }}"><i class="fas fa-arrow-right"></i>
                                Teacher</a>
                            <a class="dropdown-item" href="{{ url('/staff') }}"><i class="fas fa-arrow-right"></i>
                                Staff</a>
                            <a class="dropdown-item" href="{{ url('/teacher_salary') }}"><i
                                    class="fas fa-arrow-right"></i>
                                Teacher
                                Salary</a>
                            <a class="dropdown-item" href="{{ url('/all_fee') }}"><i class="fas fa-arrow-right"></i>
                                Fee
                                Management</a>
                            <a class="dropdown-item" href="{{ url('/genera_sms') }}"><i class="fas fa-arrow-right"></i>
                                Notifications</a>
                            <a class="dropdown-item" href="{{ url('/report_daybook') }}"><i
                                    class="fas fa-arrow-right"></i>
                                Day Book</a>
                            <a class="dropdown-item" href="{{ url('/books') }}"><i class="fas fa-arrow-right"></i>
                                Books</a>
                            <a class="dropdown-item" href="{{ url('/attendance') }}"><i class="fas fa-arrow-right"></i>
                                Attendance</a>
                            <a class="dropdown-item" href="{{ url('/syllabus') }}"><i class="fas fa-arrow-right"></i>
                                Syllabus</a>
                            <a class="dropdown-item" href="{{ url('/time') }}"><i class="fas fa-arrow-right"></i>
                                Time Table</a>
                            <a class="dropdown-item" href="{{ url('/blog') }}"><i class="fas fa-arrow-right"></i>
                                Blog & News</a>
                        @elseif($user->role_assign == 'Teacher')
                            <a class="dropdown-item" href="{{ url('/attendance') }}"><i class="fas fa-arrow-right"></i>
                                Attendance</a>
                            <a class="dropdown-item" href="{{ url('/syllabus') }}"><i class="fas fa-arrow-right"></i>
                                Syllabus</a>
                            <a class="dropdown-item" href="{{ url('/assignments') }}"><i
                                    class="fas fa-arrow-right"></i>
                                Assignments</a>
                            <a class="dropdown-item" href="{{ url('/material') }}"><i class="fas fa-arrow-right"></i>
                                Material</a>
                            <a class="dropdown-item" href="{{ url('/test') }}"><i class="fas fa-arrow-right"></i>
                                Test Schedule</a>
                        @else
                            <a class="dropdown-item" href="{{ url('/student_teacher') }}"><i
                                    class="fas fa-arrow-right"></i>
                                View Teachers</a>
                            <a class="dropdown-item" href="{{ url('/student_attendance') }}"><i
                                    class="fas fa-arrow-right"></i>
                                View Attendance</a>
                            <a class="dropdown-item" href="{{ url('/student_syllabus') }}"><i
                                    class="fas fa-arrow-right"></i>
                                View Syllabus</a>
                            <a class="dropdown-item" href="{{ url('/student_material') }}"><i
                                    class="fas fa-arrow-right"></i>
                                View Material</a>
                            <a class="dropdown-item" href="{{ url('/student_assignments') }}"><i
                                    class="fas fa-arrow-right"></i>
                                View Assignments</a>
                            <a class="dropdown-item" href="{{ url('/student_tests') }}"><i
                                    class="fas fa-arrow-right"></i>
                                Test Schedule</a> <a class="dropdown-item" href="{{ url('/student_notice') }}"><i
                                    class="fas fa-arrow-right"></i>
                                Notice Board</a>
                            <a class="dropdown-item" href="{{ url('/student_contact') }}"><i
                                    class="fas fa-arrow-right"></i>
                                Contact To Admin</a>
                        @endif
                    </div>
                </div>
                <div class="btn-group">
                    @php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $session = $currentYear . '-' . substr($nextYear, -2);
                    @endphp
                    <button type="button" class="btn btn-light text-dark dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i>
                        {{ $session }}</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item">{{ $session }}</a>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>
                @if ($user->role_assign == 'Admin')
                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-bell fs-22'></i>
                            @php
                                $contacts_count = DB::table('contacts')
                                    ->where('status', 'Pending')
                                    ->count();
                            @endphp
                            <span
                                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">{{ $contacts_count }}<span
                                    class="visually-hidden">unread messages</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                        </div>
                                        <div class="col-auto dropdown-tabs">
                                            <span class="fs-13 text-white"> {{ $contacts_count }} New</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-2 pt-2">
                                    <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                        id="notificationItemsTab" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                                href="{{ url('#all-noti-tab') }}" role="tab"
                                                aria-selected="true">
                                                All ({{ $contacts_count }})
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="tab-content position-relative" id="notificationItemsTabContent">
                                <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        <div
                                            class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    @php
                                                        $allcontacts = DB::table('contacts')
                                                            ->where('status', 'Pending')
                                                            ->get();
                                                    @endphp
                                                    @foreach ($allcontacts as $contact)
                                                        <a href="{{ url('/contact') }}" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 lh-base">
                                                                {{ implode(' ', array_slice(explode(' ', $contact->message), 0, 4)) }}{{ '...' }}
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> Just
                                                                {{ $contact->date }} ago</span>
                                                        </p>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            @if ($user->role_assign == 'Teacher')
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('/admin/assets/images/instructors/' . $user->teacher_picture) }}"
                                    alt="Header Avatar">
                            @elseif($user->role_assign == 'Student')
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('/admin/assets/images/instructors/' . $user->teacher_picture) }}"
                                    alt="Header Avatar">
                            @else
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('/admin/assets/images/users/dummy.jpg') }}" alt="Header Avatar">
                            @endif
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ $user->name }}</span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ $user->role_assign }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{ $user->name }}!</h6>
                        <a class="dropdown-item" href="{{ url('/profile') }}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
</header>
