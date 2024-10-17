@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Notice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Notice Name</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="/notice">
                                <input type="hidden" id="module_name" value="Notice Board">
                                <input type="text" name="notice_name" id="name" oninput="NameValidation(this)"
                                    placeholder="Enter Notice Name" class="form-control" required
                                    style="text-transform: capitalize">
                                <strong id="notice_name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Notice Description</label>
                                <textarea name="notice_description" id="description" oninput="AlphaNumericValidation(this)"
                                    placeholder="Enter Notice Description" rows="3" class="form-control" required></textarea>
                                <strong id="notice_description"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update">Update Notice > </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                    <h4 class="mb-sm-0">Notice</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/notice') }}">Notice</a></li>
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
                        <h5 class="card-title mb-0">View Notices</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Notice Name</th>
                                    <th>Notice Description</th>
                                    @if ($user->role_assign == 'Admin')
                                        <th>Notice Status</th>
                                    @endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allnotice as $notice)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td id="notice_name_{{ $notice->id }}">{{ ucfirst($notice->notice_name) }}</td>
                                        <td class="notice_description_{{ $notice->id }}" id="get_description"
                                            data-description="{{ $notice->notice_description }}" style="cursor: pointer">
                                            {{ implode(' ', array_slice(explode(' ', $notice->notice_description), 0, 4)) }}
                                            <span id="get_description" data-description="{{ $notice->notice_description }}"
                                                class="badge bg-light text-dark" style="cursor: pointer">...</span>
                                        </td>
                                        @if ($user->role_assign == 'Admin')
                                            <td>
                                                @if ($notice->notice_status == 1)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="SwitchCheck1" value="{{ $notice->id }}" checked>
                                                        <label class="form-check-label"
                                                            id="notice_status_{{ $notice->id }}"
                                                            for="SwitchCheck1">Active</label>
                                                    </div>
                                                @else
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                            id="SwitchCheck1" value="{{ $notice->id }}">
                                                        <label class="form-check-label" for="SwitchCheck1"
                                                            id="notice_status_{{ $notice->id }}">In-active</label>
                                                    </div>
                                                @endif
                                            </td>
                                        @endif
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="/notice">
                                                <input type="hidden" id="module_name" value="Notice">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn update"
                                                            data-update="{{ $notice->id }}" style="cursor: pointer;"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete"
                                                            data-del="{{ $notice->id }}" style="cursor: pointer;">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" align="center" style="color:#004454;font-weight:bold;">No
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
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
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
                    url: "/notice/" + value,
                    method: "GET",
                    success: function(response) {
                        if (response.message.notice_status == 2) {
                            $("#notice_status_" + response.message.id).empty();
                            $("#notice_status_" + response.message.id).append("Active");
                        } else {
                            $("#notice_status_" + response.message.id).empty();
                            $("#notice_status_" + response.message.id).append("In-Active");
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
                    url: "/notice/" + id + "/edit",
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#name").empty();
                        $("#description").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#name").val(response.message.notice_name);
                        $("#description").val(response.message.notice_description);
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
