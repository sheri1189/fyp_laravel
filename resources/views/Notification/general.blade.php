@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">General SMS</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/general_sms') }}">General SMS</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add General SMS</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="form-label">Sent As</label>
                                    <br>
                                    <div class="form-check form-switch form-check-inline" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="message_type" value="class"
                                            id="inlineswitch">
                                        <label class="form-check-label" for="inlineswitch">Class</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="message_type"
                                            value="all_students" id="inlineswitch1">
                                        <label class="form-check-label" for="inlineswitch1">All Students</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="message_type" value="staff"
                                            id="inlineswitch2">
                                        <label class="form-check-label" for="inlineswitch2">Staff</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="message_type"
                                            value="single_student" id="inlineswitch2">
                                        <label class="form-check-label" for="inlineswitch2">Single Student</label>
                                    </div>
                                </div>
                                <div class="col-md-12" id="select_class" style="display: none">
                                    <label class="form-label">Select Class *</label>
                                    <input type="hidden" id="get_url" value="/add_general_sms">
                                    <input type="hidden" id="module_name" value="General SMS">
                                    <input type="hidden" id="value_getting" name="type">
                                    <select name="class" class="single-select">
                                        <option value="" selected disabled>--Select Class--</option>
                                        @foreach ($allclasses as $classes)
                                            <option value="{{ $classes->id }}">{{ ucfirst($classes->program_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div class="col-md-12" id="select_student" style="display: none">
                                    <label class="form-label">Select Student *</label>
                                    <select name="student" class="single-select">
                                        <option value="" selected disabled>--Select Student--</option>
                                        @foreach ($allstudents as $student)
                                            <option value="{{ $student->id }}">{{ ucfirst($student->name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="student"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Message *</label>
                                    <textarea name="message" id="message" rows="3" required class="form-control" placeholder="Enter Message">{{ old('message') }}</textarea>
                                    <strong class="text-danger" id="message"></strong>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add General SMS > </button>
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
            $(".form-check-input:not([checked])").on("change", function() {
                $(".form-check-input").not(this).prop("checked", false);
            });
            $(document).on("change", "#message_type", function(e) {
                e.preventDefault();
                var message_type = $(this).val();
                if (message_type == "class") {
                    $("#value_getting").val("class");
                    $("#select_class")
                        .css({
                            opacity: 0,
                        })
                        .slideDown("slow")
                        .animate({
                            opacity: 1,
                        });
                    $("#select_class").prop("required", true);
                    $("#select_student")
                        .animate({
                            opacity: 0,
                        })
                        .slideUp("slow");
                    $("#select_student").prop("required", false);
                } else if (message_type == "all_students") {
                    $("#value_getting").val("all_students");
                    $("#select_class")
                        .animate({
                            opacity: 0,
                        })
                        .slideUp("slow");
                    $("#select_class").prop("required", false);
                    $("#select_student")
                        .animate({
                            opacity: 0,
                        })
                        .slideUp("slow");
                    $("#select_student").prop("required", false);
                } else if (message_type == "staff") {
                    $("#value_getting").val("staff");
                    $("#select_class")
                        .animate({
                            opacity: 0,
                        })
                        .slideUp("slow");
                    $("#select_class").prop("required", false);
                    $("#select_student")
                        .animate({
                            opacity: 0,
                        })
                        .slideUp("slow");
                    $("#select_student").prop("required", false);
                } else {
                    $("#value_getting").val("single_student");
                    $("#select_student")
                        .css({
                            opacity: 0,
                        })
                        .slideDown("slow")
                        .animate({
                            opacity: 1,
                        });
                    $("#select_student").prop("required", true);
                    $("#select_class")
                        .animate({
                            opacity: 0,
                        })
                        .slideUp("slow");
                    $("#select_class").prop("required", false);
                }
            });
        })
    </script>
@endsection
