@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Reminder</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/reminder_view') }}">Reminder</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Reminder</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label class="form-label">Reminder Name *</label>
                                    <input type="hidden" id="get_url" value="/reminder_create">
                                    <input type="hidden" id="module_name" value="Reminder">
                                    <input type="text" class="form-control" name="reminder_name"
                                        value="{{ old('reminder_name') }}" placeholder="Enter Reminder Name"
                                        autocomplete="off" required oninput="NameValidation(this)">
                                    <strong class="text-danger" id="reminder_name"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Reminder Status *</label>
                                    <select name="status" class="single-select" required>
                                        <option value="" selected disabled>--Select Status--</option>
                                        <option value="Open" selected>Open</option>
                                        <option value="Close">Close</option>
                                    </select>
                                    <strong class="text-danger" id="status"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="">From Date *</label>
                                    <input type="date" name="from_date" value="{{ date('Y-m-d') }}" class="form-control"
                                        required>
                                    <strong class="text-danger" id="from_date"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="">To Date *</label>
                                    <input type="date" name="to_date" value="{{ date('Y-m-d') }}" class="form-control"
                                        required>
                                    <strong class="text-danger" id="to_date"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Reminder Description *</label>
                                    <textarea name="description" id="description" rows="3" oninput="AlphaNumericValidation(this)" required
                                        class="form-control" required placeholder="Enter Reminder Description">{{ old('description') }}</textarea>
                                    <strong class="text-danger" id="description"></strong>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/reminder_view') }}" type="submit" id="button_move"
                                        class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                        < Go back</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add Rerminder > </button>
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
