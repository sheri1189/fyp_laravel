@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teacher Salary</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Teacher Salary</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Teacher Salary</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="">Voucher Number #</label>
                                    <input type="hidden" id="get_url" value="/salary_add">
                                    <input type="hidden" id="module_name" value="Salary">
                                    <input type="text" name="voucher_number" class="form-control" required
                                        value="{{ 'SL' . rand(10000, 90000) . '-' . rand(1000000, 9000000) }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Voucher Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Select Month</label>
                                    <select name="month" class="single-select" required>
                                        <option value="" selected disabled>--Select Month--</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Select Teacher *</label>
                                    <select name="teacher_id" id="teacher" class="single-select" required>
                                        <option value="" selected disabled>--Select Teacher--</option>
                                        @foreach ($allteacher as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Designation *</label>
                                    <input type="text" name="designation" value="{{ 'Teacher' }}"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Payment Method *</label>
                                    <select class="single-select" name="payment_method" required>
                                        <option value="">--Select Payment Method--</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Cash In Hand">Cash In Hand</option>
                                        <option value="Easypaisa">Easypaisa</option>
                                        <option value="Jazzcash">Jazzcash</option>

                                    </select>
                                </div>
                                <div class="col-12">
                                    <h4 class="card-title mb-0 flex-grow-1">Attendance Details</h4>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <label for="">From Date</label>
                                    <input type="date" name="from_date" id="from_date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">To Date</label>
                                    <input type="date" name="to_date" id="to_date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Present</label>
                                    <input type="text" name="present" id="present" class="form-control" required placeholder="Enter Present"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Absent</label>
                                    <input type="text" name="absent" id="absent" class="form-control" required placeholder="Enter Absent"
                                        readonly>
                                </div>
                                <div class="col-12">
                                    <h4 class="card-title mb-0 flex-grow-1">Salary</h4>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Net Salary(60%)</label>
                                    <input type="text" name="net_salary" id="net_salary" class="form-control" required
                                        placeholder="Enter Net Salary" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Academy's Share(40%)</label>
                                    <input type="text" name="academy_expences" id="academy_expences" class="form-control" required
                                        placeholder="Enter Academy's Share" readonly>
                                </div>
                                <div class="col-md-12 text-end">
                                    <button class="btn btn-primary rounded-pill" id="insert">Add Salary ></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#to_date', function(stop) {
                var from_date = $("#from_date").val();
                var teacher = $("#teacher").val();
                var to_date = $(this).val();
                $.ajax({
                    url: "/check_teacher_attendance",
                    method: "POST",
                    data: {
                        "from_date": from_date,
                        "to_date": to_date,
                        "teacher": teacher,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                      $("#present").val(response.present_count);
                      $("#absent").val(response.absent_count);
                      $("#absent").val(response.absent_count);
                      $("#net_salary").val(response.teacher_salary);
                      $("#academy_expences").val(response.academy_expences);
                    }
                });
            });
        });
    </script>
@endsection
