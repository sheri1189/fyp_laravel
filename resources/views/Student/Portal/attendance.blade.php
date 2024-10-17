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
                            <li class="breadcrumb-item"><a href="{{ url('/student_attendance') }}">Attendance</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View All Attendance</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Registeration No #</th>
                                    <th>Student Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                    date_default_timezone_set('Asia/Karachi');
                                @endphp
                                @forelse ($allattendance as $attendance)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td>
                                            <h5><span class="badge badge-label bg-primary"><i
                                                        class="mdi mdi-circle-medium"></i>
                                                    {{ 'Reg-' . $attendance->registeration_no }}</span></h5>
                                        </td>
                                        <td>{{ $attendance->student_name }}</td>
                                        <td>{{ date('d/m/Y', strtotime($attendance->date)) }}</td>
                                        <td>{{ $attendance->time }}</td>
                                        <td>
                                            @if ($attendance->status =='Present')
                                                @php
                                                    echo"<span class='badge badge-soft-primary'>Present</span>";
                                                @endphp
                                            @else
                                                @php
                                                    echo"<span class='badge badge-soft-danger'>Absent</span>";
                                                @endphp
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" align="center" style="color:#004454;font-weight:bold;">No
                                            Data Avalable</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
