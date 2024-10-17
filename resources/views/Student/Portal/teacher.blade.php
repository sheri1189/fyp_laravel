@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="profile-foreground position-relative mx-n4 mt-n4">
                                <div class="profile-wid-bg">
                                    <img src="{{ asset('/admin/assets/images/profile-bg.jpg') }}" alt=""
                                        class="profile-wid-img" />
                                </div>
                            </div>
                            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                                <div class="row g-4">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="{{ asset('/admin/assets/images/users/dummy.jpg') }}" alt="user-img"
                                                class="img-thumbnail rounded-circle" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col">
                                        <div class="p-2">
                                            <h3 class="text-white mb-1" id="name"></h3>
                                            <p class="text-white text-opacity-75" id="enter_type"></p>
                                            <div class="hstack text-white-50 gap-1">
                                                <div class="me-2"><i
                                                        class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i><span
                                                        id="address"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="d-flex profile-wrapper">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link fs-14 active" data-bs-toggle="tab"
                                                        href="{{ url('#overview-tab') }}" role="tab">
                                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                            class="d-none d-md-inline-block">Overview</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Tab panes -->
                                        <div class="tab-content pt-4 text-muted">
                                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-xxl-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title mb-5">Complete Your Profile</h5>
                                                                <div
                                                                    class="progress animated-progress custom-progress progress-label">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        style="width: 100%" aria-valuenow="30"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="label">100%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title mb-3">General Information</h5>
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless mb-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Father
                                                                                    Name :
                                                                                </th>
                                                                                <th class="text-muted" id="father_name">
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">CNIC
                                                                                    Number :
                                                                                </th>
                                                                                <th class="text-muted" id="cnic"></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Mobile :
                                                                                </th>
                                                                                <th class="text-muted" id="contact_no"></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">E-mail :
                                                                                </th>
                                                                                <th class="text-muted" id="email"></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Gender :
                                                                                </th>
                                                                                <th class="text-muted" id="gender"></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Degree
                                                                                    Status:
                                                                                </th>
                                                                                <th class="text-muted" id="degree"></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="ps-0" scope="row">Degree
                                                                                    Univeristy :
                                                                                </th>
                                                                                <th class="text-muted" id="program">
                                                                                </th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teacher</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/student_teacher') }}">Teacher</a></li>
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
                        <h5 class="card-title mb-0">View Teacher</h5>
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
                                    <th>Enter From</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allteacher as $teacher)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td><img src="{{ asset('/admin/assets/images/instructors/' . $teacher->teacher_picture) }}"
                                                alt="img not found" class="avatar-md rounded img-thumbnail"></td>
                                        <td>
                                            <h5><span class="badge badge-label bg-primary"><i
                                                        class="mdi mdi-circle-medium"></i>
                                                    {{ 'Reg-' . $teacher->registeration_no }}</span></h5>
                                        </td>
                                        <td>{{ ucfirst($teacher->name) }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->contact_no }}</td>
                                        <td>
                                            <h5><span class="badge badge-soft-primary">{{ 'Teacher' }}</span></h5>
                                        </td>
                                        <td>
                                            @if ($teacher->is_active == 1)
                                                <h5><span class="badge badge-soft-success">{{ 'Active' }}</span>
                                                </h5>
                                            @endif
                                        </td>
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="/teacher">
                                                <input type="hidden" id="module_name" value="Teacher">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn detail"
                                                            data-detail="{{ $teacher->id }}" style="cursor: pointer;"><i
                                                                class="fas fa-user align-bottom me-2 text-muted"></i>
                                                            Profile</a></li>
                                                </ul>
                                            </div>
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
                            columns: [0,2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0,2, 3, 4, 5, 6, 7]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0,2, 3, 4, 5, 6, 7]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on("click", ".detail", function(stop) {
                stop.preventDefault();
                const titleCase = (s) => s.replace(/\b\w/g, c => c.toUpperCase());
                var value = $(this).data("detail");
                $.ajax({
                    url: "/teacher/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#myModal").modal("show");
                        $("#name").empty();
                        $("#email").empty();
                        $("#enter_type").empty();
                        $("#contact_no").empty();
                        $("#father_name").empty();
                        $("#batch").empty();
                        $("#cnic").empty();
                        $("#gencer").empty();
                        $("#dob").empty();
                        $("#degree").empty();
                        $("#program").empty();
                        $("#class").empty();
                        $("#guadian_name").empty();
                        $("#profile_image").empty();
                        $("#guadian_cnic").empty();
                        $("#guadian_number").empty();
                        $("#relation").empty();
                        $("#occupation").empty();
                        $("#last_attended_class").empty();
                        $("#institute").empty();
                        $("#percentage").empty();
                        $("#year").empty();
                        $("#sibling_name").empty();
                        $("#name").append(response.message.name);
                        $("#email").append(response.message.email);
                        $("#enter_type").append("Teacher");
                        $("#address").append(response.message.address);
                        $("#contact_no").append(response.message.contact_no);
                        $("#father_name").append(response.message.father_name);
                        $("#cnic").append(response.message.cnic);
                        $("#gender").append(response.message.gender);
                        $("#batch").append("<h5><span class='badge badge-soft-primary'>batch-" +
                            response.message.batch + "</span></h5>");
                        $("#dob").append(response.message.date_of_birth);
                        $("#degree").append(titleCase(response.message.teacher_degree_status));
                        $("#program").append(titleCase(response.message.teacher_university));
                        $("#class").append(titleCase(response.class.classes_name));
                        $("#guadian_name").append(response.message.guadian_name);
                        $("#guadian_cnic").append(response.message.guadian_cnic);
                        $("#guadian_number").append(response.message.guadian_number);
                        $("#relation").append(response.message.relation_guadian);
                        $("#occupation").append(response.message.occupation);
                        $("#last_attended_class").append(response.message.last_attended_class);
                        $("#institute").append(response.message.institute);
                        $("#percentage").append(response.message.percentage + "%");
                        $("#year").append(response.message.year);
                        $("#sibling_name").append(response.message.sibling_name);
                    }
                })
            })
        })
    </script>
@endsection