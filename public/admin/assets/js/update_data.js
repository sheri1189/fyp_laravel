(function () {
    "use strict";
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    var formData = new FormData(form_update);
                    var id = $("#update")
                        .closest("#form_update")
                        .find("#id")
                        .val();
                    var get_url = $("#update")
                        .closest("#form_update")
                        .find("#get_url")
                        .val();
                    var module_name = $("#update")
                        .closest("#form_update")
                        .find("#module_name")
                        .val();
                    // --------------------------loading button coading-------------------
                    const button = document.getElementById("update");
                    button.innerHTML =
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                    button.setAttribute("disabled", "disabled");
                    // --------------------------loading button coading-------------------
                    const titleCase = (s) => s.replace(/\b\w/g, c => c.toUpperCase());
                    $.ajax({
                        url: get_url + "/" + id,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if (response.message == 200) {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                            } else if (response.message == "student") {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:

                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                window.location.href = "/student"
                            } else if (response.message == "staff") {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:

                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                window.location.href = "/staff"
                            } else if (response.message == "query") {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:

                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                window.location.href = "/inquiry"
                            }else if (response.message == "teacher") {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:

                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                window.location.href = "/teacher"
                            } else if (response.module == "degree") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#degree_name_" + response.module_data.id).empty();
                                $(".degree_description_" + response.module_data.id).empty();
                                $("#degree_name_" + response.module_data.id).append(titleCase(response.module_data.degree_name));
                                var paragraph = response.module_data.degree_description;
                                var words = paragraph.split(" ");
                                var first_three_words = words.slice(0, 3).join(" ");
                                $(".degree_description_" + response.module_data.id).append(first_three_words + "<span id='get_description' data-description=" + response.module_data.degree_description + " class='badge bg-light text-dark' style='cursor: pointer'>...</span>");
                            } else if (response.module == "notice") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#notice_name_" + response.module_data.id).empty();
                                $(".notice_description_" + response.module_data.id).empty();
                                $("#notice_name_" + response.module_data.id).append(titleCase(response.module_data.notice_name));
                                var paragraph = response.module_data.notice_description;
                                var words = paragraph.split(" ");
                                var first_three_words = words.slice(0, 3).join(" ");
                                $(".notice_description_" + response.module_data.id).append(first_three_words + "<span id='get_description' data-description=" + response.module_data.notice_description + " class='badge bg-light text-dark' style='cursor: pointer'>...</span>");
                            } else if (response.module == "program") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#program_name_" + response.module_data.id).empty();
                                $(".program_description_" + response.module_data.id).empty();
                                $("#program_name_" + response.module_data.id).append(titleCase(response.module_data.program_name));
                                var paragraph = response.module_data.program_description;
                                var words = paragraph.split(" ");
                                var first_three_words = words.slice(0, 3).join(" ");
                                $(".program_description_" + response.module_data.id).append(first_three_words + "<span id='get_description' data-description=" + response.module_data.program_description + " class='badge bg-light text-dark' style='cursor: pointer'>...</span>");
                            } else if (response.module == "course") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#course_name_" + response.module_data.id).empty();
                                $(".course_description_" + response.module_data.id).empty();
                                $("#course_name_" + response.module_data.id).append(titleCase(response.module_data.course_name));
                                var paragraph = response.module_data.course_description;
                                var words = paragraph.split(" ");
                                var first_three_words = words.slice(0, 3).join(" ");
                                $(".course_description_" + response.module_data.id).append(first_three_words + "<span id='get_description' data-description=" + response.module_data.course_description + " class='badge bg-light text-dark' style='cursor: pointer'>...</span>");
                            } else if (response.msg == 200) {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title: "Reply Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Give Reply >";
                                $("#myModal").modal("hide");
                                location.reload(true);
                            } else if (response.msg == 201) {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title: "You are Offline..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Give Reply >";
                            } else if (response.module == "classes") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#classes_name_" + response.module_data.id).empty();
                                $(".classes_description_" + response.module_data.id).empty();
                                $("#classes_name_" + response.module_data.id).append(titleCase(response.module_data.classes_name));
                                var paragraph = response.module_data.classes_description;
                                var words = paragraph.split(" ");
                                var first_three_words = words.slice(0, 3).join(" ");
                                $(".classes_description_" + response.module_data.id).append(first_three_words + "<span id='get_description' data-description=" + response.module_data.classes_description + " class='badge bg-light text-dark' style='cursor: pointer'>...</span>");
                            } else if (response.module == "fee") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title: "Fee Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Fee Paying";
                                $("#myModal").modal("hide");
                                $("#myModalFee").modal("show");
                                $("#legal-register-no").empty();
                                $("#fee_email").empty();
                                $("#fee_contact").empty();
                                $("#address-details").empty();
                                $("#total-amount").empty();
                                $("#billing-name").empty();
                                $("#billing-phone-no").empty();
                                $("#fee_month").empty();
                                $("#legal-register-no").append(" " + response.student.registeration_no);
                                $("#fee_email").append(" " + response.student.email);
                                $("#fee_contact").append(" " + response.student.contact_no);
                                $("#address-details").append(" " + response.student.address);
                                $("#total-amount").append("Rs. " + response.student.student_after_discount_fee);
                                $("#billing-name").append(response.student.name);
                                $("#billing-phone-no").append("<span class='badge badge-soft-secondary'>" + response.student.batch + "</span>");
                                $("#fee_month").append(response.month);
                            } else {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                Swal.fire({
                                    toast: true,
                                    icon: "error",
                                    title:
                                        module_name +
                                        " not Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            }
                            $("form").trigger("reset");
                            form.classList.remove("was-validated");
                        },
                        error: function (error) {
                            button.removeAttribute("disabled");
                            button.innerHTML = "Update " + module_name + " >";
                            var error = error.responseJSON;
                            $.each(error.errors, function (index, value) {
                                $("#" + index).html(value);
                            });
                        },
                    });
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
