@extends('frontend.home.master')
@section('title')
    Login
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="w-50 m-5 mx-auto">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3 m-l" id="pills-tab" role="tablist">
                                <li class="nav-item mx-3" role="presentation">
                                  <button class="nav-link active btn-login-1" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Login</button>
                                </li>
                                <li class="nav-item " role="presentation">
                                  <button class="nav-link btn-login" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <form action="{{route('login')}}" method="post" class="text-center">
                                        @csrf
                                        <input type="text" class="form-contol w-75 border-success rounded-3" name="email" placeholder="Enter Email">
                                        <input type="password" class="form-contol w-75 my-2 border-success rounded-3" name="password" placeholder="Enter Password">
                                        <div class="d-flex justify-content-between mx-5">
                                            <p></p>
                                            <a href="{{route('password.request')}}" class="text-danger  c-u-p" >Forget Password ?</a>
                                        </div>
                                        <button type="submit" class="btn btn-success w-75 my-4">Login</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <form action="{{route('register')}}" method="post" class="text-center">
                                        @csrf
                                        <input type="text" class="form-contol w-75 border-success rounded-3" name="name" placeholder="Enter Name">
                                        <input type="text" class="form-contol w-75 my-2 border-success rounded-3" name="email" placeholder="Enter Email">
                                        <input type="password" class="form-contol w-75 my-2 border-success rounded-3" name="password" placeholder="Enter Password">
                                        <input type="password" class="form-contol w-75 my-2 border-success rounded-3" name="password_confirmation" placeholder="Enter password Confirmation">
                                        <button type="submit" class="btn btn-success w-75 my-4">Signup</button>
                                    </form>
                                </div>
                                
                              </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
