@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profit & Loss Reports</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                            <li class="breadcrumb-item active">Profit & Loss Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">View Profit & Loss Reports</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="live-preview">
                                <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                    <div class="col-6">
                                        <label class="form-label">From Date *</label>
                                        <input type="date" id="from_date" placeholder="Enter From Date"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">To Date *</label>
                                        <input type="date" id="to_date" placeholder="Enter From Date"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Total Expenses *</label>
                                        <input type="text" id="total_expences" placeholder="Enter Total Expenses"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Total Revenue *</label>
                                        <input type="text" id="total_revenue" placeholder="Enter Total Revenue"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Total Profit *</label>
                                        <input type="text" id="total_profit" placeholder="Enter Total Profit"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Total Loss *</label>
                                        <input type="text" id="total_loss" placeholder="Enter Total Loss"
                                            class="form-control" required autocomplete="off">
                                    </div>
                                </form>
                            </div>
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
            $(document).on("change", "#to_date", function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                var from_date = $("#from_date").val();
                $.ajax({
                    url: "/get_profit_loss/" + value,
                    method: "GET",
                    data: {
                        "from_date": from_date
                    },
                    success: function(response) {
                        $("#total_expences").val(response.expences);
                        $("#total_revenue").val(response.revenue);
                        $("#total_profit").val(response.profit);
                        $("#total_loss").val(response.loss);
                    }
                })
            })
        })
    </script>
@endsection
