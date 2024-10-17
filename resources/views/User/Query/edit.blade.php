@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Inquiry</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/inquiry') }}">Inquiry</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Update Inquiry</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_update" class="row g-3 needs-validation" novalidate>
                                @method('PUT')
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Registerations Number #</label>
                                    <input type="hidden" id="id" value="{{ $get_user->id }}">
                                    <input type="hidden" id="get_url" value="/inquiry">
                                    <input type="hidden" id="module_name" value="Inquiry">
                                    <input type="text" name="registeration_no" value="{{ $get_user->registeration_no }}"
                                        oninput="NameValidation(this)" placeholder="Enter Registeration  Number"
                                        class="form-control">
                                    <strong id="registeration_no" class="text-danger"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <select class="single-select" name="degree" id="degree" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}"
                                                {{ $get_user->degree == $degree->id ? 'selected' : '' }}>
                                                {{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="degree"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Program Name</label>
                                    <select class="single-select" name="program" id="program" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Degree First--</option>
                                    </select>
                                    <strong class="text-danger" id="program"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Session</label>
                                    <select class="single-select" name="session" autocomplete="off">
                                        <option value="" selected disabled>--Select the Session--</option>
                                        @if ($get_user->session == 'Morning')
                                            @php
                                                $morning = 'selected';
                                            @endphp
                                        @elseif ($get_user->session == 'Afternoon')
                                            @php
                                                $afternoon = 'selected';
                                            @endphp
                                        @else
                                            @php
                                                $evening = 'selected';
                                            @endphp
                                        @endif
                                        <option value="Morning" {{ @$morning }}>Morning</option>
                                        <option value="Afternoon" {{ @$afternoon }}>Afternoon</option>
                                        <option value="Evening" {{ @$evening }}>Evening</option>
                                    </select>
                                    <strong class="text-danger" id="session"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Room</label>
                                    <select class="single-select" name="class" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Room--</option>
                                        @foreach ($allclasses as $classes)
                                            <option value="{{ $classes->id }}"
                                                {{ $get_user->class == $classes->id ? 'selected' : '' }}>
                                                {{ $classes->classes_name }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Student Name </label>
                                    <input type="text" name="name" placeholder="Enter Student Name"
                                        class="form-control" value="{{ ucfirst($get_user->name) }}">
                                    <strong class="text-danger" id="name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Father Name </label>
                                    <input type="text" name="father_name" oninput="NameValidation(this)"
                                        placeholder="Enter Father Name" class="form-control"
                                        value="{{ ucfirst($get_user->father_name) }}">
                                    <strong class="text-danger" id="father_name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Email Address</label>
                                    <div class="form-icon right">
                                        <input type="email" name="email" value="{{ $get_user->email }}"
                                            class="form-control form-control-icon" id="iconrightInput"
                                            placeholder="example@gmail.com">
                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                    <strong class="text-danger" id="email"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Contact Number</label>
                                    <input type="text" name="contact_no" value="{{ $get_user->contact_no }}"
                                        class="form-control contact_number" placeholder="+XX-XXXXXXXXXX">
                                    <strong class="text-danger" id="contact_no"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Gender</label>
                                    <select class="single-select" name="gender" autocomplete="off">
                                        <option value="" selected disabled>--Select the Gender--</option>
                                        @if ($get_user->gender == 'Male')
                                            @php
                                                $male = 'selected';
                                            @endphp
                                        @else
                                            @php
                                                $female = 'selected';
                                            @endphp
                                        @endif
                                        <option value="Male" {{ @$male }}>Male</option>
                                        <option value="Female" {{ @$female }}>Female</option>
                                    </select>
                                    <strong class="text-danger" id="session"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="single-select" name="student_status" id="student_status_select"
                                        onchange="showHideStartDate()">
                                        <option selected disabled value="">--Select the Status--</option>
                                        @if ($get_user->student_status == 'Old')
                                            @php
                                                $old = 'selected';
                                            @endphp
                                        @else
                                            @php
                                                $new = 'selected';
                                            @endphp
                                        @endif
                                        <option value="Old" {{ @$old }}>Old</option>
                                        <option value="New" {{ @$new }}>New</option>
                                    </select>
                                    <strong id="student_status"></strong>
                                </div>

                                <div class="col-md-4" id="start_date_div" style="display: none">
                                    <label for="validationCustom01" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                    <strong class="text-danger" id="start_date"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="syear" class="form-label">Batch</label>
                                    <input type="text" class="form-control" value="{{ $get_user->batch }}"
                                        id="syear" name="batch">
                                    <strong id="batch" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address...">{{ $get_user->address }}</textarea>
                                </div>
                                <h6 class="mt-5 text-uppercase">Guardian Information</h6>
                                <hr />

                                <div class="col-md-4">
                                    <label for="guardian" class="form-label">Guardian Name</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        name="guadian_name" value="{{ $get_user->guadian_name }}"
                                        placeholder="Enter Guardian Name">
                                    <strong class="text-danger" id="guadian_name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="guar" class="form-label">Guardian Contact Number</label>
                                    <input type="text" class="form-control contact_number"
                                        placeholder="+XX-XXXXXXXXXX" id="guar" name="guadian_number"
                                        value="{{ $get_user->guadian_number }}">
                                    <strong class="text-danger" id="guadian_number"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="rel" class="form-label">Relation with Student</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        id="rel" name="relation_guadian" value="{{ $get_user->relation_guadian }}"
                                        placeholder="Enter Relation with Student">
                                    <strong id="relation_guadian" class="text-danger"></strong>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Occupation</label>
                                    <select id="selectBox" onchange="changeFunc();" name="occupation"
                                        class="single-select">
                                        <option selected disabled value="">--Select the Occupation--</option>
                                        @if ($get_user->occupation == 'business')
                                            @php
                                                $business = 'selected';
                                            @endphp
                                        @else
                                            @php
                                                $job = 'selected';
                                            @endphp
                                        @endif
                                        <option value="business" {{ @$business }}>Business</option>
                                        <option value="job" {{ @$job }}>Job</option>
                                    </select>
                                    <strong class="text-danger" id="occupation"></strong>
                                </div>

                                <div class="col-md-4" style="display: none" id="deal">
                                    <label for="deals" class="form-label">Deals</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        id="deals" name="deals" placeholder="Enter Deals">
                                    <strong class="text-danger" id="deals"></strong>
                                </div>

                                <div class="col-md-4" style="display: none" id="des">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        name="designation" placeholder="Enter Designation">
                                    <strong id="designation" class="text-danger"></strong>
                                </div>

                                <div class="col-md-4" style="display: none" id="organ">
                                    <label for="gorganization" class="form-label">Organization</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        name="organization" placeholder="Enter Organization">
                                    <strong class="text-danger" id="organization"></strong>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/inquiry') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                            type="submit" id="update">Update Inquiry > </button>
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
        function showHideStartDate() {
            var statusSelect = document.getElementById("student_status_select");
            var startDateDiv = document.getElementById("start_date_div");

            if (statusSelect.value === "New") {
                startDateDiv.style.display = "block";
            } else {
                startDateDiv.style.display = "none";
            }
        }
        $(document).ready(function() {


            $("#total").keyup(function() {
                $.div();
            });
            $("#marks").keyup(function() {
                $.div();
            });


            $.div = function() {
                let total = parseInt($("#total").val());
                let marks = parseInt($("#marks").val());

                if (isNaN(total) != false) {
                    total = 0;
                }
                if (isNaN(marks) != false) {
                    marks = 0;
                }
                $("#per").val(parseInt(marks * 100 / total));
            }

            function loadData(type, degree_id) {
                $.ajax({
                    url: "ajax/load1.php",
                    type: "post",
                    data: {
                        type: type,
                        id: degree_id
                    },
                    success: function(data) {

                        if (type == "programData") {
                            $("#program").html(data);
                        }
                    }
                });
            }

            loadData();
            $("#degree").on("change", function() {

                var degree = $("#degree").val();

                loadData("programData", degree);

            });
        });

        function changeFunc() {
            var selectBox = document.getElementById("selectBox");

            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            if (selectedValue == "business") {
                $('#deal').show();
                console.log(selectedValue);
            } else {
                $('#deal').hide();
            }
            if (selectedValue == "job") {
                $('#des').show();
                console.log(selectedValue);

            } else {
                $('#des').hide();
            }
            if (selectedValue == "job") {
                $('#organ').show();
                console.log(selectedValue);

            } else {
                $('#organ').hide();
            }

        }

        function changeFunc1() {
            var selectBox1 = document.getElementById("selectBox1");

            var selectedValue1 = selectBox1.options[selectBox1.selectedIndex].value;

            if (selectedValue1 == "student") {
                $('#name').show();
                console.log(selectedValue1);
            } else {
                $('#name').hide();
            }
            if (selectedValue1 == "student") {
                $('#clas').show();
                console.log(selectedValue1);
            } else {
                $('#clas').hide();
            }
            if (selectedValue1 == "student") {
                $('#institut').show();
                console.log(selectedValue1);
            } else {
                $('#institut').hide();
            }
            if (selectedValue1 == "employee") {
                $('#perfes').show();
                console.log(selectedValue1);

            } else {
                $('#perfes').hide();
            }
            if (selectedValue1 == "employee") {
                $('#org').show();
                console.log(selectedValue1);

            } else {
                $('#org').hide();
            }
            if (selectedValue1 == "employee") {
                $('#design').show();
                console.log(selectedValue1);

            } else {
                $('#design').hide();
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
