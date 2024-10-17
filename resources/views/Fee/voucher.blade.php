@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Generate Voucher</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/generate_voucher') }}">Generate</a></li>
                            <li class="breadcrumb-item active">Voucher</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title mb-0 flex-grow-1">Generating the Voucher For the All the Students then
                                </h4>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ url('/over_all') }}" class="btn btn-primary">Click Here ></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="{{ url('/voucher_getting') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Fee Receitpt Number *</label>
                                    <input type="text" class="form-control" name="fee_receipt_no"
                                        value="{{ 'CRV-' . rand(1000, 9000) . '-' . rand(100000, 900000) }}"
                                        placeholder="Enter Degree Name" autocomplete="off" required readonly>
                                    <strong class="text-danger" id="fee_receipt_no"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Due Date *</label>
                                    <input type="date" class="form-control" name="due_date" value="{{ old('due_date') }}"
                                        placeholder="Enter Degree Name" autocomplete="off" required>
                                    <strong class="text-danger" id="due_date"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Month *</label>
                                    <select name="month" class="single-select" required>
                                        <option value="" selected disabled>--Select Month--</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Class *</label>
                                    <select name="room" class="single-select" id="room_getting" required>
                                        <option value="" selected disabled>--Select the Class--</option>
                                        @foreach ($allclasses as $classes)
                                            <option value="{{ $classes->id }}">{{ ucfirst($classes->program_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="room"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Batch *</label>
                                    <select name="batch" class="single-select" id="batch" required>
                                        <option value="" selected disabled>--Select Class First--</option>
                                    </select>
                                    <strong class="text-danger" id="batch_getting"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Student *</label>
                                    <select name="students" class="single-select" id="students" required>
                                        <option value="" selected disabled>--Select Batch First--</option>
                                    </select>
                                    <strong class="text-danger" id="getting_students"></strong>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                        type="submit">Generate Voucher > </button>
                                </div>
                            </form>
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
            $(document).on('change', '#room_getting', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_batch/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#batch").empty();
                        $("#batch").append(
                            "<option value='' selected disabled>--Select the Batch--</option>"
                        );
                        $.each(response.message, function(index, value) {
                            $("#batch").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.batch + "</option>");
                        })
                    }
                })
            })
        })
        $(document).ready(function() {
            $(document).on('change', '#room_getting', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_batch/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#batch").empty();
                        $("#batch").append(
                            "<option value='' selected disabled>--Select the Batch--</option>"
                        );
                        $.each(response.message, function(index, value) {
                            $("#batch").append("<option value='" + value.batch +
                                "' style='text-transform:capitalize;'>" +
                                value.batch + "</option>");
                        })
                    }
                })
            })
            $(document).on('change', '#batch', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                var value2 = $("#room_getting").val();
                $.ajax({
                    url: "/get_students/" + value,
                    method: "GET",
                    data: {
                        "class": value2
                    },
                    success: function(response) {
                        $("#students").empty();
                        $("#students").append(
                            "<option value='' selected disabled>--Select the Student--</option>"
                        );
                        $.each(response.message, function(index, value) {
                            $("#students").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.name + "</option>");
                        })
                    }
                })
            })

            $(document).on("click", "#over_all", function(stop) {
                stop.preventDefault();
                $.ajax({
                    url: '/over_all',
                    method: 'GET',
                    success: function(response) {
                        response.pdf_paths.forEach(function(pdfPath) {
                            var link = document.createElement('a');
                            link.href = pdfPath;
                            link.download = pdfPath.substring(pdfPath.lastIndexOf('/') +
                                1);
                            link.style.display = 'none';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        });
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        if (xhr.status === 300) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: 'Not the first day of the month.',
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else {
                            alert(textStatus, errorThrown);
                        }
                    }
                });
            })
        })
    </script>
@endsection
