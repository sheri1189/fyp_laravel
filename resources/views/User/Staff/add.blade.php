@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Staff</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/staff') }}">Staff</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Staff</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Registerations Number #</label>
                                    <input type="hidden" id="get_url" value="/staff">
                                    <input type="hidden" id="module_name" value="Staff">
                                    <input type="text" name="registeration_no" value="{{ $registeration_no }}"
                                        placeholder="Enter Registeration  Number" class="form-control" readonly required>
                                    <strong id="registeration_no" class="text-danger"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Staff Designation </label>
                                    <input type="text" name="designation"
                                        placeholder="Enter Staff Designation" class="form-control" required
                                        value="{{ old('designation') }}">
                                    <strong class="text-danger" id="designation"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Staff Name </label>
                                    <input type="text" name="name" placeholder="Enter Staff Name" class="form-control"
                                        value="{{ old('name') }}" required>
                                    <strong class="text-danger" id="name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Father Name </label>
                                    <input type="text" name="father_name" oninput="NameValidation(this)"
                                        placeholder="Enter Father Name" class="form-control" required
                                        value="{{ old('father_name') }}">
                                    <strong class="text-danger" id="father_name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Staff CNIC</label>
                                    <input type="cnic" name="cnic" class="form-control cnic_number"
                                        placeholder="XXXXX-XXXXXXX-X" required>
                                    <strong class="text-danger" id="cnic"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Contact Number</label>
                                    <input type="text" name="contact_no" class="form-control contact_number"
                                        placeholder="+XX-XXXXXXXXXX" required>
                                    <strong class="text-danger" id="contact_no"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Gender</label>
                                    <select class="single-select" name="gender" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <strong class="text-danger" id="session"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" required id="address" name="address" rows="3" placeholder="Address..."></textarea>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/staff') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                            type="submit" id="insert">Add Staff > </button>
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

            if (selectedValue1 == "Staff") {
                $('#name').show();
                console.log(selectedValue1);
            } else {
                $('#name').hide();
            }
            if (selectedValue1 == "Staff") {
                $('#clas').show();
                console.log(selectedValue1);
            } else {
                $('#clas').hide();
            }
            if (selectedValue1 == "Staff") {
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
