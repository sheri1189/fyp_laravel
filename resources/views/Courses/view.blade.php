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
                        <p id="view_description" style="font-size: 15px"></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModalBenefits" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">View Benefits</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <p id="view_benefits" style="font-size: 15px"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Group</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/courses') }}">Group</a></li>
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
                        <h5 class="card-title mb-0">View Group</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-orzdering="false">SR No.</th>
                                    <th>Image</th>
                                    <th>Group Title Name</th>
                                    <th>Degree Name</th>
                                    <th>Class Name</th>
                                    <th>Duration</th>
                                    <th>Monthly Fee Per Subject</th>
                                    <th>Group Benefits</th>
                                    <th>Group Description</th>
                                    <th>Group Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allcourse as $courses)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <th> <img
                                                src="{{ asset('admin/assets/images/courses/' . $courses->course_picture) }}"
                                                alt="not found" class="rounded avatar-md"></th>
                                        <td>{{ ucfirst($courses->course_title) }}</td>
                                        <td>{{ ucfirst($courses->degree->degree_name) }}</td>
                                        <td>{{ ucfirst($courses->program->program_name) }}</td>
                                        <td>{{ $courses->course_duration . '(Months)' }}</td>
                                        <td>{{ $courses->course_price }}</td>
                                        <td id="get_benefits" data-benefits="{{ $courses->course_benefits }}"
                                            style="cursor: pointer">
                                            {{ implode(' ', array_slice(explode(' ', $courses->course_benefits), 0, 4)) }}
                                            <span id="get_benefits" data-benefits="{{ $courses->course_benefits }}"
                                                class="badge bg-light text-dark" style="cursor: pointer">...</span>
                                        </td>
                                        <td id="get_description" data-description="{{ $courses->course_description }}"
                                            style="cursor: pointer">
                                            {{ implode(' ', array_slice(explode(' ', $courses->course_description), 0, 4)) }}
                                            <span id="get_description"
                                                data-description="{{ $courses->course_description }}"
                                                class="badge bg-light text-dark" style="cursor: pointer">...</span>
                                        </td>
                                        <td>
                                            @if ($courses->course_status == 1)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck1" value="{{ $courses->id }}" checked>
                                                    <label class="form-check-label" id="course_status_{{ $courses->id }}"
                                                        for="SwitchCheck1">Active</label>
                                                </div>
                                            @else
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck1" value="{{ $courses->id }}">
                                                    <label class="form-check-label" for="SwitchCheck1"
                                                        id="course_status_{{ $courses->id }}">In-active</label>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="/courses">
                                                <input type="hidden" id="module_name" value="Course">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ url('/courses/' . $courses->id . '/edit/') }}"
                                                            class="dropdown-item edit-item-btn"
                                                            style="cursor: pointer;"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete"
                                                            data-del="{{ $courses->id }}" style="cursor: pointer;">
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
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
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
                    url: "/courses/" + value,
                    method: "GET",
                    success: function(response) {
                        if (response.message.course_status == 2) {
                            $("#course_status_" + response.message.id).empty();
                            $("#course_status_" + response.message.id).append("Active");
                        } else {
                            $("#course_status_" + response.message.id).empty();
                            $("#course_status_" + response.message.id).append("In-Active");
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
                    url: "/program/" + id + "/edit",
                    method: "GET",
                    success: function(response) {
                        $("#myModal").modal("show");
                        $("#id").empty();
                        $("#name").empty();
                        $("#degree").empty();
                        $("#description").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#name").val(response.message.program_name);
                        $("#description").val(response.message.program_description);
                        $("#degree").val(response.message.program_degree);
                        $.each(response.degree, function(key, val) {
                            $("#degree").append("<option value='" + val.id +
                                "' style='text-transform:capitalize'>" + val
                                .degree_name + "</option>");
                        });
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
            $(document).on("click", "#get_benefits", function(stop) {
                stop.preventDefault();
                $("#myModalBenefits").modal("show");
                var value = $(this).data("benefits");
                $("#view_benefits").empty();
                $("#view_benefits").append(value);
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
