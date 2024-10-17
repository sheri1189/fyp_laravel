@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="{{ asset('/assets/images/background/profile-bg.jpg') }}" class="profile-wid-img" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                @if ($user->role_assign == 'Teacher')
                                    <img class="ounded-circle avatar-xl img-thumbnail user-profile-image"
                                        src="{{ asset('/admin/assets/images/instructors/' . $user->teacher_picture) }}"
                                        alt="Header Avatar">
                                @else
                                    <img class="ounded-circle avatar-xl img-thumbnail user-profile-image"
                                        src="{{ asset('/admin/assets/images/users/dummy.jpg') }}" alt="Header Avatar">
                                @endif
                            </div>
                            <h5 class="fs-16 mb-1">{{ $user->name }}</h5>
                            <p class="text-muted mb-0">
                                {{ $user->role_assign }}
                            </p>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Complete Your Profile</h5>
                            </div>

                        </div>
                        <div class="progress animated-progress custom-progress progress-label">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="label">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="{{ url('#editProfile') }}"
                                    role="tab">
                                    <i class="fas fa-user"></i> Edit Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="editProfile" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="card-header custom-card-header bg-light text-center">
                                            <h6 class="card-title mb-0 mx-auto"><i class="fas fa-user"
                                                    style="border: 2px solid #e1e6f1;border-radius: 50%;padding: 6px;background-color: #a9b1c0;color: #0a2647;"></i>
                                                Edit General Information</h6>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 mx-auto border-right mt-3">
                                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                                            @method('PUT')
                                            <div class="col-6">
                                                <label class="form-label">First Name *</label>
                                                <input type="hidden" id="id" value="{{ $user->id }}">
                                                <input type="hidden" id="get_url" value="/update-profile">
                                                <input type="hidden" id="module_name" value="Profile">
                                                <input type="text" name="name" value="{{ $user->name }}"
                                                    placeholder="Enter First Name" class="form-control" autocomplete="off"
                                                    oninput="NameValidation(this)">
                                                <strong class="text-danger" id="name"></strong>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email *</label>
                                                <input type="email" name="email" value="{{ $user->email }}"
                                                    placeholder="example@gmail.com" class="form-control" autocomplete="off"
                                                    oninput="EmailValidation(this)">
                                                <strong class="text-danger" id="email"></strong>
                                            </div>
                                            @if($user->role_assign=="Admin" || $user->role_assign=="Student")
                                            <div class="col-6">
                                                <label class="form-label">Date of Birth *</label>
                                                <input class="result form-control" type="text" name="date_of_birth"
                                                    id="date_profile" placeholder="Date of Birth" required
                                                    autocomplete="off" value="{{ $user->date_of_birth }}">
                                                <strong class="text-danger" id="date_of_birth"></strong>
                                            </div>
                                            @endif
                                            <div class="col-6">
                                                <label class="form-label">CNIC Number *</label>
                                                <input class="result form-control" type="text" name="cnic"
                                                    id="date_profile" placeholder="CNIC Number" required
                                                    autocomplete="off" value="{{ $user->cnic }}">
                                                <strong class="text-danger" id="cnic"></strong>
                                            </div>
                                            @if($user->role_assign=="Staff" || $user->role_assign=="Teacher")
                                            <div class="col-6">
                                                <label class="form-label">Personal Phone
                                                    Number *</label>
                                                <input type="text" type="number" name="contact_no" maxlength="13"
                                                    value="{{ $user->contact_no }}" class="form-control"
                                                    autocomplete="off" placeholder="+xxxxxxxxxxxx"
                                                    oninput="NumberValidation(this)">
                                                <strong class="text-danger" id="contact_no"></strong>
                                            </div>
                                            @else
                                            <div class="col-12">
                                                <label class="form-label">Personal Phone
                                                    Number *</label>
                                                <input type="text" type="number" name="contact_no" maxlength="13"
                                                    value="{{ $user->contact_no }}" class="form-control"
                                                    autocomplete="off" placeholder="+xxxxxxxxxxxx"
                                                    oninput="NumberValidation(this)">
                                                <strong class="text-danger" id="contact_no"></strong>
                                            </div>
                                            @endif
                                            <div class="col-12">
                                                <label class="form-label">Address *</label>
                                                <textarea name="address" class="form-control" row="4">{{ $user->address }}</textarea>
                                                <strong class="text-danger" id="address"></strong>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-primary m-1 rounded-pill" type="submit"
                                                    id="update">Update Profile > </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
        // ============================twillio account generate========================
        (function() {
            'use strict'
            var forms_twillio = document.querySelectorAll('.needs-validation-twillio')
            Array.prototype.slice.call(forms_twillio)
                .forEach(function(form_twillio) {
                    form_twillio.addEventListener('submit', function(event_twillio) {
                        if (!form_twillio.checkValidity()) {
                            event_twillio.preventDefault();
                            event_twillio.stopPropagation();
                        } else {
                            event_twillio.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            var formData_twillio = new FormData(form_twillio);
                            // ==========================loading button coading===================
                            const button_twillio = document.getElementById("insert");
                            button_twillio.innerHTML =
                                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                            button_twillio.setAttribute('disabled', 'disabled');
                            // ==========================loading button coading===================
                            $.ajax({
                                url: "{{ url('/update-credentials/' . $user->id) }}",
                                method: "POST",
                                contentType: false,
                                processData: false,
                                data: formData_twillio,
                                dataType: "json",
                                success: function(response) {
                                    if (response.message == 200) {
                                        $(".text-danger").text("");
                                        Swal.fire({
                                            toast: true,
                                            icon: "success",
                                            title: "Credentials Updated Successfullly..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        button_twillio.removeAttribute('disabled');
                                        button_twillio.innerHTML =
                                            "Update Credentials";
                                        location.reload(true);
                                    } else {
                                        button_twillio.removeAttribute('disabled');
                                        button_twillio.innerHTML =
                                            "Update Credentials";
                                        Swal.fire({
                                            toast: true,
                                            icon: "error",
                                            title: "Credentials Not Updated Successfullly..!",
                                            animation: false,
                                            position: "top-right",
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                    }
                                    $('form').trigger("reset");
                                    form_twillio.classList.remove('was-validated');
                                },
                                error: function(error) {
                                    button_twillio.removeAttribute('disabled');
                                    button_twillio.innerHTML =
                                        "Update Credentials";
                                    var error = error.responseJSON;
                                    $.each(error.errors, function(index, value) {
                                        $('#' + index).html(value);
                                    });
                                }
                            });
                        }
                        form_twillio.classList.add('was-validated')
                    }, false)
                })
        })()
        // ============================twillio account generate========================
    </script>
@endsection
