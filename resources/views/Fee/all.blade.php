@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Fee</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/all_fee') }}">Fee</a></li>
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
                        <h5 class="card-title mb-0">View Fee</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Profile Image</th>
                                    <th>Registeration No #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Fee Amount</th>
                                    <!--<th>Fee Status</th>-->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allfee as $fee)
                                    @if (isset($array_student[$fee['student_id']]))
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td><img src="{{ asset('/admin/assets/images/instructors/' . $array_student[$fee['student_id']]['teacher_picture']) }}"
                                                    alt="img not found" class="avatar-md rounded img-thumbnail"></td>
                                            <td>
                                                <h5><span class="badge badge-label bg-primary"><i
                                                            class="mdi mdi-circle-medium"></i>
                                                        {{ 'Reg-' . $array_student[$fee['student_id']]['registeration_no'] }}</span>
                                                </h5>
                                            </td>
                                            <td>{{ ucfirst($array_student[$fee['student_id']]['name']) }}</td>
                                            <td>{{ $array_student[$fee['student_id']]['email'] }}</td>
                                            <td>{{ $array_student[$fee['student_id']]['contact_no'] }}</td>
                                            <td>{{ $array_student[$fee['student_id']]['contact_no'] }}</td>
                                            <!--<td>-->
                                            <!--    <h5><span class="badge badge-soft-primary">Paid</span></h5>-->
                                            <!--</td>-->
                                            <td>
                                                <h5><span class="badge badge-soft-secondary"><a
                                                            href="{{ url('/fee-details/' . $fee['student_id']) }}">Details</a></span>
                                                </h5>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="9" align="center" style="color:#004454;font-weight:bold;">No Data
                                            Available</td>
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
                            columns: [0, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 2, 3, 4, 5, 6, 7]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
