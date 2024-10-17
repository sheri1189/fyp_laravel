@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Class</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/program') }}">Class</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Program</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <input type="hidden" id="get_url" value="/program">
                                    <input type="hidden" id="module_name" value="Class">
                                    <select class="single-select" name="program_degree" autocomplete="off" required>
                                        <option value="" selected disabled>--Select The Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}">{{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong id="program_degree"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Class Name</label>
                                    <input type="text" name="program_name" oninput="NameValidation(this)"
                                        placeholder="Enter Class Name" class="form-control"
                                        value="{{ old('program_name') }}" required>
                                    <strong id="program_name"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Class Description</label>
                                    <textarea name="program_description" oninput="AlphaNumericValidation(this)" placeholder="Enter Class Description"
                                        rows="3" class="form-control" required>{{ old('program_description') }}</textarea>
                                    <strong id="program_description"></strong>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/program') }}" type="submit" id="button_move"
                                        class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                        < Go back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add Class > </button>
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
