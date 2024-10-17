@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Attendance</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/attendance') }}">Attendance</a></li>
                            <li class="breadcrumb-item active">Add Atttendance</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Attendance</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3">
                                <div class="col-md-4">
                                    <label for="">Choose Degree</label>
                                    <select name="class" class="single-select" id="getting_class">
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @php
                                            $unserclass = unserialize($teacher->class);
                                        @endphp
                                        @foreach ($unserclass as $class)
                                            <option value="{{ $class }}">
                                                {{ ucfirst($tec_class[$class]['degree_name']) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Choose Class</label>
                                    <select class="single-select" id="getting_program">
                                        <option value="" selected disabled>--Select Degree First--</option>
                                        {{-- @php
                                            $unserpro = unserialize($teacher->program);
                                        @endphp
                                        @foreach ($unserpro as $pro)
                                            <option value="{{ $pro }}">{{ ucfirst($progs[$pro]['program_name']) }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Choose Subject</label>
                                    <select name="subject" class="single-select" id="getting_subject">
                                        <option value="" selected disabled>--Select Subject--</option>
                                        @php
                                            $unsersub = unserialize($teacher->teacher_professional_field);
                                        @endphp
                                        @foreach ($unsersub as $unsub)
                                            <option value="{{ $unsub }}">
                                                {{ ucfirst($unsub) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" id="get_program">
                                <input type="hidden" class="form-control" id="get_class">
                                <input type="hidden" class="form-control" id="get_subject">
                                <div class="col-md-4">
                                    <button class="btn btn-primary" type="button" id="get_filteration"> <i
                                            class="fas fa-filter"></i> Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-3">Students Attendance</h6>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Registeration No #</th>
                                        <th>Student Name</th>
                                        <th>Batch</th>
                                        <th>Present</th>
                                        <th>Absent</th>
                                    </tr>
                                </thead>
                                <tbody id="getting_data">
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($all_students as $student)
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td>
                                                <h5><span class="badge badge-label bg-primary"><i
                                                            class="mdi mdi-circle-medium"></i>
                                                        {{ 'Reg-' . $student->registeration_no }}</span></h5>
                                            </td>
                                            <td>{{ ucfirst($student->name) }}</td>
                                            <td><span class='badge bg-primary'>{{ $student->batch }}</span></td>
                                            <td><button class='btn btn-sm btn-success present'
                                                    data-present="{{ $student->id }}">Present</button>
                                            </td>
                                            <td><button class='btn btn-sm btn-danger absent'
                                                    data-absent="{{ $student->id }}">Absent</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h6 class="card-title mb-0">Students Attendance</h6>
                            </div>
                            <div class="col-lg-4">
                                <span class="badge bg-primary"><a class="text-white" href="{{ url('/attendance') }}">All
                                        Attendance</a></span>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <table class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Attendance Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="append_data">
                                    </tbody>
                                </table>
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
            var table = $('#example2').DataTable({
                lengthChange: false,
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'excel',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fadeIn animated bx bx-printer"></i> Print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on('click', '.present', function(stop) {
                stop.preventDefault();
                var present = $(this).data("present");
                $.ajax({
                    url: "/present_student/" + present,
                    method: "GET",
                    success: function(response) {
                        if (response.message == 200) {
                            attendance();
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Present Added Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                })
            })
        })
        $(document).ready(function() {
            $(document).on('click', '.absent', function(stop) {
                stop.preventDefault();
                var absent = $(this).data("absent");
                $.ajax({
                    url: "/absent_student/" + absent,
                    method: "GET",
                    success: function(response) {
                        if (response.message == 200) {
                            attendance();
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Absent Added Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    }
                })
            })
        })

        function attendance() {
            $.ajax({
                url: "/all_attendance",
                method: "GET",
                success: function(response) {
                    $("#append_data").empty();
                    $.each(response.message, function(key, value) {
                        if (value.status === "Present") {
                            var badge = "<span class='badge badge-soft-primary'>Present</span>";
                        } else {
                            var badge = "<span class='badge badge-soft-danger'>Absent</span>";
                        }
                        $("#append_data").append("<tr><th>" + value.student_name + "</th><th>" + badge +
                            "</th></tr>")
                    })
                }
            })
        }
        attendance();
        $(document).ready(function() {
            $(document).on("change", "#getting_program", function(s) {
                s.preventDefault();
                var value = $(this).val();
                $("#get_program").val(value);
            })
            $(document).on("change", "#getting_class", function(s) {
                s.preventDefault();
                var value2 = $(this).val();
                $("#get_class").val(value2);
            })
            $(document).on("change", "#getting_subject", function(s) {
                s.preventDefault();
                var value3 = $(this).val();
                $("#get_subject").val(value3);
            })
            $(document).on("click", "#get_filteration", function(stop) {
                stop.preventDefault();
                var value_program = $("#get_program").val();
                var value_class = $("#get_class").val();
                var value_subject = $("#get_subject").val();
                $.ajax({
                    url: "/program_based_students",
                    method: "POST",
                    data: {
                        "program": value_program,
                        "class": value_class,
                        "subject": value_subject,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $("#getting_data").empty();
                        var count = 0;
                        $.each(response.message, function(key, value) {
                            count++
                            $("#getting_data").append("<tr><td>" + count +
                                "</td><td><span class='badge badge-label bg-primary'><i class='mdi mdi-circle-medium'></i> Reg-" +
                                value.registeration_no + "</span></td><td>" + value
                                .name + "</td><td><span class='badge bg-primary'>" +
                                value.batch +
                                "</span></td><td><button class='btn btn-sm btn-success present' data-present='" +
                                value.id +
                                "'>Present</button></td><td><button class='btn btn-sm btn-danger absent' data-absent='" +
                                value.id + "'>Absent</button></td></tr>"
                            );
                        })
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#getting_class', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_program/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#getting_program").empty();
                        $("#getting_program").append(
                            "<option value='' selected disabled>--Select the Class--</option>"
                        );
                        $.each(response.message, function(index, value) {
                            $("#getting_program").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.program_name + "</option>");
                        })
                    }
                })
            })
        })
    </script>
@endsection
