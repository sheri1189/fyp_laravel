@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Student Leave</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/students_leave') }}">Leave</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Student Leave</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Student(Father,Class)</label>
                                    <input type="hidden" id="get_url" value="/add_leave">
                                    <input type="hidden" id="module_name" value="Leave">
                                    <select class="single-select" name="student_id" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($allstudent as $student)
                                            <option value="{{ $student->id }}">
                                                {{ ucfirst($student->name) . '(' . $student->father_name . ')' . '(' . $array_class[$student->id]['classes_name'] . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <strong id="student_id" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">From Date</label>
                                    <input type="date" class="form-control" name="from_date"
                                        value="{{ old('from_date') }}">
                                    <strong id="from_date" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">To Date</label>
                                    <input type="date" class="form-control" name="to_date" value="{{ old('to_date') }}">
                                    <strong id="to_date" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Leave Type</label>
                                    <select name="leave_type" class="single-select">
                                        <option value="" selected disabled>--Select Leave Type--</option>
                                        <option value="Full Day">Full Day</option>
                                        <option value="Half Day">Half Day</option>
                                    </select>
                                    <strong id="leave_type" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Status</label>
                                    <select name="status" class="single-select">
                                        <option value="" selected disabled>--Select Status--</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    <strong id="to_date" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Reason</label>
                                    <textarea name="reason" oninput="AlphaNumericValidation(this)" placeholder="Enter Program Description" rows="3"
                                        class="form-control" required>{{ old('reason') }}</textarea>
                                    <strong id="reason" class="text-danger"></strong>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/students_leave') }}" type="submit" id="button_move"
                                        class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                        < Go back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add Leave > </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        function NameValidation(element) {
            let InputText = element.value;
            element.value = InputText.replace(/[^A-za-z, ]/, "");
            if (element.value == InputText) {
                element.value = InputText;
            } else {
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Number and Special Character are Not Allowed',
                    animation: false,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timeProgressBar: true,
                })
            }
        }
    </script>
    <script>
        function AlphaNumericValidation(element) {
            let InputText = element.value;
            element.value = InputText.replace(/[^A-za-z0-9[$&+,:;=?@#|'<>.^*(){}%"!~-_ ]/, "");
            if (element.value == InputText) {
                element.value = InputText;
            } else {
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Special Character Not Allowed ',
                    animation: false,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000,
                    timeProgressBar: true,
                })
            }
        }
    </script>
@endsection
