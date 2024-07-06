@extends('admin.layouts.master')
@section('title')
    Admin Profile
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile Update</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth::user()->image)
                                        <img class="profile-user-img img-fluid img-circle img-style"
                                            src="{{ asset(Auth::user()->image) }}" alt="picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle img-style"
                                            src="{{ asset('backendAsset/img/avatar.png') }}" alt="picture">
                                    @endif

                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.profile.update') }}" class="form-horizontal" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ Auth::user()->name }}" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="phone" name="phone"
                                                value="{{ Auth::user()->phone }}" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3">
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-head">
                                <h3 class="text-center my-2">Password Change</h3>
                            </div>
                            <div class="card-body">
                                <x-error />
                                <form action="{{ route('admin.password.update') }}" class="form-horizontal" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="currentPassword" class="col-sm-4 col-form-label">Current Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                                placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-4 col-form-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="passwordConfirm" class="col-sm-4 col-form-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
