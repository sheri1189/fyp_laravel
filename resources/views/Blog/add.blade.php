@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blog</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Blog Title</label>
                                    <input type="hidden" id="get_url" value="/blog">
                                    <input type="hidden" id="module_name" value="Blog">
                                    <input type="text" name="blog_title" oninput="NameValidation(this)"
                                        placeholder="Enter Blog Title" class="form-control"
                                        value="{{ old('blog_title') }}" required>
                                    <strong id="blog_title" class="text-danger"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Picture</label>
                                    <input type="file" name="blog_image" class="form-control"
                                        onchange="previewFile(this);" required>
                                    <strong class="text-danger" id="blog_image"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Blog Description</label>
                                    <textarea name="blog_description" oninput="AlphaNumericValidation(this)" placeholder="Enter Blog Description"
                                        rows="3" class="form-control" required>{{ old('blog_description') }}</textarea>
                                    <strong class="text-danger" id="blog_description"></strong>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/blog') }}" type="submit" id="button_move"
                                        class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                        < Go back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add Blog > </button>
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
                        $.each(response.message, function(index, value) {
                            $("#program").append(
                                "<option value='' selected disabled>Choose the Program</option>"
                            );
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
