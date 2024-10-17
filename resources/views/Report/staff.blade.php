@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teachers Attendance Report</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Teachers Attendance Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="live-preview">
                                <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                    <div class="col-6">
                                        <label class="form-label">Select Teacher *</label>
                                        <select name="category_name" id="teacher_id" class="single-select" required>
                                            <option value="" selected disabled>--Select Teacher--</option>
                                            @foreach ($allteacher as $teacher)
                                                <option value="{{ $teacher->id }}">
                                                    {{ ucfirst($teacher->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Select Type *</label>
                                        <select name="category_name" id="select_type" class="single-select" required>
                                            <option value="" selected disabled>--Select Type--</option>
                                            <option value="Present">Present</option>
                                            <option value="Absent">Absent</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Period *</label>
                                        <select id="period" class="single-select">
                                            <option selected disabled>Select Period</option>
                                            <option value="Today">Today</option>
                                            <option value="Yesterday">Yesterday</option>
                                            <option value="This Week">This Week</option>
                                            <option value="Last Week">Last Week</option>
                                            <option value="Last 7 Days">Last 7 Days</option>
                                            <option value="Last 30 Days">Last 30 Days</option>
                                            <option value="Last 60 Days">Last 60 Days</option>
                                            <option value="Last 90 Days">Last 90 Days</option>
                                            <option value="This Year">This Year</option>
                                            <option value="Last Year">Last Year</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Date *</label>
                                        <input type="text" id="date" placeholder="Enter From Date"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Teachers Attendance Report</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Teacher Name</th>
                                    <th>Date</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="append_data">
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($alldata as $data)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $array_data[$data->id]['name'] }}</td>
                                        <td>{{ $data->date }}</td>
                                        <td>{{ $data->in_time }}</td>
                                        <td>{{ $data->out_time }}</td>
                                        <td>
                                            @if ($data->attendance_status == 'Present')
                                                <h5><span class="badge badge-soft-primary">Present</span></h5>
                                            @else
                                                <h5><span class="badge badge-soft-success">Absent</span></h5>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:14px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on("change", "#period", function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                var currentDate = new Date();
                var final_date = "";
                var period_name = "";
                if (value == "Today") {
                    var year = currentDate.getFullYear();
                    var month = currentDate.getMonth() + 1;
                    var day = currentDate.getDate();
                    var hours = currentDate.getHours();
                    var minutes = currentDate.getMinutes();
                    var seconds = currentDate.getSeconds();
                    var formattedDate = year + '-' + month + '-' + day;
                    var period_name = "Today";
                    var final_date = formattedDate;
                    $("#date").val(formattedDate);
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        defaultDate: formattedDate
                    });
                } else if (value == "Yesterday") {
                    currentDate.setDate(currentDate.getDate() - 1);
                    var year = currentDate.getFullYear();
                    var month = currentDate.getMonth() + 1;
                    var day = currentDate.getDate();
                    var formattedDate = year + '-' + month + '-' + day;
                    var period_name = "Yesterday";
                    var final_date = formattedDate;
                    $("#date").val(formattedDate);
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        defaultDate: formattedDate
                    });
                } else if (value == "This Week") {
                    const currentDate = new Date();
                    const firstDayOfTheWeek = new Date(currentDate);
                    firstDayOfTheWeek.setDate(currentDate.getDate() - currentDate.getDay());
                    const lastDayOfTheWeek = new Date(firstDayOfTheWeek);
                    lastDayOfTheWeek.setDate(firstDayOfTheWeek.getDate() + 6);
                    const formattedFirstDay =
                        `${firstDayOfTheWeek.getFullYear()}-${(firstDayOfTheWeek.getMonth() + 1).toString().padStart(2, '0')}-${firstDayOfTheWeek.getDate().toString().padStart(2, '0')}`;
                    const formattedLastDay =
                        `${lastDayOfTheWeek.getFullYear()}-${(lastDayOfTheWeek.getMonth() + 1).toString().padStart(2, '0')}-${lastDayOfTheWeek.getDate().toString().padStart(2, '0')}`;
                    const concatenatedDates = formattedFirstDay + " to " + formattedLastDay;
                    var period_name = "This Week";
                    var final_date = concatenatedDates;
                    $("#date").val(concatenatedDates);
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDay,
                        maxDate: formattedLastDay,
                    });
                } else if (value == "Last Week") {
                    const firstDayOfCurrentWeek = new Date(currentDate);
                    firstDayOfCurrentWeek.setDate(currentDate.getDate() - currentDate.getDay());
                    const lastDayOfCurrentWeek = new Date(firstDayOfCurrentWeek);
                    lastDayOfCurrentWeek.setDate(firstDayOfCurrentWeek.getDate() + 6);
                    const firstDayOfLastWeek = new Date(firstDayOfCurrentWeek);
                    firstDayOfLastWeek.setDate(firstDayOfCurrentWeek.getDate() - 7);
                    const lastDayOfLastWeek = new Date(firstDayOfLastWeek);
                    lastDayOfLastWeek.setDate(firstDayOfLastWeek.getDate() + 6);
                    const formattedFirstDayOfLastWeek =
                        `${firstDayOfLastWeek.getFullYear()}-${(firstDayOfLastWeek.getMonth() + 1).toString().padStart(2, '0')}-${firstDayOfLastWeek.getDate().toString().padStart(2, '0')}`;
                    const formattedLastDayOfLastWeek =
                        `${lastDayOfLastWeek.getFullYear()}-${(lastDayOfLastWeek.getMonth() + 1).toString().padStart(2, '0')}-${lastDayOfLastWeek.getDate().toString().padStart(2, '0')}`;
                    const concatenatedDates = formattedFirstDayOfLastWeek + " to " +
                        formattedLastDayOfLastWeek;
                    var period_name = "Last Week";
                    var final_date = concatenatedDates;
                    $("#date").val(concatenatedDates);
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDayOfLastWeek,
                        maxDate: formattedLastDayOfLastWeek,
                    });
                } else if (value == "Last 7 Days") {
                    const sevenDaysAgo = new Date(currentDate);
                    sevenDaysAgo.setDate(currentDate.getDate() -
                        7);
                    const formattedFirstDate = formatDate(sevenDaysAgo);
                    const formattedLastDate = formatDate(currentDate);
                    const dateRange = formattedFirstDate + " to " + formattedLastDate;
                    var period_name = "Last 7 Days";
                    var final_date = dateRange;
                    $("#date").val(dateRange)
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDate,
                        maxDate: formattedLastDate,
                    });

                    function formatDate(date) {
                        return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
                    }
                } else if (value == "Last 30 Days") {
                    const thirtyDaysAgo = new Date(currentDate);
                    thirtyDaysAgo.setDate(currentDate.getDate() -
                        30);
                    const formattedFirstDate = formatDate(thirtyDaysAgo);
                    const formattedLastDate = formatDate(currentDate);
                    const dateRange = formattedFirstDate + " to " + formattedLastDate;
                    var period_name = "Last 30 Days";
                    var final_date = dateRange;
                    $("#date").val(dateRange)
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDate,
                        maxDate: formattedLastDate,
                    });

                    function formatDate(date) {
                        return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
                    }
                } else if (value == "Last 60 Days") {
                    const ninetyDaysAgo = new Date(currentDate);
                    ninetyDaysAgo.setDate(currentDate.getDate() -
                        60);
                    const formattedFirstDate = formatDate(ninetyDaysAgo);
                    const formattedLastDate = formatDate(currentDate);
                    const dateRange = formattedFirstDate + " to " + formattedLastDate;
                    var period_name = "Last 60 Days";
                    var final_date = dateRange;
                    $("#date").val(dateRange)
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDate,
                        maxDate: formattedLastDate,
                    });

                    function formatDate(date) {
                        return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
                    }

                } else if (value == "Last 90 Days") {
                    const ninetyDaysAgo = new Date(currentDate);
                    ninetyDaysAgo.setDate(currentDate.getDate() -
                        90);
                    const formattedFirstDate = formatDate(ninetyDaysAgo);
                    const formattedLastDate = formatDate(currentDate);
                    const dateRange = formattedFirstDate + " to " + formattedLastDate;
                    var period_name = "Last 90 Days";
                    var final_date = dateRange;
                    $("#date").val(dateRange)
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDate,
                        maxDate: formattedLastDate,
                    });

                    function formatDate(date) {
                        return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
                    }

                } else if (value == "This Year") {
                    const firstDayOfTheYear = new Date(currentDate.getFullYear(), 0, 1);
                    const lastDayOfTheYear = new Date(currentDate.getFullYear(), 11, 31);
                    const formattedFirstDate = formatDate(firstDayOfTheYear);
                    const formattedLastDate = formatDate(lastDayOfTheYear);
                    const dateRange = formattedFirstDate + " to " + formattedLastDate;
                    var period_name = "This Year";
                    var final_date = dateRange;
                    $("#date").val(dateRange)
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDate,
                        maxDate: formattedLastDate,
                    });

                    function formatDate(date) {
                        return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
                    }
                } else if (value == "Last Year") {
                    const firstDayOfLastYear = new Date(currentDate.getFullYear() - 1, 0, 1);
                    const lastDayOfLastYear = new Date(currentDate.getFullYear() - 1, 11, 31);
                    const formattedFirstDate = formatDate(firstDayOfLastYear);
                    const formattedLastDate = formatDate(lastDayOfLastYear);
                    const dateRange = formattedFirstDate + " to " + formattedLastDate;
                    var period_name = "Last Year";
                    var final_date = dateRange;
                    $("#date").val(dateRange)
                    $("#date").datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: formattedFirstDate,
                        maxDate: formattedLastDate,
                    });

                    function formatDate(date) {
                        return `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
                    }
                }
                var teacher_id = $("#teacher_id").val();
                var select_type = $("#select_type").val();
                $.ajax({
                    url: "/select_teacher/" + period_name,
                    method: "GET",
                    data: {
                        "teacher_id": teacher_id,
                        "select_type": select_type,
                    },
                    success: function(response) {
                        if (response.message == 300) {
                            $("#append_data").empty();
                            $("#append_data").append(
                                "<tr><td colspan='9' align='center' style='color:#004454;font-weight:bold;'>No Data Avalable</td></tr>"
                            );
                        } else {
                            var count = 0;
                            $("#append_data").empty();
                            $.each(response.message, function(index, item) {
                                count++;
                                var type = (item.attendance_status ==
                                        "Present") ?
                                    "<h5><span class='badge badge-soft-primary'>Present</span></h5>" :
                                    "<h5><span class='badge badge-soft-success'>Absent</span></h5>";
                                $("#append_data").append("<tr><td>" + count +
                                    "</td><td>" + response.message2[item.id][
                                    'name'] +
                                    "</td><td>" + item.date +
                                    "</td><td>" + item.in_time +
                                    "</td><td>" + item.out_time +
                                    "</td><td>" + type +
                                    "</td></tr>");
                            });
                        }
                    }
                })
            })
        })
    </script>
@endsection
