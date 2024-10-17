@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Fee Voucher</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Fee</a></li>
                            <li class="breadcrumb-item active">Voucher</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if ($fee_getting != '')
                        <div class="card-header">
                            <h5 class="card-title mb-0">View Fee Voucher</h5>
                        </div>
                        <div class="card-body">
                            <div id="invoice_print">
                                <div class="container" style="width: 842px;">

                                    <div class="row">
                                        <div class="col-lg-4 col-xs-4">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">

                                                    <div class="row">
                                                        <div
                                                            style="float: left;width:30%; margin-left:4px; padding-left:9px;">




                                                            <div style="margin-top:5px;">


                                                                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}"
                                                                    style="height:80px" class="img-responsive" />

                                                            </div>


                                                        </div>

                                                        <div
                                                            style="width:70%;float:right;margin-top: -11px; border: 0px solid black; margin-left: -4px; padding-left: 52px; ">

                                                            <table class="table" style="width:100%; margin-bottom:0px; ">
                                                                <tr>
                                                                    <td style="border:hidden;">
                                                                        <h1
                                                                            style="font-family: fantasy; background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #00008B, #87CEEB); font-size: 28px !important; line-height: 1.2;">
                                                                            THE<br style="margin-bottom: 0.5em;">N.E.S.T<br
                                                                                style="margin-bottom: 0.5em;">ACADEMY
                                                                        </h1>
                                                                    </td>
                                                                </tr>

                                                                <tbody style="background-color:#ffffff">
                                                                    <tr>
                                                                        <td style="background-color:#ffffff ; border:hidden; padding-top: 0px; font-family:'Microsoft NeoGothic';  float:left"
                                                                            rowspan="6">

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                            </tr>

                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <hr
                                                        style="border: 1px solid #373e4a;margin-top: -20px; margin-bottom:10px;" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">
                                                    <h3
                                                        style="text-align: center; background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #00008B, #87CEEB); font-size: 20px; border-bottom: 1px solid black; margin-bottom:20px; border-bottom-width:thin; padding-bottom:12px; margin-top:-10px;">
                                                        <b>+(92) 335-5138907</b>
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <hr
                                                        style="border: 1px solid #373e4a;margin-top: -20px; margin-bottom:10px;" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">
                                                    <h3
                                                        style="text-align: center; font-size: 25px; border-bottom: 1px solid black; margin-bottom:20px; border-bottom-width:thick; padding-bottom:12px; margin-top:-10px;">
                                                        <b>Student Copy</b>
                                                    </h3>
                                                </div>
                                            </div>


                                            <h4 style="font-weight: bold">
                                                FEE CHALLAN
                                            </h4>

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div style="height:7px;">

                                                    </div>

                                                    <div class="row">

                                                        <div class="row">
                                                            <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                                Due Date:
                                                            </label>
                                                            <label class="col-lg-6 col-xs-6">
                                                                &nbsp;&nbsp;&nbsp;{{ $fee_getting->due_date }}
                                                            </label>
                                                        </div>

                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Bank:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            Allied Bank
                                                        </label>
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Bank A/C #:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            02230010007542920017
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Reg Code:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->registeration_no }}
                                                        </label>
                                                    </div>

                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Fee Month:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $fee_getting->month }}
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Student Name:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->name }}
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Father Name:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->father_name }}
                                                        </label>
                                                    </div>

                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Class:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ ucfirst(ucfirst($class->program_name)) }}
                                                        </label>
                                                    </div>
                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Batch:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->batch }}
                                                        </label>
                                                    </div>
                                                    <div style="height:4px;">

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:5px;" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Title
                                                        </label>
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Amount
                                                        </label>
                                                    </div>
                                                    <div style="height:3px;">

                                                    </div>


                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Monthly Fee
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Payable Monthly Fee
                                                        </label>

                                                        <div class="col-lg-6 col-xs-6">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </div>


                                                    </div>



                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:10px;" />
                                                        </div>
                                                    </div>





                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Net Payable Amount
                                                        </label>

                                                        <label class="col-lg-6 col-xs-6" style="padding-bottom:4px;">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </label>


                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:10px;" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-4">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">

                                                    <div class="row">
                                                        <div
                                                            style="float: left;width:30%; margin-left:4px; padding-left:9px;">




                                                            <div style="margin-top:5px;">


                                                                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}"
                                                                    style="height:80px" class="img-responsive" />

                                                            </div>


                                                        </div>

                                                        <div
                                                            style="width:70%;float:right;margin-top: -11px; border: 0px solid black; margin-left: -4px; padding-left: 52px; ">

                                                            <table class="table" style="width:100%; margin-bottom:0px; ">
                                                                <tr>
                                                                    <td style="border:hidden;">
                                                                        <h1
                                                                            style="font-family: fantasy; background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #00008B, #87CEEB); font-size: 28px !important; line-height: 1.2;">
                                                                            THE<br style="margin-bottom: 0.5em;">N.E.S.T<br
                                                                                style="margin-bottom: 0.5em;">ACADEMY
                                                                        </h1>
                                                                    </td>
                                                                </tr>

                                                                <tbody style="background-color:#ffffff">
                                                                    <tr>
                                                                        <td style="background-color:#ffffff ; border:hidden; padding-top: 0px; font-family:'Microsoft NeoGothic';  float:left"
                                                                            rowspan="6">

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                            </tr>

                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <hr
                                                        style="border: 1px solid #373e4a;margin-top: -20px; margin-bottom:10px;" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">
                                                    <h3
                                                        style="text-align: center; background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #00008B, #87CEEB); font-size: 20px; border-bottom: 1px solid black; margin-bottom:20px; border-bottom-width:thin; padding-bottom:12px; margin-top:-10px;">
                                                        <b>+(92) 335-5138907</b>
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <hr
                                                        style="border: 1px solid #373e4a;margin-top: -20px; margin-bottom:10px;" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">
                                                    <h3
                                                        style="text-align: center; font-size: 25px; border-bottom: 1px solid black; margin-bottom:20px; border-bottom-width:thick; padding-bottom:12px; margin-top:-10px;">
                                                        <b>Accounts Copy</b>
                                                    </h3>
                                                </div>
                                            </div>


                                            <h4 style="font-weight: bold">
                                                FEE CHALLAN
                                            </h4>

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div style="height:7px;">

                                                    </div>

                                                    <div class="row">

                                                        <div class="row">
                                                            <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                                Due Date:
                                                            </label>
                                                            <label class="col-lg-6 col-xs-6">
                                                                &nbsp;&nbsp;&nbsp;{{ $fee_getting->due_date }}
                                                            </label>
                                                        </div>

                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Bank:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            Allied Bank
                                                        </label>
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Bank A/C #:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            02230010007542920017
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Reg Code:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->registeration_no }}
                                                        </label>
                                                    </div>

                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Fee Month:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $fee_getting->month }}
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Student Name:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->name }}
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Father Name:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->father_name }}
                                                        </label>
                                                    </div>

                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Class:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ ucfirst(ucfirst($class->program_name)) }}
                                                        </label>
                                                    </div>
                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Batch:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->batch }}
                                                        </label>
                                                    </div>
                                                    <div style="height:4px;">

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:5px;" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Title
                                                        </label>
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Amount
                                                        </label>
                                                    </div>
                                                    <div style="height:3px;">

                                                    </div>


                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Monthly Fee
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Payable Monthly Fee
                                                        </label>

                                                        <div class="col-lg-6 col-xs-6">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </div>


                                                    </div>



                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:10px;" />
                                                        </div>
                                                    </div>





                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Net Payable Amount
                                                        </label>

                                                        <label class="col-lg-6 col-xs-6" style="padding-bottom:4px;">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </label>


                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:10px;" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-4">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">

                                                    <div class="row">
                                                        <div
                                                            style="float: left;width:30%; margin-left:4px; padding-left:9px;">




                                                            <div style="margin-top:5px;">


                                                                <img src="{{ asset('admin/assets/images/logo/logo_white.png') }}"
                                                                    style="height:80px" class="img-responsive" />

                                                            </div>


                                                        </div>

                                                        <div
                                                            style="width:70%;float:right;margin-top: -11px; border: 0px solid black; margin-left: -4px; padding-left: 52px; ">

                                                            <table class="table" style="width:100%; margin-bottom:0px; ">
                                                                <tr>
                                                                    <td style="border:hidden;">
                                                                        <h1
                                                                            style="font-family: fantasy; background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #00008B, #87CEEB); font-size: 28px !important; line-height: 1.2;">
                                                                            THE<br style="margin-bottom: 0.5em;">N.E.S.T<br
                                                                                style="margin-bottom: 0.5em;">ACADEMY
                                                                        </h1>
                                                                    </td>
                                                                </tr>

                                                                <tbody style="background-color:#ffffff">
                                                                    <tr>
                                                                        <td style="background-color:#ffffff ; border:hidden; padding-top: 0px; font-family:'Microsoft NeoGothic';  float:left"
                                                                            rowspan="6">

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                            </tr>

                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <hr
                                                        style="border: 1px solid #373e4a;margin-top: -20px; margin-bottom:10px;" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">
                                                    <h3
                                                        style="text-align: center; background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #00008B, #87CEEB); font-size: 20px; border-bottom: 1px solid black; margin-bottom:20px; border-bottom-width:thin; padding-bottom:12px; margin-top:-10px;">
                                                        <b>+(92) 335-5138907</b>
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <hr
                                                        style="border: 1px solid #373e4a;margin-top: -20px; margin-bottom:10px;" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-12">
                                                    <h3
                                                        style="text-align: center; font-size: 25px; border-bottom: 1px solid black; margin-bottom:20px; border-bottom-width:thick; padding-bottom:12px; margin-top:-10px;">
                                                        <b>Bank Copy</b>
                                                    </h3>
                                                </div>
                                            </div>


                                            <h4 style="font-weight: bold">
                                                FEE CHALLAN
                                            </h4>

                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div style="height:7px;">

                                                    </div>

                                                    <div class="row">

                                                        <div class="row">
                                                            <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                                Due Date:
                                                            </label>
                                                            <label class="col-lg-6 col-xs-6">
                                                                &nbsp;&nbsp;&nbsp;{{ $fee_getting->due_date }}
                                                            </label>
                                                        </div>

                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Bank:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            Allied Bank
                                                        </label>
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Bank A/C #:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            02230010007542920017
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Reg Code:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->registeration_no }}
                                                        </label>
                                                    </div>

                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Fee Month:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $fee_getting->month }}
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Student Name:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->name }}
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Father Name:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->father_name }}
                                                        </label>
                                                    </div>

                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Class:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ ucfirst(ucfirst($class->program_name)) }}
                                                        </label>
                                                    </div>
                                                    <div style="height:4px;">

                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Batch:
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            {{ $student->batch }}
                                                        </label>
                                                    </div>
                                                    <div style="height:4px;">

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-xs-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:5px;" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Title
                                                        </label>
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Amount
                                                        </label>
                                                    </div>
                                                    <div style="height:3px;">

                                                    </div>


                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Monthly Fee
                                                        </label>
                                                        <label class="col-lg-6 col-xs-6">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Payable Monthly Fee
                                                        </label>

                                                        <div class="col-lg-6 col-xs-6">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </div>


                                                    </div>



                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:10px;" />
                                                        </div>
                                                    </div>





                                                    <div class="row">
                                                        <label style="font-weight: bold;" class="col-lg-6 col-xs-6">
                                                            Net Payable Amount
                                                        </label>

                                                        <label class="col-lg-6 col-xs-6" style="padding-bottom:4px;">
                                                            Rs.{{ $student->student_after_discount_fee }}
                                                        </label>


                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <hr style="border: 1.5px solid #373e4a; margin-top:10px;" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn ripple btn-primary mb-1"
                                onclick="get_pdf('invoice_print');"><i class="far fa-file-pdf"></i> Pdf
                                Voucher</button>
                            <button type="button" class="btn ripple btn-primary mb-1"
                                onclick="print_page('invoice_print');"><i class="fas fa-print mr-1"></i> Print
                                Voucher</button>
                        </div>
                    @else
                        <div class="card-header text-center">
                            <h5 class="card-title mb-0 text-danger"><marquee behavior="smooth" direction="left"><span class="badge badge-soft-success fs-5">Your Fee has been Paid for this Month. Thank You !</span></marquee></h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        function print_page(divName) {
            var print_page = document.getElementById(divName).innerHTML;
            var print2 = document.body.innerHTML;
            document.body.innerHTML = print_page;
            window.print();
            document.body.innerHTML = print2;
            window.location.reload(true);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script>
        function get_pdf() {
            var HTML_Width = $("#invoice_print").width();
            var HTML_Height = $("#invoice_print").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;
            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
            html2canvas($("#invoice_print")[0], {
                allowTaint: true
            }).then(function(canvas) {
                canvas.getContext('2d');
                console.log(canvas.height + "  " + canvas.width);
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                    canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                        canvas_image_width, canvas_image_height);
                }
                var currentDate = new Date();
                var date = currentDate.toDateString();
                var time = currentDate.toLocaleTimeString();
                pdf.save("thenestacademy_" + date + "_" + time + ".pdf");
            });
        };
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
