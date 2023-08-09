@extends('Admin.main-layout')
@section('content-header')
@endsection
@section('body')
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Include DateTimePicker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.0.0/daterangepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.1.2/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="path/to/datetimepicker.css">

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Customer List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onclick="addCustomer()" href="javascript:void(0)">Create Customer</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered compact" id="customer">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Amount_paid</th>
                        <th>Membership</th>
                        <th>In_time</th>
                        <th>Out_time</th>
                        <th>Action</th>

                    </tr>

                </thead>
            </table>
        </div>
    </div>

    <!-- bootstrap training model -->
    <div class="modal fade" id="Customer-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CustomerModalLabel">Trainer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="CustomerForm" name="CustomerForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" id="datepicker">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" maxlength="50">
                            </div>

                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" name="email" maxlength="50">
                            </div>

                            <label for="age" class="col-sm-2 control-label">Age</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="age" name="age" maxlength="50">
                            </div>

                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="50">
                            </div>

                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address" maxlength="50">
                            </div>

                            <label for="image" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image" maxlength="50">
                                <img id="imageSrc" src="" style="max-width: 200px;" />
                                <input id="image" type="hidden" name="image_name" />
                            </div>

                            <label for="gender" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1">
                                    <label class="form-check-label" for="gender_male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="2">
                                    <label class="form-check-label" for="gender_female">Female</label>
                                </div>
                            </div>

                            <label for="amount_paid" class="col-sm-2 control-label">Amount_paid</label>
                            <div class="col-sm-12">
                                <input type="Decimal" class="form-control" id="amount_paid" name="amount_paid" maxlength="50">
                            </div>

                            <label for="membership_id" class="col-sm-2 control-label">Membership</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="membership_id" name="membership_id">
                                    <option value="">Select Membership</option>
                                    @foreach($activeMemberships as $membership)
                                    <option value="{{ $membership->id }}" data-name="{{ $membership->name }}">{{ $membership->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <label for="in" class="col-sm-2 control-label">In_time</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="in" name="in" maxlength="50">
                            </div>

                            <label for="out" class="col-sm-2 control-label">Out_time</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="out" name="out" maxlength="50">
                            </div>

                            <div class="form-group">
                                <label for="membership_id" class="col-sm-2 control-label">Trainer</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="trainer_id" name="trainer_id">
                                        <option value="">Select Trainer</option>
                                        @foreach($activeTrainers as $trainer)
                                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-offset-2 col-sm-10"><br>
                            <button type="submit" class="btn btn-primary" id="btn-save">Saved</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ... existing content ... -->
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include DateTimePicker JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="path/to/datetimepicker.js"></script>


    <!-- Your existing JavaScript code... -->
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Name must contain alphabets only.");


            var table = $('#customer').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('customer.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'age',
                        name: 'age',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            console.log(data);
                            return '<img src= "' + data + '" + alt="" width="100" height="100">';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {

                            if (full.status == 1) {
                                return '<button type="button" class="btn btn-primary" onclick="confirmStatusChange(' + full.id + ', this.checked)">Active</button>'
                            } else {
                                return '<button type="button" class="btn btn-danger" onclick="confirmStatusChange(' + full.id + ', this.checked)">In-active</button>'

                            }
                        }
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                        render: function(data, type, full, meta) {
                            return data === '1' ? 'Male' : 'Female';
                        }
                    },
                    {
                        data: 'amount_paid',
                        name: 'amount_paid',
                    },

                    {
                        data: 'membership_id',
                        name: 'membership_id',
                        // render: function(data, type, full, meta) {
                        //     return full.memberships.length > 0 ? full.memberships[0].name : '';
                        // }
                    },
                    {
                        data: 'in',
                        name: 'in',
                    },
                    {
                        data: 'out',
                        name: 'out',
                    },


                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, 'desc']
                ]
            });

            window.addCustomer = function() {
                $('#Customer-modal').modal('show');
                $('#CustomerForm').trigger('reset');
                $('#CustomerModalLabel').html('Add Customer');
                $('#id').val('');
            };

            $('#CustomerForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                        lettersOnly: true
                    },
                    email: {
                        required: true,
                        maxlength: 25
                    },
                    age: {
                        required: true,
                        maxlength: 20
                    },
                    phone: {
                        required: true,
                        maxlength: 25
                    },
                    address: {
                        required: true,
                        maxlength: 255
                    },
                    image: {
                        required: true,
                        maxlength: 200
                    },
                    gender: {
                        required: true,
                    },
                    amount_paid: {
                        required: true,
                    },
                    membership_id: {
                        required: true,
                    },
                    in: {
                        required: true,
                    },
                    out: {
                        required: true,
                    },

                    trainer_id: {
                        required: true
                    }

                },
                messages: {
                    name: {
                        required: "Please enter the name.",
                        maxlength: "Name should not exceed 50 characters.",
                        lettersOnly: "Name must contain alphabets only."
                    },
                    email: {
                        required: "Please enter a valid email address.",
                        email: "Please enter a valid email address.",
                        maxlength: "Email should not exceed 25 characters."
                    },
                    age: {
                        required: "Please enter the age.",
                        digits: "Please enter a valid age (numbers only).",
                        maxlength: "Age should not exceed 20 digits."
                    },
                    phone: {
                        required: "Please enter the phone number.",
                        maxlength: "Phone number should not exceed 25 characters."
                    },
                    address: {
                        required: "Please enter the address.",
                        maxlength: "Address should not exceed 255 characters."
                    },
                    image: {
                        required: "Please select an image."
                    },
                    gender: {
                        required: "Please select a gender."
                    },
                    amount_paid: {
                        required: "Please enter the amount paid.",
                        number: "Please enter a valid number for the amount paid."
                    },
                    membership_id: {
                        required: "Please select a membership."
                    },
                    in: {
                        required: "Please enter the in-time."
                    },
                    out: {
                        required: "Please enter the out-time."
                    },
                    trainer_id: {
                        required: "Please select a trainer."
                    }
                },

                submitHandler: function(form) {
                    var formData = new FormData(form);
                    let url = "";
                    if ($('#id').val()) {
                        url = "{{ route('customer.update') }}"
                    } else {
                        url = "{{ route('customer.store') }}"
                    }
                    // Get the selected membership name and add it to the formData
                    var selectedMembership = $('#membership_id option:selected').data('name');
                    formData.append('membership', selectedMembership);
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#Customer-modal').modal('hide');
                            table.ajax.reload();
                            var successMessage = $('#id').val() ? 'Data Updated successfully.' : 'Data Added successfully.';
                            toastr.success(successMessage, 'Success');
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });

        function editFunc(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('customer.edit', ':id') }}".replace(':id', id),
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#CustomerModalLabel').html("Edit Customer");
                    $('#Customer-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#email').val(res.email);
                    $('#age').val(res.age);
                    $('#phone').val(res.phone);
                    $('#address').val(res.address);
                    $('#in').val(res.in);
                    $('#out').val(res.out);


                    // Set the image source and show the image preview
                    if (res.image) {
                        $('#imageSrc').attr('src', res.image);
                        $('#imageSrc').show();
                    } else {
                        $('#imageSrc').attr('src', '');
                        $('#imageSrc').hide();
                    }

                    // Set the gender radio button
                    if (res.gender === '1') {
                        $('#gender_male').prop('checked', true);
                    } else if (res.gender === '2') {
                        $('#gender_female').prop('checked', true);
                    }

                    $('#amount_paid').val(res.amount_paid);

                    $('#membership_id').val(res.membership_id);

                    // console.log(res.assigned_trainer_id);
                    if (res.assigned_trainer_id) {
                        $('#trainer_id').val(res.assigned_trainer_id);
                    }

                }
            });
        }


        function deleteFunc(id) {
            Swal.fire({
                title: 'Confirm Deletion',
                text: 'Do you really want to delete this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: "customer/destroy/" + id,
                        dataType: 'json',
                        success: function(res) {
                            var oTable = $('#customer').DataTable();
                            oTable.ajax.reload(null, false);
                            Swal.fire('Deleted!', 'Record has been deleted successfully.', 'success');
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    });
                }
            });
        }

        function confirmStatusChange(id, isChecked) {
            var status = isChecked ? 'active' : 'inactive';

            Swal.fire({
                title: 'Confirm Status Change',
                text: 'Are you sure you want to change the status to ' + status + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change status!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('customer.status.update') }}",
                        data: {
                            id: id,
                            status: status
                        },
                        success: function(data) {
                            console.log(data);
                            $('#customer').DataTable().ajax.reload();

                        },
                        error: function(data) {
                            var checkbox = document.querySelector('input[data-id="' + id + '"]');
                            checkbox.checked = !isChecked;
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    var checkbox = document.querySelector('input[data-id="' + id + '"]');
                    checkbox.checked = !isChecked;
                }
            });
        }
        // Initialize DateTimePicker for "In_time" and "Out_time" input fields
        $('#in').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            },
            showClose: true,

        });
        $('#out').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            },
            showClose: true,
        });
    </script>
    <!-- Customer script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


</body>


@endsection