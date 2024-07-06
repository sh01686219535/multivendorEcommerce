@extends('frontend.home.master')
@section('title')
    Forget Password
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="w-50 m-5 mx-auto">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3 m2" id="pills-tab" role="tablist">
                                <li class="nav-item mx-3" role="presentation">
                                  <button class="nav-link active btn-login-1" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Forget Password</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <form action="{{route('password.email')}}" method="post" class="text-center">
                                        @csrf
                                        <h5 class="text-capitalize my-2">Enter the email adressto register with</h5>
                                        <strong class="text-success pb-2"> Grow<b>-Soft</b></strong><br>
                                        <input type="email" class="form-contol w-75 mt-3 border-success rounded-3" name="email" placeholder="Enter Email">
                                        <button type="submit" class="btn btn-success w-75 my-4">Send</button>
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

