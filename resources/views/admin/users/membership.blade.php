@extends('Admin.main-layout')
@section('content-header')
@endsection
@section('body')
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Membership List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onclick="addMembership()" href="javascript:void(0)">Create Membership</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="membership">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>
            </table>
        </div>
    </div>
    <!-- Move jQuery above DataTables script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <!-- bootstrap training model -->
    <div class="modal fade" id="membership-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MembershipModalLabel">Membership</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="MembershipForm" name="MembershipForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" maxlength="50">
                            </div>

                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="price" name="price" maxlength="50">
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


            var table = $('#membership').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('membership.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price',
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

            window.addMembership = function() {
                $('#MembershipForm').trigger('reset');
                $('#MembershipModalLabel').html('Add Membership');
                $('#membership-modal').modal('show');
                $('#id').val('');
            };

            $('#MembershipForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                        lettersOnly: true
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 0.01
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the name.",
                        maxlength: "Name must not exceed 50 characters."
                    },
                    price: {
                        required: "Please enter the price.",
                        number: "Please enter a valid number.",
                        min: "Price must be greater than 0."
                    }
                },

                submitHandler: function(form) {
                    var formData = new FormData(form);
                    let url = "";
                    if ($('#id').val()) {
                        url = "{{ route('membership.update') }}"
                    } else {
                        url = "{{ route('membership.store') }}"
                    }

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#membership-modal').modal('hide');
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
            // Proceed with the AJAX request to fetch the data
            $.ajax({
                type: "GET",
                url: "{{ route('membership.edit', ':id') }}".replace(':id', id),
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#MembershipModalLabel').html("Edit Membership");
                    $('#membership-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#price').val(res.price);
                }
            });
        }



        function updateFunc(id) {
            var name = $('#name').val();
            var price = $('#price').val();

            $.ajax({
                type: 'post',
                url: "{{ route('membership.update', ':id') }}",
                data: {
                    id: id,
                    name: name,
                    price: price
                },
                success: function(data) {
                    $('#membership-modal').modal('hide');
                    toastr.success('Data Updated successfully.', 'Success');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteFunc(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this record?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, proceed with the deletion
                    $.ajax({
                        type: "DELETE",
                        url: "membership/destroy/" + id,
                        dataType: 'json',
                        success: function(res) {
                            var oTable = $('#membership').DataTable();
                            oTable.ajax.reload(null, false);
                            Swal.fire(
                                'Deleted!',
                                'Record has been deleted successfully.',
                                'success'
                            );
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
                        url: "{{ route('membership.status.update') }}",
                        data: {
                            id: id,
                            status: status
                        },
                        success: function(data) {
                            console.log(data);
                            $('#membership').DataTable().ajax.reload();

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