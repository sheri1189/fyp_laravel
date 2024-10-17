@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teacher Salary History</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Teacher</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Teacher Salary History</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($allsalary as $salary)
                                <div class="col-xxl-3 col-sm-6">
                                    <div class="card card-body profile-project-card shadow-none profile-project-primary">
                                        <div class="d-flex mb-4 align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('/admin/assets/images/instructors/' . $teacher->teacher_picture) }}"
                                                    alt="" class="avatar-sm rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title mb-1">{{ $teacher->name }}</h5>
                                                <p class="text-muted mb-0 fw-bold">Teacher</p>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted fw-bold">Voucher Number #:
                                            {{ $salary->voucher_number }}</p>
                                        <p class="card-text text-muted fw-bold">Month: {{ $salary->month }}</p>
                                        <h6 class="mb-1 fw-bold">{{ 'Rs. ' . $salary->net_salary }}</h6>
                                        <p class="card-text text-muted fw-bold">Payment Method:
                                            {{ $salary->payment_method }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>
        </div>
    </div>
@endsection
