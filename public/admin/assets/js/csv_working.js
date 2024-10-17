$(function () {
    $(document).ready(function () {
        $("#form_submit_csv").ajaxForm({
            beforeSend: function () {
                var percentage = "0";
            },
            uploadProgress: function (event, position, total, percentComplete) {
                var percentage = percentComplete;
                $(".progress .progress-bar").css(
                    "width",
                    percentage + "%",
                    function () {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                        $("#percentage").text(percentage);
                    }
                );
            },
            complete: function (xhr) {
                // ==========================loading button coading===================
                const button = document.getElementById("insert_csv");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                // ==========================loading button coading===================
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                var formData_csv = new FormData(form_submit_csv);
                var get_url = $("#insert_csv")
                    .closest("#form_submit_csv")
                    .find("#get_url")
                    .val();
                $.ajax({
                    url: get_url,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData_csv,
                    dataType: "json",
                    success: function (response) {
                        if (response.message == 300) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "Please Select the File First..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 20000,
                                timerProgressBar: true,
                            });
                            button.removeAttribute("disabled");
                            button.innerHTML = "Upload CSV";
                        }
                        else if (response.message == 500) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "CSV Uploaded Successfully..But These Records are not Uploaded..Because These Emails are Already Exists..!!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $(".progress .progress-bar").css(
                                "width",
                                0 + "%",
                                function () {
                                    return (
                                        $(this).attr("aria-valuenow", 0) + "%"
                                    );
                                    $("#percentage").text(0);
                                }
                            );
                            $("#table_show").empty();
                            $("#table_body").empty();
                            $("#table_show").append(
                                "<div class='card '><div class='card-body'><h4 class='card-title mb-0 flex-grow-1'>Repeated Emails</h4><div class='mt-3'><div class='table-wrapper-scroll-y my-custom-scrollbar'><table class = 'table table-hover' style = 'width:100%' ><thead><tr><th scope='col'>Line Number</th><th scope = 'col'>Email</th><th scope = 'col' > Statement </th></tr></thead><tbody id='table_body'><tr><td colspan = '3'align = 'center' style ='color:#004454;font-weight:bold;'>No Data Avalable <td><tr></tbody></table></div> </div></div></div>"
                            );
                            $("#table_body").empty();
                            $.each(response.email, function (key, value) {
                                $("#table_body").append(
                                    "<tr>\
                                                                                            <th>" +
                                    key +
                                    "</th>\
                                                                                            <th>" +
                                    value +
                                    "</th>\
                                                                                            <th>This is email repeated</th>\
                                                                                            </tr>"
                                );
                            });
                            button.removeAttribute("disabled");
                            button.innerHTML = "Upload CSV";
                        } else if (response.message == 600) {
                            Swal.fire({
                                toast: true,
                                icon: "error",
                                title: "CSV Uploaded Successfully..But These Records are not Uploaded..Because These Numbers are Already Exists..!!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $(".progress .progress-bar").css(
                                "width",
                                0 + "%",
                                function () {
                                    return (
                                        $(this).attr("aria-valuenow", 0) + "%"
                                    );
                                    $("#percentage").text(0);
                                }
                            );
                            $("#table_show").empty();
                            $("#table_body").empty();
                            $("#table_show").append(
                                "<div class='card '><div class='card-body'><h4 class='card-title mb-0 flex-grow-1'>Repeated Numbers</h4><div class='mt-3'><div class='table-wrapper-scroll-y my-custom-scrollbar'><table class = 'table table-hover' style = 'width:100%' ><thead><tr><th scope='col'>Line Number</th><th scope = 'col'>Numbers</th><th scope = 'col' > Statement </th></tr></thead><tbody id='table_body'><tr><td colspan = '3'align = 'center' style ='color:#004454;font-weight:bold;'>No Data Avalable <td><tr></tbody></table></div> </div></div></div>"
                            );
                            $("#table_body").empty();
                            $.each(response.mobile, function (key, value) {
                                $("#table_body").append(
                                    "<tr>\
                                                                                            <th>" +
                                    key +
                                    "</th>\
                                                                                            <th>" +
                                    value +
                                    "</th>\
                                                                                            <th>This is number repeated</th>\
                                                                                            </tr>"
                                );
                            });
                            button.removeAttribute("disabled");
                            button.innerHTML = "Upload CSV";
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "CSV Uploaded Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            $("form").trigger("reset");
                            $(".progress .progress-bar").css(
                                "width",
                                0 + "%",
                                function () {
                                    return (
                                        $(this).attr("aria-valuenow", 0) + "%"
                                    );
                                    $("#percentage").text(0);
                                }
                            );
                            button.removeAttribute("disabled");
                            button.innerHTML = "Upload CSV";
                        }
                    },
                });
            },
        });
    });
});
