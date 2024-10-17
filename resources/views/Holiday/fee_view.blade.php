@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div id="myModalDescription" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">View Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <p id="view_description"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Fee Reminder</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/fee_reminder_view') }}">Fee</a></li>
                            <li class="breadcrumb-item active">Reminder</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Reminder</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Reminder Name</th>
                                    <th>Reminder Status</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Month</th>
                                    <th>Reminder Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allfeereminder as $feereminder)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td>{{ $feereminder->reminder_name }}</td>
                                        <td>
                                            <h5><span class="badge badge-soft-success">{{ $feereminder->status }}</span>
                                            </h5>
                                        </td>
                                        <td>{{ $feereminder->from_date }}</td>
                                        <td>{{ $feereminder->to_date }}</td>
                                        <td>{{ date('M') }}</td>
                                        <td>
                                            <h5><span class="badge badge-soft-primary">{{ $feereminder->type }}</span></h5>
                                        </td>
                                        <td class="feereminder_description_{{ $feereminder->id }}" id="get_description"
                                            data-description="{{ $feereminder->description }}" style="cursor: pointer">
                                            {{ implode(' ', array_slice(explode(' ', $feereminder->description), 0, 4)) }}
                                            <span id="get_description" data-description="{{ $feereminder->description }}"
                                                class="badge bg-light text-dark" style="cursor: pointer">...</span>
                                        </td>
                                        <td><a href="{{ url('/fee_reminder_update/' . $feereminder->id) }}"
                                                class="btn btn-primary"> Edit</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" align="center" style="color:#004454;font-weight:bold;">No
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on("change", "#SwitchCheck1", function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/degree/" + value,
                    method: "GET",
                    success: function(response) {
                        if (response.message.degree_status == 2) {
                            $("#degree_status_" + response.message.id).empty();
                            $("#degree_status_" + response.message.id).append("Active");
                        } else {
                            $("#degree_status_" + response.message.id).empty();
                            $("#degree_status_" + response.message.id).append("In-Active");
                        }
                    }
                })
            })
            $(document).on("click", ".update", function(stop) {
                stop.preventDefault();
                var id = $(this).data("update");
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: "/degree/" + id + "/edit",
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#name").empty();
                        $("#description").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#name").val(response.message.degree_name);
                        $("#description").val(response.message.degree_description);
                    }
                })
            });
            $(document).on("click", "#get_description", function(stop) {
                stop.preventDefault();
                $("#myModalDescription").modal("show");
                var value = $(this).data("description");
                $("#view_description").empty();
                $("#view_description").append(value);
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
