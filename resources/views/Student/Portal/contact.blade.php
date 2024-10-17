@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Contact To Admin</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/student_contact') }}">Contact</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-6">
                                    <label for="degree" class="form-label">Name</label>
                                    <input type="hidden" id="get_url" value="/contact_add">
                                    <input type="hidden" id="module_name" value="Contact">
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        name="name" placeholder="Enter Name" required>
                                    <strong id="name" class="text-danger"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="degree" class="form-label">Subject</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                         name="subject" placeholder="Enter Subject" required>
                                        <strong id="subject" class="text-danger"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="degree" class="form-label">Phone</label>
                                    <input type="text" oninput="allow_numeric(this)" class="form-control"
                                        name="contact_no" placeholder="Enter Number" required>
                                        <strong id="contact_no" class="text-danger"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="degree" class="form-label">Email</label>
                                    <input type="text" class="form-control"  name="email"
                                        placeholder="Enter Email" required>
                                        <strong id="email" class="text-danger"></strong>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Message</label>
                                    <textarea class="form-control" name="message" rows="3" placeholder="Message..." required></textarea>
                                    <strong id="message" class="text-danger"></strong>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                            id="insert">Add Contact > </button>
                                    </div>
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
                            "<option value='' selected disabled>Choose the Program</option>"
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
                '<div class="col-md-12"><label for="Subject" class="form-label">Subject</label><input type="text" class="form-control" id="Subject"<?php ?> name="subject[]" oninput="allow_alphabets(this)" placeholder="Enter Subject Name" required></div>';

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
