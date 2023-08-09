@extends('Admin.main-layout')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Admin Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">WelCome Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('body')
<!-- Main row -->
<div class="row">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-9">
                <h5>"Sometimes it's better to leave something
                    alone,to pause,and that's very true of programming."-> R B JHA
                </h5>
            </div>
        </div>

    </div>
    <div class="image">
        <img src="{{ asset('assets/css/images/user2-160x160.jpg') }}" class="center" alt="User Image">
    </div>
    <style>        
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>


</div>
<!-- /.row (main row) -->

@endsection