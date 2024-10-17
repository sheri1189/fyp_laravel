@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teacher Attendance</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Teacher Attendance</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Teacher Attendance</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label class="form-label">Select Teacher *</label>
                                    <input type="hidden" id="get_url" value="/teacher_attendance_add">
                                    <input type="hidden" id="module_name" value="Attendance">
                                    <select name="teacher_id" id="teacher" class="single-select">
                                        <option value="" selected disabled>--Select Teacher--</option>
                                        @foreach ($allteacher as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">In Time *</label>
                                    <input type="time" name="in_time" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Out Time *</label>
                                    <input type="time" name="out_time" class="form-control">
                                </div>
                                <div class="col-md-12 text-end">
                                    <button class="btn btn-primary rounded-pill" id="insert">Attendance ></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
