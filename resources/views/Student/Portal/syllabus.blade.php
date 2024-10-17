@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Syllabus</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/student_syllabus') }}">Syllabus</a></li>
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
                        <h5 class="card-title mb-0">View Syllabus</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Teacher Name</th>
                                    <th>Degree</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Upload Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allsyllabus as $key=>$syb)
                                    @foreach ($syb as $syllabus)
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td><strong>{{ ucfirst($key) }}</strong></td>
                                            <td>{{ ucfirst($syllabus->degreename->degree_name) }}</td>
                                            <td>{{ ucfirst($syllabus->programname->program_name) }}</td>
                                            <td>{{ ucfirst($syllabus->class) }}</td>
                                            <td>
                                                <img class="myImg rounded avatar-md cursor-pointer"
                                                    src="{{ asset('admin/assets/images/syllabus/' . $syllabus->upload_image) }}"
                                                    alt="{{ $syllabus->class }}">
                                                <div class="modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content" id="img01">
                                                    <div class="caption"></div>
                                                </div>
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
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
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
                    url: "/syllabus/" + value,
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
                        $("#enter_type").append("Syllabus");
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
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            var style = document.createElement("style");
            style.textContent = `
            /* Your CSS styles go here */
            #myImg {
                border-radius: 5px;
                cursor: pointer;
                transition: 0.3s;
                cursor: pointer;
            }

            #myImg:hover {
                opacity: 0.7;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.9);
            }

            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }

            #caption {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
                text-align: center;
                color: #ccc;
                padding: 10px 0;
                height: 150px;
            }

            .modal-content,
            #caption {
                -webkit-animation-name: zoom;
                -webkit-animation-duration: 0.6s;
                animation-name: zoom;
                animation-duration: 0.6s;
            }

            @-webkit-keyframes zoom {
                from {
                    -webkit-transform: scale(0)
                }

                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes zoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }

            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
                cursor: pointer;
            }

            @media only screen and (max-width: 700px) {
                .modal-content {
                    width: 100%;
                }
            }
        `;
            document.head.appendChild(style);
            var images = document.querySelectorAll(".myImg");

            images.forEach(function(image) {
                image.onclick = function() {
                    var modal = this.nextElementSibling; // Assuming modal is a direct sibling
                    var modalContent = modal.querySelector(".modal-content");
                    var caption = modal.querySelector(".caption");

                    if (modal && modalContent && caption) {
                        modal.style.display = "block";
                        modalContent.src = this.src;
                        caption.innerHTML = this.alt;
                    }
                };

                var span = image.nextElementSibling.querySelector(".close");
                if (span) {
                    span.onclick = function() {
                        var modal = this.parentElement; // Assuming span is within the modal
                        if (modal) {
                            modal.style.display = "none";
                        }
                    };
                }

                window.onclick = function(event) {
                    // Check if the clicked element is any modal on the page
                    var modals = document.querySelectorAll(".modal");
                    modals.forEach(function(modal) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    });
                };
            });
        });
    </script>
@endsection
