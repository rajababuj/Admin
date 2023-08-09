@extends('Admin.main-layout')

@section('content-header')
@endsection

@section('body')
<!DOCTYPE html>
<html>

<head>
    <title>Add Or Remove</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center pt-5">
        <div class="col-md-9">
            <h2 class="text-center pb-3 text-danger"> Add Employe</h2>
            <form action="" id="WorkerForm" name="WorkerForm" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- @if($errors->any())
                   <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                             <li>{{$error}}</li>
                           @endforeach
                        </ul>
                   </div>
                @endif -->

                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success')}}</p>
                </div>
                @endif
                <table class="table table-bordered" id="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="inputs[0][name]" placeholder="Enter Your Name" class="form-control">
                            <div class="error" id="error-inputs[0][name]"></div>
                            <!-- @if($errors->has('inputs.0.name'))
                            <div class="error">{{ $errors->first('inputs.0.name') }}</div>
                            @endif -->
                        </td>
                        <td>
                            <input type="email" name="inputs[0][email]" placeholder="Enter Your Email" class="form-control">
                            @if (session('message'))
                            <div class="alert" style="color: red;">{{ session('message') }}</div>
                            @endif
                            <!-- @if($errors->has('inputs.0.email'))
                            <div class="error">{{ $errors->first('inputs.0.email') }}</div>
                            @endif -->
                        </td>
                        <td>
                            <input type="text" name="inputs[0][role]" placeholder="Enter Your Role" class="form-control">
                            <div class="error" id="error-inputs[0][role]"></div>
                            <!-- @if($errors->has('inputs.0.role'))
                            <div class="error">{{ $errors->first('inputs.0.role') }}</div>
                            @endif -->
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" id="add">Add More</button>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary col-md-2">Save</button>
            </form>
        </div>
    </div>
    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                '<tr>\
                <td>\
                    <input type="text"required="name" name="inputs[' + i + '][name]" placeholder="Enter Your Name" class="form-control">\
                </td>\
                <td>\
                    <input type="email"required="email" name="inputs[' + i + '][email]" placeholder="Enter Your Email" class="form-control">\
                </td>\
                <td>\
                    <input type="text"required="role" name="inputs[' + i + '][role]" placeholder="Enter Your Role" class="form-control">\
                </td>\
                <td>\
                     <button type="button"required class="btn btn-danger remove-table-row">Remove</button>\
                </td>\
            </tr>'
            );
        });

        $(document).on('click', '.remove-table-row', function() {
            $(this).closest('tr').remove();
        });
    </script>
    <script>
        $(document).ready(function() {
             jQuery.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Name must contain alphabets only.");
            $('#WorkerForm').validate({
                ignore: [],
                errorPlacement: function(error, element) {
                    var elementName = $(element).attr("name");
                    var errorDiv = $('#error-' + elementName);
                    if (errorDiv.length == 0) {
                        errorDiv = $("<div class='error'></div>").attr("id", "error-" + elementName);
                        errorDiv.insertAfter(element);
                    }
                    error.appendTo(errorDiv);
                },
                rules: {
                    "inputs[0][name]": {
                        required: true,
                        maxlength: 100,
                        lettersOnly: true
                    },
                    "inputs[0][email]": {
                        required: true,
                        email: true,
                    },
                    "inputs[0][role]": {
                        required: true,
                    },
                },
                messages: {
                    "inputs[0][name]": {
                        required: "Please enter the name.",
                        maxlength: "Name should not exceed 100 characters.",
                        lettersOnly: "Name must contain alphabets only."
                    },
                    "inputs[0][email]": {
                        required: "Please enter email address.",
                        email: "Please enter a valid email address.",
                    },
                    "inputs[0][role]": {
                        required: "Please enter the role.",
                    },
                },


                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            console.log(response);
                            if (response.success) {

                                $(".alert-success").remove();
                                $("<div class='alert alert-success text-center'>").text(response.success).insertBefore(form);
                                setTimeout(function() {
                                    $(".alert-success").fadeOut("slow", function() {
                                        $(this).remove();
                                    });
                                }, 3000);

                                window.location.href = "{{ route('worker.index') }}";
                            } else {
                                if (response.error) {
                                    console.log(response.error);
                                    for (var field in response.error){
                                        var errorDiv = $("#error-" + field);
                                        errorDiv.html(response.error[field].join("<br>"));
                                    }

                                    
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Failed to save data:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css"> -->
</body>

</html>
@endsection