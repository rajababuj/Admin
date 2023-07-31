@extends('Admin.main-layout')
@section('content-header')
@endsection
@section('body')
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Trainer List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onclick="addTrainer()" href="javascript:void(0)">Create Trainer</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="trainer">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>
            </table>
        </div>
    </div>

    <!-- bootstrap training model -->
    <div class="modal fade" id="Trainer-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TrainerModalLabel">Trainer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="TrainerForm" name="TrainerForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
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
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="50" required>
                            </div>

                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address" maxlength="50">
                            </div>

                            <label for="image" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image" maxlength="50">
                                <img id="imageSrc" src="" style="max-width: 200px;" />
                                <input id="image_name" type="hidden" name="image_name" />
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
                            <div class="form-group">
                                <label for="training_id" class="col-sm-2 control-label">Training</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="trainings_id" name="training_id">
                                        <option value="">Select Training</option>
                                        @foreach($activeTrainings as $training)
                                        <option value="{{ $training->id }}">{{ $training->name }}</option>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Add custom validation methods (if needed) outside $(document).ready()
            jQuery.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Name must contain alphabets only.");

            var table = $('#trainer').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('trainer.index') }}",
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
                        data: 'gender',
                        name: 'gender',
                        render: function(data, type, full, meta) {
                            return data === '1' ? 'Male' : 'Female';
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

            window.addTrainer = function() {
                $('#Trainer-modal').modal('show');
                $('#TrainerForm').trigger('reset');
                $('#TrainerModalLabel').html('Add Trainer');
                $('#id').val('');
            };

            $('#TrainerForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                        lettersOnly: true
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 25
                    },
                    age: {
                        required: true,
                        digits: true,
                        maxlength: 3
                    },
                    phone: {
                        required: true,
                        maxlength: 10
                    },
                    address: {
                        required: true,
                        maxlength: 255
                    },
                    image: {
                        required: true,
                        extension: "jpg|png"
                    },
                    gender: {
                        required: true,
                    },
                    training_id: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the name.",
                        maxlength: "Name must not exceed 50 characters.",
                        lettersOnly: "Name must contain alphabets only."

                    },
                    email: {
                        required: "Please enter the email.",
                        email: "Please enter a valid email address."
                    },
                    age: {
                        required: "Please enter the age.",
                        digits: "Please enter only digits for the age.",
                        maxlength: "Age must be less than 100."
                    },
                    phone: {
                        required: "Please enter the phone.",
                        maxlength: "Phone must not exceed 10 characters."
                    },
                    address: {
                        required: "Please enter the address.",
                        maxlength: "Address must not exceed 255 characters."
                    },
                    image: {
                        required: "Please select an image.",
                        extension: "Only JPG and PNG images are allowed."
                    },
                    gender: {
                        required: "Please select a gender."
                    },
                    training_id: {
                        required: "Please select a training."
                    },
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    let url = "";
                    if ($('#id').val()) {
                        url = "{{ route('trainer.update') }}"
                    } else {
                        url = "{{ route('trainer.store') }}"
                    }

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#Trainer-modal').modal('hide');
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
                url: "{{ route('trainer.edit', ':id') }}".replace(':id', id),
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#TrainerModalLabel').html("Edit Trainer");
                    $('#Trainer-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#email').val(res.email);
                    $('#age').val(res.age);
                    $('#phone').val(res.phone);
                    $('#address').val(res.address);
                    $('#image_name').val(res.image);


                    if (res.image) {
                        $('#imageSrc').attr('src', res.image);
                        $('#imageSrc').show();
                    } else {
                        $('#imageSrc').attr('src', '');
                        $('#imageSrc').hide();
                    }
                    console.log(res.trainings_id);
                    // console.log(res.assigned_trainer_id);
                    if (res.trainings_id) {
                        $('#trainings_id    ').val(res.trainings_id);
                    }


                    // Set the gender radio button
                    if (res.gender === '1') {
                        $('#gender_male').prop('checked', true);
                    } else if (res.gender === '2') {
                        $('#gender_female').prop('checked', true);
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
                        url: "trainer/destroy/" + id,
                        dataType: 'json',
                        success: function(res) {
                            var oTable = $('#trainer').DataTable();
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
                        url: "{{ route('trainer.status.update') }}",
                        data: {
                            id: id,
                            status: status
                        },
                        success: function(data) {
                            console.log(data);
                            $('#trainer').DataTable().ajax.reload();

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
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</body>

@endsection