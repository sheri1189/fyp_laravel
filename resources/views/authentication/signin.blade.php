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
                        <div class="card overflow-hidden">
                            <div class="row g-0">
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
                                                <!-- end carousel -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        @if (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong> Something is very wrong! </strong> Your <b>are not
                                                    eligible</b> Because {{ session('error') }}
                                            </div>
                                        @endif
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to LMS.</p>
                                        </div>
                                        <div class="mt-4">
                                            @php
                                                $email_cookie = '';
                                                $password_cookie = '';
                                            @endphp
                                            @if (Cookie::has('useremail') && Cookie::has('userpassword') && Cookie::has('remember'))
                                                @php
                                                    $email_cookie = Cookie::get('useremail');
                                                    $password_cookie = Cookie::get('userpassword');
                                                    @$remember_cookie = Cookie::get('remember');
                                                @endphp
                                            @endif
                                            @if (@$remember_cookie == 'on')
                                                @php
                                                    $checked = 'checked';
                                                @endphp
                                            @else
                                                @php
                                                    $checked = '';
                                                @endphp
                                            @endif
                                            <form action="{{ url('/signin') }}" method="POST" class="needs-validation"
                                                novalidate>
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="iconInput" class="form-label">Email</label>
                                                    <div class="form-icon">
                                                        <input type="email" name="email" value="{{ $email_cookie }}"
                                                            class="form-control form-control-icon" required
                                                            id="iconInput" placeholder="example@gmail.com">
                                                        <i class="ri-mail-unread-line"></i>
                                                    </div>
                                                    @error('email')
                                                        <strong class="text-danger">{{ ucfirst($message) }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="{{ route('authentication.forget') }}"
                                                            class="text-muted">Forgot password?</a>
                                                    </div>
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" name="password"
                                                            value="{{ $password_cookie }}"
                                                            class="form-control pe-5 password-input" required
                                                            placeholder="Enter password" id="password-input">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                    @error('password')
                                                        <strong class="text-danger">{{ ucfirst($message) }}</strong>
                                                    @enderror
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        {{ $checked }} id="auth-remember-check"
                                                        name="rememberme">
                                                    <label class="form-check-label" for="auth-remember-check">Remember
                                                        me</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit"
                                                        id="insert">Sign
                                                        In</button>
                                                </div>

                                                {{-- <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                                    </div>
                                                </div> --}}
                                            </form>
                                        </div>
                                        {{-- <div class="mt-5 text-center">
                                            <p class="mb-0">Don't have an account ? <a
                                                    href="{{ route('authentication.signup') }}"
                                                    class="fw-semibold text-primary text-decoration-underline">
                                                    Signup</a> </p>
                                        </div> --}}
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
    <script src="{{ asset('admin/assets/js/pages/password-addon.init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // --------------------------loading button coading-------------------
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else {
                            const button = document.getElementById("insert");
                            button.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button.setAttribute('disabled', 'disabled');
                            setTimeout(time, 1000);

                            // function time() {
                            //     button.removeAttribute('disabled');
                            //     button.innerHTML = "Add " + module_name;
                            // }
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        // --------------------------loading button coading-------------------
    </script>
</body>

</html>
