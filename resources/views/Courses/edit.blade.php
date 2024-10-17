@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Group</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/courses') }}">Group</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Update Group</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_update" class="row g-3 needs-validation" novalidate>
                                @method('PUT')
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Group Title</label>
                                    <input type="hidden" id="id" value="{{ $courses->id }}">
                                    <input type="hidden" id="get_url" value="/courses">
                                    <input type="hidden" id="module_name" value="Course">
                                    <input type="text" name="course_title" oninput="NameValidation(this)"
                                        placeholder="Enter Group Title" class="form-control"
                                        value="{{ ucfirst($courses->course_title) }}" required>
                                    <strong id="course_title" class="text-danger"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <select class="single-select" name="course_degree" id="degree" autocomplete="off"
                                        required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}"
                                                {{ $courses->course_degree == $degree->id ? 'selected' : '' }}>
                                                {{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="course_degree"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Program Name</label>
                                    <select class="single-select" name="course_program" id="program" autocomplete="off"
                                        required>
                                        <option value="" selected disabled>--Select the Degree First--</option>
                                    </select>
                                    <strong class="text-danger" id="course_program"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Duration Period <span
                                            class="text-muted">(In Months)</span></label>
                                    <input type="number" name="course_duration" oninput="AlphaNumericValidation(this)"
                                        placeholder="Enter Duration Period" class="form-control"
                                        value="{{ $courses->course_duration }}" required>
                                    <strong class="text-danger" id="course_duration"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Picture</label>
                                    <input type="file" name="course_picture" class="form-control"
                                        onchange="previewFile(this);">
                                    <strong class="text-danger" id="picture"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Price Range <span class="text-muted">Format(xxxx-xxxx)</span></label>
                                    <input type="text" name="course_price" value="{{ $courses->course_price }}" class="form-control"
                                        onchange="previewFile(this);" required placeholder="Enter Price">
                                    <strong class="text-danger" id="course_price"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Group Benefits</label>
                                    <textarea name="course_benefits" oninput="AlphaNumericValidation(this)" placeholder="Enter Group Benefits"
                                        rows="3" class="form-control" required>{{ $courses->course_benefits }}</textarea>
                                    <strong class="text-danger" id="course_benefits"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Group Description</label>
                                    <textarea name="course_description" oninput="AlphaNumericValidation(this)" placeholder="Enter Group Description"
                                        rows="3" class="form-control" required>{{ $courses->course_description }}</textarea>
                                    <strong class="text-danger" id="course_description"></strong>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/courses') }}" type="submit" id="button_move"
                                        class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                        < Go back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="update">Update Group > </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" id="image_thumbnail">
                <img class="img-thumbnail" alt="200x200" width="450" height="200"
                    src="{{ asset('admin/assets/images/courses/' . $courses->course_picture) }}">
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#image_thumbnail")
                        .css({
                            opacity: 0,
                        })
                        .slideDown("slow")
                        .animate({
                            opacity: 1,
                        });
                    $("#image_thumbnail").prop("required", true);
                    $(".img-thumbnail").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
        $(document).ready(function() {
            $(document).on('change', '#degree', function(stop) {
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
