<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Academy Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="invoice_print">
                        <div class="container" style="width: 842px;">

                            <div class="row">
                                <div class="col-lg-4 col-xs-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">

                                            <div class="row">
                                                <div style="float: left;width:30%; margin-left:4px; padding-left:9px;">




                                                    <div style="margin-top:5px;">


                                                        <img src="https://admin.thenestacademyhere.com/admin/assets/images/favicon-icon.png"
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
                                            <p>
                                                <strong><b> Due Date:{{ $fee_getting->due_date }}</b></strong>
                                            </p>
                                            <p style="font-weight: bold">
                                                The Nest Academy
                                            </p>
                                            <div style="height:7px;">

                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Bank:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Allied Bank
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Bank A/C #:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    02230010007542920017
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Reg Code:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->registeration_no }}
                                                </label>
                                            </div>



                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Fee Month:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ date('F') }}
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Student Name:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->name }}
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Father Name:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->father_name }}
                                                </label>
                                            </div>

                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Class:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ ucfirst(ucfirst($class->program_name)) }}
                                                </label>
                                            </div>
                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
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
                                                <label class="col-lg-6 col-xs-6">
                                                    Title
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Amount
                                                </label>
                                            </div>
                                            <div style="height:3px;">

                                            </div>


                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Monthly Fee
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Payable Monthly Fee
                                                </label>

                                                <div class="col-lg-6 col-xs-6">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </div>



                                            </div>





                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Net Payable Amount
                                                </label>

                                                <label class="col-lg-6 col-xs-6" style="padding-bottom:4px;">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </label>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">

                                            <div class="row">
                                                <div style="float: left;width:30%; margin-left:4px; padding-left:9px;">




                                                    <div style="margin-top:5px;">


                                                        <img src="https://admin.thenestacademyhere.com/admin/assets/images/favicon-icon.png"
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


                                            <p>
                                                <strong><b> Due Date: {{ $fee_getting->due_date }}</b></strong>
                                            </p>
                                            <p style="font-weight: bold">
                                                The Nest Academy
                                            </p>
                                            <div style="height:7px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Bank:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Allied Bank
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Bank A/C #:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    02230010007542920017
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Reg Code:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->registeration_no }}
                                                </label>
                                            </div>
                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Fee Month:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ date('F') }}
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Student Name:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->name }}
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Father Name:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->father_name }}
                                                </label>
                                            </div>

                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Class:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ ucfirst(ucfirst($class->program_name)) }}
                                                </label>
                                            </div>
                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
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
                                                <label class="col-lg-6 col-xs-6">
                                                    Title
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Amount
                                                </label>
                                            </div>
                                            <div style="height:3px;">

                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Monthly Fee
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Payable Monthly Fee
                                                </label>
                                                <div class="col-lg-6 col-xs-6">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </div>


                                            </div>




                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Net Payable Amount
                                                </label>
                                                <label class="col-lg-6 col-xs-6" style="padding-bottom:4px;">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">

                                            <div class="row">
                                                <div style="float: left;width:30%; margin-left:4px; padding-left:9px;">




                                                    <div style="margin-top:5px;">


                                                        <img src="https://admin.thenestacademyhere.com/admin/assets/images/favicon-icon.png"
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


                                            <p>
                                                <strong><b> Due Date: {{ $fee_getting->due_date }}</b></strong>
                                            </p>
                                            <p style="font-weight: bold">
                                                The Nest Academy
                                            </p>
                                            <div style="height:7px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Bank:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Allied Bank
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Bank A/C #:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    02230010007542920017
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Reg Code:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->registeration_no }}
                                                </label>
                                            </div>

                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Fee Month:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ date('F') }}
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Student Name:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->name }}
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Father Name:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ $student->name }}
                                                </label>
                                            </div>

                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Class:
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    {{ ucfirst(ucfirst($class->program_name)) }}
                                                </label>
                                            </div>
                                            <div style="height:4px;">

                                            </div>
                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
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
                                                <label class="col-lg-6 col-xs-6">
                                                    Title
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Amount
                                                </label>
                                            </div>
                                            <div style="height:3px;">

                                            </div>


                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Monthly Fee
                                                </label>
                                                <label class="col-lg-6 col-xs-6">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Payable Monthly Fee
                                                </label>

                                                <div class="col-lg-6 col-xs-6">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </div>


                                            </div>





                                            <div class="row">
                                                <label class="col-lg-6 col-xs-6">
                                                    Net Payable Amount
                                                </label>

                                                <label class="col-lg-6 col-xs-6" style="padding-bottom:4px;">
                                                    Rs.{{ $student->student_after_discount_fee }}
                                                </label>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
