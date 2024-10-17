@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Student</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/student') }}">Student</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Student</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Registerations Number #</label>
                                    <input type="hidden" id="get_url" value="/student">
                                    <input type="hidden" id="module_name" value="Student">
                                    <input type="text" name="registeration_no" value="{{ $registeration_no }}"
                                        placeholder="Enter Registeration  Number" class="form-control" readonly required>
                                    <strong id="registeration_no" class="text-danger"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Degree Name</label>
                                    <select class="single-select" name="degree" id="degree" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Degree--</option>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}">{{ ucfirst($degree->degree_name) }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="degree"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Class Name</label>
                                    <select class="single-select" name="program" required id="program" autocomplete="off">
                                        <option value="" selected disabled>--Select the Degree First--</option>
                                    </select>
                                    <strong class="text-danger" id="program"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Session</label>
                                    <select class="single-select" required name="session" autocomplete="off">
                                        <option value="" selected disabled>--Select the Session--</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Evening">Evening</option>
                                    </select>
                                    <strong class="text-danger" id="session"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Room</label>
                                    <select class="single-select" name="class" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Room--</option>
                                        @foreach ($allclasses as $classes)
                                            <option value="{{ $classes->id }}">{{ $classes->classes_name }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Student Name </label>
                                    <input type="text" name="name" placeholder="Enter Student Name"
                                        class="form-control" value="{{ old('name') }}" required>
                                    <strong class="text-danger" id="name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Father Name </label>
                                    <input type="text" name="father_name" oninput="NameValidation(this)"
                                        placeholder="Enter Father Name" class="form-control" required
                                        value="{{ old('father_name') }}">
                                    <strong class="text-danger" id="father_name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Email Address</label>
                                    <div class="form-icon right">
                                        <input type="email" name="email" class="form-control form-control-icon"
                                            id="iconrightInput" placeholder="example@gmail.com" required>
                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                    <strong class="text-danger" id="email"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Contact Number</label>
                                    <input type="text" name="contact_no" class="form-control contact_number"
                                        placeholder="+XX-XXXXXXXXXX" required>
                                    <strong class="text-danger" id="contact_no"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Gender</label>
                                    <select class="single-select" name="gender" autocomplete="off" required>
                                        <option value="" selected disabled>--Select the Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <strong class="text-danger" id="session"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Picture</label>
                                    <input type="file" name="teacher_picture" class="form-control"
                                        onchange="previewFile(this);" required>
                                    <strong class="text-danger" id="teacher_picture"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="single-select" name="student_status" id="student_status_select"
                                        onchange="showHideStartDate()">
                                        <option selected disabled value="">--Select the Status--</option>
                                        <option value="Old">Old</option>
                                        <option value="New">New</option>
                                    </select>
                                    <strong id="student_status"></strong>
                                </div>

                                <div class="col-md-4" id="start_date_div" style="display: none">
                                    <label for="validationCustom01" class="form-label">Start Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                    <strong class="text-danger" id="start_date"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="syear" class="form-label">Batch</label>
                                    <input type="text" class="form-control" required value="batch-" id="syear"
                                        name="batch" required>
                                    <strong id="batch" class="text-danger"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" required id="address" name="address" rows="3" placeholder="Address..."></textarea>
                                </div>
                                <h6 class="mt-5 text-uppercase">Fee Information</h6>
                                <hr />
                                <div class="col-md-12">
                                    <br>
                                    <label class="form-label">Add Subjects *</label>
                                    <input type="text" value="" name="student_total_subjects"
                                        data-role="tagsinput" placeholder="Add Subjects" class="form-control" required />
                                    <strong class="text-danger" id="student_total_subjects"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Enter Sub-Total Fees *</label>
                                    <input type="number" value="" name="student_total_fee" id="student_subtotal"
                                        placeholder="Add Sub-Total Fees" class="form-control" required />
                                    <strong class="text-danger" id="student_total_fee"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Discount *</label>
                                    <input type="number" value="" name="student_discount_fee"
                                        id="student_discount" placeholder="Add Discount" class="form-control" required />
                                    <strong class="text-danger" id="student_discount_fee"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Total Fees Amount *</label>
                                    <input type="number" value="" name="student_after_discount_fee"
                                        id="student_total" placeholder="Total Fees Amount" class="form-control"
                                        required />
                                    <strong class="text-danger" id="student_after_discount_fee"></strong>
                                </div>
                                <h6 class="mt-5 text-uppercase">Guardian Information</h6>
                                <hr />

                                <div class="col-md-4">
                                    <label for="guardian" class="form-label">Guardian Name</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control" required
                                        name="guadian_name" placeholder="Enter Guardian Name">
                                    <strong class="text-danger" id="guadian_name"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="guar" class="form-label">Guardian Contact Number</label>
                                    <input type="text" class="form-control contact_number"
                                        placeholder="+XX-XXXXXXXXXX" id="guar" name="guadian_number" required>
                                    <strong class="text-danger" id="guadian_number"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="rel" class="form-label">Relation with Student</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control" required
                                        id="rel" name="relation_guadian" placeholder="Enter Relation with Student">
                                    <strong id="relation_guadian" class="text-danger"></strong>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Occupation</label>
                                    <select id="selectBox" onchange="changeFunc();" name="occupation" required
                                        class="single-select">
                                        <option selected disabled value="">--Select the Occupation--</option>
                                        <option value="business">Business</option>
                                        <option value="job">Job</option>
                                        <option value="Retired">Retired</option>
                                    </select>
                                    <strong class="text-danger" id="occupation"></strong>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/student') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                            type="submit" id="insert">Add Student > </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" id="image_thumbnail" style="display: none">
                <img class="img-thumbnail" alt="200x200" width="450" height="200"
                    src="{{ asset('admin/assets/images/51007.png') }}">
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#image_thumbnail")
                        .css({
                            opacity: 0,
                        })
                        .slideDown("slow")
                        .animate({
                            opacity: 1,
                        });
                    $("#image_thumbnail").prop("required", true);
                    $(".img-thumbnail").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        function showHideStartDate() {
            var statusSelect = document.getElementById("student_status_select");
            var startDateDiv = document.getElementById("start_date_div");

            if (statusSelect.value === "New") {
                startDateDiv.style.display = "block";
            } else {
                startDateDiv.style.display = "none";
            }
        }
        const subtotalInput = document.getElementById('student_subtotal');
        const discountInput = document.getElementById('student_discount');
        const totalFeesInput = document.getElementById('student_total');
        subtotalInput.addEventListener('input', calculateTotal);
        discountInput.addEventListener('input', calculateTotal);

        function calculateTotal() {
            const subtotal = subtotalInput.value;
            const discount_fees = discountInput.value;
            const totalFees = subtotal - discount_fees;
            totalFeesInput.value = totalFees;
        }
        calculateTotal();
    </script>
    <script>
        $(document).ready(function() {
            $("#total").keyup(function() {
                $.div();
            });
            $("#marks").keyup(function() {
                $.div();
            });
            $.div = function() {
                let total = parseInt($("#total").val());
                let marks = parseInt($("#marks").val());

                if (isNaN(total) != false) {
                    total = 0;
                }
                if (isNaN(marks) != false) {
                    marks = 0;
                }
                $("#per").val(parseInt(marks * 100 / total));
            }

            function loadData(type, degree_id) {
                $.ajax({
                    url: "ajax/load1.php",
                    type: "post",
                    data: {
                        type: type,
                        id: degree_id
                    },
                    success: function(data) {

                        if (type == "programData") {
                            $("#program").html(data);
                        }
                    }
                });
            }

            loadData();
            $("#degree").on("change", function() {

                var degree = $("#degree").val();

                loadData("programData", degree);

            });
        });

        function changeFunc() {
            var selectBox = document.getElementById("selectBox");

            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            if (selectedValue == "business") {
                $('#deal').show();
                console.log(selectedValue);
            } else {
                $('#deal').hide();
            }
            if (selectedValue == "job") {
                $('#des').show();
                console.log(selectedValue);

            } else {
                $('#des').hide();
            }
            if (selectedValue == "job") {
                $('#organ').show();
                console.log(selectedValue);

            } else {
                $('#organ').hide();
            }

        }

        function changeFunc1() {
            var selectBox1 = document.getElementById("selectBox1");

            var selectedValue1 = selectBox1.options[selectBox1.selectedIndex].value;

            if (selectedValue1 == "student") {
                $('#name').show();
                console.log(selectedValue1);
            } else {
                $('#name').hide();
            }
            if (selectedValue1 == "student") {
                $('#clas').show();
                console.log(selectedValue1);
            } else {
                $('#clas').hide();
            }
            if (selectedValue1 == "student") {
                $('#institut').show();
                console.log(selectedValue1);
            } else {
                $('#institut').hide();
            }
            if (selectedValue1 == "employee") {
                $('#perfes').show();
                console.log(selectedValue1);

            } else {
                $('#perfes').hide();
            }
            if (selectedValue1 == "employee") {
                $('#org').show();
                console.log(selectedValue1);

            } else {
                $('#org').hide();
            }
            if (selectedValue1 == "employee") {
                $('#design').show();
                console.log(selectedValue1);

            } else {
                $('#design').hide();
            }

        }
        $(document).ready(function() {
            $(document).on('change', '#degree', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_program/" + value,
                    method: "GET",
                    success: function(response) {
                        $("#program").empty();
                        $("#program").append(
                            "<option value='' selected disabled>--Select the Class--</option>"
                        );
                        $.each(response.message, function(index, value) {
                            $("#program").append("<option value='" + value.id +
                                "' style='text-transform:capitalize;'>" +
                                value.program_name + "</option>");
                        })
                    }
                })
            })
        })
    </script>
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
    <script>
        // ====================keywords coading for the campaign ============================
        (function($) {
            "use strict";

            var defaultOptions = {
                tagClass: function(item) {
                    return "label label-info";
                },
                itemValue: function(item) {
                    return item ? item.toString() : item;
                },
                itemText: function(item) {
                    return this.itemValue(item);
                },
                itemTitle: function(item) {
                    return null;
                },
                freeInput: true,
                addOnBlur: true,
                maxTags: undefined,
                maxChars: undefined,
                confirmKeys: [13, 44],
                delimiter: ",",
                delimiterRegex: null,
                cancelConfirmKeysOnEmpty: true,
                onTagExists: function(item, $tag) {
                    $tag.hide().fadeIn();
                },
                trimValue: false,
                allowDuplicates: false,
            };

            /**
             * Constructor function
             */
            function TagsInput(element, options) {
                this.itemsArray = [];

                this.$element = $(element);
                this.$element.hide();

                this.isSelect = element.tagName === "SELECT";
                this.multiple = this.isSelect && element.hasAttribute("multiple");
                this.objectItems = options && options.itemValue;
                this.placeholderText = element.hasAttribute("placeholder") ?
                    this.$element.attr("placeholder") :
                    "";
                this.inputSize = Math.max(1, this.placeholderText.length);

                this.$container = $('<div class="bootstrap-tagsinput"></div>');
                this.$input = $(
                    '<input type="text" placeholder="' + this.placeholderText + '"/>'
                ).appendTo(this.$container);

                this.$element.before(this.$container);

                this.build(options);
            }

            TagsInput.prototype = {
                constructor: TagsInput,

                /**
                 * Adds the given item as a new tag. Pass true to dontPushVal to prevent
                 * updating the elements val()
                 */
                add: function(item, dontPushVal, options) {
                    var self = this;

                    if (
                        self.options.maxTags &&
                        self.itemsArray.length >= self.options.maxTags
                    )
                        return;

                    // Ignore falsey values, except false
                    if (item !== false && !item) return;

                    // Trim value
                    if (typeof item === "string" && self.options.trimValue) {
                        item = $.trim(item);
                    }

                    // Throw an error when trying to add an object while the itemValue option was not set
                    if (typeof item === "object" && !self.objectItems)
                        throw "Can't add objects when itemValue option is not set";

                    // Ignore strings only containg whitespace
                    if (item.toString().match(/^\s*$/)) return;

                    // If SELECT but not multiple, remove current tag
                    if (self.isSelect && !self.multiple && self.itemsArray.length > 0)
                        self.remove(self.itemsArray[0]);

                    if (
                        typeof item === "string" &&
                        this.$element[0].tagName === "INPUT"
                    ) {
                        var delimiter = self.options.delimiterRegex ?
                            self.options.delimiterRegex :
                            self.options.delimiter;
                        var items = item.split(delimiter);
                        if (items.length > 1) {
                            for (var i = 0; i < items.length; i++) {
                                this.add(items[i], true);
                            }

                            if (!dontPushVal) self.pushVal();
                            return;
                        }
                    }

                    var itemValue = self.options.itemValue(item),
                        itemText = self.options.itemText(item),
                        tagClass = self.options.tagClass(item),
                        itemTitle = self.options.itemTitle(item);

                    // Ignore items allready added
                    var existing = $.grep(self.itemsArray, function(item) {
                        return self.options.itemValue(item) === itemValue;
                    })[0];
                    if (existing && !self.options.allowDuplicates) {
                        // Invoke onTagExists
                        if (self.options.onTagExists) {
                            var $existingTag = $(".tag", self.$container).filter(
                                function() {
                                    return $(this).data("item") === existing;
                                }
                            );
                            self.options.onTagExists(item, $existingTag);
                        }
                        return;
                    }

                    // if length greater than limit
                    if (
                        self.items().toString().length + item.length + 1 >
                        self.options.maxInputLength
                    )
                        return;

                    // raise beforeItemAdd arg
                    var beforeItemAddEvent = $.Event("beforeItemAdd", {
                        item: item,
                        cancel: false,
                        options: options,
                    });
                    self.$element.trigger(beforeItemAddEvent);
                    if (beforeItemAddEvent.cancel) return;

                    // register item in internal array and map
                    self.itemsArray.push(item);

                    // add a tag element

                    var $tag = $(
                        '<span class="tag ' +
                        htmlEncode(tagClass) +
                        (itemTitle !== null ? '" title="' + itemTitle : "") +
                        '">' +
                        htmlEncode(itemText) +
                        '<span data-role="remove"></span></span>'
                    );
                    $tag.data("item", item);
                    self.findInputWrapper().before($tag);
                    $tag.after(" ");

                    // add <option /> if item represents a value not present in one of the <select />'s options
                    if (
                        self.isSelect &&
                        !$(
                            'option[value="' + encodeURIComponent(itemValue) + '"]',
                            self.$element
                        )[0]
                    ) {
                        var $option = $(
                            "<option selected>" + htmlEncode(itemText) + "</option>"
                        );
                        $option.data("item", item);
                        $option.attr("value", itemValue);
                        self.$element.append($option);
                    }

                    if (!dontPushVal) self.pushVal();

                    // Add class when reached maxTags
                    if (
                        self.options.maxTags === self.itemsArray.length ||
                        self.items().toString().length === self.options.maxInputLength
                    )
                        self.$container.addClass("bootstrap-tagsinput-max");

                    self.$element.trigger(
                        $.Event("itemAdded", {
                            item: item,
                            options: options,
                        })
                    );
                },

                /**
                 * Removes the given item. Pass true to dontPushVal to prevent updating the
                 * elements val()
                 */
                remove: function(item, dontPushVal, options) {
                    var self = this;

                    if (self.objectItems) {
                        if (typeof item === "object")
                            item = $.grep(self.itemsArray, function(other) {
                                return (
                                    self.options.itemValue(other) ==
                                    self.options.itemValue(item)
                                );
                            });
                        else
                            item = $.grep(self.itemsArray, function(other) {
                                return self.options.itemValue(other) == item;
                            });

                        item = item[item.length - 1];
                    }

                    if (item) {
                        var beforeItemRemoveEvent = $.Event("beforeItemRemove", {
                            item: item,
                            cancel: false,
                            options: options,
                        });
                        self.$element.trigger(beforeItemRemoveEvent);
                        if (beforeItemRemoveEvent.cancel) return;

                        $(".tag", self.$container)
                            .filter(function() {
                                return $(this).data("item") === item;
                            })
                            .remove();
                        $("option", self.$element)
                            .filter(function() {
                                return $(this).data("item") === item;
                            })
                            .remove();
                        if ($.inArray(item, self.itemsArray) !== -1)
                            self.itemsArray.splice($.inArray(item, self.itemsArray), 1);
                    }

                    if (!dontPushVal) self.pushVal();

                    // Remove class when reached maxTags
                    if (self.options.maxTags > self.itemsArray.length)
                        self.$container.removeClass("bootstrap-tagsinput-max");

                    self.$element.trigger(
                        $.Event("itemRemoved", {
                            item: item,
                            options: options,
                        })
                    );
                },

                /**
                 * Removes all items
                 */
                removeAll: function() {
                    var self = this;

                    $(".tag", self.$container).remove();
                    $("option", self.$element).remove();

                    while (self.itemsArray.length > 0) self.itemsArray.pop();

                    self.pushVal();
                },

                /**
                 * Refreshes the tags so they match the text/value of their corresponding
                 * item.
                 */
                refresh: function() {
                    var self = this;
                    $(".tag", self.$container).each(function() {
                        var $tag = $(this),
                            item = $tag.data("item"),
                            itemValue = self.options.itemValue(item),
                            itemText = self.options.itemText(item),
                            tagClass = self.options.tagClass(item);

                        // Update tag's class and inner text
                        $tag.attr("class", null);
                        $tag.addClass("tag " + htmlEncode(tagClass));
                        $tag.contents().filter(function() {
                            return this.nodeType == 3;
                        })[0].nodeValue = htmlEncode(itemText);

                        if (self.isSelect) {
                            var option = $("option", self.$element).filter(function() {
                                return $(this).data("item") === item;
                            });
                            option.attr("value", itemValue);
                        }
                    });
                },

                /**
                 * Returns the items added as tags
                 */
                items: function() {
                    return this.itemsArray;
                },

                /**
                 * Assembly value by retrieving the value of each item, and set it on the
                 * element.
                 */
                pushVal: function() {
                    var self = this,
                        val = $.map(self.items(), function(item) {
                            return self.options.itemValue(item).toString();
                        });

                    self.$element.val(val, true).trigger("change");
                },

                /**
                 * Initializes the tags input behaviour on the element
                 */
                build: function(options) {
                    var self = this;

                    self.options = $.extend({}, defaultOptions, options);
                    // When itemValue is set, freeInput should always be false
                    if (self.objectItems) self.options.freeInput = false;

                    makeOptionItemFunction(self.options, "itemValue");
                    makeOptionItemFunction(self.options, "itemText");
                    makeOptionFunction(self.options, "tagClass");

                    // Typeahead Bootstrap version 2.3.2
                    if (self.options.typeahead) {
                        var typeahead = self.options.typeahead || {};

                        makeOptionFunction(typeahead, "source");

                        self.$input.typeahead(
                            $.extend({}, typeahead, {
                                source: function(query, process) {
                                    function processItems(items) {
                                        var texts = [];

                                        for (var i = 0; i < items.length; i++) {
                                            var text = self.options.itemText(items[i]);
                                            map[text] = items[i];
                                            texts.push(text);
                                        }
                                        process(texts);
                                    }

                                    this.map = {};
                                    var map = this.map,
                                        data = typeahead.source(query);

                                    if ($.isFunction(data.success)) {
                                        // support for Angular callbacks
                                        data.success(processItems);
                                    } else if ($.isFunction(data.then)) {
                                        // support for Angular promises
                                        data.then(processItems);
                                    } else {
                                        // support for functions and jquery promises
                                        $.when(data).then(processItems);
                                    }
                                },
                                updater: function(text) {
                                    self.add(this.map[text]);
                                    return this.map[text];
                                },
                                matcher: function(text) {
                                    return (
                                        text
                                        .toLowerCase()
                                        .indexOf(
                                            this.query.trim().toLowerCase()
                                        ) !== -1
                                    );
                                },
                                sorter: function(texts) {
                                    return texts.sort();
                                },
                                highlighter: function(text) {
                                    var regex = new RegExp(
                                        "(" + this.query + ")",
                                        "gi"
                                    );
                                    return text.replace(regex, "<strong>$1</strong>");
                                },
                            })
                        );
                    }

                    // typeahead.js
                    if (self.options.typeaheadjs) {
                        var typeaheadConfig = null;
                        var typeaheadDatasets = {};

                        // Determine if main configurations were passed or simply a dataset
                        var typeaheadjs = self.options.typeaheadjs;
                        if ($.isArray(typeaheadjs)) {
                            typeaheadConfig = typeaheadjs[0];
                            typeaheadDatasets = typeaheadjs[1];
                        } else {
                            typeaheadDatasets = typeaheadjs;
                        }

                        self.$input.typeahead(typeaheadConfig, typeaheadDatasets).on(
                            "typeahead:selected",
                            $.proxy(function(obj, datum) {
                                if (typeaheadDatasets.valueKey)
                                    self.add(datum[typeaheadDatasets.valueKey]);
                                else self.add(datum);
                                self.$input.typeahead("val", "");
                            }, self)
                        );
                    }

                    self.$container.on(
                        "click",
                        $.proxy(function(event) {
                            if (!self.$element.attr("disabled")) {
                                self.$input.removeAttr("disabled");
                            }
                            self.$input.focus();
                        }, self)
                    );

                    if (self.options.addOnBlur && self.options.freeInput) {
                        self.$input.on(
                            "focusout",
                            $.proxy(function(event) {
                                // HACK: only process on focusout when no typeahead opened, to
                                //       avoid adding the typeahead text as tag
                                if (
                                    $(".typeahead, .twitter-typeahead", self.$container)
                                    .length === 0
                                ) {
                                    self.add(self.$input.val());
                                    self.$input.val("");
                                }
                            }, self)
                        );
                    }

                    self.$container.on(
                        "keydown",
                        "input",
                        $.proxy(function(event) {
                            var $input = $(event.target),
                                $inputWrapper = self.findInputWrapper();

                            if (self.$element.attr("disabled")) {
                                self.$input.attr("disabled", "disabled");
                                return;
                            }

                            switch (event.which) {
                                // BACKSPACE
                                case 8:
                                    if (doGetCaretPosition($input[0]) === 0) {
                                        var prev = $inputWrapper.prev();
                                        if (prev.length) {
                                            self.remove(prev.data("item"));
                                        }
                                    }
                                    break;

                                    // DELETE
                                case 46:
                                    if (doGetCaretPosition($input[0]) === 0) {
                                        var next = $inputWrapper.next();
                                        if (next.length) {
                                            self.remove(next.data("item"));
                                        }
                                    }
                                    break;

                                    // LEFT ARROW
                                case 37:
                                    // Try to move the input before the previous tag
                                    var $prevTag = $inputWrapper.prev();
                                    if ($input.val().length === 0 && $prevTag[0]) {
                                        $prevTag.before($inputWrapper);
                                        $input.focus();
                                    }
                                    break;
                                    // RIGHT ARROW
                                case 39:
                                    // Try to move the input after the next tag
                                    var $nextTag = $inputWrapper.next();
                                    if ($input.val().length === 0 && $nextTag[0]) {
                                        $nextTag.after($inputWrapper);
                                        $input.focus();
                                    }
                                    break;
                                default:
                                    // ignore
                            }

                            // Reset internal input's size
                            var textLength = $input.val().length,
                                wordSpace = Math.ceil(textLength / 5),
                                size = textLength + wordSpace + 1;
                            $input.attr(
                                "size",
                                Math.max(this.inputSize, $input.val().length)
                            );
                        }, self)
                    );

                    self.$container.on(
                        "keypress",
                        "input",
                        $.proxy(function(event) {
                            var $input = $(event.target);

                            if (self.$element.attr("disabled")) {
                                self.$input.attr("disabled", "disabled");
                                return;
                            }

                            var text = $input.val(),
                                maxLengthReached =
                                self.options.maxChars &&
                                text.length >= self.options.maxChars;
                            if (
                                self.options.freeInput &&
                                (keyCombinationInList(
                                        event,
                                        self.options.confirmKeys
                                    ) ||
                                    maxLengthReached)
                            ) {
                                // Only attempt to add a tag if there is data in the field
                                if (text.length !== 0) {
                                    self.add(
                                        maxLengthReached ?
                                        text.substr(0, self.options.maxChars) :
                                        text
                                    );
                                    $input.val("");
                                }

                                // If the field is empty, let the event triggered fire as usual
                                if (self.options.cancelConfirmKeysOnEmpty === false) {
                                    event.preventDefault();
                                }
                            }

                            // Reset internal input's size
                            var textLength = $input.val().length,
                                wordSpace = Math.ceil(textLength / 5),
                                size = textLength + wordSpace + 1;
                            $input.attr(
                                "size",
                                Math.max(this.inputSize, $input.val().length)
                            );
                        }, self)
                    );

                    // Remove icon clicked
                    self.$container.on(
                        "click",
                        "[data-role=remove]",
                        $.proxy(function(event) {
                            if (self.$element.attr("disabled")) {
                                return;
                            }
                            self.remove($(event.target).closest(".tag").data("item"));
                        }, self)
                    );

                    // Only add existing value as tags when using strings as tags
                    if (self.options.itemValue === defaultOptions.itemValue) {
                        if (self.$element[0].tagName === "INPUT") {
                            self.add(self.$element.val());
                        } else {
                            $("option", self.$element).each(function() {
                                self.add($(this).attr("value"), true);
                            });
                        }
                    }
                },

                /**
                 * Removes all tagsinput behaviour and unregsiter all event handlers
                 */
                destroy: function() {
                    var self = this;

                    // Unbind events
                    self.$container.off("keypress", "input");
                    self.$container.off("click", "[role=remove]");

                    self.$container.remove();
                    self.$element.removeData("tagsinput");
                    self.$element.show();
                },

                /**
                 * Sets focus on the tagsinput
                 */
                focus: function() {
                    this.$input.focus();
                },

                /**
                 * Returns the internal input element
                 */
                input: function() {
                    return this.$input;
                },

                /**
                 * Returns the element which is wrapped around the internal input. This
                 * is normally the $container, but typeahead.js moves the $input element.
                 */
                findInputWrapper: function() {
                    var elt = this.$input[0],
                        container = this.$container[0];
                    while (elt && elt.parentNode !== container) elt = elt.parentNode;

                    return $(elt);
                },
            };

            /**
             * Register JQuery plugin
             */
            $.fn.tagsinput = function(arg1, arg2, arg3) {
                var results = [];
                this.each(function() {
                    var tagsinput = $(this).data("tagsinput");
                    if (!tagsinput) {
                        tagsinput = new TagsInput(this, arg1);
                        $(this).data("tagsinput", tagsinput);
                        results.push(tagsinput);

                        if (this.tagName === "SELECT") {
                            $("option", $(this)).attr("selected", "selected");
                        }
                        $(this).val($(this).val());
                    } else if (!arg1 && !arg2) {
                        results.push(tagsinput);
                    } else if (tagsinput[arg1] !== undefined) {
                        if (tagsinput[arg1].length === 3 && arg3 !== undefined) {
                            var retVal = tagsinput[arg1](arg2, null, arg3);
                        } else {
                            var retVal = tagsinput[arg1](arg2);
                        }
                        if (retVal !== undefined) results.push(retVal);
                    }
                });

                if (typeof arg1 == "string") {
                    return results.length > 1 ? results : results[0];
                } else {
                    return results;
                }
            };

            $.fn.tagsinput.Constructor = TagsInput;

            function makeOptionItemFunction(options, key) {
                if (typeof options[key] !== "function") {
                    var propertyName = options[key];
                    options[key] = function(item) {
                        return item[propertyName];
                    };
                }
            }

            function makeOptionFunction(options, key) {
                if (typeof options[key] !== "function") {
                    var value = options[key];
                    options[key] = function() {
                        return value;
                    };
                }
            }
            var htmlEncodeContainer = $("<div />");

            function htmlEncode(value) {
                if (value) {
                    return htmlEncodeContainer.text(value).html();
                } else {
                    return "";
                }
            }

            function doGetCaretPosition(oField) {
                var iCaretPos = 0;
                if (document.selection) {
                    oField.focus();
                    var oSel = document.selection.createRange();
                    oSel.moveStart("character", -oField.value.length);
                    iCaretPos = oSel.text.length;
                } else if (oField.selectionStart || oField.selectionStart == "0") {
                    iCaretPos = oField.selectionStart;
                }
                return iCaretPos;
            }

            /**
             * Returns boolean indicates whether user has pressed an expected key combination.
             * @param object keyPressEvent: JavaScript event object, refer
             *     http://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
             * @param object lookupList: expected key combinations, as in:
             *     [13, {which: 188, shiftKey: true}]
             */
            function keyCombinationInList(keyPressEvent, lookupList) {
                var found = false;
                $.each(lookupList, function(index, keyCombination) {
                    if (
                        typeof keyCombination === "number" &&
                        keyPressEvent.which === keyCombination
                    ) {
                        found = true;
                        return false;
                    }

                    if (keyPressEvent.which === keyCombination.which) {
                        var alt = !keyCombination.hasOwnProperty("altKey") ||
                            keyPressEvent.altKey === keyCombination.altKey,
                            shift = !keyCombination.hasOwnProperty("shiftKey") ||
                            keyPressEvent.shiftKey === keyCombination.shiftKey,
                            ctrl = !keyCombination.hasOwnProperty("ctrlKey") ||
                            keyPressEvent.ctrlKey === keyCombination.ctrlKey;
                        if (alt && shift && ctrl) {
                            found = true;
                            return false;
                        }
                    }
                });

                return found;
            }
            $(function() {
                $(
                    "input[data-role=tagsinput], select[multiple][data-role=tagsinput]"
                ).tagsinput();
            });
        })(window.jQuery);
        // ===================keywords coading for the campaign =============================
    </script>
@endsection
