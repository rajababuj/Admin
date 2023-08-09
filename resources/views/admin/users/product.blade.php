@extends('Admin.main-layout')
@section('content-header')
@endsection
@section('body')
<!DOCTYPE html>

<head>
    <!-- Membership Link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Product List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" onclick="addProduct()" href="javascript:void(0)">Create Product</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="Product">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>
            </table>
        </div>
    </div>

    <!-- bootstrap training model -->
    <div class="modal fade" id="Product-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ProductModalLabel">Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="ProductForm" name="ProductForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" maxlength="50">
                            </div>

                            <label for="image" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image" maxlength="50">
                                <img id="imageSrc" src="" style="max-width: 200px;" />
                                <input id="image_name" type="hidden" name="image_name" />
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="category" name="category">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $categoryId => $categoryName)
                                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="price" name="price" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="size" class="col-sm-2 control-label">Size</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="size" name="size">
                                        <option value="">Select a size</option>
                                        @foreach ($sizes as $sizeId => $sizeName)
                                        <option value="{{ $sizeId }}">{{ $sizeName }}</option>
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

            var table = $('#Product').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
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
                        data: 'category',
                        name: 'category',
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'size',
                        name: 'size',
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
            window.addProduct = function() {
                $('#Product-modal').modal('show');
                $('#ProductForm').trigger('reset');
                $('#ProductModalLabel').html('Add Product');
                $('#id').val('');
            };
            $('#ProductForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                    },
                    image: {
                        required: true,
                        extension: "jpg|png"
                    },
                    category: {
                        required: true,
                        maxlength: 255
                    },
                    price: {
                        required: true,
                    },
                    size: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the name.",
                        maxlength: "Name must not exceed 50 characters.",

                    },
                    image: {
                        required: "Please select an image.",
                        extension: "Only JPG and PNG images are allowed."
                    },
                    category: {
                        required: "Please enter the category.",
                    },
                    price: {
                        required: "Please enter the price.",
                    },
                    size: {
                        required: "Please enter the address.",
                    },
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    let url = "";
                    if ($('#id').val()) {
                        url = "{{ route('product.update') }}"
                    } else {
                        url = "{{ route('product.store') }}"
                    }

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#Product-modal').modal('hide');
                            table.ajax.reload();
                            var successMessage = $('#id').val() ? 'Data Updated successfully.' : 'Data Added successfully.';
                            console.log(successMessage);
                            toastr.success(successMessage, 'Success');
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
    </script>
    <script>
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
                        url: "product/destroy/" + id,
                        dataType: 'json',
                        success: function(res) {
                            var oTable = $('#Product').DataTable();
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
                        url: "{{ route('product.status.update') }}",
                        data: {
                            id: id,
                            status: status
                        },
                        success: function(data) {
                            console.log(data);
                            $('#product').DataTable().ajax.reload();

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
    <script>
        function editFunc(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('product.edit', ':id') }}".replace(':id', id),
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $('#ProductModalLabel').html("Edit Product");
                    $('#Product-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#image_name').val(res.image);
                    $('#category').val(res.category);
                    $('#price').val(res.price);
                    $('#size').val(res.size);
                    if (res.image) {
                        $('#imageSrc').attr('src', res.image);
                        $('#imageSrc').show();
                    } else {
                        $('#imageSrc').attr('src', '');
                        $('#imageSrc').hide();
                    }
                }
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

</body>

@endsection