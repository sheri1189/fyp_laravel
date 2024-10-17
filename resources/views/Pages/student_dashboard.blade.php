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
        @if ($user->role_assign == 'Student')
            <div class="row">
                <div class="col">
                    <div class="h-100">
                        <div class="profile-foreground position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg">
                                <img src="{{ asset('/admin/assets/images/users/dummy.jpg') }}" alt=""
                                    class="profile-wid-img" />
                            </div>
                        </div>
                        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                            <div class="row g-4">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="{{ asset('/admin/assets/images/instructors/' . $user->teacher_picture) }}"
                                        alt="user-img" class="img-thumbnail rounded" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col">
                                    <div class="p-2">
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
                                            {{-- <h4 class="fs-16 mb-1">{{ $greeting }}, {{ $user->name }}!</h4> --}}
                                        </div>
                                        <h3 class="text-white mb-1" id="name">{{ $greeting }},
                                            {{ $user->name }}!</h3>
                                        <p class="text-white text-opacity-75" id="enter_type">{{ 'Student' }}</p>
                                        <div class="hstack text-white-50 gap-1">
                                            <div class="me-2"><i
                                                    class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i><span
                                                    id="address">{{ $user->address }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="d-flex profile-wrapper">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link fs-14 active" data-bs-toggle="tab"
                                                    href="{{ url('#overview-tab') }}" role="tab">
                                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                        class="d-none d-md-inline-block">Overview</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content pt-4 text-muted">
                                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xxl-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-5">Complete Your Profile</h5>
                                                            <div
                                                                class="progress animated-progress custom-progress progress-label">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: 100%" aria-valuenow="30" aria-valuemin="0"
                                                                    aria-valuemax="100">
                                                                    <div class="label">100%</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">General Information</h5>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Father
                                                                                Name :
                                                                            </th>
                                                                            <th class="text-muted">
                                                                                {{ $user->father_name }}
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Mobile :
                                                                            </th>
                                                                            <th class="text-muted">{{ $user->contact_no }}
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">E-mail :
                                                                            </th>
                                                                            <th class="text-muted">{{ $user->email }}
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Gender :
                                                                            </th>
                                                                            <th class="text-muted">{{ $user->gender }}
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Student
                                                                                Batch:
                                                                            </th>
                                                                            <th class="text-muted">{{ $user->batch }}
                                                                            </th>
                                                                        </tr>
                                                                        <th class="ps-0" scope="row">Student Fee:
                                                                        </th>
                                                                        <th class="text-muted">
                                                                            {{ $user->student_after_discount_fee }}</th>
                                                                        </tr>
                                                                        {{-- <tr>
                                                                        <th class="ps-0" scope="row">Teacher Program :
                                                                        </th>
                                                                        <th class="text-muted">{{ $user->teacher_program }}</th>
                                                                    </tr>
                                                                     <tr>
                                                                        <th class="ps-0" scope="row">Teacher Degree Status :
                                                                        </th>
                                                                        <th class="text-muted">{{ $user->teacher_degree_status }}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Teacher Univeristy :
                                                                        </th>
                                                                        <th class="text-muted">{{ $user->teacher_university }}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Teacher Course :
                                                                        </th>
                                                                        <th class="text-muted">{{ $user->teacher_professional_field }}</th>
                                                                    </tr> --}}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        </script>
    @endsection
@endif
