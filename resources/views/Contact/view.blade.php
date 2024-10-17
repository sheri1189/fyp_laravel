@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Give Reply</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Reply Message</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="/apply_reply">
                                <input type="hidden" id="module_name" value="Reply">
                                <textarea name="reply_message" id="description" oninput="AlphaNumericValidation(this)"
                                    placeholder="Enter Degree Description" rows="3" class="form-control" required></textarea>
                                <strong id="reply_message"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update">Give Reply > </button>
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
                    <h4 class="mb-sm-0">Contacts</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/contact') }}">Contact</a></li>
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
                        <h5 class="card-title mb-0">View Contacts</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allcontact as $contact)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td>{{ ucfirst($contact->name) }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>
                                            @if ($contact->status == 'Pending')
                                                <h5><span class="badge badge-soft-danger">{{ $contact->status }}</span></h5>
                                            @else
                                                <h5><span class="badge badge-soft-success">{{ $contact->status }}</span></h5>
                                            @endif
                                        </td>
                                        <td id="get_description" data-description="{{ $contact->message }}"
                                            style="cursor: pointer">
                                            {{ implode(' ', array_slice(explode(' ', $contact->message), 0, 4)) }}
                                            <span id="get_description" data-description="{{ $contact->message }}"
                                                class="badge bg-light text-dark" style="cursor: pointer">...</span>
                                        </td>
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="/contact_delete">
                                                <input type="hidden" id="module_name" value="Contact">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn update"
                                                            data-update="{{ $contact->id }}" style="cursor: pointer;"><i
                                                                class="fas fa-reply me-2 text-muted"></i>
                                                            Reply</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete"
                                                            data-del="{{ $contact->id }}" style="cursor: pointer;">
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
                            columns: [0, 1, 2, 3,4]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on("click", ".update", function(stop) {
                stop.preventDefault();
                var id = $(this).data("update");
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: "/get_contact/" + id,
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
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
