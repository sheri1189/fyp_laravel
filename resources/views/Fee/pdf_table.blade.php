@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Fee Vouchers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/over_all') }}">Voucher</a></li>
                            <li class="breadcrumb-item active">All</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">All Fee Vouchers</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Voucher No #</th>
                                    <th>Month</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Fee Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>
                                            <h5><span class="badge badge-label bg-primary"><i
                                                        class="mdi mdi-circle-medium"></i>
                                                    {{ $array_vouchers[$student->id]['fee_receipt_no'] }}</span>
                                            </h5>
                                        </td>
                                        <td>
                                            <h5><span class="badge badge-label bg-success"><i
                                                        class="mdi mdi-circle-medium"></i>
                                                    {{ $array_vouchers[$student->id]['month'] }}</span>
                                            </h5>
                                        </td>
                                        <td>{{ ucfirst($student->name) }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            @if ($array_vouchers[$student->id]['fee_status'] == 'Paid')
                                                <h5><span class="badge badge-soft-success">{{ __('Paid') }}</span>
                                                @else
                                                    <h5><span class="badge badge-soft-warning">{{ __('Awaiting') }}</span>
                                            @endif
                                            </h5>
                                        </td>
                                        <td>
                                            <h5><span class="badge badge-soft-secondary"><a
                                                        href="{{ url('/voucher-details/' . $student->id) }}"><i
                                                            class="bx bx-file"></i> Details</a></span>
                                            </h5>
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
                            columns: [0]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fadeIn animated bx bx-printer"></i> Print',
                        exportOptions: {
                            columns: [0]
                        }
                    }
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
