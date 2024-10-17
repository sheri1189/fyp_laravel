@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Delay Fee</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/delay_fee') }}">Delay Fee</a></li>
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
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title mb-0">View Delay Fee</h5>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-primary btn-with-icon" id="button_move"><i class="fas fa-bell"></i>
                                    Apply Fee Reminder</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Profile Image</th>
                                    <th>Registeration No #</th>
                                    <th>Course Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Fee Pay Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allstudent as $student)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td><img src="{{ asset('/admin/assets/images/instructors/' . $student->teacher_picture) }}"
                                                alt="img not found" class="avatar-md rounded img-thumbnail"></td>
                                        <td>
                                            <h5><span class="badge badge-label bg-primary"><i
                                                        class="mdi mdi-circle-medium"></i>
                                                    {{ 'Reg-' . $student->registeration_no }}</span></h5>
                                        </td>
                                        <td>
                                            <h5><span
                                                    class="badge bg-light text-dark">{{ ucfirst($program_array[$student->id]) }}</span>
                                            </h5>
                                        </td>
                                        <td>{{ ucfirst($student->name) }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->contact_no }}</td>
                                        <td>
                                            <h5><span class="badge badge-soft-danger">Un Paid</span></h5>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" align="center" style="color:#004454;font-weight:bold;">No
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
        $(document).ready(function() {
            $(document).on("click", "#button_move", function(stop) {
                stop.preventDefault();
                const button = document.getElementById("button_move");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                $.ajax({
                    url: "/delay_fee_notice/",
                    method: "GET",
                    success: function(response) {
                        if (response.message == 200) {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Reminder Created Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            button.removeAttribute("disabled");
                            button.innerHTML = "<i class='fas fa-bell'></i> Apply Fee Reminder";
                        }
                    }
                })
            })
        })
    </script>
@endsection
