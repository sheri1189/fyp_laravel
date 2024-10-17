@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/User') }}">User</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add User</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form class="row g-3" id="data" name="myform">


                                <!-- form one -->
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        id="name" name="name" placeholder="Enter Name" required>
                                </div>
                                <div class="col-md-12">
                                    <div id="email">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter Email" oninput="return allow1()" required>
                                        <b><span class="formerror"></span></b>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="pass">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password"
                                            placeholder="Enter Password" oninput="return allow2()" required>
                                        <b><span class="formerror"></span></b>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="cpass">
                                        <label for="cpassword" class="form-label">Confirm Password</label>
                                        <input type="text" class="form-control" id="cpassword" name="cpassword"
                                            placeholder="Enter Confirm Password" oninput="return allow3()" required>
                                        <b><span class="formerror"></span></b>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="3">admin</option>
                                        <option value="5">text</option>
                                        <option value="6">worker</option>
                                        <option value="7">azam</option>
                                        <option value="8">role</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/degree') }}" type="submit" id="button_move"
                                        class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                        < Go back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add User > </button>
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
        function NameValidation(element) {
            let InputText = element.value;
            element.value = InputText.replace(/[^A-za-z, ]/, "");
            if (element.value == InputText) {
                element.value = InputText;
            } else {
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Number and Special Character are Not Allowed',
                    animation: false,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timeProgressBar: true,
                })
            }
        }
    </script>
    <script>
        function AlphaNumericValidation(element) {
            let InputText = element.value;
            element.value = InputText.replace(/[^A-za-z0-9[$&+,:;=?@#|'<>.^*(){}%"!~-_ ]/, "");
            if (element.value == InputText) {
                element.value = InputText;
            } else {
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Special Character Not Allowed ',
                    animation: false,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000,
                    timeProgressBar: true,
                })
            }
        }
    </script>
@endsection
