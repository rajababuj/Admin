@extends('Admin.main-layout')
@section('content-header')
@endsection
@section('body')

<div class="card">
    <div class="card-header">Change Password</div>

    <div class="card-body">
        <form  id="passwordForm">
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <div class="input-group">
                    <input type="password" name="old_password" id="old_password" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password">
                            <i class="fa fa-fw fa-eye "></i>
                        </span>
                    </div>
                </div>
            </div>
            <span class="text-danger" id="old_password"></span>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <div class="input-group">
                    <input type="password" name="new_password" id="new_password" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password">
                            <i class="fa fa-fw fa-eye"></i>
                        </span>
                    </div>
                </div>
                <span class="text-danger" id="new_password"></span>
            </div>

            <div class="form-group">
                <label for="password">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password">
                            <i class="fa fa-fw fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <span class="text-danger" id="confirm_password"></span>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
    

        $('#passwordForm').validate({
            rules: {
                old_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 30
                },
                new_password: {
                    required: true,
                    minlength: 8,
                    maxlength: 30
                },
                confirm_password: {
                    required: true,
                    equalTo: '#new_password'
                }
            },
            messages: {
                old_password: {
                    required: 'Enter your current password',
                    minlength: 'Old password does not match with inside the database ',
                    maxlength: 'Old password must have at least 8 characters',

                    // maxlength: 'Old password must not exceed 30 characters'
                },
                new_password: {
                    required: 'Enter new password',
                    minlength: 'New password must have at least 8 characters',
                    maxlength: 'New password must not exceed 30 characters'
                },
                confirm_password: {
                    required: 'Re-enter your new password',
                    equalTo: 'New password and Confirm new password must match'
                }
            },
            submitHandler: function(passwordForm) {
                $.ajax({
                    url: "{{route('update_password')}}",
                    type: "POST",
                    data: new FormData(form),
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#loading').hide();
                        $("#message").html(data);
                    }
                });
            }
        });
    });
    

    $(document).on('click', '.toggle-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(this).closest('.input-group').find('input');
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');
    });

</script>

@endsection
