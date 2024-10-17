@extends('layouts.app_admin')
@section('title', 'Academy Management System')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teacher</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/teacher') }}">Teacher</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Add Teacher</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="form_submit" class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Registerations Number #</label>
                                    <input type="hidden" id="get_url" value="/teacher">
                                    <input type="hidden" id="module_name" value="Teacher">
                                    <input type="text" name="registeration_no" value="{{ $registeration_no }}"
                                        placeholder="Enter Registeration  Number" class="form-control" readonly required>
                                    <strong id="registeration_no" class="text-danger"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Teacher Name </label>
                                    <input type="text" name="name" placeholder="Enter Teacher Name"
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
                                    <label for="validationCustom01" class="form-label">Teacher CNIC</label>
                                    <input type="cnic" name="cnic" class="form-control cnic_number"
                                        placeholder="XXXXX-XXXXXXX-X" required>
                                    <strong class="text-danger" id="cnic"></strong>
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
                                    <label for="selectBox" class="form-label">Enroll</label>
                                    <select class="single-select"
                                        name="enrollment" required>
                                        <option selected disabled value="">--Select Entrollment--</option>
                                        <option value="permanent">Permanent</option>
                                        <option value="contract">Contract</option>
                                    </select>
                                    <strong class="text-danger" id="enrollment"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" required id="address" name="address" rows="3" placeholder="Address..."></textarea>
                                    <strong class="text-danger" id="address"></strong>
                                </div>
                                <div class="col-12 mt-5">
                                    <h5 class="text-uppercase">Educational Information</h5>
                                    <hr />
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Degree</label>
                                    <select class="single-select" data-placeholder="Choose..." multiple name="class[]"
                                        autocomplete="off" required>
                                        @foreach ($alldegree as $degree)
                                            <option value="{{ $degree->id }}">{{ $degree->degree_name }}</option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="class"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Class Name</label>
                                    <select class="single-select" data-placeholder="Choose..." multiple name="program[]"
                                        required data-placeholder="Choose.." autocomplete="off">
                                        @foreach ($allprogram as $program)
                                            <option value="{{ $program->id }}">{{ ucfirst($program->program_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <strong class="text-danger" id="program_err"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Degree Status</label>
                                    <select class="single-select" id="validationCustom04" name="teacher_degree_status"
                                        required>
                                        <option selected disabled value="">--Select Degree Status--</option>
                                        <option value="complete">Complete</option>
                                        <option value="incomplete">Incomplete</option>
                                    </select>
                                    <strong class="text-danger" id="teacher_degree_status"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Univeristy</label>
                                    <input type="text" oninput="allow_alphabets(this)" class="form-control"
                                        id="validationCustom01" name="teacher_university"
                                        placeholder="Enter Univeristy Name" required>
                                    <strong class="text-danger" id="teacher_university"></strong>
                                </div>
                                <div class="col-md-4">
                                    <label for="Year" class="form-label">Qualification</label>
                                    <select name="teacher_degree" class="single-select" required>
                                        <option value="" selected disabled>--Select Qualification--</option>
                                        <option value="Bachelors">Bachelors</option>
                                        <option value="Masters">Masters</option>
                                    </select>
                                    <strong class="text-danger" id="teacher_degree"></strong>
                                </div>
                                <div class="col-md-5">
                                    <label for="validationCustom01" class="form-label">Professional Field</label>
                                    <input type="text" name="teacher_professional_field" style="width:369px"
                                        data-role="tagsinput" placeholder="Add Subjects" class="form-control" required />
                                    <strong class="text-danger" id="teacher_professional_field"></strong>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Add Experience</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        name="teacher_experience" placeholder="Enter Experience" required>
                                    <strong class="text-danger" id="teacher_experience"></strong>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" required id="description" name="description" rows="3" placeholder="Enter Description..."></textarea>
                                    <strong class="text-danger" id="description"></strong>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ url('/teacher') }}" type="submit" id="button_move"
                                            class="btn rounded-pill btn-light text-dark waves-effect waves-light">
                                            < Go back</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn rounded-pill btn-primary waves-effect waves-light"
                                            type="submit" id="insert">Add Teacher > </button>
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
        $(document).ready(function() {
            $(document).on('change', '#degree', function(stop) {
                stop.preventDefault();
                var value = $(this).val();
                $.ajax({
                    url: "/get_program/" + value,
                    method: "GET",
                    success: function(response) {
                        var programSelect = $("#program");

                        // Clear existing options before appending the new one
                        programSelect.empty();

                        // Append the latest option
                        var latestValue = response.message[response.message.length - 1];
                        programSelect.append("<option value='" + latestValue.id +
                            "' style='text-transform:capitalize;'>" +
                            latestValue.program_name + "</option>");
                    }
                });
            });
        });

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

        function changeFunc() {
            var selectBox = document.getElementById("selectBoxp");

            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            if (selectedValue == "permanent") {
                $('#per').show();
                console.log(selectedValue);
            } else {
                $('#per').hide();
            }
            if (selectedValue == "contract") {
                $('#con').show();
                console.log(selectedValue);

            } else {
                $('#con').hide();
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
