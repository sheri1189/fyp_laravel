@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Books</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/books') }}">Books</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add Books</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <input type="hidden" id="get_url" value="/books">
                                    <input type="hidden" id="module_name" value="Books">
                                    <select class="single-select" name="degree" id="degree" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}">{{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="degree"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Class Name</label>
                                    <select class="single-select" name="program" required id="program" autocomplete="off">
                                        <option value="" selected disabled>--Select the Degree First--</option>
                                    </select>
                                    <strong class="text-danger" id="program"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Room</label>
                                    <select class="single-select" name="class" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Room--</option>
                                        @foreach ($allclasses as $classes)
                                            <option value="{{ $classes->id }}">{{ $classes->classes_name }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div id="product_fields">
                                    <div id="product_attr_1">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="Subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="Subject" name="subject[]"
                                                    oninput="allow_alphabets(this)" placeholder="Enter Subject Name"
                                                    required>
                                                <strong id="subject" class="text-danger"></strong>
                                            </div>


                                            <div class="col-md-4">
                                                <button type="button" onclick="add_more();"
                                                    class="mt-4 btn rounded-pill px-4 btn-outline-success font-medium waves-effect waves-light">
                                                    <i class="fa-duotone fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/books') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                            id="insert">Add Books > </button>
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
