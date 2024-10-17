@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Time Table</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/time') }}">Time Table</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Time Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Teacher Name</label>
                                    <input type="hidden" id="get_url" value="/time">
                                    <input type="hidden" id="module_name" value="Time Table">
                                    <select class="single-select" name="instructor" id="teacher_name" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Teacher--</option>
                                        @foreach ($allteacher as $teacher)
                                            <option value="{{ $teacher->id }}">{{ ucfirst($teacher->name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="instructor"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <select class="single-select" name="degree" id="degree_getting" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}">{{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="degree"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Class</label>
                                    <select class="single-select" name="program" required id="program" autocomplete="off">
                                        <option value="" selected disabled>--Select the Degree First--</option>
                                    </select>
                                    <strong class="text-danger" id="program"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Room</label>
                                    <select class="single-select" name="class" autocomplete="off"
                                        required>
                                        <option value="" selected disabled>--Select the Room--</option>
                                        @foreach ($allclasses as $classes)
                                            <option value="{{ $classes->id }}">{{ $classes->classes_name }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Subject</label>
                                    <select class="single-select" name="book" id="subject_getting" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Subject--</option>
                                        @foreach ($array_subjects as $subjects)
                                            <option value="{{ $subjects }}">{{ $subjects }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="book"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="days" class="form-label">Day</label>
                                    <select class="multiple-select" id="days" multiple name="day[]" required>
                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday</option>
                                        <option value="saturday">Saturday</option>
                                        <option value="sunday">Sunday</option>
                                    </select>
                                    <strong id="day" class="text-danger"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="days" class="form-label">Start Time</label>
                                    <input type="time" name="start_time" class="form-control"
                                        placeholder="Enter Start Time">
                                    <strong id="start_time" class="text-danger"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="days" class="form-label">End Time</label>
                                    <input type="time" name="end_time" class="form-control"
                                        placeholder="Enter End Time">
                                    <strong id="end_time" class="text-danger"></strong>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/time') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                            type="submit" id="insert">Add Time > </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" id="image_thumbnail" style="display: none">
                <img class="img-thumbnail" alt="200x200" width="450" height="200"
                    src="{{ asset('admin/assets/images/51007.png') }}">
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#teacher_name', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_subject/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#subject_getting").empty();
                        $("#degree_getting").empty();
                        $("#program").empty();
                        $("#subject_getting").append(
                            "<option value='' selected disabled>--Select the Subject--</option>"
                        );
                        $("#degree_getting").append(
                            "<option value='' selected disabled>--Select the Degree--</option>"
                        );
                        $("#program").append(
                            "<option value='' selected disabled>--Select the Class--</option>"
                        );
                        $.each(response.message3, function(index, value) {
                            $("#subject_getting").append("<option value='" + value +
                                "' style='text-transform:capitalize;'>" +
                                value + "</option>");
                        })
                        $.each(response.message, function(index, value) {
                            $("#degree_getting").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.degree_name + "</option>");
                        })
                        $.each(response.message2, function(index, value) {
                            $("#program").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.program_name + "</option>");
                        })
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#degree_getting', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_program/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#program").empty();
                        $("#program").append(
                            "<option value='' selected disabled>--Select the Class--</option>"
                        );
                        $.each(response.message, function(index, value) {
                            $("#program").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.program_name + "</option>");
                        })
                    }
                })
            })
            // $(document).on('change', '#class_getting', function(stop) {
            //     stop.preventDefault();
            //     var value = $(this).val();
            //     $.ajax({
            //         url: "/get_subject/" + value,
            //         method: "GET",
            //         success: function(response) {
            //             $("#subject_getting").empty();
            //             $("#subject_getting").append(
            //                 "<option value='' selected disabled>--Select the Subject--</option>"
            //             );
            //             $.each(response.message, function(index, value) {
            //                 $("#subject_getting").append("<option value='" + value +
            //                     "' style='text-transform:capitalize;'>" +
            //                     value + "</option>");
            //             })
            //         }
            //     })
            // })
        })
    </script>
    <script>
        var count = 1;

        function add_more() {
            count++;
            var html = '<div id="product_attr_' + count + '"><div class="row g-3 mt-0">';
            html +=
                '<div class="col-md-4"><label for="Subject" class="form-label">Subject</label><input type="text" class="form-control" id="Subject"<?php ?> name="subject[]" oninput="allow_alphabets(this)" placeholder="Enter Subject Name" required></div>';

            html += '<div class="col-md-3"><button type="button" onclick="remove_more(' + count +
                ');" class=" mt-4 btn rounded-pill px-4 btn-outline-danger font-medium waves-effect waves-light"><i class="fas fa-minus"></i></button></div>';

            html += '</div></div>';

            jQuery("#product_fields").append(html);
        }

        function remove_more(count) {
            jQuery("#product_attr_" + count).remove();
        }
    </script>
@endsection
