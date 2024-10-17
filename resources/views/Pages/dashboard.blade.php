@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                    <div class="page-title-right">
                        @php
                            date_default_timezone_set('Asia/Karachi');
                            $now = date('l j F Y');
                        @endphp
                        <h3 style="text-transform:capitalize">{{ $now }}</h3>
                        <h4 class="digital-clock" id="digital-clock"></h4>
                    </div>

                </div>
            </div>
        </div>
        @if ($user->role_assign == 'Admin')
            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        @php
                                            date_default_timezone_set('Asia/Karachi');
                                            $currentHour = date('G');
                                            $greeting;
                                        @endphp
                                        @if ($currentHour >= 5 && $currentHour < 12)
                                            @php
                                                $greeting = 'Good Morning';
                                            @endphp
                                        @elseif ($currentHour >= 12 && $currentHour < 17)
                                            @php
                                                $greeting = 'Good Afternoon';
                                            @endphp
                                        @elseif ($currentHour >= 17 && $currentHour < 19)
                                            @php
                                                $greeting = 'Good Evening';
                                            @endphp
                                        @else
                                            @php
                                                $greeting = 'Good Night';
                                            @endphp
                                        @endif
                                        <h4 class="fs-16 mb-1">{{ $greeting }}, {{ $user->name }}!</h4>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Total Query</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="{{ $totalquery }}">0</span>
                                                </h2>
                                                <a href="{{ url('/query') }}"
                                                    class="text-decoration-underline text-white">View
                                                    all Query</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fa-solid fa-clipboard-question"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Active Students</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="{{ $totalstudent }}">0</span>
                                                </h2>
                                                <a href="{{ url('/student') }}"
                                                    class="text-decoration-underline text-white">View
                                                    all Students</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Total Staff</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="{{ $totalstaff }}">0</span>
                                                </h2>
                                                <a href="{{ url('/teacher') }}"
                                                    class="text-decoration-underline text-white">View
                                                    all Staff</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fas fa-users"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-animate bg-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-white-50 mb-0">Total Contacts</p>
                                                <h2 class="mt-4 ff-secondary fw-semibold text-white"><span
                                                        class="counter-value" data-target="{{ $totalcontact }}">0</span>
                                                </h2>
                                                <a href="{{ url('/contact') }}"
                                                    class="text-decoration-underline text-white">View
                                                    all Contacts</a>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="fs-15 fw-semibold">Employees</h5>
                                        <div class="d-flex flex-wrap justify-content-evenly">
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-success rounded-pill" style="height: 17px;">
                                                {{ $totalteacher }}</div>
                                            Total
                                            Employees
                                            </p>
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-info rounded-pill" style="height: 17px;">
                                                {{ $malestaff }}</div>
                                            Male
                                            Employees
                                            </p>
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-primary rounded-pill" style="height: 17px;">
                                                {{ $femalestaff }}</div>
                                            Female
                                            Employees
                                            </p>
                                        </div>
                                    </div>
                                    <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                                        <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                        <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar rounded-0" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        @php
                                            $currentYear = date('Y');
                                            $nextYear = $currentYear + 1;
                                            $session = $currentYear . '-' . substr($nextYear, -2);
                                        @endphp
                                        <h5 class="fs-15 fw-semibold">Students {{ $session }}</h5>
                                        <div class="d-flex flex-wrap justify-content-evenly">
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-success rounded-pill" style="height: 17px;">
                                                {{ $totalStudentsThisYear }}</div>
                                            Total
                                            Students
                                            </p>
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-info rounded-pill" style="height: 17px;">
                                                {{ $malestudent }}</div>
                                            Male Students
                                            </p>
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-primary rounded-pill" style="height: 17px;">
                                                {{ $femalestudent }}</div>
                                            Female Students
                                            </p>
                                        </div>
                                    </div>
                                    <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                                        <div class="progress-bar bg-success rounded-0" role="progressbar"
                                            style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                        <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar rounded-0" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="fs-15 fw-semibold">Classes</h5>
                                        <div class="d-flex flex-wrap justify-content-evenly">
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-success rounded-pill" style="height: 17px;">
                                                {{ $allclasses }}</div>
                                            Total
                                            Classes
                                            </p>
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-info rounded-pill" style="height: 17px;">
                                                {{ $allclasses }}</div>
                                            Total
                                            Progress
                                            </p>
                                            <p class="text-muted mb-0">
                                            <div class="badge bg-primary rounded-pill" style="height: 17px;">
                                                {{ $allclasses }}</div>
                                            To Do
                                            </p>

                                        </div>
                                    </div>
                                    <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                                        <div class="progress-bar bg-success rounded-0" role="progressbar"
                                            style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                        <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 25%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar rounded-0" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xl-6">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex bg-primary">
                                        <h4 class="card-title mb-0 flex-grow-1 text-white">Students Fee Summary</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div data-simplebar style="max-height: 257px;">
                                            <ul class="list-group list-group-flush border-dashed px-3">
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="form-check ps-0 flex-sharink-0">
                                                            <i class="fas fa-check-double"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2"
                                                                for="task_one">Total Students</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">
                                                            <h5><span class="badge bg-success">{{ $totalstudent }}</span>
                                                            </h5>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item ps-0">
                                                    @php
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($studentstotal as $stds)
                                                        @php
                                                            $total += $stds->student_after_discount_fee;
                                                        @endphp
                                                    @endforeach
                                                    <div class="d-flex align-items-start">
                                                        <div class="form-check ps-0 flex-sharink-0">
                                                            <i class="fas fa-check-double"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2"
                                                                for="task_two">Total Fee Amount</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">
                                                            <h5><span class="badge bg-primary">{{ 'Rs.' . $total }}</span>
                                                            </h5>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><!-- end ul -->
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <div class="col-xl-6">
                                <div class="card card-height-100">
                                    @php
                                        $allfeeconfirmed = \App\Models\Fee::where('fee_status', 'Paid')->get();
                                        $total_confirmed_fee = 0;

                                        foreach ($allfeeconfirmed as $allconfimed) {
                                            $user = \App\Models\User::where('id', $allconfimed->student_id)->first();

                                            if ($user) {
                                                $total_confirmed_fee += $user->student_after_discount_fee;
                                            }
                                        }

                                        $allfeeawaiting = \App\Models\Fee::where('fee_status', 'Awating')->get();
                                        $total_awaiting_fee = 0;

                                        foreach ($allfeeawaiting as $allawaiting) {
                                            $user = \App\Models\User::where('id', $allawaiting->student_id)->first();

                                            if ($user) {
                                                $total_awaiting_fee += $user->student_after_discount_fee;
                                            }
                                        }
                                    @endphp

                                    <div class="card-header align-items-center d-flex bg-primary">
                                        <h4 class="card-title mb-0 flex-grow-1 text-white">Fee Collection Summary</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div data-simplebar style="max-height: 257px;">
                                            <ul class="list-group list-group-flush border-dashed px-3">
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="form-check ps-0 flex-sharink-0">
                                                            <i class="fas fa-check-double"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_one">Paid
                                                                Fee
                                                                Collection</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">
                                                            <h5><span
                                                                    class="badge bg-success">{{ 'Rs.' . $total_confirmed_fee }}</span>
                                                            </h5>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="form-check ps-0 flex-sharink-0">
                                                            <i class="fas fa-check-double"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2"
                                                                for="task_one">Awaiting Fee
                                                                Collection</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">
                                                            <h5><span
                                                                    class="badge bg-success">{{ 'Rs.' . $total_awaiting_fee }}</span>
                                                            </h5>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                @php
                                                    $alldaybook = \App\Models\Day_Book::where('added_from', session()->get('user_added'))->get();
                                                    $daybook = 0;
                                                    foreach ($alldaybook as $dayboook) {
                                                        $daybook += $dayboook->amount;
                                                    }
                                                @endphp
                                                <li class="list-group-item ps-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="form-check ps-0 flex-sharink-0">
                                                            <i class="fas fa-check-double"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <label class="form-check-label mb-0 ps-2" for="task_two">Day
                                                                Book Expences</label>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <p class="text-muted fs-12 mb-0">
                                                            <h5><span
                                                                    class="badge bg-primary">{{ 'Rs.' . $daybook }}</span>
                                                            </h5>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul><!-- end ul -->
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Class Wise Students</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="simple_pie_chart"
                                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Admission Wise Students</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="monochrome_pie_chart" data-colors='["--vz-primary"]' class="apex-charts"
                                    dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Fee Overview</h4>
                            </div>
                            <div class="card-body p-0 pb-2">
                                <div class="w-100">
                                    <div id="customer_impression_charts"
                                        data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' class="apex-charts"
                                        dir="ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-height-100">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Latest Courses</h4>
                                <div class="flex-shrink-0">
                                    <a href="{{ url('/courses') }}" type="button"
                                        class="btn btn-soft-primary btn-sm">Latest Courses</a>
                                </div>
                            </div>
                            <div class="card-body">
                                @forelse ($allcourses as $course)
                                    <div class="d-flex align-items-center mt-3 gap-2">
                                        <img src="{{ asset('admin/assets/images/courses/' . $course->course_picture) }}"
                                            alt="avtart not foun" class="rounded-circle avatar-xs">
                                        <div class="flex-grow-1">
                                            <p class="font-weight-bold mb-0">{{ ucfirst($course->course_title) }}</p>
                                            <span></span>
                                            <h6><span class="badge bg-light text-dark mb-0">
                                                    {{ 'Rs.' . $course->course_price }} </span> <span
                                                    class="badge bg-light text-dark mb-0">
                                                    {{ 'Duration : ' . $course->course_duration }}</span></h6>
                                        </div>
                                    </div>
                                    <hr>
                                @empty
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 fw-bold">Not Yet Updated Courses</h6>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@if (session('success') == 200)
    @section('script')
        <script>
            $(document).ready(function() {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    title: "Welcome to AMS | The Nest Academy...!",
                    animation: false,
                    position: "top-right",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });

                function getChartColorsArray(e) {
                    if (null !== document.getElementById(e)) {
                        var t = document.getElementById(e).getAttribute("data-colors");
                        if (t)
                            return (t = JSON.parse(t)).map(function(e) {
                                var t = e.replace(" ", "");
                                return -1 === t.indexOf(",") ?
                                    getComputedStyle(
                                        document.documentElement
                                    ).getPropertyValue(t) || t :
                                    2 == (e = e.split(",")).length ?
                                    "rgba(" +
                                    getComputedStyle(
                                        document.documentElement
                                    ).getPropertyValue(e[0]) +
                                    "," +
                                    e[1] +
                                    ")" :
                                    t;
                            });
                        console.warn("data-colors atributes not found on", e);
                    }
                }
                var fee_data = @json($fee_series);
                var options,
                    chart,
                    worldemapmarkers,
                    overlay,
                    linechartcustomerColors = getChartColorsArray("customer_impression_charts"),
                    chartDonutBasicColors =
                    (linechartcustomerColors &&
                        ((options = {
                                series: [{
                                    name: "Fee Overview",
                                    type: "bar",
                                    data: fee_data
                                }, ],
                                chart: {
                                    height: 370,
                                    type: "line",
                                    toolbar: {
                                        show: !1
                                    }
                                },
                                stroke: {
                                    curve: "straight",
                                    dashArray: [0, 0, 8],
                                    width: [2, 0, 2.2],
                                },
                                fill: {
                                    opacity: [0.1, 0.9, 1]
                                },
                                markers: {
                                    size: [0, 0, 0],
                                    strokeWidth: 2,
                                    hover: {
                                        size: 4
                                    },
                                },
                                xaxis: {
                                    categories: [
                                        "Jan",
                                        "Feb",
                                        "Mar",
                                        "Apr",
                                        "May",
                                        "Jun",
                                        "Jul",
                                        "Aug",
                                        "Sep",
                                        "Oct",
                                        "Nov",
                                        "Dec",
                                    ],
                                    axisTicks: {
                                        show: !1
                                    },
                                    axisBorder: {
                                        show: !1
                                    },
                                },
                                grid: {
                                    show: !0,
                                    xaxis: {
                                        lines: {
                                            show: !0
                                        }
                                    },
                                    yaxis: {
                                        lines: {
                                            show: !1
                                        }
                                    },
                                    padding: {
                                        top: 0,
                                        right: -2,
                                        bottom: 15,
                                        left: 10
                                    },
                                },
                                legend: {
                                    show: !0,
                                    horizontalAlign: "center",
                                    offsetX: 0,
                                    offsetY: -5,
                                    markers: {
                                        width: 9,
                                        height: 9,
                                        radius: 6
                                    },
                                    itemMargin: {
                                        horizontal: 10,
                                        vertical: 0
                                    },
                                },
                                plotOptions: {
                                    bar: {
                                        columnWidth: "30%",
                                        barHeight: "70%"
                                    }
                                },
                                colors: linechartcustomerColors,
                                tooltip: {
                                    shared: !0,
                                    y: [{
                                            formatter: function(e) {
                                                return void 0 !== e ? e.toFixed(0) : e;
                                            },
                                        },
                                        {
                                            formatter: function(e) {
                                                return void 0 !== e ?
                                                    e.toFixed(2) :
                                                    e;
                                            },
                                        },
                                        {
                                            formatter: function(e) {
                                                return void 0 !== e ?
                                                    e.toFixed(0) + " Sales" :
                                                    e;
                                            },
                                        },
                                    ],
                                },
                            }),
                            (chart = new ApexCharts(
                                document.querySelector("#customer_impression_charts"),
                                options
                            )).render()),
                        getChartColorsArray("store-visits-source")),
                    vectorMapWorldMarkersColors =
                    (chartDonutBasicColors &&
                        ((options = {
                                series: [44, 55, 41, 17, 15],
                                labels: ["Direct", "Social", "Email", "Other", "Referrals"],
                                chart: {
                                    height: 333,
                                    type: "donut"
                                },
                                legend: {
                                    position: "bottom"
                                },
                                stroke: {
                                    show: !1
                                },
                                dataLabels: {
                                    dropShadow: {
                                        enabled: !1
                                    }
                                },
                                colors: chartDonutBasicColors,
                            }),
                            (chart = new ApexCharts(
                                document.querySelector("#store-visits-source"),
                                options
                            )).render()),
                        getChartColorsArray("sales-by-locations")),
                    swiper =
                    (vectorMapWorldMarkersColors &&
                        (worldemapmarkers = new jsVectorMap({
                            map: "world_merc",
                            selector: "#sales-by-locations",
                            zoomOnScroll: !1,
                            zoomButtons: !1,
                            selectedMarkers: [0, 5],
                            regionStyle: {
                                initial: {
                                    stroke: "#9599ad",
                                    strokeWidth: 0.25,
                                    fill: vectorMapWorldMarkersColors[0],
                                    fillOpacity: 1,
                                },
                            },
                            markersSelectable: !0,
                            markers: [{
                                    name: "Palestine",
                                    coords: [31.9474, 35.2272]
                                },
                                {
                                    name: "Russia",
                                    coords: [61.524, 105.3188]
                                },
                                {
                                    name: "Canada",
                                    coords: [56.1304, -106.3468]
                                },
                                {
                                    name: "Greenland",
                                    coords: [71.7069, -42.6043]
                                },
                            ],
                            markerStyle: {
                                initial: {
                                    fill: vectorMapWorldMarkersColors[1]
                                },
                                selected: {
                                    fill: vectorMapWorldMarkersColors[2]
                                },
                            },
                            labels: {
                                markers: {
                                    render: function(e) {
                                        return e.name;
                                    },
                                },
                            },
                        })),
                        new Swiper(".vertical-swiper", {
                            slidesPerView: 2,
                            spaceBetween: 10,
                            mousewheel: !0,
                            loop: !0,
                            direction: "vertical",
                            autoplay: {
                                delay: 2500,
                                disableOnInteraction: !1
                            },
                        })),
                    layoutRightSideBtn = document.querySelector(".layout-rightside-btn");
                layoutRightSideBtn &&
                    (Array.from(document.querySelectorAll(".layout-rightside-btn")).forEach(
                            function(e) {
                                var t = document.querySelector(".layout-rightside-col");
                                e.addEventListener("click", function() {
                                    t.classList.contains("d-block") ?
                                        (t.classList.remove("d-block"), t.classList.add("d-none")) :
                                        (t.classList.remove("d-none"),
                                            t.classList.add("d-block"));
                                });
                            }
                        ),
                        window.addEventListener("resize", function() {
                            var e = document.querySelector(".layout-rightside-col");
                            e &&
                                Array.from(
                                    document.querySelectorAll(".layout-rightside-btn")
                                ).forEach(function() {
                                    window.outerWidth < 1699 || 3440 < window.outerWidth ?
                                        e.classList.remove("d-block") :
                                        1699 < window.outerWidth && e.classList.add("d-block");
                                }),
                                "semibox" == document.documentElement.getAttribute("data-layout") &&
                                (e.classList.remove("d-block"), e.classList.add("d-none"));
                        }),
                        (overlay = document.querySelector(".overlay"))) &&
                    document.querySelector(".overlay").addEventListener("click", function() {
                        1 ==
                            document
                            .querySelector(".layout-rightside-col")
                            .classList.contains("d-block") &&
                            document
                            .querySelector(".layout-rightside-col")
                            .classList.remove("d-block");
                    }),
                    window.addEventListener("load", function() {
                        var e = document.querySelector(".layout-rightside-col");
                        e &&
                            Array.from(
                                document.querySelectorAll(".layout-rightside-btn")
                            ).forEach(function() {
                                window.outerWidth < 1699 || 3440 < window.outerWidth ?
                                    e.classList.remove("d-block") :
                                    1699 < window.outerWidth && e.classList.add("d-block");
                            }),
                            "semibox" == document.documentElement.getAttribute("data-layout") &&
                            1699 < window.outerWidth &&
                            (e.classList.remove("d-block"), e.classList.add("d-none"));
                    });
            });
        </script>
        <script>
            function getChartColorsArray(e) {
                if (null !== document.getElementById(e)) return e = document.getElementById(e).getAttribute("data-colors"), (e =
                    JSON.parse(e)).map(function(e) {
                    var t = e.replace(" ", "");
                    return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) ||
                        t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement)
                        .getPropertyValue(e[0]) + "," + e[1] + ")" : t
                })
            }
            var program_data = @json(array_values($array_programs));
            var program_keys = @json(array_keys($array_programs));
            var upadatedonutchart, chartPieBasicColors = getChartColorsArray("simple_pie_chart"),
                chartDonutBasicColors = (chartPieBasicColors && (options = {
                        series: program_data,
                        chart: {
                            height: 300,
                            type: "pie"
                        },
                        labels: program_keys,
                        legend: {
                            position: "bottom"
                        },
                        dataLabels: {
                            dropShadow: {
                                enabled: !1
                            }
                        },
                        colors: chartPieBasicColors
                    }, (chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options)).render()),
                    getChartColorsArray("simple_dount_chart")),
                chartDonutupdatingColors = (chartDonutBasicColors && (options = {
                        series: [40, 50, 60, 70, 80, 80],
                        chart: {
                            height: 300,
                            type: "donut"
                        },
                        legend: {
                            position: "bottom"
                        },
                        dataLabels: {
                            dropShadow: {
                                enabled: !1
                            }
                        },
                        colors: chartDonutBasicColors
                    }, (chart = new ApexCharts(document.querySelector("#simple_dount_chart"), options)).render()),
                    getChartColorsArray("updating_donut_chart"));

            function appendData() {
                var e = upadatedonutchart.w.globals.series.slice();
                return e.push(Math.floor(100 * Math.random()) + 1), e
            }

            function removeData() {
                var e = upadatedonutchart.w.globals.series.slice();
                return e.pop(), e
            }

            function randomize() {
                return upadatedonutchart.w.globals.series.map(function() {
                    return Math.floor(100 * Math.random()) + 1
                })
            }

            function reset() {
                return options.series
            }
            chartDonutupdatingColors && (options = {
                    series: [44, 55, 13, 33],
                    chart: {
                        height: 280,
                        type: "donut"
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    legend: {
                        position: "bottom"
                    },
                    colors: chartDonutupdatingColors
                }, (upadatedonutchart = new ApexCharts(document.querySelector("#updating_donut_chart"), options)).render(),
                document.querySelector("#randomize").addEventListener("click", function() {
                    upadatedonutchart.updateSeries(randomize())
                }), document.querySelector("#add").addEventListener("click", function() {
                    upadatedonutchart.updateSeries(appendData())
                }), document.querySelector("#remove").addEventListener("click", function() {
                    upadatedonutchart.updateSeries(removeData())
                }), document.querySelector("#reset").addEventListener("click", function() {
                    upadatedonutchart.updateSeries(reset())
                }));
            var gender_data = @json(array_values($array_gender));
            var gender_keys = @json(array_keys($array_gender));
            var chart, chartPieGradientColors = getChartColorsArray("gradient_chart"),
                chartPiePatternColors = (chartPieGradientColors && (options = {
                        series: [44, 55, 41, 17, 15],
                        chart: {
                            height: 300,
                            type: "donut"
                        },
                        plotOptions: {
                            pie: {
                                startAngle: -90,
                                endAngle: 270
                            }
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "gradient"
                        },
                        legend: {
                            position: "bottom"
                        },
                        title: {
                            style: {
                                fontWeight: 500
                            }
                        },
                        colors: chartPieGradientColors
                    }, (chart = new ApexCharts(document.querySelector("#gradient_chart"), options)).render()),
                    getChartColorsArray("pattern_chart")),
                chartPieImageColors = (chartPiePatternColors && (options = {
                        series: [100],
                        chart: {
                            height: 300,
                            type: "donut",
                            dropShadow: {
                                enabled: !0,
                                color: "#111",
                                top: -1,
                                left: 3,
                                blur: 3,
                                opacity: .2
                            }
                        },
                        stroke: {
                            width: 0
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: !0,
                                        total: {
                                            showAlways: !0,
                                            show: !0
                                        }
                                    }
                                }
                            }
                        },
                        dataLabels: {
                            dropShadow: {
                                blur: 3,
                                opacity: .8
                            }
                        },
                        fill: {
                            type: "pattern",
                            opacity: 1,
                            pattern: {
                                enabled: !0,
                                style: ["verticalLines", "squares", "horizontalLines", "circles", "slantedLines"]
                            }
                        },
                        states: {
                            hover: {
                                filter: "none"
                            }
                        },
                        theme: {
                            palette: "palette2"
                        },
                        title: {
                            style: {
                                fontWeight: 500
                            }
                        },
                        legend: {
                            position: "bottom"
                        },
                        colors: chartPiePatternColors
                    }, (chart = new ApexCharts(document.querySelector("#pattern_chart"), options)).render()),
                    getChartColorsArray("image_pie_chart")),
                options = (chartPieImageColors && (options = {
                    series: [100],
                    chart: {
                        height: 300,
                        type: "pie"
                    },
                    colors: ["#94A74A"],
                    fill: {
                        type: "image",
                        opacity: .85,
                        image: {
                            src: ["./assets/images/small/img-1.jpg", "./assets/images/small/img-2.jpg",
                                "./assets/images/small/img-3.jpg", "./assets/images/small/img-4.jpg"
                            ],
                            width: 25,
                            imagedHeight: 25
                        }
                    },
                    stroke: {
                        width: 4
                    },
                    dataLabels: {
                        enabled: !0,
                        style: {
                            colors: ["#111"]
                        },
                        background: {
                            enabled: !0,
                            foreColor: "#fff",
                            borderWidth: 0
                        }
                    },
                    legend: {
                        position: "bottom"
                    }
                }, (chart = new ApexCharts(document.querySelector("#image_pie_chart"), options)).render()), {
                    series: gender_data,
                    chart: {
                        height: 300,
                        type: "pie"
                    },
                    labels: gender_keys,
                    theme: {
                        monochrome: {
                            enabled: !0,
                            color: "#405189",
                            shadeTo: "light",
                            shadeIntensity: .6
                        }
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                offset: -5
                            }
                        }
                    },
                    title: {
                        style: {
                            fontWeight: 500
                        }
                    },
                    dataLabels: {
                        formatter: function(e, t) {
                            return [t.w.globals.labels[t.seriesIndex], e.toFixed(1) + "%"]
                        },
                        dropShadow: {
                            enabled: !1
                        }
                    },
                    legend: {
                        show: !1
                    }
                });
            document.querySelector("#monochrome_pie_chart") && (chart = new ApexCharts(document.querySelector(
                "#monochrome_pie_chart"), options)).render();
        </script>
        <script>
            function updateDigitalClock() {
                const now = new Date();

                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();

                const ampm = (hours >= 12) ? 'PM' : 'AM';
                const formattedHours = (hours % 12 === 0) ? 12 : hours % 12;

                const digitalClock = document.getElementById('digital-clock');
                digitalClock.textContent =
                    `${formatTwoDigits(formattedHours)}:${formatTwoDigits(minutes)}:${formatTwoDigits(seconds)} ${ampm}`;
            }

            function formatTwoDigits(number) {
                return (number < 10) ? `0${number}` : number;
            }

            // Update the digital clock every second
            setInterval(updateDigitalClock, 1000);

            // Initial call to set the initial time
            updateDigitalClock();
        </script>
    @endsection
@endif
@section('script')
    <script>
        function getChartColorsArray(e) {
            if (null !== document.getElementById(e)) {
                var t = document.getElementById(e).getAttribute("data-colors");
                if (t)
                    return (t = JSON.parse(t)).map(function(e) {
                        var t = e.replace(" ", "");
                        return -1 === t.indexOf(",") ?
                            getComputedStyle(
                                document.documentElement
                            ).getPropertyValue(t) || t :
                            2 == (e = e.split(",")).length ?
                            "rgba(" +
                            getComputedStyle(
                                document.documentElement
                            ).getPropertyValue(e[0]) +
                            "," +
                            e[1] +
                            ")" :
                            t;
                    });
                console.warn("data-colors atributes not found on", e);
            }
        }
        var fee_data = @json($fee_series);
        var options,
            chart,
            worldemapmarkers,
            overlay,
            linechartcustomerColors = getChartColorsArray("customer_impression_charts"),
            chartDonutBasicColors =
            (linechartcustomerColors &&
                ((options = {
                        series: [{
                            name: "Fee Overview",
                            type: "bar",
                            data: fee_data
                        }, ],
                        chart: {
                            height: 370,
                            type: "line",
                            toolbar: {
                                show: !1
                            }
                        },
                        stroke: {
                            curve: "straight",
                            dashArray: [0, 0, 8],
                            width: [2, 0, 2.2],
                        },
                        fill: {
                            opacity: [0.1, 0.9, 1]
                        },
                        markers: {
                            size: [0, 0, 0],
                            strokeWidth: 2,
                            hover: {
                                size: 4
                            },
                        },
                        xaxis: {
                            categories: [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec",
                            ],
                            axisTicks: {
                                show: !1
                            },
                            axisBorder: {
                                show: !1
                            },
                        },
                        grid: {
                            show: !0,
                            xaxis: {
                                lines: {
                                    show: !0
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: !1
                                }
                            },
                            padding: {
                                top: 0,
                                right: -2,
                                bottom: 15,
                                left: 10
                            },
                        },
                        legend: {
                            show: !0,
                            horizontalAlign: "center",
                            offsetX: 0,
                            offsetY: -5,
                            markers: {
                                width: 9,
                                height: 9,
                                radius: 6
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 0
                            },
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: "30%",
                                barHeight: "70%"
                            }
                        },
                        colors: linechartcustomerColors,
                        tooltip: {
                            shared: !0,
                            y: [{
                                    formatter: function(e) {
                                        return void 0 !== e ? e.toFixed(0) : e;
                                    },
                                },
                                {
                                    formatter: function(e) {
                                        return void 0 !== e ?
                                            e.toFixed(2) :
                                            e;
                                    },
                                },
                                {
                                    formatter: function(e) {
                                        return void 0 !== e ?
                                            e.toFixed(0) + " Sales" :
                                            e;
                                    },
                                },
                            ],
                        },
                    }),
                    (chart = new ApexCharts(
                        document.querySelector("#customer_impression_charts"),
                        options
                    )).render()),
                getChartColorsArray("store-visits-source")),
            vectorMapWorldMarkersColors =
            (chartDonutBasicColors &&
                ((options = {
                        series: [44, 55, 41, 17, 15],
                        labels: ["Direct", "Social", "Email", "Other", "Referrals"],
                        chart: {
                            height: 333,
                            type: "donut"
                        },
                        legend: {
                            position: "bottom"
                        },
                        stroke: {
                            show: !1
                        },
                        dataLabels: {
                            dropShadow: {
                                enabled: !1
                            }
                        },
                        colors: chartDonutBasicColors,
                    }),
                    (chart = new ApexCharts(
                        document.querySelector("#store-visits-source"),
                        options
                    )).render()),
                getChartColorsArray("sales-by-locations")),
            swiper =
            (vectorMapWorldMarkersColors &&
                (worldemapmarkers = new jsVectorMap({
                    map: "world_merc",
                    selector: "#sales-by-locations",
                    zoomOnScroll: !1,
                    zoomButtons: !1,
                    selectedMarkers: [0, 5],
                    regionStyle: {
                        initial: {
                            stroke: "#9599ad",
                            strokeWidth: 0.25,
                            fill: vectorMapWorldMarkersColors[0],
                            fillOpacity: 1,
                        },
                    },
                    markersSelectable: !0,
                    markers: [{
                            name: "Palestine",
                            coords: [31.9474, 35.2272]
                        },
                        {
                            name: "Russia",
                            coords: [61.524, 105.3188]
                        },
                        {
                            name: "Canada",
                            coords: [56.1304, -106.3468]
                        },
                        {
                            name: "Greenland",
                            coords: [71.7069, -42.6043]
                        },
                    ],
                    markerStyle: {
                        initial: {
                            fill: vectorMapWorldMarkersColors[1]
                        },
                        selected: {
                            fill: vectorMapWorldMarkersColors[2]
                        },
                    },
                    labels: {
                        markers: {
                            render: function(e) {
                                return e.name;
                            },
                        },
                    },
                })),
                new Swiper(".vertical-swiper", {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    mousewheel: !0,
                    loop: !0,
                    direction: "vertical",
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: !1
                    },
                })),
            layoutRightSideBtn = document.querySelector(".layout-rightside-btn");
        layoutRightSideBtn &&
            (Array.from(document.querySelectorAll(".layout-rightside-btn")).forEach(
                    function(e) {
                        var t = document.querySelector(".layout-rightside-col");
                        e.addEventListener("click", function() {
                            t.classList.contains("d-block") ?
                                (t.classList.remove("d-block"), t.classList.add("d-none")) :
                                (t.classList.remove("d-none"),
                                    t.classList.add("d-block"));
                        });
                    }
                ),
                window.addEventListener("resize", function() {
                    var e = document.querySelector(".layout-rightside-col");
                    e &&
                        Array.from(
                            document.querySelectorAll(".layout-rightside-btn")
                        ).forEach(function() {
                            window.outerWidth < 1699 || 3440 < window.outerWidth ?
                                e.classList.remove("d-block") :
                                1699 < window.outerWidth && e.classList.add("d-block");
                        }),
                        "semibox" == document.documentElement.getAttribute("data-layout") &&
                        (e.classList.remove("d-block"), e.classList.add("d-none"));
                }),
                (overlay = document.querySelector(".overlay"))) &&
            document.querySelector(".overlay").addEventListener("click", function() {
                1 ==
                    document
                    .querySelector(".layout-rightside-col")
                    .classList.contains("d-block") &&
                    document
                    .querySelector(".layout-rightside-col")
                    .classList.remove("d-block");
            }),
            window.addEventListener("load", function() {
                var e = document.querySelector(".layout-rightside-col");
                e &&
                    Array.from(
                        document.querySelectorAll(".layout-rightside-btn")
                    ).forEach(function() {
                        window.outerWidth < 1699 || 3440 < window.outerWidth ?
                            e.classList.remove("d-block") :
                            1699 < window.outerWidth && e.classList.add("d-block");
                    }),
                    "semibox" == document.documentElement.getAttribute("data-layout") &&
                    1699 < window.outerWidth &&
                    (e.classList.remove("d-block"), e.classList.add("d-none"));
            });
    </script>
    <script>
        function getChartColorsArray(e) {
            if (null !== document.getElementById(e)) return e = document.getElementById(e).getAttribute("data-colors"), (e =
                JSON.parse(e)).map(function(e) {
                var t = e.replace(" ", "");
                return -1 === t.indexOf(",") ? getComputedStyle(document.documentElement).getPropertyValue(t) ||
                    t : 2 == (e = e.split(",")).length ? "rgba(" + getComputedStyle(document.documentElement)
                    .getPropertyValue(e[0]) + "," + e[1] + ")" : t
            })
        }
        var program_data = @json(array_values($array_programs));
        var program_keys = @json(array_keys($array_programs));
        var upadatedonutchart, chartPieBasicColors = getChartColorsArray("simple_pie_chart"),
            chartDonutBasicColors = (chartPieBasicColors && (options = {
                    series: program_data,
                    chart: {
                        height: 300,
                        type: "pie"
                    },
                    labels: program_keys,
                    legend: {
                        position: "bottom"
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: !1
                        }
                    },
                    colors: chartPieBasicColors
                }, (chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options)).render()),
                getChartColorsArray("simple_dount_chart")),
            chartDonutupdatingColors = (chartDonutBasicColors && (options = {
                    series: [40, 50, 60, 70, 80, 80],
                    chart: {
                        height: 300,
                        type: "donut"
                    },
                    legend: {
                        position: "bottom"
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: !1
                        }
                    },
                    colors: chartDonutBasicColors
                }, (chart = new ApexCharts(document.querySelector("#simple_dount_chart"), options)).render()),
                getChartColorsArray("updating_donut_chart"));

        function appendData() {
            var e = upadatedonutchart.w.globals.series.slice();
            return e.push(Math.floor(100 * Math.random()) + 1), e
        }

        function removeData() {
            var e = upadatedonutchart.w.globals.series.slice();
            return e.pop(), e
        }

        function randomize() {
            return upadatedonutchart.w.globals.series.map(function() {
                return Math.floor(100 * Math.random()) + 1
            })
        }

        function reset() {
            return options.series
        }
        chartDonutupdatingColors && (options = {
                series: [44, 55, 13, 33],
                chart: {
                    height: 280,
                    type: "donut"
                },
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    position: "bottom"
                },
                colors: chartDonutupdatingColors
            }, (upadatedonutchart = new ApexCharts(document.querySelector("#updating_donut_chart"), options)).render(),
            document.querySelector("#randomize").addEventListener("click", function() {
                upadatedonutchart.updateSeries(randomize())
            }), document.querySelector("#add").addEventListener("click", function() {
                upadatedonutchart.updateSeries(appendData())
            }), document.querySelector("#remove").addEventListener("click", function() {
                upadatedonutchart.updateSeries(removeData())
            }), document.querySelector("#reset").addEventListener("click", function() {
                upadatedonutchart.updateSeries(reset())
            }));
        var gender_data = @json(array_values($array_gender));
        var gender_keys = @json(array_keys($array_gender));
        var chart, chartPieGradientColors = getChartColorsArray("gradient_chart"),
            chartPiePatternColors = (chartPieGradientColors && (options = {
                    series: [44, 55, 41, 17, 15],
                    chart: {
                        height: 300,
                        type: "donut"
                    },
                    plotOptions: {
                        pie: {
                            startAngle: -90,
                            endAngle: 270
                        }
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    fill: {
                        type: "gradient"
                    },
                    legend: {
                        position: "bottom"
                    },
                    title: {
                        style: {
                            fontWeight: 500
                        }
                    },
                    colors: chartPieGradientColors
                }, (chart = new ApexCharts(document.querySelector("#gradient_chart"), options)).render()),
                getChartColorsArray("pattern_chart")),
            chartPieImageColors = (chartPiePatternColors && (options = {
                    series: [100],
                    chart: {
                        height: 300,
                        type: "donut",
                        dropShadow: {
                            enabled: !0,
                            color: "#111",
                            top: -1,
                            left: 3,
                            blur: 3,
                            opacity: .2
                        }
                    },
                    stroke: {
                        width: 0
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                labels: {
                                    show: !0,
                                    total: {
                                        showAlways: !0,
                                        show: !0
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        dropShadow: {
                            blur: 3,
                            opacity: .8
                        }
                    },
                    fill: {
                        type: "pattern",
                        opacity: 1,
                        pattern: {
                            enabled: !0,
                            style: ["verticalLines", "squares", "horizontalLines", "circles", "slantedLines"]
                        }
                    },
                    states: {
                        hover: {
                            filter: "none"
                        }
                    },
                    theme: {
                        palette: "palette2"
                    },
                    title: {
                        style: {
                            fontWeight: 500
                        }
                    },
                    legend: {
                        position: "bottom"
                    },
                    colors: chartPiePatternColors
                }, (chart = new ApexCharts(document.querySelector("#pattern_chart"), options)).render()),
                getChartColorsArray("image_pie_chart")),
            options = (chartPieImageColors && (options = {
                series: [100],
                chart: {
                    height: 300,
                    type: "pie"
                },
                colors: ["#94A74A"],
                fill: {
                    type: "image",
                    opacity: .85,
                    image: {
                        src: ["./assets/images/small/img-1.jpg", "./assets/images/small/img-2.jpg",
                            "./assets/images/small/img-3.jpg", "./assets/images/small/img-4.jpg"
                        ],
                        width: 25,
                        imagedHeight: 25
                    }
                },
                stroke: {
                    width: 4
                },
                dataLabels: {
                    enabled: !0,
                    style: {
                        colors: ["#111"]
                    },
                    background: {
                        enabled: !0,
                        foreColor: "#fff",
                        borderWidth: 0
                    }
                },
                legend: {
                    position: "bottom"
                }
            }, (chart = new ApexCharts(document.querySelector("#image_pie_chart"), options)).render()), {
                series: gender_data,
                chart: {
                    height: 300,
                    type: "pie"
                },
                labels: gender_keys,
                theme: {
                    monochrome: {
                        enabled: !0,
                        color: "#405189",
                        shadeTo: "light",
                        shadeIntensity: .6
                    }
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: -5
                        }
                    }
                },
                title: {
                    style: {
                        fontWeight: 500
                    }
                },
                dataLabels: {
                    formatter: function(e, t) {
                        return [t.w.globals.labels[t.seriesIndex], e.toFixed(1) + "%"]
                    },
                    dropShadow: {
                        enabled: !1
                    }
                },
                legend: {
                    show: !1
                }
            });
        document.querySelector("#monochrome_pie_chart") && (chart = new ApexCharts(document.querySelector(
            "#monochrome_pie_chart"), options)).render();
    </script>
    <script>
        function updateDigitalClock() {
            const now = new Date();

            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();

            const ampm = (hours >= 12) ? 'PM' : 'AM';
            const formattedHours = (hours % 12 === 0) ? 12 : hours % 12;

            const digitalClock = document.getElementById('digital-clock');
            digitalClock.textContent =
                `${formatTwoDigits(formattedHours)}:${formatTwoDigits(minutes)}:${formatTwoDigits(seconds)} ${ampm}`;
        }

        function formatTwoDigits(number) {
            return (number < 10) ? `0${number}` : number;
        }

        // Update the digital clock every second
        setInterval(updateDigitalClock, 1000);

        // Initial call to set the initial time
        updateDigitalClock();
    </script>
@endsection
