@extends('Admin.main-layout')
@section('content-header')
@endsection
@section('body')
<!DOCTYPE html>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Training List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onclick="addTraining()" href="javascript:void(0)">Create Training</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="training">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>
            </table>
        </div>


    </div>

    <!-- bootstrap training model -->
    <div class="modal fade" id="training-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TrainingModalLabel">Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="TrainingForm" name="TrainingForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" maxlength="50">
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
    <style>
        .error {
            color: red;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Add a custom validation method to check for alphabets only
            jQuery.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Please enter letters only.");

            var table = $('#training').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('training.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
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

            window.addTraining = function() {
                $('#TrainingForm').trigger('reset');
                $('#TrainingModalLabel').html('Add Training');
                $('#training-modal').modal('show');
                $('#id').val('');
            };

            $('#TrainingForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                        lettersOnly: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name.",
                        maxlength: "Name must not exceed 50 characters.",
                        lettersOnly: "Name must contain alphabets only."
                    }
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    let url = ""
                    if ($('#id').val()) {
                        url = "{{ route('training.update') }}"
                    } else {
                        url = "{{ route('training.store') }}"
                    }

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#training-modal').modal('hide');
                            table.ajax.reload();
                            var successMessage = $('#id').val() ? 'Data Updated successfully.' : 'Data Added successfully.';
                            toastr.success(successMessage, 'Success');;
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });

                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</body>

<script>
    function editFunc(id) {
        $.ajax({
            type: "GET",
            url: "{{ route('training.edit', ':id') }}".replace(':id', id),
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $('#TrainingModalLabel').html("Edit Training");
                $('#training-modal').modal('show');
                $('#id').val(res.id);
                $('#name').val(res.name);
            }
        });
    }
</script>
<script>
    function updateFunc(id) {
        var name = $('#name').val();

        $.ajax({
            type: 'post',
            url: "{{ route('training.update', ':id') }}",
            data: {
                id: id,
                name: name
            },
            success: function(data) {
                $('#training-modal').modal('hide');
                toastr.success('Data Updated successfully.', 'Success');
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>
<script>
    function deleteFunc(id) {
        if (confirm("Do you really want to delete record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "DELETE",
                url: "training/destroy/" + id,
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#training').DataTable();
                    oTable.ajax.reload(null, false);
                    toastr.success('Record deleted successfully.', 'Success');
                },
                error: function(res) {
                    console.log(res);
                }
            });
        }
    }
</script>

<script>
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
                    url: "{{ route('training.status.update') }}",
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(data) {
                        console.log(data);
                        $('#training').DataTable().ajax.reload();

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

@endsection