<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Academy Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon-icon.png') }}">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="{{ url('/') }}" class="d-block">
                                                    <img src="{{ asset('admin/assets/images/logo/logo_light.png') }}"
                                                        alt="logo" height="60">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" A building with Four Walls and
                                                                Tomorrow Inside!"</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" All Our Dreams can come true
                                                                if we have the courage to pursue them!"</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Education is the most powerful
                                                                weapon which you can use to change the world!"</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Register Account For a Student</h5>
                                            <p
                                                class=">Get your Free Velzon account now.</p>
                                        </div>
                                        <div class="mt-4">
                                            <form id="form_submit" class="needs-validation" novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Name <span
                                                                    class="text-danger">*</span></label>
                                                            @php
                                                                $rand = rand(10000, 90000);
                                                            @endphp
                                                            <input type="hidden" name="emailToken"
                                                                value="{{ $rand }}">
                                                            <input type="hidden" name="enter_type" value="1">
                                                            <input type="hidden" name="is_active" value="1">
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Enter First Name" required>
                                                            <strong class="text-danger" id="name"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="email" name="email"
                                                                    class="form-control form-control-icon" required
                                                                    id="iconInput" placeholder="example@gmail.com">
                                                                <i class="ri-mail-unread-line"></i>
                                                            </div>
                                                            <strong class="text-danger" id="email"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="password-input">Password</label>
                                                            <div class="position-relative auth-pass-inputgroup">
                                                                <input type="password" name="password"
                                                                    class="form-control pe-5 password-input"
                                                                    onpaste="return false"
                                                                    placeholder="Enter password" id="password-input"
                                                                    aria-describedby="passwordInput"
                                                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                                    required>
                                                                <strong class="text-danger" id="password"></strong>
                                                                <button
                                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none password-addon"
                                                                    type="button" id="password-addon"><i
                                                                        class="ri-eye-fill align-middle"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">Password must contain:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8
                                                            characters</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b>
                                                        letter (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least
                                                        <b>uppercase</b> letter (A-Z)
                                                    </p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">A least
                                                        <b>number</b> (0-9)
                                                    </p>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit"
                                                        id="insert">Sign
                                                        Up</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title">Create account with
                                                        </h5>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Already have an account ? <a
                                                    href="{{ route('authentication.signin') }}"
                                                    class="fw-semibold text-primary text-decoration-underline">
                                                    Signin</a> </p>
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
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/passowrd-create.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            event.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var formData = new FormData(form_submit);
                            // --------------------------loading button coading-------------------
                            const button = document.getElementById("insert");
                            button.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button.setAttribute('disabled', 'disabled');
                            // --------------------------loading button coading-------------------
                            $.ajax({
                                url: "{{ url('/registeration') }}",
                                method: "POST",
                                contentType: false,
                                processData: false,
                                data: formData,
                                dataType: "json",
                                success: function(response) {
                                    if (response.message == 200) {
                                        $(".text-danger").text("");
                                        $('form').trigger("reset");
                                        button.removeAttribute('disabled');
                                        button.innerHTML =
                                            "Sign Up";
                                        setTimeout(time, 500);

                                        function time() {
                                            window.location.href =
                                                "{{ route('verify-email') }}";
                                        }
                                    } else {
                                        button.removeAttribute('disabled');
                                        button.innerHTML =
                                            "Sign Up";
                                        alert('not registered')
                                    }
                                    $('form').trigger("reset");
                                    form.classList.remove('was-validated');
                                },
                                error: function(error) {
                                    button.removeAttribute('disabled');
                                    button.innerHTML =
                                        "Sign Up";
                                    var error = error.responseJSON;
                                    $.each(error.errors, function(index, value) {
                                        $('#' + index).html(value);
                                    });
                                }
                            });
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>
