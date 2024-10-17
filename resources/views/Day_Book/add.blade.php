@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Expences</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/day_book') }}">Expence</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add Expences</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label class="form-label">Category Type*</label>
                                    <input type="hidden" id="get_url" value="/day_book">
                                    <input type="hidden" id="module_name" value="Day Book">
                                    <select name="category_name" class="single-select" required>
                                        <option value="" selected disabled>--Select Category--</option>
                                        @foreach ($allcategory as $category)
                                            <option value="{{ $category->id }}">
                                                {{ ucfirst($category->category_name . '(' . $category->category_type . ')') }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="category_name"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Date *</label>
                                    <input type="date" name="date" class="form-control" required value="{{ old('date') }}">
                                    <strong class="text-danger" id="date"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Amount *</label>
                                    <input type="number" name="amount" class="form-control" required value="{{ old('amount') }}" placeholder="Enter Amount">
                                    <strong class="text-danger" id="amount"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Remark *</label>
                                    <textarea name="remark" class="form-control" rows="3" required placeholder="Enter Remark"></textarea>
                                    <strong class="text-danger" id="remark"></strong>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                        id="insert">Add Expence > </button>
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
