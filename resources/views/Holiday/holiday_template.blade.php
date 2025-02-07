<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS | Academy Management System</title>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <table class="body-wrap"
                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                        valign="top"></td>
                    <td class="container" width="600"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                        valign="top">
                        <div class="content"
                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                            <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action"
                                itemscope itemtype="http://schema.org/ConfirmAction"
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                                    <td class="content-wrap"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #f6f8fc;"
                                        valign="top">
                                        <meta itemprop="name" content="Confirm Email"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                            style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                    valign="top">
                                                    <div style="text-align: center;margin-bottom: -32px;">
                                                        <img src="{{ $message->embed('admin/assets/images/logo/logo_blue.png') }}"
                                                            width="200">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 24px; vertical-align: top; margin: 0; padding: 0 0 10px;  text-align: center;"
                                                    valign="top">
                                                    <h4 style="font-family: 'Roboto', sans-serif; font-weight: 500;">
                                                        Dear Mr/s {{ $body['name'] }}</h4>
                                                    <h5 style="font-family: 'Roboto', sans-serif; font-weight: 500;">
                                                        Date: {{ $body['from_date'] }} - {{ $body['to_date'] }}</h5>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; color: #878a99; box-sizing: border-box; font-size: 19px; vertical-align: top; margin: 0; padding: 0 0 26px; text-align: center;font-weight:500"
                                                    valign="top">
                                                    <p style="margin-bottom: 0;">{{ $body['message'] }}</p>
                                                </td>
                                            </tr>
                                            <tr
                                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                    style="font-family: 'Roboto', sans-serif; color: #878a99; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 26px; text-align: center;"
                                                    valign="top">
                                                    <h4>Need Help ?</h4>
                                                    <p style="color: #878a99;">Please send and feedback or bug info to
                                                        <a href="{{ url('/') }}"
                                                            style="font-weight: 500px;">thenestacademy.com</a>
                                                    </p>
                                                    <p
                                                        style="font-family: 'Roboto', sans-serif; font-size: 14px;color: #98a6ad; margin: 0px;">
                                                        2023 thenestacademy. Developed By:
                                                        Waqee Ahmad
                                                        Mubushra</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
