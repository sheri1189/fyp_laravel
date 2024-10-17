@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Test Schedule</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/test') }}">Test Schedule</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add Test Schedule</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Teacher Name</label>
                                    <input type="hidden" id="get_url" value="/test">
                                    <input type="hidden" id="module_name" value="Test Schedule">
                                    <select class="single-select" id="teacher_name" name="instructor" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Teacher--</option>
                                        @foreach ($allteacher as $teacher)
                                            <option value="{{ $teacher->id }}">{{ ucfirst($teacher->name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="instructor"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <select class="single-select" name="degree" id="degree_getting" autocomplete="off"
                                        required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}">{{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="degree"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Class Name</label>
                                    <select class="single-select" name="program" required id="program" autocomplete="off">
                                        <option value="" selected disabled>--Select the Degree First--</option>
                                    </select>
                                    <strong class="text-danger" id="program"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Subject</label>
                                    <select class="single-select" name="class" id="subject_getting" autocomplete="off"
                                        required>
                                        <option value="" selected disabled>--Select the Subject--</option>
                                        @foreach ($array_subjects as $subjects)
                                            <option value="{{ $subjects }}">{{ $subjects }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                    <strong class="text-danger" id="date"></strong>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/test') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                            id="insert">Add Schedule > </button>
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
        })
    </script>
@endsection
