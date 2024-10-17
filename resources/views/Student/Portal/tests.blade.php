@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Test Schedule</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/test') }}">Test Schedule</a></li>
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
                        <h5 class="card-title mb-0">View Test Schedule</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Teacher Name</th>
                                    <th>Degree</th>
                                    <th>Class</th>
                                    <th>Subjects</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($alltest as $key=>$te)
                                    @foreach ($te as $test)
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td><strong>{{ $key }}</strong></td>
                                            <td>{{ ucfirst($test->degreename->degree_name) }}</td>
                                            <td>{{ ucfirst($test->programname->program_name) }}</td>
                                            <td>{{ ucfirst($test->class) }}</td>
                                            <td>
                                                {{ $test->date }}
                                            </td>
                                        </tr>
                                    @endforeach
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
                            columns: [0,1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0,1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0,1, 2, 3, 4, 5]
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
                    url: "/books/" + value,
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
                        $("#enter_type").append("Books");
                        $("#address").append(response.message.address);
                        $("#contact_no").append(response.message.contact_no);
                        $("#father_name").append(response.message.father_name);
                        $("#cnic").append(response.message.cnic);
                        $("#gender").append(response.message.gender);
                        $("#batch").append("<h5><span class='badge badge-soft-primary'>batch-" +
                            response.message.batch + "</span></h5>");
                        $("#dob").append(response.message.date_of_birth);
                        $("#degree").append(titleCase(response.degree.degree_name));
                        $("#program").append(titleCase(response.program.program_name));
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
